<?php

declare(strict_types=1);

namespace SnappyComponentsTest\Helper;

use SnappyComponents\Helper\AttributeMap;
use PHPUnit\Framework\TestCase;
use SnappyComponents\Helper\ClassList;

class AttributeMapTest extends TestCase
{
    public function testShouldOmitEmptyAttributes()
    {
        $attributeMap = new AttributeMap();
        $attributeMap->set('id', 'test');
        $attributeMap->set('title', '');
        $this->assertEquals(' id="test"', (string)$attributeMap);
    }

    public function testShouldOutputBooleanAttributes()
    {
        $attributeMap = new AttributeMap();
        $attributeMap->toggle('test', true);
        $attributeMap->toggle('title', false);
        $this->assertEquals(' test', (string)$attributeMap);
    }

    public function testShouldOutputClasses()
    {
        $attributeMap = new AttributeMap();
        $classList = new ClassList('foo bar');
        $attributeMap->addClassList($classList);
        $this->assertEquals(' class="foo bar"', (string)$attributeMap);
    }

    public function testValuesWithBooleansWithClases()
    {
        $attributeMap = new AttributeMap();
        $attributeMap->set('id', 'test');
        $attributeMap->toggle('disabled', true);
        $attributeMap->addClassList(new ClassList('foo bar'));
        $this->assertEquals(' class="foo bar" id="test" disabled', (string)$attributeMap);
    }

    public function testShouldToggleBooleans()
    {
        $attributeMap = new AttributeMap();
        $attributeMap->toggle('test');
        $this->assertEquals(' test', (string)$attributeMap);
        $attributeMap->toggle('test');
        $this->assertEquals('', (string)$attributeMap);
        $attributeMap->toggle('test');
        $this->assertEquals(' test', (string)$attributeMap);
        $attributeMap->toggle('test', true);
        $this->assertEquals(' test', (string)$attributeMap);
        $attributeMap->toggle('test', false);
        $this->assertEquals('', (string)$attributeMap);
        $attributeMap->toggle('test', false);
        $this->assertEquals('', (string)$attributeMap);
    }
}
