<?php

declare(strict_types=1);

return highlight_string(<<<PHP
<?php

return function() {
    '<h1>Hello world</h1>',
    new SnappyComponents\Capture('head', '<script>console.log("Hello world")</script>'),
    new SnappyComponents\Capture('head', '<script>console.log("Appended")</script>', /** append: */ true),
};
PHP, true);