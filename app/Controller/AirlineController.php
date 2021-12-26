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
        Auth::checkAuthentication();
        // Auth::ktraquyen("CN07");
        $mahang = Request::post('mahanghangkhong1');
        $tenhang = Request::post('tenhanghangkhong1');
        $motahang = Request::post('motahanghangkhong1');
        $loaihang = Request::post('loaihanghangkhong1');
        $ngayban = Request::post('ngay_ban1');
        $kq = AirlineModel::update($mahang, $tenhang, $motahang, $loaihang, $ngayban);
        $response = [
            'thanhcong' => $kq
        ];
        $this->View->renderJSON($response);
    }

    public function delete(){
        Auth::checkAuthentication();
        // Auth::ktraquyen("CN07");
        $mahhk = Request::post('mahhk');
        $kq= AirlineModel::delete($mahhk);
        $response = [
            'thanhcong' => $kq
        ];
        $this->View->renderJSON($response);
    }

    public function deletes(){
        Auth::checkAuthentication();       
        // Auth::ktraquyen("CN07");
        $mahhks = Request::post('mahhks');
        $mahhks = json_decode($mahhks);
        $kq = AirlineModel::deletes($mahhks);
        $response = [
            'thanhcong' => $kq
        ];
        $this->View->renderJSON($response);
    }

    public function getList(){
        Auth::checkAuthentication(); // Ktra có đang đăng nhập hay chưa
        //Auth::ktraquyen("CN01");
        $search = Request::get('search');
        $page = Request::get('page', 1);
        $rowsPerPage = Request::get('rowsPerPage', 10);
        $data = AirlineModel::getList($page, $rowsPerPage);
        $this->View->renderJSON($data);
    }

    public function getAirline(){
        Auth::checkAuthentication();
        // Auth::ktraquyen("CN01");
        $mahhk = Request::post('mahhk');
        $kq1 = AirlineModel::getAirline($mahhk);
        if($kq1 == null ){
            $response['thanhcong'] = false;
        } else{   
            $response['ma_hang_hang_khong'] = $kq1->ma_hang_hang_khong;
            $response['ten'] = $kq1->ten;
            $response['mo_ta'] = $kq1->mo_ta;
            $response['loai_hang'] = $kq1->loai_hang;
            $response['ngay_ban'] = $kq1->ngay_ban;
            $response['thanhcong'] = true;
        }
        $this->View->renderJSON($response);
    }
    public function advancedSearch()
    {
        Auth::checkAuthentication();
        //Auth::ktraquyen("CN01");
        $search = Request::get('search');
        $search2 = Request::get('search2');
        $page = Request::get('page', 1);
        $rowsPerPage = Request::get('rowsPerPage', 10);
        $data = AirlineModel::getAdvancedPagination($search, $search2,$page, $rowsPerPage);
        $this->View->renderJSON($data);
    }  
    public function checkValidMaHangHangKhong()
    {   
        Auth::checkAuthentication();
        $mahanghangkhong = Request::post('mahanghangkhong');
        $mahanghangkhong1 = AirlineModel::findOneByMaHangHangKhong($mahanghangkhong);

        $response = true;

        if ($mahanghangkhong1) {
            $response = 'Mã hãng hàng không đã tồn tại trong hệ thống';
        }
        $this->View->renderJSON($response);
    }

    public function addAirline() {
        Auth::checkAuthentication();
        // Auth::ktraquyen("CN04");
        $mahang = Request::post('mahanghangkhong');
        $tenhang = Request::post('tenhanghangkhong');
        $motahang = Request::post('motahanghangkhong');
        $loaihang = Request::post('loaihanghangkhong');
        $ngayban = Request::post('ngay_ban');

        $kq = AirlineModel::create($mahang, $tenhang, $motahang, $loaihang, $ngayban);
        $response = [
            'thanhcong' => $kq
        ];
        $this->View->renderJSON($response);
    }
    
}