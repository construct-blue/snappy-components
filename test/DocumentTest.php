<?php

declare(strict_types=1);

namespace SnappyComponentsTest;

use SnappyComponents\Capture;
use SnappyComponents\Document;
use PHPUnit\Framework\TestCase;
use SnappyComponents\DocumentStrategy;
use SnappyRenderer\Renderable\Elements;
use SnappyRenderer\Renderer;

class DocumentTest extends TestCase
{
    public function testRenderEmpty()
    {
        $doc = new Document('en', 'example');
        $renderer = new Renderer();
        $result = $renderer->render($doc, (object)[]);
        self::assertEquals('<!DOCTYPE html><html lang="en"><head><title>example</title></head><body></body></html>', $result);
    }

    public function testRenderWithContent()
    {
        $doc = new Document('en', 'example');
        $doc->setHead(['head']);
        $doc->setBody(['body']);
        $renderer = new Renderer();
        $result = $renderer->render($doc, (object)[]);
        self::assertEquals('<!DOCTYPE html><html lang="en"><head><title>example</title>head</head><body>body</body></html>', $result);
    }

    public function testShouldWrapComponentInHtmlDoc()
    {
        $renderer = new Renderer(new DocumentStrategy(new Document('en', 'example')));
        $result = $renderer->render(new Elements(['<h1>example</h1>']), (object)[]);
        self::assertEquals('<!DOCTYPE html><html lang="en"><head><title>example</title><slot name="head"></slot></head><body><h1>example</h1></body></html>', $result);
    }

    public function testShouldInsertSlotInHead()
    {
        $renderer = new Renderer(new DocumentStrategy(new Document('en', 'example')));
        $result = $renderer->render([
            new Capture('head', 'test'),
            '<h1>example</h1>',
        ], (object)[]);
        self::assertEquals('<!DOCTYPE html><html lang="en"><head><title>example</title>test</head><body><h1>example</h1></body></html>', $result);
    }
}
