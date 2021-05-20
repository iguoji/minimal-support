<?php
declare(strict_types=1);

namespace Minimal\Support;

/**
 * 文件类
 */
class File
{
    /**
     * 获取文件类型信息
     */
    public static function mimeType(string $filename) : string
    {
        $finfo = finfo_open(FILEINFO_MIME_TYPE);

        return finfo_file($finfo, $filename);
    }
}