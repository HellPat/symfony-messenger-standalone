<?php

declare(strict_types=1);

namespace Hellpat;


use Exception;
use Psr\Container\NotFoundExceptionInterface;

final class ServiceNotFound extends Exception implements NotFoundExceptionInterface
{
    public static function byId(string $id): self
    {
        return new self(sprintf('Message bus "%s" not found.', $id));
    }
}