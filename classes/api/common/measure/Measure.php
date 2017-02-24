<?php
/**
 * Created by PhpStorm.
 * User: sgavka
 * Date: 27.01.17
 * Time: 16:49
 */

namespace AlterEgo\BitrixAPI\classes\api\common\measure;


use AlterEgo\BitrixAPI\classes\api\common\Entity as EntityAbstract;
use AlterEgo\BitrixAPI\classes\api\common\EntityQuery;
use AlterEgo\BitrixAPI\classes\api\Filter;
use AlterEgo\BitrixAPI\classes\api\Order;
use AlterEgo\BitrixAPI\classes\models\crm\InvoiceIterator;
use AlterEgo\BitrixAPI\classes\models\entity\EntityItemProperty;
use AlterEgo\BitrixAPI\classes\models\entity\EntityIterator;
use AlterEgo\BitrixAPI\classes\models\measure\MeasureIterator;

class Measure extends EntityAbstract
{
    /**
     * @param EntityQuery $query
     *
     * @return MeasureIterator
     */
    public function getList(EntityQuery $query)
    {
        return $this->call(__FUNCTION__, array($query));
    }

    /**
     * @param $code
     * @return bool|\AlterEgo\BitrixAPI\classes\models\measure\Measure
     */
    public function getByCode($code)
    {
        return $this->call(__FUNCTION__, array($code));
    }
}
