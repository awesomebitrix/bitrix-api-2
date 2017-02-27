<?php

namespace AlterEgo\BitrixAPI\Classes\Api\Common\Crm;

use AlterEgo\BitrixAPI\Classes\Entity;
use AlterEgo\BitrixAPI\Classes\EntityQuery;
use AlterEgo\BitrixAPI\classes\Models\Crm\Address;
use AlterEgo\BitrixAPI\classes\Models\Crm\AddressIterator;
use AlterEgo\BitrixAPI\classes\Models\Crm\BankDetailIterator;
use AlterEgo\BitrixAPI\classes\Models\Crm\InvoiceIterator;
use AlterEgo\BitrixAPI\classes\Models\Crm\Preset;
use AlterEgo\BitrixAPI\classes\Models\Crm\PresetIterator;
use AlterEgo\BitrixAPI\classes\Models\Crm\RequisiteIterator;

class Requisite extends Entity
{
    /**
     * @param integer $id
     *
     * @return \AlterEgo\BitrixAPI\classes\Models\Crm\Requisite
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
     * @param \AlterEgo\BitrixAPI\classes\Models\Crm\Requisite $requisite
     *
     * @return integer|boolean
     */
    public function create(\AlterEgo\BitrixAPI\classes\Models\Crm\Requisite $requisite)
    {
        return $this->call(__FUNCTION__, array($requisite));
    }

    /**
     * @param \AlterEgo\BitrixAPI\classes\Models\Crm\Requisite $requisite
     *
     * @return boolean
     */
    public function update(\AlterEgo\BitrixAPI\classes\Models\Crm\Requisite $requisite)
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
     * @param \AlterEgo\BitrixAPI\classes\Models\Crm\Preset $preset
     *
     * @return integer|boolean
     */
    public function presetCreate(\AlterEgo\BitrixAPI\classes\Models\Crm\Preset $preset)
    {
        return $this->call(__FUNCTION__, array($preset));
    }

    /**
     * @param \AlterEgo\BitrixAPI\classes\Models\Crm\Address $address
     *
     * @return integer|boolean
     */
    public function addressCreate(\AlterEgo\BitrixAPI\classes\Models\Crm\Address $address)
    {
        return $this->call(__FUNCTION__, array($address));
    }

    /**
     * @param \AlterEgo\BitrixAPI\classes\Models\Crm\Address $address
     *
     * @return boolean
     */
    public function addressUpdate(\AlterEgo\BitrixAPI\classes\Models\Crm\Address $address)
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
     * @param \AlterEgo\BitrixAPI\classes\Models\Crm\BankDetail $bankDetail
     *
     * @return integer|boolean
     */
    public function bankDetailCreate(\AlterEgo\BitrixAPI\classes\Models\Crm\BankDetail $bankDetail)
    {
        return $this->call(__FUNCTION__, array($bankDetail));
    }

    /**
     * @param \AlterEgo\BitrixAPI\classes\Models\Crm\BankDetail $bankDetail
     *
     * @return boolean
     */
    public function bankDetailUpdate(\AlterEgo\BitrixAPI\classes\Models\Crm\BankDetail $bankDetail)
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
