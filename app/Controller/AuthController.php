<?php

namespace App\Controller;

use App\Core\Auth;
use App\Core\Controller;
use App\Core\Cookie;
use App\Core\Redirect;
use App\Core\Request;
use App\Model\AccountModel;

class AuthController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        Auth::checkNotAuthentication();
        return $this->View->render('auth/login');
    }

    public function loginPost()
    {
        Auth::checkNotAuthentication();
        $email = Request::post('email');
        $password = Request::post('password');

        $result = [
            'thanhcong' => true,
        ];
        // Kiểm tra email có tồn tại không
        $user = AccountModel::findOneByEmailLogin($email);
        if (!$user) {
            $result['thanhcong'] = false;
            $result['summary'] = 'Tên đăng nhập hoặc mật khẩu không chính xác';
            return $this->View->renderJSON($result);
        } 


        // Kiểm tra password
        $isValid = password_verify($password, $user->hash_password);
        if (!$isValid) {
            $result['thanhcong'] = false;
            $result['summary'] = 'Tên đăng nhập hoặc mật khẩu không chính xác';
            return $this->View->renderJSON($result);
        }
        
        // Kiểm tra tài lhoanr hoạt động
        if($user->trang_thai == 0){
            $result['thanhcong'] = false;
            $result['summary'] = 'Tài khoản đã bị khóa';
            return $this->View->renderJSON($result);
        }

        // Cookie::set('user_id', $user->id);
        $ho_ten = AccountModel::findHoTen($user->ma_cv,$user->ma_tk);
        Cookie::set('user_fullname', $ho_ten->ho_ten);
        Cookie::set('user_email', $user->username);
        Cookie::set('user_quyen',$user->ma_cv);
        Cookie::set('user_matk',$user->ma_tk);
        Cookie::set('user_logged_in', true);
        // can set them nhung cái cần
        return $this->View->renderJSON($result);
    }

    public function register()
    {
        Auth::checkNotAuthentication();
        return $this->View->render('auth/register');
    }

    public function forgotpassword()
    {
        Auth::checkNotAuthentication();
        return $this->View->render('auth/forgotpassword');
    }

    public function registerPost()
    {
        Auth::checkNotAuthentication();
        $email = Request::post('email');
        $password = Request::post('password');
        $fullname = Request::post('fullname');
        $maquyen = Request::post('maquyen');
        AccountModel::create($email, $password, $fullname,$maquyen);
        Redirect::to('auth/login');
    }

    public function logout()
    {
        // Đã đăng nhập thì mới đăng xuất
        Auth::checkAuthentication();
        Cookie::destroy();
        Redirect::home();
    }
}
