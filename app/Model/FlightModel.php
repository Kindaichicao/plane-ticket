<?php

namespace App\Model;

use App\Core\Cookie;
use App\Core\DatabaseFactory;
use PDO;

class FlightModel{
    public static function getList($page = 1, $rowsPerPage = 10){
        $limit = $rowsPerPage;
        $offset = $rowsPerPage * ($page - 1);
        $database = DatabaseFactory::getFactory()->getConnection();
        $sql = 'SELECT * FROM chuyen_bay WHERE trang_thai != 0 LIMIT :limit OFFSET :offset';

        $query = $database->prepare($sql);
        $query->bindValue(':limit', $limit, PDO::PARAM_INT);
        $query->bindValue(':offset', $offset, PDO::PARAM_INT);
        $query->execute();

        $data = $query->fetchAll(); // = while( $r=mysqli_fetch_array())

        // data['ten_chuc_vu']
        $sqlsb = "SELECT * FROM san_bay WHERE trang_thai=1";
        $querysb = $database->prepare($sqlsb);
        $querysb->execute();
        $sanbay = $querysb->fetchAll();

        $count = 'SELECT COUNT(ma_chuyen_bay) FROM chuyen_bay WHERE trang_thai != 0';

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

    public static function update(){
        
    }

    public static function delete(){
        
    }

    public static function getFlightline(){
        
    }
}