<?php

declare(strict_types=1);

namespace SnappyComponentsTest;

use PHPUnit\Framework\TestCase;
use SnappyComponents\Capture;
use SnappyComponents\HTMLDocument;
use SnappyComponents\Strategy\RenderDocument;
use SnappyRenderer\Renderable\Elements;
use SnappyRenderer\Renderer;

class DocumentTest extends TestCase
{
    public function testRenderEmpty()
    {
        $doc = new HTMLDocument('en', 'example');
        $doc->setViewport('');
        $renderer = new Renderer();
        $result = $renderer->render($doc, (object)[]);
        self::assertEquals(
            '<!DOCTYPE html><html lang="en"><head><title>example</title></head><body></body></html>',
            $result
        );
    }

    public function testRenderWithContent()
    {
        $doc = new HTMLDocument('en', 'example');
        $doc->setViewport('');
        $doc->setHead(['head']);
        $doc->setBody(['body']);
        $renderer = new Renderer();
        $result = $renderer->render($doc, (object)[]);
        self::assertEquals(
            '<!DOCTYPE html><html lang="en"><head><title>example</title>head</head><body>body</body></html>',
            $result
        );
    }

    public function testRenderWithDescription()
    {
        $doc = new HTMLDocument('en', 'example');
        $doc->setViewport('');
        $doc->setDescription('test');
        $renderer = new Renderer();
        $result = $renderer->render($doc, (object)[]);
        self::assertEquals(
            '<!DOCTYPE html><html lang="en"><head><title>example</title><meta name="description" content="test"></head><body></body></html>',
            $result
        );
    }

    public function testShouldWrapComponentInHtmlDoc()
    {
        $doc = new HTMLDocument('en', 'example');
        $doc->setViewport('');
        $renderer = new Renderer(new RenderDocument($doc));
        $result = $renderer->render(new Elements(['<h1>example</h1>']), (object)[]);
        self::assertEquals(
            '<!DOCTYPE html><html lang="en"><head><title>example</title><slot name="head"></slot></head><body><h1>example</h1></body></html>',
            $result
        );
    }

    public function testShouldInsertSlotInHead()
    {
        $doc = new HTMLDocument('en', 'example');
        $doc->setViewport('');
        $renderer = new Renderer(new RenderDocument($doc));
        $result = $renderer->render([
            new Capture('head', 'test'),
            '<h1>example</h1>',
        ], (object)[]);
        self::assertEquals(
            '<!DOCTYPE html><html lang="en"><head><title>example</title>test</head><body><h1>example</h1></body></html>',
            $result
        );
    }
}
