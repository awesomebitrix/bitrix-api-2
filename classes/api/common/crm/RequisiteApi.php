<?php

namespace AlterEgo\BitrixAPI\Classes\Api\Common\Crm;

use AlterEgo\BitrixAPI\Classes\Entity;
use AlterEgo\BitrixAPI\Classes\EntityQuery;
use AlterEgo\BitrixAPI\Classes\Models\Crm\Address;
use AlterEgo\BitrixAPI\Classes\Models\Crm\AddressIterator;
use AlterEgo\BitrixAPI\Classes\Models\Crm\BankDetail;
use AlterEgo\BitrixAPI\Classes\Models\Crm\BankDetailIterator;
use AlterEgo\BitrixAPI\Classes\Models\Crm\Preset;
use AlterEgo\BitrixAPI\Classes\Models\Crm\PresetIterator;
use AlterEgo\BitrixAPI\Classes\Models\Crm\RequisiteIterator;

class RequisiteApi extends Entity
{
    /**
     * @param integer $id
     *
     * @return \AlterEgo\BitrixAPI\Classes\Models\Crm\Requisite
     */
    public function getById($id)
    {
        return $this->call(__FUNCTION__, array($id));
    }

    /**
     * @param EntityQuery $query
     *
     * @return RequisiteIterator
     */
    public function getList(EntityQuery $query)
    {
        return $this->call(__FUNCTION__, array($query));
    }

    /**
     * @param \AlterEgo\BitrixAPI\Classes\Models\Crm\Requisite $requisite
     *
     * @return integer|boolean
     */
    public function create(\AlterEgo\BitrixAPI\Classes\Models\Crm\Requisite $requisite)
    {
        return $this->call(__FUNCTION__, array($requisite));
    }

    /**
     * @param \AlterEgo\BitrixAPI\Classes\Models\Crm\Requisite $requisite
     *
     * @return boolean
     */
    public function update(\AlterEgo\BitrixAPI\Classes\Models\Crm\Requisite $requisite)
    {
        return $this->call(__FUNCTION__, array($requisite));
    }

    /**
     * @param EntityQuery $query
     *
     * @return PresetIterator
     */
    public function presetGetList(EntityQuery $query)
    {
        return $this->call(__FUNCTION__, array($query));
    }

    /**
     * @param Preset $preset
     *
     * @return integer|boolean
     */
    public function presetCreate(Preset $preset)
    {
        return $this->call(__FUNCTION__, array($preset));
    }

    /**
     * @param Address $address
     *
     * @return integer|boolean
     */
    public function addressCreate(Address $address)
    {
        return $this->call(__FUNCTION__, array($address));
    }

    /**
     * @param Address $address
     *
     * @return boolean
     */
    public function addressUpdate(Address $address)
    {
        return $this->call(__FUNCTION__, array($address));
    }

    /**
     * @param EntityQuery $query
     *
     * @return AddressIterator
     */
    public function addressGetList(EntityQuery $query)
    {
        return $this->call(__FUNCTION__, array($query));
    }

    /**
     * @param BankDetail $bankDetail
     *
     * @return integer|boolean
     */
    public function bankDetailCreate(BankDetail $bankDetail)
    {
        return $this->call(__FUNCTION__, array($bankDetail));
    }

    /**
     * @param BankDetail $bankDetail
     *
     * @return boolean
     */
    public function bankDetailUpdate(BankDetail $bankDetail)
    {
        return $this->call(__FUNCTION__, array($bankDetail));
    }

    /**
     * @param EntityQuery $query
     *
     * @return BankDetailIterator
     */
    public function bankDetailGetList(EntityQuery $query)
    {
        return $this->call(__FUNCTION__, array($query));
    }
}
