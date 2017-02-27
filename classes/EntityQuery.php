<?php

namespace AlterEgo\BitrixAPI\Classes;

class EntityQuery
{
    // todo: make this class abstract, and create classes for each model
    // todo: for each model create validation of existing columns

    /**
     * @var Filter
     */
    private $filter;

    /**
     * @var Order
     */
    private $order;

    /**
     * @var Select
     */
    private $select;

    /**
     * @var GroupBy
     */
    private $group;

    /**
     * @var Navigation
     */
    private $navigation;

    public function __construct()
    {
        $this->filter = new Filter();
        $this->order = new Order();
        $this->select = new Select();
        $this->group = new GroupBy();
        $this->navigation = new Navigation();
    }

    /**
     * @param string $fieldName
     *
     * @return $this
     */
    public function addSelect($fieldName)
    {
        $this->select->add($fieldName);

        return $this;
    }

    /**
     * @param string[] $columns
     *
     * @return $this
     */
    public function select($columns)
    {
        $this->select->set($columns);

        return $this;
    }

    /**
     * @param string $columnName
     * @param string $sort
     *
     * @return $this
     */
    public function addOrderBy($columnName, $sort)
    {
        $this->order->add($columnName, $sort);

        return $this;
    }

    /**
     * @param array $columns
     *
     * @return $this
     */
    public function orderBy($columns)
    {
        $this->order->set($columns);

        return $this;
    }

    /**
     * @param string $columnName
     * @param string $type
     * @param mixed $value
     *
     * @return $this
     */
    public function addWhere($columnName, $type, $value)
    {
        $this->filter->add($columnName, $type, $value);

        return $this;
    }

    /**
     * @param array $columns
     *
     * @return $this
     */
    public function andWhere($columns)
    {
        $this->filter->addAnd($columns);

        return $this;
    }

    /**
     * @param array $columns
     *
     * @return $this
     */
    public function orWhere($columns)
    {
        $this->filter->addOr($columns);

        return $this;
    }

    /**
     * @param array $columns
     *
     * @return $this
     */
    public function where($columns)
    {
        $this->filter->set($columns);

        return $this;
    }

    public function topCount($topCount)
    {
        $this->navigation->setTopCount($topCount);

        return $this;
    }

    public function showAll($showAll)
    {
        $this->navigation->setShowAll($showAll);

        return $this;
    }

    public function pageNumber($pageNumber)
    {
        $this->navigation->setPageNumber($pageNumber);

        return $this;
    }

    public function pageSize($pageSize)
    {
        $this->navigation->setPageSize($pageSize);

        return $this;
    }

    public function elementId($elementId)
    {
        $this->navigation->setElementId($elementId);

        return $this;
    }

    /**
     * @return Filter
     */
    public function getFilter()
    {
        return $this->filter;
    }

    /**
     * @return Order
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @return Select
     */
    public function getSelect()
    {
        return $this->select;
    }

    /**
     * @return GroupBy
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * @return Navigation
     */
    public function getNavigation()
    {
        return $this->navigation;
    }
}