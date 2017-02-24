<?php
/**
 * Created by PhpStorm.
 * User: sgavka
 * Date: 27.01.17
 * Time: 16:49
 */

namespace AlterEgo\BitrixAPI\classes\api\common;


use AlterEgo\BitrixAPI\classes\api\common\Entity as EntityAbstract;
use AlterEgo\BitrixAPI\classes\api\common\EntityQuery;
use AlterEgo\BitrixAPI\classes\api\Filter;
use AlterEgo\BitrixAPI\classes\api\Order;
use AlterEgo\BitrixAPI\classes\models\crm\InvoiceIterator;
use AlterEgo\BitrixAPI\classes\models\entity\EntityItemProperty;
use AlterEgo\BitrixAPI\classes\models\entity\EntityIterator;
use AlterEgo\BitrixAPI\classes\models\EventIterator;

class Event extends EntityAbstract
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
     * @param \AlterEgo\BitrixAPI\classes\models\Event $event
     * @return boolean
     */
    public function bind(\AlterEgo\BitrixAPI\classes\models\Event $event)
    {
        return $this->call(__FUNCTION__, array($event));
    }

    /**
    * @param \AlterEgo\BitrixAPI\classes\models\Event $event
    * @return integer Count of deleted events
    */
    public function unbind(\AlterEgo\BitrixAPI\classes\models\Event $event)
    {
        return $this->call(__FUNCTION__, array($event));
    }
}
