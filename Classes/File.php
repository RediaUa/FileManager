<?php

class File extends Entity
{
    public $type;
    public $size;

    public function __construct($location)
    {
        parent::__construct($location); //set path
        $data = pathinfo($this->path);
        $this->name = !empty($data['filename'])
            ? $this->name = $data['filename']
            : $this->name = $data['basename'];
        $this->size = filesize($this->path);
        $this->type = strtolower($data['extension']);
    }

    /**return array**/
    public function getTeaser()
    {
        return ['name' => $this->name, 'size' => Helper::formatSize($this->size)];
    }

    /**return array**/
    public function getContent()
    {
        $result = $this->getTeaser();//add name, size
        $result['type'] = $this->type;
        $result['path'] = $this->path;
        return $result;
    }
}