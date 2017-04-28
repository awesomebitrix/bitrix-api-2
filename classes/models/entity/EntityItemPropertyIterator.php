<?php

namespace AlterEgo\BitrixAPI\Classes\Models\Entity;

use AlterEgo\BitrixAPI\Classes\Iterator;

/**
 * Class EntityItemPropertyIterator
 * @package AlterEgo\BitrixAPI\Classes\Models\Entity
 * @method EntityItemProperty current()
 */
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
