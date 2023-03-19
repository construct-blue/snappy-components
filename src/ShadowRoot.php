<?php

declare(strict_types=1);

namespace SnappyComponents;

use SnappyComponents\HTML\Template;
use SnappyComponents\Helper\AttachShadowScript;
use SnappyRenderer\Renderable;

/**
 * @phpstan-import-type element from Renderable
 */
class ShadowRoot implements Renderable
{
    private string $tag;

    /**
     * @var element
     */
    private $template;

    /**
     * @var element
     */
    private $content;

    /**
     * @param string $tag
     * @param element $template
     * @param element $content
     */
    public function __construct(string $tag, $template, $content)
    {
        $this->tag = $tag;
        $this->template = $template;
        $this->content = $content;
    }

    public function render(object $model): iterable
    {
        yield new HTMLElement($this->tag, [
            new Template($this->template),
            $this->content,
            new AttachShadowScript(),
        ]);
    }
}