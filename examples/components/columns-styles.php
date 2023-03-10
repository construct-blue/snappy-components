<?php

declare(strict_types=1);

return fn() => yield <<<CSS
.columns {
    display: flex;
    gap: 1rem;
}

.columns > div {
    flex-grow: 1;
}

CSS;
