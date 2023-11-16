<?php

declare(strict_types=1);

use ReactParallel\Tests\Contracts\MockPool;

use function PHPStan\Testing\assertType;

$pool = new MockPool();

assertType('React\Promise\PromiseInterface<bool>', $pool->run(static function (): bool {
    return true;
}));

assertType('React\Promise\PromiseInterface<bool|int>', $pool->run(static function (): bool|int {
    return time() % 2 !== 0 ? true : time();
}));
