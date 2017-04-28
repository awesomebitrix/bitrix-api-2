<?php

namespace AlterEgo\BitrixAPI\Classes;


class Navigation
{
    /**
     * @var integer
     */
    private $topCount;

    /**
     * @var boolean
     */
    private $showAll;

    /**
     * @var integer
     */
    private $pageNumber;

    /**
     * @var integer
     */
    private $pageSize;

    /**
     * @var integer
     */
    private $elementId;

    /**
     * @param mixed $topCount
     *
     * @return Navigation
     */
    public function setTopCount($topCount)
    {
        $this->topCount = $topCount;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTopCount()
    {
        return $this->topCount;
    }

    /**
     * @param mixed $showAll
     *
     * @return Navigation
     */
    public function setShowAll($showAll)
    {
        $this->showAll = $showAll;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getShowAll()
    {
        return $this->showAll;
    }

    /**
     * @param mixed $pageNumber
     *
     * @return Navigation
     */
    public function setPageNumber($pageNumber)
    {
        $this->pageNumber = $pageNumber;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPageNumber()
    {
        return $this->pageNumber;
    }

    /**
     * @param mixed $pageSize
     *
     * @return Navigation
     */
    public function setPageSize($pageSize)
    {
        $this->pageSize = $pageSize;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPageSize()
    {
        return $this->pageSize;
    }

    /**
     * @param mixed $elementId
     *
     * @return Navigation
     */
    public function setElementId($elementId)
    {
        $this->elementId = $elementId;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getElementId()
    {
        return $this->elementId;
    }

    /**
     * @return array
     */
    public function asArray()
    {
        return array(
            'nTopCount' => $this->getTopCount(),
            'bShowAll' => $this->getShowAll(),
            'iNumPage' => $this->getPageNumber(),
            'nPageSize' => $this->getPageSize(),
            'nElementID' => $this->getElementId(),
        );
    }
}
