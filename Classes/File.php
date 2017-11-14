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
    protected function getTeaser()
    {
        return ['name' => $this->name, 'size' => Helper::formatSize($this->size)];
    }

    /**return array**/
    protected function getContent()
    {
        $result = $this->getTeaser();//add name, size
        $result['type'] = $this->type;
        $result['path'] = $this->path;
        return $result;
    }

    public function showTeaser()
    {
        $data = $this->getTeaser();
        echo "<li class=\"list-group-item d-flex justify-content-between align-items-center\">
                    <span class=\"glyphicon glyphicon-file\">" . $data['name'] . "</span>
                    <span class=\"badge badge-primary badge-pill\">" . $data['size'] . "</span>
                </li>";
    }

    public function showContent()
    {
        $data = $this->getContent();
    }
}