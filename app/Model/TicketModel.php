<?php

namespace App\Model;

use App\Core\Cookie;
use App\Core\DatabaseFactory;
use PDO;

class TicketModel{
    public static function create(){

    }

    public static function update(){
        
    }

    public static function delete(){
        
    }

    public static function getTicket(){
        
    }

    public static function getList($page = 1, $rowsPerPage = 10){
        $limit = $rowsPerPage;
        $offset = $rowsPerPage * ($page - 1);

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT v.*, hhk.ten, cb.ma_san_bay_di, cb.ma_san_bay_den, cb.ngay_bay
        from ve v, hang_hang_khong hhk, chuyen_bay cb, hang_dich_vu hdv
        WHERE v.ma_chuyen_bay = cb.ma_chuyen_bay 
        AND cb.ma_hang_hang_khong = hhk.ma_hang_hang_khong
        AND v.ma_hang_hang_khong = hhk.ma_hang_hang_khong 
        AND v.ma_hang_dich_vu = hdv.ma_hang_dich_vu
        and v.trang_thai != 0 LIMIT :limit OFFSET :offset"; // limit 0,5
        
        $query = $database->prepare($sql);

        $query->bindValue(':limit', $limit, PDO::PARAM_INT);
        $query->bindValue(':offset', $offset, PDO::PARAM_INT);

        $query->execute();
        $data = $query->fetchAll(); // = while( $r=mysqli_fetch_array())

        $sqlsb = "SELECT * FROM san_bay WHERE trang_thai=1";
        $querysb = $database->prepare($sqlsb);
        $querysb->execute();
        $sanbay = $querysb->fetchAll();
        // data['ten_chuc_vu']

        $count = 'SELECT COUNT(ma_kh) FROM khach_hang WHERE trang_thai = 1';

        $countQuery = $database->query($count);
        $totalRows = $countQuery->fetch(PDO::FETCH_COLUMN); // $totalRows=35

        $response = [
            'page' => $page,
            'rowsPerPage' => $rowsPerPage,
            'totalPage' => ceil(intval($totalRows) / $rowsPerPage),// 4 trang
            'data' => $data,
            'sanbay' => $sanbay,
        ];
        return $response; 
    }
}