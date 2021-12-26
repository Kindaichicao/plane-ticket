<?php

namespace App\Config;

// Cấu hình hiển thị error, khi nào deploy thì tắt display_errors = 0
error_reporting(E_ALL);
ini_set("display_errors", 1);

return array(
    // Cấu hình db
    'DB_TYPE' => 'mysql',
    'DB_HOST' => 'localhost',
    'DB_NAME' => 'flight_management',
    'DB_USER' => 'root',
    'DB_PASS' => '',
    'DB_PORT' => '3306',
    'DB_CHARSET' => 'utf8',
);