<?php

declare(strict_types=1);

namespace SnappyComponentsTest\Helper;

use SnappyComponents\Helper\ClassList;
use PHPUnit\Framework\TestCase;

class ClassListTest extends TestCase
{
    public function testShouldPassClassStringFromConstruct()
    {
        $classList = new ClassList('foo bar baz');
        $this->assertTrue($classList->has('foo'));
        $this->assertTrue($classList->has('bar'));
        $this->assertTrue($classList->has('baz'));
        $this->assertFalse($classList->has('bam'));
        $this->assertEquals('foo bar baz', (string)$classList);
    }

    public function testShouldAddMultipleClassesAtOnce()
    {
        $classList = new ClassList('foo');
        $classList->add('bar', 'baz');
        $this->assertTrue($classList->has('foo'));
        $this->assertTrue($classList->has('bar'));
        $this->assertTrue($classList->has('baz'));
        $this->assertFalse($classList->has('bam'));
        $this->assertEquals('foo bar baz', (string)$classList);
    }

    public function testShouldRemoveMultipleClassesAtOnce()
    {
        $classList = new ClassList('foo bar baz');
        $classList->remove('foo', 'bar');
        $this->assertFalse($classList->has('foo'));
        $this->assertFalse($classList->has('bar'));
        $this->assertTrue($classList->has('baz'));
    }
}
