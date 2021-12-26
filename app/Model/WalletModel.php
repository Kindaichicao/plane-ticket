<?php

namespace App\Model;

use App\Core\Cookie;
use App\Core\DatabaseFactory;
use PDO;

class WalletModel{
    public static function bankConnection(){

        // Sử dụng bên thứ 3 để kết nối ngân hàng, ở đây sẽ mặc định là khách hàng điền đúng thông tin

        return true;
    }

    public static function topUp(){

        // sử dụng bên thứ 3 kiểm tra, ở đây mặc định khách hàng luôn nạp đúng số tiền trong thẻ
        return true;
    }

    public static function withdraw(){
        
    }

    public static function payment(){
        
    }

    public static function paymentHistory(){
        
    }
}