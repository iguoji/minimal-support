<?php
declare(strict_types=1);

namespace Minimal\Support;

/**
 * 类型
 */
class Type
{
    /**
     * 是否为整数
     */
    public static function isInt(mixed $number) : bool
    {
        if (is_int($number)) {
            return true;
        } else if (is_string($number)) {
            return false !== filter_var($number, FILTER_VALIDATE_INT);
        } else {
            return false;
        }
    }

    /**
     * 转为整数
     */
    public static function int(mixed $number) : array|int
    {
        if (is_scalar($number)) {
            return (int) $number;
        } else if (is_array($number)) {
            return array_map(fn($n) => self::int($n), $number);
        } else {
            return false;
        }
    }

    /**
     * 是否为小数
     */
    public static function isFloat(mixed $number) : bool
    {
        if (is_int($number) || is_float($number)) {
            return true;
        } else if (is_string($number)) {
            return false !== filter_var($number, FILTER_VALIDATE_FLOAT);
        } else {
            return false;
        }
    }

    /**
     * 转为小数
     */
    public static function float(mixed $number, int $decimals = 2) : array|int
    {
        if (is_scalar($number)) {
            return (float) number_format((float) $number, $decimals, '.', '');
        } else if (is_array($number)) {
            return array_map(fn($n) => self::float($n, $decimals), $number);
        } else {
            return 0;
        }
    }

    /**
     * 是否为布尔
     */
    public static function isBool(mixed $value) : bool
    {
        if (is_bool($value)) {
            return true;
        } else if (is_int($value) && in_array($value, [0, 1])) {
            return true;
        } else if (is_string($value) && in_array(strtolower($value), ['0', '1', 'true', 'false'])) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 是否为数组
     */
    public static function isArray(mixed $value) : bool
    {
        return is_array($value);
    }
}