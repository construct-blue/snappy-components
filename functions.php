<?php

declare(strict_types=1);

use SnappyComponents\Document;

function v_doc(string $lang, string $title, iterable $head, iterable $body): Document
{
    return new Document($lang, $title, $head, $body);
}
