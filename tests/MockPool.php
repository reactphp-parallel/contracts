<?php

declare(strict_types=1);

namespace ReactParallel\Tests\Contracts;

use Closure;
use React\Promise\PromiseInterface;
use WyriHaximus\PoolInfo\PoolInfoInterface;

use function React\Promise\resolve;

final class MockPool implements PoolInfoInterface
{
    /** @return iterable<string, int> */
    public function info(): iterable
    {
        yield from [];
    }

    /**
     * @param (Closure():(PromiseInterface<T>|T)) $callable
     * @param array<mixed>                        $args
     *
     * @return PromiseInterface<T>
     *
     * @template T
     */
    public function run(Closure $callable, array $args = []): PromiseInterface
    {
        return resolve($callable(...$args));
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
