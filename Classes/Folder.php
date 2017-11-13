<?php
/**
 * Created by PhpStorm.
 * User: temka
 * Date: 13.11.17
 * Time: 18:29
 */

class Folder extends Entity
{
    public function __construct($location)
    {
        parent::__construct($location);
        $this->name = basename($this->path);
    }
    public function getTeaser():array
    {
        return ['name' => $this->name];
    }
    public function getContent():array
    {
        return [];
    }
}