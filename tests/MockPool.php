<?php

declare(strict_types=1);

namespace ReactParallel\Tests\Contracts;

use Closure;
use WyriHaximus\PoolInfo\PoolInfoInterface;

final class MockPool implements PoolInfoInterface
{
    /** @return iterable<string, int> */
    public function info(): iterable
    {
        yield from [];
    }

    /**
     * @param (Closure():T) $callable
     * @param array<mixed>  $args
     *
     * @return T
     *
     * @template T
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
