<?php

namespace App\Core;

/**
 * Session class
 *
 * Lưu thông tin theo phiên làm việc của user
 */
class Session
{
    /**
     * starts the session
     */
    public static function init()
    {
        // Nếu chưa có session thì khởi tạo session
        if (session_id() == '') {
            session_start();
        }
    }

    /**
     *
     * @param mixed $key key
     * @param mixed $value value
     */
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     *
     * @param mixed $key Usually a string
     * @return mixed the key's value or nothing
     */
    public static function get($key)
    {
        if (isset($_SESSION[$key])) {
            $value = $_SESSION[$key];

            // filter the value for XSS vulnerabilities
            return Filter::XSSFilter($value);
        }
    }

    /**
     * @param mixed $key
     * @param mixed $value
     */
    public static function add($key, $value)
    {
        $_SESSION[$key][] = $value;
    }

    // Nếu có $key thì kiểm tra có lỗi ở key đó không
    // Nếu không có $key thì kiểm tra có ít nhất 1 lỗi hay không
    public static function hasError($key = null)
    {
        if ($key) {
            if (Session::getError($key, false)) {
                return true;
            }
            return false;
    
        } else {
            if (isset($_SESSION['errors']) && count($_SESSION['errors'])) {
                return true;
            }
            return false;

        }
    }

    public static function getError($key, $remove = true)
    {
        if (isset($_SESSION['errors'][$key])) {
            $value = $_SESSION['errors'][$key];
            if ($remove) {
                unset($_SESSION['errors'][$key]);
            }
            // filter the value for XSS vulnerabilities
            return Filter::XSSFilter($value);
        }
    }

    public static function addError($key, $value)
    {
        $_SESSION['errors'][$key] = $value;
    }


    public static function destroy()
    {
        session_destroy();
    }

}