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
        
    }

    public function getAirline(){
        
    }
}