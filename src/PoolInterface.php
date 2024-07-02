<?php

declare(strict_types=1);

namespace ReactParallel\Contracts;

use Closure;
use WyriHaximus\PoolInfo\PoolInfoInterface;

interface PoolInterface extends PoolInfoInterface
{
    /**
     * @param (Closure():T)|(Closure(A1):T)|(Closure(A1,A2):T)|(Closure(A1,A2,A3):T)|(Closure(A1,A2,A3,A4):T)|(Closure(A1,A2,A3,A4,A5):T) $callable
     * @param array{}|array{A1}|array{A1,A2}|array{A1,A2,A3}|array{A1,A2,A3,A4}|array{A1,A2,A3,A4,A5}                                     $args
     *
     * @return T
     *
     * @template T
     * @template A1 (any number of function arguments, see https://github.com/phpstan/phpstan/issues/8214)
     * @template A2
     * @template A3
     * @template A4
     * @template A5
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
