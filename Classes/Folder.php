<?php
/**
 * Created by PhpStorm.
 * User: temka
 * Date: 13.11.17
 * Time: 18:29
 */
namespace mindkey;
class Folder extends Entity
{
    /**
     * @var array content Folder
     */
    protected $children = [];

    public function __construct($location)
    {
        parent::__construct($location);
        $this->name = basename($this->path);
    }

    protected function loadContent()
    {
        $list = scandir($this->path);


        $buffer = []; //consist object for filtrening
        if(!empty($list))
        {
            foreach($list as $item)
            {
                $fullPath = $this->path. DS. $item;

                $object = is_file($fullPath)
                    ? new File($fullPath)
                    : new Folder($fullPath);

                $buffer[] = $object;
            }
            $this->children = new FilteredFileList($buffer);

        }

    }

    protected function getTeaser():array
    {
        return ['name' => $this->name];
    }
    protected function getContent():array
    {
        return [];
    }

    public function showTeaser()
    {
        $data = $this->getTeaser();
        echo"<a href=\"index.php?entry=".$this->path."\"><li class=\"list-group-item d-flex justify-content-between align-items-center\">
                <span class=\"glyphicon glyphicon-folder-open\"></span> ".$data['name']."</li></a>";
    }

    public function showContent()
    {
        $this->loadContent();
        foreach ($this->children as $childNode)
        {
            if($childNode instanceof Entity)
            {
                $childNode->showTeaser();
            }
        }
    }
}