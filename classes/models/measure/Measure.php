<?php

namespace AlterEgo\BitrixAPI\Classes\Models\Measure;

class Measure
{
    /**
     * @var integer
     */
    private $code;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string Y|N
     */
    private $isDefault;

    /**
     * @var string
     */
    private $measureTitle;

    /**
     * @var string
     */
    private $symbolIntl;

    /**
     * @var string
     */
    private $symbolLetterIntl;

    /**
     * @var string
     */
    private $symbolRus;

    /**
     * @param $array
     *
     * @return self
     */
    public static function CreateFromArray($array)
    {
        $measure = new self();

        $measure->setCode($array['CODE']);
        $measure->setId($array['ID']);
        $measure->setIsDefault($array['IS_DEFAULT']);
        $measure->setMeasureTitle($array['MEASURE_TITLE']);
        $measure->setSymbolIntl($array['SYMBOL_INTL']);
        $measure->setSymbolLetterIntl($array['SYMBOL_LETTER_INTL']);
        $measure->setSymbolRus($array['SYMBOL_RUS']);

        return $measure;
    }

    public function toArray()
    {
        $array = array();

        $array['CODE'] = $this->getCode();
        $array['ID'] = $this->getId();
        $array['IS_DEFAULT'] = $this->getIsDefault();
        $array['MEASURE_TITLE'] = $this->getMeasureTitle();
        $array['SYMBOL_INTL'] = $this->getSymbolIntl();
        $array['SYMBOL_LETTER_INTL'] = $this->getSymbolLetterIntl();
        $array['SYMBOL_RUS'] = $this->getSymbolRus();

        return $array;
    }

    /**
     * @param string $symbolRus
     * @return Measure
     */
    public function setSymbolRus($symbolRus)
    {
        $this->symbolRus = $symbolRus;
        return $this;
    }

    /**
     * @return string
     */
    public function getSymbolRus()
    {
        return $this->symbolRus;
    }

    /**
     * @param string $symbolLetterIntl
     * @return Measure
     */
    public function setSymbolLetterIntl($symbolLetterIntl)
    {
        $this->symbolLetterIntl = $symbolLetterIntl;
        return $this;
    }

    /**
     * @return string
     */
    public function getSymbolLetterIntl()
    {
        return $this->symbolLetterIntl;
    }

    /**
     * @return string
     */
    public function getSymbolLetterIntlClean()
    {
        $string = str_replace(' ', '_', $this->symbolLetterIntl); // Replaces all spaces with hyphens.

        return preg_replace('/[^A-Za-z_]/', '', $string);
    }

    /**
     * @param string $symbolIntl
     * @return Measure
     */
    public function setSymbolIntl($symbolIntl)
    {
        $this->symbolIntl = $symbolIntl;
        return $this;
    }

    /**
     * @return string
     */
    public function getSymbolIntl()
    {
        return $this->symbolIntl;
    }

    /**
     * @param string $measureTitle
     * @return Measure
     */
    public function setMeasureTitle($measureTitle)
    {
        $this->measureTitle = $measureTitle;
        return $this;
    }

    /**
     * @return string
     */
    public function getMeasureTitle()
    {
        return $this->measureTitle;
    }

    /**
     * @param string $isDefault
     * @return Measure
     */
    public function setIsDefault($isDefault)
    {
        $this->isDefault = $isDefault;
        return $this;
    }

    /**
     * @return string
     */
    public function getIsDefault()
    {
        return $this->isDefault;
    }

    /**
     * @param int $id
     * @return Measure
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
     * @param int $code
     * @return Measure
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return int
     */
    public function getCode()
    {
        return $this->code;
    }
}
