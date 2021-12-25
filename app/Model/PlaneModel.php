<?php

namespace App\Model;

use App\Core\Cookie;
use App\Core\DatabaseFactory;
use PDO;

class PlaneModel{
    public static function create(){

    }

    public static function update(){
        
    }

    public static function delete(){
        
    }

    public static function getPlane(){
        
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
}