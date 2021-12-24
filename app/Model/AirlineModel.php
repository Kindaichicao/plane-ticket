<?php

namespace App\Model;

use App\Core\Cookie;
use App\Core\DatabaseFactory;
use PDO;

class AirlineModel{
    public static function create(){

    }

    public static function update(){
        
    }

    public static function delete(){
        
    }

    public static function getAirline(){
        
    }

        public static function getList($page = 1, $rowsPerPage = 10){
            $limit = $rowsPerPage;
            $offset = $rowsPerPage * ($page - 1);
    
            $database = DatabaseFactory::getFactory()->getConnection();
    
            $sql = "SELECT * from hang_hang_khong WHERE trang_thai = 1 LIMIT :limit OFFSET :offset"; // limit 0,5
    
            $query = $database->prepare($sql);
    
            $query->bindValue(':limit', $limit, PDO::PARAM_INT);
            $query->bindValue(':offset', $offset, PDO::PARAM_INT);
    
            $query->execute();
            $data = $query->fetchAll(); // = while( $r=mysqli_fetch_array())
    
            // data['ten_chuc_vu']
    
            $count = 'SELECT COUNT(ma_hang_hang_khong) FROM hang_hang_khong WHERE trang_thai = 1';
    
            $countQuery = $database->query($count);
            $totalRows = $countQuery->fetch(PDO::FETCH_COLUMN); // $totalRows=35
    
            $response = [
                'page' => $page,
                'rowsPerPage' => $rowsPerPage,
                'totalPage' => ceil(intval($totalRows) / $rowsPerPage),// 4 trang
                'data' => $data,
            ];
            return $response;
        }
}