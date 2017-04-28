<?php

namespace AlterEgo\BitrixAPI\Classes\Api\BitrixCloud\Crm;

use AlterEgo\BitrixAPI\Classes\Entity;
use AlterEgo\BitrixAPI\Classes\EntityQuery;
use AlterEgo\BitrixAPI\Classes\Filter;
use AlterEgo\BitrixAPI\Classes\Models\Crm\PersonType;
use AlterEgo\BitrixAPI\Classes\Models\Crm\PersonTypeIterator;

class PersonTypeApi extends Entity
{
    /**
     * @param EntityQuery $query
     *
     * @return PersonTypeIterator
     */
    public function getList(EntityQuery $query)
    {
        $personType = new \Bitrix24\CRM\PersonType($this->getClient()->getBitrixCloudApp());

        $response = $personType->getList(
            $query->getOrder()->asArray(),
            $query->getFilter()->asArray()
        );

        return new PersonTypeIterator($response['result']);
    }

    /**
     * @param integer $name
     *
     * @return PersonType
     * @throws \Exception
     */
    public function getByName($name)
    {
        $query = new EntityQuery();
        $query->addWhere('NAME', Filter::TYPE_EQUAL, $name);

        $personTypeIterator = $this->getList($query);

        /** @var \AlterEgo\BitrixAPI\classes\Models\Crm\PersonType $personType */
        $personType = $personTypeIterator->current();

        /*if ($personType->getUfMoedeloId() != $name) {
            throw new \Exception("Invoice (MoeDelo Id#{$name} don't exists in Bitrix24.");
        }*/

        return $personType;
    }
}
