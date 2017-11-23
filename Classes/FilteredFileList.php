<?php
/**
 * Created by PhpStorm.
 * User: temka
 * Date: 14.11.17
 * Time: 19:09
 */
namespace mindkey;
class FilteredFileList extends \FilterIterator
{
    public function __construct(array $items)
    {
        parent::__construct(new \ArrayIterator($items));
    }

    public function accept()
    {
        $current = $this->getInnerIterator()->current();

        return (!preg_match('/^\./', $current->name));
    }
}