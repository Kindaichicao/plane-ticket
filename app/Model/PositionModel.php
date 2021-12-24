<?php

namespace App\Model;

use App\Core\Cookie;
use App\Core\DatabaseFactory;
use PDO;

class PositionModel{
    public static function create(){

    }

    public static function update(){
        
    }

    public static function delete(){
        
    }

    public static function getPosition($macv){
        $database = DatabaseFactory::getFactory()->getConnection();

        $query = $database->prepare("SELECT * FROM chuc_vu WHERE trang_thai = 1 AND ma_chuc_vu = :macv LIMIT 1");
        $query->execute([':macv' => $macv]);

        if ($row = $query->fetch()) {
            return $row;
        }
        return null;
    }

    public static function getPositionDetails($macv){
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = 'SELECT * FROM chi_tiet_quyen WHERE ma_chuc_vu = :macv';
        $query = $database->prepare($sql);
        $query->execute([':macv' => $macv]);
        
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

    public static function getChucNang(){
        $database = DatabaseFactory::getFactory()->getConnection();
        $sql = 'SELECT * FROM `chuc_nang`';
        $query = $database->query($sql);
        $row = $query->fetchAll();
        $check = true;
        if(!$query){
            $check = false;
        }
        $response = [
            'thanhcong' => $check,
            'data' =>$row,
        ];
        return $response;
    }

    public static function getList($page = 1, $rowsPerPage = 10){
        $limit = $rowsPerPage;
        $offset = $rowsPerPage * ($page - 1);

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT * from chuc_vu WHERE trang_thai = 1 LIMIT :limit OFFSET :offset"; // limit 0,5
        
        $query = $database->prepare($sql);

        $query->bindValue(':limit', $limit, PDO::PARAM_INT);
        $query->bindValue(':offset', $offset, PDO::PARAM_INT);

        $query->execute();
        $data = $query->fetchAll(); // = while( $r=mysqli_fetch_array())

        // data['ten_chuc_vu']

        $count = 'SELECT COUNT(ma_chuc_vu) FROM chuc_vu WHERE trang_thai = 1';

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

    public static function getListSearch($search,$search2,$page = 1, $rowsPerPage = 10){
        $limit = $rowsPerPage;
        $offset = $rowsPerPage * ($page - 1);

        $database = DatabaseFactory::getFactory()->getConnection();
        
        if ($search2 == '1') {
            $raw = 'SELECT * FROM chuc_vu WHERE (ma_chuc_vu LIKE :search OR ten_chuc_vu LIKE :search ) AND trang_thai=1 LIMIT :limit OFFSET :offset';
        } else {
            if ($search2 == '2'){
                $raw = 'SELECT * FROM chuc_vu WHERE (ma_chuc_vu LIKE :search ) AND trang_thai=1 LIMIT :limit OFFSET :offset';
            }
            else{
                $raw = 'SELECT * FROM chuc_vu WHERE (ten_chuc_vu LIKE :search ) AND trang_thai=1 LIMIT :limit OFFSET :offset';
            }
        }

        $search = '%' . $search . '%';

        $query = $database->prepare($raw);

        $query->bindValue(':limit', $limit, PDO::PARAM_INT);
        $query->bindValue(':offset', $offset, PDO::PARAM_INT);
        $query->bindValue(':search', $search, PDO::PARAM_STR);
        $query->execute();
        $data = $query->fetchAll();
        
        $count = 'SELECT COUNT(ma_chuc_vu) FROM chuc_vu';
        if ($search2 == '1') {
            $count .= ' WHERE (ma_chuc_vu LIKE :search OR ten_chuc_vu LIKE :search ) AND trang_thai=1';
        } else {
            if ($search2 == '2'){
                $count .= ' WHERE (ma_chuc_vu LIKE :search ) AND trang_thai=1';
            }
            else{
                $count .= ' WHERE (ten_chuc_vu LIKE :search ) AND trang_thai=1';
            }
        }

        $countQuery = $database->prepare($count);
        $countQuery->bindValue(':search', $search, PDO::PARAM_STR);
        $countQuery->execute();
        $totalRows = $countQuery->fetch(PDO::FETCH_COLUMN);

        $response = [
            'page' => $page,
            'rowsPerPage' => $rowsPerPage,
            'totalPage' => ceil(intval($totalRows) / $rowsPerPage),
            'data' => $data,
        ];
        return $response;
    }
}