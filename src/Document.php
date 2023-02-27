<?php

declare(strict_types=1);

namespace SnappyComponents;

use SnappyRenderer\Renderable;

/**
 * @phpstan-import-type element from Renderable
 */
class Document implements Renderable
{
    private string $lang;
    private string $title;
    /** @var element */
    private $head = '';
    /** @var element */
    private $body = '';

    /**
     * @param string $lang
     * @param string $title
     */
    public function __construct(string $lang, string $title)
    {
        $this->lang = $lang;
        $this->title = $title;
    }

    /**
     * @param element $body
     */
    public function setBody($body): void
    {
        $this->body = $body;
    }

    /**
     * @param element $head
     */
    public function setHead($head): void
    {
        $this->head = $head;
    }

    public function render(object $model): iterable
    {
        return [
            '<!DOCTYPE html>',
            "<html lang=\"$this->lang\">",
            '<head>',
            [
                "<title>$this->title</title>",
                $this->head,
            ],
            '</head>',
            '<body>',
            [
                $this->body,
            ],
            '</body>',
        ];
    }
}