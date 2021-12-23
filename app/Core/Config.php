<?php

namespace App\Core;

use Exception;

/**
 * Class hỗ trợ đọc config
 */
class Config
{
    /**
     * static, vì config tạo ra 1 lần và dùng chung, không cần tạo nhiều instance
     */
    public static $config;

    public static function get($key)
    {
        if (!self::$config) {

            $config_file = '../app/Config/config.php';

            if (!file_exists($config_file)) {
                throw new Exception('Không tìm thấy config file ở đường dẫn (app/config/config.php)');
            }

            self::$config = require $config_file;
        }

        return self::$config[$key];
    }
}