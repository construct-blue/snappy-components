<?php

declare(strict_types=1);

namespace SnappyComponents;

use SnappyRenderer\Renderable;

/**
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input
 */
class Input implements Renderable
{
    /**
     * Types: file
     * Hint for expected file type in file upload controls
     * @var string
     */
    private string $accept;
    /**
     * Types: image
     * alt attribute for the image type. Required for accessibility
     * @var string
     */
    private string $alt;
    /**
     * Types: all except checkbox, radio, and buttons
     * Hint for form autofill feature
     * @var string
     */
    private string $autocomplete;
    /**
     * Types: file
     * Media capture input method in file upload controls
     * @var string
     */
    private string $capture;

    public function render(object $model): iterable
    {
        yield '';
    }
}