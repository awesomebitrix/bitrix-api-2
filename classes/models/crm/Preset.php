<?php
/**
 * Created by PhpStorm.
 * User: sgavka
 * Date: 27.01.17
 * Time: 16:50
 */

namespace AlterEgo\BitrixAPI\classes\models\crm;


class Preset
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
     * @var string
     */
    private $xmlId;

    /**
     * @var integer
     */
    private $entityTypeId;

    /**
     * @var integer
     */
    private $countryId;

    /**
     * @var string
     */
    private $name;

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

        return $address;
    }

    public function toArray()
    {
        $array = array();

        $array['ID'] = $this->getId();
        $array['ENTITY_TYPE_ID'] = $this->getEntityTypeId();

        return $array;
    }

    /**
     * @param string $active
     * @return self
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
     * @return self
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
     * @param int $countryId
     * @return self
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
     * @return self
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
     * @param int $sort
     * @return self
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
     * @return Preset
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param string $xmlId
     * @return Preset
     */
    public function setXmlId($xmlId)
    {
        $this->xmlId = $xmlId;
        return $this;
    }

    /**
     * @return string
     */
    public function getXmlId()
    {
        return $this->xmlId;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}
