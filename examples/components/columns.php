<?php

declare(strict_types=1);

use SnappyComponents\Capture;

return function (...$element){
    yield new Capture('head', [
        '<style>',
        include 'columns-styles.php',
        '</style>'
    ]);
    yield '<div class="columns">';
    yield $element;
    yield '</div>';
};