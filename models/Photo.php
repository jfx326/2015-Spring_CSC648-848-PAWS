<?php
require_once __DIR__ . '/../include/settings.php';
require_once "Model.php";
require_once __DIR__ . '/../managers/Manager.php';

/**
 * A photo of a pet in three sizes, attached to a PetListing
 */
class Photo extends Model {
    public $petListingId = null;
    public $smallFilename = null;
    public $medFilename = null;
    public $largeFilename = null;
    public $caption = null;
    
    /**
     * @return PetListing The PetListing associated with this Photo
     */
    public function getPetListing() {
        // TODO: Probably delete this method: it causes a circular dependency
        // between Photo and PetListing, and is probably not needed anway
    }
    
    /**
     * @return string The URL to the small version of the image
     */
    public function getSmallURL() {
        return MEDIA_URL . "photos/$this->smallFilename";
    }
    
    /**
     * @return string The URL to the medium version of the image
     */
    public function getMedURL() {
        return MEDIA_URL . "photos/$this->medFilename";
    }
    
    /**
     * @return string The URL to the large version of the image
     */
    public function getLargeURL() {
        return MEDIA_URL . "photos/$this->largeFilename";
    }
    
    /**
     * @return string The caption text.
     */
    public function getCaption() {
        return $this->caption;
    }


    /**
     * Sets up uploaded image file.
     *
     * @param string $filename the full path to the original file
     */
    public function setImageFile($filename) {
        $hash = md5(time() . $filename);
        $this->resizeImage($filename, $hash);
        $this->largeFilename = $hash . "-large.jpg";
        $this->medFilename = $hash . "-medium.jpg";
        $this->smallFilename = $hash . "-small.jpg";
    }
    
    /**
     * Resizes and saves images to file system and sets file names.
     * 
     * @param string $filename the source filename
     * @param string $hash uniquely identifying base name
     */
    private function resizeImage($filename, $hash) {
        $target_dir = "../" . MEDIA_URL . "photos/";
        list($width, $height) = getimagesize($filename);

        // Setting thumbnail filenames.
        $large_filename = MEDIA_URL . "photos/" . $hash . "-large.jpg";
        $medium_filename = MEDIA_URL . "photos/". $hash . "-medium.jpg";
        $small_filename = MEDIA_URL . "photos/". $hash . "-small.jpg";

        // Calculating new aspect ratios.
        
        if ($height < $width) {
            $large_width = LARGE_IMAGE_WIDTH;
            $large_height = ($height * $large_width) / $width;
            $medium_width = MEDIUM_IMAGE_WIDTH;
            $medium_height = ($height * $medium_width) / $width;
            $small_width = SMALL_IMAGE_WIDTH;
            $small_height = ($height * SMALL_IMAGE_WIDTH) / $width;
        } else {
            $large_height = LARGE_IMAGE_HEIGHT;
            $large_width = ($width * $large_height) /  $height;
            $medium_height = MEDIUM_IMAGE_HEIGHT;
            $medium_width = ($width * $medium_height) /  $height;
            $small_height = SMALL_IMAGE_HEIGHT;
            $small_width =  ($width * $small_height) /  $height; 
        }
        
        // Resampling
        $image_large = imagecreatetruecolor($large_width, $large_height);
        $image_medium = imagecreatetruecolor($medium_width, $medium_height);
        $image_small = imagecreatetruecolor($small_width, $small_height);
        
        // Saving original file and creating resized copies.
        $image = imagecreatefromjpeg($filename);
        
        imagecopyresampled($image_large, $image, 
                0, 0, 0, 0, $large_width, $large_height, $width, $height);
        imagecopyresampled($image_medium, $image, 
                0, 0, 0, 0, $medium_width, $medium_height, $width, $height);
        imagecopyresampled($image_small, $image, 
                0, 0, 0, 0, $small_width, $small_height, $width, $height);
        
        // Saving to photos folder.
        imagejpeg($image_large, "../" . $large_filename, 85);
        imagejpeg($image_medium, "../" . $medium_filename, 85); 
        imagejpeg($image_small, "../" . $small_filename, 85); 
    }
    
    public static $objects;
}

Photo::$objects = new Manager('Photo');
