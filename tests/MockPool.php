<?php

declare(strict_types=1);

namespace ReactParallel\Tests\Contracts;

use Closure;
use parallel\Future;
use ReactParallel\Contracts\PoolInterface;

use function parallel\run;
use function sleep;

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
        $future = run($callable, $args);

        if ($future instanceof Future) {
            while (! $future->done() && ! $future->cancelled()) {
                sleep(1);
            }

            return $future->value();
        }

        return null;
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
