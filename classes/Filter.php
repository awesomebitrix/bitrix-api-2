<?php

namespace AlterEgo\BitrixAPI\Classes;

class Filter
{
    private $array = array();

    static public function CreateFromArray($array)
    {
        $order = new Filter();
        $order->array = $array;

        return $order;
    }

    public function asArray()
    {
        return $this->array;
    }

    const TYPE_EQUAL = '=';
    const TYPE_NOT_EQUAL = '!';
    const TYPE_LESS = '<';
    const TYPE_LESS_OR_EQUAL = '<=';
    const TYPE_MORE = '>';
    const TYPE_MORE_OR_EQUAL = '>=';
    const TYPE_BETWEEN = '><';

    public function add($columnName, $type, $value)
    {
        $this->array[$type . $columnName] = $value;

        return $this;
    }

    public function set($columns)
    {
        foreach ($columns as $filter) { // todo: add handling for nesting filters
            $columnName = $filter[0];
            $type = $filter[1];
            $value = $filter[2];

            $this->add($columnName, $type, $value);
        }

        return $this;
    }

    public function addAnd($columns)
    {
        $and = array('LOGIC' => 'AND');

        foreach ($columns as $filter) { // todo: add handling for nesting filters
            $columnName = $filter[0];
            $type = $filter[1];
            $value = $filter[2];

            $and[$type . $columnName] = $value;
        }

        $this->array[] = $and;
    }

    public function addOr($columns)
    {
        $or = array('LOGIC' => 'OR');

        foreach ($columns as $filter) { // todo: add handling for nesting filters
            $columnName = $filter[0];
            $type = $filter[1];
            $value = $filter[2];

            $or[$type . $columnName] = $value;
        }

        $this->array[] = $or;
    }
}
