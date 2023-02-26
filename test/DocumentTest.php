<?php

declare(strict_types=1);

namespace SnappyComponentsTest;

use SnappyComponents\Document;
use PHPUnit\Framework\TestCase;
use SnappyRenderer\Renderer;

class DocumentTest extends TestCase
{
    public function testRenderEmpty()
    {
        $doc = new Document('en', 'example');
        $renderer = new Renderer();
        $result = $renderer->render($doc, (object)[]);
        self::assertEquals('<!DOCTYPE html><html lang="en"><head><title>example</title></head><body></body>', $result);
    }

    public function testRenderWithContent()
    {
        $doc = new Document('en', 'example');
        $doc->setHead(['head']);
        $doc->setBody(['body']);
        $renderer = new Renderer();
        $result = $renderer->render($doc, (object)[]);
        self::assertEquals('<!DOCTYPE html><html lang="en"><head><title>example</title>head</head><body>body</body>', $result);
    }
}
