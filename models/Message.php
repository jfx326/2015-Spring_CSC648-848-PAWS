<?php
require_once 'Model.php';
require_once 'RegisteredUser.php';

/**
 * A message from one registered user to another, typically containing a request
 * to adopt or an exchange of inquiries and information about a pet listing.
 */
class Message extends Model {
    public $senderId = null;
    public $recipientId = null;
    public $petListingId = null;
    public $dateSent = null;
    public $read = null;
    public $subject = null;
    public $body = null;
    public $recipient = null;
    
    private $sender = null;
    private $petListing = null;
    
    /**
     * @return RegisteredUser The sender of the message
     */
    public function getSender() {
        if (is_null($this->sender)) {
            $this->sender = RegisteredUser::$objects->get($this->senderId);
        }
        return $this->sender;
    }
    
    /**
     * @return RegisteredUser The recipient of the message
     */
    public function getRecipient() {
        if (is_null($this->recipient)) {
            $this->recipient = RegisteredUser::$objects->get($this->recipientId);
        }
        return $this->recipient;
    }
    
    /**
     * @return PetListing The listing the message concerns
     */
    public function getPetListing() {
        if (is_null($this->petListing)) {
            $this->petListing = PetListing::$objects->get($this->petListingId);
        }
        return $this->petListing;
    }
    
    public static $objects;
}

Message::$objects = new Manager('Message');