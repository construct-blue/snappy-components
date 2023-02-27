<?php

declare(strict_types=1);

namespace SnappyComponents;

use SnappyRenderer\Renderable;
use SnappyRenderer\Renderable\Functional;
use SnappyRenderer\Renderable\StringEnumeration;

class DataList implements Renderable
{
    private string $id;

    private array $options;

    /**
     * @param string $id
     * @param array $options
     */
    public function __construct(string $id, array $options)
    {
        $this->id = $id;
        $this->options = $options;
    }

    public function render(object $model): iterable
    {
        yield "<datalist id=\"$this->id\">";
        yield new StringEnumeration(
            $this->options,
            new Functional(
                fn($option) => new Option($option)
            )
        );
        yield '</datalist>';
    }

}