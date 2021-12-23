<?php

namespace App\Controller;

use App\Core\Auth;
use App\Core\Cookie;
use App\Core\Controller;
use App\Core\Request;
use App\Model\PositionModel;

class PositionController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function position()
    {
        Auth::checkAuthentication();
        //Auth::ktraquyen("CN01");
        $this->View->render('position/position');
    }

    public function create(){

    }

    public function update(){
        
    }

    public function delete(){
        
    }

    public function getList(){
        
    }

    public function getPosition(){
        
    }
}