<?php

namespace AlterEgo\BitrixAPI\Classes\Api\BitrixCloud\Event;

use AlterEgo\BitrixAPI\Classes\Entity;
use AlterEgo\BitrixAPI\Classes\Models\Event\Event;
use AlterEgo\BitrixAPI\Classes\Models\Event\EventIterator;

class EventApi extends Entity
{
    /**
     * @param string|null $scope
     * @return string[]
     */
    public function getAll($scope = null)
    {
        $eventApi = new \Bitrix24\Event\Event($this->getClient()->getBitrixCloudApp());

        $response = $eventApi->getList($scope);

        return $response['result'];
    }

    /**
     * @return EventIterator
     */
    public function get()
    {
        $eventApi = new \Bitrix24\Event\Event($this->getClient()->getBitrixCloudApp());

        $response = $eventApi->get();

        $eventIterator = new EventIterator($response['result']);

        return $eventIterator;
    }

    /**
     * @param Event $event
     *
     * @return boolean
     */
    public function bind(Event $event)
    {
        $eventApi = new \Bitrix24\Event\Event($this->getClient()->getBitrixCloudApp());

        $response = $eventApi->bind($event->getEvent(), $event->getHandler(), $event->getAuthType());

        return $response['result'];
    }

    /**
     * @param Event $event
     *
     * @return integer Count of deleted events
     */
    public function unbind(Event $event)
    {
        $eventApi = new \Bitrix24\Event\Event($this->getClient()->getBitrixCloudApp());

        $response = $eventApi->unbind($event->getEvent(), $event->getHandler(), $event->getAuthType());

        return $response['result'];
    }
}
