<?php

require_once __DIR__ . '/../include/settings.php';
require_once __DIR__ . '/../models/RegisteredUser.php';
require_once __DIR__ . '/../models/Message.php';

/**
 * Sends Messages between RegisteredUsers for display on the website, and by
 * email.
 * 
 * This is a singleton class; call getInstance() to get the instance.
 */
class MessagingService {
    
    private static $instance = null;
    
    /**
     * @return MessagingService The singleton instance of this class
     */
    public static function getInstance() {
        if (is_null(static::$instance)) {
            static::$instance = new MessagingService();
        }
        return static::$instance;
    }
    
    // Empty to disallow direct instantiation
    private function __construct() {
    }
    
    /**
     * Send a Message populated with at least the following required fields:
     *   recipientId
     *   subject
     *   body
     * The following fields are optional:
     *   senderId may be null to indicate that it is a message from the system
     *   petListingId should be populated if the message pertains to a
     *     particular PetListing.
     * The other data fields of the message will be initialized automatically.
     * 
     * @param Message $message the Message to send
     */
    public function sendMessage($message) {
        $message->dateSent = Message::$objects->formatDateTime(new DateTime());
        $message->read = false;
        $message->save();
        
        // FIXME: If the user is subscribed to email notifications,
        // call emailMessage($message)
    }
    
    /**
     * Email a Message populated with at least the following required fields:
     *   recipientId
     *   subject
     *   body
     * The following fields are optional:
     *   senderId may be null to indicate that it is a message from support
     *   petListingId should be populated if the message pertains to a
     *     particular PetListing.
     * The other data fields of the message will be initialized automatically.
     * 
     * @param Message $message the Message to send
     */
    public function emailMessage($message) {
        if (is_null($message->senderId)) {
            $from = SUPPORT_EMAIL;
        } else {
            $from = $message->getSender()->email;
        }
        $to = $message->getRecipient()->email;
        $subject = $message->subject;
        $body = $message->body;
        $headers = "From:$from\r\n";
        mail($to, $subject, $body, $headers);
    }
}
