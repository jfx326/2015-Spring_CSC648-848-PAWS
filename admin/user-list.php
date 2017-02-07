<!DOCTYPE html>

<?php
/**
 * This is the Manage Users page, which lists all the RegisteredUsers in the 
 * database.
 */

include 'include/admin-authentication.php';

require_once __DIR__ . '/../models/RegisteredUser.php';

$pageNum = filter_input(INPUT_GET, 'pageNum', FILTER_VALIDATE_INT,
        array('options' => array('default' => 1)));

$users = RegisteredUser::$objects->filter(array(), 10, $pageNum, 'displayName');

$pageTitle = "Manage Users";
include 'include/admin-page-header.php';
?>

<div class="container">

    <div class="row">
        <div class="col-md-6">
            <h1><?php echo $pageTitle ?></h1>
            <?php include 'include/messages.php' ?>
        </div>
        <div class="col-md-6">
            <a class="btn btn-primary pull-right" href="user-edit.php" role="button">
                <span class="glyphicon glyphicon-plus"></span>
                Add User
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Display Name</th>
                        <th>Date Registered</th>
                        <th>Date Last Logged In</th>
                        <th>Account Enabled</th>
                        <th>Admin</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($users as $user) {
                        if ($user->accountEnabled) {
                            $accountEnabledIcon = '<span class="glyphicon glyphicon-ok"></span>';
                        } else {
                            $accountEnabledIcon = '-';
                        }
                        if ($user->admin) {
                            $adminIcon = '<span class="glyphicon glyphicon-ok"></span>';
                        } else {
                            $adminIcon = '-';
                        }
                    echo "<tr>
                        <td><a href='user-edit.php?userId=$user->id'>$user->email</a></td>
                        <td><a href='user-edit.php?userId=$user->id'>$user->displayName</a></td>
                        <td>$user->dateRegistered</td>
                        <td>$user->dateLastLoggedIn</td>
                        <td>$accountEnabledIcon</td>
                        <td>$adminIcon</td>
                    </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div> <!-- /.row -->

    <div class="row">
        <div class="col-md-12 text-center">
            <?php if ($pageNum > 1): ?>
            <a href="user-list.php?pageNum=<?php echo $pageNum - 1 ?>">
                <span class="glyphicon glyphicon-chevron-left"></span>
                Previous
            </a>
            <?php endif; ?>

            &nbsp;

            <?php
            echo "Showing "
                    . RegisteredUser::$objects->getFirstResultNum()
                    . " - "
                    . RegisteredUser::$objects->getLastResultNum()
                    . " of "
                    . RegisteredUser::$objects->getResultsCount()
                    . " users";
            ?>

            &nbsp;

            <?php if ($pageNum < RegisteredUser::$objects->getPageCount()): ?>
            <a href="user-list.php?pageNum=<?php echo $pageNum + 1 ?>">
                Next
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
            <?php endif; ?>

        </div>
    </div>

</div> <!-- /.container -->

<?php include 'include/admin-page-footer.php'; ?>
