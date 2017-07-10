<?php

namespace Breadcrumb;


interface BreadcrumbInterface
{
    /**
     * Return the number of elements in the breadcrumb
     *
     * @return int
     */
    public function count();

    /**
     * Render the breadcrumb according to the specified format
     *
     * @param string $outputFormat
     * @param string $listType
     * 
     * @return string
     */
    public function render($outputFormat, $listType);
}
