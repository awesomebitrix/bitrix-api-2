<?php

namespace AlterEgo\BitrixAPI\Classes\Api\Common\Crm;

use AlterEgo\BitrixAPI\Classes\Entity as EntityAbstract;
use AlterEgo\BitrixAPI\Classes\EntityQuery;
use AlterEgo\BitrixAPI\Classes\Models\Crm\Invoice;
use AlterEgo\BitrixAPI\Classes\Models\Crm\InvoiceIterator;
use AlterEgo\BitrixAPI\Classes\Models\Crm\UserField;

class InvoiceApi extends EntityAbstract
{
    /**
     * @param integer $id
     *
     * @return Invoice
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
     * @return Invoice
     */
    public function getByMoeDeloId($moeDeloId)
    {
        return $this->call(__FUNCTION__, array($moeDeloId));
    }

    /**
     * @param Invoice $invoice
     *
     * @return mixed
     */
    public function create(Invoice $invoice)
    {
        return $this->call(__FUNCTION__, array($invoice));
    }

    /**
     * @param Invoice $invoice
     *
     * @return boolean
     */
    public function update(Invoice $invoice)
    {
        return $this->call(__FUNCTION__, array($invoice));
    }

    /**
     * @param UserField $userField
     * @return mixed
     */
    public function userFieldCreate(UserField $userField)
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
