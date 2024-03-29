<?php

declare(strict_types=1);

namespace ReactParallel\Contracts;

use Closure;
use WyriHaximus\PoolInfo\PoolInfoInterface;

interface PoolInterface extends PoolInfoInterface
{
    /**
     * @param (Closure():T) $callable
     * @param array<mixed>  $args
     *
     * @return T
     *
     * @template T
     */
    public function run(Closure $callable, array $args = []): mixed;

    /**
     * Gently close every thread in the pool.
     *
     * @return bool True on success, or false when for some reason this call has been ignored.
     */
    public function close(): bool;

    /**
     * Kill every thread in the pool.
     *
     * @return bool True on success, or false when for some reason this call has been ignored.
     */
    public function kill(): bool;
}
