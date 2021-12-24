<?php

namespace App\Model;

use App\Core\Cookie;
use App\Core\DatabaseFactory;
use PDO;

class RankModel{
    public static function create($mahang, $tenhang, $mucdiem){
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "INSERT INTO  hang_khach_hang (ma_hang_kh,ten_hang,muc_diem,trang_thai)
                VALUES (:mahang,:tenhang,:mucdiem, 1)";
        $query = $database->prepare($sql);
        $query->execute([':mahang' => $mahang, ':tenhang' => $tenhang,':mucdiem' => $mucdiem]);
        $count = $query->rowCount();
        if ($count == 1) {
            return true;
        }
        return false;
    }

    public static function update(){
        
    }

    public static function delete(){
        
    }

    public static function getRank($mahang){
        $database = DatabaseFactory::getFactory()->getConnection();
        $query = $database->prepare("SELECT * FROM hang_khach_hang WHERE ma_hang_kh = :mahang LIMIT 1");
        $query->execute([':mahang' => $mahang]);

        if ($row = $query->fetch()) {
            return $row;
        }
        return null;
    }

    public static function getList($page = 1, $rowsPerPage = 10){
        $limit = $rowsPerPage;
        $offset = $rowsPerPage * ($page - 1);

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT * from hang_khach_hang WHERE trang_thai = 1 LIMIT :limit OFFSET :offset"; // limit 0,5

        $query = $database->prepare($sql);

        $query->bindValue(':limit', $limit, PDO::PARAM_INT);
        $query->bindValue(':offset', $offset, PDO::PARAM_INT);

        $query->execute();
        $data = $query->fetchAll(); // = while( $r=mysqli_fetch_array())

        // data['ten_chuc_vu']

        $count = 'SELECT COUNT(ma_hang_kh) FROM hang_khach_hang WHERE trang_thai = 1';

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