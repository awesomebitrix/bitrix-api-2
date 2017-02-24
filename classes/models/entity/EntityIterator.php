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

class EntityIterator extends Iterator
{
    /**
     * @param $array
     *
     * @return Entity
     */
    function getObject($array)
    {
        $invoice = Entity::CreateFromArray($array);

        return $invoice;
    }
}
