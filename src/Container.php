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

    public static function servicesById(array $servicesById)
    {
        return new self($servicesById);
    }

    public function get($id)
    {
        if (! $this->has($id)) {
            throw ServiceNotFound::byId($id);
        }

        return $this->servicesById[$id];
    }

    public function has($id)
    {
        return isset($this->servicesById[$id]);
    }
}