<?php

namespace AlterEgo\BitrixAPI\Classes\Models\Crm;

use AlterEgo\BitrixAPI\Exceptions\ExceptionModelPropertyIsNotSet;

class Invoice
{
    const UF_MOEDELO_ID = 'MD_ID'; // todo: fix it
    const UF_MOEDELO_NUMBER = 'MD_NUMBER'; // todo: fix it
    const ALTEREGO_MOEDELO_AVOID_UPDATE = 'ALTEREGO_MOEDELO_AVOID_UPDATE'; // todo: fix it

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $accountNumber;

    /**
     * @var string
     */
    private $orderTopic;

    /**
     * @var string
     */
    private $dateBill;

    /**
     * @var string
     */
    private $dateInsert;

    /**
     * @var string
     */
    private $datePayBefore;

    /**
     * @var integer
     */
    private $paySystemId;

    /**
     * @var integer
     */
    private $statusId;

    /**
     * @var integer
     */
    private $personTypeId;

    /**
     * @var integer
     */
    private $ufCompanyId;

    /**
     * @var integer
     */
    private $ufContactId;

    /**
     * @var array
     */
    private $invoiceProperties;

    /**
     * @var ProductRow[]
     */
    private $productRows;

    /**
     * @var string
     */
    private $ufMoedeloNumber;

    /**
     * @var integer
     */
    private $ufMoedeloId;

    /**
     * @var boolean
     */
    private $flagAvoidUpdate;

    /**
     * @return string
     */
    public function getOrderTopic()
    {
        return $this->orderTopic;
    }

    /**
     * @return string
     */
    public function getDateBill()
    {
        return $this->dateBill;
    }

    /**
     * @return string
     */
    public function getDateInsert()
    {
        return $this->dateInsert;
    }

    /**
     * @return int
     */
    public function getPaySystemId()
    {
        return $this->paySystemId;
    }

    /**
     * @return int
     */
    public function getStatusId()
    {
        return $this->statusId;
    }

    /**
     * @return int
     */
    public function getPersonTypeId()
    {
        return $this->personTypeId;
    }

    /**
     * @return int
     */
    public function getUfCompanyId()
    {
        return $this->ufCompanyId;
    }

    /**
     * @return int
     */
    public function getUfContactId()
    {
        return $this->ufContactId;
    }

    /**
     * @return int
     */
    public function getUfMoedeloId()
    {
        return $this->ufMoedeloId;
    }

    /**
     * @return ProductRow[]
     */
    public function getProductRows()
    {
        return $this->productRows;
    }

    /**
     * @return string
     */
    public function getUfMoedeloNumber()
    {
        return $this->ufMoedeloNumber;
    }

