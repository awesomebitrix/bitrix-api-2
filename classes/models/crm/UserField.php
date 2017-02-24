<?php
/**
 * Created by PhpStorm.
 * User: sgavka
 * Date: 01.02.17
 * Time: 17:12
 */

namespace AlterEgo\BitrixAPI\classes\models\crm;


class UserField
{
    const TYPE_STRING = 'string';

    const YES = 'Y';

    const NO = 'N';

    /**
     * @var string
     */
    private $editFormLabel;

    /**
     * @var string
     */
    private $editInList; // Y|N

    /**
     * @var integer
     */
    private $entityId;

    /**
     * @var string
     */
    private $errorMessage;

    /**
     * @var string
     */
    private $fieldName;

    /**
     * @var string
     */
    private $helpMessage;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $isSearchable; // Y|N

    /**
     * @var array|null
     */
    private $list; // uf_enum_element

    /**
     * @var string
     */
    private $listColumnLabel;

    /**
     * @var string
     */
    private $listFilterLabel;

    /**
     * @var string
     */
    private $mandatory; // Y|N

    /**
     * @var string
     */
    private $multiple; // Y|N

    /**
     * @var array
     */
    private $settings;

    /**
     * @var string
     */
    private $showFilter; // Y|N

    /**
     * @var string
     */
    private $showInList; // Y|N

    /**
     * @var integer
     */
    private $sort;

    /**
     * @var string
     */
    private $userTypeId;

    /**
     * @var string
     */
    private $xmlId;

    public static function CreateFromArray($array)
    {
        $userField = new self();

        if (array_key_exists('ID', $array)) {
            $userField->setId($array['ID']);
        }

        $userField->setEntityId($array['ENTITY_ID']);
        $userField->setFieldName($array['FIELD_NAME']);
        $userField->setUserTypeId($array['USER_TYPE_ID']);
        $userField->setXmlId($array['XML_ID']);
        $userField->setSort($array['SORT']);
        $userField->setMultiple($array['MULTIPLE']);
        $userField->setMandatory($array['MANDATORY']);
        $userField->setShowFilter($array['SHOW_FILTER']);
        $userField->setShowInList($array['SHOW_IN_LIST']);
        $userField->setEditInList($array['EDIT_IN_LIST']);
        $userField->setIsSearchable($array['IS_SEARCHABLE']);
        $userField->setEditFormLabel($array['EDIT_FORM_LABEL']);
        $userField->setListColumnLabel($array['LIST_COLUMN_LABEL']);
        $userField->setListFilterLabel($array['LIST_FILTER_LABEL']);
        $userField->setErrorMessage($array['ERROR_MESSAGE']);
        $userField->setHelpMessage($array['HELP_MESSAGE']);

        return $userField;
    }

    public function toArray()
    {
        $array = array();

        if (!is_null($this->getId())) {
            $array['ID'] = $this->getId();
        }

        $array['ENTITY_ID'] = $this->getEntityId();
        $array['FIELD_NAME'] = $this->getFieldName();
        $array['USER_TYPE_ID'] = $this->getUserTypeId();
        $array['XML_ID'] = $this->getXmlId();
        $array['SORT'] = $this->getSort();
        $array['MULTIPLE'] = $this->getMultiple();
        $array['MANDATORY'] = $this->getMandatory();
        $array['SHOW_FILTER'] = $this->getShowFilter();
        $array['SHOW_IN_LIST'] = $this->getShowInList();
        $array['EDIT_IN_LIST'] = $this->getEditInList();
        $array['IS_SEARCHABLE'] = $this->getIsSearchable();
        $array['EDIT_FORM_LABEL'] = $this->getEditFormLabel();
        $array['LIST_COLUMN_LABEL'] = $this->getListColumnLabel();
        $array['LIST_FILTER_LABEL'] = $this->getListFilterLabel();
        $array['ERROR_MESSAGE'] = $this->getErrorMessage();
        $array['HELP_MESSAGE'] = $this->getHelpMessage();

        return $array;

        /*
         *      'ENTITY_ID' => 'ORDER',
                'FIELD_NAME' => self::ORDER_MOEDELO_NUMBER_FIELD,
                'USER_TYPE_ID' => 'integer',
                'XML_ID' => 'XML_MOEDELO_NUMBER',
                'SORT' => 500,
                'MULTIPLE' => 'N',
                'MANDATORY' => 'N',
                'SHOW_FILTER' => 'N',
                'SHOW_IN_LIST' => 'Y',
                'EDIT_IN_LIST' => 'Y',
                'IS_SEARCHABLE' => 'Y',
                'EDIT_FORM_LABEL' => array(
                    'ru' => 'МоёДело Number',
                    'en' => 'MoeDelo Number',
                ),
                'LIST_COLUMN_LABEL' => array(
                    'ru' => 'МоёДело Number',
                    'en' => 'MoeDelo Number',
                ),
                'LIST_FILTER_LABEL' => array(
                    'ru' => 'МоёДело Number',
                    'en' => 'MoeDelo Number',
                ),
                    'ERROR_MESSAGE' => array(
                    'ru' => 'Ошибка при заполнении МоёДело Number',
                    'en' => 'An error in completing the MoeDelo Number',
                ),
                            'HELP_MESSAGE' => array(
                    'ru' => '',
                    'en' => '',
                ),
         * */
    }

