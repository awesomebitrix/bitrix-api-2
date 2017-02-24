<?php
/**
 * Created by PhpStorm.
 * User: sgavka
 * Date: 30.01.17
 * Time: 17:26
 */

namespace AlterEgo\BitrixAPI\classes\models\crm;


use AlterEgo\BitrixAPI\classes\models\crm\Invoice;
use AlterEgo\BitrixAPI\classes\api\common\Iterator;
use AlterEgo\BitrixAPI\exceptions\ExceptionModelPropertyValueIsInvalid;

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
