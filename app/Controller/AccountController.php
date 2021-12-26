<?php

namespace App\Controller;

use App\Core\Auth;
use App\Core\Cookie;
use App\Core\Controller;
use App\Core\Request;
use App\Model\AccountModel;

class AccountController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function account()
    {
        Auth::checkAuthentication();
        //Auth::ktraquyen("CN01");
        $this->View->render('account/account');
    }

    public function getAccount()
    {
        Auth::checkAuthentication();
        //Auth::ktraquyen("CN01");
        $search = Request::get('search');
        $page = Request::get('page', 1);
        $rowsPerPage = Request::get('rowsPerPage', 10);
        $data = AccountModel::getAllPagination($search, $page, $rowsPerPage);
        $this->View->renderJSON($data);
    }

    public function create()
    {
        Auth::checkAuthentication();
        //Auth::ktraquyen("CN01");
        $email = Request::post('email');
        $password = Request::post('password');
        $ma = Request::post('ma');
        $maquyen = Request::post('maquyen');
        $kq = AccountModel::create($email, $password, $maquyen,$ma );
        $response = [
            'thanhcong' => $kq
        ];
        $this->View->renderJSON($response);
    }
    public function create2()
    {
        Auth::checkAuthentication();
        //Auth::ktraquyen("CN01");
        $email = Request::post('email');
        $password = Request::post('password');
        $ma = Request::post('ma');
        $maquyen = Request::post('maquyen');
        $kq = AccountModel::create2($email, $password, $maquyen,$ma);
        $response = [
            'thanhcong' => $kq
        ];
        $this->View->renderJSON($response);
    }

    public function register()
    {
        $email = Request::post('email');
        $password = Request::post('password');
        $fullname = Request::post('fullname');
        $macv = "CV001";
        $kq = AccountModel::register($email, $password, $fullname, $macv);
        $response = [
            'thanhcong' => $kq
        ];
        $this->View->renderJSON($response);
    }

    public function forgotPassword(){
        $email = Request::post('email');
        $kq = AccountModel::forgotPassword($email);
        $response = [
            'thanhcong' => $kq
        ];
        $this->View->renderJSON($response);
    }

    public function update(){
        Auth::checkAuthentication();
        //Auth::ktraquyen("CN01");
        $email = Request::post('email');
        $fullname = Request::post('fullname');
        $maquyen = Request::post('maquyen');
        $kq= AccountModel::update($email,$fullname,$maquyen);
        $response = [
            'thanhcong' => $kq
        ];
        $this->View->renderJSON($response);
    }

    public function delete()
    {
        Auth::checkAuthentication();
        //Auth::ktraquyen("CN01");
        $email = Request::post('email');
        $kq= AccountModel::delete($email);
        $response = [
            'thanhcong' => $kq
        ];
        $this->View->renderJSON($response);
    }

    public function deletes(){
        Auth::checkAuthentication();  
        //Auth::ktraquyen("CN01");     
        $emails = Request::post('emails');
        $emails = json_decode($emails);
        $kq = AccountModel::deletes($emails);
        $response = [
            'thanhcong' => $kq
        ];
        $this->View->renderJSON($response);
    }

    public function viewUser()
    {
        Auth::checkAuthentication();
        //Auth::ktraquyen("CN01");
        $email = Request::post('email');
        $kq = AccountModel::findOneByEmail($email);
        $response = ['thanhcong' => false];
        if($kq == null){
            $response['thanhcong'] = false;
        } else{   
            $response['ma_tk'] = $kq->ma_tk;
            $response['username'] = $kq->username;
            $response['ma_cv'] = $kq->ma_cv;
            $response['thanhcong'] = true;
        }
        $this->View->renderJSON($response);
        
    }

    public function checkValidEmail()
    {   
        Auth::checkAuthentication();
        $email = Request::post('email');
        $user = AccountModel::findOneByEmail($email);

        $response = true;

        if ($user) {
            $response = 'Tên đăng nhập đã đựợc người khác sử dụng';
        }
        $this->View->renderJSON($response);
    }

    public function checkValidEmailRegister()
    {   
        $email = Request::post('email');
        $user = AccountModel::findOneByEmail($email);

        $response = true;

        if ($user) {
            $response = 'Tên đăng nhập đã đựợc người khác sử dụng';
        }
        $this->View->renderJSON($response);
    }

    public function advancedSearch()
    {
        Auth::checkAuthentication();
        //Auth::ktraquyen("CN01");
        $search = Request::get('search');
        $page = Request::get('page', 1);
        $rowsPerPage = Request::get('rowsPerPage', 10);
        $data = AccountModel::getAdvancedPagination($search, $page, $rowsPerPage);
        $this->View->renderJSON($data);
    }

    public function getGiangVien(){
        Auth::checkAuthentication();
        $data = AccountModel::getGV();
        $this->View->renderJSON($data);
    }

    public function getID(){
        Auth::checkAuthentication();
        $data = AccountModel::getID();
        $this->View->renderJSON($data);
    }

    public function changePassword(){
        Auth::checkAuthentication();
        $id = Cookie::get('user_email');
        $user = AccountModel::findOneByEmail($id);
        $oldpassword = Request::post('oldpassword');
        $newpassword = Request::post('newpassword');
        $isValid = password_verify($oldpassword, $user->hash_password);
        if (!$isValid) {
            $response=['thanhcong' => false];
            return $this->View->renderJSON($response);
        }else{
            $kq = AccountModel::changePassword($id, $newpassword);
            $response = [
                'thanhcong' => $kq
            ];
            return $this->View->renderJSON($response);
        }
    }
}
