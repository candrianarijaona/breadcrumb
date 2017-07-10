<?php

namespace Breadcrumb;

use Fig\Link\GenericLinkProvider;
use Fig\Link\Link;

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
    const FORMAT_HTML = 'html';

    const FORMAT_JSON = 'json';

    /**
     * @inheritdoc
     */
    public function count()
    {
        // TODO: Implement count() method.
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

    public function renderHtml($listType)
    {

    }

    public function renderJson()
    {

    }
}
