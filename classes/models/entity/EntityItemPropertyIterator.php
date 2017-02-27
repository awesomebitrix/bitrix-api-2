<?php

namespace AlterEgo\BitrixAPI\Classes\Models\Entity;

use AlterEgo\BitrixAPI\Classes\Iterator;

class EntityItemPropertyIterator extends Iterator
{
    /**
     * @param $array
     *
     * @return EntityItemProperty
     */
    function getObject($array)
    {
        $invoice = EntityItemProperty::CreateFromArray($array);

        return $invoice;
    }
}
