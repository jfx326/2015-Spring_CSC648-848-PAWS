<?php

/**
 * This script manages the connection to the database.
 */

require_once 'settings.php';
require DB_CONFIG_FILE;

/**
 * Get a connection to the database as a PDO object
 * 
 * @staticvar PDO $dbh
 * @return PDO The connection handle
 */
function getDBConnection() {
    static $dbh = null;  // Only create a connection once per request
    if (is_null($dbh)) {
        $dbh = new PDO('mysql:host=localhost;dbname=student_s15g08', 's15g08', 'SPLxtcGKnt');
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }
    return $dbh;
}