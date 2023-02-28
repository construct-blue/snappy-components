<?php

declare(strict_types=1);

namespace SnappyComponents;

use SnappyRenderer\Renderable;

/**
 * The Button element
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/button
 * @phpstan-import-type element from Renderable
 */
class Button implements Renderable
{
    /**
     * The inner HTML-Content
     *
     * @var element
     */
    private $element;

    /**
     * This Boolean attribute specifies that the button should have input focus when the page loads. Only one element in a document can have this attribute.
     * @var bool
     */
    private bool $autofocus = false;

    /**
     * This attribute on a &lt;button&gt; is nonstandard and Firefox-specific. Unlike other browsers, Firefox persists the dynamic disabled state of a &lt;button&gt; across page loads. Setting autocomplete="off" on the button disables this feature; see Firefox bug 654072.
     *
     * @var string
     */
    private string $autocomplete = '';

    /**
     * This Boolean attribute prevents the user from interacting with the button: it cannot be pressed or focused.
     * Firefox, unlike other browsers, persists the dynamic disabled state of a &lt;button&gt; across page loads. Use the autocomplete attribute to control this feature.
     *
     * @var bool
     */
    private bool $disabled = false;

    /**
     * The &lt;form&gt; element to associate the button with (its form owner). The value of this attribute must be the id of a &lt;form&gt; in the same document. (If this attribute is not set, the &lt;button&gt; is associated with its ancestor &lt;form&gt; element, if any.)
     * This attribute lets you associate &lt;button&gt; elements to &lt;form&gt;s anywhere in the document, not just inside a &lt;form&gt;. It can also override an ancestor &lt;form&gt; element.
     *
     * @var string
     */
    private string $form = '';

    /**
     * The URL that processes the information submitted by the button. Overrides the action attribute of the button's form owner. Does nothing if there is no form owner.
     *
     * @var string
     */
    private string $formaction = '';
    /**
     *
     * If the button is a submit button (it's inside/associated with a &lt;form&gt; and doesn't have type="button"), specifies how to encode the form data that is submitted. Possible values:
     *  - application/x-www-form-urlencoded: The default if the attribute is not used.
     *  - multipart/form-data: Used to submit &lt;input&gt; elements with their type attributes set to file.
     *  - text/plain: Specified as a debugging aid; shouldn't be used for real form submission.
     *
     * If this attribute is specified, it overrides the enctype attribute of the button's form owner.
     *
     * @var string
     */
    private string $formenctype = '';

    /**
     *
     * If the button is a submit button (it's inside/associated with a &lt;form&gt; and doesn't have type="button"), this attribute specifies the HTTP method used to submit the form. Possible values:
     *
     *  - post: The data from the form are included in the body of the HTTP request when sent to the server. Use when the form contains information that shouldn't be public, like login credentials.
     *  - get: The form data are appended to the form's action URL, with a ? as a separator, and the resulting URL is sent to the server. Use this method when the form has no side effects, like search forms.
     *
     * If specified, this attribute overrides the method attribute of the button's form owner.
     *
     * @var string
     */
    private string $formmethod = '';

    /**
     * If the button is a submit button, this Boolean attribute specifies that the form is not to be validated when it is submitted. If this attribute is specified, it overrides the novalidate attribute of the button's form owner.
     *
     * This attribute is also available on &lt;input type="image"&gt; and &lt;input type="submit"&gt; elements.
     *
     * @var bool
     */
    private bool $formnovalidate = false;
    /**
     * If the button is a submit button, this attribute is an author-defined name or standardized, underscore-prefixed keyword indicating where to display the response from submitting the form. This is the name of, or keyword for, a browsing context (a tab, window, or &lt;iframe&gt;). If this attribute is specified, it overrides the target attribute of the button's form owner. The following keywords have special meanings:
     *
     * - _self: Load the response into the same browsing context as the current one. This is the default if the attribute is not specified.
     * - _blank: Load the response into a new unnamed browsing context — usually a new tab or window, depending on the user's browser settings.
     * - _parent: Load the response into the parent browsing context of the current one. If there is no parent, this option behaves the same way as _self.
     * - _top: Load the response into the top-level browsing context (that is, the browsing context that is an ancestor of the current one, and has no parent). If there is no parent, this option behaves the same way as _self.
     *
     * @var string
     */
    private string $formtarget = '';

    /**
     * The name of the button, submitted as a pair with the button's value as part of the form data, when that button is used to submit the form.
     *
     * @var string
     */
    private string $name = '';