    /**
     * @param string $editFormLabel
     * @return UserField
     */
    public function setEditFormLabel($editFormLabel)
    {
        $this->editFormLabel = $editFormLabel;
        return $this;
    }

    /**
     * @return string
     */
    public function getEditFormLabel()
    {
        return $this->editFormLabel;
    }

    /**
     * @param string $editInList
     * @return UserField
     */
    public function setEditInList($editInList)
    {
        $this->editInList = $editInList;
        return $this;
    }

    /**
     * @return string
     */
    public function getEditInList()
    {
        return $this->editInList;
    }

    /**
     * @param int $entityId
     * @return UserField
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
     * @param string $errorMessage
     * @return UserField
     */
    public function setErrorMessage($errorMessage)
    {
        $this->errorMessage = $errorMessage;
        return $this;
    }

    /**
     * @return string
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    /**
     * @param string $fieldName
     * @return UserField
     */
    public function setFieldName($fieldName)
    {
        $this->fieldName = $fieldName;
        return $this;
    }

    /**
     * @return string
     */
    public function getFieldName()
    {
        return $this->fieldName;
    }

    /**
     * @param string $helpMessage
     * @return UserField
     */
    public function setHelpMessage($helpMessage)
    {
        $this->helpMessage = $helpMessage;
        return $this;
    }

    /**
     * @return string
     */
    public function getHelpMessage()
    {
        return $this->helpMessage;
    }

