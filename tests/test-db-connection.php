<!DOCTYPE html>

<?php
/**
 * This script tests whether the database connection is working properly.
 */

require_once '../include/database.php';
$dbh = getDBConnection();
$stmt = $dbh->query('show tables');
$results = $stmt->fetchAll();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Test Database Connection</title>
    </head>
    <body>
        <h1>Test Database Connection</h1>
        <p>If the list of tables in the database appears below,
            then the database connection is working.</p>
        <p>Output of SHOW TABLES:</p>
        <ul>
            <?php
                foreach ($results as $row) {
                    echo "<ul>" . print_r($row) . "</ul>";
                }
            ?>
        </ul>
    </body>
</html>
