<?php

namespace Candrianarijaona\Breadcrumb\Tests;
use Breadcrumb\Builder;


/**
 * Unit test for the Breadcrumb Class
 *
 * Class BreadcrumbTest
 * @package Breadcrumb\Tests
 */
class BreadcrumbTest extends \PHPUnit_Framework_TestCase
{
    public function testBuilder()
    {
        $builder = new Builder();

        $breadcrumb = $builder
            ->addLink('home', '/', 'homepage')
            ->addLink('tag', '/tag', 'tag')
            ->addLink('article', '/tag/article.html', 'article')
            ->build();

        var_dump($breadcrumb, $breadcrumb->count());

        var_dump($breadcrumb->removeLinkByName('tag'));
    }
}
