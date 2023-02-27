<?php

declare(strict_types=1);

namespace SnappyComponentsTest;

use SnappyComponents\Capture;
use SnappyComponents\Slot;
use PHPUnit\Framework\TestCase;
use SnappyComponents\SlotStrategy;
use SnappyRenderer\Renderer;
use SnappyRenderer\RenderPipeline;

class SlotTest extends TestCase
{
    public function testShouldRenderCapturesToSlots()
    {
        $renderer = new Renderer(new SlotStrategy(new RenderPipeline()));

        $result = $renderer->render([
            '<head>',
            new Slot('head'),
            '</head>',
            '<body>',
            new Capture('head', ['test']),
            '</body>',
        ], (object)[]);

        $this->assertEquals('<head>test</head><body></body>', $result);
    }
}
