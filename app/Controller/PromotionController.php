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
        Auth::checkAuthentication();
        // Auth::ktraquyen("CN07");
        $tenkm = Request::post('tenkm');
        $ngaybdkm = Request::post('ngaybdkm');
        $ngayktkm = Request::post('ngayktkm');
        $noidungkm = Request::post('noidungkm');
        $kq = PromotionModel::create($tenkm,$ngaybdkm,$ngayktkm,$noidungkm);
        $response = [
            'thanhcong' => $kq
        ];
        $this->View->renderJSON($response);
    }

    public function update(){
        Auth::checkAuthentication();
        // Auth::ktraquyen("CN07");
        $makm= Request::post('makm');
        $tenkm = Request::post('tenkm');
        $ngaybdkm = Request::post('ngaybdkm');
        $ngayktkm = Request::post('ngayktkm');
        $noidungkm = Request::post('noidungkm');
        $kq = PromotionModel::update($makm, $tenkm,$ngaybdkm,$ngayktkm,$noidungkm);
        $response = [
            'thanhcong' => $kq
        ];
        $this->View->renderJSON($response);
    }

    public function addDetail(){
        Auth::checkAuthentication();
        // Auth::ktraquyen("CN07");
        $makm= Request::post('makm');
        $mahangdv = Request::post('mahangdv');
        $machuyenbay = Request::post('machuyenbay');
        $mahanghk = Request::post('mahanghk');
        $mahangkh = Request::post('mahangkh');
        $ptkm1 = Request::post('ptkm1');
        $kq = PromotionModel::addDetail($makm, $mahangdv,$machuyenbay,$mahanghk,$mahangkh,$ptkm1);
        $response = [
            'thanhcong' => $kq
        ];
        $this->View->renderJSON($response);
    }

    public function deleteDetail(){
        Auth::checkAuthentication();
        // Auth::ktraquyen("CN07");
        $makm= Request::post('makm');
        $mahangdv = Request::post('mahangdv');
        $machuyenbay = Request::post('machuyenbay');
        $mahanghk = Request::post('mahanghk');
        $mahangkh = Request::post('mahangkh');
        $kq = PromotionModel::deleteDetail($makm, $mahangdv,$machuyenbay,$mahanghk,$mahangkh);
        $response = [
            'thanhcong' => $kq
        ];
        $this->View->renderJSON($response);
    }

    public function delete(){
        Auth::checkAuthentication();
        // Auth::ktraquyen("CN07");
        $makm = Request::post('makm');
        $kq= PromotionModel::delete($makm);
        $response = [
            'thanhcong' => $kq
        ];
        $this->View->renderJSON($response);
    }

    public function deletes(){
        Auth::checkAuthentication();       
        // Auth::ktraquyen("CN07");
        $makms = Request::post('makms');
        $makms = json_decode($makms);
        $kq = PromotionModel::deletes($makms);
        $response = [
            'thanhcong' => $kq
        ];
        $this->View->renderJSON($response);
    }

    public function getList(){
        Auth::checkAuthentication(); // Ktra có đang đăng nhập hay chưa
        //Auth::ktraquyen("CN01");        
        $page = Request::get('page', 1);
        $rowsPerPage = Request::get('rowsPerPage', 10);
        $data = PromotionModel::getList($page, $rowsPerPage);
        $this->View->renderJSON($data);
    }

    public function getListSearch(){
        Auth::checkAuthentication();
        // Auth::ktraquyen("CN01");
        $search = Request::get('search');
        $search2 = Request::get('search2');
        $page = Request::get('page', 1);
        $rowsPerPage = Request::get('rowsPerPage', 10);
        $data = PromotionModel::getListSearch($search, $search2,$page, $rowsPerPage);
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
    public function getHangDV(){
        Auth::checkAuthentication();
        // Auth::ktraquyen("CN07");
        $data = PromotionModel::getHangDV();
        $this->View->renderJSON($data);
    }
    public function getChuyenBay(){
        Auth::checkAuthentication();
        // Auth::ktraquyen("CN07");
        $data = PromotionModel::getChuyenBay();
        $this->View->renderJSON($data);
    }
    public function getHangHK(){
        Auth::checkAuthentication();
        // Auth::ktraquyen("CN07");
        $data = PromotionModel::getHangHK();
        $this->View->renderJSON($data);
    }
    public function getHangKH(){
        Auth::checkAuthentication();
        // Auth::ktraquyen("CN07");
        $data = PromotionModel::getHangKH();
        $this->View->renderJSON($data);
    }
}