<?php

namespace AlterEgo\BitrixAPI\Classes\Api\Common\Crm;

use AlterEgo\BitrixAPI\classes\api\common\Entity;
use AlterEgo\BitrixAPI\classes\api\common\EntityQuery;
use AlterEgo\BitrixAPI\classes\api\Filter;
use AlterEgo\BitrixAPI\classes\api\Order;
use AlterEgo\BitrixAPI\classes\Models\Crm\InvoiceIterator;
use AlterEgo\BitrixAPI\classes\Models\Crm\PersonTypeIterator;

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
     * @return \AlterEgo\BitrixAPI\classes\Models\Crm\PersonType
     */
    public function getByName($name)
    {
        return $this->call(__FUNCTION__, array($name));
    }
}
