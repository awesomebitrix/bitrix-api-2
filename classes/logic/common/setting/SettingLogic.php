<?php

namespace AlterEgo\BitrixAPI\Classes\Logic\Common\Setting;

use AlterEgo\BitrixAPI\Classes\Entity;

class SettingLogic extends Entity
{
    /**
     * @param string $name
     * @param mixed $default
     * @param mixed[] $defaults
     * @return mixed
     */
    public function get($name, $default = null, $defaults = array())
    {
        return $this->call(__FUNCTION__, array($name, $default, $defaults));
    }

    /**
     * @param array $settings
     * @return bool
     */
    public function setSettings($settings = array())
    {
        return $this->call(__FUNCTION__, array($settings));
    }
}
