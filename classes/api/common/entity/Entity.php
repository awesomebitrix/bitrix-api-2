<?php
/**
 * Created by PhpStorm.
 * User: sgavka
 * Date: 27.01.17
 * Time: 16:49
 */

namespace AlterEgo\BitrixAPI\classes\api\common\entity;


use AlterEgo\BitrixAPI\classes\api\common\Entity as EntityAbstract;
use AlterEgo\BitrixAPI\classes\api\common\EntityQuery;
use AlterEgo\BitrixAPI\classes\api\Filter;
use AlterEgo\BitrixAPI\classes\api\Order;
use AlterEgo\BitrixAPI\classes\models\crm\InvoiceIterator;
use AlterEgo\BitrixAPI\classes\models\entity\EntityItemProperty;
use AlterEgo\BitrixAPI\classes\models\entity\EntityIterator;

class Entity extends EntityAbstract
{
    /**
     * @param string $name
     *
     * @return \AlterEgo\BitrixAPI\classes\models\entity\Entity
     */
    public function get($name)
    {
        return $this->call(__FUNCTION__, array($name));
    }

    /**
     * @param string $entityName
     * @param string $code
     *
     * @return \AlterEgo\BitrixAPI\classes\models\entity\EntityItem
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
     * @param \AlterEgo\BitrixAPI\classes\models\entity\EntityItem $entityItem
     * @return mixed
     */
    public function itemCreate(\AlterEgo\BitrixAPI\classes\models\entity\EntityItem $entityItem)
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
     * @param \AlterEgo\BitrixAPI\classes\models\entity\EntityItem $entityItem
     * @return boolean
     */
    public function itemUpdate(\AlterEgo\BitrixAPI\classes\models\entity\EntityItem $entityItem)
    {
        return $this->call(__FUNCTION__, array($entityItem));
    }

    /**
     * @param \AlterEgo\BitrixAPI\classes\models\entity\EntityItemProperty $entityItemProperty
     * @return boolean
     */
    public function itemPropertyCreate(\AlterEgo\BitrixAPI\classes\models\entity\EntityItemProperty $entityItemProperty)
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
     * @param \AlterEgo\BitrixAPI\classes\models\entity\Entity $entity
     *
     * @return mixed
     */
    public function create(\AlterEgo\BitrixAPI\classes\models\entity\Entity $entity)
    {
        return $this->call(__FUNCTION__, array($entity));
    }
}
