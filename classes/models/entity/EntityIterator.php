<?php

namespace AlterEgo\BitrixAPI\classes\Models\Entity;

use AlterEgo\BitrixAPI\Classes\Iterator;

/**
 * Class EntityIterator
 * @package AlterEgo\BitrixAPI\classes\Models\Entity
 * @method Entity current()
 */
class EntityIterator extends Iterator
{
    /**
     * @param $array
     *
     * @return Entity
     */
    function getObject($array)
    {
        $invoice = Entity::CreateFromArray($array);

        return $invoice;
    }
}
