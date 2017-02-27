<?php

namespace AlterEgo\BitrixAPI\Classes\Api\BitrixCloud\Crm;


use AlterEgo\BitrixAPI\classes\api\common\Entity;
use AlterEgo\BitrixAPI\classes\api\common\EntityQuery;
use AlterEgo\BitrixAPI\classes\api\common\Filter;
use AlterEgo\BitrixAPI\classes\Models\Crm\InvoiceIterator;
use AlterEgo\BitrixAPI\classes\Models\Crm\PersonTypeIterator;
use AlterEgo\BitrixAPI\classes\Models\Crm\UserField;
use AlterEgo\BitrixAPI\classes\Models\Crm\UserFieldIterator;
use Bitrix24\Exceptions\Bitrix24Exception;

class PersonTypeApi extends Entity
{
    /**
     * @param EntityQuery $query
     *
     * @return PersonTypeIterator
     */
    public function getList(EntityQuery $query)
    {
        $personType = new \Bitrix24\CRM\PersonType($this->getClient()->getBitrixApp());

        $response = $personType->getList(
            $query->getOrder()->asArray(),
            $query->getFilter()->asArray()
        );

        return new PersonTypeIterator($response['result']);
    }

    /**
     * @param integer $name
     *
     * @return \AlterEgo\BitrixAPI\classes\Models\Crm\PersonType
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
