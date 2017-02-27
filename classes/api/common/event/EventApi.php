<?php

namespace AlterEgo\BitrixAPI\Classes\Api\Common\Event;

use AlterEgo\BitrixAPI\classes\api\common\Entity as EntityAbstract;
use AlterEgo\BitrixAPI\classes\api\common\EntityQuery;
use AlterEgo\BitrixAPI\classes\api\Filter;
use AlterEgo\BitrixAPI\classes\api\Order;
use AlterEgo\BitrixAPI\classes\Models\Crm\InvoiceIterator;
use AlterEgo\BitrixAPI\classes\Models\Entity\EntityItemProperty;
use AlterEgo\BitrixAPI\classes\Models\Entity\EntityIterator;
use AlterEgo\BitrixAPI\classes\Models\EventIterator;

class EventApi extends EntityAbstract
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
     * @param \AlterEgo\BitrixAPI\classes\Models\Event $event
     * @return boolean
     */
    public function bind(\AlterEgo\BitrixAPI\classes\Models\Event $event)
    {
        return $this->call(__FUNCTION__, array($event));
    }

    /**
    * @param \AlterEgo\BitrixAPI\classes\Models\Event $event
    * @return integer Count of deleted events
    */
    public function unbind(\AlterEgo\BitrixAPI\classes\Models\Event $event)
    {
        return $this->call(__FUNCTION__, array($event));
    }
}
