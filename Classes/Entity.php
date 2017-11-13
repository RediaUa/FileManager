<?php

/**class which consist common properties of file and folder**/
abstract class Entity
{
    public $name;

    public $path;
    public function __construct($location)
    {
        $this->path = $location;

    }

    abstract public function showContent();

    abstract public function showTeaser();
}