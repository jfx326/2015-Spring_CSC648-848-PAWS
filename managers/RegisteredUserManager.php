<?php
require_once 'Manager.php';
require_once (__DIR__.'/../exceptions/DoesNotExist.php');

/**
 * Custom manager class for RegisteredUser
 */
class RegisteredUserManager extends Manager {
    
    /**
     * Get a RegisteredUser by email address
     * 
     * @param string $email
     * @return RegisteredUser
     * @throws DoesNotExist if no user exists with the given email
     */
    public function getByEmail($email) {
        $dbh = getDBConnection();
        $stmt = $dbh->prepare("select * from $this->model where email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, $this->model);
        $instance = $stmt->fetch();
        if ($instance == false) {
            throw new DoesNotExist("No RegisteredUser with email $email");
        }
        return $instance;
    }

    /**
     * Get a RegisteredUser by display name
     * 
     * @param string $displayName
     * @return RegisteredUser
     * @throws DoesNotExist if no user exists with the given display name
     */
    public function getByDisplayName($displayName) {
        $dbh = getDBConnection();
        $stmt = $dbh->prepare(
                "select * from $this->model where displayName = :displayName");
        $stmt->bindParam(':displayName', $displayName);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, $this->model);
        $instance = $stmt->fetch();
        if ($instance == false) {
            throw new DoesNotExist(
                    "No RegisteredUser with displayName $displayName");
        }
        return $instance;
    }
}
