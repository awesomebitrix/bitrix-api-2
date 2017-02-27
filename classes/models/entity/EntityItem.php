<?php

namespace AlterEgo\BitrixAPI\Classes\Models\Entity;

use AlterEgo\BitrixAPI\Exceptions\ExceptionModelPropertyValueDontExists;

class EntityItem
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string Entity ID
     */
    private $entity;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string (Y|N)
     */
    private $active;

    /**
     * @var string
     */
    private $dateActiveFrom;

    /**
     * @var string
     */
    private $dateActiveTo;

    /**
     * @var integer
     */
    private $sort;

    /**
     * @var string
     */
    private $previewPicture;

    /**
     * @var string
     */
    private $previewText;

    /**
     * @var string
     */
    private $detailPicture;

    /**
     * @var string
     */
    private $detailText;

    /**
     * @var string
     */
    private $code;

    /**
     * @var integer Section ID
     */
    private $section;

    /**
     * @var array
     */
    private $propertyValues = array();

    /**
     * @param array $array
     *
     * @return EntityItem
     */
    public static function CreateFromArray($array)
    { // todo: create automatical method for filling object from bitrix array
        $invoice = new EntityItem();

        if (array_key_exists('ID', $array)) {
            $invoice->setId($array['ID']);
        }

        $invoice->setEntity($array['ENTITY']);
        $invoice->setName($array['NAME']);
        $invoice->setCode($array['CODE']);
        $invoice->setPropertyValues($array['PROPERTY_VALUES']);

        return $invoice;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $array = array();

        if (!is_null($this->getName())) {
            $array['NAME'] = $this->getName();
        }

        if (!is_null($this->getId())) {
            $array['ID'] = $this->getId();
        }

        $array['ENTITY'] = $this->getEntity();
        $array['CODE'] = $this->getCode();
        $array['PROPERTY_VALUES'] = $this->getPropertyValues();

        return $array;
    }

    /**
     * @param string $entity
     * @return EntityItem
     */
    public function setEntity($entity)
    {
        $this->entity = $entity;
        return $this;
    }

    /**
     * @return string
     */
    public function getEntity()
    {
        return $this->entity;
    }

    /**
     * @param string $name
     * @return EntityItem
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $code
     * @return EntityItem
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param array $propertyValues
     * @return EntityItem
     */
    public function setPropertyValues($propertyValues)
    {
        $this->propertyValues = $propertyValues;
        return $this;
    }

    /**
     * @return array
     */
    public function getPropertyValues()
    {
        return $this->propertyValues;
    }

    public function getPropertyValue($name)
    {
        if (!array_key_exists($name, $this->propertyValues)) {
            throw new ExceptionModelPropertyValueDontExists("Property value with name {$name} don't exists.");
        }

        return $this->propertyValues[$name];
    }

    public function addPropertyValue($name, $value)
    {
        $this->propertyValues[$name] = $value;

        return $this;
    }

    /**
     * @param int $id
     * @return EntityItem
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
