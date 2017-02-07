<?php
require_once 'Manager.php';
require_once (__DIR__.'/../exceptions/DoesNotExist.php');

/**
 * Custom manager class for PersonalityTrait
 */
class PersonalityTraitManager extends Manager {
    
    /**
     * Get the PersonalityTraits for the given PetListing
     * 
     * @param type $petListingId ID of the PetListing
     * @return array of PersonalityTraits for the given PetListing
     */
    function getByPetListingId($petListingId) {
        $dbh = getDBConnection();
        $stmt = $dbh->prepare(
                "select PT.* from $this->model as PT "
                . "inner join PetListing_PersonalityTrait on personalityTraitId = id "
                . "where petListingId = :petListingId");
        $stmt->bindParam(':petListingId', $petListingId);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, $this->model);
        $instances = $stmt->fetchAll();
        return $instances;
    }
}
