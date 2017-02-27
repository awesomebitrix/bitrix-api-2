<?php

namespace AlterEgo\BitrixAPI\Classes\Models\Event;

class Event
{
    /**
     * @var string
     */
    private $event;

    /**
     * @var string For Bitrix24 this is url.
     */
    private $handler;

    /**
     * @var integer
     */
    private $authType;

    /**
     * @param $array
     *
     * @return self
     */
    public static function CreateFromArray($array)
    {
        $address = new self();

        $address->setEvent($array['event']);
        $address->setHandler($array['handler']);
        $address->setAuthType($array['auth_type']);

        return $address;
    }

    public function toArray()
    {
        $array = array();

        $array['event'] = $this->getEvent();
        $array['handler'] = $this->getHandler();
        $array['auth_type'] = $this->getAuthType();

        return $array;
    }

    /**
     * @param string $event
     * @return Event
     */
    public function setEvent($event)
    {
        $this->event = $event;
        return $this;
    }

    /**
     * @return string
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * @param string $handler
     * @return Event
     */
    public function setHandler($handler)
    {
        $this->handler = $handler;
        return $this;
    }

    /**
     * @return string
     */
    public function getHandler()
    {
        return $this->handler;
    }

    /**
     * @param int $authType
     * @return Event
     */
    public function setAuthType($authType)
    {
        $this->authType = $authType;
        return $this;
    }

    /**
     * @return int
     */
    public function getAuthType()
    {
        return $this->authType;
    }
}
