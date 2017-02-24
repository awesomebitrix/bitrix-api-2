<?php
/**
 * Created by PhpStorm.
 * User: sgavka
 * Date: 27.01.17
 * Time: 16:49
 */

namespace AlterEgo\BitrixAPI\classes\api\common\crm;


use AlterEgo\BitrixAPI\classes\api\common\Entity;
use AlterEgo\BitrixAPI\classes\api\common\EntityQuery;
use AlterEgo\BitrixAPI\classes\models\crm\InvoiceIterator;

class Company extends Entity
{
    /**
     * @param integer $id
     *
     * @return \AlterEgo\BitrixAPI\classes\models\crm\Company
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
     * @return \AlterEgo\BitrixAPI\classes\models\crm\Company
     */
    public function getByMoeDeloId($moeDeloId)
    {
        return $this->call(__FUNCTION__, array($moeDeloId));
    }

    /**
     * @param \AlterEgo\BitrixAPI\classes\models\crm\Company $company
     *
     * @return mixed
     */
    public function create(\AlterEgo\BitrixAPI\classes\models\crm\Company $company)
    {
        return $this->call(__FUNCTION__, array($company));
    }

    /**
     * @param string $moeDeloId
     * @return \AlterEgo\BitrixAPI\classes\models\crm\Company
     */
    public function getWithDetailsByMoeDeloId($moeDeloId)
    {
        return $this->call(__FUNCTION__, array($moeDeloId));
    }

    /**
     * @param \AlterEgo\BitrixAPI\classes\models\crm\Company $company
     *
     * @return boolean
     */
    public function update(\AlterEgo\BitrixAPI\classes\models\crm\Company $company)
    {
        return $this->call(__FUNCTION__, array($company));
    }

    public function userFieldCreate(\AlterEgo\BitrixAPI\classes\models\crm\UserField $userField)
    {
        return $this->call(__FUNCTION__, array($userField));
    }

    public function userFieldDelete($userFieldId)
    {
        return $this->call(__FUNCTION__, array($userFieldId));
    }

    public function userFieldGetList(EntityQuery $query)
    {
        return $this->call(__FUNCTION__, array($query));
    }

    /**
     * @param $fieldName
     * @return \AlterEgo\BitrixAPI\classes\models\crm\UserField
     */
    public function userFieldGetByFieldName($fieldName)
    {
        return $this->call(__FUNCTION__, array($fieldName));
    }
}
