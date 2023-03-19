<?php

declare(strict_types=1);

use SnappyComponents\HTMLDocument;

function v_doc(string $lang, string $title, iterable $head, iterable $body): HTMLDocument
{
    return new HTMLDocument($lang, $title, $head, $body);
}
