<?php

declare(strict_types=1);

namespace SnappyComponents;

use SnappyRenderer\Renderable;

class Document implements Renderable
{
    private string $lang;
    private string $title;
    private iterable $head = [];
    private iterable $body = [];

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
     * @param iterable $body
     */
    public function setBody(iterable $body): void
    {
        $this->body = $body;
    }

    /**
     * @param iterable $head
     */
    public function setHead(iterable $head): void
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