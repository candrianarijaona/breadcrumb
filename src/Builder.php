<?php

namespace Breadcrumb;


use Fig\Link\Link;

class Builder implements BuilderInterface
{
    /**
     * Array containing the elements for the breadcrumb
     * @var array
     */
    protected $links = [];

    public function addLink($label, $url = '', $name = '')
    {
        $link = (new Link())
            ->withAttribute('label', $label)
            ->withHref($url)
            ->withRel($name ?: $label);

        $this->links[] = $link;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function build()
    {
        return new Breadcrumb($this->links);
    }
}
