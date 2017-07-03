<?php

namespace Candrianarijaona\Breadcrumb\Tests;

use Breadcrumb\Breadcrumb;

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
        $breadcrumb = new Breadcrumb('Home');
        $this->assertInstanceOf('Breadcrumb\Breadcrumb', $breadcrumb);
    }

    public function testPushAndCount()
    {
        $breadcrumb = new Breadcrumb('Home');
        $this->assertEquals(1, $breadcrumb->count());

        $breadcrumb->push('Tag', 'url-to-tag');
        $this->assertEquals(2, $breadcrumb->count());

        $breadcrumb->push('Article', 'url-to-article');
        $this->assertEquals(3, $breadcrumb->count());
    }

    public function testToArray()
    {
        $breadcrumb = new Breadcrumb('Home');
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
        $this->assertInstanceOf('Breadcrumb\Item', $breadcrumbItemHome);
        $this->assertInstanceOf('Breadcrumb\Item', $breadcrumbItemArticle);
        $this->assertInstanceOf('Breadcrumb\Item', $breadcrumbItemTag);

        $this->assertEquals(true, $breadcrumbItemHome->isFirst());
        $this->assertEquals(false, $breadcrumbItemArticle->isFirst());
        $this->assertEquals(true, $breadcrumbItemTag->isLast());
    }
}
