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
        
    }

    public function getFlihgt(){
        
    }
}