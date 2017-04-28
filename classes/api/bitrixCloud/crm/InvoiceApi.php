<?php

namespace AlterEgo\BitrixAPI\Classes\Api\BitrixCloud\Crm;

use AlterEgo\BitrixAPI\Classes\Entity;
use AlterEgo\BitrixAPI\Classes\EntityQuery;
use AlterEgo\BitrixAPI\Classes\Filter;
use AlterEgo\BitrixAPI\Classes\Models\Crm\Invoice;
use AlterEgo\BitrixAPI\Classes\Models\Crm\InvoiceIterator;
use AlterEgo\BitrixAPI\Classes\Models\Crm\UserField;
use AlterEgo\BitrixAPI\Classes\Models\Crm\UserFieldIterator;

class InvoiceApi extends Entity
{
    /**
     * @param EntityQuery $query
     *
     * @return InvoiceIterator
     */
    public function getList(EntityQuery $query)
    {
        $invoice = new \Bitrix24\CRM\Invoice($this->getClient()->getBitrixCloudApp());

        $response = $invoice->getList(
            $query->getOrder()->asArray(),
            $query->getFilter()->asArray(),
            $query->getSelect()->asArray(),
            $query->getNavigation()->getPageNumber() ? $query->getNavigation()->getPageNumber() : 0
        );

        return new InvoiceIterator($response['result']);
    }

    /**
     * @param integer $id
     * @return Invoice
     */
    public function getById($id)
    {
        $invoiceApi = new \Bitrix24\CRM\Invoice($this->getClient()->getBitrixCloudApp());

        $response = $invoiceApi->get($id);

        $invoice = Invoice::CreateFromBitrixArray($response['result']);

        return $invoice;
    }

    /**
     * @param integer $moeDeloId
     *
     * @return Invoice
     * @throws \Exception
     */
    public function getByMoeDeloId($moeDeloId)
    {
        $query = new EntityQuery();
        $query->addWhere('UF_CRM_' . Invoice::UF_MOEDELO_ID, Filter::TYPE_EQUAL, $moeDeloId);
        $query->addWhere('UF_CRM_' . Invoice::UF_MOEDELO_ID, Filter::TYPE_NOT_EQUAL, 'null');

        $query->addSelect('*')->addSelect('UF_*');

        $invoiceIterator = $this->getList($query);

        /** @var Invoice $invoice */
        $invoice = $invoiceIterator->current();

        if ($invoice->getUfMoedeloId() != $moeDeloId) { // todo: fix it
            throw new \Exception("Invoice (MoeDelo Id#{$moeDeloId} don't exists in Bitrix24.");
        }

        return $invoice;
    }

    /**
     * @param Invoice $invoice
     *
     * @return array
     */
    public function create(Invoice $invoice)
    {
        $invoiceApi = new \Bitrix24\CRM\Invoice($this->getClient()->getBitrixCloudApp());

        $response = $invoiceApi->add($invoice->toArray());

        return $response;
    }

    /**
     * @param Invoice $invoice
     *
     * @return boolean
     */
    public function update(Invoice $invoice)
    {
        $invoiceApi = new \Bitrix24\CRM\Invoice($this->getClient()->getBitrixCloudApp());

        $response = $invoiceApi->update($invoice->getId(), $invoice->toArray());

        return $response['result'];
    }

    /**
     * @param UserField $userField
     *
     * @return array
     */
    public function userFieldCreate(UserField $userField)
    {
        $invoiceUserFieldApi = new \Bitrix24\CRM\Invoice\UserField($this->getClient()->getBitrixCloudApp());

        $response = $invoiceUserFieldApi->add($userField->toArray());

        return $response;
    }

    public function userFieldDelete($userFieldId)
    {
        $invoiceUserFieldApi = new \Bitrix24\CRM\Invoice\UserField($this->getClient()->getBitrixCloudApp());

        $response = $invoiceUserFieldApi->delete($userFieldId);

        return $response;
    }

    public function userFieldGetList(EntityQuery $query)
    {
        $invoiceUserField = new \Bitrix24\CRM\Invoice\UserField($this->getClient()->getBitrixCloudApp());

        $response = $invoiceUserField->getList(
            $query->getOrder()->asArray(),
            $query->getFilter()->asArray()
        );

        return new UserFieldIterator($response['result']);
    }

    /**
     * @param $fieldName
     * @return UserField
     * @throws \Exception
     */
    public function userFieldGetByFieldName($fieldName)
    {
        $query = new EntityQuery();
        $query->addWhere('FIELD_NAME', Filter::TYPE_EQUAL, $fieldName);

        $invoiceIterator = $this->userFieldGetList($query);

        try {
            /** @var UserField $userField */
            while ($userField = $invoiceIterator->current()) { // todo: fix it
                if ($userField->getFieldName() == $fieldName) {
                    break;
                }

                $invoiceIterator->next();
            }
        } catch (\Exception $exception) {
            throw new \Exception("Invoice UF with name {$fieldName} don't exists in Bitrix24.");
        }

        return $userField;
    }
}
