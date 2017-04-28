<?php

namespace AlterEgo\BitrixAPI\Classes\Api\Common\Event;

use AlterEgo\BitrixAPI\Classes\Entity;
use AlterEgo\BitrixAPI\Classes\Models\Entity\EntityIterator;
use AlterEgo\BitrixAPI\Classes\Models\Event\Event;

class EventApi extends Entity
{
    /**
     * @param string|null $scope
     *
     * @return string[]
     */
    public function getAll($scope = null)
    {
        return $this->call(__FUNCTION__, array($scope));
    }

    /**
     * @return EntityIterator
     */
    public function get()
    {
        return $this->call(__FUNCTION__, array());
    }

    /**
     * @param Event $event
     * @return boolean
     */
    public function bind(Event $event)
    {
        return $this->call(__FUNCTION__, array($event));
    }

    /**
    * @param Event $event
    * @return integer Count of deleted events
    */
    public function unbind(Event $event)
    {
        return $this->call(__FUNCTION__, array($event));
    }
}
