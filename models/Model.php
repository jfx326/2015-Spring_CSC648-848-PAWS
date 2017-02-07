<?php

/**
 * Base class for data models
 *
 * Data models form the layer of abstraction between the database and the rest
 * of the application. These consist of classes that map closely to database
 * tables. Each instance of a model class represents a row in the corresponding
 * database table, similar to ORM systems. In addition to having a set of
 * variables corresponding to the columns of its associated database table, a
 * model may have methods implementing business logic that is tightly coupled to
 * the model data.
 *
 * Model classes correspond to database tables with the same name, and have
 * (usually) public properties with the same names as the columns in the table.
 *
 * @author Ben Saylor
 */
abstract class Model {

    /** @var integer All models have an $id attribute corresponding to the primary key of the table. */
    public $id = null;
    
    /**
     * Each model class has a static instance of Manager, or a subclass, which
     * should be set immediately after the model class definition.
     * 
     * NOTE: Every model subclass must redeclare this variable, because
     * in PHP, subclasses share the same instance of an inherited static
     * variable, unless it is redeclared.
     * 
     * @var Manager The manager instance for this model class
     */
     public static $objects = null;
    
    /**
     * Save this model instance to the database.
     * This is a convenience method that calls the save() method of the
     * associated manager.
     * 
     * @return boolean TRUE on success or FALSE on failure
     */
    public function save() {
        $class = get_called_class();
        return $class::$objects->save($this);
    }
}