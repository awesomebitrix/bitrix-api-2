<?php

namespace AlterEgo\BitrixAPI\Classes\Models\Crm;

use AlterEgo\BitrixAPI\Classes\Iterator;

/**
 * Class AddressIterator
 * @package AlterEgo\BitrixAPI\Classes\Models\Crm
 * @method Address current()
 */
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
