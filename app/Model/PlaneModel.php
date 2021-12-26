<?php

namespace App\Model;

use App\Core\Cookie;
use App\Core\DatabaseFactory;
use PDO;

class PlaneModel{
    public static function findOneBySoHieu($sohieu){
        $database = DatabaseFactory::getFactory()->getConnection();

        $query = $database->prepare("SELECT * FROM may_bay WHERE so_hieu_may_bay = :sohieu LIMIT 1");
        $query->execute([':sohieu' => $sohieu]);

        if ($row = $query->fetch()) {
            return $row;
        }
        return null;
    }
    public static function create($sohieu, $hang, $ghethuong, $thuonggia){
        $database = DatabaseFactory::getFactory()->getConnection();
        $tongghe= $ghethuong + $thuonggia;
        $sql = "INSERT INTO may_bay (so_hieu_may_bay, ma_hang_hang_khong, so_ghe_thuong, so_ghe_thuong_gia, tong_so_ghe, trang_thai)
                VALUES (:sohieu,:hang, :ghethuong, :thuonggia, :tongghe,1)";
        $query = $database->prepare($sql);
        $query->execute([':sohieu' => $sohieu, ':hang' => $hang, ':ghethuong' => $ghethuong, ':thuonggia' => $thuonggia, ':tongghe' => $tongghe]);
        $count = $query->rowCount();
        if ($count == 1) {
            return true;
        }

        return false;

    }

    public static function update($sohieu, $hang, $ghethuong, $thuonggia){
        $database = DatabaseFactory::getFactory()->getConnection();
        $tongghe= $ghethuong + $thuonggia;
        $sql = "UPDATE may_bay SET ma_hang_hang_khong =:hang, so_ghe_thuong = :ghethuong, so_ghe_thuong_gia = :thuonggia, tong_so_ghe = :tongghe  WHERE so_hieu_may_bay = :sohieu";
        $query = $database->prepare($sql);
        $query->execute([':sohieu' => $sohieu, ':hang' => $hang, ':ghethuong' => $ghethuong, ':thuonggia' => $thuonggia, ':tongghe' => $tongghe]);
        $count = $query->rowCount();
        if ($count == 1) {
            return true;
        }
        return false;        
    }

    public static function delete($sohieu){
        $database = DatabaseFactory::getFactory()->getConnection();
        $sql = "UPDATE may_bay SET trang_thai = 0  WHERE so_hieu_may_bay = :sohieu";
        $query = $database->prepare($sql);
        $query->execute([':sohieu' => $sohieu]);       
        $count = $query->rowCount();
        if ($count == 1) {
            return true;
        }
        return false;        
    }

    public static function deletes($sohieus)
    {
        $database = DatabaseFactory::getFactory()->getConnection();
        $raw = "(";
        foreach ($sohieus as &$sohieu) {
            $raw .= "'" . $sohieu . "',";
        }
        $raw = substr($raw, 0, -1);
        $raw .= ")";

        $sql = "UPDATE may_bay SET trang_thai = 0  WHERE  so_hieu_may_bay IN " . $raw;
        $count  = $database->exec($sql);
        if (!$count) {
            return false;
        }
        return true;
    }

