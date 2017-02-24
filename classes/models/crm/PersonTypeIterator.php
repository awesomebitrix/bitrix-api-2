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
