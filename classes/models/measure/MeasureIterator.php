<?php

namespace AlterEgo\BitrixAPI\Classes\Models\Measure;

use AlterEgo\BitrixAPI\Classes\Iterator;

/**
 * Class MeasureIterator
 * @package AlterEgo\BitrixAPI\Classes\Models\Measure
 *
 * @method Measure current()
 */
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
