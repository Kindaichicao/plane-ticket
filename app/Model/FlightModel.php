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
    public static function create($tencb,$noidi,$noiden,$hang,$maybay,$giodi,$gioden,$ngaybay,$ngayden){
        $database = DatabaseFactory::getFactory()->getConnection();
        $sql = "SELECT ma_chuyen_bay FROM `chuyen_bay` ";
        $query = $database->prepare($sql);
        $query->execute();
        $count = $query->rowCount();
        $macb="CB".($count+1);
        $sql1 = "INSERT INTO `chuyen_bay`(`ma_chuyen_bay`, `ma_san_bay_den`, `ma_hang_hang_khong`, `ma_san_bay_di`, `so_hieu_may_bay`, `ten`, `gio_bay`, `gio_den`, `ngay_bay`, `ngay_den`, `hoan_tien`, `trang_thai`)
         VALUES ('$macb','$noiden','$hang','$noidi','$maybay','$tencb','$giodi','$gioden','$ngaybay','$ngayden',30,1)";
        $query1 = $database->prepare($sql1);
        $query1->execute();
        return true;
    }
    // public static function update(){
        
    // }

    public static function delete($macb){
        $database = DatabaseFactory::getFactory()->getConnection();
        $sql = "SELECT  * FROM `chuyen_bay` WHERE ma_chuyen_bay= '$macb'";
        $query = $database->prepare($sql);
        $query->execute();
        $count = $query->rowCount();
        if($count>0){
            if ($row = $query->fetch()) {
                if($row->trang_thai==1){
                    $sql1 = "UPDATE `chuyen_bay` SET `trang_thai`=0 WHERE  ma_chuyen_bay= '$macb'";
                    $query1 = $database->prepare($sql1);
                    $query1->execute();
                    return 0;
                }
                if($row->trang_thai==2){
                    $sql2 = "UPDATE `chuyen_bay` SET `trang_thai`=0 WHERE  ma_chuyen_bay= '$macb'";
                    $query2 = $database->prepare($sql2);
                    $query2->execute();

                    $sql3 = "DELETE FROM `ve` WHERE  ma_chuyen_bay= '$macb'";
                    $query3 = $database->prepare($sql3);
                    $query3->execute();
                    return 0;
                }
                if($row->trang_thai==3){
                    $sql6 = "SELECT  ma_ve FROM `ve` WHERE  ma_chuyen_bay= '$macb' and trang_thai=2 ";
                    $query6 = $database->prepare($sql6);
                    $query6->execute();
                    $count = $query6->rowCount();

                    $sql7 = "SELECT  ma_ve FROM `ve` WHERE  ma_chuyen_bay= '$macb' and trang_thai!=0 ";
                    $query7 = $database->prepare($sql7);
                    $query7->execute();
                    $count1 = $query7->rowCount();
                    $tb=$count1/2;
                    if($count<$tb){
                        return 4;
                    }else{
                        return 1;
                    }
                }else{
                    return 2;
                }
            }
        }
        return 3;
    }

    public static function delete1($macb){
        $database = DatabaseFactory::getFactory()->getConnection();
        $sql2 = "UPDATE `chuyen_bay` SET `trang_thai`=0 WHERE  ma_chuyen_bay= '$macb'";
        $query2 = $database->prepare($sql2);
        $query2->execute();
        $count = $query2->rowCount();
        if($count==1)
        {
            $sql3 = "UPDATE `ve` SET `trang_thai`=0 WHERE  ma_chuyen_bay= '$macb'";
            $query3 = $database->prepare($sql3);
            $query3->execute();
            return true;
        }
        return false;
    }

    public static function getFlightline($macb){
        $database = DatabaseFactory::getFactory()->getConnection();
        $query = $database->prepare("SELECT * FROM chuyen_bay WHERE ma_chuyen_bay = :macb LIMIT 1");
        $query->execute([':macb' => $macb]);
        $sqlsb = "SELECT * FROM san_bay WHERE trang_thai=1";
        $querysb = $database->prepare($sqlsb);
        $querysb->execute();
        $sanbay = $querysb->fetchAll();
        if ($row = $query->fetch()) {
            $response['macb'] = $row->ma_chuyen_bay;
            $response['tencb'] = $row->ten;
            $response['sanbaydi'] = $row->ma_san_bay_di;
            $response['sanbayden'] = $row->ma_san_bay_den;
            $response['ngaybay'] = $row->ngay_bay;
            $response['hang'] = $row->ma_hang_hang_khong;
            $response['giobay'] = $row->gio_bay;
            $response['gioden'] = $row->gio_den;
            $response['phantram'] = $row->hoan_tien;
            $response['maybay'] = $row->so_hieu_may_bay;
            $response['tt'] = $row->trang_thai;
            $response['sanbay']=$sanbay;
            $response['thanhcong'] = true;
                return  $response;
        }
        return null;
    }
    public static function getsanbay(){
        $database = DatabaseFactory::getFactory()->getConnection();
        $sqlsb = "SELECT * FROM san_bay WHERE trang_thai!=0";
        $querysb = $database->prepare($sqlsb);
        $querysb->execute();
        $sanbay = $querysb->fetchAll();

        $sqlh = "SELECT * FROM hang_hang_khong WHERE trang_thai!=0 and loai_hang=0";
        $queryh = $database->prepare($sqlh);
        $queryh->execute();
        $hang = $queryh->fetchAll();

        $response['sanbay']=$sanbay;
        $response['hang']=$hang;
        $response['thanhcong'] = true;
        return $response;
    }
    public static function searchFlight($search,$search2,$page = 1, $rowsPerPage = 10){
        $limit = $rowsPerPage;
        $offset = $rowsPerPage * ($page - 1);

        $database = DatabaseFactory::getFactory()->getConnection();
        $raw="SELECT * FROM  chuyen_bay";
        if ($search2 == '0') {
            $raw .= ' WHERE (ma_chuyen_bay LIKE :search OR ten LIKE :search) AND trang_thai!=0 LIMIT :limit OFFSET :offset';
        } else {
            if ($search2 == '1'){
                $raw .= ' WHERE (ma_chuyen_bay LIKE :search ) AND trang_thai!=0 LIMIT :limit OFFSET :offset';
            }
            else if($search2 == '2'){
                $raw .= ' WHERE (ten LIKE :search ) AND trang_thai!=0 LIMIT :limit OFFSET :offset';
            }
        }

        $search = '%' . $search . '%';
        $query = $database->prepare($raw);

        $query->bindValue(':limit', $limit, PDO::PARAM_INT);
        $query->bindValue(':offset', $offset, PDO::PARAM_INT);
        $query->bindValue(':search', $search, PDO::PARAM_STR);
        $query->execute();
        $data = $query->fetchAll();
        
        $count = 'SELECT COUNT(ma_chuyen_bay) FROM chuyen_bay';
        if ($search2 == '0') {
            $count .= ' WHERE (ma_chuyen_bay LIKE :search OR ten LIKE :search) AND trang_thai!=0';
        } else {
            if ($search2 == '1'){
                $count .= ' WHERE (ma_chuyen_bay LIKE :search ) AND trang_thai!=0';
            }
            else if($search2 == '2'){
                $count .= ' WHERE (ten LIKE :search ) AND trang_thai!=0';
            }
        }

        $countQuery = $database->prepare($count);
        $countQuery->bindValue(':search', $search, PDO::PARAM_STR);
        $countQuery->execute();
        $totalRows = $countQuery->fetch(PDO::FETCH_COLUMN);

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
    public static function searchFlight1($search,$page = 1, $rowsPerPage = 10){
        $limit = $rowsPerPage;
        $offset = $rowsPerPage * ($page - 1);
        $database = DatabaseFactory::getFactory()->getConnection();
        $raw="";
        $count="";
        if($search==0){
            $raw.="SELECT * FROM  chuyen_bay WHERE trang_thai!=0 LIMIT :limit OFFSET :offset";
            $count .= "SELECT COUNT(ma_chuyen_bay) FROM chuyen_bay WHERE trang_thai!=0";
        } else {
            $raw.="SELECT * FROM  chuyen_bay WHERE trang_thai='$search' AND trang_thai!=0 LIMIT :limit OFFSET :offset";
            $count .= "SELECT COUNT(ma_chuyen_bay) FROM chuyen_bay WHERE trang_thai='$search' AND trang_thai!=0";
        }
        
        
        $query = $database->prepare($raw);
        $query->bindValue(':limit', $limit, PDO::PARAM_INT);
        $query->bindValue(':offset', $offset, PDO::PARAM_INT);
        $query->execute();
        $data = $query->fetchAll();
        
        
        $countQuery = $database->prepare($count);
        $countQuery->execute();
        $totalRows = $countQuery->fetch(PDO::FETCH_COLUMN);

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
    public static function getsohieu($noidi,$noiden,$hang,$ngaydi,$ngayden,$giodi,$gioden){
        $database = DatabaseFactory::getFactory()->getConnection();
        // $timee = 60;
        // date_default_timezone_set('Asia/Ho_Chi_Minh'); 
        // $giokt = date('H:i:s',strtotime('+0 hour -'.$timee.' minutes',strtotime($gioden)));

        $sql="SELECT mb.so_hieu_may_bay from hang_hang_khong kh, may_bay mb where mb.ma_hang_hang_khong = kh.ma_hang_hang_khong and
         kh.ma_hang_hang_khong = '$hang' and mb.trang_thai!=0";
        $query = $database->prepare($sql);
        $query->execute();
        $row = $query->fetchAll();
        $mamb=array();
        foreach($row as $data) {
            $bien = $data->so_hieu_may_bay;
            $mamb[$bien]=0;
        }

        $sql1="SELECT ma_chuyen_bay, so_hieu_may_bay 
        from chuyen_bay 
        where trang_thai!=0 and ngay_den = '$ngaydi' and chuyen_bay.ma_san_bay_den = '$noidi' and ma_hang_hang_khong='$hang'
        and ((chuyen_bay.gio_bay <= '$giodi' AND chuyen_bay.gio_den >= '$giodi') 
        OR (chuyen_bay.gio_bay >= '$giodi' AND chuyen_bay.gio_den <= '$gioden') 
        OR (chuyen_bay.gio_bay >= '$giodi' AND chuyen_bay.gio_den >= '$gioden')) 
        order by ngay_den desc";
        $query1 = $database->prepare($sql1);
        $query1->execute();
        $row1 = $query1->fetchAll();
        $macb=array();
        $i=0;
        foreach($row1 as $data) {
            $bien = $data->so_hieu_may_bay;
            $bien1 = $data->ma_chuyen_bay;
            if($mamb[$bien]==0) {
                $macb[$i]=$bien1;
                $mamb[$bien]=1;
                $i++;
            }
        }

        $sql3="SELECT ma_chuyen_bay, so_hieu_may_bay 
        from chuyen_bay 
        where trang_thai!=0 and ngay_den > '$ngaydi' and chuyen_bay.ma_san_bay_den = '$noidi' and ma_hang_hang_khong='$hang'
        and ((chuyen_bay.gio_bay <= '$giodi' AND chuyen_bay.gio_den >= '$giodi') 
        OR (chuyen_bay.gio_bay >= '$giodi' AND chuyen_bay.gio_den <= '$gioden') 
        OR (chuyen_bay.gio_bay >= '$giodi' AND chuyen_bay.gio_den >= '$gioden')) 
        order by ngay_den desc";
        $query3 = $database->prepare($sql3);
        $query3->execute();
        $row3 = $query3->fetchAll();
        foreach($row3 as $data) {
            $bien = $data->so_hieu_may_bay;
            $bien1 = $data->ma_chuyen_bay;
            if($mamb[$bien]==0) {
                $macb[$i]=$bien1;
                $mamb[$bien]=1;
                $i++;
            }
        }

        $sql2="SELECT ma_chuyen_bay, so_hieu_may_bay 
        from chuyen_bay 
        where ma_hang_hang_khong = '$hang'
        and ma_san_bay_den != '$noidi'
        order by ngay_den desc";
        $query2 = $database->prepare($sql2);
        $query2->execute();
        $row2 = $query2->fetchAll();

        foreach($row2 as $data) {
            $bien = $data->so_hieu_may_bay;
            $bien1 = $data->ma_chuyen_bay;
            if($mamb[$bien]==0) {
                $macb[$i]=$bien1;
                $mamb[$bien]=1;
                $i++;
            }
        }

        $tmpmaybay = array();
        $i=0;
        foreach($row as $data) {
            $bien = $data->so_hieu_may_bay;
            
            if($mamb[$bien]==0) {
                $tmpmaybay[$i]=$bien;
                $i++;
            }
        }

        return $tmpmaybay;
        
    }
    public static function changestatus($macb,$tt){
        $database = DatabaseFactory::getFactory()->getConnection();
        $sql2 = "UPDATE `chuyen_bay` SET `trang_thai`=$tt WHERE  ma_chuyen_bay= '$macb'";
        $query2 = $database->prepare($sql2);
        $query2->execute();
        $count = $query2->rowCount();
        if($count==1){
            return true;
        }
        return false;
    }
    public static function setTrangThai(){
        $database = DatabaseFactory::getFactory()->getConnection();
        
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $today = date("Y-m-d");
        $time = date("H:i:s");

        $sql1 = "UPDATE chuyen_bay SET trang_thai=4 WHERE ngay_bay <= '$today' and gio_bay<='$time' and trang_thai!=0";
        $qr1 = $database->prepare($sql1);
        $qr1->execute();
        $count = $qr1->rowCount();

        if ($count>=1) {
            return true;
        }
        return null;
    }
}