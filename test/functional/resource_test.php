<?php

declare(strict_types=1);


return function () {
    yield new \SnappyComponents\Resource('test');
    yield 'hello world';
};
