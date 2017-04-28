<?php

namespace AlterEgo\BitrixAPI\Classes\Api\Common\Crm;

use AlterEgo\BitrixAPI\Classes\Entity;
use AlterEgo\BitrixAPI\Classes\EntityQuery;
use AlterEgo\BitrixAPI\Classes\Models\Crm\Company;
use AlterEgo\BitrixAPI\Classes\Models\Crm\InvoiceIterator;
use AlterEgo\BitrixAPI\Classes\Models\Crm\UserField;

class CompanyApi extends Entity
{
    /**
     * @param integer $id
     *
     * @return Company
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
     * @return Company
     */
    public function getByMoeDeloId($moeDeloId)
    {
        return $this->call(__FUNCTION__, array($moeDeloId));
    }

    /**
     * @param Company $company
     *
     * @return integer|boolean
     */
    public function create(Company $company)
    {
        return $this->call(__FUNCTION__, array($company));
    }

    /**
     * @param string $moeDeloId
     * @return Company
     */
    public function getWithDetailsByMoeDeloId($moeDeloId)
    {
        return $this->call(__FUNCTION__, array($moeDeloId));
    }

    /**
     * @param Company $company
     *
     * @return boolean
     */
    public function update(Company $company)
    {
        return $this->call(__FUNCTION__, array($company));
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
