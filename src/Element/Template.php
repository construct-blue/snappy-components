<?php

declare(strict_types=1);

namespace SnappyComponents\Element;

use SnappyComponents\Element;
use SnappyRenderer\Renderable;

/**
 * @phpstan-import-type element from Renderable
 */
class Template implements Renderable
{
    /**
     * @var element
     */
    private $content;

    /**
     * @param element $content
     */
    public function __construct($content)
    {
        $this->content = $content;
    }

    public function render(object $model): iterable
    {
        yield new Element('template', $this->content);
    }
}