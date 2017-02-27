<?php

namespace AlterEgo\BitrixAPI\Classes;

class Order
{
    private $array = array();

    static public function CreateFromArray($array)
    {
        $order = new Order();
        $order->array = $array;

        return $order;
    }

    public function asArray()
    {
        return $this->array;
    }

    public function add($columnName, $sort)
    {
        $this->array[$columnName] = $sort;

        return $this;
    }

    public function set($columns)
    {
        foreach ($columns as $columnName => $sort) {
            $this->add($columnName, $sort);
        }

        return $this;
    }
}
