<!DOCTYPE html>

<?php
/**
 * This is the Add/Edit Pet Listing page
 */

require_once __DIR__ . '/../models/PetListing.php';
require_once __DIR__ . '/../models/RegisteredUser.php';
require_once __DIR__ . '/../exceptions/DoesNotExist.php';

include 'include/admin-authentication.php';

$filterByApproved = filter_input(INPUT_GET, 'filterByApproved', FILTER_VALIDATE_INT);
if (is_null($filterByApproved)) {
    $listURL = 'petlisting-list.php';
} else {
    $listURL = 'petlisting-list.php?filterByApproved=' . $filterByApproved;
}

$petListingId = filter_input(INPUT_GET, 'petListingId', FILTER_VALIDATE_INT,
        array("options" => array("default" => 0)));

if (isset($_SESSION['listingBeingEdited'])) {
    $listing = $_SESSION['listingBeingEdited'];
    unset($_SESSION['listingBeingEdited']);
} elseif ($petListingId) {
    try {
        $listing = PetListing::$objects->get($petListingId);
    } catch (DoesNotExist $e) {
        $listing = new PetListing();
    }
} else {
    $listing = new PetListing();
}

if ($listing->id) {
    $pageTitle = "Edit Pet Listing";
    $user = $listing->getUser();
} else {
    $pageTitle = "Add Pet Listing";
    $user = new RegisteredUser();
}

if ($listing->approved && $listing->approvedById) {
    $approvedByUser = $listing->getApprovedByUser();
} else {
    $approvedByUser = new RegisteredUser();
}

/**
 * Generate and echo a set of radio buttons with the given name, values, labels, 
 * and selected value.
 */
function makeRadioButtons($name, $values, $labels, $selectedValue) {
    for ($i = 0; $i < count($values); $i++) {
        $value = $values[$i];
        $label = $labels[$i];
        $checked = $value == $selectedValue ? 'checked="checked"' : ' ';
        echo "
            <label class='radio-inline'>
                <input type='radio' name='$name' value='$value' $checked />
                $label
            </label>";
    }
}

include 'include/admin-page-header.php';
?>

