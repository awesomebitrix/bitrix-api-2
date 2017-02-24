<?php
/**
 * Created by PhpStorm.
 * User: sgavka
 * Date: 27.01.17
 * Time: 16:49
 */

namespace AlterEgo\BitrixAPI\classes\api\bitrix24\measure;


use AlterEgo\BitrixAPI\classes\api\common\Entity as EntityAbstract;
use AlterEgo\BitrixAPI\classes\api\common\EntityQuery;
use AlterEgo\BitrixAPI\classes\api\common\Filter;
use AlterEgo\BitrixAPI\classes\models\crm\InvoiceIterator;
use AlterEgo\BitrixAPI\classes\models\crm\UserField;
use AlterEgo\BitrixAPI\classes\models\crm\UserFieldIterator;
use AlterEgo\BitrixAPI\classes\models\entity\EntityItemProperty;
use AlterEgo\BitrixAPI\classes\models\EventIterator;
use AlterEgo\BitrixAPI\classes\models\measure\MeasureIterator;
use AlterEgo\BitrixAPI\exceptions\ExceptionIteratorInvalidPosition;
use Bitrix24\Exceptions\Bitrix24Exception;

class Measure extends EntityAbstract
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
     * @return bool|\AlterEgo\BitrixAPI\classes\models\measure\Measure
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
