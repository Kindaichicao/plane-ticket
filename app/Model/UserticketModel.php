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
    public static function getAirPorts(){
        $database = DatabaseFactory::getFactory()->getConnection();

        $query = $database->prepare("SELECT * FROM san_bay  WHERE trang_thai = 1");
        $query->execute();

        $data = $query->fetchAll();
        $check = true;
        if(!$query){
            $check = false;
        }
        $response = [
            'thanhcong' => $check,
            'data' =>$data,
        ];
        return $response;

    }
}