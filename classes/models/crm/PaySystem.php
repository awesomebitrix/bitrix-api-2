<?php

namespace AlterEgo\BitrixAPI\Classes\Models\Crm;

class PaySystem
{
    /**
     * @var string
     */
    private $actionFile;

    /**
     * @var string
     */
    private $active; // (Y|N)

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $handler;

    /**
     * @var string
     */
    private $handlerCode;

    /**
     * @var string
     */
    private $handlerName;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var integer
     */
    private $personTypeId;

    /**
     * @var integer
     */
    private $sort;

    /**
     * @param array $bitrixArray
     *
     * @return PaySystem
     */
    public static function CreateFromBitrixArray($bitrixArray)
    { // todo: create automatical method for filling object from bitrix array
        $invoice = new self();


        return $invoice;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $array = array();



        return $array;
    }

    /**
     * @param mixed $id
     *
     * @return PaySystem
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}
