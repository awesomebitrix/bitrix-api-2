<?php

namespace AlterEgo\BitrixAPI\Classes\Api\Common\Crm;

use AlterEgo\BitrixAPI\Classes\Entity;
use AlterEgo\BitrixAPI\Classes\EntityQuery;
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
        return $this->call(__FUNCTION__, array($query));
    }

    /**
     * @param $name
     * @return PersonType
     */
    public function getByName($name)
    {
        return $this->call(__FUNCTION__, array($name));
    }
}
