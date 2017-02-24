<?php

namespace AlterEgo\BitrixAPI;


use AlterEgo\BitrixAPI\exceptions\ExceptionBitrixSettingNotExists;
use AlterEgo\BitrixAPI\exceptions\ExceptionNeedBitrix24App;
use Bitrix24\Bitrix24;

class Bitrix
{
    /**
     * Self-hosted version
     */
    const APP_TYPE_BITRIX = 'bitrix';

    /**
     * Cloud version
     */
    const APP_TYPE_BITRIX24 = 'bitrix24';

    private $type;

    /**
     * @var Bitrix24|null
     */
    private $bitrixApp;

    private static $app;

    /**
     * Bitrix constructor.
     * @param $type
     * @param Bitrix24|null $bitrix24App
     *
     * @throws \Exception
     */
    private function __construct($type, Bitrix24 $bitrix24App = null)
    {
        if ($type == self::APP_TYPE_BITRIX24) {
            if (is_null($bitrix24App)) {
                throw new ExceptionNeedBitrix24App('For app type BITRIX24 (cloud) need to set param `$bitrix24App`.');
            }
        } else if ($type == self::APP_TYPE_BITRIX) {
            // todo: create for Bitrix
        }

        $this->type = $type;
        $this->bitrixApp = $bitrix24App;
    }

    public static function getApp($type = null, Bitrix24 $bitrix24App = null)
    {
        if (is_null(self::$app)) {
            if (is_null($type)) {
                throw new \Exception("Param `\$type` is not set.");
            }

            self::$app = new self($type, $bitrix24App);
        }

        return self::$app;
    }

    /**
     * @return bool
     */
    public function isBitrixApp()
    {
        return $this->type === self::APP_TYPE_BITRIX;
    }

    /**
     * @return bool
     */
    public function isBitrix24App()
    {
        return $this->type === self::APP_TYPE_BITRIX24;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return Bitrix24
     */
    public function getBitrixApp()
    {
        return $this->bitrixApp;
    }

    private static $settings = array();

    public function getSettings()
    { // todo: make difference for bitrix and bitrix24
        if (!count(self::$settings)) {
            self::$settings = array(
                'bitrix_unit_pieces' => '',
                'bitrix_unit_hours' => '',
            );
        }

        return self::$settings;
    }

    public function getSetting($name, $default = null)
    {
        $settings = $this->getSettings();

        if (!array_key_exists($name, $settings)) {
            if (is_null($default)) {
                throw new ExceptionBitrixSettingNotExists("Setting {$name} don't exists.");
            }

            return $default;
        }

        return $settings[$name];
    }
}
