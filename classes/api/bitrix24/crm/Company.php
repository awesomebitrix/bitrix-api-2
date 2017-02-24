<?php
/**
 * Created by PhpStorm.
 * User: sgavka
 * Date: 27.01.17
 * Time: 16:49
 */

namespace AlterEgo\BitrixAPI\classes\api\bitrix24\crm;


use AlterEgo\BitrixAPI\classes\api\common\crm\Requisite as RequisiteApi;
use AlterEgo\BitrixAPI\classes\api\common\Entity;
use AlterEgo\BitrixAPI\classes\api\common\EntityQuery;
use AlterEgo\BitrixAPI\classes\api\common\Filter;
use AlterEgo\BitrixAPI\classes\api\common\Select;
use AlterEgo\BitrixAPI\classes\models\crm\CompanyIterator;
use AlterEgo\BitrixAPI\classes\models\crm\InvoiceIterator;
use AlterEgo\BitrixAPI\classes\models\crm\Requisite;
use AlterEgo\BitrixAPI\classes\models\crm\UserField;
use AlterEgo\BitrixAPI\classes\models\crm\UserFieldIterator;
use AlterEgo\BitrixAPI\exceptions\ExceptionIteratorInvalidPosition;
use AlterEgo\MoeDeloAPI\BitrixConst;
use Bitrix24\Exceptions\Bitrix24Exception;

class Company extends Entity
{
    /**
     * @param EntityQuery $query
     *
     * @return CompanyIterator
     */
    public function getList(EntityQuery $query)
    {
        $invoice = new \Bitrix24\CRM\Company($this->getClient()->getBitrixApp());

        $response = $invoice->getList(
            $query->getOrder()->asArray(),
            $query->getFilter()->asArray(),
            $query->getSelect()->asArray(),
            $query->getNavigation()->getPageNumber() ? $query->getNavigation()->getPageNumber() : 0
        );

        return new CompanyIterator($response['result']);
    }

    /**
     * @param integer $id
     * @return \AlterEgo\BitrixAPI\classes\models\crm\Company
     */
    public function getById($id)
    {
        $companyApi = new \Bitrix24\CRM\Company($this->getClient()->getBitrixApp());

        $response = $companyApi->get($id);

        $company = \AlterEgo\BitrixAPI\classes\models\crm\Company::CreateFromArray($response['result']);

        return $company;
    }

    /**
     * @param integer $moeDeloId
     *
     * @return \AlterEgo\BitrixAPI\classes\models\crm\Company
     * @throws \Exception
     */
    public function getByMoeDeloId($moeDeloId)
    {
        $query = new EntityQuery();
        $query->addWhere('UF_CRM_'. \AlterEgo\BitrixAPI\classes\models\crm\Company::UF_MOEDELO_ID, Filter::TYPE_EQUAL, $moeDeloId); // todo: fix (maybe it is only for bitrix24)
        $query->addWhere('UF_CRM_'. \AlterEgo\BitrixAPI\classes\models\crm\Company::UF_MOEDELO_ID, Filter::TYPE_NOT_EQUAL, 'null'); // todo: fix it // todo: fix (maybe it is only for bitrix24)

        $query->addSelect('*'); // todo: fix it // todo: fix (maybe it is only for bitrix24)
        $query->addSelect('UF_*'); // todo: fix it // todo: fix (maybe it is only for bitrix24)

        $companyIterator = $this->getList($query);

        /** @var \AlterEgo\BitrixAPI\classes\models\crm\Company $company */
        $company = $companyIterator->current();

        /*if ($company->getUfMoedeloId() != $moeDeloId) {
            throw new \Exception("Company (MoeDelo Id#{$moeDeloId} don't exists in Bitrix24.");
        }*/

        return $company;
    }

    /**
     * @param \AlterEgo\BitrixAPI\classes\models\crm\Company $company
     * @return integer|boolean
     */
    public function create(\AlterEgo\BitrixAPI\classes\models\crm\Company $company)
    {
        $companyApi = new \Bitrix24\CRM\Company($this->getClient()->getBitrixApp());

        $response = $companyApi->add($company->toArray());

        return $response['result'];
    }

    /**
     * @param \AlterEgo\BitrixAPI\classes\models\crm\Company $company
     * @return boolean
     */
    public function update(\AlterEgo\BitrixAPI\classes\models\crm\Company $company)
    {
        $companyApi = new \Bitrix24\CRM\Company($this->getClient()->getBitrixApp());

        $response = $companyApi->update($company->getId(), $company->toArray());

        return $response['result'];
    }

    /**
     * @param \AlterEgo\BitrixAPI\classes\models\crm\UserField $userField
     *
     * @return array
     */
    public function userFieldCreate(\AlterEgo\BitrixAPI\classes\models\crm\UserField $userField)
    {
        $invoiceUserFieldApi = new \Bitrix24\CRM\Company\UserField($this->getClient()->getBitrixApp());

        $response = $invoiceUserFieldApi->add($userField->toArray());

        return $response;
    }

    public function userFieldDelete($userFieldId)
    {
        $invoiceUserFieldApi = new \Bitrix24\CRM\Company\UserField($this->getClient()->getBitrixApp());

        $response = $invoiceUserFieldApi->delete($userFieldId);

        return $response;
    }

    public function userFieldGetList(EntityQuery $query)
    {
        $invoiceUserField = new \Bitrix24\CRM\Company\UserField($this->getClient()->getBitrixApp());

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
            throw new \Exception("Company UF with name {$fieldName} don't exists in Bitrix24.");
        }

        return $userField;
    }

    /**
     * @param string $moeDeloId
     * @return \AlterEgo\BitrixAPI\classes\models\crm\Company
     */
    public function getWithDetailsByMoeDeloId($moeDeloId)
    {
        $company = self::getById($moeDeloId);

        $requisiteApi = new RequisiteApi($this->getClient());

        $requisiteQuery = new EntityQuery();
        $requisiteQuery->addWhere('ENTITY_ID', Filter::TYPE_EQUAL, $company->getId())
            ->addWhere('ENTITY_TYPE_ID', Filter::TYPE_EQUAL, BitrixConst::CCrmOwnerTypeCompany);
        $requisites = $requisiteApi->getList($requisiteQuery)->all();

        /** @var Requisite $requisite */
        foreach ($requisites as &$requisite) {
            $addressQuery = new EntityQuery();
            $addressQuery->addWhere('ENTITY_TYPE_ID', Filter::TYPE_EQUAL, BitrixConst::CCrmOwnerTypeRequisite)
                ->addWhere('ENTITY_ID', Filter::TYPE_EQUAL, $requisite->getId());
            $addresses = $requisiteApi->addressGetList($addressQuery)->all();

            $requisite->setAddresses($addresses);

            $bankDetailsQuery = new EntityQuery();
            $bankDetailsQuery->addWhere('ENTITY_TYPE_ID', Filter::TYPE_EQUAL, BitrixConst::CCrmOwnerTypeRequisite)
                ->addWhere('ENTITY_ID', Filter::TYPE_EQUAL, $requisite->getId());
            $bankDetails = $requisiteApi->bankDetailGetList($bankDetailsQuery)->all();

            $requisite->setBankDetails($bankDetails);
        }

        $company->setRequisites($requisites);

        return $company;
    }
}