    /**
     * @param int $id
     * @return UserField
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
     * @param boolean $isSearchable
     * @return UserField
     */
    public function setIsSearchable($isSearchable)
    {
        if ($isSearchable) {
            $this->isSearchable = self::YES;
        } else {
            $this->isSearchable = self::NO;
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getIsSearchable()
    {
        return $this->isSearchable;
    }

    /**
     * @return boolean
     */
    public function getIsSearchableBool()
    {
        if ($this->isSearchable == self::YES) {
            return true;
        }

        return false;
    }

    /**
     * @param array|null $list
     * @return UserField
     */
    public function setList($list)
    {
        $this->list = $list;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getList()
    {
        return $this->list;
    }

    /**
     * @param string $listColumnLabel
     * @return UserField
     */
    public function setListColumnLabel($listColumnLabel)
    {
        $this->listColumnLabel = $listColumnLabel;
        return $this;
    }

    /**
     * @return string
     */
    public function getListColumnLabel()
    {
        return $this->listColumnLabel;
    }

    /**
     * @param string $listFilterLabel
     * @return UserField
     */
    public function setListFilterLabel($listFilterLabel)
    {
        $this->listFilterLabel = $listFilterLabel;
        return $this;
    }

    /**
     * @return string
     */
    public function getListFilterLabel()
    {
        return $this->listFilterLabel;
    }

    /**
     * @param boolean $mandatory
     * @return UserField
     */
    public function setMandatory($mandatory)
    {
        if ($mandatory) {
            $this->mandatory = self::YES;
        } else {
            $this->mandatory = self::NO;
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getMandatory()
    {
        return $this->mandatory;
    }

    /**
     * @return boolean
     */
    public function getMandatoryBool()
    {
        if ($this->mandatory == self::YES) {
            return true;
        }

        return false;
    }

    /**
     * @param boolean $multiple
     * @return UserField
     */
    public function setMultiple($multiple)
    {
        if ($multiple) {
            $this->multiple = self::YES;
        } else {
            $this->multiple = self::NO;
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getMultiple()
    {
        return $this->multiple;
    }

    /**
     * @return string
     */
    public function getMultipleBool()
    {
        if ($this->multiple == self::YES) {
            return true;
        }

        return false;
    }

    /**
     * @param array $settings
     * @return UserField
     */
    public function setSettings($settings)
    {
        $this->settings = $settings;
        return $this;
    }

    /**
     * @return array
     */
    public function getSettings()
    {
        return $this->settings;
    }

    /**
     * @param boolean $showFilter
     * @return UserField
     */
    public function setShowFilter($showFilter)
    {
        if ($showFilter) {
            $this->showFilter = self::YES;
        } else {
            $this->showFilter = self::NO;
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getShowFilter()
    {
        return $this->showFilter;
    }

    /**
     * @return boolean
     */
    public function getShowFilterBool()
    {
        if ($this->showFilter == self::YES) {
            return true;
        }

        return false;
    }

    /**
     * @param boolean $showInList
     * @return UserField
     */
    public function setShowInList($showInList)
    {
        if ($showInList) {
            $this->showInList = self::YES;
        } else {
            $this->showInList = self::NO;
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getShowInList()
    {
        return $this->showInList;
    }

    /**
     * @return boolean
     */
    public function getShowInListBool()
    {
        if ($this->showInList == self::YES) {
            return true;
        }

        return false;
    }

    /**
     * @param int $sort
     * @return UserField
     */
    public function setSort($sort)
    {
        $this->sort = $sort;
        return $this;
    }

    /**
     * @param string $userTypeId
     * @return UserField
     */
    public function setUserTypeId($userTypeId)
    {
        $this->userTypeId = $userTypeId;
        return $this;
    }

    /**
     * @return string
     */
    public function getUserTypeId()
    {
        return $this->userTypeId;
    }

    /**
     * @return int
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * @param string $xmlId
     * @return UserField
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

    /*
     *  EDIT_FORM_LABEL
        Object {type="string", ...}
        EDIT_IN_LIST
        Object {type="char", ...}
        ENTITY_ID
        Object {type="string", title="Объект", isImmutable=true}
        ERROR_MESSAGE
        Object {type="string", title="Сообщение об ошибке"}
        FIELD_NAME
        Object {type="string", title="Код", isImmutable=true}
        HELP_MESSAGE
        Object {type="string", title="Помощь"}
        ID
        Object {type="int", title="Ид", isReadOnly=true}
        IS_SEARCHABLE
        Object {type="char", ...}
        LIST
        Object {type="uf_enum_element", title="Элементы списка", ...}
        LIST_COLUMN_LABEL
        Object {type="string", title="Заголовок в списке"}
        LIST_FILTER_LABEL
        Object {type="string", title="Подпись фильтра в списке"}
        MANDATORY
        Object {type="char", title="Обязательное"}
        MULTIPLE
        Object {type="char", title="Множественное"}
        SETTINGS
        Object {type="object", ...}
        SHOW_FILTER
        Object {type="char", title="Показывать в фильтре списка"}
        SHOW_IN_LIST
        Object {type="char", title="Показывать в списке"}
        SORT
        Object {type="int", title="Сортировка"}
        USER_TYPE_ID
        Object {type="string", title="Тип данных", ...}
        XML_ID
        Object {type="string", title="Внешний Ид (XML ID)"}
     * */
}
