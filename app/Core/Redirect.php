<?php

namespace App\Core;

/**
 * Class Redirect
 *
 * Hỗ trợ chuyển hướng trang
 */
class Redirect
{
    /**
     * Điều hướng người dùng về trang trước khi login
     * @param $path string
     */
    public static function toPreviousViewedPageAfterLogin($path)
    {
        header('location: http://' . $_SERVER['HTTP_HOST'] . '/' . $path);
        exit();
    }

    /**
     * Điều hướng người dùng về trang chủ
     */
    public static function home()
    {
        header("location: " . Config::get('URL'));
        exit();
    }

    /**
     * Điều hướng người dùng về trang khác
     *
     * @param $path string
     */
    public static function to($path)
    {
        header("location: " . Config::get('URL') . $path);
        exit();
    }
}