    /**
     * @param boolean $flagAvoidUpdate
     * @return Invoice
     */
    public function setFlagAvoidUpdate($flagAvoidUpdate)
    {
        $this->flagAvoidUpdate = $flagAvoidUpdate;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getFlagAvoidUpdate()
    {
        return $this->flagAvoidUpdate;
    }

    /**
     * @return string
     */
    public function getDatePayBefore()
    {
        return $this->datePayBefore;
    }

    /**
     * @param array $bitrixArray
     *
     * @return Invoice
     */
    public static function CreateFromBitrixArray($bitrixArray)
    { // todo: create automatical method for filling object from bitrix array
        $invoice = new Invoice();

        if (array_key_exists('ID', $bitrixArray)) {
            $invoice->setId($bitrixArray['ID']);
        }

        $invoice->setAccountNumber($bitrixArray['ACCOUNT_NUMBER']);
        $invoice->setDateBill($bitrixArray['DATE_BILL']);
        $invoice->setDateInsert($bitrixArray['DATE_INSERT']);
        $invoice->setOrderTopic($bitrixArray['ORDER_TOPIC']);
        $invoice->setPaySystemId($bitrixArray['PAY_SYSTEM_ID']);
        $invoice->setStatusId($bitrixArray['STATUS_ID']);
        $invoice->setUfCompanyId($bitrixArray['UF_COMPANY_ID']);
        $invoice->setUfContactId($bitrixArray['UF_CONTACT_ID']);
        $invoice->setDatePayBefore($bitrixArray['DATE_PAY_BEFORE']);


        if (array_key_exists('UF_CRM_' . self::UF_MOEDELO_NUMBER, $bitrixArray)) {
            $invoice->setUfMoedeloNumber($bitrixArray['UF_CRM_' . self::UF_MOEDELO_NUMBER]);
        }

        if (array_key_exists('UF_CRM_' . self::UF_MOEDELO_ID, $bitrixArray)) {
            $invoice->setUfMoedeloId($bitrixArray['UF_CRM_' . self::UF_MOEDELO_ID]);
        }

        if (array_key_exists('ALTEREGO_MOEDELO_AVOID_UPDATE', $bitrixArray)) {
            $invoice->setFlagAvoidUpdate($bitrixArray['ALTEREGO_MOEDELO_AVOID_UPDATE']);
        }

        foreach ($bitrixArray['PRODUCT_ROWS'] as $productRow) {
            $invoice->addProductRow(ProductRow::CreateFromArray($productRow));
        }

        return $invoice;
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function toArray()
    {
        $array = array();

        if (!is_null($this->getId())) {
            $array['ID'] = $this->getId();
        }

        $array['ACCOUNT_NUMBER'] = $this->getAccountNumber();
        $array['DATE_BILL'] = $this->getDateBill();
        $array['DATE_INSERT'] = $this->getDateInsert();
        $array['ORDER_TOPIC'] = $this->getOrderTopic();
        $array['PAY_SYSTEM_ID'] = $this->getPaySystemId();
        $array['STATUS_ID'] = $this->getStatusId();
        $array['UF_COMPANY_ID'] = $this->getUfCompanyId();
        $array['UF_CONTACT_ID'] = $this->getUfContactId();
        $array['DATE_PAY_BEFORE'] = $this->getDatePayBefore();

        // todo: fix hard-code
        $array['INVOICE_PROPERTIES'] = array('COMPANY' => '-');

        if (!is_null($this->getPersonTypeId())) {
            $array['PERSON_TYPE_ID'] = $this->getPersonTypeId();
        } else {
            throw new ExceptionModelPropertyIsNotSet("Property `\$personTypeId` is not set.");
        }

        $array['PRODUCT_ROWS'] = array();
        foreach ($this->getProductRows() as $productRow) {
            $array['PRODUCT_ROWS'][] = $productRow->toArray();
        }

        if (!is_null($this->getUfMoedeloId())) {
            $array['UF_CRM_' . self::UF_MOEDELO_ID] = $this->getUfMoedeloId(); // todo: fix (maybe it is only for bitrix24)
        }

        if (!is_null($this->getUfMoedeloNumber())) {
            $array['UF_CRM_' . self::UF_MOEDELO_NUMBER] = $this->getUfMoedeloNumber(); // todo: fix (maybe it is only for bitrix24)
        }

        $array['PAY_SYSTEM_ID'] = 10; // todo: fix (hard-code)

        if (!is_null($this->getFlagAvoidUpdate())) {
            $array['ALTEREGO_MOEDELO_AVOID_UPDATE'] = $this->getFlagAvoidUpdate();
        }

        return $array;
    }

    /**
     * @param string $accountNumber
     * @return Invoice
     */
    public function setAccountNumber($accountNumber)
    {
        $this->accountNumber = $accountNumber;
        return $this;
    }

    /**
     * @param string $orderTopic
     * @return Invoice
     */
    public function setOrderTopic($orderTopic)
    {
        $this->orderTopic = $orderTopic;
        return $this;
    }

    /**
     * @param string $dateBill
     *
     * @return Invoice
     */
    public function setDateBill($dateBill)
    {
        $this->dateBill = $dateBill;

        return $this;
    }

    const DATE_FORMAT = 'Y-m-d';

    /**
     * @param \DateTime $dateTime
     *
     * @return $this
     */
    public function setDateBillDataTime(\DateTime $dateTime)
    {
        $date = $dateTime->format(self::DATE_FORMAT);

        $this->setDateBill($date);

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateBillDataTime()
    {
        $date = \DateTime::createFromFormat('Y-m-d', substr($this->getDateBill(), 0, 10));

        return $date;
    }

    /**
     * @param string $datePayBefore
     *
     * @return Invoice
     */
    public function setDatePayBefore($datePayBefore)
    {
        $this->datePayBefore = $datePayBefore;

        return $this;
    }

    /**
     * @param \DateTime $dateTime
     *
     * @return $this
     */
    public function setDatePayBeforeDateTime(\DateTime $dateTime)
    {
        $date = $dateTime->format(self::DATE_FORMAT);

        $this->setDatePayBefore($date);

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDatePayBeforeDateTime()
    {
        $date = \DateTime::createFromFormat('Y-m-d', substr($this->getDatePayBefore(), 0, 10));

        return $date;
    }

    /**
     * @param string $dateInsert
     * @return Invoice
     */
    public function setDateInsert($dateInsert)
    {
        $this->dateInsert = $dateInsert;
        return $this;
    }

    /**
     * @param int $paySystemId
     * @return Invoice
     */
    public function setPaySystemId($paySystemId)
    {
        $this->paySystemId = $paySystemId;
        return $this;
    }

    /**
     * @param int $statusId
     * @return Invoice
     */
    public function setStatusId($statusId)
    {
        $this->statusId = $statusId;
        return $this;
    }

    /**
     * @param int $personTypeId
     * @return Invoice
     */
    public function setPersonTypeId($personTypeId)
    {
        $this->personTypeId = $personTypeId;
        return $this;
    }

    /**
     * @param int $ufCompanyId
     * @return Invoice
     */
    public function setUfCompanyId($ufCompanyId)
    {
        $this->ufCompanyId = $ufCompanyId;
        return $this;
    }

    /**
     * @param int $ufContactId
     * @return Invoice
     */
    public function setUfContactId($ufContactId)
    {
        $this->ufContactId = $ufContactId;
        return $this;
    }

    /**
     * @param array $invoiceProperties
     *
     * @return Invoice
     */
    public function setInvoiceProperties($invoiceProperties)
    {
        $this->invoiceProperties = $invoiceProperties;

        return $this;
    }

    /**
     * @param string $ufMoedeloNumber
     *
     * @return Invoice
     */
    public function setUfMoedeloNumber($ufMoedeloNumber)
    {
        $this->ufMoedeloNumber = $ufMoedeloNumber;

        return $this;
    }

    /**
     * @param integer $ufMoedeloId
     *
     * @return Invoice
     */
    public function setUfMoedeloId($ufMoedeloId)
    {
        $this->ufMoedeloId = $ufMoedeloId;

        return $this;
    }

    /**
     * @param ProductRow[] $productRows
     *
     * @return Invoice
     */
    public function setProductRows($productRows)
    {
        $this->productRows = $productRows;

        return $this;
    }

    /**
     * @param ProductRow $productRow
     *
     * @return $this
     */
    public function addProductRow(ProductRow $productRow)
    {
        $this->productRows[] = $productRow;

        return $this;
    }

    /**
     * @param mixed $id
     *
     * @return Invoice
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
     * @return string
     */
    public function getAccountNumber()
    {
        return $this->accountNumber;
    }
}