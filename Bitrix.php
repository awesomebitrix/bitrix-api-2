<?php

namespace AlterEgo\BitrixAPI;

use AlterEgo\BitrixAPI\Exceptions\ExceptionAppTypeInvalid;
use AlterEgo\BitrixAPI\Exceptions\ExceptionAppTypeIsNotSet;
use AlterEgo\BitrixAPI\Exceptions\ExceptionNeedBitrix24App;
use Bitrix24\Bitrix24;

/**
 * Class Bitrix is a singleton.
 * @package AlterEgo\BitrixAPI
 */
class Bitrix
{
    /**
     * Self-hosted version
     */
    const APP_TYPE_BITRIX_BOX = 'bitrix-box';

    const APP_TYPE_CLASS_BITRIX_BOX = 'BitrixBox';

    /**
     * Cloud version
     */
    const APP_TYPE_BITRIX_CLOUD = 'bitrix-cloud';

    const APP_TYPE_CLASS_BITRIX_CLOUD = 'BitrixCloud';

    private $type;

    /**
     * @var Bitrix24|null
     */
    private $bitrixCloudApp;

    private static $app;

    /**
     * Bitrix constructor.
     * @param $type
     * @param Bitrix24|null $bitrixCloudApp
     *
     * @throws \Exception
     */
    private function __construct($type, Bitrix24 $bitrixCloudApp = null)
    {
        if ($type === self::APP_TYPE_BITRIX_CLOUD) {
            if (is_null($bitrixCloudApp)) {
                throw new ExceptionNeedBitrix24App('For app type Bitrix24 Cloud need to set param `$bitrix24App`.');
            }
        } else if ($type === self::APP_TYPE_BITRIX_BOX) {
            // todo: create for Bitrix Box
        } else {
            throw new ExceptionAppTypeInvalid("App type {$type} in not accepted.");
        }

        $this->type = $type;
        $this->bitrixCloudApp = $bitrixCloudApp;
    }

    public static function getApp($type = null, Bitrix24 $bitrixCloudApp = null)
    {
        if (is_null(self::$app)) {
            if (is_null($type)) {
                throw new ExceptionAppTypeIsNotSet("Param `\$type` is not set.");
            }

            self::$app = new self($type, $bitrixCloudApp);
        }

        return self::$app;
    }

    /**
     * @return bool
     */
    public function isBitrixBoxApp()
    {
        return $this->type === self::APP_TYPE_BITRIX_BOX;
    }

    /**
     * @return bool
     */
    public function isBitrixCloudApp()
    {
        return $this->type === self::APP_TYPE_BITRIX_CLOUD;
    }

    /**
     * @return string
     */
    public function getType()
    {
        $types = [
            self::APP_TYPE_BITRIX_BOX => self::APP_TYPE_CLASS_BITRIX_BOX,
            self::APP_TYPE_BITRIX_CLOUD => self::APP_TYPE_CLASS_BITRIX_CLOUD,
        ];

        return $types[$this->type];
    }

    /**
     * @return Bitrix24
     */
    public function getBitrixCloudApp()
    {
        return $this->bitrixCloudApp;
    }
}
