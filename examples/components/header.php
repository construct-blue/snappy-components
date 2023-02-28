<?php

declare(strict_types=1);

return function (string $heading) {
    yield '<header>';
    yield new SnappyComponents\Capture('head', [
        '<style>',
        include 'styles.php',
        '</style>'
    ]);
    yield <<<HTML
<h1>$heading</h1>
HTML;
    yield include 'navigation.php';
    yield '</header>';
};