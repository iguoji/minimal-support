<?php
declare(strict_types=1);

namespace Minimal\Support;

/**
 * 集合类
 */
class Collection
{
    /**
     * 数据源
     */
    protected array $dataset = [];

    /**
     * 解析Key
     */
    public function parseKey(string|int $key) : string
    {
        return (string) $key;
    }





    /**
     * 获取所有数据
     */
    public function all() : array
    {
        return $this->dataset;
    }

    /**
     * 获取指定的数据
     */
    public function get(string|int $key, mixed $default = null) : mixed
    {
        return Arr::get($this->dataset, $this->parseKey($key), $default);
    }

    /**
     * 设置指定的数据
     */
    public function set(string|int $key, mixed $value, bool $append = false) : void
    {
        Arr::set($this->dataset, $this->parseKey($key), $value, $append);
    }

    /**
     * 是否存在指定的数据
     */
    public function has(string|int $key) : bool
    {
        return Arr::has($this->dataset, $this->parseKey($key));
    }

    /**
     * 删除指定的数据
     */
    public function delete(string|int $key) : void
    {
        unset($this->dataset[$this->parseKey($key)]);
    }

    /**
     * 删除所有数据
     */
    public function clear() : void
    {
        $this->dataset = [];
    }

    /**
     * 数据自增
     */
    public function inc(string|int $key, int|float $step = 1) : int|float
    {
        $value = $this->get($key, 0);
        $value += $step;
        $this->set($key, $value);

        return $value;
    }

    /**
     * 数据自减
     */
    public function dec(string|int $key, int|float $step = 1) : int|float
    {
        $value = $this->get($key, 0);
        $value -= $step;
        $this->set($key, $value);

        return $value;
    }
}