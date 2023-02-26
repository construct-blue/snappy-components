<?php

declare(strict_types=1);

return fn(string $file) => [
    yield '<h2>Code</h2>',
    yield '<p>The following is the real source code used to generate this page.</p>',
    yield '<pre>',
    yield highlight_file($file, true),
    yield '</pre>',
];