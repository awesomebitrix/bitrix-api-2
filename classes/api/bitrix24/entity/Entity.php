<?php
/**
 * Created by PhpStorm.
 * User: sgavka
 * Date: 27.01.17
 * Time: 16:49
 */

namespace AlterEgo\BitrixAPI\classes\api\bitrix24\entity;


use AlterEgo\BitrixAPI\classes\api\common\Entity as EntityAbstract;
use AlterEgo\BitrixAPI\classes\api\common\EntityQuery;
use AlterEgo\BitrixAPI\classes\api\common\Filter;
use AlterEgo\BitrixAPI\classes\models\crm\InvoiceIterator;
use AlterEgo\BitrixAPI\classes\models\crm\UserField;
use AlterEgo\BitrixAPI\classes\models\crm\UserFieldIterator;
use AlterEgo\BitrixAPI\classes\models\entity\EntityItemProperty;
use Bitrix24\Exceptions\Bitrix24Exception;

class Entity extends EntityAbstract
{
    /**
     * @param string $name
     *
     * @return \AlterEgo\BitrixAPI\classes\models\entity\Entity
     */
    public function get($name)
    {
        $entityApi = new \Bitrix24\Entity\Entity($this->getClient()->getBitrixApp());

        $response = $entityApi->get($name);

        $entity = \AlterEgo\BitrixAPI\classes\models\entity\Entity::CreateFromArray($response['result']);

        return $entity;
    }

    /**
     * @param string $entityName
     * @param string $code
     *
     * @return \AlterEgo\BitrixAPI\classes\models\entity\EntityItem
     */
    public function itemGet($entityName, $code)
    {
        $entityApi = new \Bitrix24\Entity\Entity($this->getClient()->getBitrixApp());

        $query = new EntityQuery();
        $query->addWhere('CODE', Filter::TYPE_EQUAL, $code);

        $response = $entityApi->itemGet(
            $entityName,
            $query->getOrder()->asArray(),
            $query->getFilter()->asArray()
        );

        $entityItemIterator = new \AlterEgo\BitrixAPI\classes\models\entity\EntityItemIterator($response['result']);

        return $entityItemIterator->current();
    }

    /**
     * @param \AlterEgo\BitrixAPI\classes\models\entity\EntityItem $entityItem
     * @return array
     */
    public function itemCreate(\AlterEgo\BitrixAPI\classes\models\entity\EntityItem $entityItem)
    {
        $entityApi = new \Bitrix24\Entity\Entity($this->getClient()->getBitrixApp());

        $response = $entityApi->itemAdd($entityItem->getEntity(), $entityItem->getName(), $entityItem->toArray());

        return $response['result'];
    }

    /**
     * @param string $entity
     * @param integer $id
     *
     * @return boolean
     */
    public function itemDelete($entity, $id)
    {
        $entityApi = new \Bitrix24\Entity\Entity($this->getClient()->getBitrixApp());

        $response = $entityApi->itemDelete($entity, $id);

        return $response['result'];
    }

    /**
     * @param string $entity
     *
     * @return boolean
     */
    public function delete($entity)
    {
        $entityApi = new \Bitrix24\Entity\Entity($this->getClient()->getBitrixApp());

        $response = $entityApi->delete($entity);

        return $response['result'];
    }

    /**
     * @param string $entity
     * @param integer $property
     *
     * @return boolean
     */
    public function itemPropertyDelete($entity, $property)
    {
        $entityApi = new \Bitrix24\Entity\Entity($this->getClient()->getBitrixApp());

        $response = $entityApi->itemPropertyDelete($entity, $property);

        return $response['result'];
    }

    /**
     * @param \AlterEgo\BitrixAPI\classes\models\entity\EntityItemProperty $entityItemProperty
     * @return boolean
     */
    public function itemPropertyCreate(\AlterEgo\BitrixAPI\classes\models\entity\EntityItemProperty $entityItemProperty)
    {
        $entityApi = new \Bitrix24\Entity\Entity($this->getClient()->getBitrixApp());

        $response = $entityApi->itemPropertyAdd(
            $entityItemProperty->getEntity(),
            $entityItemProperty->getProperty(),
            $entityItemProperty->getName(),
            $entityItemProperty->getType()
        );

        return $response['result'];
    }

    /**
     * @param string $entity
     * @param string $property
     *
     * @return EntityItemProperty
     */
    public function itemPropertyGet($entity, $property)
    {
        $entityApi = new \Bitrix24\Entity\Entity($this->getClient()->getBitrixApp());

        $response = $entityApi->itemPropertyGet($entity, $property);

        $entityItem = \AlterEgo\BitrixAPI\classes\models\entity\EntityItemProperty::CreateFromArray($response['result']);

        return $entityItem;
    }

    /**
     * @param \AlterEgo\BitrixAPI\classes\models\entity\EntityItem $entityItem
     * @return boolean
     */
    public function itemUpdate(\AlterEgo\BitrixAPI\classes\models\entity\EntityItem $entityItem)
    {
        $entityApi = new \Bitrix24\Entity\Entity($this->getClient()->getBitrixApp());

        $response = $entityApi->itemUpdate($entityItem->getEntity(), $entityItem->getId(), $entityItem->toArray());

        return $response['result'];
    }

    /**
     * @param \AlterEgo\BitrixAPI\classes\models\entity\Entity $entity
     *
     * @return array
     */
    public function create(\AlterEgo\BitrixAPI\classes\models\entity\Entity $entity)
    {
        $entityApi = new \Bitrix24\Entity\Entity($this->getClient()->getBitrixApp());

        $response = $entityApi->add($entity->getEntity(), $entity->getName(), $entity->getAccess());

        return $response['result'];
    }
}
