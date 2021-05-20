<?php
declare(strict_types=1);

namespace Minimal\Support\Traits;

trait Alias
{
    /**
     * 别名集合
     */
    protected array $aliases = [];

    /**
     * 设置别名
     */
    public function setAlias(string $key, string $value) : void
    {
        if ($key != $value) {
            $this->aliases[$key] = $value;
        }
    }

    /**
     * 是否存在指定别名
     */
    public function hasAlias(string $key) : bool
    {
        return isset($this->aliases[$key]);
    }

    /**
     * 获取所有别名
     */
    public function getAliases() : array
    {
        return $this->aliases;
    }

    /**
     * 获取别名
     */
    public function getAlias(string $key) : string
    {
        return $this->hasAlias($key)
            ? $this->getAlias($this->aliases[$key])
            : $key;
    }
}