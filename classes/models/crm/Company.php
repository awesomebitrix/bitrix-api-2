<?php

namespace AlterEgo\BitrixAPI\Classes\Models\Crm;

class Company
{
    const UF_MOEDELO_ID = 'MD_ID'; // todo: move from package

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
        $company->setUfMoedeloId($array['UF_CRM_' . \AlterEgo\BitrixAPI\classes\Models\Crm\Company::UF_MOEDELO_ID]); // todo: fix (maybe it is only for bitrix24)

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
}
