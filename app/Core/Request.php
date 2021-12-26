<?php

namespace App\Core;

/**
 * Hỗ trợ thao tác với $_GET, $_POST và $_COOKIE.
 */
class Request
{
    /**
     * Return giá trị của key ở biến POST
     * Mặc định giá trị trả về sẽ được lọc những php tag và html tag, khoảng trắng dư thừa
     * Request::post('x', false) sẽ trả về giá trị chưa được lọc
     *
     * @param mixed $key key
     * @param bool $clean tùy chọn làm sạch giá trị trả về
     * @return mixed giá trị của key hoặc null
     */
    public static function post($key, $clean = true)
    {
        if (!isset($_POST[$key])) {
            return null;
        }

        if ($clean) {
            return strip_tags(trim($_POST[$key]));
        }

        return $_POST[$key];
    }

    /**
     * Return trạng thái của checkbox
     *
     * @param mixed $key key
     * @return mixed trạng thái của checkbox
     */
    public static function postCheckbox($key)
    {
        return isset($_POST[$key]) ? 1 : 0;
    }

    /**
     * Return giá trị của key ở biến GET (URL)
     * @param mixed $key key
     * @return mixed giá trị của key hoặc giá trị default (null)
     */
    public static function get($key, $default = null)
    {
        if (isset($_GET[$key])) {
            return $_GET[$key];
        }

        if(isset($default)) {
            return $default;
        }

        return null;
    }

    /**
     * Return giá trị của key ở biến COOKIE
     * @param mixed $key key
     * @return mixed giá trị của key hoặc null
     */
    public static function cookie($key)
    {
        if (isset($_COOKIE[$key])) {
            return $_COOKIE[$key];
        }
        return null;
    }

    public static function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}