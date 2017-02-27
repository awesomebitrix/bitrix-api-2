<?php

namespace AlterEgo\BitrixAPI\Classes\Api\Common\Crm;

use AlterEgo\BitrixAPI\classes\api\common\Entity;
use AlterEgo\BitrixAPI\classes\api\common\EntityQuery;
use AlterEgo\BitrixAPI\classes\api\Filter;
use AlterEgo\BitrixAPI\classes\api\Order;
use AlterEgo\BitrixAPI\classes\Models\Crm\InvoiceIterator;
use AlterEgo\BitrixAPI\classes\Models\Crm\UserField;

class InvoiceApi extends Entity
{
    /**
     * @param integer $id
     *
     * @return \AlterEgo\BitrixAPI\classes\Models\Crm\Invoice
     */
    public function getById($id)
    {
        return $this->call(__FUNCTION__, array($id));
    }

    /**
     * @param EntityQuery $query
     *
     * @return InvoiceIterator
     */
    public function getList(EntityQuery $query)
    {
        return $this->call(__FUNCTION__, array($query));
    }

    /**
     * @param integer $moeDeloId
     *
     * @return \AlterEgo\BitrixAPI\classes\Models\Crm\Invoice
     */
    public function getByMoeDeloId($moeDeloId)
    {
        return $this->call(__FUNCTION__, array($moeDeloId));
    }

    /**
     * @param \AlterEgo\BitrixAPI\classes\Models\Crm\Invoice $invoice
     *
     * @return mixed
     */
    public function create(\AlterEgo\BitrixAPI\classes\Models\Crm\Invoice $invoice)
    {
        return $this->call(__FUNCTION__, array($invoice));
    }

    /**
     * @param \AlterEgo\BitrixAPI\classes\Models\Crm\Invoice $invoice
     *
     * @return boolean
     */
    public function update(\AlterEgo\BitrixAPI\classes\Models\Crm\Invoice $invoice)
    {
        return $this->call(__FUNCTION__, array($invoice));
    }

    /**
     * @param UserField $userField
     * @return mixed
     */
    public function userFieldCreate(\AlterEgo\BitrixAPI\classes\Models\Crm\UserField $userField)
    {
        return $this->call(__FUNCTION__, array($userField));
    }

    /**
     * @param $userFieldId
     * @return mixed
     */
    public function userFieldDelete($userFieldId)
    {
        return $this->call(__FUNCTION__, array($userFieldId));
    }

    /**
     * @param EntityQuery $query
     * @return mixed
     */
    public function userFieldGetList(EntityQuery $query)
    {
        return $this->call(__FUNCTION__, array($query));
    }

    /**
     * @param $fieldName
     * @return UserField
     */
    public function userFieldGetByFieldName($fieldName)
    {
        return $this->call(__FUNCTION__, array($fieldName));
    }
}
