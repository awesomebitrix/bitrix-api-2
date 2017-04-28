<?php

namespace AlterEgo\BitrixAPI\Classes\Models\Crm;

use AlterEgo\BitrixAPI\Classes\Iterator;

/**
 * Class PersonTypeIterator
 * @package AlterEgo\BitrixAPI\Classes\Models\Crm
 * @method PersonType current()
 */
class PersonTypeIterator extends Iterator
{
    /**
     * @param $array
     *
     * @return PersonType
     */
    function getObject($array)
    {
        $personType = PersonType::CreateFromArray($array);

        return $personType;
    }
}
