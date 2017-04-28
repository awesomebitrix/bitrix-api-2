<?php

namespace AlterEgo\BitrixAPI\Classes\Models\Entity;

use AlterEgo\BitrixAPI\Classes\Iterator;

/**
 * Class EntityItemIterator
 * @package AlterEgo\BitrixAPI\Classes\Models\Entity
 * @method EntityItem current()
 */
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
