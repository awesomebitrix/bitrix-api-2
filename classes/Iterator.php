<?php

namespace AlterEgo\BitrixAPI\Classes;

use AlterEgo\BitrixAPI\Exceptions\ExceptionIteratorInvalidEntity;
use AlterEgo\BitrixAPI\Exceptions\ExceptionIteratorInvalidPosition;

abstract class Iterator implements \Iterator
{
    private $position = 0;
    private $rawArray = array();
    private $array = array();

    /**
     * Iterator constructor.
     * @param array $array
     */
    public function __construct($array = array())
    {
        $this->position = 0;

        foreach ($array as $item) {
            $this->rawArray[] = $item;
        }
    }

    public function rewind()
    {
        $this->position = 0;
    }

    /**
     * @param $array
     *
     * @return object
     */
    abstract function getObject($array);

    /**
     * @return object
     * @throws ExceptionIteratorInvalidEntity
     * @throws ExceptionIteratorInvalidPosition
     */
    public function current()
    {
        if (!array_key_exists($this->position, $this->array)) {
            if (!array_key_exists($this->position, $this->rawArray)) {
                throw new ExceptionIteratorInvalidPosition("Object with position {$this->position} don't exists.");
            }

            try {
                $this->array[$this->position] = $this->getObject($this->rawArray[$this->position]);
            } catch (\Exception $exception) {
                throw new ExceptionIteratorInvalidEntity("Object with position {$this->position} is invalid.");
            }
        }

        return $this->array[$this->position];
    }

    /**
     * @return integer
     */
    public function key()
    {
        return $this->position;
    }

    public function next()
    {
        ++$this->position;
    }

    /**
     * @return bool
     */
    public function valid()
    {
        return isset($this->rawArray[$this->position]);
    }

    /**
     * @return array
     */
    public function all()
    {
        $currentKey = $this->key();
        $this->position = 0;

        $array = array();
        foreach ($this as $item) {
            $array[] = $item;
        }

        $this->position = $currentKey;

        return $array;
    }
}
