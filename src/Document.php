<?php

declare(strict_types=1);

namespace SnappyComponents;

use SnappyComponents\Element\Body;
use SnappyComponents\Element\Head;
use SnappyComponents\Element\Html;
use SnappyComponents\Element\Meta;
use SnappyComponents\Element\Title;
use SnappyRenderer\Renderable;

/**
 * @phpstan-import-type element from Renderable
 */
class Document implements Renderable
{
    public const DEFAULT_VIEWPORT = 'width=device-width, initial-scale=1';

    private string $lang;
    private string $title;
    private string $description = '';
    private string $charset = '';
    private string $viewport = '';

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
        $this->viewport = self::DEFAULT_VIEWPORT;
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

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @param string $lang
     */
    public function setLang(string $lang): void
    {
        $this->lang = $lang;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @param string $charset
     */
    public function setCharset(string $charset): void
    {
        $this->charset = $charset;
    }

    /**
     * @param string $viewport
     */
    public function setViewport(string $viewport): void
    {
        $this->viewport = $viewport;
    }

    public function render(object $model): iterable
    {
        yield '<!DOCTYPE html>';
        yield new Html(
            $this->lang,
            [
                new Head([
                    new Title($this->title),
                    function () {
                        if ($this->charset !== '') {
                            yield new Meta(['charset' => $this->charset]);
                        }
                        if ($this->viewport !== '') {
                            yield new Meta(['name' => 'viewport', 'content' => $this->viewport]);
                        }
                        if ($this->description !== '') {
                            yield new Meta(['name' => 'description', 'content' => $this->description]);
                        }
                    },
                    $this->head
                ]),
                new Body($this->body)
            ]
        );
    }
}