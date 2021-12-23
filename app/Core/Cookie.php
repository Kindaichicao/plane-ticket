<?php

namespace App\Core;

/**
 * Session class
 *
 * Lưu thông tin theo phiên làm việc của user
 */
class Cookie
{

    /**
     *
     * @param mixed $key key
     * @param mixed $value value
     */
    public static function set($key, $value)
    {
        setcookie($key, $value, time() + 60 * 60 * 24 * 5, '/');
    }

    /**
     *
     * @param mixed $key Usually a string
     * @return mixed the key's value or nothing
     */
    public static function get($key)
    {
        if (isset($_COOKIE[$key])) {
            $value = $_COOKIE[$key];

            // filter the value for XSS vulnerabilities
            return Filter::XSSFilter($value);
        }
    }

    /**
     * Hủy cookie (đăng xuất)
     */
    public static function destroy()
    {
        foreach ($_COOKIE as $key => $value) {
            unset($value);
            setcookie($key, '', time() - 3600, '/');
        }
    }


    /**
     * Kiểm tra user đã đăng nhập chưa
     */
    public static function userIsLoggedIn()
    {
        return (self::get('user_logged_in') ? true : false);
    }
}