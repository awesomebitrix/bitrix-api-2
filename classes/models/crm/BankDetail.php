<?php

namespace AlterEgo\BitrixAPI\Classes\Models\Crm;

class BankDetail
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
    private $entityTypeId;

    /**
     * @var integer
     */
    private $entityId;

    /**
     * @var integer
     */
    private $countryId;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $rqBankName;

    /**
     * @var string
     */
    private $rqBik;

    /**
     * @var string
     */
    private $rqAccName;

    /**
     * @var string
     */
    private $rqAccNum;

    /**
     * @var string
     */
    private $comments;

    /**
     * @var integer
     */
    private $sort;

    /**
     * @param $array
     *
     * @return self
     */
    public static function CreateFromArray($array)
    {
        $address = new self();

        $address->setId($array['ID']);
        $address->setEntityTypeId($array['ENTITY_TYPE_ID']);
        $address->setEntityId($array['ENTITY_ID']);
        $address->setCountryId($array['COUNTRY_ID']);
        $address->setName($array['NAME']);
        $address->setActive($array['ACTIVE']);
        $address->setSort($array['SORT']);
        $address->setRqBankName($array['RQ_BANK_NAME']);
        $address->setRqBik($array['RQ_BIK']);
        $address->setRqAccName($array['RQ_ACC_NAME']);
        $address->setRqAccNum($array['RQ_ACC_NUM']);
        $address->setComments($array['COMMENTS']);

        return $address;
    }

    public function toArray()
    {
        $array = array();

        $array['ID'] = $this->getId();
        $array['ENTITY_TYPE_ID'] = $this->getEntityTypeId();
        $array['ENTITY_ID'] = $this->getEntityId();
        $array['COUNTRY_ID'] = $this->getCountryId();
        $array['NAME'] = $this->getName();
        $array['ACTIVE'] = $this->getActive();
        $array['SORT'] = $this->getSort();
        $array['RQ_BANK_NAME'] = $this->getRqBankName();
        $array['RQ_BIK'] = $this->getRqBik();
        $array['RQ_ACC_NAME'] = $this->getRqAccName();
        $array['RQ_ACC_NUM'] = $this->getRqAccNum();
        $array['COMMENTS'] = $this->getComments();

        return $array;
    }

    /**
     * @param string $active
     * @return BankDetail
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
     * @param int $entityTypeId
     * @return BankDetail
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
     * @param int $entityId
     * @return BankDetail
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
     * @param int $countryId
     * @return BankDetail
     */
    public function setCountryId($countryId)
    {
        $this->countryId = $countryId;
        return $this;
    }

    /**
     * @return int
     */
    public function getCountryId()
    {
        return $this->countryId;
    }

    /**
     * @param string $name
     * @return BankDetail
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
     * @param string $rqBankName
     * @return BankDetail
     */
    public function setRqBankName($rqBankName)
    {
        $this->rqBankName = $rqBankName;
        return $this;
    }

    /**
     * @return string
     */
    public function getRqBankName()
    {
        return $this->rqBankName;
    }

    /**
     * @param string $rqBik
     * @return BankDetail
     */
    public function setRqBik($rqBik)
    {
        $this->rqBik = $rqBik;
        return $this;
    }

    /**
     * @return string
     */
    public function getRqBik()
    {
        return $this->rqBik;
    }

    /**
     * @param string $rqAccName
     * @return BankDetail
     */
    public function setRqAccName($rqAccName)
    {
        $this->rqAccName = $rqAccName;
        return $this;
    }

    /**
     * @return string
     */
    public function getRqAccName()
    {
        return $this->rqAccName;
    }

    /**
     * @param string $rqAccNum
     * @return BankDetail
     */
    public function setRqAccNum($rqAccNum)
    {
        $this->rqAccNum = $rqAccNum;
        return $this;
    }

    /**
     * @return string
     */
    public function getRqAccNum()
    {
        return $this->rqAccNum;
    }

    /**
     * @param string $comments
     * @return BankDetail
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
        return $this;
    }

    /**
     * @return string
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param int $sort
     * @return BankDetail
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
     * @param int $id
     * @return BankDetail
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
}
