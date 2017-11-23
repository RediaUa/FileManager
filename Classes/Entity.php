<?php
namespace mindkey;
/**class which consist common properties of file and folder**/
abstract class Entity
{
    public $name;

    public $path;
    public function __construct($location)
    {
        $this->path = $location;

    }

    abstract protected function getContent();

    abstract protected function getTeaser();

    abstract public function showContent();

    abstract public function showTeaser();
}