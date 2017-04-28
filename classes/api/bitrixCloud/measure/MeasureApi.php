<?php

namespace AlterEgo\BitrixAPI\Classes\Api\BitrixCloud\Measure;

use AlterEgo\BitrixAPI\Classes\Entity;
use AlterEgo\BitrixAPI\Classes\EntityQuery;
use AlterEgo\BitrixAPI\Classes\Filter;
use AlterEgo\BitrixAPI\Classes\Models\Measure\Measure;
use AlterEgo\BitrixAPI\Classes\Models\Measure\MeasureIterator;
use AlterEgo\BitrixAPI\Exceptions\ExceptionIteratorInvalidPosition;

class MeasureApi extends Entity
{
    /**
     * @param EntityQuery $query
     * @return MeasureIterator
     */
    public function getList(EntityQuery $query)
    {
        $measureApi = new \Bitrix24\Measure\Measure($this->getClient()->getBitrixCloudApp());

        $response = $measureApi->getList(
            $query->getOrder()->asArray(),
            $query->getFilter()->asArray(),
            $query->getSelect()->asArray()
        );

        return new MeasureIterator($response['result']);
    }

    /**
     * @param $code
     * @return bool|Measure
     */
    public function getByCode($code)
    {
        $query = new EntityQuery();
        $query->addWhere(
            'CODE',
            Filter::TYPE_EQUAL,
            $code
        ); // todo: to come up with a way to store the descriptions of Bitrix's entities

        try {
            return $this->getList($query)->current();
        } catch (ExceptionIteratorInvalidPosition $exception) {
            return false;
        }
    }
}
