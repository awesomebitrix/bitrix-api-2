<?php

namespace AlterEgo\BitrixAPI\Classes\Models\Crm;

use AlterEgo\BitrixAPI\Classes\Iterator;
use AlterEgo\BitrixAPI\Exceptions\ExceptionModelPropertyValueIsInvalid;

class RequisiteIterator extends Iterator
{
    /**
     * @param $array
     * @return Requisite
     * @throws \Exception
     */
    function getObject($array)
    {
        try {
            $entity = Requisite::CreateFromArray($array);

            return $entity;
        } catch (ExceptionModelPropertyValueIsInvalid $exception) {
            throw new \Exception();
        }
    }
}
