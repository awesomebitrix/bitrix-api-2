<?php

namespace AlterEgo\BitrixAPI\Classes\Api\BitrixCloud\Crm;

use AlterEgo\BitrixAPI\Classes\Entity;
use AlterEgo\BitrixAPI\Classes\EntityQuery;
use AlterEgo\BitrixAPI\Classes\Models\Crm\Address;
use AlterEgo\BitrixAPI\Classes\Models\Crm\AddressIterator;
use AlterEgo\BitrixAPI\Classes\Models\Crm\BankDetail;
use AlterEgo\BitrixAPI\Classes\Models\Crm\BankDetailIterator;
use AlterEgo\BitrixAPI\Classes\Models\Crm\Preset;
use AlterEgo\BitrixAPI\Classes\Models\Crm\PresetIterator;
use AlterEgo\BitrixAPI\Classes\Models\Crm\Requisite;
use AlterEgo\BitrixAPI\Classes\Models\Crm\RequisiteIterator;

class RequisiteApi extends Entity
{
    /**
     * @param EntityQuery $query
     *
     * @return RequisiteIterator
     */
    public function getList(EntityQuery $query)
    {
        $requisiteApi = new \Bitrix24\CRM\Requisite\Requisite($this->getClient()->getBitrixCloudApp());

        $response = $requisiteApi->getList(
            $query->getOrder()->asArray(),
            $query->getFilter()->asArray()
        );

        return new RequisiteIterator($response['result']);
    }

    /**
     * @param Requisite $requisite
     * @return integer|boolean
     */
    public function create(Requisite $requisite)
    {
        $requisiteApi = new \Bitrix24\CRM\Requisite\Requisite($this->getClient()->getBitrixCloudApp());

        $response = $requisiteApi->add($requisite->toArray());

        return $response['result'];
    }

    /**
     * @param Requisite $requisite
     * @return boolean
     */
    public function update(Requisite $requisite)
    {
        $requisiteApi = new \Bitrix24\CRM\Requisite\Requisite($this->getClient()->getBitrixCloudApp());

        $response = $requisiteApi->update($requisite->getId(), $requisite->toArray());

        return $response['result'];
    }

    /**
     * @param EntityQuery $query
     * @return PresetIterator
     */
    public function presetGetList(EntityQuery $query)
    {
        $requisiteApi = new \Bitrix24\CRM\Requisite\Requisite($this->getClient()->getBitrixCloudApp());

        $response = $requisiteApi->presetGetList(
            $query->getOrder()->asArray(),
            $query->getFilter()->asArray(),
            $query->getSelect()->asArray(),
            $query->getNavigation()->getPageNumber() ? $query->getNavigation()->getPageNumber() : 0
        );

        return new PresetIterator($response['result']);
    }

    /**
     * @param Preset $preset
     * @return integer|boolean
     */
    public function presetCreate(Preset $preset)
    {
        $requisiteApi = new \Bitrix24\CRM\Requisite\Requisite($this->getClient()->getBitrixCloudApp());

        $response = $requisiteApi->presetAdd($preset->toArray());

        return $response['result'];
    }

    /**
     * @param EntityQuery $query
     * @return AddressIterator
     */
    public function addressGetList(EntityQuery $query)
    {
        $requisiteApi = new \Bitrix24\CRM\Requisite\Address($this->getClient()->getBitrixCloudApp());

        $response = $requisiteApi->getList(
            $query->getOrder()->asArray(),
            $query->getFilter()->asArray(),
            $query->getSelect()->asArray(),
            $query->getNavigation()->getPageNumber() ? $query->getNavigation()->getPageNumber() : 0
        );

        return new AddressIterator($response['result']);
    }

    /**
     * @param Address $address
     * @return boolean
     */
    public function addressCreate(Address $address)
    {
        $requisiteApi = new \Bitrix24\CRM\Requisite\Address($this->getClient()->getBitrixCloudApp());

        $response = $requisiteApi->add($address->toArray());

        return $response['result'];
    }

    /**
     * @param Address $address
     * @return boolean
     */
    public function addressUpdate(Address $address)
    {
        $requisiteApi = new \Bitrix24\CRM\Requisite\Address($this->getClient()->getBitrixCloudApp());

        $response = $requisiteApi->update($address->toArray());

        return $response['result'];
    }

    /**
     * @param BankDetail $bankDetail
     * @return integer|boolean
     */
    public function bankDetailCreate(BankDetail $bankDetail)
    {
        $requisiteApi = new \Bitrix24\CRM\Requisite\Requisite($this->getClient()->getBitrixCloudApp());

        $response = $requisiteApi->bankdetailAdd($bankDetail->toArray());

        return $response['result'];
    }

    /**
     * @param BankDetail $bankDetail
     * @return boolean
     */
    public function bankDetailUpdate(BankDetail $bankDetail)
    {
        $requisiteApi = new \Bitrix24\CRM\Requisite\Requisite($this->getClient()->getBitrixCloudApp());

        $response = $requisiteApi->bankdetailUpdate($bankDetail->getId(), $bankDetail->toArray());

        return $response['result'];
    }

    /**
     * @param EntityQuery $query
     * @return BankDetailIterator
     */
    public function bankDetailGetList(EntityQuery $query)
    {
        $requisiteApi = new \Bitrix24\CRM\Requisite\Requisite($this->getClient()->getBitrixCloudApp());

        $response = $requisiteApi->bankdetailGetList(
            $query->getOrder()->asArray(),
            $query->getFilter()->asArray(),
            $query->getSelect()->asArray(),
            $query->getNavigation()->getPageNumber() ? $query->getNavigation()->getPageNumber() : 0
        );

        return new BankDetailIterator($response['result']);
    }
}
