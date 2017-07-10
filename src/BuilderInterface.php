<?php

namespace Breadcrumb;


interface BuilderInterface
{
    /**
     * Add new link in the builder
     *
     * @param string $label
     * @param string $url
     * @param string $name
     *
     * @return BuilderInterface
     */
    public function addLink($label, $url = '', $name = '');

    /**
     * @return BreadcrumbInterface
     */
    public function build();
}
