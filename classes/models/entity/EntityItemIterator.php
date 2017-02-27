<?php

namespace AlterEgo\BitrixAPI\Classes\Models\Entity;

use AlterEgo\BitrixAPI\Classes\Iterator;

class EntityItemIterator extends Iterator
{
    /**
     * @param $array
     *
     * @return EntityItem
     */
    function getObject($array)
    {
        $invoice = EntityItem::CreateFromArray($array);

        return $invoice;
    }
}
