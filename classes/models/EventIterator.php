<?php
/**
 * Created by PhpStorm.
 * User: sgavka
 * Date: 30.01.17
 * Time: 17:26
 */

namespace AlterEgo\BitrixAPI\classes\models;

use AlterEgo\BitrixAPI\classes\api\common\Iterator;

class EventIterator extends Iterator
{
    /**
     * @param $array
     *
     * @return Event
     */
    function getObject($array)
    {
        $event = Event::CreateFromArray($array);

        return $event;
    }
}
