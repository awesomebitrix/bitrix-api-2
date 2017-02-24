<?php
/**
 * Created by PhpStorm.
 * User: sgavka
 * Date: 27.01.17
 * Time: 16:50
 */

namespace AlterEgo\BitrixAPI\classes\models\crm;


use AlterEgo\BitrixAPI\exceptions\ExceptionModelPropertyValueIsInvalid;

class Requisite
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string Y|N
     */
    private $active;

    /**
     * @var integer
     */
    private $sort;

    /**
     * @var integer
     */
    private $entityId;

    /**
     * @var integer
     */
    private $entityTypeId;

    /**
     * @var integer
     */
    private $presetId;

    /**
     * @var string
     */
    private $rqInn;

    /**
     * @var string
     */
    private $rqOkpo;

    /**
     * @var string Y|N
     */
    private $rqVatPayer;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $rqOgrn;

    /**
     * @var string
     */
    private $rqCompanyName;

    /**
     * @var string
     */
    private $rqCompanyFullName;

    /**
     * @var string
     */
    private $rqOgrnip;

    /**
     * @var Address[]
     */
    private $_addresses;

    /**
     * @var BankDetail[]
     */
    private $_bankDetails;

    /**
     * @param $array
     *
     * @return self
     */
    public static function CreateFromArray($array)
    {
        $address = new self(); // todo: complete

        $address->setId($array['ID']);
        $address->setEntityId($array['ENTITY_ID']);
        $address->setEntityTypeId($array['ENTITY_TYPE_ID']);
        $address->setPresetId($array['PRESET_ID']);
        $address->setActive($array['ACTIVE']);
        $address->setSort($array['SORT']);
        $address->setRqInn($array['RQ_INN']);
        $address->setRqOkpo($array['RQ_OKPO']);
        $address->setRqVatPayer($array['RQ_VAT_PAYER']);
        $address->setName($array['NAME']);
        $address->setRqOgrn($array['RQ_OGRN']);
        $address->setRqCompanyName($array['RQ_COMPANY_NAME']);
        $address->setRqCompanyFullName($array['RQ_COMPANY_FULL_NAME']);
        $address->setRqOgrnip($array['RQ_OGRNIP']);

        return $address;
    }

    public function toArray()
    {
        $array = array();

        $array['ID'] = $this->getId();
        $array['ENTITY_ID'] = $this->getEntityId();
        $array['ENTITY_TYPE_ID'] = $this->getEntityTypeId();
        $array['PRESET_ID'] = $this->getPresetId();
        $array['ACTIVE'] = $this->getActive();
        $array['SORT'] = $this->getSort();
        $array['RQ_INN'] = $this->getRqInn();
        $array['RQ_OKPO'] = $this->getRqOkpo();
        $array['RQ_VAT_PAYER'] = $this->getRqVatPayer();
        $array['NAME'] = $this->getName();
        $array['RQ_OGRN'] = $this->getRqOgrn();
        $array['RQ_COMPANY_NAME'] = $this->getRqCompanyName();
        $array['RQ_COMPANY_FULL_NAME'] = $this->getRqCompanyFullName();
        $array['RQ_OGRNIP'] = $this->getRqOgrnip();

        return $array;
    }

    /**
     * @param int $entityId
     * @return Requisite
     */
    public function setEntityId($entityId)
    {
        $this->entityId = $entityId;
        return $this;
    }

    /**
     * @return int
     */
    public function getEntityId()
    {
        return $this->entityId;
    }

    /**
     * @param int $entityTypeId
     * @return Requisite
     */
    public function setEntityTypeId($entityTypeId)
    {
        $this->entityTypeId = $entityTypeId;
        return $this;
    }

    /**
     * @return int
     */
    public function getEntityTypeId()
    {
        return $this->entityTypeId;
    }

    /**
     * @param int $presetId
     * @return Requisite
     */
    public function setPresetId($presetId)
    {
        $this->presetId = $presetId;
        return $this;
    }

    /**
     * @return int
     */
    public function getPresetId()
    {
        return $this->presetId;
    }

    /**
     * @param string $active
     * @return Requisite
     */
    public function setActive($active)
    {
        $this->active = $active;
        return $this;
    }

    /**
     * @return string
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param int $sort
     * @return Requisite
     */
    public function setSort($sort)
    {
        $this->sort = $sort;
        return $this;
    }

    /**
     * @return int
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * @param string $rqInn
     * @return Requisite
     */
    public function setRqInn($rqInn)
    {
        $this->rqInn = $rqInn;
        return $this;
    }

    /**
     * @return string
     */
    public function getRqInn()
    {
        return $this->rqInn;
    }

    /**
     * @param string $rqOkpo
     * @return Requisite
     * @throws ExceptionModelPropertyValueIsInvalid
     */
    public function setRqOkpo($rqOkpo)
    {
        if (strlen($rqOkpo) > 10) {
            throw new ExceptionModelPropertyValueIsInvalid("Для значения поля \"ОКПО\" превышена максимальная длина: 10");
        }

        $this->rqOkpo = $rqOkpo;
        return $this;
    }

    /**
     * @return string
     */
    public function getRqOkpo()
    {
        return $this->rqOkpo;
    }

    /**
     * @param string $rqVatPayer
     * @return Requisite
     */
    public function setRqVatPayer($rqVatPayer)
    {
        $this->rqVatPayer = $rqVatPayer;
        return $this;
    }

    /**
     * @return string
     */
    public function getRqVatPayer()
    {
        return $this->rqVatPayer;
    }

    /**
     * @param string $name
     * @return Requisite
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $rqOgrn
     * @return Requisite
     * @throws ExceptionModelPropertyValueIsInvalid
     */
    public function setRqOgrn($rqOgrn)
    {
        if (strlen($rqOgrn) > 13) {
            throw new ExceptionModelPropertyValueIsInvalid("Для значения поля \"ОГРН\" превышена максимальная длина: 13");
        }

        $this->rqOgrn = $rqOgrn;
        return $this;
    }

    /**
     * @return string
     */
    public function getRqOgrn()
    {
        return $this->rqOgrn;
    }

    /**
     * @param string $rqCompanyName
     * @return Requisite
     */
    public function setRqCompanyName($rqCompanyName)
    {
        $this->rqCompanyName = $rqCompanyName;
        return $this;
    }

    /**
     * @return string
     */
    public function getRqCompanyName()
    {
        return $this->rqCompanyName;
    }

    /**
     * @param string $rqCompanyFullName
     * @return Requisite
     */
    public function setRqCompanyFullName($rqCompanyFullName)
    {
        $this->rqCompanyFullName = $rqCompanyFullName;
        return $this;
    }

    /**
     * @return string
     */
    public function getRqCompanyFullName()
    {
        return $this->rqCompanyFullName;
    }

    /**
     * @param string $rqOgrnip
     * @return Requisite
     */
    public function setRqOgrnip($rqOgrnip)
    {
        $this->rqOgrnip = $rqOgrnip;
        return $this;
    }

    /**
     * @return string
     */
    public function getRqOgrnip()
    {
        return $this->rqOgrnip;
    }

    /**
     * @param int $id
     * @return Requisite
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param Address[] $addresses
     * @return Requisite
     */
    public function setAddresses($addresses)
    {
        foreach ($addresses as $address) {
            $this->addAddress($address);
        }

        return $this;
    }

    /**
     * @param Address $address
     * @return Requisite
     */
    public function addAddress(Address $address)
    {
        $this->_addresses[$address->getTypeId()] = $address;

        return $this;
    }

    /**
     * @return Address[]
     */
    public function getAddresses()
    {
        return $this->_addresses;
    }

    /**
     * @param BankDetail[] $bankDetails
     * @return Requisite
     */
    public function setBankDetails($bankDetails)
    {
        foreach ($bankDetails as $bankDetail) {
            $this->addBankDetail($bankDetail);
        }

        return $this;
    }

    /**
     * @param BankDetail $bankDetail
     * @return Requisite
     */
    public function addBankDetail(BankDetail $bankDetail)
    {
        $this->_bankDetails[$bankDetail->getId()] = $bankDetail;

        return $this;
    }

    /**
     * @return BankDetail[]
     */
    public function getBankDetails()
    {
        return $this->_bankDetails;
    }


}
