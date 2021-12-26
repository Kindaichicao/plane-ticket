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

    public static function getPoint($email){
        $database = DatabaseFactory::getFactory()->getConnection();

        $query = $database->prepare("SELECT diem_tich_luy FROM khach_hang WHERE email = :email LIMIT 1");
        $query->execute([':email' => $email]);

        $row = $query->fetch(); 
        return $row->diem_tich_luy;
    }

    public static function checkConnection($email){
        $database = DatabaseFactory::getFactory()->getConnection();

        $query = $database->prepare("SELECT * FROM khach_hang kh, vi_thanh_toan vi  WHERE kh.email = :email AND kh.ma_kh = vi.ma_kh LIMIT 1");
        $query->execute([':email' => $email]);

        if($query->fetch()){
            return true;
        } 
        return false;
        
    }

    public static function getList(){
        $database = DatabaseFactory::getFactory()->getConnection();

        $query = $database->prepare("SELECT * FROM hang_khach_hang rk WHERE 1  ORDER BY rk.muc_diem ASC");
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }
}