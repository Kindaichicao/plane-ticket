<?php

namespace App\Model;

use App\Core\Cookie;
use App\Core\DatabaseFactory;
use PDO;

class UserticketModel{
    public static function payment($taikhoan)
    {
        // với trường hợp thanh toán bằng thẻ ngân hàng ta sẽ sử dụng dịch vụ tích hợp thanh toán Stripe
        // mặc định khách hàng luôn đủ tiền
        return true;
    }
}