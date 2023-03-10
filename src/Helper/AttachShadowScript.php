<?php

declare(strict_types=1);

namespace SnappyComponents\Helper;

use SnappyComponents\Element\Script;
use SnappyRenderer\Renderable;

class AttachShadowScript implements Renderable
{
    public function render(object $model): iterable
    {
        yield new Script(
            <<<JS
var e = document.currentScript.parentElement;
if (!e.shadowRoot) {
    e.attachShadow({mode: "open"}).appendChild(e.firstElementChild.content);
}
JS
        );
    }
}