<?php
/**
 * Created by PhpStorm.
 * User: sgavka
 * Date: 27.01.17
 * Time: 17:19
 */

namespace AlterEgo\BitrixAPI\classes\api\common;


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
