<?php

namespace App\Model;

use App\Core\Cookie;
use App\Core\DatabaseFactory;
use PDO;

class TicketModel{
    public static function findOneByMaVe($mav)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $query = $database->prepare("SELECT v.ma_ve, v.so_ghe, v.gia_goc, v.tien_thue, hhk.ten as tenhhk, cb.ten, cb.gio_bay  , cb.gio_den, cb.ma_san_bay_di, cb.ma_san_bay_den, cb.ngay_bay, cb.so_hieu_may_bay, hdv.ten_hang
        from ve v, hang_hang_khong hhk, chuyen_bay cb, hang_dich_vu hdv
        WHERE v.ma_chuyen_bay = cb.ma_chuyen_bay 
        AND cb.ma_hang_hang_khong = hhk.ma_hang_hang_khong
        AND v.ma_hang_hang_khong = hhk.ma_hang_hang_khong 
        AND v.ma_hang_dich_vu = hdv.ma_hang_dich_vu
        AND v.ma_ve = :mav
        and cb.trang_thai != 0 LIMIT 1");
        $query->execute([':mav' => $mav]);

        if ($row = $query->fetch()) {
            return $row;
        }
        return null;
    }
    public static function findOneBySanBay1($masb)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $query = $database->prepare("SELECT dia_diem FROM san_bay WHERE ma_san_bay = :masb and trang_thai != 0 LIMIT 1");
        $query->execute([':masb' => $masb]);

