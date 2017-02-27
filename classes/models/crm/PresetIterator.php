<?php

namespace AlterEgo\BitrixAPI\Classes\Models\Crm;

use AlterEgo\BitrixAPI\Classes\Iterator;

class PresetIterator extends Iterator
{
    /**
     * @param $array
     *
     * @return Preset
     */
    function getObject($array)
    {
        $entity = Preset::CreateFromArray($array);

        return $entity;
    }
}
