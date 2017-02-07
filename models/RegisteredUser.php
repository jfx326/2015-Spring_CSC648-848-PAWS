<?php
require_once "Model.php";
require_once (__DIR__.'/../managers/RegisteredUserManager.php');

/**
 * A user account created through self-registration or registration by an
 * administrator
 *
 * @author Ben Saylor
 */
class RegisteredUser extends Model {
    public $email = null;
    public $displayName = null;
    public $dateRegistered = null;
    public $dateLastLoggedIn = null;
    public $accountEnabled = false;
    public $admin = false;
    public $passwordHash = null;  // needs to be public to be accessible to manager
    public $verificationHash = null;
    
    /**
     * Set the stored password hash from the given plaintext password.
     * 
     * @param string $password The plaintext password to set
     */
    public function setPassword($password) {
        $this->passwordHash = crypt($password);
    }
    
    /**
     * Check the given plaintext password against the stored password hash.
     * 
     * @param string $password The plaintext password to check
     * @return boolean TRUE if the password matches the stored hash; FALSE otherwise
     */
    public function checkPassword($password) {
        if (crypt($password, $this->passwordHash) == $this->passwordHash){
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * Check if user is activated or not.
     * 
     * @return type bool
     */
    public function checkIfEnabled() {
        return $this->accountEnabled;
    }
    
    public function createVerificationHash() {
        $this->verificationHash = md5(rand());
    }
    
    /**
     * Activate user once they click verification link from email.
     * 
     * @param type $hash
     */
    public function activateUser($hash) {
        if ($hash == $this->verificationHash) {
            $this->accountEnabled = true;
        } else {
            echo "Hash did not match.";
        }
    }
    
    public static $objects;
}

RegisteredUser::$objects = new RegisteredUserManager('RegisteredUser');
