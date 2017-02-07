<!DOCTYPE html>

<?php
/**
 * This is the Add/Edit user page
 */

require_once __DIR__ . '/../models/RegisteredUser.php';
require_once __DIR__ . '/../exceptions/DoesNotExist.php';

include 'include/admin-authentication.php';

$userId = filter_input(INPUT_GET, 'userId', FILTER_VALIDATE_INT,
        array("options" => array("default" => 0)));

if (isset($_SESSION['userBeingEdited'])) {
    $user = $_SESSION['userBeingEdited'];
    unset($_SESSION['userBeingEdited']);
} elseif ($userId) {
    try {
        $user = RegisteredUser::$objects->get($userId);
    } catch (DoesNotExist $e) {
        $user = new RegisteredUser();
    }
} else {
    $user = new RegisteredUser();
}

if ($user->id) {
    $pageTitle = "Edit User";
} else {
    $pageTitle = "Add User";
}
include 'include/admin-page-header.php';
?>


<div class="container">

    <div class="row">
        <div class="col-md-12">
            <h1><?php echo $pageTitle ?></h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">

            <?php
            if (!empty($_SESSION['formErrors'])) {
                echo "<div class='alert alert-danger' role='alert'>Please correct the following errors:</div>";
                foreach ($_SESSION['formErrors'] as $field => $error) {
                    echo "<div class='alert alert-danger' role='alert'>$field: $error</div>";
                }
            }
            ?>

            <form class="form-horizontal" action="form-handlers/user-edit-submit.php" method="post">
                <input type="hidden" name="id" value="<?php echo $user->id ?>"/>
                <div class="form-group">
                    <label for="email" class="col-sm-4 control-label">Email</label>
                    <div class="col-sm-8">
                        <input type="email" name="email" class="form-control" id="email" value="<?php echo $user->email?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="displayName" class="col-sm-4 control-label">Display name</label>
                    <div class="col-sm-8">
                        <input type="text" name="displayName" class="form-control" id="displayName" value="<?php echo $user->displayName ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="admin" class="col-sm-4 control-label">Admin</label>
                    <div class="col-sm-8">
                        <label class="radio-inline">
                            <input type="radio" name="admin" id="admin" value="1" <?php if ($user->admin) echo 'checked="checked"' ?>>
                            Yes
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="admin" id="admin" value="0"  <?php if (!$user->admin) echo 'checked="checked"' ?>>
                            No
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="accountEnabled" class="col-sm-4 control-label">Account enabled</label>
                    <div class="col-sm-8">
                        <label class="radio-inline">
                            <input type="radio" name="accountEnabled" id="accountEnabled" value="1" <?php if ($user->accountEnabled) echo 'checked="checked"' ?>>
                            Yes
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="accountEnabled" id="accountEnabled" value="0"  <?php if (!$user->accountEnabled) echo 'checked="checked"' ?>>
                            No
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Date registered</label>
                    <div class="col-sm-8">
                        <p class="form-control-static"><?php echo $user->dateRegistered ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Date logged in</label>
                    <div class="col-sm-8">
                        <p class="form-control-static"><?php echo $user->dateLastLoggedIn ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-4 control-label">New password</label>
                    <div class="col-sm-8">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Leave blank if you don't wish to change it">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password2" class="col-sm-4 control-label">Confirm new password</label>
                    <div class="col-sm-8">
                        <input type="password" name="password2" class="form-control" id="password2" placeholder="Enter the same new password again">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-4 col-sm-offset-4">
                        <a role="button" href="user-list.php" class="btn btn-default btn-lg">Cancel</a>
                    </div>
                    <div class="col-sm-4">
                        <button type="submit" class="btn btn-primary btn-lg pull-right">Save</button>
                    </div>
                </div>

            </form>

        </div> <!-- /.col-md-6 -->
        <div class="col-md-6">
        </div>
    </div> <!-- /.row -->

</div> <!-- /.container -->

<?php include 'include/admin-page-footer.php'; ?>
