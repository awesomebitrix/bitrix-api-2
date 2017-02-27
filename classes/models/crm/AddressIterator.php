<?php

namespace AlterEgo\BitrixAPI\Classes\Models\Crm;

use AlterEgo\BitrixAPI\Classes\Iterator;

class AddressIterator extends Iterator
{
    /**
     * @param $array
     *
     * @return Address
     */
    function getObject($array)
    {
        $address = Address::CreateFromArray($array);

        return $address;
    }
}
