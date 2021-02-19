<?php

declare(strict_types=1);

namespace Hellpat;


final class AsyncTextMessage
{
    public bool $willThrowAnException = false;

    public function __construct(public string $message) {}
}