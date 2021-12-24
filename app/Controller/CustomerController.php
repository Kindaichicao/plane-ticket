<?php

namespace App\Controller;

use App\Core\Auth;
use App\Core\Cookie;
use App\Core\Controller;
use App\Core\Request;
use App\Model\CustomerModel;

class CustomerController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function customer()
    {
        Auth::checkAuthentication();
        //Auth::ktraquyen("CN01");
        $this->View->render('customer/customer');
    }

    public function create(){
        Auth::checkAuthentication();
        //Auth::ktraquyen("CN01");
        $fullname = Request::post('fullnamekh');
        $hochieu = Request::post('hochieukh');
        $cccd = Request::post('cccdkh');
        $sdt = Request::post('numberphonekh');
        $email = Request::post('emailkh');
        $ngaysinh = Request::post('birthdaykh');
        $gender = Request::post('genderkh');
        $address = Request::post('addresskh');
        $kq = CustomerModel::create($fullname, $hochieu, $cccd, $sdt, $email, $ngaysinh, $gender, $address);
        $response = [
            'thanhcong' => $kq
        ];
        $this->View->renderJSON($response);
    }

    public function update(){
        
    }

    public function delete(){
        
    }

    public function getList(){
        Auth::checkAuthentication(); // Ktra có đang đăng nhập hay chưa
        //Auth::ktraquyen("CN01");
        $search = Request::get('search');
        $page = Request::get('page', 1);
        $rowsPerPage = Request::get('rowsPerPage', 10);
        $data = CustomerModel::getList($page, $rowsPerPage);
        $this->View->renderJSON($data);
    }

    public function getCustomer(){
        
    }
    public function viewCustomer()
    {
        Auth::checkAuthentication();
        //Auth::ktraquyen("CN01");
        $makh = Request::post('makh');
        $kq = CustomerModel::findOneByMaKH($makh);
        $response = ['thanhcong' => false];
        if($kq == null){
            $response['thanhcong'] = false;
        } else{   
            $response['FullName'] = $kq->ho_ten;
            $response['tenhang'] = $kq->ten_hang;
            $response['hochieu'] = $kq->so_ho_chieu;
            $response['cccd'] = $kq->cccd;
            $response['sdt'] = $kq->sdt;
            $response['email'] = $kq->email;
            $response['date'] = $kq->ngay_sinh;
            $response['gender'] = $kq->gioi_tinh;
            $response['address'] = $kq->dia_chi;
            $response['diemtichluy'] = $kq->diem_tich_luy;
            $response['thanhcong'] = true;
        }
        $this->View->renderJSON($response);
        
    }
}