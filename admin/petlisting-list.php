<!DOCTYPE html>

<?php
/**
 * This is the Manage Pet Listings page, which lists all the Pet Listings in 
 * the database, optionally filtering for approved or non-approved ("moderation 
 * queue").
 */

include 'include/admin-authentication.php';

require_once __DIR__ . '/../models/PetListing.php';

$pageNum = filter_input(INPUT_GET, 'pageNum', FILTER_VALIDATE_INT,
        array('options' => array('default' => 1)));
$filterByApproved = filter_input(INPUT_GET, 'filterByApproved', FILTER_VALIDATE_INT);
if (is_null($filterByApproved)) {
    $filterCriteria = array();
} else {
    $filterCriteria = array('approved' => $filterByApproved);
}

// FIXME: sort by dateSubmitted descending
$listings = PetListing::$objects->filter($filterCriteria, 10, $pageNum, 'dateSubmitted');

$pageTitle = "Manage Pet Listings";
include 'include/admin-page-header.php';
?>

<div class="container">

    <div class="row">
        <div class="col-md-5">
            <h1><?php echo $pageTitle ?></h1>
            <?php include 'include/messages.php' ?>
        </div>
        <div class="col-md-5">
            <div class="btn-group" role="group" aria-label="...">
                <a href="petlisting-list.php?filterByApproved=0" role="button"
                        class="btn btn-default <?php if ($filterByApproved === 0) echo 'active' ?>">Moderation Queue</a>
                  <a href="petlisting-list.php?filterByApproved=1" role="button"
                        class="btn btn-default <?php if ($filterByApproved === 1) echo 'active' ?>">Approved</a>
                  <a href="petlisting-list.php" role="button"
                        class="btn btn-default <?php if (is_null($filterByApproved)) echo 'active' ?>">All</a>
            </div>
        </div>
        <div class="col-md-2">
            <a class="btn btn-primary pull-right" href="petlisting-edit.php" role="button">
                <span class="glyphicon glyphicon-plus"></span>
                Add Pet Listing
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>Date Submitted</th>
                        <th>User</th>
                        <th>Pet name</th>
                        <th>Species</th>
                        <th>Approved</th>
                        <th>Date Approved</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($listings as $listing) {
                        $editURL = "petlisting-edit.php?petListingId=$listing->id";
                        if (!is_null($filterByApproved)) {
                            $editURL .= "&filterByApproved=$filterByApproved";
                        }
                        if ($listing->approved) {
                            $approvedIcon = '<span class="glyphicon glyphicon-ok"></span>';
                        } else {
                            $approvedIcon = '-';
                        }
                        $user = $listing->getUser();
                        echo "<tr>
                            <td><a href='$editURL'>$listing->dateSubmitted</a></td>
                            <td><a href='user-edit.php?userId=$user->id'>$user->email</a></td>
                            <td><a href='$editURL'>$listing->name</a></td>
                            <td><a href='$editURL'>$listing->species</a></td>
                            <td>$approvedIcon</td>
                            <td>$listing->approvedDate</td>
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
            <a href="?pageNum=<?php echo $pageNum - 1 ?>">
                <span class="glyphicon glyphicon-chevron-left"></span>
                Previous
            </a>
            <?php endif; ?>

            &nbsp;

            <?php
            echo "Showing "
                    . PetListing::$objects->getFirstResultNum()
                    . " - "
                    . PetListing::$objects->getLastResultNum()
                    . " of "
                    . PetListing::$objects->getResultsCount()
                    . " listings";
            ?>

            &nbsp;

            <?php if ($pageNum < PetListing::$objects->getPageCount()): ?>
            <a href="?pageNum=<?php echo $pageNum + 1 ?>">
                Next
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
            <?php endif; ?>

        </div>
    </div>

</div> <!-- /.container -->

<?php include 'include/admin-page-footer.php'; ?>
