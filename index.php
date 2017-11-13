<?php
//General settings
define('DS', '/');
define('ROOT', dirname(__FILE__));  //root of content serviced by filemanager

$list = scandir(ROOT); //list of content items

foreach ($list as $item):
    echo $item."\n";
endforeach;

?>