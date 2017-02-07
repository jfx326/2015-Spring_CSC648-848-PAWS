<!DOCTYPE html>

<?php
/**
 * This script tests the Manager's filter() method.
 */

require_once __DIR__ . '/../models/RegisteredUser.php';

$resultsPerPage = filter_input(INPUT_GET, 'resultsPerPage', FILTER_VALIDATE_INT);
if (empty($resultsPerPage)) {
    $resultsPerPage = 1000;
}

$pageNum = filter_input(INPUT_GET, 'pageNum', FILTER_VALIDATE_INT);
if (empty($pageNum)) {
    $pageNum = 1;
}

unset($_GET['resultsPerPage']);
unset($_GET['pageNum']);

if (empty($_GET['displayName'])) {
    unset($_GET['displayName']);
}
$criteria = $_GET;

$objects = RegisteredUser::$objects;

$users = $objects->filter($criteria, $resultsPerPage, $pageNum);

$firstResultNum = $objects->getFirstResultNum();
$lastResultNum = $objects->getLastResultNum();
$resultsCount = $objects->getResultsCount();
$pageNum = $objects->getPageNum();
$pageCount = $objects->getPageCount();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Test Filter</title>
    </head>
    <body>
        
        <h1>Filter RegisteredUsers</h1>
        <form method="get">
            
            <h2>Filter Criteria</h2>
            <label>displayName
                <input type="text" name="displayName"/>
            </label>
            
            <h2>Paging Parameters</h2>
            <label>resultsPerPage
                <input type="text" name="resultsPerPage" value="<?php echo $resultsPerPage ?>" />
            </label>
            <br/>            
            <label>pageNum
                <input type="text" name="pageNum" value="<?php echo $pageNum ?>"/>
            </label>
            <br/>
            <input type="submit" value="Submit"/>
        </form>
        
        <h2>Filtered Results</h2>
        <p><?php echo "Showing results $firstResultNum to $lastResultNum of $resultsCount"; ?></p>
        <p><?php echo "Page $pageNum of $pageCount"; ?></p>
        <pre>
            <?php
            print_r($users);
            ?>
        </pre>
    </body>
</html>
