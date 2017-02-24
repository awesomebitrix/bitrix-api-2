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
use AlterEgo\BitrixAPI\classes\models\crm\InvoiceIterator;
use AlterEgo\BitrixAPI\classes\models\crm\UserField;
use AlterEgo\BitrixAPI\classes\models\crm\UserFieldIterator;
use Bitrix24\Exceptions\Bitrix24Exception;

class Invoice extends Entity
{
    /**
     * @param EntityQuery $query
     *
     * @return InvoiceIterator
     */
    public function getList(EntityQuery $query)
    {
        $invoice = new \Bitrix24\CRM\Invoice($this->getClient()->getBitrixApp());

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
     * @return \AlterEgo\BitrixAPI\classes\models\crm\Invoice
     */
    public function getById($id)
    {
        $invoiceApi = new \Bitrix24\CRM\Invoice($this->getClient()->getBitrixApp());

        $response = $invoiceApi->get($id);

        $invoice = \AlterEgo\BitrixAPI\classes\models\crm\Invoice::CreateFromBitrixArray($response['result']);

        return $invoice;
    }

    /**
     * @param integer $moeDeloId
     *
     * @return \AlterEgo\BitrixAPI\classes\models\crm\Invoice
     * @throws \Exception
     */
    public function getByMoeDeloId($moeDeloId)
    {
        $query = new EntityQuery();
        $query->addWhere('UF_CRM_' . \AlterEgo\BitrixAPI\classes\models\crm\Invoice::UF_MOEDELO_ID, Filter::TYPE_EQUAL, $moeDeloId);
        $query->addWhere('UF_CRM_' . \AlterEgo\BitrixAPI\classes\models\crm\Invoice::UF_MOEDELO_ID, Filter::TYPE_NOT_EQUAL, 'null');

        $query->addSelect('*')->addSelect('UF_*');

        $invoiceIterator = $this->getList($query);

        /** @var \AlterEgo\BitrixAPI\classes\models\crm\Invoice $invoice */
        $invoice = $invoiceIterator->current();

        if ($invoice->getUfMoedeloId() != $moeDeloId) { // todo: fix it
            throw new \Exception("Invoice (MoeDelo Id#{$moeDeloId} don't exists in Bitrix24.");
        }

        return $invoice;
    }

    /**
     * @param \AlterEgo\BitrixAPI\classes\models\crm\Invoice $invoice
     *
     * @return array
     */
    public function create(\AlterEgo\BitrixAPI\classes\models\crm\Invoice $invoice)
    {
        $invoiceApi = new \Bitrix24\CRM\Invoice($this->getClient()->getBitrixApp());

        $response = $invoiceApi->add($invoice->toArray());

        return $response;
    }

    /**
     * @param \AlterEgo\BitrixAPI\classes\models\crm\Invoice $invoice
     *
     * @return boolean
     */
    public function update(\AlterEgo\BitrixAPI\classes\models\crm\Invoice $invoice)
    {
        $invoiceApi = new \Bitrix24\CRM\Invoice($this->getClient()->getBitrixApp());

        $response = $invoiceApi->update($invoice->getId(), $invoice->toArray());

        return $response['result'];
    }

    /**
     * @param \AlterEgo\BitrixAPI\classes\models\crm\UserField $userField
     *
     * @return array
     */
    public function userFieldCreate(\AlterEgo\BitrixAPI\classes\models\crm\UserField $userField)
    {
        $invoiceUserFieldApi = new \Bitrix24\CRM\Invoice\UserField($this->getClient()->getBitrixApp());

        $response = $invoiceUserFieldApi->add($userField->toArray());

        return $response;
    }

    public function userFieldDelete($userFieldId)
    {
        $invoiceUserFieldApi = new \Bitrix24\CRM\Invoice\UserField($this->getClient()->getBitrixApp());

        $response = $invoiceUserFieldApi->delete($userFieldId);

        return $response;
    }

    public function userFieldGetList(EntityQuery $query)
    {
        $invoiceUserField = new \Bitrix24\CRM\Invoice\UserField($this->getClient()->getBitrixApp());

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