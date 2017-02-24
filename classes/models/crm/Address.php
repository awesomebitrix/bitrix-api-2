<?php
/**
 * Created by PhpStorm.
 * User: sgavka
 * Date: 27.01.17
 * Time: 16:50
 */

namespace AlterEgo\BitrixAPI\classes\models\crm;


class Address
{
    /**
     * @var string
     */
    private $address1;

    /**
     * @var string
     */
    private $address2;

    /**
     * @var integer
     */
    private $anchorId;

    /**
     * @var integer
     */
    private $anchorTypeId;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $country;

    /**
     * @var string
     */
    private $countryCode;

    /**
     * @var integer
     */
    private $entityId;

    /**
     * @var integer
     */
    private $entityTypeId;

    /**
     * @var string
     */
    private $postalCode;

    /**
     * @var string
     */
    private $province;

    /**
     * @var string
     */
    private $region;

    /**
     * @var integer
     */
    private $typeId;

    /**
     * @param $array
     *
     * @return self
     */
    public static function CreateFromArray($array)
    {
        $address = new self();

        $address->setAddress1($array['ADDRESS_1']);
        $address->setAddress2($array['ADDRESS_2']);
        $address->setAnchorId($array['ANCHOR_ID']);
        $address->setAnchorTypeId($array['ANCHOR_TYPE_ID']);
        $address->setCity($array['CITY']);
        $address->setCountry($array['COUNTRY']);
        $address->setCountryCode($array['COUNTRY_CODE']);
        $address->setEntityId($array['ENTITY_ID']);
        $address->setEntityTypeId($array['ENTITY_TYPE_ID']);
        $address->setPostalCode($array['POSTAL_CODE']);
        $address->setProvince($array['PROVINCE']);
        $address->setRegion($array['REGION']);
        $address->setTypeId($array['TYPE_ID']);

        return $address;
    }

    public function toArray()
    {
        $array = array();

        $array['ADDRESS_1'] = $this->getAddress1();
        $array['ADDRESS_2'] = $this->getAddress2();
        $array['ANCHOR_ID'] = $this->getAnchorId();
        $array['ANCHOR_TYPE_ID'] = $this->getAnchorTypeId();
        $array['CITY'] = $this->getCity();
        $array['COUNTRY'] = $this->getCountry();
        $array['COUNTRY_CODE'] = $this->getCountryCode();
        $array['ENTITY_ID'] = $this->getEntityId();
        $array['ENTITY_TYPE_ID'] = $this->getEntityTypeId();
        $array['POSTAL_CODE'] = $this->getPostalCode();
        $array['PROVINCE'] = $this->getProvince();
        $array['REGION'] = $this->getRegion();
        $array['TYPE_ID'] = $this->getTypeId();

        return $array;
    }

    /**
     * @param string $address1
     * @return Address
     */
    public function setAddress1($address1)
    {
        $this->address1 = $address1;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddress1()
    {
        return $this->address1;
    }

    /**
     * @param string $address2
     * @return Address
     */
    public function setAddress2($address2)
    {
        $this->address2 = $address2;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * @param int $anchorId
     * @return Address
     */
    public function setAnchorId($anchorId)
    {
        $this->anchorId = $anchorId;
        return $this;
    }

    /**
     * @return int
     */
    public function getAnchorId()
    {
        return $this->anchorId;
    }

    /**
     * @param int $anchorTypeId
     * @return Address
     */
    public function setAnchorTypeId($anchorTypeId)
    {
        $this->anchorTypeId = $anchorTypeId;
        return $this;
    }

    /**
     * @return int
     */
    public function getAnchorTypeId()
    {
        return $this->anchorTypeId;
    }

    /**
     * @param string $city
     * @return Address
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $country
     * @return Address
     */
    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $countryCode
     * @return Address
     */
    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * @param int $entityId
     * @return Address
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
     * @return Address
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
     * @param string $postalCode
     * @return Address
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @param string $province
     * @return Address
     */
    public function setProvince($province)
    {
        $this->province = $province;
        return $this;
    }

    /**
     * @return string
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * @param string $region
     * @return Address
     */
    public function setRegion($region)
    {
        $this->region = $region;
        return $this;
    }

    /**
     * @return string
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @param int $typeId
     * @return Address
     */
    public function setTypeId($typeId)
    {
        $this->typeId = $typeId;
        return $this;
    }

    /**
     * @return int
     */
    public function getTypeId()
    {
        return $this->typeId;
    }
}
