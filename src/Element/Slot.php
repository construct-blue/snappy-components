<?php

declare(strict_types=1);

namespace SnappyComponents\Element;

use SnappyComponents\Element;
use SnappyRenderer\Renderable;

/**
 * @phpstan-import-type element from Renderable
 */
class Slot implements Renderable
{
    private string $name;

    /**
     * @var null|element
     */
    private $content;

    /**
     * @param string $name
     * @param null|element $content
     */
    public function __construct(string $name, $content = null)
    {
        $this->name = $name;
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    public function render(object $model): iterable
    {
        $element = new Element('slot', $this->content ?? '');
        $element->setAttribute('name', $this->name);
        yield $element;
    }
}