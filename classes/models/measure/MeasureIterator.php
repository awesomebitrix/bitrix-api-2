<?php

namespace AlterEgo\BitrixAPI\Classes\Models\Measure;

use AlterEgo\BitrixAPI\Classes\Iterator;

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
