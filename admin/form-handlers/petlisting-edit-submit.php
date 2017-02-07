<?php
/**
 * Takes a POST request from the petlisting-edit form, validates the form data, 
 * and if valid, saves the new or existing pet listing to the database.
 */

require_once __DIR__ . '/../../models/PetListing.php';
require_once __DIR__ . '/../../models/Photo.php';
require_once __DIR__ . '/../../models/RegisteredUser.php';
require_once __DIR__ . '/../../exceptions/DoesNotExist.php';

include __DIR__ . '/../include/admin-authentication.php';

$_SESSION['formErrors'] = array();

$petListingId = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT,
        array("options" => array("default" => 0)));
$newListing = ($petListingId == 0);

if ($newListing) {
    $listing = new PetListing();
} else {
    $listing = PetListing::$objects->get($petListingId);
}

$listing->name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
if ($listing->name) {
    $listing->name = trim($listing->name);
}
if (!$listing->name || empty($listing->name)) {
    $_SESSION['formErrors']['displayName'] = "Pet name is required";
}

$listing->breed = filter_input(INPUT_POST, 'breed', FILTER_SANITIZE_STRING);
if ($listing->breed) {
    $listing->breed = trim($listing->breed);
}
if (!$listing->breed || empty($listing->breed)) {
    $_SESSION['formErrors']['displaybreed'] = "Breed is required";
}

// Assume fields values have been set correctly from radio buttons
$listing->species = filter_input(INPUT_POST, 'species', FILTER_SANITIZE_STRING);
$listing->sex = filter_input(INPUT_POST, 'sex', FILTER_SANITIZE_STRING);
$listing->age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_STRING);
$listing->deSexed = filter_input(INPUT_POST, 'deSexed',
        FILTER_VALIDATE_BOOLEAN);
$listing->microchipped = filter_input(INPUT_POST, 'microchipped',
        FILTER_VALIDATE_BOOLEAN);
$listing->declawed = filter_input(INPUT_POST, 'declawed',
        FILTER_VALIDATE_BOOLEAN);
$listing->outdoor = filter_input(INPUT_POST, 'outdoor',
        FILTER_VALIDATE_BOOLEAN);
$listing->hypoallergenic = filter_input(INPUT_POST, 'hypoallergenic',
        FILTER_VALIDATE_BOOLEAN);

$listing->zip = filter_input(INPUT_POST, 'zip', FILTER_VALIDATE_INT,
    array("options" => array("default" => 0, "min_range" => 10000,
        "max_range" => 99999)));

$listing->description = filter_input(INPUT_POST, 'description',
        FILTER_SANITIZE_STRING);
if ($listing->description) {
    $listing->description = trim($listing->description);
}
if (!$listing->description || empty($listing->description)) {
    $_SESSION['formErrors']['description'] = "Description is required";
}

$approved = filter_input(INPUT_POST, 'approved', FILTER_VALIDATE_BOOLEAN);
if (!$listing->approved && $approved) {
    // This listing has just been approved
    $listing->approvedById = $_SESSION['userId'];
    $listing->approvedDate = PetListing::$objects->formatDateTime(
            new DateTime());
}
$listing->approved = $approved;

if (count($_SESSION['formErrors']) == 0) {
    // No errors, so save the listing and return to petlisting-list
    if ($newListing) {
        $listing->userId = $_SESSION['userId'];
        $listing->dateSubmitted = PetListing::$objects->formatDateTime(
                new DateTime());
        $listing->dateModified = $listing->dateSubmitted;
    } else {
        $listing->dateModified = PetListing::$objects->formatDateTime(
                new DateTime());
    }
    $listing->save();

    // Save the photos
    if (isset($_POST['photoCaptions'])) {
        $photoCaptions = $_POST['photoCaptions'];
    } else {
        $photoCaptions = array();
    }
    foreach ($photoCaptions as $photoId => $caption) {
        $photo = Photo::$objects->get($photoId);
        $photo->caption = $caption;
        $photo->save();
    }

    unset($_SESSION['formErrors']);
    $_SESSION['message'] = "Successfully saved listing $listing->name";

    if ($_POST['submit'] == 'save-next') {
        // Go to the next unapproved listing
        try {
            $nextListing = PetListing::$objects->getNextUnapproved($listing);
            header('Location: ../petlisting-edit.php?petListingId='
                    . $nextListing->id);
        } catch (DoesNotExist $e) {
            header('Location: ../petlisting-list.php');
        }

    } else {
        header('Location: ../petlisting-list.php');
    }

} else {
    // There were errors in the form
    $_SESSION['listingBeingEdited'] = $listing;
    header('Location: ../petlisting-edit.php');
}
