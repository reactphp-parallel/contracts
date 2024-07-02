<?php

declare(strict_types=1);

namespace ReactParallel\Tests\Contracts;

use Closure;
use ReactParallel\Contracts\PoolInterface;

final class MockPool implements PoolInterface
{
    /**
     * {@inheritDoc}
     */
    public function info(): iterable
    {
        yield from [];
    }

    /**
     * {@inheritDoc}
     */
    public function run(Closure $callable, array $args = []): mixed
    {
        return $callable(...$args);
    }

    public function close(): bool
    {
        return true;
    }

    public function kill(): bool
    {
        return true;
    }
}
