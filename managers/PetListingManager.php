<?php
require_once 'Manager.php';
require_once __DIR__ . '/../exceptions/DoesNotExist.php';

/**
 * Custom manager class for PetListing
 */
class PetListingManager extends Manager {

    /**
     * Get the next unapproved PetListing that was submitted after the given 
     * listing. If there is no such listing, the oldest unapproved listing in 
     * the database is returned.
     *
     * @param PetListing $listing The listing to compare
     * @return PetListing The next unapproved listing
     * @throws DoesNotExist if there are no unapproved listings
     */
    public function getNextUnapproved($listing) {
        $dbh = getDBConnection();
        $stmt = $dbh->prepare("
                select * from $this->model
                where not approved
                and dateSubmitted >= :dateSubmitted
                and id != :id
                order by dateSubmitted
                limit 1");
        $stmt->bindParam(':dateSubmitted', $listing->dateSubmitted);
        $stmt->bindParam(':id', $listing->id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, $this->model);
        $instance = $stmt->fetch();
        if ($instance == false) {
            $stmt = $dbh->prepare("
                    select * from $this->model
                    where not approved
                    order by dateSubmitted
                    limit 1");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, $this->model);
            $instance = $stmt->fetch();
            if ($instance == false) {
                throw new DoesNotExist("No unapproved pet listings");
            }
        }
        return $instance;
    }
}
