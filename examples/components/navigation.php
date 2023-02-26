<?php

declare(strict_types=1);

return fn() => yield <<<HTML
<ul>
<li><a href="/basics.php">Basics</a></li>
<li><a href="/functional-components.php">Functional Components</a></li>
<li><a href="/class-components.php">Class Components</a></li>
</ul>
HTML;