    /**
     * The default behavior of the button. Possible values are:
     *
     * - submit: The button submits the form data to the server. This is the default if the attribute is not specified for buttons associated with a &lt;form&gt;, or if the attribute is an empty or invalid value.
     * - reset: The button resets all the controls to their initial values, like &lt;input type="reset"&gt;. (This behavior tends to annoy users.)
     * - button: The button has no default behavior, and does nothing when pressed by default. It can have client-side scripts listen to the element's events, which are triggered when the events occur.
     *
     * @var string
     */
    private string $type = '';

    /**
     * Defines the value associated with the button's name when it's submitted with the form data. This value is passed to the server in params when the form is submitted using this button.
     * 
     * @var string 
     */
    private string $value = '';

    /**
     * @param $element
     */
    public function __construct($element)
    {
        $this->element = $element;
    }

    /**
     * @param mixed $element
     * @return Button
     */
    public function setElement($element)
    {
        $this->element = $element;
        return $this;
    }

    /**
     * @param bool $autofocus
     * @return Button
     */
    public function setAutofocus(bool $autofocus): Button
    {
        $this->autofocus = $autofocus;
        return $this;
    }

    /**
     * @param string $autocomplete
     * @return Button
     */
    public function setAutocomplete(string $autocomplete): Button
    {
        $this->autocomplete = $autocomplete;
        return $this;
    }

    /**
     * @param bool $disabled
     * @return Button
     */
    public function setDisabled(bool $disabled): Button
    {
        $this->disabled = $disabled;
        return $this;
    }

    /**
     * @param string $form
     * @return Button
     */
    public function setForm(string $form): Button
    {
        $this->form = $form;
        return $this;
    }

    /**
     * @param string $formaction
     * @return Button
     */
    public function setFormaction(string $formaction): Button
    {
        $this->formaction = $formaction;
        return $this;
    }

    /**
     * @param string $formenctype
     * @return Button
     */
    public function setFormenctype(string $formenctype): Button
    {
        $this->formenctype = $formenctype;
        return $this;
    }

    /**
     * @param string $formmethod
     * @return Button
     */
    public function setFormmethod(string $formmethod): Button
    {
        $this->formmethod = $formmethod;
        return $this;
    }

    /**
     * @param bool $formnovalidate
     * @return Button
     */
    public function setFormnovalidate(bool $formnovalidate): Button
    {
        $this->formnovalidate = $formnovalidate;
        return $this;
    }

    /**
     * @param string $formtarget
     * @return Button
     */
    public function setFormtarget(string $formtarget): Button
    {
        $this->formtarget = $formtarget;
        return $this;
    }

    /**
     * @param string $name
     * @return Button
     */
    public function setName(string $name): Button
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param string $type
     * @return Button
     */
    public function setType(string $type): Button
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @param string $value
     * @return Button
     */
    public function setValue(string $value): Button
    {
        $this->value = $value;
        return $this;
    }

    public function render(object $model): iterable
    {
        $attributes = '';

        if ($this->autofocus) {
            $attributes .= ' autofocus';
        }
        if ($this->autocomplete !== '') {
            $attributes .= $this->buildStringAttribute('autocomplete', $this->autocomplete);
        }
        if ($this->disabled) {
            $attributes .= ' disabled';
        }
        if ($this->form !== '') {
            $attributes .= $this->buildStringAttribute('form', $this->form);
        }
        if ($this->formaction !== '') {
            $attributes .= $this->buildStringAttribute('formaction', $this->formaction);
        }
        if ($this->formenctype !== '') {
            $attributes .= $this->buildStringAttribute('formenctype', $this->formenctype);
        }
        if ($this->formmethod !== '') {
            $attributes .= $this->buildStringAttribute('formmethod', $this->formmethod);
        }
        if ($this->formnovalidate) {
            $attributes .= ' formnovalidate';
        }
        if ($this->formtarget !== '') {
            $attributes .= $this->buildStringAttribute('formtarget', $this->formtarget);
        }
        if ($this->name !== '') {
            $attributes .= $this->buildStringAttribute('name', $this->name);
        }
        if ($this->type !== '') {
            $attributes .= $this->buildStringAttribute('type', $this->type);
        }
        if ($this->value !== '') {
            $attributes .= $this->buildStringAttribute('value', $this->value);
        }

        yield "<button$attributes>";
        yield $this->element;
        yield "</button>";
    }

    private function buildStringAttribute(string $key, string $value): string
    {
        return " $key=\"$value\"";
    }
}