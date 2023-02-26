<?php

declare(strict_types=1);

namespace SnappyComponentsTest;

use SnappyComponents\Document;
use PHPUnit\Framework\TestCase;
use SnappyComponents\DocumentStrategy;
use SnappyRenderer\Renderable\RenderableIterable;
use SnappyRenderer\Renderer;

class DocumentStrategyTest extends TestCase
{
    public function testShouldWrapComponentInHtmlDoc()
    {
        $renderer = new Renderer(new DocumentStrategy(new Document('en', 'example')));
        $result = $renderer->render(new RenderableIterable(['<h1>example</h1>']), (object)[]);
        self::assertEquals('<!DOCTYPE html><html lang="en"><head><title>example</title></head><body><h1>example</h1></body>', $result);
    }
}
