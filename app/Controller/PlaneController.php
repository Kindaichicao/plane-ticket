<?php

namespace App\Controller;

use App\Core\Auth;
use App\Core\Cookie;
use App\Core\Controller;
use App\Core\Request;
use App\Model\PlaneModel;

class PlaneController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function plane()
    {
        Auth::checkAuthentication();
        //Auth::ktraquyen("CN01");
        $this->View->render('plane/plane');
    }
    
    public function checkValidPlane()
    {   
        Auth::checkAuthentication();
        $sohieu = Request::post('sohieu');
        $maybay = PlaneModel::findOneBySoHieu($sohieu);

        $response = true;

        if ($maybay) {
            $response = 'Số hiệu máy bay đã tồn tại trong hệ thống';
        }
        $this->View->renderJSON($response);
    }

    public function findOneBySoHieu(){
        Auth::checkAuthentication();
        $sohieu = Request::post('sohieu');
        $kq = PlaneModel::findOneBySoHieu($sohieu);
        $response = ['thanhcong' => false];
        if ($kq == null) {
            $response['thanhcong'] = false;
        } else {
            $response['so_hieu_may_bay'] = $kq->so_hieu_may_bay;
            $response['ma_hang_hang_khong'] = $kq->ma_hang_hang_khong;
            $response['so_ghe_thuong'] = $kq->so_ghe_thuong;
            $response['so_ghe_thuong_gia'] = $kq->so_ghe_thuong_gia;
            $response['thanhcong'] = true;
        }
        $this->View->renderJSON($response);
    }

    public function create(){
        Auth::checkAuthentication();
        //Auth::ktraquyen("CN02");
        $sohieu = Request::post('sohieu');
        $hang = Request::post('hang');
        $ghethuong = Request::post('ghethuong');
        $thuonggia = Request::post('thuonggia');
        $kq = PlaneModel::create($sohieu, $hang, $ghethuong, $thuonggia);
        $response = [
            'thanhcong' => $kq
        ];
        $this->View->renderJSON($response);
    }

    public function update(){
        //Auth::ktraquyen("CN02");
        $sohieu = Request::post('upsohieu');
        $hang = Request::post('re-cars-hang');
        $ghethuong = Request::post('upghethuong');
        $thuonggia = Request::post('upthuonggia');
        $kq= PlaneModel::update($sohieu, $hang, $ghethuong, $thuonggia);
        $response = [
            'thanhcong' => $kq
        ];
        $this->View->renderJSON($response);
        
    }

    public function delete(){
        Auth::checkAuthentication();
       // Auth::ktraquyen("CN02");
        $sohieu = Request::post('sohieu');
        $kq= PlaneModel::delete($sohieu);
        $response = [
            'thanhcong' => $kq
        ];
        $this->View->renderJSON($response);        
    }

    public function deletes(){
        Auth::checkAuthentication();       
        //Auth::ktraquyen("CN02");
        $sohieus = Request::post('sohieus');
        $sohieus = json_decode($sohieus);
        $kq = PlaneModel::deletes($sohieus);
        $response = [
            'thanhcong' => $kq
        ];
        $this->View->renderJSON($response);       
    }

    public function getPlane(){
        Auth::checkAuthentication();
        //Auth::ktraquyen("CN02");
        $search = Request::get('search');
        $search2 = Request::get('search2');
        $page = Request::get('page');
        $rowsPerPage = Request::get('rowsPerPage');
        $data = PlaneModel::getAllPagination($search, $search2, $page, $rowsPerPage);
        $this->View->renderJSON($data);
    }

    public function getNameAirlines(){
        Auth::checkAuthentication();
        $data = PlaneModel::getNameAirlines();
        $this->View->renderJSON($data);
    }
    
}