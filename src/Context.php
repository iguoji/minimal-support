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
     * 数据集
     */
    protected static array $dataset = [];

    /**
     * 设置数据
     */
    public static function set(string $key, mixed $data) : void
    {
        if (Coroutine::getCid() == -1) {
            static::$dataset[$key] = $data;
        } else {
            Coroutine::getContext()[$key] = $data;
        }
    }

    /**
     * 获取数据
     */
    public static function get(string $key) : mixed
    {
        if (Coroutine::getCid() == -1) {
            return static::$dataset[$key];
        } else {
            return Coroutine::getContext()[$key];
        }
    }

    /**
     * 是否存在数据
     */
    public static function has(string $key) : bool
    {
        if (Coroutine::getCid() == -1) {
            return isset(static::$dataset[$key]);
        } else {
            return isset(Coroutine::getContext()[$key]);
        }
    }

    /**
     * 移除数据
     */
    public static function del(string $key) : void
    {
        if (Coroutine::getCid() == -1) {
            unset(static::$dataset[$key]);
        } else {
            unset(Coroutine::getContext()[$key]);
        }
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