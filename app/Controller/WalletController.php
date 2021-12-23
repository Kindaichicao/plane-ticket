<?php

namespace App\Controller;

use App\Core\Auth;
use App\Core\Cookie;
use App\Core\Controller;
use App\Core\Request;
use App\Model\WalletModel;

class WalletController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function account()
    {
        Auth::checkAuthentication();
        //Auth::ktraquyen("CN01");
        $this->View->render('wallet/wallet');
    }

    public static function bankConnection(){

    }

    public static function topUp(){
        
    }

    public static function withdraw(){
        
    }

    public static function payment(){
        
    }

    public static function paymentHistory(){
        
    }
}