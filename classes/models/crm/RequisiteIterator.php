<?php

namespace AlterEgo\BitrixAPI\Classes\Models\Crm;

use AlterEgo\BitrixAPI\Classes\Iterator;
use AlterEgo\BitrixAPI\Exceptions\ExceptionModelPropertyValueIsInvalid;

/**
 * Class RequisiteIterator
 * @package AlterEgo\BitrixAPI\Classes\Models\Crm
 * @method Requisite current()
 */
class RequisiteIterator extends Iterator
{
    /**
     * @param $array
     * @return Requisite
     * @throws \Exception
     */
    function getObject($array)
    {
        try { // todo: what is this?
            $entity = Requisite::CreateFromArray($array);

            return $entity;
        } catch (ExceptionModelPropertyValueIsInvalid $exception) {
            throw new \Exception();
        }
    }
}
