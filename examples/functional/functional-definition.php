<?php

declare(strict_types=1);

return highlight_string(<<<PHP
<?php

return fn() => yield <<<HTML
<p>The quick brown fox jumps over the lazy dog.</p>
HTML;
PHP, true);