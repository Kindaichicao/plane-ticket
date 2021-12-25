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

    public static function update(){
        
    }

    public static function delete(){
        
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
            $raw .= ' WHERE (ma_chuyen_bay LIKE :search OR ten_chuyen_bay LIKE :search) AND trang_thai=1 LIMIT :limit OFFSET :offset';
        } else {
            if ($search2 == '1'){
                $raw .= ' WHERE (ma_chuyen_bay LIKE :search ) AND trang_thai=1 LIMIT :limit OFFSET :offset';
            }
            else if($search2 == '2'){
                $raw .= ' WHERE (ten LIKE :search ) AND trang_thai=1 LIMIT :limit OFFSET :offset';
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
            $count .= ' WHERE (ma_chuyen_bay LIKE :search OR ten_chuyen_bay LIKE :search) AND trang_thai=1';
        } else {
            if ($search2 == '1'){
                $count .= ' WHERE (ma_chuyen_bay LIKE :search ) AND trang_thai=1';
            }
            else if($search2 == '2'){
                $count .= ' WHERE (ten LIKE :search ) AND trang_thai=1';
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
}