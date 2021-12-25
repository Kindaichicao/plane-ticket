<?php

namespace App\Controller;

use App\Core\Auth;
use App\Core\Cookie;
use App\Core\Controller;
use App\Core\Request;
use App\Model\FlightModel;

class FlightController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function flight()
    {
        Auth::checkAuthentication();
        //Auth::ktraquyen("CN01");
        $this->View->render('flight/flight');
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
        $data = FlightModel::getList($page,$rowsPerPage);
        $this->View->renderJSON($data);
    }

    public function getFlight(){
        Auth::checkAuthentication();
        //Auth::ktraquyen("CN01");
        $macb=Request::post('macb');
        $data = FlightModel::getFlightline($macb);
        if($data==null){
            $data['thanhcong']=false;
        }
        $this->View->renderJSON($data);
    }

    public function getsanbay(){
        Auth::checkAuthentication();
        $data = FlightModel::getsanbay();
        if($data==null){
            $data['thanhcong']=false;
        }
        $this->View->renderJSON($data);
    }
    public function searchFlight(){
        Auth::checkAuthentication();
        // Auth::ktraquyen("CN01");
        $search = Request::get('search');
        $search2 = Request::get('search2');
        $page = Request::get('page', 1);
        $rowsPerPage = Request::get('rowsPerPage', 10);
        $data = FlightModel::searchFlight($search, $search2,$page, $rowsPerPage);
        $this->View->renderJSON($data);
    }
}