<?php
require_once 'Model.php';
require_once 'RegisteredUser.php';
require_once 'PersonalityTrait.php';
require_once 'Photo.php';
require_once __DIR__ . '/../managers/PetListingManager.php';

/**
 * A collection of information about a pet listed for adoption by a
 * RegisteredUser
 */
class PetListing extends Model {
    public $userId = null;
    public $zip = null;
    public $dateSubmitted = null;
    public $dateModified = null;
    public $approved = false;
    public $approvedById = null;
    public $approvedDate = null;
    public $name = null;
    public $species = null;
    public $sex = null;
    public $age = null;
    public $description = null;
    public $deSexed = null;
    public $microchipped = null;
    public $declawed = null;
    public $outdoor = null;
    public $hypoallergenic = null;
    public $breed = null;
    
    private $user = null;
    private $approvedByUser = null;
    private $personalityTraits = null;
    private $photos = null;

    public static $ageCategories = array("Young", "Adult", "Senior");
    
    /**
     * @return RegisteredUser The user who listed the pet
     */
    public function getUser() {
        if (is_null($this->user)) {
            $this->user = RegisteredUser::$objects->get($this->userId);
        }
        return $this->user;
    }
    
    /**
     * @return RegisteredUser The admin user who approved the listing
     */
    public function getApprovedByUser() {
        if (is_null($this->approvedByUser)) {
            $this->approvedByUser =
                    RegisteredUser::$objects->get($this->approvedById);
        }
        return $this->approvedByUser;
    }
       
    /**
     * @return array The personality traits associated with the pet
     */
    public function getPersonalityTraits() {
        if (is_null($this->personalityTraits)) {
            $this->personalityTraits =
                    PersonalityTrait::$objects->getByPetListingId($this->id);
        }
        return $this->personalityTraits;
    }
    
    /**
     * @param array $traits The personality traits to associate with the pet
     */
    public function setPersonalityTraits($traits) {
        $this->personalityTraits = $traits;
    }
            
    /**
     * @return array The photos attached to the listing
     */
    public function getPhotos() {
        if (is_null($this->photos)) {
            $this->photos = Photo::$objects->filter(
                    array('petListingId' => $this->id),
                    100, 1);
        }
        return $this->photos;
    }

    /**
     * @return string The URL to the thumbnail image for the the listing
     */
    public function getThumbnailURL() {
        $photos = $this->getPhotos();
        if (empty($photos)) {
            return "img/default-photo-$this->species-small.png";
        } else {
            return $photos[0]->getSmallURL();
        }
    }
    
    public static $objects;
}

PetListing::$objects = new PetListingManager('PetListing');
