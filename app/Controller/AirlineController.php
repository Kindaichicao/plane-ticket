<?php

namespace App\Controller;

use App\Core\Auth;
use App\Core\Cookie;
use App\Core\Controller;
use App\Core\Request;
use App\Model\AirlineModel;

class AirlineController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function airline()
    {
        Auth::checkAuthentication();
        //Auth::ktraquyen("CN01");
        $this->View->render('airline/airline');
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
        $data = AirlineModel::getList($page, $rowsPerPage);
        $this->View->renderJSON($data);
    }

    public function getAirline(){
        Auth::checkAuthentication();
        // Auth::ktraquyen("CN01");
        $mahhk = Request::post('mahhk');
        $kq1 = AirlineModel::getAirline($mahhk);
        if($kq1 == null ){
            $response['thanhcong'] = false;
        } else{   
            $response['ma_hang_hang_khong'] = $kq1->ma_hang_hang_khong;
            $response['ten'] = $kq1->ten;
            $response['mo_ta'] = $kq1->mo_ta;
            $response['loai_hang'] = $kq1->loai_hang;
            $response['ngay_ban'] = $kq1->ngay_ban;
            $response['thanhcong'] = true;
        }
        $this->View->renderJSON($response);
    }
    public function advancedSearch()
    {
        Auth::checkAuthentication();
        //Auth::ktraquyen("CN01");
        $search = Request::get('search');
        $search2 = Request::get('search2');
        $page = Request::get('page', 1);
        $rowsPerPage = Request::get('rowsPerPage', 10);
        $data = AirlineModel::getAdvancedPagination($search, $search2,$page, $rowsPerPage);
        $this->View->renderJSON($data);
    }    
}