<?php

namespace App\Model;

use App\Core\Cookie;
use App\Core\DatabaseFactory;
use PDO;

class PositionModel{
    
    public static function checkValidMaChucVu($macv){
        $database = DatabaseFactory::getFactory()->getConnection();

        $query = $database->prepare("SELECT * FROM chuc_vu WHERE ma_chuc_vu = :macv LIMIT 1");
        $query->execute([':macv' => $macv]);

        if ($row = $query->fetch()) {
            return $row;
        }
        return null;
    }

    public static function create($machucvu,$tenchucvu,$chitiets){
        $database = DatabaseFactory::getFactory()->getConnection();
        $sql = "INSERT INTO chuc_vu (ma_chuc_vu, ten_chuc_vu,trang_thai) VALUES (:machucvu,:tenchucvu,1) ";
        $query = $database->prepare($sql);
        $query->execute([':machucvu' => $machucvu,':tenchucvu' => $tenchucvu]);

        $count2 = 0;
        foreach ($chitiets as &$chitiet) {
            $sql2 = "INSERT INTO chi_tiet_quyen (ma_chuc_vu, ma_chuc_nang) VALUES (:machucvu,:machucnang)";
            $query2 = $database->prepare($sql2);
            $query2->execute([':machucvu' => $chitiet->ma_chuc_vu,':machucnang' => $chitiet->ma_chuc_nang]);
            $count2 += $query2->rowCount();
        }

        $count = $query->rowCount() + $count2;
        if ($count > 0) {
            return true;
        }
        return false;
    }

    public static function update($machucvu, $tenchucvu,$chitiets){
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "UPDATE chuc_vu SET ten_chuc_vu =:tenchucvu WHERE ma_chuc_vu = :machucvu";
        $query = $database->prepare($sql);
        $query->execute([':machucvu' => $machucvu,':tenchucvu' => $tenchucvu]);

        $sql1 = "DELETE FROM `chi_tiet_quyen` WHERE ma_chuc_vu= :machucvu";
        $query1 = $database->prepare($sql1);
        $query1->execute([':machucvu' => $machucvu]);

        $count2 = 0;
        foreach ($chitiets as &$chitiet) {
            $sql2 = "INSERT INTO chi_tiet_quyen (ma_chuc_vu, ma_chuc_nang) VALUES (:machucvu,:machucnang)";
            $query2 = $database->prepare($sql2);
            $query2->execute([':machucvu' => $chitiet->ma_chuc_vu,':machucnang' => $chitiet->ma_chuc_nang]);
            $count2 += $query2->rowCount();
        }

        $count = $query->rowCount() + $count2;
        if ($count > 0) {
            return true;
        }
        return false;
    }

    public static function delete($macv){
        $database = DatabaseFactory::getFactory()->getConnection();
        $sql = "UPDATE `chuc_vu` SET trang_thai = 0  WHERE ma_chuc_vu = :machucvu";
        $query = $database->prepare($sql);
        $query->execute([':machucvu' => $macv]);       
        $count = $query->rowCount();
        if ($count == 1) {
            return true;
        }
        return false;
    }

    public static function deletes($macvs){
        $database = DatabaseFactory::getFactory()->getConnection();
        $raw = "(";
        foreach ($macvs as &$key) {
            $raw .= "'" . $key . "',";
        }
        $raw = substr($raw, 0, -1);
        $raw .= ")";

        $sql = "UPDATE `chuc_vu` SET trang_thai = 0  WHERE  ma_chuc_vu IN " . $raw;
        $count  = $database->exec($sql);
        
        if (!$count) {
            return false;
        }
        return true;
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

    public static function getPositions(){
        $database = DatabaseFactory::getFactory()->getConnection();

        $query = $database->prepare("SELECT * FROM chuc_vu  WHERE trang_thai = 1");
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

    public static function ktraQuyen($macn){
        $database = DatabaseFactory::getFactory()->getConnection();
        $maquyen = Cookie::get('user_quyen');
        $sql = 'SELECT * FROM chi_tiet_quyen WHERE ma_chuc_vu = "'.$maquyen.'" AND ma_chuc_nang = "'.$macn.'"';
        $query = $database->query($sql);
        $data = $query->fetch();
        echo($data);
        if(!$data){
            return false;
        }
        return true;
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