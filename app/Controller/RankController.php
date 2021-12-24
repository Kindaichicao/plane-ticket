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
        //Auth::ktraquyen("CN01");
        $this->View->render('rank/rank');
    }

    public function create(){
        
    }

    public function update(){
        
    }

    public function delete(){
        
    }

    public function getList(){
        Auth::checkAuthentication(); // Ktra có đang đăng nhập hay chưa
        //Auth::ktraquyen("CN01");
        $search = Request::get('search');
        $page = Request::get('page', 1);
        $rowsPerPage = Request::get('rowsPerPage', 10);
        $data = RankModel::getList($page, $rowsPerPage);
        $this->View->renderJSON($data);
    }

    public function getRank(){
        Auth::checkAuthentication();
        //Auth::ktraquyen("CN01");
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
}