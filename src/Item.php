<?php

namespace Breadcrumb;

/**
 * This class represents an item in the breadcrumb
 *
 * Class BreadcrumbItem
 * @package Breadcrumb\Item
 */
class Item
{
    /** @var  string */
    protected $label;
    /** @var  string */
    protected $url;
    /** @var  bool */
    protected $first;
    /** @var  bool */
    protected $last;

    public function __construct($label, $url = null)
    {
        $this->label = $label;
        $this->url = $url;
        //By default, we set these values to false
        $this->first = false;
        $this->last = false;
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param string $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return boolean
     */
    public function isFirst()
    {
        return $this->first;
    }

    /**
     * @param boolean $first
     */
    public function setFirst($first)
    {
        $this->first = $first;
    }

    /**
     * @return boolean
     */
    public function isLast()
    {
        return $this->last;
    }

    /**
     * @param boolean $last
     */
    public function setLast($last)
    {
        $this->last = $last;
    }
}
