<?php
/**
 * Created by PhpStorm.
 * User: sgavka
 * Date: 27.01.17
 * Time: 17:19
 */

namespace AlterEgo\BitrixAPI\classes\api\common;


class Select
{
    private $array = array();

    static public function CreateFromArray($array)
    {
        $order = new Select();
        $order->array = $array;

        return $order;
    }

    public function asArray()
    {
        return $this->array;
    }

    public function add($fieldName)
    {
        if (array_search($fieldName, $this->array) !== 0) {
            $this->array[] = $fieldName;
        }

        return $this;
    }

    public function set($columns)
    {
        foreach ($columns as $column) {
            $this->add($column);
        }

        return $this;
    }
}
