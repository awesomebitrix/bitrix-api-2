<?php

namespace AlterEgo\BitrixAPI\Classes\Api\Common\Entity;

use AlterEgo\BitrixAPI\Classes\Entity as EntityAbstract;
use AlterEgo\BitrixAPI\Classes\EntityQuery;
use AlterEgo\BitrixAPI\classes\Models\Entity\EntityItemProperty;
use AlterEgo\BitrixAPI\classes\Models\Entity\EntityIterator;

class EntityApi extends EntityAbstract
{
    /**
     * @param string $name
     *
     * @return \AlterEgo\BitrixAPI\classes\Models\Entity\Entity
     */
    public function get($name)
    {
        return $this->call(__FUNCTION__, array($name));
    }

    /**
     * @param string $entityName
     * @param string $code
     *
     * @return \AlterEgo\BitrixAPI\classes\Models\Entity\EntityItem
     */
    public function itemGet($entityName, $code)
    {
        return $this->call(__FUNCTION__, array($entityName, $code));
    }

    /**
     * @param EntityQuery $query
     *
     * @return EntityIterator
     */
    public function getList(EntityQuery $query)
    {
        return $this->call(__FUNCTION__, array($query));
    }

    /**
     * @param \AlterEgo\BitrixAPI\classes\Models\Entity\EntityItem $entityItem
     * @return mixed
     */
    public function itemCreate(\AlterEgo\BitrixAPI\classes\Models\Entity\EntityItem $entityItem)
    {
        return $this->call(__FUNCTION__, array($entityItem));
    }

    /**
     * @param string $entity
     * @return bool
     */
    public function delete($entity)
    {
        return $this->call(__FUNCTION__, array($entity));
    }

    /**
     * @param string $entity
     * @param integer $id
     * @return bool
     */
    public function itemDelete($entity, $id)
    {
        return $this->call(__FUNCTION__, array($entity, $id));
    }

    /**
     * @param string $entity
     * @param integer $property
     * @return bool
     */
    public function itemPropertyDelete($entity, $property)
    {
        return $this->call(__FUNCTION__, array($entity, $property));
    }

    /**
     * @param \AlterEgo\BitrixAPI\classes\Models\Entity\EntityItem $entityItem
     * @return boolean
     */
    public function itemUpdate(\AlterEgo\BitrixAPI\classes\Models\Entity\EntityItem $entityItem)
    {
        return $this->call(__FUNCTION__, array($entityItem));
    }

    /**
     * @param \AlterEgo\BitrixAPI\classes\Models\Entity\EntityItemProperty $entityItemProperty
     * @return boolean
     */
    public function itemPropertyCreate(\AlterEgo\BitrixAPI\classes\Models\Entity\EntityItemProperty $entityItemProperty)
    {
        return $this->call(__FUNCTION__, array($entityItemProperty));
    }

    /**
     * @param $entity
     * @param $property
     * @return EntityItemProperty
     */
    public function itemPropertyGet($entity, $property)
    {
        return $this->call(__FUNCTION__, array($entity, $property));
    }

    /**
     * @param \AlterEgo\BitrixAPI\classes\Models\Entity\Entity $entity
     *
     * @return mixed
     */
    public function create(\AlterEgo\BitrixAPI\classes\Models\Entity\Entity $entity)
    {
        return $this->call(__FUNCTION__, array($entity));
    }

    /**
     * @param string $entityName
     * @param string $code
     * @return \AlterEgo\BitrixAPI\classes\Models\Entity\EntityItem|bool
     */
    public function isItemExists($entityName, $code)
    {
        return $this->call(__FUNCTION__, array($entityName, $code));
    }

    /**
     * @param string $entityName
     * @param string $propertyName
     * @return EntityItemProperty|boolean
     */
    public function isItemPropertyExists($entityName, $propertyName)
    {
        return $this->call(__FUNCTION__, array($entityName, $propertyName));
    }
}
