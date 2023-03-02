<?php

declare(strict_types=1);

namespace SnappyComponents;

use SnappyRenderer\Renderable;

/**
 * The Details disclosure element
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/details
 *
 * @phpstan-import-type element from Renderable
 */
class Details implements Renderable
{
    /**
     * The visible HTML-Content
     * @var element
     */
    private $summary;

    /**
     * The disclosed HTML-Content
     * @var element
     */
    private $content;

    /**
     * This Boolean attribute indicates whether the details — that is, the contents of the &lt;details&gt; element — are currently visible.
     * The details are shown when this attribute exists, or hidden when this attribute is absent.
     * By default this attribute is absent which means the details are not visible.
     *
     * @var bool
     */
    private bool $open = false;

    /**
     * @param element $summary
     * @param element $content
     */
    public function __construct($summary, $content)
    {
        $this->summary = $summary;
        $this->content = $content;
    }

    /**
     * @param bool $open
     * @return Details
     */
    public function setOpen(bool $open): Details
    {
        $this->open = $open;
        return $this;
    }

    public function render(object $model): iterable
    {
        $attributes = '';
        if ($this->open) {
            $attributes .= ' open';
        }
        yield "<details>$attributes";
        yield '<summary>';
        yield $this->summary;
        yield '</summary>';
        yield $this->content;
        yield '</details>';
    }
}