<div class="container">

    <div class="row">
        <div class="col-md-12">
            <h1><?php echo $pageTitle ?></h1>
            <?php include 'include/messages.php' ?>
            <?php
            if (!empty($_SESSION['formErrors'])) {
                echo "<div class='alert alert-danger' role='alert'>Please correct the following errors:</div>";
                foreach ($_SESSION['formErrors'] as $field => $error) {
                    echo "<div class='alert alert-danger' role='alert'>$field: $error</div>";
                }
                unset($_SESSION['formErrors']);
            }
            ?>

        </div>
    </div>

    <form class="form-horizontal" action="form-handlers/petlisting-edit-submit.php" method="post">
        <input type="hidden" name="id" value="<?php echo $listing->id ?>"/>
        <input type="hidden" name="filterByApproved" value="<?php echo $filterByApproved ?>"/>

        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Submitted by</label>
            <div class="col-sm-6">
                <p class="form-control-static"><?php echo "$user->displayName ($user->email)" ?></p>
            </div>
        </div>

        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Submitted on</label>
            <div class="col-sm-6">
                <p class="form-control-static"><?php echo $listing->dateSubmitted ?></p>
            </div>
        </div>

        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Modified on</label>
            <div class="col-sm-6">
                <p class="form-control-static"><?php echo $listing->dateModified ?></p>
            </div>
        </div>

        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Pet name</label>
            <div class="col-sm-6">
                <input type="text" name="name" class="form-control" id="name" value="<?php echo $listing->name ?>">
            </div>
        </div>

        <div class="form-group">
            <label for="breed" class="col-sm-2 control-label">Breed</label>
            <div class="col-sm-6">
                <input type="text" name="breed" class="form-control" id="breed" value="<?php echo $listing->breed ?>">
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-sm-2 control-label">Species</label>
            <div class="col-sm-6">
                <?php makeRadioButtons('species', array('cat', 'dog', 'other'), array("Cat", "Dog", "Other"), $listing->species); ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Sex</label>
            <div class="col-sm-6">
                <?php makeRadioButtons('sex', array('M', 'F'), array("Male", "Female"), $listing->sex); ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Age</label>
            <div class="col-sm-6">
                <?php makeRadioButtons('age', PetListing::$ageCategories, PetListing::$ageCategories, $listing->age); ?>
            </div>
        </div>

        <div class="form-group">
            <label for="zip" class="col-sm-2 control-label">ZIP code</label>
            <div class="col-sm-6">
                <input type="text" name="zip" class="form-control" id="zip" value="<?php echo $listing->zip ?>">
            </div>
        </div>

        <div class="form-group">
            <label for="description" class="col-sm-2 control-label">Description</label>
            <div class="col-sm-6">
                <textarea name="description" class="form-control" id="description"><?php echo $listing->description ?></textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Neutered/spayed</label>
            <div class="col-sm-6">
                <?php makeRadioButtons('deSexed', array(1, 0), array("Yes", "No"), $listing->deSexed); ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Microchipped</label>
            <div class="col-sm-6">
                <?php makeRadioButtons('microchipped', array(1, 0), array("Yes", "No"), $listing->microchipped); ?>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-sm-2 control-label">Declawed</label>
            <div class="col-sm-6">
                <?php makeRadioButtons('declawed', array(1, 0), array("Yes", "No"), $listing->declawed); ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Outdoor</label>
            <div class="col-sm-6">
                <?php makeRadioButtons('outdoor', array(1, 0), array("Yes", "No"), $listing->outdoor); ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Hypoallergenic</label>
            <div class="col-sm-6">
                <?php makeRadioButtons('hypoallergenic', array(1, 0), array("Yes", "No"), $listing->hypoallergenic); ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Photos</label>
            <div class="col-sm-10">
                    <?php
                    foreach ($listing->getPhotos() as $photo) {
                        $smallURL = $photo->getSmallURL();
                        echo "<div class='row'>";
                        echo "<div class='col-sm-4'><img class='img-responsive img-thumbnail' src='../$smallURL'/></div>";
                        /*
                        echo "<div class='col-sm-1'><label><input type='checkbox' class='form-control' name='deletePhoto[$photo->id]'/>Delete</label></div>";
                         */
                        echo "<div class='col-sm-8'><input type='text' class='form-control' name='photoCaptions[$photo->id]' value='$photo->caption' /></div>";
                        echo "</div>";
                    }
                    ?>
            </div> <!-- /.col-sm-10 -->
        </div>

        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Approved by</label>
            <div class="col-sm-6">
                <p class="form-control-static"><?php echo "$approvedByUser->displayName ($approvedByUser->email)" ?></p>
            </div>
        </div>

        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Approved on</label>
            <div class="col-sm-6">
                <p class="form-control-static"><?php echo $listing->approvedDate ?></p>
            </div>
        </div>
        
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Approved</label>
            <div class="col-sm-6">
                <div class="panel panel-success">
                    <div class="panel-heading">Approve this pet listing and make it public?</div>
                    <div class="panel-body">
                        <?php makeRadioButtons('approved', array(1, 0), array("Yes", "No"), $listing->approved); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-3">
                <a role="button" href="<?php echo $listURL ?>" class="btn btn-default btn-lg">Cancel</a>
            </div>
            <div class="col-sm-3">
                <button type="submit" name="submit" value="delete" class="btn btn-danger">Delete</button>
            </div>
            <div class="col-sm-3">
                <button type="submit" name="submit" value="save" class="btn btn-primary btn-lg">Save</button>
            </div>
            <div class="col-sm-3">
                <button type="submit" name="submit" value="save-next" class="btn btn-primary btn-lg pull-right">Save and Next Unapproved</button>
            </div>
        </div>
    </form>

</div> <!-- /.container -->

<?php include 'include/admin-page-footer.php'; ?>
