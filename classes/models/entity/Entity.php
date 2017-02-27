<?php

namespace AlterEgo\BitrixAPI\Classes\Models\Entity;

class Entity
{
    /**
     * @var string Entity ID
     */
    private $entity;

    /**
     * @var string
     */
    private $name;

    /**
     * @var array
     */
    private $access;

    /**
     * @param array $array
     *
     * @return Entity
     */
    public static function CreateFromArray($array)
    { // todo: create automatical method for filling object from bitrix array
        $invoice = new Entity();

        $invoice->setEntity($array['ENTITY']);
        $invoice->setName($array['NAME']);

        if (array_key_exists('ACCESS', $array)) {
            $invoice->setAccess($array['ACCESS']);
        }

        return $invoice;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $array = array();

        if (!is_null($this->getAccess())) {
            $array['ACCESS'] = $this->getAccess();
        }

        $array['ENTITY'] = $this->getEntity();
        $array['NAME'] = $this->getName();

        return $array;
    }

    /**
     * @param string $entity
     * @return Entity
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
     * @return Entity
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
     * @param array $access
     * @return Entity
     */
    public function setAccess($access)
    {
        $this->access = $access;
        return $this;
    }

    /**
     * @return array
     */
    public function getAccess()
    {
        return $this->access;
    }
}
