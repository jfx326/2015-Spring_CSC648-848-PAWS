<?php
session_name("PAWS_SESSION_ID");
session_start();
require_once __DIR__ . '/../models/PetListing.php';
require_once __DIR__ . "/../models/Photo.php";

/*
 * This script saves the posted PetListing data to the PetListing Model.
 */
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    echo "This page must be requested using POST.";
    die();
}

if (!isset($_SESSION['userId'])) {
    echo "You mused be logged in to use this feature.";
    die();
}

if ($_POST['id'] > 0) {
    $listing = PetListing::$objects->get($_POST['id']);
} else {
    $listing = new PetListing();
}

if (formValidation()) {

    $listing->userId = $_SESSION['userId'];
    $listing->name = $_POST['name'];
    $listing->description = $_POST['description'];
    $listing->species = $_POST['species'];
    $listing->sex = $_POST['sex'];
    $listing->zip = $_POST['zip'];
    $listing->age = $_POST['age'];
    $listing->breed = $_POST['breed'];
    $listing->deSexed = $_POST['deSexed'];
    $listing->declawed = $_POST['declawed'];
    $listing->microchipped = $_POST['microchipped'];
    $listing->outdoor = $_POST['outdoor'];
    $listing->hypoallergenic = $_POST['hypoallergenic'];
    $listing->dateSubmitted = date("Y-m-d H:i:s");
    $listing->dateModified = date("Y-m-d H:i:s");
    
    for ($i=0; $i < 4; $i++) {
        if (isset($_POST['photo'][$i])) {
            $photo = new Photo();
            $photo->petListingId = $listing->id;

            // Directory where file gets placed
            $target_dir = "../" . MEDIA_URL . "photos/";

            $target_file = $target_dir . basename($_FILES["photo"]["name"][$i]);
            $image_file_type = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $filename = $_FILES["photo"][$i]["name"];

            // Check file size
            if ($_FILES["photo"]["size"][$i] > 5000000) {
                $_SESSION["errormsg"] = "Sorry, your file is too large. Keep it under 5mb";
                $upload_ok = 0;
            }

            // Allow certain file formats
            if($image_file_type != "jpg" && $imageFileType != "jpeg") {
                $_SESSION["errormsg"] = "Sorry, only JPEG is allowed.";
                $upload_ok = 0;
            }

            // Make sure user filled out a desciption
            if ($_POST['caption'][$i] == null) {
                $_SESSION['errormsg'] = "You must fill out a caption.";
                $uploadOk = 0;
            }

            if ($upload_ok == 1) {
                $photo->setImageFile();
                $photo->caption = $_POST['caption'][$i];
                $photo->save();
            } else {
                header('Location: ../pet-registration.php');
                echo $_SESSION['errormsg'];
            }
        }
    }
    $listing->save();

    $_SESSION['message'] = "Pet listing successfully saved.";
    header('Location: ../yourpets.php');
    
// Validation failed.
} else {
    $_SESSION["errormsg"];
}


/**
 * Validates
 * 
 * @return boolean $valid
 */
function formValidation() {
    $valid = true;
    $error = "";
    
    // No fields can be empty.
    if ($_POST['name'] == NULL || 
            $_POST['description'] == NULL || 
            $_POST['zip'] == NULL ||
            $_POST['age'] == NULL ||
            $_POST['breed'] == NULL) {
        $error.= "All fields are required." . "\xA";
    }
    
    // Checking for proper username.
    if (!preg_match("/^[a-zA-Z ]*$/",$_POST['name'])) {
        $error.= "Only letters and white space allowed for pet name" . "\xA"; 
    }
    
    if ($error != "") {
        $_SESSION["errormsg"] = $error;
        $valid = false;
    }
    
    return $valid;
}

?>