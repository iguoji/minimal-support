<?php
declare(strict_types=1);

namespace Minimal\Support;

/**
 * 路径类
 */
class Path
{
    /**
     * 获取规范化的绝对路径
     */
    public static function absolute(string $path) : string
    {
        $path = str_replace(array('/', '\\'), DIRECTORY_SEPARATOR, $path);
        $parts = array_filter(explode(DIRECTORY_SEPARATOR, $path), 'strlen');
        $absolutes = array();
        foreach ($parts as $part) {
            if ('.' == $part) continue;
            if ('..' == $part) {
                array_pop($absolutes);
            } else {
                $absolutes[] = $part;
            }
        }
        return implode(DIRECTORY_SEPARATOR, $absolutes);
    }
}