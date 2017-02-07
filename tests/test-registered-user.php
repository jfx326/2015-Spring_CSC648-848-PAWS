<!DOCTYPE html>
<?php
/**
 * Testing script for RegisteredUser model
 *
 * @author Ben Saylor
 */

require_once "../models/RegisteredUser.php";

$goodPassword = "hello!";
$badPassword = "goodbye!";

$user = new RegisteredUser();
$user->setPassword($goodPassword);

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Test RegisteredUser</title>
    </head>
    <body>
        <h1>Testing checkPassword()</h1>
        <pre>

            <?php
            if ($user->checkPassword($goodPassword)) {
                echo "checkPassword gave goodPassword a thumbs-up -- OK!\n";
            } else {
                echo "checkPassword gave goodPassword a thumbs-down -- Not OK!\n";
            }
            
            if ($user->checkPassword($badPassword)) {
                echo "checkPassword gave badPassword a thumbs-up -- Not OK!\n";
            } else {
                echo "checkPassword gave badPassword a thumbs-down -- OK!\n";
            }
            ?>

        </pre>
        
        <h1>Testing get()</h1>
        
        <?php
        $user = RegisteredUser::$objects->get(1);
        print_r($user);
        ?>
        
    </body>
</html>
