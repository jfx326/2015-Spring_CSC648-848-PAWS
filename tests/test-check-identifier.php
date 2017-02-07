<!DOCTYPE html>

<?php
/**
 * This script tests the Manager::checkIdentifier() method
 */

require_once '../managers/Manager.php';
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Test Manager::checkIdentifier()</title>
    </head>
    <body>
        <h1>Test Manager::checkIdentifier()</h1>
        <p>Testing identifier "RegisteredUser" (should not throw exception)</p>
        <?php
        Manager::checkIdentifier('RegisteredUser');
        ?>
        <p>Testing identifier "; select * from RegisteredUser" (should throw exception)</p>
        <?php
        Manager::checkIdentifier('; select * from RegisteredUser');
        ?>
    </body>
</html>
