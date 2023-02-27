<?php

declare(strict_types=1);

namespace SnappyComponents;

use SnappyRenderer\Renderable;

class Slot implements Renderable
{
    private string $code;

    private Capture $capture;

    /**
     * @param string $code
     */
    public function __construct(string $code)
    {
        $this->code = $code;
    }

    /**
     * @param Capture $capture
     */
    public function setCapture(Capture $capture): void
    {
        $this->capture = $capture;
    }

    public function render(object $model): iterable
    {
        return [$this->capture ?? ''];
    }
}