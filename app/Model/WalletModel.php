<?php

namespace App\Model;

use App\Core\Cookie;
use App\Core\DatabaseFactory;
use PDO;

class WalletModel{
    public static function bankConnection($makh){

        // Sử dụng bên thứ 3 để kết nối ngân hàng, ở đây sẽ mặc định là khách hàng điền đúng thông tin
        $database = DatabaseFactory::getFactory()->getConnection();
        $query = $database->prepare("SELECT * FROM khach_hang WHERE email = :matk LIMIT 1");
        $query->execute([':matk' => $makh]);

        $data = $query->fetch();
        $sql = "INSERT INTO `vi_thanh_toan`(`ma_kh`, `so_du`) VALUES (".$data->ma_kh.",0)";
        
        $query2 = $database->query($sql);
        $count = $query2->rowCount();
        if ($count == 1) {
            return true;
        }
        return false;
    }

    public static function topUp($tien){

        // sử dụng bên thứ 3 kiểm tra, ở đây mặc định khách hàng luôn nạp đúng số tiền trong thẻ
        $database = DatabaseFactory::getFactory()->getConnection();
        $sql = "UPDATE `vi_thanh_toan` SET so_du = ".$tien;
        $query = $database->query($sql);
        $count = $query->rowCount();
        if ($count == 1) {
            return true;
        }
        return false;
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
        $query = $database->prepare("SELECT * FROM khach_hang WHERE ma_tk = :matk LIMIT 1");
        $query->execute([':matk' => $email]);

        $data = $query->fetch();

        $query = $database->prepare("SELECT * FROM vi_thanh_toan vi  WHERE ma_kh = :ma_kh LIMIT 1");
        $query->execute([':ma_kh' => $data->ma_kh]);

        if($data = $query->fetch()){
            return $data;
        } 
        return null;
        
    }

    public static function getList(){
        $database = DatabaseFactory::getFactory()->getConnection();

        

        $query = $database->prepare("SELECT * FROM hang_khach_hang rk WHERE 1  ORDER BY rk.muc_diem ASC");
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }
}