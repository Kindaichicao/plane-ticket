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
        $data = AirportModel::getAirport('sb1');
        $this->View->renderJSON($data['data']);
    }
    
}