    public static function getAllPagination($search, $search2, $page , $rowsPerPage)
    {
        // tính limit và offset dựa trên số trang và số lương dòng trên mỗi trang
        $limit = $rowsPerPage;
        $offset = $rowsPerPage * ($page - 1);

        $database = DatabaseFactory::getFactory()->getConnection();

        $search = '%' . $search . '%';
        
        if ($search2 == "") {
            $sql = 'SELECT so_hieu_may_bay, ten, so_ghe_thuong, so_ghe_thuong_gia, tong_so_ghe
                FROM may_bay, hang_hang_khong WHERE (so_hieu_may_bay LIKE :search OR ten LIKE :search OR so_ghe_thuong LIKE :search OR so_ghe_thuong_gia LIKE :search OR tong_so_ghe LIKE :search) 
                    AND may_bay.ma_hang_hang_khong = hang_hang_khong.ma_hang_hang_khong AND may_bay.trang_thai=1';
        } else if ($search2 == "so_hieu") {
            $sql = 'SELECT so_hieu_may_bay, ten, so_ghe_thuong, so_ghe_thuong_gia, tong_so_ghe
            FROM may_bay, hang_hang_khong WHERE (so_hieu_may_bay LIKE :search) 
                AND may_bay.ma_hang_hang_khong = hang_hang_khong.ma_hang_hang_khong AND may_bay.trang_thai=1';
        } else if ($search2 == "hang") {
            $sql = 'SELECT so_hieu_may_bay, ten, so_ghe_thuong, so_ghe_thuong_gia, tong_so_ghe
                FROM may_bay, hang_hang_khong WHERE (ten LIKE :search) 
                    AND may_bay.ma_hang_hang_khong = hang_hang_khong.ma_hang_hang_khong AND may_bay.trang_thai=1';
        } else if ($search2 == "ghe_thuong") {
            $sql = 'SELECT so_hieu_may_bay, ten, so_ghe_thuong, so_ghe_thuong_gia, tong_so_ghe
                FROM may_bay, hang_hang_khong WHERE (so_ghe_thuong LIKE :search) 
                    AND may_bay.ma_hang_hang_khong = hang_hang_khong.ma_hang_hang_khong AND may_bay.trang_thai=1';
        }else  if ($search2 == "thuong_gia") {
            $sql = 'SELECT so_hieu_may_bay, ten, so_ghe_thuong, so_ghe_thuong_gia, tong_so_ghe
                FROM may_bay, hang_hang_khong WHERE (so_ghe_thuong_gia LIKE :search) 
                    AND may_bay.ma_hang_hang_khong = hang_hang_khong.ma_hang_hang_khong AND may_bay.trang_thai=1';
        }else if ($search2 == "tong_ghe") {
            $sql = 'SELECT so_hieu_may_bay, ten, so_ghe_thuong, so_ghe_thuong_gia, tong_so_ghe
                FROM may_bay, hang_hang_khong WHERE (tong_so_ghe LIKE :search) 
                    AND may_bay.ma_hang_hang_khong = hang_hang_khong.ma_hang_hang_khong AND may_bay.trang_thai=1';
        }


        $sql .= ' ORDER BY so_hieu_may_bay ASC LIMIT :limit OFFSET :offset'; //DESC giảm ASC tăng

        $query = $database->prepare($sql);

        $query->bindValue(':limit', $limit, PDO::PARAM_INT);
        $query->bindValue(':offset', $offset, PDO::PARAM_INT);
        $query->bindValue(':search', $search, PDO::PARAM_STR);

        $query->execute();
        $data = $query->fetchAll();

        // đếm số lượng tất cả user để tính số trang
        $count = "";
        if ($search2 == "") {
            $count = 'SELECT COUNT(*) FROM may_bay, hang_hang_khong 
            WHERE (so_hieu_may_bay LIKE :search OR ten LIKE :search OR so_ghe_thuong LIKE :search OR so_ghe_thuong_gia LIKE :search OR tong_so_ghe LIKE :search) 
                    AND may_bay.ma_hang_hang_khong = hang_hang_khong.ma_hang_hang_khong AND may_bay.trang_thai=1';
        } else if ($search2 == "so_hieu") {
            $count = 'SELECT COUNT(*) FROM may_bay, hang_hang_khong 
                WHERE (so_hieu_may_bay LIKE :search) 
                AND may_bay.ma_hang_hang_khong = hang_hang_khong.ma_hang_hang_khong AND may_bay.trang_thai=1';
        } else if ($search2 == "hang") {
            $count = 'SELECT COUNT(*) FROM may_bay, hang_hang_khong 
                WHERE (ten LIKE :search) 
                    AND may_bay.ma_hang_hang_khong = hang_hang_khong.ma_hang_hang_khong AND may_bay.trang_thai=1';
        } else if ($search2 == "ghe_thuong") {
            $count = 'SELECT COUNT(*) FROM may_bay, hang_hang_khong 
                WHERE (so_ghe_thuong LIKE :search) 
                    AND may_bay.ma_hang_hang_khong = hang_hang_khong.ma_hang_hang_khong AND may_bay.trang_thai=1';
        }else  if ($search2 == "thuong_gia") {
            $count = 'SELECT COUNT(*) FROM may_bay, hang_hang_khong 
            WHERE (so_ghe_thuong_gia LIKE :search) 
                    AND may_bay.ma_hang_hang_khong = hang_hang_khong.ma_hang_hang_khong AND may_bay.trang_thai=1';
        }else if ($search2 == "tong_ghe") {
            $count = 'SELECT COUNT(*)  FROM may_bay, hang_hang_khong 
            WHERE (tong_so_ghe LIKE :search) 
                    AND may_bay.ma_hang_hang_khong = hang_hang_khong.ma_hang_hang_khong AND may_bay.trang_thai=1';
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

    public static function getNameAirlines(){
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = 'SELECT ma_hang_hang_khong, ten FROM hang_hang_khong WHERE trang_thai=1';
        $query  = $database->query($sql);
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
}