<?php

declare(strict_types=1);

namespace SnappyComponentsTest;

use SnappyComponents\ResourceStrategy;
use PHPUnit\Framework\TestCase;
use SnappyRenderer\Renderable\RenderableIterable;
use SnappyRenderer\Renderer;
use SnappyRenderer\RenderPipeline;
use SnappyRenderer\Strategy\Pipeline\Pipe;

class ResourceStrategyTest extends TestCase
{
    public function testShouldCollectNamesFromFunctionalComponents()
    {
        $renderable = new RenderableIterable([include 'functional/resource_test.php']);
        $strategy = new ResourceStrategy(new RenderPipeline());
        $renderer = new Renderer($strategy);
        $result = $renderer->render($renderable, (object)[]);
        self::assertEquals('hello world', $result);
        self::assertEquals(['test'], $strategy->getResources());
    }
}
