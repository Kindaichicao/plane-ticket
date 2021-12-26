<?php

namespace App\Model;

use App\Core\Cookie;
use App\Core\DatabaseFactory;
use mysqli;
use PDO;

class AirportModel
{
    public static function create($id_, $name_, $address_, $max_num_, $reve_num_, $type_, $status_)
    {
        $database = DatabaseFactory::getFactory()->getConnection();
        $sql_ = "SELECT COUNT(*) AS 'SL' FROM san_bay WHERE ma_san_bay ='".$id_."'";
        $query = $database->query($sql_);
        $num= $query ->fetch();
        if($num->SL>0){
            $data['thanhcong'] = false;
            $data['error'] = -1;
            return $data;
        }
        $sql = "INSERT INTO san_bay(ma_san_bay,ten,dia_diem,so_luong_may_bay_toi_da,so_luong_may_bay_du_bi, loai_san_bay, trang_thai) VALUES('".$id_."','".$name_."','".$address_."',".$max_num_.",".$reve_num_.",'".$type_."',".$status_.")";
        $query = $database -> prepare($sql);
        $query -> execute();
    }

    public static function update()
    {
    }

    public static function delete()
    {
    }

    public static function getAirport($masb)
    {
        $database = DatabaseFactory::getFactory()->getConnection();
        $query = $database->prepare("SELECT * FROM san_bay WHERE ma_san_bay = :masb LIMIT 1");
        $query->execute([':masb' => $masb]);

        if ($row = $query->fetch()) {
            return $row;
        }
        return null;
    }

    public static function getList($page = 1, $rowsPerPage = 10)
    {
        $limit = $rowsPerPage;
        $offset = $rowsPerPage * ($page - 1);

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT * from san_bay WHERE trang_thai = 1 LIMIT :limit OFFSET :offset"; // limit 0,5

        $query = $database->prepare($sql);

        $query->bindValue(':limit', $limit, PDO::PARAM_INT);
        $query->bindValue(':offset', $offset, PDO::PARAM_INT);

        $query->execute();
        $data = $query->fetchAll(); 

        $count = 'SELECT COUNT(*) FROM san_bay WHERE trang_thai = 1';

        $countQuery = $database->query($count);
        $totalRows = $countQuery->fetch(PDO::FETCH_COLUMN); 
        $response = [
            'page' => $page,
            'rowsPerPage' => $rowsPerPage,
            'totalPage' => ceil(intval($totalRows) / $rowsPerPage), // 4 trang
            'data' => $data,
        ];
        return $response;
    }
}
