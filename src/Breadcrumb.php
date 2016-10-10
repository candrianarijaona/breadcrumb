<?php
/**
 * Created by PhpStorm.
 * User: candrianarijaona
 * Date: 11/10/2016
 * Time: 00:14
 */

namespace Breadcrumb;


class Breadcrumb
{

    protected $breadcrumb = [];

    /**
     * Breadcrumb constructor.
     *
     * @param string $rootLabel
     * @param string|null $rootUrl
     */
    public function __construct($rootLabel, $rootUrl = null)
    {
        //We suppose that if not provided, root is /
        if (!$rootUrl) {
            $rootUrl = '/';
        }
        $this->push($rootLabel, $rootUrl);
    }

    /**
     * Add an element to the breadcrumb
     *
     * @param string $label
     * @param string|null $url
     *
     * @return $this
     */
    public function push($label, $url = null)
    {
        $breadcrumbItem = new BreadcrumbItem($label, $url);
        $this->breadcrumb[] = $breadcrumbItem;

        return $this;
    }

    /**
     * Get the number of element in the breadcrumb
     *
     * @return int
     */
    public function count()
    {
        return count($this->breadcrumb);
    }

    /**
     * Alias of the method count
     *
     * @return int
     */
    public function found()
    {
        return $this->count();
    }

    /**
     * Export the breadcrumb as an array and identify the first and last position
     *
     * @return array
     */
    public function toArray()
    {
        $breadcrumb = $this->breadcrumb;
        //Add indicator to indentify the first and last item.
        if (count($breadcrumb)) {
            $breadcrumb[0]->setFirst(true);
            $breadcrumb[count($breadcrumb) - 1]->setLast(true);
        }

        return $breadcrumb;
    }
}
