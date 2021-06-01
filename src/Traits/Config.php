<?php
declare(strict_types=1);

namespace Minimal\Support\Traits;

trait Config
{
    /**
     * 配置数据
     * 主类必须包含该属性
     */
    // protected array $config;

    /**
     * 载入配置
     */
    public function loadConfig(array $config) : static
    {
        $this->config = $config;

        return $this;
    }

    /**
     * 获取配置
     */
    public function getConfig(string|int $name, mixed $default = null) : mixed
    {
        return $this->config[$name] ?? $default;
    }

    /**
     * 获取所有配置
     */
    public function getConfigs() : array
    {
        return $this->config ?? [];
    }

    /**
     * 设置配置
     */
    public function setConfig(string|int $name, mixed $value) : static
    {
        $this->config[$name] = $value;

        return $this;
    }
}