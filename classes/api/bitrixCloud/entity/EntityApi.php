<?php

namespace AlterEgo\BitrixAPI\Classes\Api\BitrixCloud\Entity;

use AlterEgo\BitrixAPI\Classes\Entity as EntityAbstract;
use AlterEgo\BitrixAPI\Classes\EntityQuery;
use AlterEgo\BitrixAPI\Classes\Filter;
use AlterEgo\BitrixAPI\Classes\Models\Entity\EntityItem;
use AlterEgo\BitrixAPI\Classes\Models\Entity\EntityItemIterator;
use AlterEgo\BitrixAPI\Classes\Models\Entity\EntityItemProperty;
use Bitrix24\Entity\Entity;

class EntityApi extends EntityAbstract
{
    /**
     * @param string $name
     *
     * @return \AlterEgo\BitrixAPI\Classes\Models\Entity\Entity
     */
    public function get($name)
    {
        $entityApi = new Entity($this->getClient()->getBitrixCloudApp());

        $response = $entityApi->get($name);

        $entity = \AlterEgo\BitrixAPI\Classes\Models\Entity\Entity::CreateFromArray($response['result']);

        return $entity;
    }

    /**
     * @param \AlterEgo\BitrixAPI\Classes\Models\Entity\Entity $entity
     *
     * @return array
     */
    public function create(\AlterEgo\BitrixAPI\Classes\Models\Entity\Entity $entity)
    {
        $entityApi = new Entity($this->getClient()->getBitrixCloudApp());

        $response = $entityApi->add($entity->getEntity(), $entity->getName(), $entity->getAccess());

        return $response['result'];
    }

    /**
     * @param string $entity
     *
     * @return boolean
     */
    public function delete($entity)
    {
        $entityApi = new Entity($this->getClient()->getBitrixCloudApp());

        $response = $entityApi->delete($entity);

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
        $entityApi = new Entity($this->getClient()->getBitrixCloudApp());

        $response = $entityApi->itemDelete($entity, $id);

        return $response['result'];
    }

    /**
     * @param string $entityName
     * @param string $code
     *
     * @return EntityItem|object
     */
    public function itemGet($entityName, $code)
    {
        $entityApi = new Entity($this->getClient()->getBitrixCloudApp());

        $query = new EntityQuery();
        $query->addWhere('CODE', Filter::TYPE_EQUAL, $code);

        $response = $entityApi->itemGet(
            $entityName,
            $query->getOrder()->asArray(),
            $query->getFilter()->asArray()
        );

        $entityItemIterator = new EntityItemIterator($response['result']);

        return $entityItemIterator->current();
    }

    /**
     * @param EntityItem $entityItem
     * @return array
     */
    public function itemCreate(EntityItem $entityItem)
    {
        $entityApi = new Entity($this->getClient()->getBitrixCloudApp());

        $response = $entityApi->itemAdd($entityItem->getEntity(), $entityItem->getName(), $entityItem->toArray());

        return $response['result'];
    }

    /**
     * @param EntityItem $entityItem
     * @return boolean
     */
    public function itemUpdate(EntityItem $entityItem)
    {
        $entityApi = new Entity($this->getClient()->getBitrixCloudApp());

        $response = $entityApi->itemUpdate($entityItem->getEntity(), $entityItem->getId(), $entityItem->toArray());

        return $response['result'];
    }

    /**
     * @param string $entityName
     * @param string $code
     * @return EntityItem|bool
     */
    public function isItemExists($entityName, $code)
    {
        try {
            $result = $this->itemGet($entityName, $code);

            if ($result) {
                return $result;
            }

            return false;
        } catch (\Exception $e) { // todo: maybe need to clarify Exception
            return false;
        }
    }

    /**
     * @param string $entityName
     * @param string $propertyName
     * @return EntityItemProperty|boolean
     */
    public function isItemPropertyExists($entityName, $propertyName)
    {
        try {
            $result = $this->itemPropertyGet($entityName, $propertyName);

            if ($result) {
                return $result;
            }

            return false;
        } catch (\Exception $e) { // todo: maybe need to clarify Exception
            return false;
        }
    }

    /**
     * @param string $entity
     * @param integer $property
     *
     * @return boolean
     */
    public function itemPropertyDelete($entity, $property)
    {
        $entityApi = new Entity($this->getClient()->getBitrixCloudApp());

        $response = $entityApi->itemPropertyDelete($entity, $property);

        return $response['result'];
    }

    /**
     * @param EntityItemProperty $entityItemProperty
     * @return boolean
     */
    public function itemPropertyCreate(EntityItemProperty $entityItemProperty)
    {
        $entityApi = new Entity($this->getClient()->getBitrixCloudApp());

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
        $entityApi = new Entity($this->getClient()->getBitrixCloudApp());

        $response = $entityApi->itemPropertyGet($entity, $property);

        $entityItem = EntityItemProperty::CreateFromArray($response['result']);

        return $entityItem;
    }
}
