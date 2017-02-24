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

class PresetIterator extends Iterator
{
    /**
     * @param $array
     *
     * @return Preset
     */
    function getObject($array)
    {
        $entity = Preset::CreateFromArray($array);

        return $entity;
    }
}
