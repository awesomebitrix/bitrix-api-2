<?php
/**
 * Created by PhpStorm.
 * User: sgavka
 * Date: 30.01.17
 * Time: 17:26
 */

namespace AlterEgo\BitrixAPI\classes\models\measure;

use AlterEgo\BitrixAPI\classes\api\common\Iterator;

class MeasureIterator extends Iterator
{
    /**
     * @param $array
     *
     * @return Measure
     */
    function getObject($array)
    {
        $event = Measure::CreateFromArray($array);

        return $event;
    }
}
