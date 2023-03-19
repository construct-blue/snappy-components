<?php

declare(strict_types=1);

namespace SnappyComponentsTest\Helper;

use SnappyComponents\Helper\HTMLAttributeMap;
use PHPUnit\Framework\TestCase;
use SnappyComponents\Helper\CSSClassList;

class AttributeMapTest extends TestCase
{
    public function testShouldOmitEmptyAttributes()
    {
        $attributeMap = new HTMLAttributeMap();
        $attributeMap->set('id', 'test');
        $attributeMap->set('title', '');
        $this->assertEquals(' id="test"', (string)$attributeMap);
    }

    public function testShouldOutputBooleanAttributes()
    {
        $attributeMap = new HTMLAttributeMap();
        $attributeMap->toggle('test', true);
        $attributeMap->toggle('title', false);
        $this->assertEquals(' test', (string)$attributeMap);
    }

    public function testShouldToggleBooleans()
    {
        $attributeMap = new HTMLAttributeMap();
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

    public function testShouldReturnTheNewToggleState()
    {
        $attributeMap = new HTMLAttributeMap();
        $this->assertTrue($attributeMap->toggle('test'));
        $this->assertFalse($attributeMap->toggle('test'));
        $this->assertTrue($attributeMap->toggle('test'));
    }
}
