<?php

declare(strict_types=1);

namespace SnappyComponentsTest;

use SnappyComponents\ResourceStrategy;
use PHPUnit\Framework\TestCase;
use SnappyRenderer\Renderable\RenderableIterable;
use SnappyRenderer\Renderer;
use SnappyRenderer\Strategy\Pipeline\Pipe;

class ResourceStrategyTest extends TestCase
{
    public function testShouldCollectNamesFromFunctionalComponents()
    {
        $renderable = new RenderableIterable([include 'functional/resource_test.php']);
        $strategy = new ResourceStrategy(new Pipe());
        $renderer = new Renderer($strategy);
        $renderer->render($renderable, (object)[]);
        $this->assertEquals(['test'], $strategy->getResources());
    }
}
