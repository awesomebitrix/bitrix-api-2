<?php

namespace AlterEgo\BitrixAPI\Classes\Models\Crm;

use AlterEgo\BitrixAPI\Classes\Iterator;

/**
 * Class UserFieldIterator
 * @package AlterEgo\BitrixAPI\Classes\Models\Crm
 * @method UserField current()
 */
class UserFieldIterator extends Iterator
{
    /**
     * @param $array
     *
     * @return UserField
     */
    function getObject($array)
    {
        $invoice = UserField::CreateFromArray($array);

        return $invoice;
    }
}
