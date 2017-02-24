<?php
/**
 * Created by PhpStorm.
 * User: sgavka
 * Date: 27.01.17
 * Time: 16:49
 */

namespace AlterEgo\BitrixAPI\classes\api\bitrix24\crm;


use AlterEgo\BitrixAPI\classes\api\common\Entity;
use AlterEgo\BitrixAPI\classes\api\common\EntityQuery;
use AlterEgo\BitrixAPI\classes\api\common\Filter;
use AlterEgo\BitrixAPI\classes\models\crm\AddressIterator;
use AlterEgo\BitrixAPI\classes\models\crm\BankDetail;
use AlterEgo\BitrixAPI\classes\models\crm\BankDetailIterator;
use AlterEgo\BitrixAPI\classes\models\crm\InvoiceIterator;
use AlterEgo\BitrixAPI\classes\models\crm\PersonTypeIterator;
use AlterEgo\BitrixAPI\classes\models\crm\PresetIterator;
use AlterEgo\BitrixAPI\classes\models\crm\RequisiteIterator;
use AlterEgo\BitrixAPI\classes\models\crm\UserField;
use AlterEgo\BitrixAPI\classes\models\crm\UserFieldIterator;
use AlterEgo\MoeDeloAPI\BitrixConst;
use Bitrix24\Exceptions\Bitrix24Exception;

class Requisite extends Entity
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
     * @param \AlterEgo\BitrixAPI\classes\models\crm\Requisite $requisite
     * @return integer|boolean
     */
    public function create(\AlterEgo\BitrixAPI\classes\models\crm\Requisite $requisite)
    {
        $requisiteApi = new \Bitrix24\CRM\Requisite\Requisite($this->getClient()->getBitrixApp());

        $response = $requisiteApi->add($requisite->toArray());

        return $response['result'];
    }

    /**
     * @param \AlterEgo\BitrixAPI\classes\models\crm\Requisite $requisite
     * @return boolean
     */
    public function update(\AlterEgo\BitrixAPI\classes\models\crm\Requisite $requisite)
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
     * @param \AlterEgo\BitrixAPI\classes\models\crm\Preset $preset
     * @return integer|boolean
     */
    public function presetCreate(\AlterEgo\BitrixAPI\classes\models\crm\Preset $preset)
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
     * @param \AlterEgo\BitrixAPI\classes\models\crm\Address $address
     * @return boolean
     */
    public function addressCreate(\AlterEgo\BitrixAPI\classes\models\crm\Address $address)
    {
        $requisiteApi = new \Bitrix24\CRM\Requisite\Address($this->getClient()->getBitrixApp());

        $response = $requisiteApi->add($address->toArray());

        return $response['result'];
    }

    /**
     * @param \AlterEgo\BitrixAPI\classes\models\crm\Address $address
     * @return boolean
     */
    public function addressUpdate(\AlterEgo\BitrixAPI\classes\models\crm\Address $address)
    {
        $requisiteApi = new \Bitrix24\CRM\Requisite\Address($this->getClient()->getBitrixApp());

        $response = $requisiteApi->update($address->toArray());

        return $response['result'];
    }

    /**
     * @param \AlterEgo\BitrixAPI\classes\models\crm\BankDetail $bankDetail
     * @return integer|boolean
     */
    public function bankDetailCreate(\AlterEgo\BitrixAPI\classes\models\crm\BankDetail $bankDetail)
    {
        $requisiteApi = new \Bitrix24\CRM\Requisite\Requisite($this->getClient()->getBitrixApp());

        $response = $requisiteApi->bankdetailAdd($bankDetail->toArray());

        return $response['result'];
    }

    /**
     * @param \AlterEgo\BitrixAPI\classes\models\crm\BankDetail $bankDetail
     * @return boolean
     */
    public function bankDetailUpdate(\AlterEgo\BitrixAPI\classes\models\crm\BankDetail $bankDetail)
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
