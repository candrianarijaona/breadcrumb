<?php

namespace Breadcrumb;

use Fig\Link\GenericLinkProvider;

/**
 * Class Breadcrumb
 *
 * @package     Breadcrumb
 * @version     2.0
 * @author      Claude Andrianarijaona
 * @licence    MIT
 * @copyright   (c) 2017, Claude Andrianarijaona
 */
class Breadcrumb extends GenericLinkProvider implements BreadcrumbInterface
{
    /** html output */
    const FORMAT_HTML = 'html';

    /** json output */
    const FORMAT_JSON = 'json';

    /**
     * @inheritdoc
     */
    public function count()
    {
        return count($this->getLinks());
    }

    /**
     * @param $name
     * @return Breadcrumb
     */
    public function removeLinkByName($name)
    {
        $that = clone($this);

        if ($links = $this->getLinksByRel($name)) {
            foreach ($links as $link) {
                $that = $that->withoutLink($link);
            }
        }

        return $that;
    }

    /**
     * @inheritdoc
     */
    public function render($outputFormat = self::FORMAT_HTML, $listType = 'ol')
    {
        switch ($outputFormat) {
            case self::FORMAT_HTML :
                return $this->renderHtml($listType);
                break;
            case self::FORMAT_JSON :
                return $this->renderJson();
                break;
            default:
                throw new \InvalidArgumentException('Unexpected format ' . $outputFormat);
        }
    }

    /**
     * For more information : https://developers.google.com/search/docs/data-types/breadcrumbs
     * @inheritdoc
     */
    public function renderHtml($listType)
    {

    }

    /**
     * For more information : https://developers.google.com/search/docs/data-types/breadcrumbs
     * @inheritdoc
     */
    public function renderJson()
    {

    }
}
