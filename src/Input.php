<?php

declare(strict_types=1);

namespace SnappyComponents;

use SnappyComponents\Helper\Element;
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

    /**
     * Types: image, submit
     *
     * URL to use for form submission
     * @var string
     */
    private string $formaction = '';

    /**
     *
     * Types: image, submit
     *
     * Form data set encoding type to use for form submission
     * @var string
     */
    private string $formenctype = '';

    /**
     * Types: image, submit
     *
     * HTTP method to use for form submission
     * @var string
     */
    private string $formmethod = '';

    /**
     *
     * Types: image, submit
     *
     * Bypass form control validation for form submission
     * @var string
     */
    private string $formnovalidate = '';

    /**
     * Types: image, submit
     *
     * Browsing context for form submission
     * @var string
     */
    private string $formtarget = '';

    /**
     * Types: image
     *
     * Same as height attribute for &lt;img&gt; vertical dimension
     *
     * @var string
     */
    private string $height = '';


    /**
     * Types: all except hidden, password, checkbox, radio, and buttons
     *
     * Value of the id attribute of the &lt;datalist&gt; of autocomplete options
     *
     * @var string
     */
    private string $list = '';

    /**
     * Types: date, month, week, time, datetime-local, number, range
     *
     * Maximum value
     *
     * @var string
     */
    private string $max = '';

    /**
     * Types: text, search, url, tel, email, password
     *
     * Maximum length (number of characters) of $value
     *
     * @var string
     */
    private string $maxlength = '';

    /**
     * Types: date, month, week, time, datetime-local, number, range
     *
     * Minimum value
     *
     * @var string
     */
    private string $min = '';


    /**
     * Types: text, search, url, tel, email, password
     *
     * Minimum length (number of characters) of $value
     *
     * @var string
     */
    private string $minlength = '';

    /**
     * Types: email, file
     *
     * Boolean. Whether to allow multiple values
     *
     * @var bool
     */
    private bool $multiple = false;

    /**
     * Types: all
     *
     * Name of the form control. Submitted with the form as part of a name/value pair
     *
     * @var string
     */
    private string $name = '';

    /**
     * Types: text, search, url, tel, email, password
     *
     * Pattern the $value must match to be valid
     *
     * @var string
     */
    private string $pattern = '';

    /**
     * Types: text, search, url, tel, email, password, number
     *
     * Text that appears in the form control when it has no value set
     *
     * @var string
     */
    private string $placeholder = '';

    /**
     * Types: all except hidden, range, color, checkbox, radio, and buttons
     *
     * Boolean. The value is not editable
     *
     * @var bool
     */
    private bool $readonly = false;

    /**
     * Types: all except hidden, range, color, and buttons
     *
     * Boolean. A value is required or must be check for the form to be submittable
     *
     * @var bool
     */
    private bool $required = false;

    /**
     * Types: text, search, url, tel, email, password
     *
     * Size of the control
     *
     * @var string
     */
    private string $size = '';

    /**
     * Types: image
     *
     * Same as src attribute for &lt;img&gt; address of image resource
     *
     * @var string
     */
    private string $src = '';

    /**
     * Types: date, month, week, time, datetime-local, number, range
     *
     * Incremental values that are valid
     *
     * @var string
     */
    private string $step = '';

    /**
     * Types: all
     *
     * Type of form control
     *
     * @var string
     */
    private string $type = '';

    /**
     * Types: all except image
     *
     * The initial value of the control
     *
     * @var string
     */
    private string $value = '';

    /**
     * Types: image
     *
     * Same as width attribute for &lt;img&gt;
     *
     * @var string
     */
    private string $width = '';

    public function render(object $model): iterable
    {
        $element = new Element('input', '');
        foreach ($this as $key => $value) {
            if (is_bool($value)) {
                $element->toggleAttribute($key, $value);
            } else {
                $element->setAttribute($key, $value);
            }
        }
        yield $element;
    }
}