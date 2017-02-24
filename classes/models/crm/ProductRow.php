<?php
/**
 * Created by PhpStorm.
 * User: sgavka
 * Date: 31.01.17
 * Time: 14:32
 */

namespace AlterEgo\BitrixAPI\classes\models\crm;


class ProductRow
{
    /**
     * @var float
     */
    private $discountPrice;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $measureCode;

    /**
     * @var string
     */
    private $measureName;

    /**
     * @var float
     */
    private $price;

    /**
     * @var integer|null
     */
    private $productId;

    /**
     * @var string
     */
    private $productName;

    /**
     * @var float
     */
    private $quantity;

    /**
     * @var float
     */
    private $sum; // todo: ?

    public static function CreateFromArray($array)
    {
        $productRow = new self();

        if (!is_null($array['ID'])) {
            $productRow->setId($array['ID']);
        }

        $productRow->setPrice($array['PRICE']);
        $productRow->setDiscountPrice($array['DISCOUNT_PRICE']);
        $productRow->setProductId($array['PRODUCT_ID']);
        $productRow->setProductName($array['PRODUCT_NAME']);
        $productRow->setQuantity($array['QUANTITY']);

        if (!is_null($array['MEASURE_CODE'])) {
            $productRow->setMeasureCode($array['MEASURE_CODE']);
        }

        if (!is_null($array['MEASURE_NAME'])) {
            $productRow->setMeasureName($array['MEASURE_NAME']);
        }

        return $productRow;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $array = array();

        if (!is_null($this->getId())) {
            $array['ID'] = $this->getId();
        }

        $array['PRICE'] = $this->getPrice();
        $array['DISCOUNT_PRICE'] = $this->getDiscountPrice();
        $array['PRODUCT_ID'] = $this->getProductId();
        $array['PRODUCT_NAME'] = $this->getProductName();
        $array['QUANTITY'] = $this->getQuantity();

        if (!is_null($this->getMeasureCode())) {
            $array['MEASURE_CODE'] = $this->getMeasureCode();
        }

        if (!is_null($this->getMeasureName())) {
            $array['MEASURE_NAME'] = $this->getMeasureName();
        }

        return $array;
    }

    /**
     * @param string $productName
     *
     * @return ProductRow
     */
    public function setProductName($productName)
    {
        $this->productName = $productName;

        return $this;
    }

    /**
     * @param float $sum
     *
     * @return ProductRow
     */
    public function setSum($sum)
    {
        $this->sum = $sum;

        return $this;
    }

    /**
     * @param float $quantity
     *
     * @return ProductRow
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @param float $price
     *
     * @return ProductRow
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @param float $discountPrice
     *
     * @return ProductRow
     */
    public function setDiscountPrice($discountPrice)
    {
        $this->discountPrice = $discountPrice;

        return $this;
    }

    /**
     * @param int $measureCode
     *
     * @return ProductRow
     */
    public function setMeasureCode($measureCode)
    {
        $this->measureCode = $measureCode;

        return $this;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return float
     */
    public function getDiscountPrice()
    {
        return $this->discountPrice;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getMeasureCode()
    {
        return $this->measureCode;
    }

    /**
     * @return int|null
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @return string
     */
    public function getProductName()
    {
        return $this->productName;
    }

    /**
     * @return float
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @return float
     */
    public function getSum()
    {
        return $this->sum;
    }

    /**
     * @param string $measureName
     *
     * @return ProductRow
     */
    public function setMeasureName($measureName)
    {
        $this->measureName = $measureName;

        return $this;
    }

    /**
     * @return string
     */
    public function getMeasureName()
    {
        return $this->measureName;
    }

    /**
     * @param int $id
     * @return ProductRow
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param int|null $productId
     * @return ProductRow
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;
        return $this;
    }
}
