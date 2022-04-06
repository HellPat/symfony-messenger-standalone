<?php

declare(strict_types=1);

namespace Hellpat;


use Psr\Container\ContainerInterface;

/**
 * @psalm-immutable
 */
final class Container implements ContainerInterface
{
    private function __construct(private array $servicesById) {}

    public static function fromArray(array $servicesById): self
    {
        return new self($servicesById);
    }

    public function get($id): mixed
    {
        if (! $this->has($id)) {
            throw ServiceNotFound::byId($id);
        }

        return $this->servicesById[$id];
    }

    public function has($id): bool
    {
        return isset($this->servicesById[$id]);
    }
}
