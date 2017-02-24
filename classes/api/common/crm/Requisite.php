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
use AlterEgo\BitrixAPI\classes\models\crm\Address;
use AlterEgo\BitrixAPI\classes\models\crm\AddressIterator;
use AlterEgo\BitrixAPI\classes\models\crm\BankDetailIterator;
use AlterEgo\BitrixAPI\classes\models\crm\InvoiceIterator;
use AlterEgo\BitrixAPI\classes\models\crm\Preset;
use AlterEgo\BitrixAPI\classes\models\crm\PresetIterator;
use AlterEgo\BitrixAPI\classes\models\crm\RequisiteIterator;

class Requisite extends Entity
{
    /**
     * @param integer $id
     *
     * @return \AlterEgo\BitrixAPI\classes\models\crm\Requisite
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
     * @param \AlterEgo\BitrixAPI\classes\models\crm\Requisite $requisite
     *
     * @return integer|boolean
     */
    public function create(\AlterEgo\BitrixAPI\classes\models\crm\Requisite $requisite)
    {
        return $this->call(__FUNCTION__, array($requisite));
    }

    /**
     * @param \AlterEgo\BitrixAPI\classes\models\crm\Requisite $requisite
     *
     * @return boolean
     */
    public function update(\AlterEgo\BitrixAPI\classes\models\crm\Requisite $requisite)
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
     * @param \AlterEgo\BitrixAPI\classes\models\crm\Preset $preset
     *
     * @return integer|boolean
     */
    public function presetCreate(\AlterEgo\BitrixAPI\classes\models\crm\Preset $preset)
    {
        return $this->call(__FUNCTION__, array($preset));
    }

    /**
     * @param \AlterEgo\BitrixAPI\classes\models\crm\Address $address
     *
     * @return integer|boolean
     */
    public function addressCreate(\AlterEgo\BitrixAPI\classes\models\crm\Address $address)
    {
        return $this->call(__FUNCTION__, array($address));
    }

    /**
     * @param \AlterEgo\BitrixAPI\classes\models\crm\Address $address
     *
     * @return boolean
     */
    public function addressUpdate(\AlterEgo\BitrixAPI\classes\models\crm\Address $address)
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
     * @param \AlterEgo\BitrixAPI\classes\models\crm\BankDetail $bankDetail
     *
     * @return integer|boolean
     */
    public function bankDetailCreate(\AlterEgo\BitrixAPI\classes\models\crm\BankDetail $bankDetail)
    {
        return $this->call(__FUNCTION__, array($bankDetail));
    }

    /**
     * @param \AlterEgo\BitrixAPI\classes\models\crm\BankDetail $bankDetail
     *
     * @return boolean
     */
    public function bankDetailUpdate(\AlterEgo\BitrixAPI\classes\models\crm\BankDetail $bankDetail)
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
