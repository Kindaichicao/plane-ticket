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
        
    }

    public function delete(){
        
    }

    /*public function getList(){
        Auth::checkAuthentication();
        //Auth::ktraquyen("CN02");
        $search = Request::get('search');
        $page = Request::get('page', 1);
        $rowsPerPage = Request::get('rowsPerPage', 20);
        $data = PlaneModel::getAllPagination($search, $page, $rowsPerPage);
        $this->View->renderJSON($data);      
    }*/

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