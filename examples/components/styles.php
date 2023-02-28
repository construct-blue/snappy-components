<?php

declare(strict_types=1);

return fn() => yield <<<CSS

body {
    font-family: sans-serif;
    margin: 0;
    padding: 0;
}
header {
    padding: 1rem;
    margin-bottom: 1rem;
    background: #e9e9e9;
}
pre {
    padding: 1rem;
    border: 1px solid;
}
CSS;
