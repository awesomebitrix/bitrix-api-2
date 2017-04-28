<?php

namespace AlterEgo\BitrixAPI\Classes\Api\Common\Measure;

use AlterEgo\BitrixAPI\Classes\Entity as EntityAbstract;
use AlterEgo\BitrixAPI\Classes\EntityQuery;
use AlterEgo\BitrixAPI\Classes\Models\Measure\Measure;
use AlterEgo\BitrixAPI\Classes\Models\Measure\MeasureIterator;

class MeasureApi extends EntityAbstract
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
     * @return bool|Measure
     */
    public function getByCode($code)
    {
        return $this->call(__FUNCTION__, array($code));
    }
}
