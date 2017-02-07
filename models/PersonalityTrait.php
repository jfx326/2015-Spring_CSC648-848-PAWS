<?php
require_once "Model.php";
require_once __DIR__ . '/../managers/PersonalityTraitManager.php';

/**
 * A tag describing some characteristic of a pet's personality in a word or very
 * short phrase. Each pet listing may have multiple personality traits
 * describing the pet.
 */
class PersonalityTrait extends Model {
    public $name = null;
    
    public static $objects;
}

PersonalityTrait::$objects = new PersonalityTraitManager('PersonalityTrait');