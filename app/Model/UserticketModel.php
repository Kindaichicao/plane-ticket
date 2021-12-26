<?php

namespace App\Model;

use App\Core\Cookie;
use App\Core\DatabaseFactory;
use App\Core\Request;
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

    //lấy vé
    public static function getTicket(){

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT v.*, hhk.ten, cb.ma_san_bay_di, cb.ma_san_bay_den, cb.ngay_bay
        from ve v, hang_hang_khong hhk, chuyen_bay cb, hang_dich_vu hdv
        WHERE v.ma_chuyen_bay = cb.ma_chuyen_bay 
        AND cb.ma_hang_hang_khong = hhk.ma_hang_hang_khong
        AND v.ma_hang_hang_khong = hhk.ma_hang_hang_khong 
        AND v.ma_hang_dich_vu = hdv.ma_hang_dich_vu
        "; // limit 0,5
        
        $query = $database->prepare($sql);


        $query->execute();
        $data = $query->fetchAll(); // = while( $r=mysqli_fetch_array())

        $sqlsb = "SELECT * FROM san_bay WHERE trang_thai=1";
        $querysb = $database->prepare($sqlsb);
        $querysb->execute();
        $sanbay = $querysb->fetchAll();
        // data['ten_chuc_vu']

        $count = 'SELECT COUNT(ma_ve) FROM ve WHERE trang_thai = 1';

        $countQuery = $database->query($count);
        $totalRows = $countQuery->fetch(PDO::FETCH_COLUMN); // $totalRows=35

        $response = [
            'data' => $data,
            'sanbay' => $sanbay,
        ];
        return $response; 
    }

    public static function filter($ngayden, $ngaydi, $noiden,$noidi, $gia,$hang){
        $list = UserticketModel::getTicket();
        $listReal = array();
        foreach($list as $value){
            if($value->ngay_di >= $ngaydi && $value->ngay_den >= $ngayden 
            && $value->noi_di == $noidi && $value->noi_den == $noiden
            && $value->ma_hang = $hang && $value->gia_goc <= $gia*1.05){
                array_push($listReal, $value);
            }
        }
        return $listReal;
    }

    public static function sale(){
        $ngayden= Request::post('ngayden');
         $ngaydi =Request::post('ngaydi');
          $noiden =Request::post('noiden');
          $noidi= Request::post('noidi');
           $gia= Request::post('gia');
          $hang= Request::post('hang');
        UserticketModel::filter($ngayden, $ngaydi, $noiden,$noidi, $gia,$hang);
    }

    function cmp($a, $b) {
        return strcmp($a->gia_goc, $b->gia_goc);
    }


    public static function autoBuy(){
        $list = UserticketModel::getTicket();
        usort($list, "cmp");
        WalletModel::paymentAuto();
    }

    public static function create($mahang, $tenhang, $motahang, $loaihang, $ngayban){
        $database = DatabaseFactory::getFactory()->getConnection();
        $sql = 'INSERT INTO `hang_hang_khong` (`ma_hang_hang_khong`, `ten`, `mo_ta`, `loai_hang`, `ngay_ban`, `trang_thai`) VALUES ("'.$mahang.'", "'.$tenhang.'", "'.$motahang.'", "'.$loaihang.'", "'.$ngayban.'", 1)';
        $query = $database->query($sql);
        $count = $query->rowCount();
        if ($count == 1) {
            return true;
        }

        return false;
    }
}