        if ($row = $query->fetch()) {
            return $row;
        }
        return null;
    }
    public static function findOneBySanBay2($masb)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $query = $database->prepare("SELECT dia_diem FROM san_bay WHERE ma_san_bay = :masb and trang_thai != 0 LIMIT 1");
        $query->execute([':masb' => $masb]);

        if ($row = $query->fetch()) {
            return $row;
        }
        return null;
    }
    public static function findOneByChuyenBay($macb)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $query = $database->prepare("SELECT cb.ma_chuyen_bay, hhk.ten as tenhhk, cb.so_hieu_may_bay, cb.ngay_bay, cb.ma_san_bay_di, cb.ma_san_bay_den, cb.gio_bay, cb.gio_den
        FROM chuyen_bay cb, hang_hang_khong hhk
        WHERE cb.ma_hang_hang_khong = hhk.ma_hang_hang_khong
        and cb.ma_chuyen_bay = :macb
        and cb.trang_thai = 1 LIMIT 1");
        $query->execute([':macb' => $macb]);

        if ($row = $query->fetch()) {
            return $row;
        }
        return null;
    }
    public static function findOneByChuyenBay2($macb)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $query = $database->prepare("SELECT cb.ma_chuyen_bay, hhk.ten as tenhhk, cb.so_hieu_may_bay, cb.ngay_bay, cb.ma_san_bay_di, cb.ma_san_bay_den, cb.gio_bay, cb.gio_den
        FROM chuyen_bay cb, hang_hang_khong hhk
        WHERE cb.ma_hang_hang_khong = hhk.ma_hang_hang_khong
        and cb.ma_chuyen_bay = :macb
        and cb.trang_thai = 2 LIMIT 1");
        $query->execute([':macb' => $macb]);

        if ($row = $query->fetch()) {
            return $row;
        }
        return null;
    }
    public static function GetHangThuong()
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $query = $database->prepare("SELECT ma_hang_dich_vu FROM hang_dich_vu WHERE trang_thai != 0 LIMIT 1 OFFSET 1");
        $query->execute();

        if ($row = $query->fetch()) {
            return $row;
        }
        return null;
    }
    public static function GetHangThuongGia()
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $query = $database->prepare("SELECT ma_hang_dich_vu FROM hang_dich_vu WHERE trang_thai != 0 LIMIT 1 OFFSET 0");
        $query->execute();

        if ($row = $query->fetch()) {
            return $row;
        }
        return null;
    }
    public static function Getgiathuong($macb, $mahdv)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $query = $database->prepare("SELECT gia_goc, tien_thue FROM ve WHERE ma_chuyen_bay = '$macb' and ma_hang_dich_vu = '$mahdv' and trang_thai = 1 LIMIT 1");
        $query->execute();

        if ($row = $query->fetch()) {
            return $row;
        }
        return null;
    }
    public static function Getgiathuonggia($macb, $mahdv)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $query = $database->prepare("SELECT gia_goc, tien_thue FROM ve WHERE ma_chuyen_bay = '$macb' and ma_hang_dich_vu = '$mahdv' and trang_thai = 1 LIMIT 1");
        $query->execute();

        if ($row = $query->fetch()) {
            return $row;
        }
        return null;
    }
    public static function create($macb, $ghethuong, $ghethuonggia, $giagocthuonggia, $giathuethuonggia, $giagocthuong, $giathuethuong){
        $database = DatabaseFactory::getFactory()->getConnection();

        $sqlghethuonggia = "SELECT mb.so_ghe_thuong_gia FROM chuyen_bay cb, may_bay mb WHERE cb.so_hieu_may_bay = mb.so_hieu_may_bay and cb.ma_chuyen_bay = '$macb' and cb.trang_thai=1";
        $qrghethuonggia = $database->prepare($sqlghethuonggia);
        $qrghethuonggia->execute();
        $soghethuonggia = $qrghethuonggia->fetch(PDO::FETCH_COLUMN);

        $sqlghethuong = "SELECT mb.so_ghe_thuong FROM chuyen_bay cb, may_bay mb WHERE cb.so_hieu_may_bay = mb.so_hieu_may_bay and cb.ma_chuyen_bay = '$macb' and cb.trang_thai=1";
        $qrghethuong = $database->prepare($sqlghethuong);
        $qrghethuong->execute();
        $soghethuong = $qrghethuong->fetch(PDO::FETCH_COLUMN);

        $sqlhhk = "SELECT ma_hang_hang_khong FROM chuyen_bay WHERE ma_chuyen_bay = '$macb'";
        $qrhhk = $database->prepare($sqlhhk);
        $qrhhk->execute();
        $sohhk = $qrhhk->fetch(PDO::FETCH_COLUMN);

        $macbtmp = "";
        $counttmp = 0;
        $count1 = $soghethuonggia;
        $count2 = $soghethuong;
        for($i = 0; $i < $soghethuonggia; $i++) {
            $macbtmp = $macb;
            $counttmp++;
            $mav=$macbtmp."V".$counttmp;
            $sql1 = "INSERT INTO ve VALUES('$mav', '$macb', '$sohhk', '$ghethuonggia', '$counttmp', '$giagocthuonggia', '$giathuethuonggia', 1)";
            $qr1 = $database->prepare($sql1);
            $qr1->execute();
            $count1 = $qr1->rowCount();
        }
        for($i = 0; $i < $soghethuong; $i++) {
            $macbtmp = $macb;
            $counttmp++;
            $mav=$macbtmp."V".$counttmp;
            $sql2 = "INSERT INTO ve VALUES('$mav', '$macb', '$sohhk', '$ghethuong', '$counttmp', '$giagocthuong', '$giathuethuong', 1)";
            $qr2 = $database->prepare($sql2);
            $qr2->execute();
            $count2 = $qr2->rowCount();
        }
        if ($count1 >= 1 && $count2 >=1) {
            $updatecb = "UPDATE chuyen_bay SET trang_thai=2 WHERE ma_chuyen_bay = '$macb'";
            $qrupdatecb = $database->prepare($updatecb);
            $qrupdatecb->execute();
            return true;
        }

        return false;
    }
    
    public static function update($macb, $ghethuong, $ghethuonggia, $giagocthuonggia, $giathuethuonggia, $giagocthuong, $giathuethuong){
        $database = DatabaseFactory::getFactory()->getConnection();

        $updatecb = "UPDATE ve SET gia_goc='$giagocthuonggia', tien_thue='$giathuethuonggia' WHERE ma_chuyen_bay = '$macb' and ma_hang_dich_vu='$ghethuonggia' and trang_thai=1";
        $qrupdatecb = $database->prepare($updatecb);
        $qrupdatecb->execute();
        $updatecb1 = "UPDATE ve SET gia_goc='$giagocthuong', tien_thue='$giathuethuong' WHERE ma_chuyen_bay = '$macb' and ma_hang_dich_vu='$ghethuong ' and trang_thai=1";
        $qrupdatecb1 = $database->prepare($updatecb1);
        $qrupdatecb1->execute();
        $count = $qrupdatecb->rowCount();
        $count1 = $qrupdatecb1  ->rowCount();
        if ($count>=1 && $count1>=1) {
            return true;
        }
        return true;
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
        and cb.trang_thai != 0 LIMIT :limit OFFSET :offset"; // limit 0,5
        
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

        $count = 'SELECT COUNT(ma_ve) FROM ve WHERE trang_thai = 1';

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
    public static function getList1($page = 1, $rowsPerPage = 1){
        $limit = $rowsPerPage;
        $offset = $rowsPerPage * ($page - 1);

        $database = DatabaseFactory::getFactory()->getConnection();
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $today = date("Y-m-d");
        $sql = "SELECT cb.ma_chuyen_bay, hhk.ten, cb.ma_san_bay_di, cb.ma_san_bay_den, cb.ngay_bay, cb.so_hieu_may_bay, cb.gio_bay, cb.gio_den, cb.trang_thai
        from hang_hang_khong hhk, chuyen_bay cb, hang_dich_vu hdv
        WHERE 
        cb.ma_hang_hang_khong = hhk.ma_hang_hang_khong
        and cb.ngay_bay > '$today'
        and cb.trang_thai = 1 group by cb.ma_chuyen_bay LIMIT :limit OFFSET :offset"; // limit 0,5
        
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

        $count = 'SELECT COUNT(ma_chuyen_bay) FROM chuyen_bay WHERE trang_thai = 1';

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

    public static function getList2($page = 1, $rowsPerPage = 1){
        $limit = $rowsPerPage;
        $offset = $rowsPerPage * ($page - 1);

        $database = DatabaseFactory::getFactory()->getConnection();
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $today = date("Y-m-d");
        $sql = "SELECT cb.ma_chuyen_bay, hhk.ten, cb.ma_san_bay_di, cb.ma_san_bay_den, cb.ngay_bay, cb.so_hieu_may_bay, cb.gio_bay, cb.gio_den, cb.trang_thai
        from hang_hang_khong hhk, chuyen_bay cb, hang_dich_vu hdv
        WHERE 
        cb.ma_hang_hang_khong = hhk.ma_hang_hang_khong
        and cb.ngay_bay > '$today'
        and cb.trang_thai = 2 group by cb.ma_chuyen_bay LIMIT :limit OFFSET :offset"; // limit 0,5
        
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

        $count = 'SELECT COUNT(ma_chuyen_bay) FROM chuyen_bay WHERE trang_thai = 2';

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

    public static function getListSearch($search,$search2,$page = 1, $rowsPerPage = 10){
        $limit = $rowsPerPage;
        $offset = $rowsPerPage * ($page - 1);

        $database = DatabaseFactory::getFactory()->getConnection();
        
        $raw = "";
        $raw1 = "";

        if ($search2 == '2') {
            $raw .= "SELECT v.*, hhk.ten, cb.ma_san_bay_di, cb.ma_san_bay_den, cb.ngay_bay FROM ve v, hang_hang_khong hhk, chuyen_bay cb, hang_dich_vu hdv WHERE v.ma_chuyen_bay = cb.ma_chuyen_bay AND cb.ma_hang_hang_khong = hhk.ma_hang_hang_khong AND v.ma_hang_hang_khong = hhk.ma_hang_hang_khong AND v.ma_hang_dich_vu = hdv.ma_hang_dich_vu and v.trang_thai != 0 and cb.ma_chuyen_bay LIKE '%$search%' ORDER BY cb.ma_chuyen_bay ASC LIMIT $limit OFFSET $offset";
            $raw1 .= "SELECT COUNT(v.ma_ve) FROM ve v, hang_hang_khong hhk, chuyen_bay cb, hang_dich_vu hdv WHERE v.ma_chuyen_bay = cb.ma_chuyen_bay AND cb.ma_hang_hang_khong = hhk.ma_hang_hang_khong AND v.ma_hang_hang_khong = hhk.ma_hang_hang_khong AND v.ma_hang_dich_vu = hdv.ma_hang_dich_vu and v.trang_thai != 0 and cb.ma_chuyen_bay LIKE '%$search%'";
        } else if ($search2 == '3') {
            $raw .= "SELECT v.*, hhk.ten, cb.ma_san_bay_di, cb.ma_san_bay_den, cb.ngay_bay FROM ve v, hang_hang_khong hhk, chuyen_bay cb, hang_dich_vu hdv WHERE v.ma_chuyen_bay = cb.ma_chuyen_bay AND cb.ma_hang_hang_khong = hhk.ma_hang_hang_khong AND v.ma_hang_hang_khong = hhk.ma_hang_hang_khong AND v.ma_hang_dich_vu = hdv.ma_hang_dich_vu and v.trang_thai != 0 and v.ma_ve LIKE '%$search%' ORDER BY v.ma_ve ASC LIMIT $limit OFFSET $offset";
            $raw1 .= "SELECT COUNT(v.ma_ve) FROM ve v, hang_hang_khong hhk, chuyen_bay cb, hang_dich_vu hdv WHERE v.ma_chuyen_bay = cb.ma_chuyen_bay AND cb.ma_hang_hang_khong = hhk.ma_hang_hang_khong AND v.ma_hang_hang_khong = hhk.ma_hang_hang_khong AND v.ma_hang_dich_vu = hdv.ma_hang_dich_vu and v.trang_thai != 0 and v.ma_ve LIKE '%$search%'";
        } else if ($search2 == '4') {
            $raw .= "SELECT v.*, hhk.ten, cb.ma_san_bay_di, cb.ma_san_bay_den, cb.ngay_bay FROM ve v, hang_hang_khong hhk, chuyen_bay cb, hang_dich_vu hdv WHERE v.ma_chuyen_bay = cb.ma_chuyen_bay AND cb.ma_hang_hang_khong = hhk.ma_hang_hang_khong AND v.ma_hang_hang_khong = hhk.ma_hang_hang_khong AND v.ma_hang_dich_vu = hdv.ma_hang_dich_vu and v.trang_thai != 0 and hhk.ten LIKE '%$search%' ORDER BY hhk.ten ASC LIMIT $limit OFFSET $offset";
            $raw1 .= "SELECT COUNT(v.ma_ve) FROM ve v, hang_hang_khong hhk, chuyen_bay cb, hang_dich_vu hdv WHERE v.ma_chuyen_bay = cb.ma_chuyen_bay AND cb.ma_hang_hang_khong = hhk.ma_hang_hang_khong AND v.ma_hang_hang_khong = hhk.ma_hang_hang_khong AND v.ma_hang_dich_vu = hdv.ma_hang_dich_vu and v.trang_thai != 0 and hhk.ten LIKE '%$search%'";
        } else if ($search2 == '5') {
            $raw .= "SELECT v.*, hhk.ten, cb.ma_san_bay_di, cb.ma_san_bay_den, cb.ngay_bay FROM ve v, hang_hang_khong hhk, chuyen_bay cb, hang_dich_vu hdv WHERE v.ma_chuyen_bay = cb.ma_chuyen_bay AND cb.ma_hang_hang_khong = hhk.ma_hang_hang_khong AND v.ma_hang_hang_khong = hhk.ma_hang_hang_khong AND v.ma_hang_dich_vu = hdv.ma_hang_dich_vu and v.trang_thai != 0 and cb.ngay_bay LIKE '%$search%' ORDER BY cb.ngay_bay ASC LIMIT $limit OFFSET $offset";
            $raw1 .= "SELECT COUNT(v.ma_ve) FROM ve v, hang_hang_khong hhk, chuyen_bay cb, hang_dich_vu hdv WHERE v.ma_chuyen_bay = cb.ma_chuyen_bay AND cb.ma_hang_hang_khong = hhk.ma_hang_hang_khong AND v.ma_hang_hang_khong = hhk.ma_hang_hang_khong AND v.ma_hang_dich_vu = hdv.ma_hang_dich_vu and v.trang_thai != 0 and cb.ngay_bay LIKE '%$search%'";
        } else {
            $raw .= "SELECT v.*, hhk.ten, cb.ma_san_bay_di, cb.ma_san_bay_den, cb.ngay_bay FROM ve v, hang_hang_khong hhk, chuyen_bay cb, hang_dich_vu hdv WHERE v.ma_chuyen_bay = cb.ma_chuyen_bay AND cb.ma_hang_hang_khong = hhk.ma_hang_hang_khong AND v.ma_hang_hang_khong = hhk.ma_hang_hang_khong AND v.ma_hang_dich_vu = hdv.ma_hang_dich_vu and v.trang_thai != 0 and (cb.ma_chuyen_bay LIKE '%$search%' or v.ma_ve LIKE '%$search%' or hhk.ten LIKE '%$search%' or cb.ngay_bay LIKE '%$search%')  ORDER BY cb.ma_chuyen_bay ASC LIMIT $limit OFFSET $offset";
            $raw1 .= "SELECT COUNT(v.ma_ve) FROM ve v, hang_hang_khong hhk, chuyen_bay cb, hang_dich_vu hdv WHERE v.ma_chuyen_bay = cb.ma_chuyen_bay AND cb.ma_hang_hang_khong = hhk.ma_hang_hang_khong AND v.ma_hang_hang_khong = hhk.ma_hang_hang_khong AND v.ma_hang_dich_vu = hdv.ma_hang_dich_vu and v.trang_thai != 0 and (cb.ma_chuyen_bay LIKE '%$search%' or v.ma_ve LIKE '%$search%' or hhk.ten LIKE '%$search%' or cb.ngay_bay LIKE '%$search%')";
        }
        $query = $database->prepare($raw);
        $query->execute();
        $data = $query->fetchAll();
        
        $query1 = $database->prepare($raw1);
        $query1->execute();
        $totalRows = $query1->fetch(PDO::FETCH_COLUMN);

        $sqlsb = "SELECT * FROM san_bay WHERE trang_thai=1";
        $querysb = $database->prepare($sqlsb);
        $querysb->execute();
        $sanbay = $querysb->fetchAll();

        $response = [
            'page' => $page,
            'rowsPerPage' => $rowsPerPage,
            'totalPage' => ceil(intval($totalRows) / $rowsPerPage),
            'data' => $data,
            'sanbay' => $sanbay,
        ];
        return $response;
    }

    public static function setTrangThai(){
        $database = DatabaseFactory::getFactory()->getConnection();
        
        $sql = "SELECT ma_chuyen_bay FROM chuyen_bay WHERE trang_thai=4";
        $qr = $database->prepare($sql);
        $qr->execute();
        $cb = $qr->fetchAll();

        $count = 0;
        foreach($cb as $data) {
            $macb = $data->ma_chuyen_bay;
            $sql1 = "UPDATE ve SET trang_thai=3 WHERE ma_chuyen_bay='$macb' AND trang_thai!=2";
            $qr1 = $database->prepare($sql1);
            $qr1->execute();
            $count++;
        }
        if ($count>=1) {
            return true;
        }
        return null;
    }
}