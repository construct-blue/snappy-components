<?php

declare(strict_types=1);

namespace SnappyComponents;

use SnappyRenderer\Renderable;

/**
 * @phpstan-import-type element from Renderable
 */
class Style implements Renderable
{
    /**
     * @var element
     */
    private $css;

    public function __construct($css)
    {
        $this->css = $css;
    }

    public function render(object $model): iterable
    {
        yield '<style>';
        yield $this->css;
        yield '</style>';
    }
}