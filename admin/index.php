<!DOCTYPE html>

<?php
/**
 * Home page of the admin site
 */

include 'include/admin-authentication.php';

require_once __DIR__ . '/../models/RegisteredUser.php';
require_once __DIR__ . '/../models/PetListing.php';

$newUsers = RegisteredUser::$objects->filter(array(), 10, 1, '-dateRegistered');

$newListings = PetListing::$objects->filter(array(), 10, 1, '-dateSubmitted');

$pageTitle = "Admin Home";
include 'include/admin-page-header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1><?php echo $pageTitle ?></h1>
            <?php include 'include/messages.php' ?>
        </div>
    </div>

    <div class="row">

        <div class="col-md-6">
            <h2>New Users</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Display Name</th>
                        <th>Date Registered</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($newUsers as $user) {
                        echo "
                            <tr>
                                <td><a href='user-edit.php?userId=$user->id'>$user->email</a></td>
                                <td>$user->displayName</td>
                                <td>$user->dateRegistered</td>
                            </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="col-md-6">
            <h2>New Pet Listings</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Pet Name</th>
                        <th>Submitted By</th>
                        <th>Date Submitted</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($newListings as $listing) {
                        echo "
                            <tr>
                                <td><a href='petlisting-edit.php?petListingId=$listing->id'>$listing->name</a></td>
                                <td>{$listing->getUser()->email}</td>
                                <td>$listing->dateSubmitted</td>
                            </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </div> <!-- /.row -->

</div> <!-- /.container -->

<?php include 'include/admin-page-footer.php'; ?>
