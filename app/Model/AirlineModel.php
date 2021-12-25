<?php

namespace App\Model;
use App\Core\Cookie;
use App\Core\DatabaseFactory;
use PDO;

class AirlineModel{
    public static function findOneByMaHangHangKhong($mahanghangkhong){
        $database = DatabaseFactory::getFactory()->getConnection();

        $query = $database->prepare("SELECT * FROM hang_hang_khong WHERE ma_hang_hang_khong = :mahanghangkhong LIMIT 1");
        $query->execute([':mahanghangkhong' => $mahanghangkhong]);

        if ($row = $query->fetch()) {
            return $row;
        }
        return null;
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


    public static function update($mahang, $tenhang, $motahang, $loaihang, $ngayban){
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "UPDATE `hang_hang_khong` SET `ten`= :tenhang,`mo_ta`= :motahang,`loai_hang`= :loaihang,`ngay_ban`= :ngayban WHERE ma_hang_hang_khong = :mahang";
        $query = $database->prepare($sql);
        $query->execute([':mahang' => $mahang,':tenhang' => $tenhang,':motahang' => $motahang,':loaihang' => $loaihang,':ngayban' => $ngayban]);
        $count = $query->rowCount();
        if ($count == 1) {
            return true;
        }
        return false;
    }

    public static function delete($mahhk){
        $database = DatabaseFactory::getFactory()->getConnection();
        $sql = "UPDATE `hang_hang_khong` SET trang_thai = 0  WHERE ma_hang_hang_khong = :mahhk";
        $query = $database->prepare($sql);
        $query->execute([':mahhk' => $mahhk]);       
        $count = $query->rowCount();
        if ($count == 1) {
            return true;
        }
        return false;
    }

    public static function deletes($mahhks){
        $database = DatabaseFactory::getFactory()->getConnection();
        $raw = "(";
        foreach ($mahhks as &$key) {
            $raw .= "'" . $key . "',";
        }
        $raw = substr($raw, 0, -1);
        $raw .= ")";

        $sql = "UPDATE `hang_hang_khong` SET trang_thai = 0  WHERE  ma_hang_hang_khong IN " . $raw;
        $count  = $database->exec($sql);
        
        if (!$count) {
            return false;
        }
        return true;
    }

    public static function getAirline($mahhk){
        $database = DatabaseFactory::getFactory()->getConnection();

        $query = $database->prepare("SELECT * FROM hang_hang_khong WHERE trang_thai = 1 AND ma_hang_hang_khong = :mahhk LIMIT 1");
        $query->execute([':mahhk' => $mahhk]);

        if ($row = $query->fetch()) {
            return $row;
        }
        return null;
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



    public static function getAdvancedPagination($search, $search2, $page = 1, $rowsPerPage = 10){
        $limit = $rowsPerPage;
        $offset = $rowsPerPage * ($page - 1);

        $database = DatabaseFactory::getFactory()->getConnection();
        $raw = 'SELECT * FROM hang_hang_khong';
        if ($search2 == '0') {
            $raw .= ' WHERE (ma_hang_hang_khong LIKE :search OR ten LIKE :search OR mo_ta LIKE :search )  AND trang_thai = 1';
        }
      if ($search2 == '1') {
            $raw .= ' WHERE (ma_hang_hang_khong LIKE :search )  AND trang_thai = 1';
        } 
         if ($search2 == '2') {
            $raw .= ' WHERE (ten LIKE :search )  AND trang_thai = 1';
        } 
        $search = '%' . $search . '%';

        $raw .= ' ORDER BY ma_hang_hang_khong ASC LIMIT :limit OFFSET :offset';
        $query = $database->prepare($raw);

        $query->bindValue(':limit', $limit, PDO::PARAM_INT);
        $query->bindValue(':offset', $offset, PDO::PARAM_INT);
        $query->bindValue(':search', $search, PDO::PARAM_STR);
        $query->execute();
        $data = $query->fetchAll();


        $count = 'SELECT COUNT(ma_hang_hang_khong) FROM hang_hang_khong';
        if ($search2 == '0') {
            $count .= ' WHERE (ma_hang_hang_khong LIKE :search OR ten LIKE :search )  AND trang_thai = 1';
        }
        if ($search2 == '1') {
            $count .= ' WHERE (ma_hang_hang_khong LIKE :search )  AND trang_thai = 1';
        } 
        if ($search2 == '2') {
            $count .= ' WHERE (ten LIKE :search )  AND trang_thai = 1';
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