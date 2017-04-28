<?php

namespace AlterEgo\BitrixAPI\Classes\Models\Event;

use AlterEgo\BitrixAPI\Classes\Iterator;

/**
 * Class EventIterator
 * @package AlterEgo\BitrixAPI\Classes\Models\Event
 * @method Event current()
 */
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
