<?php
require_once (__DIR__.'/../include/database.php');
require_once (__DIR__.'/../exceptions/InvalidSQLIdentifierException.php');
require_once (__DIR__.'/../exceptions/ColumnDoesNotExist.php');

/**
 * Base class for data managers
 * 
 * The Manager class and its subclasses are responsible for executing SQL
 * queries and returning their results. The classes provide methods for
 * instantiating model objects from the database, given either a primary key or
 * a set of filter criteria, as well as saving and deleting model objects in the
 * database. Each model class is assigned an instance of an appropriate Manager
 * class as a static variable named “objects”.
 */
class Manager {
    
    // The name of the model class associated with this manager instance
    protected $model;
    
    /** @var array The column names in the table */
    private $columnNames = null;
    
    // Paging output variables
    private $resultsPerPage;
    private $resultsCount;
    private $pageNum;
    private $pageCount;
    private $firstResultNum;
    private $lastResultNum;
    
    /**
     * @param string $model The name of the model class to associate with this manager instance
     */
    function __construct($model) {
        self::checkIdentifier($model);
        $this->model = $model;
    }
    
    /**
     * Get a record from the table as a model instance.
     * 
     * @param integer $id The primary key of the record to fetch
     * @return Model subclass instance
     */
    public function get($id) {
        $dbh = getDBConnection();
        $stmt = $dbh->prepare("select * from $this->model where id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, $this->model);
        $instance = $stmt->fetch();
        return $instance;
    }
    
    /**
     * Get all records from the table.
     * 
     * @return array An array of model instances
     */
    public function all() {
        $dbh = getDBConnection();
        $stmt = $dbh->query("select * from $this->model");
        $stmt->setFetchMode(PDO::FETCH_CLASS, $this->model);
        $instances = $stmt->fetchAll();
        return $instances;
    }
    
    /**
     * Retrieve a page of records from the table matching the given filter
     * criteria. The criteria are passed in as an associative array where each
     * key is the name of a column and its corresponding value is the value a
     * record must have in that column in order to be included in the results.
     * One page of results is returned at a time, controlled by the
     * $resultsPerPage and $pageNum arguments.
     * 
     * @param array $criteria Associative array of filter criteria
     * @param integer $resultsPerPage Number of results per page
     * @param integer $pageNum Page number of results to return
     * @param string $sortColumn Column by which to sort results. May prefix with '-' to sort descending.
     * @return array of model instances
     * @throws ColumnDoesNotExist if a column in $criteria does not exist
     */
    public function filter($criteria, $resultsPerPage, $pageNum,
            $sortColumn=null) {

        $dbh = getDBConnection();
        if (is_null($this->columnNames)) {
            $this->populateColumnNames();
        }

        // Build the query
        $sql = "select SQL_CALC_FOUND_ROWS * from $this->model where 1 ";
        foreach (array_keys($criteria) as $columnName) {
            if (in_array($columnName, $this->columnNames) == false) {
                throw new ColumnDoesNotExist("$this->model.$columnName");
            }
            $sql .= "and $columnName = :$columnName ";
        }
        $sortDirection = 'asc';
        if (is_null($sortColumn)) {
            $sortColumn = 'id';
        } else {
            if ($sortColumn[0] == '-') {
                $sortColumn = substr($sortColumn, 1);
                $sortDirection = 'desc';
            }
            if (in_array($sortColumn, $this->columnNames) == false) {
                throw new ColumnDoesNotExist("$this->model.$sortColumn");
            }
            self::checkIdentifier($sortColumn);
        }
        $sql .= "order by $sortColumn $sortDirection limit :offset, :count";
        $stmt = $dbh->prepare($sql);

        // Bind the values
        foreach ($criteria as $columnName => $value) {
            $stmt->bindValue(":$columnName", $value);
        }
        $offset = $resultsPerPage * ($pageNum - 1);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindValue(':count', $resultsPerPage, PDO::PARAM_INT);
        
        // Execute the query and get the results
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, $this->model);
        $instances = $stmt->fetchAll();
        
        // Set paging output variables
        $this->resultsPerPage = $resultsPerPage;
        $stmt = $dbh->query('select found_rows()');
        $this->resultsCount = (int) $stmt->fetchColumn(); 
        $this->pageNum = $pageNum;
        $this->pageCount = ceil($this->resultsCount / $resultsPerPage);
        $this->firstResultNum = $offset + 1;
        $this->lastResultNum = $offset + count($instances);
        
        return $instances;
    }
    
