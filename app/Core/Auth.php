<?php

namespace App\Core;

use App\Model\PositionModel;

class Auth
{

    // Kiểm tra xem user có đang đang nhập hay không, nếu không thì chuyển hướng sang trang đăng nhập
    public static function checkAuthentication()
    {
        if (!Cookie::userIsLoggedIn()) {
            Redirect::to('auth/login?redirect='  . urlencode($_SERVER['REQUEST_URI']));
        }
    }

    // Kiểm tra xem user có đang đang nhập hay không, nếu có thì chuyển hướng sang trang chủ
    public static function checkNotAuthentication()
    {
        if (Cookie::userIsLoggedIn()) {
            Redirect::home();
        }
    }

    // Cos ther kiem tra quyen ow day
    public static function ktraquyen($maquyen)
    {
        // em dung model 
        // kiem tra user co quyen do ko
        if (Cookie::userIsLoggedIn() && !PositionModel::ktraQuyen($maquyen)) {
                Redirect::home();
        }
        
        
    }
}
