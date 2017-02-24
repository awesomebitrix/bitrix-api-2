<?php
/**
 * Created by PhpStorm.
 * User: sgavka
 * Date: 27.01.17
 * Time: 16:50
 */

namespace AlterEgo\BitrixAPI\classes\models\crm;


class PersonType
{
    const CRM_CONTACT = 'CRM_CONTACT';

    const CRM_COMPANY = 'CRM_COMPANY';

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @param array $array
     *
     * @return self
     */
    public static function CreateFromArray($array)
    { // todo: create automatical method for filling object from bitrix array
        $invoice = new self();

        $invoice->setId($array['ID']);
        $invoice->setName($array['NAME']);

        return $invoice;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $array = array();

        $array['ID'] = $this->getId();
        $array['NAME'] = $this->getName();

        return $array;
    }

    /**
     * @param mixed $id
     *
     * @return self
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
     * @param string $name
     * @return PersonType
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
}