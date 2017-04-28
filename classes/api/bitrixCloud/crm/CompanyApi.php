<?php

namespace AlterEgo\BitrixAPI\Classes\Api\BitrixCloud\Crm;

use AlterEgo\BitrixAPI\Classes\Api\Common\Crm\RequisiteApi;
use AlterEgo\BitrixAPI\Classes\Entity;
use AlterEgo\BitrixAPI\Classes\EntityQuery;
use AlterEgo\BitrixAPI\Classes\Filter;
use AlterEgo\BitrixAPI\Classes\Models\Crm\CompanyIterator;
use AlterEgo\BitrixAPI\Classes\Models\Crm\UserFieldIterator;
use AlterEgo\MoeDeloAPI\BitrixConst;
use Bitrix24\CRM\Company;
use Bitrix24\CRM\Company\UserField;

class CompanyApi extends Entity
{
    /**
     * @param EntityQuery $query
     *
     * @return CompanyIterator
     */
    public function getList(EntityQuery $query)
    {
        $invoice = new Company($this->getClient()->getBitrixCloudApp());

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
     * @return \AlterEgo\BitrixAPI\Classes\Models\Crm\Company
     */
    public function getById($id)
    {
        $companyApi = new Company($this->getClient()->getBitrixCloudApp());

        $response = $companyApi->get($id);

        $company = \AlterEgo\BitrixAPI\Classes\Models\Crm\Company::CreateFromArray($response['result']);

        return $company;
    }

    /**
     * @param integer $moeDeloId
     *
     * @return \AlterEgo\BitrixAPI\Classes\Models\Crm\Company
     * @throws \Exception
     */
    public function getByMoeDeloId($moeDeloId)
    {
        $query = new EntityQuery();
        $query->addWhere(
            'UF_CRM_' . \AlterEgo\BitrixAPI\Classes\Models\Crm\Company::UF_MOEDELO_ID,
            Filter::TYPE_EQUAL,
            $moeDeloId
        ); // todo: fix (maybe it is only for bitrix24)
        $query->addWhere(
            'UF_CRM_' . \AlterEgo\BitrixAPI\Classes\Models\Crm\Company::UF_MOEDELO_ID,
            Filter::TYPE_NOT_EQUAL,
            'null'
        ); // todo: fix it // todo: fix (maybe it is only for bitrix24)

        $query->addSelect('*'); // todo: fix it // todo: fix (maybe it is only for bitrix24)
        $query->addSelect('UF_*'); // todo: fix it // todo: fix (maybe it is only for bitrix24)

        $companyIterator = $this->getList($query);

        /** @var \AlterEgo\BitrixAPI\Classes\Models\Crm\Company $company */
        $company = $companyIterator->current();

        /*if ($company->getUfMoedeloId() != $moeDeloId) {
            throw new \Exception("Company (MoeDelo Id#{$moeDeloId} don't exists in Bitrix24.");
        }*/

        return $company;
    }

    /**
     * @param \AlterEgo\BitrixAPI\Classes\Models\Crm\Company $company
     * @return integer|boolean
     */
    public function create(\AlterEgo\BitrixAPI\Classes\Models\Crm\Company $company)
    {
        $companyApi = new Company($this->getClient()->getBitrixCloudApp());

        $response = $companyApi->add($company->toArray());

        return $response['result'];
    }

    /**
     * @param \AlterEgo\BitrixAPI\Classes\Models\Crm\Company $company
     * @return boolean
     */
    public function update(\AlterEgo\BitrixAPI\Classes\Models\Crm\Company $company)
    {
        $companyApi = new Company($this->getClient()->getBitrixCloudApp());

        $response = $companyApi->update($company->getId(), $company->toArray());

        return $response['result'];
    }

    /**
     * @param \AlterEgo\BitrixAPI\Classes\Models\Crm\UserField $userField
     *
     * @return array
     */
    public function userFieldCreate(\AlterEgo\BitrixAPI\Classes\Models\Crm\UserField $userField)
    {
        $invoiceUserFieldApi = new UserField($this->getClient()->getBitrixCloudApp());

        $response = $invoiceUserFieldApi->add($userField->toArray());

        return $response;
    }

    public function userFieldDelete($userFieldId)
    {
        $invoiceUserFieldApi = new UserField($this->getClient()->getBitrixCloudApp());

        $response = $invoiceUserFieldApi->delete($userFieldId);

        return $response;
    }

    public function userFieldGetList(EntityQuery $query)
    {
        $invoiceUserField = new UserField($this->getClient()->getBitrixCloudApp());

        $response = $invoiceUserField->getList(
            $query->getOrder()->asArray(),
            $query->getFilter()->asArray()
        );

        return new UserFieldIterator($response['result']);
    }

    /**
     * @param $fieldName
     * @return \AlterEgo\BitrixAPI\Classes\Models\Crm\UserField
     * @throws \Exception
     */
    public function userFieldGetByFieldName($fieldName)
    {
        $query = new EntityQuery();
        $query->addWhere('FIELD_NAME', Filter::TYPE_EQUAL, $fieldName);

        $invoiceIterator = $this->userFieldGetList($query);

        try {
            /** @var \AlterEgo\BitrixAPI\Classes\Models\Crm\UserField $userField */
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
     * @return \AlterEgo\BitrixAPI\classes\Models\Crm\Company
     */
    public function getWithDetailsByMoeDeloId($moeDeloId)
    {
        $company = self::getById($moeDeloId);

        $requisiteApi = new RequisiteApi($this->getClient());

        $requisiteQuery = new EntityQuery();
        $requisiteQuery->addWhere('ENTITY_ID', Filter::TYPE_EQUAL, $company->getId())
            ->addWhere('ENTITY_TYPE_ID', Filter::TYPE_EQUAL, BitrixConst::CCrmOwnerTypeCompany);
        $requisites = $requisiteApi->getList($requisiteQuery)->all();

        /** @var \AlterEgo\BitrixAPI\Classes\Models\Crm\Requisite $requisite */
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
