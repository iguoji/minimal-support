<?php
declare(strict_types=1);

namespace Minimal\Support;

use Swoole\Coroutine;

/**
 * 协程上下文
 */
class Context
{
    /**
     * 设置数据
     */
    public static function set(string $key, mixed $data) : void
    {
        Coroutine::getContext()[$key] = $data;
    }

    /**
     * 获取数据
     */
    public static function get(string $key) : mixed
    {
        return Coroutine::getContext()[$key];
    }

    /**
     * 是否存在数据
     */
    public static function has(string $key) : bool
    {
        return isset(Coroutine::getContext()[$key]);
    }

    /**
     * 移除数据
     */
    public static function del(string $key)
    {
        unset(Coroutine::getContext()[$key]);
    }

    /**
     * 自增数据
     */
    public static function incr(string $key, int $num = 1) : int
    {
        $value = intval(self::has($key) ? self::get($key) : 0);
        $value += $num;
        self::set($key, $value);
        return $value;
    }

    /**
     * 自减数据
     */
    public static function decr(string $key, int $num = 1) : int
    {
        $value = intval(self::has($key) ? self::get($key) : 0);
        $value -= $num;
        self::set($key, $value);
        return $value;
    }
}