<?php

declare(strict_types=1);

namespace SnappyComponents;

use SnappyRenderer\Renderable;

/**
 * @phpstan-import-type element from Renderable
 */
class Anchor implements Renderable
{
    private string $href;
    /** @var element */
    private $element;

    /**
     * @param string $href
     * @param $element
     */
    public function __construct(string $href, $element)
    {
        $this->href = $href;
        $this->element = $element;
    }

    public function render(object $model): iterable
    {
        yield "<a href=\"$this->href\">";
        yield $this->element;
        yield '</a>';
    }
}