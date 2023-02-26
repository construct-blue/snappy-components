<?php

declare(strict_types=1);

return fn() => yield <<<CSS
body {
    font-family: sans-serif;
}
pre {
    padding: 1rem;
    border: 1px solid;
}
CSS;
