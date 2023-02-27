<?php

declare(strict_types=1);

namespace SnappyComponents;

use SnappyRenderer\Renderable;

/**
 * The Document Body element
 */
class Body implements Renderable
{
    private string $lang;

    private $element;

    /**
     * @param string $lang
     * @param $element
     */
    public function __construct(string $lang, $element)
    {
        $this->lang = $lang;
        $this->element = $element;
    }

    public function render(object $model): iterable
    {
        yield "<body lang=\"$this->lang\">";
        yield $this->element;
        yield '</body>';
    }
}