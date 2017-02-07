<!DOCTYPE html>

<?php
/**
 * This script tests the MessagingService::sendEmail() method
 */

require_once __DIR__ . '/../models/RegisteredUser.php';

$users = RegisteredUser::$objects->all();

?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Test sendEmail</title>
    </head>
    <body>
        <form action="test-send-email-submit.php" method="post">
            <label>To:
                <select name="recipientId">
                    <?php
                    foreach ($users as $user) {
                        echo "<option value='$user->id'>$user->email</option>";
                    }
                    ?>
                </select>
            </label>
            <br/>
            
            <label>Subject:
                <input type="text" name="subject"/>
            </label>
            <br/>
            
            <label>Body:
                <textarea name="body"></textarea>
            </label>
            <br/>
            
            <input type="submit" value="submit"/>
        </form>
    </body>
</html>
