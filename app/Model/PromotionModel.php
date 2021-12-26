<?php

namespace App\Model;

use App\Core\Cookie;
use App\Core\DatabaseFactory;
use PDO;

class PromotionModel{
    public static function create($tenkm,$ngaybdkm,$ngayktkm,$noidungkm){
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "INSERT INTO `chuong_trinh_khuyen_mai`(`ten`, `noi_dung`, `ngay_bat_dau`, 
        `ngay_ket_thuc`, `trang_thai`) VALUES ('$tenkm','$noidungkm',
        '$ngaybdkm','$ngayktkm','1')";
        $query = $database->prepare($sql);
        $query->execute();
        $count = $query->rowCount();
        if ($count == 1) {
            return true;
        }
        return false;
    }

    public static function update($makm, $tenkm,$ngaybdkm,$ngayktkm,$noidungkm){
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "UPDATE chuong_trinh_khuyen_mai SET ten ='$tenkm', noi_dung ='$noidungkm', 
        ngay_bat_dau ='$ngaybdkm', ngay_ket_thuc ='$ngayktkm' WHERE ma_km = '$makm'";
        $query = $database->prepare($sql);
        $query->execute();
        $count = $query->rowCount();
        if ($count == 1) {
            return true;
        }
        return false;
    }

    public static function addDetail($makm, $mahangdv,$machuyenbay,$mahanghk,$mahangkh,$ptkm1){
        $database = DatabaseFactory::getFactory()->getConnection();
        $sql1="SELECT * FROM `chi_tiet_khuyen_mai` WHERE `ma_km`='$makm' AND `ma_hang_dich_vu`='$mahangdv' AND  
        `ma_chuyen_bay`='$machuyenbay' AND `ma_hang`='$mahanghk' AND `ma_hang_kh`='$mahangkh'";
        $query1 = $database->prepare($sql1);
        $query1->execute();
        $count1 = $query1->rowCount();
        if ($count1 == 1) {
            return false;
        }
        else{
            $sql = "INSERT INTO `chi_tiet_khuyen_mai`(`ma_km`, `ma_hang_dich_vu`, `ma_chuyen_bay`, 
            `ma_hang`, `ma_hang_kh`, `khuyen_mai`) VALUES ('$makm','$mahangdv',
            '$machuyenbay','$mahanghk','$mahangkh','$ptkm1')";
            $query = $database->prepare($sql);
            $query->execute();
            $count = $query->rowCount();
            if ($count == 1) {
                return true;
            }
        }
        return false;
    }

    public static function deleteDetail($makm, $mahangdv,$machuyenbay,$mahanghk,$mahangkh){
        $database = DatabaseFactory::getFactory()->getConnection();
        $sql = "DELETE FROM `chi_tiet_khuyen_mai` WHERE `ma_km`='$makm' AND `ma_hang_dich_vu`='$mahangdv' AND  
        `ma_chuyen_bay`='$machuyenbay' AND `ma_hang`='$mahanghk' AND `ma_hang_kh`='$mahangkh'";
        $query = $database->prepare($sql);
        $query->execute();    
        
        $sql1="SELECT * FROM `chi_tiet_khuyen_mai` WHERE `ma_km`='$makm' AND `ma_hang_dich_vu`='$mahangdv' AND  
        `ma_chuyen_bay`='$machuyenbay' AND `ma_hang`='$mahanghk' AND `ma_hang_kh`='$mahangkh'";
        $query1 = $database->prepare($sql1);
        $query1->execute();
        $count1 = $query1->rowCount();
        if ($count1 == 1) {
            return false;
        }           
        return true;
    }

    public static function delete($makm){
        $database = DatabaseFactory::getFactory()->getConnection();
        $sql = "UPDATE `chuong_trinh_khuyen_mai` SET trang_thai = 0  WHERE ma_km = :makm";
        $query = $database->prepare($sql);
        $query->execute([':makm' => $makm]);       
        $count = $query->rowCount();
        if ($count == 1) {
            return true;
        }
        return false;
    }

    public static function deletes($makms){
        $database = DatabaseFactory::getFactory()->getConnection();
        $raw = "(";
        foreach ($makms as &$key) {
            $raw .= "'" . $key . "',";
        }
        $raw = substr($raw, 0, -1);
        $raw .= ")";

        $sql = "UPDATE `chuong_trinh_khuyen_mai` SET trang_thai = 0  WHERE  ma_km IN " . $raw . " AND trang_thai!=2";
        $count  = $database->exec($sql);
        
        if (!$count) {
            return false;
        }
        return true;
    }

    public static function getPromotion($makm){
        $database = DatabaseFactory::getFactory()->getConnection();

        $query = $database->prepare("SELECT * FROM chuong_trinh_khuyen_mai WHERE trang_thai != 0 AND ma_km = :makm LIMIT 1");
        $query->execute([':makm' => $makm]);

        if ($row = $query->fetch()) {
            return $row;
        }
        return null;
    }

    public static function getHangDV(){
        $database = DatabaseFactory::getFactory()->getConnection();
        $sql = 'SELECT * FROM `hang_dich_vu` WHERE trang_thai = 1';
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

    public static function getChuyenBay(){
        $database = DatabaseFactory::getFactory()->getConnection();
        $sql = 'SELECT * FROM `chuyen_bay` WHERE trang_thai != 0';
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

    public static function getHangHK(){
        $database = DatabaseFactory::getFactory()->getConnection();
        $sql = 'SELECT * FROM `hang_hang_khong` WHERE trang_thai != 0';
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

    public static function getHangKH(){
        $database = DatabaseFactory::getFactory()->getConnection();
        $sql = 'SELECT * FROM `hang_khach_hang` WHERE trang_thai != 0';
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

    public static function getPromotionDetail($makm){
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = 'SELECT * FROM chi_tiet_khuyen_mai WHERE ma_km = :makm';
        $query = $database->prepare($sql);
        $query->execute([':makm' => $makm]);
        
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

    public static function getList($page = 1, $rowsPerPage = 10){
        $database = DatabaseFactory::getFactory()->getConnection();
        $date=date('Y-m-d');

        $sql1="UPDATE `chuong_trinh_khuyen_mai` SET `trang_thai`=2 
        WHERE `ngay_bat_dau`<='$date' AND `ngay_ket_thuc`>='$date' AND trang_thai!=0";
        $query1 = $database->prepare($sql1);
        $query1->execute();

        $sql2="UPDATE `chuong_trinh_khuyen_mai` SET `trang_thai`=1 
        WHERE `ngay_bat_dau`>'$date' AND trang_thai!=0";
        $query2 = $database->prepare($sql2);
        $query2->execute();

        $sql3="UPDATE `chuong_trinh_khuyen_mai` SET `trang_thai`=3
        WHERE `ngay_ket_thuc`<'$date' AND trang_thai!=0";
        $query3 = $database->prepare($sql3);
        $query3->execute();

        $limit = $rowsPerPage;
        $offset = $rowsPerPage * ($page - 1);

        

        $sql = "SELECT * from chuong_trinh_khuyen_mai WHERE trang_thai != 0 LIMIT :limit OFFSET :offset"; // limit 0,5
        
        $query = $database->prepare($sql);

        $query->bindValue(':limit', $limit, PDO::PARAM_INT);
        $query->bindValue(':offset', $offset, PDO::PARAM_INT);

        $query->execute();
        $data = $query->fetchAll(); // = while( $r=mysqli_fetch_array())

        // data['ten_chuc_vu']

        $count = 'SELECT COUNT(ma_km) FROM chuong_trinh_khuyen_mai WHERE trang_thai != 0';

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
            $raw = 'SELECT * FROM chuong_trinh_khuyen_mai WHERE (ten LIKE :search OR noi_dung LIKE :search ) AND trang_thai!=0 LIMIT :limit OFFSET :offset';
        } else {            
            $raw = 'SELECT * FROM chuong_trinh_khuyen_mai WHERE (ten LIKE :search ) AND trang_thai!=0 LIMIT :limit OFFSET :offset';                       
        }

        $search = '%' . $search . '%';

        $query = $database->prepare($raw);

        $query->bindValue(':limit', $limit, PDO::PARAM_INT);
        $query->bindValue(':offset', $offset, PDO::PARAM_INT);
        $query->bindValue(':search', $search, PDO::PARAM_STR);
        $query->execute();
        $data = $query->fetchAll();
        
        $count = 'SELECT COUNT(ma_km) FROM chuong_trinh_khuyen_mai';
        if ($search2 == '1') {
            $count .= ' WHERE (ten LIKE :search OR noi_dung LIKE :search ) AND trang_thai!=0';
        } else {
            $count .= ' WHERE (ten LIKE :search ) AND trang_thai!=0';         
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
    public static function getListSearchDate($tungay,$denngay,$page = 1, $rowsPerPage = 10){
        $limit = $rowsPerPage;
        $offset = $rowsPerPage * ($page - 1);

        $database = DatabaseFactory::getFactory()->getConnection();
        

        $raw = "SELECT * FROM chuong_trinh_khuyen_mai WHERE 
        (ngay_bat_dau>='$tungay' AND ngay_ket_thuc<='$denngay' OR ngay_ket_thuc>='$tungay' 
        AND ngay_ket_thuc<='$denngay' OR ngay_bat_dau>='$tungay' AND ngay_bat_dau<='$denngay') 
        AND trang_thai!=0 LIMIT $offset,$limit";


        $query = $database->prepare($raw);
        
        $query->execute();
        $data = $query->fetchAll();
        
        $count = "SELECT COUNT(ma_km) FROM chuong_trinh_khuyen_mai WHERE 
        (ngay_bat_dau>='$tungay' AND ngay_ket_thuc<='$denngay' OR ngay_ket_thuc>='$tungay' 
        AND ngay_ket_thuc<='$denngay' OR ngay_bat_dau>='$tungay' AND ngay_bat_dau<='$denngay') 
        AND trang_thai!=0";
        

        $countQuery = $database->prepare($count);
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