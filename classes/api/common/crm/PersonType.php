<?php
/**
 * Created by PhpStorm.
 * User: sgavka
 * Date: 27.01.17
 * Time: 16:49
 */

namespace AlterEgo\BitrixAPI\classes\api\common\crm;


use AlterEgo\BitrixAPI\classes\api\common\Entity;
use AlterEgo\BitrixAPI\classes\api\common\EntityQuery;
use AlterEgo\BitrixAPI\classes\api\Filter;
use AlterEgo\BitrixAPI\classes\api\Order;
use AlterEgo\BitrixAPI\classes\models\crm\InvoiceIterator;
use AlterEgo\BitrixAPI\classes\models\crm\PersonTypeIterator;

class PersonType extends Entity
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
     * @return \AlterEgo\BitrixAPI\classes\models\crm\PersonType
     */
    public function getByName($name)
    {
        return $this->call(__FUNCTION__, array($name));
    }
}
