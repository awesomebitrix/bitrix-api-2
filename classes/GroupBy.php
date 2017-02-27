<?php

namespace AlterEgo\BitrixAPI\Classes;


class GroupBy
{
    private $array = array();

    static public function CreateFromArray($array)
    {
        $order = new GroupBy();
        $order->array = $array;

        return $order;
    }

    public function asArray()
    {
        return $this->array;
    }
}
