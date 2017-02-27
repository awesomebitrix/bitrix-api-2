<?php

namespace AlterEgo\BitrixAPI\Classes;

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
