<?php

declare(strict_types=1);

namespace SnappyComponents\Element;

use SnappyComponents\Element;
use SnappyRenderer\Renderable;

/**
 * @phpstan-import-type element from Renderable
 */
class Html implements Renderable
{
    private string $lang;
    private $content;

    /**
     * @param string $lang
     * @param $content
     */
    public function __construct(string $lang, $content)
    {
        $this->lang = $lang;
        $this->content = $content;
    }
    public function render(object $model): iterable
    {
        $element = new Element('html', $this->content);
        $element->setAttribute('lang', $this->lang);
        yield $element;
    }
}