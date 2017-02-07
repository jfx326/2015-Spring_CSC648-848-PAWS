<!DOCTYPE html>

<?php
/**
 * Testing script for PersonalityTrait model
 */

require_once __DIR__ . "/../models/PetListing.php";
require_once __DIR__ . "/../models/PersonalityTrait.php";

?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>All Personality Traits</h1>
        <pre>
        <?php

        print_r(PersonalityTrait::$objects->all());
        ?>
        </pre>
        
        <h1>By Pet</h1>

        <?php

        foreach (PetListing::$objects->all() as $listing) {
            echo "<h2>$listing->name ($listing->id)</h2>";
            echo "<pre>";
            print_r($listing->getPersonalityTraits());
            echo "</pre>";
            ?>
        
        
        <?php
        }
         
        ?>

    </body>
</html>
