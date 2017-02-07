<?php

/**
 * Testing script for Photo.php
 */

require_once __DIR__ . "/../models/Photo.php";

$photo = new Photo();
$photo->petListingId = (int) $_POST['petListingId'];

// Directory where file gets placed
$target_dir = __DIR__ . "/../" . MEDIA_URL . "photos/";

$target_file = $target_dir . basename($_FILES["file_to_upload"]["name"]);
$upload_ok = 1;
$image_file_type = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$filename = $_FILES["file_to_upload"]["name"];

// Check file size
if ($_FILES["file_to_upload"]["size"] > 5000000) {
    $_SESSION["errormsg"] = "Sorry, your file is too large. Keep it under 5mb";
    $upload_ok = 0;
}
// Allow certain file formats
if($image_file_type != "jpg" && $imageFileType != "jpeg") {
    $_SESSION["errormsg"] = "Sorry, only JPEG is allowed.";
    $upload_ok = 0;
}

// Make sure user filled out a desciption
if ($_POST['caption'] == null) {
    $_SESSION['errormsg'] = "You must fill out a caption.";
    $uploadOk = 0;
}

if ($upload_ok == 1) {
    $photo->setImageFile();
    $photo->caption = $_POST['caption'];
    $photo->save();
}

else {
    echo $_SESSION["errormsg"];
}
    
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Test Photo</title>
    </head>
    <body>
        <h1>Photo Uploaded</h1>
        <pre>
            <h2>Caption</h2>
                <?php echo $photo->getCaption(); ?> <br>
            <h2>Large photo</h2>
                <img src="<?php echo "../" . $photo->getLargeURL(); ?>" /> <br>
            <h2>Medium photo</h2>
                <img src="<?php echo "../" . $photo->getMedURL(); ?>" /> <br>
            <h2> Small photo</h2>
                <img src="<?php echo "../" . $photo->getSmallURL(); ?>" /> <br>
        </pre>  
    </body>
</html>


