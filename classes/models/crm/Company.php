<?php
/**
 * Created by PhpStorm.
 * User: sgavka
 * Date: 27.01.17
 * Time: 16:50
 */

namespace AlterEgo\BitrixAPI\classes\models\crm;


class Company
{
    const UF_MOEDELO_ID = 'MD_ID';

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var integer
     */
    private $ufMoedeloId; // todo: don't use custom UF in BitrixAPI module

    /**
     * @var Requisite[]
     */
    private $_requisites;

    /**
     * @param $array
     *
     * @return Company
     */
    public static function CreateFromArray($array)
    {
        $company = new self();

        if (array_key_exists('ID', $array)) {
            $company->setId($array['ID']);
        }

        $company->setTitle($array['TITLE']);
        $company->setUfMoedeloId($array['UF_CRM_' . \AlterEgo\BitrixAPI\classes\models\crm\Company::UF_MOEDELO_ID]); // todo: fix (maybe it is only for bitrix24)

        return $company;
    }

    public function toArray()
    {
        $array = array();

        if (!is_null($this->getId())) {
            $array['ID'] = $this->getId();
        }

        $array['TITLE'] = $this->getTitle();

        if (!is_null($this->getUfMoedeloId())) {
            $array['UF_CRM_' . self::UF_MOEDELO_ID] = $this->getUfMoedeloId(); // todo: fix (maybe it is only for bitrix24)
        }

        return $array;
    }

    /**
     * @param integer $id
     *
     * @return Company
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
     * @param string $title
     *
     * @return Company
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param int $ufMoedeloId
     *
     * @return Company
     */
    public function setUfMoedeloId($ufMoedeloId)
    {
        $this->ufMoedeloId = $ufMoedeloId;

        return $this;
    }

    /**
     * @return int
     */
    public function getUfMoedeloId()
    {
        return $this->ufMoedeloId;
    }

    /**
     * @param Requisite[] $requisites
     * @return Company
     */
    public function setRequisites($requisites)
    {
        foreach ($requisites as $requisite) {
            $this->addRequisite($requisite);
        }
        
        return $this;
    }

    /**
     * @param Requisite $requisite
     * @return Company
     */
    public function addRequisite(Requisite $requisite)
    {
        $this->_requisites[$requisite->getId()] = $requisite;

        return $this;
    }

    /**
     * @return Requisite[]
     */
    public function getRequisites()
    {
        return $this->_requisites;
    }


    /*
     * array(
				'ID' => array(
					'TYPE' => 'integer',
					'ATTRIBUTES' => array(CCrmFieldInfoAttr::ReadOnly)
				),
				'TITLE' => array(
					'TYPE' => 'string',
					'ATTRIBUTES' => array(CCrmFieldInfoAttr::Required)
				),
				'COMPANY_TYPE' => array(
					'TYPE' => 'crm_status',
					'CRM_STATUS_TYPE' => 'COMPANY_TYPE'
				),
				'LOGO' => array(
					'TYPE' => 'file'
				),
				'ADDRESS' => array(
					'TYPE' => 'string'
				),
				'ADDRESS_2' => array(
					'TYPE' => 'string'
				),
				'ADDRESS_CITY' => array(
					'TYPE' => 'string'
				),
				'ADDRESS_POSTAL_CODE' => array(
					'TYPE' => 'string'
				),
				'ADDRESS_REGION' => array(
					'TYPE' => 'string'
				),
				'ADDRESS_PROVINCE' => array(
					'TYPE' => 'string'
				),
				'ADDRESS_COUNTRY' => array(
					'TYPE' => 'string'
				),
				'ADDRESS_COUNTRY_CODE' => array(
					'TYPE' => 'string'
				),
				'ADDRESS_LEGAL' => array(
					'TYPE' => 'string'
				),
				'REG_ADDRESS' => array(
					'TYPE' => 'string'
				),
				'REG_ADDRESS_2' => array(
					'TYPE' => 'string'
				),
				'REG_ADDRESS_CITY' => array(
					'TYPE' => 'string'
				),
				'REG_ADDRESS_POSTAL_CODE' => array(
					'TYPE' => 'string'
				),
				'REG_ADDRESS_REGION' => array(
					'TYPE' => 'string'
				),
				'REG_ADDRESS_PROVINCE' => array(
					'TYPE' => 'string'
				),
				'REG_ADDRESS_COUNTRY' => array(
					'TYPE' => 'string'
				),
				'REG_ADDRESS_COUNTRY_CODE' => array(
					'TYPE' => 'string'
				),
				'BANKING_DETAILS' => array(
					'TYPE' => 'string'
				),
				'INDUSTRY' => array(
					'TYPE' => 'crm_status',
					'CRM_STATUS_TYPE' => 'INDUSTRY'
				),
				'EMPLOYEES' => array(
					'TYPE' => 'crm_status',
					'CRM_STATUS_TYPE' => 'EMPLOYEES'
				),
				'CURRENCY_ID' => array(
					'TYPE' => 'crm_currency'
				),
				'REVENUE' => array(
					'TYPE' => 'double'
				),
				'OPENED' => array(
					'TYPE' => 'char'
				),
				'COMMENTS' => array(
					'TYPE' => 'string'
				),
				'HAS_PHONE' => array(
					'TYPE' => 'char',
					'ATTRIBUTES' => array(CCrmFieldInfoAttr::ReadOnly)
				),
				'HAS_EMAIL' => array(
					'TYPE' => 'char',
					'ATTRIBUTES' => array(CCrmFieldInfoAttr::ReadOnly)
				),
				'IS_MY_COMPANY' => array(
					'TYPE' => 'char'
				),
				'ASSIGNED_BY_ID' => array(
					'TYPE' => 'user'
				),
				'CREATED_BY_ID' => array(
					'TYPE' => 'user',
					'ATTRIBUTES' => array(CCrmFieldInfoAttr::ReadOnly)
				),
				'MODIFY_BY_ID' => array(
					'TYPE' => 'user',
					'ATTRIBUTES' => array(CCrmFieldInfoAttr::ReadOnly)
				),
				'DATE_CREATE' => array(
					'TYPE' => 'datetime',
					'ATTRIBUTES' => array(CCrmFieldInfoAttr::ReadOnly)
				),
				'DATE_MODIFY' => array(
					'TYPE' => 'datetime',
					'ATTRIBUTES' => array(CCrmFieldInfoAttr::ReadOnly)
				),
				'LEAD_ID' => array(
					'TYPE' => 'crm_lead',
					'ATTRIBUTES' => array(CCrmFieldInfoAttr::ReadOnly)
				),
				'ORIGINATOR_ID' => array(
					'TYPE' => 'string'
				),
				'ORIGIN_ID' => array(
					'TYPE' => 'string'
				),
				'ORIGIN_VERSION' => array(
					'TYPE' => 'string'
				),
			)
     * */
}
