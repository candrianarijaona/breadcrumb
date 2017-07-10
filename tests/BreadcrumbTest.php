<?php

namespace Candrianarijaona\Breadcrumb\Tests;

use Breadcrumb\Breadcrumb;
use Fig\Link\Link;

/**
 * Unit test for the Breadcrumb Class
 *
 * Class BreadcrumbTest
 * @package Breadcrumb\Tests
 */
class BreadcrumbTest extends \PHPUnit_Framework_TestCase
{
    public function testInstanceOf()
    {
        $breadcrumb = (new Breadcrumb())->push('home');
        $this->assertInstanceOf('Breadcrumb\Breadcrumb', $breadcrumb);
    }

    public function testPushAndCount()
    {
        $breadcrumb = (new Breadcrumb())->push('home');
        $this->assertEquals(1, $breadcrumb->count());

        $breadcrumb->push('Tag', 'url-to-tag');
        $this->assertEquals(2, $breadcrumb->count());

        $breadcrumb->push('Article', 'url-to-article');
        $this->assertEquals(3, $breadcrumb->count());
    }

    public function testToArray()
    {
        $breadcrumb = (new Breadcrumb())->push('home');
        $breadcrumbArray = $breadcrumb->toArray();
        $this->assertEquals(1, count($breadcrumbArray));

        $breadcrumb->push('Tag', 'url-to-tag');
        $breadcrumb->push('Article', 'url-to-article');
        $breadcrumbArray = $breadcrumb->toArray();
        $this->assertEquals(3, count($breadcrumbArray));

        $breadcrumbItemHome = $breadcrumbArray[0];
        $breadcrumbItemArticle = $breadcrumbArray[1];
        $breadcrumbItemTag = $breadcrumbArray[2];

        //Each element of the array should by an instance of BreadcrumbItem
        $this->assertInstanceOf(Link::class, $breadcrumbItemHome);
        $this->assertInstanceOf(Link::class, $breadcrumbItemArticle);
        $this->assertInstanceOf(Link::class, $breadcrumbItemTag);
var_dump($breadcrumbItemHome);
        //$this->asserta('first', $breadcrumbItemHome->getRels());
        $this->assertArrayHasKey('last', $breadcrumbItemTag->getRels());
    }
}
