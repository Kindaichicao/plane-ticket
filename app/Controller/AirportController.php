<?php

namespace App\Controller;

use App\Core\Auth;
use App\Core\Cookie;
use App\Core\Controller;
use App\Core\Request;
use App\Model\AirportModel;

class AirportController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function airport()
    {
        Auth::checkAuthentication();
        //Auth::ktraquyen("CN01");
        $this->View->render('airport/airport');
    }

    public function create(){
        Auth::checkAuthentication();
        $id = Request::get('id_');
        $name = Request::get('name_');
        $dd = Request::get('diadiem_');
        $sltd = Request::get('max_number_');
        $sldb = Request::get('resever_number_');
        $type = Request::get('loai_');
        $data = AirportModel::create($id, $name, $dd, $sltd, $sldb, $type,1);
        $this->View->renderJSON($data);
    
    }

    public function update(){
        
    }

    public function delete(){
        
    }

    public function getList(){
        Auth::checkAuthentication(); 
        $page = Request::get('page', 1);
        $rowsPerPage = Request::get('rowsPerPage', 10);
        $data = AirportModel::getList($page, $rowsPerPage);
        $this->View->renderJSON($data['data']);
    }

    public function getAirport(){
        Auth::checkAuthentication(); 
        $ma_san_bat = Request::get('ma_san_bay',null);
        $data = AirportModel::getAirport('sb');
        $this->View->renderJSON($data['data']);
    }
    
}