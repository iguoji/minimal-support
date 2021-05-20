<?php
declare(strict_types=1);

namespace Minimal\Support;

use Closure;
use InvalidArgumentException;

/**
 * 驱动管理类
 */
abstract class Manager
{
    /**
     * 驱动列表
     */
    protected array $drivers = [];

    /**
     * 获取一个默认驱动名称
     */
    abstract public function getDefaultDriver() : string;

    /**
     * 获取一个驱动实例
     */
    public function driver(string $driver = null) : mixed
    {
        $driver = $driver ?: $this->getDefaultDriver();

        if (is_null($driver)) {
            throw new InvalidArgumentException(sprintf(
                'Unable to resolve NULL driver for [%s].', static::class
            ));
        }

        if (!isset($this->drivers[$driver])) {
            $this->drivers[$driver] = $this->createDriver($driver);
        }

        return $this->drivers[$driver];
    }

    /**
     * 创建一个新的驱动
     */
    protected function createDriver(string $driver) : mixed
    {
        $method = 'create'.Str::studly($driver).'Driver';

        if (method_exists($this, $method)) {
            return $this->$method();
        }

        throw new InvalidArgumentException("Driver [$driver] not supported.");
    }

    /**
     * 获取驱动列表
     */
    public function getDrivers() : array
    {
        return $this->drivers;
    }

    /**
     * 清空所有已注册的驱动列表
     */
    public function forgetDrivers() : void
    {
        $this->drivers = [];
    }

    /**
     * 未知函数
     */
    public function __call(string $method, array $parameters) : mixed
    {
        return $this->driver()->$method(...$parameters);
    }
}
