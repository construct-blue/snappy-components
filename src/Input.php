<?php

declare(strict_types=1);

namespace SnappyComponents;

use SnappyRenderer\Renderable;

/**
 * The Input (Form Input) element
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input
 * @phpstan-import-type element from Renderable
 */
class Input implements Renderable
{
    /**
     * Types: file
     *
     * Hint for expected file type in file upload controls
     * @var string
     */
    private string $accept;
    /**
     * Types: image
     *
     * alt attribute for the image type. Required for accessibility
     * @var string
     */
    private string $alt;
    /**
     * Types: all except checkbox, radio, and buttons
     *
     * Hint for form autofill feature
     * @var string
     */
    private string $autocomplete;
    /**
     * Types: file
     *
     * Media capture input method in file upload controls
     * @var string
     */
    private string $capture;

    /**
     * Types: checkbox, radio
     *
     * Whether the command or control is checked
     * @var bool
     */
    private bool $checked = false;

    /**
     * Types: search, text
     *
     * Name of form field to use for sending the element's directionality in form submission
     * @var string
     */
    private string $dirname = '';

    /**
     * Types: all
     *
     * Whether the form control is disabled
     * @var bool
     */
    private bool $disabled = false;

    /**
     * Types: all
     *
     * Associates the control with a form element
     * @var string
     */
    private string $form = '';




    public function render(object $model): iterable
    {
        yield '';
    }
}