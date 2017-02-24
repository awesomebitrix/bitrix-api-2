<?php
/**
 * Created by PhpStorm.
 * User: sgavka
 * Date: 27.01.17
 * Time: 16:49
 */

namespace AlterEgo\BitrixAPI\classes\api\bitrix24;


use AlterEgo\BitrixAPI\classes\api\common\Entity as EntityAbstract;
use AlterEgo\BitrixAPI\classes\api\common\EntityQuery;
use AlterEgo\BitrixAPI\classes\api\common\Filter;
use AlterEgo\BitrixAPI\classes\models\crm\InvoiceIterator;
use AlterEgo\BitrixAPI\classes\models\crm\UserField;
use AlterEgo\BitrixAPI\classes\models\crm\UserFieldIterator;
use AlterEgo\BitrixAPI\classes\models\entity\EntityItemProperty;
use AlterEgo\BitrixAPI\classes\models\EventIterator;
use Bitrix24\Exceptions\Bitrix24Exception;

class Event extends EntityAbstract
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
     * @param \AlterEgo\BitrixAPI\classes\models\Event $event
     *
     * @return boolean
     */
    public function bind(\AlterEgo\BitrixAPI\classes\models\Event $event)
    {
        $eventApi = new \Bitrix24\Event\Event($this->getClient()->getBitrixApp());

        $response = $eventApi->bind($event->getEvent(), $event->getHandler(), $event->getAuthType());

        return $response['result'];
    }

    /**
     * @param \AlterEgo\BitrixAPI\classes\models\Event $event
     *
     * @return integer Count of deleted events
     */
    public function unbind(\AlterEgo\BitrixAPI\classes\models\Event $event)
    {
        $eventApi = new \Bitrix24\Event\Event($this->getClient()->getBitrixApp());

        $response = $eventApi->unbind($event->getEvent(), $event->getHandler(), $event->getAuthType());

        return $response['result'];
    }
}
