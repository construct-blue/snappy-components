<?php

declare(strict_types=1);

return highlight_string(<<<PHP
<?php

return function() {
    yield '<head>';
    yield new Slot('head');
    yield '</head>';
};
PHP, true);