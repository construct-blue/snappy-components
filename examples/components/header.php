<?php

declare(strict_types=1);

return function () {
    yield '<header>';
    yield new SnappyComponents\Capture('head', [
        '<style>',
        include 'styles.php',
        '</style>'
    ]);
    yield <<<HTML
<h1>Snappy Components</h1>
HTML;
    yield include 'navigation.php';
    yield '</header>';
};