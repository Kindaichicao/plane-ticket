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

    public function wallet()
    {
        Auth::checkAuthentication();
        //Auth::ktraquyen("CN01");
        $this->View->render('wallet/wallet');
    }
    

    public function bankConnection(){

    }

    public function topUp(){
        
    }

    public function withdraw(){
        
    }

    public function payment(){
        
    }

    public function paymentHistory(){
        
    }

    public function readPoint(){
        Auth::checkAuthentication();
        //Auth::ktraquyen("CN11");
        $point = WalletModel::getPoint(Cookie::get('user_email'));
        $hangs = WalletModel::getList();
        foreach($hangs as $value){
            if($point >= $value->muc_diem){
                $rank = $value->ten_hang;
            } else {
                $rankNew = $value->ten_hang;
                $diemNew = $value->muc_diem - $point;
                break;
            }
        }
        $response = [
            'diem' => $point,
            'diemmoi' => $diemNew,
            'rank' => $rank,
            'rankNew' => $rankNew
        ];
        $this->View->renderJSON($response);
    }
    public function checkConnection(){
        Auth::checkAuthentication();
        //Auth::ktraquyen("CN11");
        $point = WalletModel::getPoint(Cookie::get('user_email'));
        $hangs = WalletModel::getList();
        foreach($hangs as $value){
            if($point >= $value->muc_diem){
                $rank = $value->ten_hang;
            } else {
                $rankNew = $value->ten_hang;
                $diemNew = $value->muc_diem - $point;
                break;
            }
        }
        $response = [
            'diem' => $point,
            'diemmoi' => $diemNew,
            'rank' => $rank,
            'rankNew' => $rankNew
        ];
        $this->View->renderJSON($response);
    }
}