    /**
     * @return integer The results per page from the last filter()
     */
    public function getResultsPerPage() {
        return $this->resultsPerPage;
    }
    
    /**
     * @return integer The total number of results, before paging, from the last filter()
     */
    public function getResultsCount() {
        return $this->resultsCount;
    }
    
    /**
     * @return integer The current results page number from the last filter()
     */
    public function getPageNum() {
        return $this->pageNum;
    }
    
    /**
     * @return integer The total number of results pages from the last filter()
     */
    public function getPageCount() {
        return $this->pageCount;
    }
    
    /**
     * @return integer The number of the first result on the current page, from the last filter()
     */
    public function getFirstResultNum() {
        return $this->firstResultNum;
    }
    
    /**
     * @return integer The number of the last result on the current page, from the last filter()
     */
    public function getLastResultNum() {
        return $this->lastResultNum;
    }
    
    /**
     * Save the given model instance to the database.
     * If its ID is NULL, a row will be inserted and the ID of the instance will
     * be set with the generated primary key value. Otherwise, the row with the
     * corresponding ID will be updated.
     * 
     * @return boolean TRUE on success or FALSE on failure
     */
    public function save($instance) {
        $dbh = getDBConnection();
        if (is_null($this->columnNames)) {
            $this->populateColumnNames();
        }
        
        // paramNames are columnNames prefixed with ':'
        $paramNames = array_map(function($s) { return ':' . $s; },
                $this->columnNames);
        
        // Prepare an update or insert statement
        if (is_null($instance->id)) {
            // Prepare an insert statement
            $stmt = $dbh->prepare("insert into $this->model" .
                    " (" . implode(', ', $this->columnNames) . ") values " .
                    " (" . implode(', ', $paramNames) . ")");
        } else {
            // Prepare an update statement
            $sql = "update $this->model set ";
            $paramPairs = array();
            foreach ($this->columnNames as $columnName) {
                if ($columnName != 'id') {
                    $paramPairs[] = "$columnName = :$columnName";
                }
            }
            $sql .= implode(', ', $paramPairs);
            $sql .= ' where id = :id';
            $stmt = $dbh->prepare($sql);
        }
        
        foreach ($this->columnNames as $columnName) {
            $value = $instance->$columnName;
            $stmt->bindValue(":$columnName", $value);
        }
        
        $retVal = $stmt->execute();
        
        if (is_null($instance->id)) {
            $instance->id = (int) $dbh->lastInsertId();
        }
        
        return $retVal;
    }
    
    /**
     * Populate $columnNames by querying the database.
     * Column names are all checked for safety using checkIdentifier().
     */
    private function populateColumnNames() {
        $dbh = getDBConnection();
        $stmt = $dbh->query("describe $this->model");
        $this->columnNames = $stmt->fetchAll(PDO::FETCH_COLUMN);
        foreach ($this->columnNames as $columnName) {
            self::checkIdentifier($columnName);
        }
    }
    
    /**
     * Get the column names of the table corresponding to the model
     * 
     * @return array of column names
     */
    public function getColumnNames() {
        if (is_null($this->columnNames)) {
            $this->populateColumnNames();
        }
        return $this->columnNames;
    }
    
    /**
     * Check that the given identifier to be used as a table or column name in
     * a query is safe to include in an SQL statement.
     * 
     * When building queries, prepared statements should be used to safely bind
     * parameters, but table and column names cannot be bound this way - they
     * must be directly inserted into the query string. Therefore, to insure 
     * against SQL injection, always check identifiers using this method before
     * including them in a query.
     * 
     * @param string $identifier The identifier to validate
     * @return string The identifier (the same value that was passed in)
     * @throws InvalidSQLIdentifierException if the identifier is invalid
     */
    final public static function checkIdentifier($identifier) {
        // For now, only alphabetic characters are allowed
        if (ctype_alpha($identifier) == false) {
            throw new InvalidSQLIdentifierException($identifier);
        }
    }
    
    /**
     * Format the given DateTime object as a string in MySQL format so that it
     * can be inserted into the database.
     * 
     * @param DateTime $dateTime The DateTime object to format
     * @return string The formatted datetime string
     */
    final public static function formatDateTime($dateTime) {
        return $dateTime->format("Y-m-d H:i:s");
    }
}
