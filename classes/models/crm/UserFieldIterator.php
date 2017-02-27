<?php

namespace AlterEgo\BitrixAPI\Classes\Models\Crm;

use AlterEgo\BitrixAPI\Classes\Iterator;

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
