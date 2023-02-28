<?php

declare(strict_types=1);

return highlight_string(<<<PHP
<?php

return fn() => [
    '<h1>Hello world</h1>',
    yield include 'my-component.php'
];
PHP, true);