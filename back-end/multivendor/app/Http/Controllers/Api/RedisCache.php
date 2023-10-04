<?php
// Prepend a base path if Predis is not available in your "include_path".


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use DateInterval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use psr\SimpleCache\CacheInterface;

/**
 * Summary of RedisConnection
 */
class RedisCache implements CacheInterface
{

    /**
     * Summary of connect
     * @return void
     */
    function __construct(private readonly \Redis $redis)
    {
    }
    function get($key, $default = null)
    {
    }
    function set(string $key, mixed $value, null|int|DateInterval $ttl = null): bool
    {
    }

    function delete(string $key): bool
    {
        return false;
    }

    function getMultiple(iterable $keys, ?mixed $default = null): iterable
    {
    }
    function setMultiple(iterable $values, null|int|DateInterval $ttl = null): bool
    {
    }
    function deleteMultiple(iterable $keys): bool
    {
    }
    function has(string $key): bool
    {
    }

    function clear(): bool
    {

    }
}
