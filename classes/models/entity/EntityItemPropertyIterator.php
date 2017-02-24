<?php
/**
 * Created by PhpStorm.
 * User: sgavka
 * Date: 30.01.17
 * Time: 17:26
 */

namespace AlterEgo\BitrixAPI\classes\models\entity;

use AlterEgo\BitrixAPI\classes\api\common\Iterator;
use AlterEgo\BitrixAPI\classes\models\entity\Entity;
use AlterEgo\BitrixAPI\classes\models\entity\EntityItem;

class EntityItemPropertyIterator extends Iterator
{
    /**
     * @param $array
     *
     * @return EntityItem
     */
    function getObject($array)
    {
        $invoice = EntityItemProperty::CreateFromArray($array);

        return $invoice;
    }
}
