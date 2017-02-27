<?php

namespace AlterEgo\BitrixAPI\Classes\Logic\BitrixCloud\Setting;

use AlterEgo\BitrixAPI\Classes\Api\Common\Entity\EntityApi;
use AlterEgo\BitrixAPI\Classes\Entity;
use AlterEgo\BitrixAPI\Classes\Models\Entity\EntityItemProperty;
use AlterEgo\BitrixAPI\Exceptions\ExceptionModelPropertyValueDontExists;
use AlterEgo\BitrixAPI\Exceptions\ExceptionSettingLogicDefaultSettingDontExists;
use AlterEgo\MoeDelo24\MoeDelo24;

class SettingLogic extends Entity
{
    const SETTING_ENTITY = 'setting';

    const SETTING_SECTION_ITEM = 'setting';

    /**
     * @param string $name
     * @param mixed|null $default
     * @param array $defaults
     * @return mixed|null
     */
    public function get($name, $default = null, $defaults = array())
    {
        if ($settingItem = $this->isSettingItemEntityExists()) {
            try {
                $property = $settingItem->getPropertyValue($name);

                return $property;
            } catch (ExceptionModelPropertyValueDontExists $exception) {
                // set default
            }
        }

        if (is_null($default)) {
            try {
                $default = $this->getDefaultSettingsValue($name, $defaults);
            } catch (ExceptionSettingLogicDefaultSettingDontExists $exception) {
                $default = null;
            }
        }

        return $default;
    }

    /**
     * @param array $settings
     * @return bool
     */
    public function setSettings($settings = array())
    {
        $entityApi = new EntityApi($this->getClient());

        if ($settingItem = $this->isSettingItemEntityExists()) {
            $values = array();
            foreach ($settings as $key => $value) {
                $flag = true;
                if ($this->isSettingItemPropertyEntityExists($key)) {
                    $itemProperty = new EntityItemProperty();
                    $itemProperty->setEntity(self::SETTING_ENTITY);
                    $itemProperty->setType(EntityItemProperty::TYPE_STRING);
                    $itemProperty->setName($key);
                    $itemProperty->setProperty($key);

                    $flag = $entityApi->itemPropertyCreate($itemProperty);
                }

                if ($flag) {
                    $values[$key] = $value;
                }
            }

            $settingItem->setPropertyValues($settings);
            $result = $entityApi->itemUpdate($settingItem);

            return $result;
        }

        return false;
    }


    /**
     * @param string $name
     * @param mixed[] $settings
     * @return mixed
     * @throws ExceptionSettingLogicDefaultSettingDontExists
     */
    private function getDefaultSettingsValue($name, $settings)
    {
        if (!array_key_exists($name, $settings)) {
            throw new ExceptionSettingLogicDefaultSettingDontExists("This {$name} default setting don't exists.");
        }

        return $settings[$name];
    }

    /**
     * @return \AlterEgo\BitrixAPI\classes\Models\Entity\EntityItem|bool
     */
    private function isSettingItemEntityExists()
    {
        $entityApi = new EntityApi($this->getClient());

        $settingItem = $entityApi->isItemExists(self::SETTING_ENTITY, self::SETTING_SECTION_ITEM);

        return $settingItem;
    }

    /**
     * @param $propertyName
     * @return \AlterEgo\BitrixAPI\classes\Models\Entity\EntityItem|bool
     */
    private function isSettingItemPropertyEntityExists($propertyName)
    {
        $entityApi = new EntityApi($this->getClient());

        $settingItem = $entityApi->isItemPropertyExists(self::SETTING_ENTITY, $propertyName);

        return $settingItem;
    }
}
