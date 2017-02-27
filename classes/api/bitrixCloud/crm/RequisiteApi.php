<?php
/**
 * Created by PhpStorm.
 * User: sgavka
 * Date: 27.01.17
 * Time: 16:49
 */

namespace AlterEgo\BitrixAPI\Classes\Api\BitrixCloud\Crm;


use AlterEgo\BitrixAPI\classes\api\common\Entity;
use AlterEgo\BitrixAPI\classes\api\common\EntityQuery;
use AlterEgo\BitrixAPI\classes\api\common\Filter;
use AlterEgo\BitrixAPI\classes\Models\Crm\AddressIterator;
use AlterEgo\BitrixAPI\classes\Models\Crm\BankDetail;
use AlterEgo\BitrixAPI\classes\Models\Crm\BankDetailIterator;
use AlterEgo\BitrixAPI\classes\Models\Crm\InvoiceIterator;
use AlterEgo\BitrixAPI\classes\Models\Crm\PersonTypeIterator;
use AlterEgo\BitrixAPI\classes\Models\Crm\PresetIterator;
use AlterEgo\BitrixAPI\classes\Models\Crm\RequisiteIterator;
use AlterEgo\BitrixAPI\classes\Models\Crm\UserField;
use AlterEgo\BitrixAPI\classes\Models\Crm\UserFieldIterator;
use AlterEgo\MoeDeloAPI\BitrixConst;
use Bitrix24\Exceptions\Bitrix24Exception;

class RequisiteApi extends Entity
{
    /**
     * @param EntityQuery $query
     *
     * @return RequisiteIterator
     */
    public function getList(EntityQuery $query)
    {
        $requisiteApi = new \Bitrix24\CRM\Requisite\Requisite($this->getClient()->getBitrixApp());

        $response = $requisiteApi->getList(
            $query->getOrder()->asArray(),
            $query->getFilter()->asArray()
        );

        return new RequisiteIterator($response['result']);
    }

    /**
     * @param \AlterEgo\BitrixAPI\classes\Models\Crm\Requisite $requisite
     * @return integer|boolean
     */
    public function create(\AlterEgo\BitrixAPI\classes\Models\Crm\Requisite $requisite)
    {
        $requisiteApi = new \Bitrix24\CRM\Requisite\Requisite($this->getClient()->getBitrixApp());

        $response = $requisiteApi->add($requisite->toArray());

        return $response['result'];
    }

    /**
     * @param \AlterEgo\BitrixAPI\classes\Models\Crm\Requisite $requisite
     * @return boolean
     */
    public function update(\AlterEgo\BitrixAPI\classes\Models\Crm\Requisite $requisite)
    {
        $requisiteApi = new \Bitrix24\CRM\Requisite\Requisite($this->getClient()->getBitrixApp());

        $response = $requisiteApi->update($requisite->getId(), $requisite->toArray());

        return $response['result']; // bool
    }

    /**
     * @param EntityQuery $query
     * @return PresetIterator
     */
    public function presetGetList(EntityQuery $query)
    {
        $requisiteApi = new \Bitrix24\CRM\Requisite\Requisite($this->getClient()->getBitrixApp());

        $response = $requisiteApi->presetGetList(
            $query->getOrder()->asArray(),
            $query->getFilter()->asArray(),
            $query->getSelect()->asArray(),
            $query->getNavigation()->getPageNumber() ? $query->getNavigation()->getPageNumber() : 0
        );

        return new PresetIterator($response['result']);
    }

    /**
     * @param \AlterEgo\BitrixAPI\classes\Models\Crm\Preset $preset
     * @return integer|boolean
     */
    public function presetCreate(\AlterEgo\BitrixAPI\classes\Models\Crm\Preset $preset)
    {
        $requisiteApi = new \Bitrix24\CRM\Requisite\Requisite($this->getClient()->getBitrixApp());

        $response = $requisiteApi->presetAdd($preset->toArray());

        return $response['result'];
    }

    /**
     * @param EntityQuery $query
     * @return AddressIterator
     */
    public function addressGetList(EntityQuery $query)
    {
        $requisiteApi = new \Bitrix24\CRM\Requisite\Address($this->getClient()->getBitrixApp());

        $response = $requisiteApi->getList(
            $query->getOrder()->asArray(),
            $query->getFilter()->asArray(),
            $query->getSelect()->asArray(),
            $query->getNavigation()->getPageNumber() ? $query->getNavigation()->getPageNumber() : 0
        );

        return new AddressIterator($response['result']);
    }

    /**
     * @param \AlterEgo\BitrixAPI\classes\Models\Crm\Address $address
     * @return boolean
     */
    public function addressCreate(\AlterEgo\BitrixAPI\classes\Models\Crm\Address $address)
    {
        $requisiteApi = new \Bitrix24\CRM\Requisite\Address($this->getClient()->getBitrixApp());

        $response = $requisiteApi->add($address->toArray());

        return $response['result'];
    }

    /**
     * @param \AlterEgo\BitrixAPI\classes\Models\Crm\Address $address
     * @return boolean
     */
    public function addressUpdate(\AlterEgo\BitrixAPI\classes\Models\Crm\Address $address)
    {
        $requisiteApi = new \Bitrix24\CRM\Requisite\Address($this->getClient()->getBitrixApp());

        $response = $requisiteApi->update($address->toArray());

        return $response['result'];
    }

    /**
     * @param \AlterEgo\BitrixAPI\classes\Models\Crm\BankDetail $bankDetail
     * @return integer|boolean
     */
    public function bankDetailCreate(\AlterEgo\BitrixAPI\classes\Models\Crm\BankDetail $bankDetail)
    {
        $requisiteApi = new \Bitrix24\CRM\Requisite\Requisite($this->getClient()->getBitrixApp());

        $response = $requisiteApi->bankdetailAdd($bankDetail->toArray());

        return $response['result'];
    }

    /**
     * @param \AlterEgo\BitrixAPI\classes\Models\Crm\BankDetail $bankDetail
     * @return boolean
     */
    public function bankDetailUpdate(\AlterEgo\BitrixAPI\classes\Models\Crm\BankDetail $bankDetail)
    {
        $requisiteApi = new \Bitrix24\CRM\Requisite\Requisite($this->getClient()->getBitrixApp());

        $response = $requisiteApi->bankdetailUpdate($bankDetail->getId(), $bankDetail->toArray());

        return $response['result'];
    }

    /**
     * @param EntityQuery $query
     * @return BankDetailIterator
     */
    public function bankDetailGetList(EntityQuery $query)
    {
        $requisiteApi = new \Bitrix24\CRM\Requisite\Requisite($this->getClient()->getBitrixApp());

        $response = $requisiteApi->bankdetailGetList(
            $query->getOrder()->asArray(),
            $query->getFilter()->asArray(),
            $query->getSelect()->asArray(),
            $query->getNavigation()->getPageNumber() ? $query->getNavigation()->getPageNumber() : 0
        );

        return new BankDetailIterator($response['result']);
    }
}
