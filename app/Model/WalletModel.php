<?php

namespace App\Model;

use App\Core\Cookie;
use App\Core\DatabaseFactory;
use App\Core\Request;
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

    public static function topUp($tien,$tk){

        // sử dụng bên thứ 3 kiểm tra, ở đây mặc định khách hàng luôn nạp đúng số tiền trong thẻ
        $database = DatabaseFactory::getFactory()->getConnection();

        $query2 = $database->prepare("SELECT * FROM khach_hang WHERE email = :matk LIMIT 1");
        $query2->execute([':matk' => $tk]);
        $data = $query2->fetch();

        $sql = "UPDATE `vi_thanh_toan` SET so_du = so_du + ".$tien." WHERE ma_kh = ".$data->ma_kh;
        $query = $database->query($sql);
        $count = $query->rowCount();
        if ($count == 1) {
            return true;
        }
        return false;
    }

    public static function withDraw($tien,$tk){
        $database = DatabaseFactory::getFactory()->getConnection();

        $query2 = $database->prepare("SELECT * FROM khach_hang WHERE email = :matk LIMIT 1");
        $query2->execute([':matk' => $tk]);
        $data = $query2->fetch();

        $sql = "UPDATE `vi_thanh_toan` SET so_du = so_du - ".$tien." WHERE ma_kh = ".$data->ma_kh;
        $query = $database->query($sql);
        $count = $query->rowCount();
        if ($count == 1) {
            return true;
        }
        return false;
        
    }

    public static function payMent($tien,$tk){

        // Trừ tiền trong ví
        $database = DatabaseFactory::getFactory()->getConnection();

        $query2 = $database->prepare("SELECT * FROM khach_hang WHERE email = :matk LIMIT 1");
        $query2->execute([':matk' => $tk]);
        $data = $query2->fetch();

        $sql = "UPDATE `vi_thanh_toan` SET so_du = so_du - ".$tien." WHERE ma_kh = ".$data->ma_kh;
        $query = $database->query($sql);

        // Tích điểm
        $tich_luy = $tien*0.1;
        $query3 = $database->query("UPDATE khach_hang SET diem_tich_luy = diem_tich_luy + ". $tich_luy." WHERE email = :matk LIMIT 1");
        $query3->execute([':matk' => $tk]);
        $count = $query3->RowCount();

        if ($count == 1) {
            return true;
        }
        return false;
        
        
    }

    public static function paymentHistory($ma_vi){
        $database = DatabaseFactory::getFactory()->getConnection();

        $query = $database->prepare("SELECT * FROM lich_su_giao_dich WHERE ma_vi = ".$ma_vi);
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }

    public static function paymentAuto()
    {
        $tk= Request::post('taikhoan');
         $tien =Request::post('tien');
 
        $database = DatabaseFactory::getFactory()->getConnection();

        $query2 = $database->prepare("SELECT * FROM khach_hang WHERE email = :matk LIMIT 1");
        $query2->execute([':matk' => $tk]);
        $data = $query2->fetch();

        $sql = "UPDATE `vi_thanh_toan` SET so_du = so_du - ".$tien." WHERE ma_kh = ".$data->ma_kh;
        $query = $database->query($sql);

        // Tích điểm
        $tich_luy = $tien*0.1;
        $query3 = $database->query("UPDATE khach_hang SET diem_tich_luy = diem_tich_luy + ". $tich_luy." WHERE email = :matk LIMIT 1");
        $query3->execute([':matk' => $tk]);
        $count = $query3->RowCount();

        if ($count == 1) {
            return true;
        }
        return false;
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