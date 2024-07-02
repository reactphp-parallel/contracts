<?php

declare(strict_types=1);

use ReactParallel\Tests\Contracts\MockPool;

use function PHPStan\Testing\assertType;

$pool = new MockPool();

assertType('true', $pool->run(static function (): bool {
    return true;
}));

assertType('int<1, max>|true', $pool->run(static function (): bool|int {
    return time() % 2 !== 0 ? true : time();
}));

assertType('int<1, max>|true', $pool->run(static function (int $mod): bool|int {
    return time() % $mod !== 0 ? true : time();
}, [2]));

assertType('bool|int<1, max>', $pool->run(static function (int $mod, bool $yolo): bool|int {
    return time() % $mod !== 0 ? $yolo : time();
}, [2, (time() % 13 !== 0)]));

assertType('bool|non-empty-string', $pool->run(static function (int $mod, bool $yolo, string $oloy): bool|string {
    return time() % $mod !== 0 ? $yolo : $oloy;
}, [2, (time() % 13 !== 0), bin2hex(random_bytes(13))]));
