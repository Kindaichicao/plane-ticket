<?php

namespace App\Config;

// Cấu hình hiển thị error, khi nào deploy thì tắt display_errors = 0
error_reporting(E_ALL);
ini_set("display_errors", 1);

return array(
    'URL' => 'http://' . $_SERVER['HTTP_HOST'] . str_replace('public', '', dirname($_SERVER['SCRIPT_NAME'])),
    'PATH_CONTROLLER' => realpath(dirname(__FILE__).'/../../') . '/app/Controller/',
    'PATH_VIEW' => realpath(dirname(__FILE__).'/../../') . '/app/View/',
    'DEFAULT_CONTROLLER' => 'index',
    'DEFAULT_ACTION' => 'index',
    // Cấu hình db
    'DB_TYPE' => 'mysql',
    'DB_HOST' => 'localhost',
    'DB_NAME' => 'flight_management',
    'DB_USER' => 'root',
    'DB_PASS' => '',
    'DB_PORT' => '3306',
    'DB_CHARSET' => 'utf8',
);