<?php

namespace AlterEgo\BitrixAPI\Classes\Api\Common\Crm;

use AlterEgo\BitrixAPI\Classes\Entity;
use AlterEgo\BitrixAPI\Classes\EntityQuery;
use AlterEgo\BitrixAPI\classes\Models\Crm\InvoiceIterator;

class CompanyApi extends Entity
{
    /**
     * @param integer $id
     *
     * @return \AlterEgo\BitrixAPI\classes\Models\Crm\Company
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
     * @return \AlterEgo\BitrixAPI\classes\Models\Crm\Company
     */
    public function getByMoeDeloId($moeDeloId)
    {
        return $this->call(__FUNCTION__, array($moeDeloId));
    }

    /**
     * @param \AlterEgo\BitrixAPI\classes\Models\Crm\Company $company
     *
     * @return mixed
     */
    public function create(\AlterEgo\BitrixAPI\classes\Models\Crm\Company $company)
    {
        return $this->call(__FUNCTION__, array($company));
    }

    /**
     * @param string $moeDeloId
     * @return \AlterEgo\BitrixAPI\classes\Models\Crm\Company
     */
    public function getWithDetailsByMoeDeloId($moeDeloId)
    {
        return $this->call(__FUNCTION__, array($moeDeloId));
    }

    /**
     * @param \AlterEgo\BitrixAPI\classes\Models\Crm\Company $company
     *
     * @return boolean
     */
    public function update(\AlterEgo\BitrixAPI\classes\Models\Crm\Company $company)
    {
        return $this->call(__FUNCTION__, array($company));
    }

    /**
     * @param \AlterEgo\BitrixAPI\classes\Models\Crm\UserField $userField
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
     * @return \AlterEgo\BitrixAPI\classes\Models\Crm\UserField
     */
    public function userFieldGetByFieldName($fieldName)
    {
        return $this->call(__FUNCTION__, array($fieldName));
    }
}
