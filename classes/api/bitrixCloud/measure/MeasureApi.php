<?php

namespace AlterEgo\BitrixAPI\classes\Api\BitrixCloud\Measure;

use AlterEgo\BitrixAPI\classes\api\common\Entity as EntityAbstract;
use AlterEgo\BitrixAPI\classes\api\common\EntityQuery;
use AlterEgo\BitrixAPI\classes\api\common\Filter;
use AlterEgo\BitrixAPI\classes\Models\Crm\InvoiceIterator;
use AlterEgo\BitrixAPI\classes\Models\Crm\UserField;
use AlterEgo\BitrixAPI\classes\Models\Crm\UserFieldIterator;
use AlterEgo\BitrixAPI\classes\Models\Entity\EntityItemProperty;
use AlterEgo\BitrixAPI\classes\Models\EventIterator;
use AlterEgo\BitrixAPI\classes\Models\Measure\MeasureIterator;
use AlterEgo\BitrixAPI\Exceptions\ExceptionIteratorInvalidPosition;
use Bitrix24\Exceptions\Bitrix24Exception;

class MeasureApi extends EntityAbstract
{
    /**
     * @param EntityQuery $query
     * @return MeasureIterator
     */
    public function getList(EntityQuery $query)
    {
        $measureApi = new \Bitrix24\Measure\Measure($this->getClient()->getBitrixApp());

        $response = $measureApi->getList(
            $query->getOrder()->asArray(),
            $query->getFilter()->asArray(),
            $query->getSelect()->asArray()
        );

        return new MeasureIterator($response);
    }

    /**
     * @param $code
     * @return bool|\AlterEgo\BitrixAPI\classes\Models\Measure\Measure
     */
    public function getByCode($code)
    {
        $query = new EntityQuery();
        $query->addWhere('CODE', Filter::TYPE_EQUAL, $code);

        try {
            return $this->getList($query)->current();
        } catch (ExceptionIteratorInvalidPosition $exception) {
            return false;
        }
    }
}
