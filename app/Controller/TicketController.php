<?php

namespace App\Controller;

use App\Core\Auth;
use App\Core\Cookie;
use App\Core\Controller;
use App\Core\Request;
use App\Model\TicketModel;

class TicketController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function ticket()
    {
        Auth::checkAuthentication();
        Auth::ktraquyen("CN18");
        $this->View->render('ticket/ticket');
    }

    

    public function create(){
        Auth::checkAuthentication();
        Auth::ktraquyen("CN18");
        $macb = Request::post('machuyenbay1');
        $ghethuong = Request::post('ghethuong');
        $ghethuonggia = Request::post('ghethuonggia');
        $giagocthuonggia = Request::post('giagocthuonggia');
        $giathuethuonggia = Request::post('giathuethuonggia');
        $giagocthuong = Request::post('giagocthuong');
        $giathuethuong = Request::post('giathuethuong');
        $kq = TicketModel::create($macb, $ghethuong, $ghethuonggia, $giagocthuonggia, $giathuethuonggia, $giagocthuong, $giathuethuong);
        $response = [
            'thanhcong' => $kq
        ];
        $this->View->renderJSON($response);
    }

    public function update(){
        Auth::checkAuthentication();
        Auth::ktraquyen("CN18");
        $macb = Request::post('suamachuyenbay1');
        $ghethuong = Request::post('suaghethuong');
        $ghethuonggia = Request::post('suaghethuonggia');
        $giagocthuonggia = Request::post('suagiagocthuonggia');
        $giathuethuonggia = Request::post('suagiathuethuonggia');
        $giagocthuong = Request::post('suagiagocthuong');
        $giathuethuong = Request::post('suagiathuethuong');
        $kq = TicketModel::update($macb, $ghethuong, $ghethuonggia, $giagocthuonggia, $giathuethuonggia, $giagocthuong, $giathuethuong);
        $response = [
            'thanhcong' => true
        ];
        $this->View->renderJSON($response);
    }
    
    public function delete(){
        
    }

    public function getList(){
        Auth::checkAuthentication(); // Ktra có đang đăng nhập hay chưa
        Auth::ktraquyen("CN18");
        $search = Request::get('search');
        $page = Request::get('page', 1);
        $rowsPerPage = Request::get('rowsPerPage', 1);
        $data = TicketModel::getList($page, $rowsPerPage);
        $this->View->renderJSON($data);
    }
    public function getList1(){
        Auth::checkAuthentication(); // Ktra có đang đăng nhập hay chưa
        Auth::ktraquyen("CN18");
        $search = Request::get('search');
        $page = Request::get('page', 1);
        $rowsPerPage = Request::get('rowsPerPage', 10);
        $data = TicketModel::getList1($page, $rowsPerPage);
        $this->View->renderJSON($data);
    }
    public function getList2(){
        Auth::checkAuthentication(); // Ktra có đang đăng nhập hay chưa
        Auth::ktraquyen("CN18");
        $search = Request::get('search');
        $page = Request::get('page', 1);
        $rowsPerPage = Request::get('rowsPerPage', 10);
        $data = TicketModel::getList2($page, $rowsPerPage);
        $this->View->renderJSON($data);
    }

    public function getTicket(){
        
    }

    public function viewTicket()
    {
        Auth::checkAuthentication();
        Auth::ktraquyen("CN18");
        $mav = Request::post('mav');
        $kq = TicketModel::findOneByMaVe($mav);
        $kq1 = TicketModel::findOneBySanBay1($kq->ma_san_bay_di);
        $kq2 = TicketModel::findOneBySanBay2($kq->ma_san_bay_den);
        $response = ['thanhcong' => false];
        if($kq == null){
            $response['thanhcong'] = false;
        } else{   
            $response['ve'] = $kq->ma_ve;
            $response['hangkhong'] = $kq->tenhhk;
            $response['maybay'] = $kq->so_hieu_may_bay;
            $response['chuyenbay'] = $kq->ten;
            $response['ngaybay'] = $kq->ngay_bay;
            $response['noidi'] = $kq1->dia_diem;
            $response['noiden'] = $kq2->dia_diem;
            $response['giodi'] = $kq->gio_bay;
            $response['gioden'] = $kq->gio_den;
            $response['hangdichvu'] = $kq->ten_hang;
            $response['soghe'] = $kq->so_ghe;
            $response['giagoc'] = $kq->gia_goc;
            $response['tienthue'] = $kq->tien_thue;
            $response['thanhcong'] = true;
        }
        $this->View->renderJSON($response);
        
    }

    public function viewTicket1()
    {
        Auth::checkAuthentication();
        Auth::ktraquyen("CN18");
        $macb = Request::post('macb');
        $kq = TicketModel::findOneByChuyenBay($macb);
        $kq1 = TicketModel::findOneBySanBay1($kq->ma_san_bay_di);
        $kq2 = TicketModel::findOneBySanBay2($kq->ma_san_bay_den);
        $kq3 = TicketModel::GetHangThuong();
        $kq4 = TicketModel::GetHangThuongGia();
        $response = ['thanhcong' => false];
        if($kq == null){
            $response['thanhcong'] = false;
        } else{   
            $response['chuyenbay'] = $kq->ma_chuyen_bay;
            $response['tenhang'] = $kq->tenhhk;
            $response['sohieumaybay'] = $kq->so_hieu_may_bay;
            $response['ngaybay'] = $kq->ngay_bay;
            $response['noidi'] = $kq1->dia_diem;
            $response['noiden'] = $kq2->dia_diem;
            $response['giodi'] = $kq->gio_bay;
            $response['gioden'] = $kq->gio_den;
            $response['ghethuong'] = $kq3->ma_hang_dich_vu;
            $response['ghethuonggia'] = $kq4->ma_hang_dich_vu;
            $response['thanhcong'] = true;
        }
        $this->View->renderJSON($response);
        
    }

    public function viewTicket2()
    {
        Auth::checkAuthentication();
        Auth::ktraquyen("CN18");
        $macb = Request::post('macb');
        $kq = TicketModel::findOneByChuyenBay2($macb);
        $kq1 = TicketModel::findOneBySanBay1($kq->ma_san_bay_di);
        $kq2 = TicketModel::findOneBySanBay2($kq->ma_san_bay_den);
        $kq3 = TicketModel::GetHangThuong();
        $kq4 = TicketModel::GetHangThuongGia();
        $kq5 = TicketModel::Getgiathuong($macb, $kq3->ma_hang_dich_vu);
        $kq6 = TicketModel::Getgiathuonggia($macb, $kq4->ma_hang_dich_vu);
        $response = ['thanhcong' => false];
        if($kq == null){
            $response['thanhcong'] = false;
        } else{   
            $response['chuyenbay'] = $kq->ma_chuyen_bay;
            $response['tenhang'] = $kq->tenhhk;
            $response['sohieumaybay'] = $kq->so_hieu_may_bay;
            $response['ngaybay'] = $kq->ngay_bay;
            $response['noidi'] = $kq1->dia_diem;
            $response['noiden'] = $kq2->dia_diem;
            $response['giodi'] = $kq->gio_bay;
            $response['gioden'] = $kq->gio_den;
            $response['ghethuong'] = $kq3->ma_hang_dich_vu;
            $response['ghethuonggia'] = $kq4->ma_hang_dich_vu;
            $response['giagocthuong'] = $kq5->gia_goc;
            $response['giathuethuong'] = $kq5->tien_thue;
            $response['giagocthuonggia'] = $kq6->gia_goc;
            $response['giathuethuonggia'] = $kq6->tien_thue;
            $response['thanhcong'] = true;
        }
        $this->View->renderJSON($response);
        
    }
    public function getListSearch(){
        Auth::checkAuthentication();
        Auth::ktraquyen("CN18");
        $search = Request::get('search');
        $search2 = Request::get('search2');
        $page = Request::get('page', 1);
        $rowsPerPage = Request::get('rowsPerPage', 10);
        $data = TicketModel::getListSearch($search, $search2,$page, $rowsPerPage);
        $this->View->renderJSON($data);
    }

    public function setTrangThai(){
        Auth::checkAuthentication();
        Auth::ktraquyen("CN18");
        $data = TicketModel::setTrangThai();
        $response = ['thanhcong' => false];
        if($data == null){
            $response['thanhcong'] = false;
        } else{   
            $response['thanhcong'] = true;
        }
        $this->View->renderJSON($response);
    }
}