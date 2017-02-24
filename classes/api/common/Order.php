<?php
/**
 * Created by PhpStorm.
 * User: sgavka
 * Date: 27.01.17
 * Time: 17:19
 */

namespace AlterEgo\BitrixAPI\classes\api\common;


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