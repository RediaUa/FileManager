<?php
/**
 * Created by PhpStorm.
 * User: temka
 * Date: 13.11.17
 * Time: 18:04
 */

class Helper
{
    public static function formatSize($size):string
    {
        $units = ['b','Kb', 'Mb', 'Gb'];
        $typeCapacity = 1000; // 1024 or 1000
        $accuracy = 10; //rounding accuracy
        $iteration = 0;
        while($size > 1023)
        {
            $size = ceil($size / $typeCapacity * $accuracy) / $accuracy;
            $iteration++;
        }
        return $size . $units[$iteration];
    }
}