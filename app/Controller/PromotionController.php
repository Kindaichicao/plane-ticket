<?php

namespace App\Controller;

use App\Core\Auth;
use App\Core\Cookie;
use App\Core\Controller;
use App\Core\Request;
use App\Model\PromotionModel;

class PromotionController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function promotion()
    {
        Auth::checkAuthentication();
        //Auth::ktraquyen("CN01");
        $this->View->render('promotion/promotion');
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
        $page = Request::get('page', 1);
        $rowsPerPage = Request::get('rowsPerPage', 10);
        $data = PromotionModel::getList($page, $rowsPerPage);
        $this->View->renderJSON($data);
    }

    public function getPromotion(){
        Auth::checkAuthentication();
        // Auth::ktraquyen("CN01");
        $makm = Request::post('makm');
        $kq1 = PromotionModel::getPromotion($makm);
        // $kq2 = PositionModel::getPositionDetails($macv);
        if($kq1 == null ){
            $response['thanhcong'] = false;
        } else{   
            $response['ma_km'] = $kq1->ma_km;
            $response['ten'] = $kq1->ten;
            $response['ngay_bat_dau'] = $kq1->ngay_bat_dau;
            $response['ngay_ket_thuc'] = $kq1->ngay_ket_thuc;
            $response['noi_dung'] = $kq1->noi_dung;
            // $response['chitiet'] = $kq2['data'];
            $response['thanhcong'] = true;
        }
        $this->View->renderJSON($response);
    }
    public function getPromotionDetail(){
        Auth::checkAuthentication();
        // Auth::ktraquyen("CN01");
        $makm = Request::post('makm');
        $kq2 = PromotionModel::getPromotionDetail($makm);
        if($kq2 == null ){
            $response['thanhcong'] = false;
        } else{              
            $response['chitiet'] = $kq2['data'];
            $response['thanhcong'] = true;
        }
        $this->View->renderJSON($response);
    }
}