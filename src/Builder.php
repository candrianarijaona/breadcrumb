<?php

namespace Breadcrumb;


use Fig\Link\Link;

class Builder implements BuilderInterface
{

    protected $links = [];

    public function addLink($label, $url = '', $name = '')
    {
        $link = (new Link())
            ->withAttribute('label', $label)
            ->withHref($url)
            ->withRel($name ?: $label);

        $link[] = $link;
    }

    /**
     * @inheritdoc
     */
    public function build()
    {
        return new Breadcrumb($this->links);
    }
}
