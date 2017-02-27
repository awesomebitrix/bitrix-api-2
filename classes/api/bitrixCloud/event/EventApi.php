<?php
/**
 * Created by PhpStorm.
 * User: sgavka
 * Date: 27.01.17
 * Time: 16:49
 */

namespace AlterEgo\BitrixAPI\Classes\Api\BitrixCloud\Event;


use AlterEgo\BitrixAPI\classes\api\common\Entity as EntityAbstract;
use AlterEgo\BitrixAPI\classes\api\common\EntityQuery;
use AlterEgo\BitrixAPI\classes\api\common\Filter;
use AlterEgo\BitrixAPI\classes\Models\Crm\InvoiceIterator;
use AlterEgo\BitrixAPI\classes\Models\Crm\UserField;
use AlterEgo\BitrixAPI\classes\Models\Crm\UserFieldIterator;
use AlterEgo\BitrixAPI\classes\Models\Entity\EntityItemProperty;
use AlterEgo\BitrixAPI\classes\Models\EventIterator;
use Bitrix24\Exceptions\Bitrix24Exception;

class EventApi extends EntityAbstract
{
    /**
     * @param string|null $scope
     * @return \string[]
     */
    public function getAll($scope = null)
    {
        $eventApi = new \Bitrix24\Event\Event($this->getClient()->getBitrixApp());

        $response = $eventApi->getList($scope);

        return $response['result'];
    }

    /**
     * @return EventIterator
     */
    public function get()
    {
        $eventApi = new \Bitrix24\Event\Event($this->getClient()->getBitrixApp());

        $response = $eventApi->get();

        $eventIterator = new EventIterator($response['result']);

        return $eventIterator;
    }

    /**
     * @param \AlterEgo\BitrixAPI\classes\Models\Event $event
     *
     * @return boolean
     */
    public function bind(\AlterEgo\BitrixAPI\classes\Models\Event $event)
    {
        $eventApi = new \Bitrix24\Event\Event($this->getClient()->getBitrixApp());

        $response = $eventApi->bind($event->getEvent(), $event->getHandler(), $event->getAuthType());

        return $response['result'];
    }

    /**
     * @param \AlterEgo\BitrixAPI\classes\Models\Event $event
     *
     * @return integer Count of deleted events
     */
    public function unbind(\AlterEgo\BitrixAPI\classes\Models\Event $event)
    {
        $eventApi = new \Bitrix24\Event\Event($this->getClient()->getBitrixApp());

        $response = $eventApi->unbind($event->getEvent(), $event->getHandler(), $event->getAuthType());

        return $response['result'];
    }
}
