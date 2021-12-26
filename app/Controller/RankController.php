<?php

namespace App\Controller;

use App\Core\Auth;
use App\Core\Cookie;
use App\Core\Controller;
use App\Core\Request;
use App\Model\RankModel;

class RankController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function rank()
    {
        Auth::checkAuthentication();
        Auth::ktraquyen("CN09");
        $this->View->render('rank/rank');
    }

    public function create(){
        Auth::checkAuthentication();
        Auth::ktraquyen("CN09");
        $mahang = Request::post('mahang');
        $tenhang = Request::post('tenhang');
        $mucdiem = Request::post('mucdiem');
        $kq = RankModel::create($mahang, $tenhang, $mucdiem);
        $response = [
            'thanhcong' => $kq
        ];
        $this->View->renderJSON($response);
    }

    public function update(){
        Auth::checkAuthentication();
        Auth::ktraquyen("CN09");
        $mahang = Request::post('mahang');
        $tenhang = Request::post('tenhang');
        $mucdiem = Request::post('mucdiem');
        $kq= RankModel::update($mahang,$tenhang,$mucdiem);
        $response = [
            'thanhcong' => $kq
        ];
        $this->View->renderJSON($response);
    }

    public function delete(){
        Auth::checkAuthentication();
        Auth::ktraquyen("CN09");
        $mahang = Request::post('mahang');
        $kq= RankModel::delete($mahang);
        $response = [
            'thanhcong' => $kq
        ];
        $this->View->renderJSON($response);
    }
    public function deletes(){
        Auth::checkAuthentication();  
        Auth::ktraquyen("CN09");  
        $mahang = Request::post('mahang');
        $mahang = json_decode($mahang);
        $kq = RankModel::deletes($mahang);
        $response = [
            'tb' => "$kq"." hạng khách hàng đã được xóa"
        ];
        $response['thanhcong']=$kq;
        $this->View->renderJSON($response);
    }
    public function getList(){
        Auth::checkAuthentication(); // Ktra có đang đăng nhập hay chưa
        Auth::ktraquyen("CN09");
        $search = Request::get('search');
        $page = Request::get('page', 1);
        $rowsPerPage = Request::get('rowsPerPage', 10);
        $data = RankModel::getList($page, $rowsPerPage);
        $this->View->renderJSON($data);
    }

    public function getRank(){
        Auth::checkAuthentication();
        Auth::ktraquyen("CN09");
        $mahang=Request::post('mahang');
        $data = RankModel::getRank($mahang);
        if($data==null){
            $response = ['thanhcong' => false]; 
        }else{
            $response['mahang'] = $data->ma_hang_kh;
            $response['tenhang'] = $data->ten_hang;
            $response['mucdiem'] = $data->muc_diem;
            $response['thanhcong'] = true;
        }
        $this->View->renderJSON($response);
    }
    public function searchRank1(){
        Auth::checkAuthentication();
        Auth::ktraquyen("CN09");
        $search = Request::get('search');
        $search2 = Request::get('search2');
        $page = Request::get('page', 1);
        $rowsPerPage = Request::get('rowsPerPage', 10);
        $data = RankModel::searchRank($search, $search2,$page, $rowsPerPage);
        $this->View->renderJSON($data);
    }
    public function checkvaliemahang(){
        Auth::checkAuthentication();
        $mahang = Request::post('mahang');
        $mahang1 = RankModel::findOneByMahang($mahang);

        $response = true;

        if ($mahang1) {
            $response = 'Mã hạng khách hàng đã tồn tại trong hệ thống';
        }
        $this->View->renderJSON($response);
    }
    public function checkvaliemucdiem(){
        Auth::checkAuthentication();
        $mucdiem = Request::post('mucdiem');
        $mucdiem1 = RankModel::findOneBymucdiem($mucdiem);

        $response = true;

        if ($mucdiem1) {
            $response = 'Mức điểm đã tồn tại trong hệ thống';
        }
        $this->View->renderJSON($response);
    }
}