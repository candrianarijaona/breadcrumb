<?php
/**
 * Created by PhpStorm.
 * User: samue
 * Date: 11/10/2016
 * Time: 00:57
 */

namespace Breadcrumb\Tests;

use Breadcrumb\Breadcrumb;

class BreadcrumbTest extends \PHPUnit_Framework_TestCase
{
    public function testInstanceOf()
    {
        $breadcrumb = new Breadcrumb('Home');
        $this->assertInstanceOf('\Breadcrumb\Breadcrumb', $breadcrumb);
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
        $this->assertInstanceOf('\Breadcrumb\BreadcrumbItem', $breadcrumbItemHome);
        $this->assertInstanceOf('\Breadcrumb\BreadcrumbItem', $breadcrumbItemArticle);
        $this->assertInstanceOf('\Breadcrumb\BreadcrumbItem', $breadcrumbItemTag);

        $this->assertEquals(true, $breadcrumbItemHome->isFirst());
        $this->assertEquals(false, $breadcrumbItemArticle->isFirst());
        $this->assertEquals(true, $breadcrumbItemTag->isLast());
    }
}
