<?php

namespace App\Controller;

use App\Core\Auth;
use App\Core\Cookie;
use App\Core\Controller;
use App\Core\Request;
use App\Model\FlightModel;

class FlightController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function flight()
    {
        Auth::checkAuthentication();
        //Auth::ktraquyen("CN05");
        $this->View->render('flight/flight');
    }

    public function create(){
        Auth::checkAuthentication();
        //Auth::ktraquyen("CN05");
        $tencb= Request::post('tencb');
        $noidi= Request::post('noidi');
        $noiden= Request::post('noiden');
        $hang= Request::post('hang');
        $maybay= Request::post('themmaybay');
        $giodi= Request::post('giodi1');
        $gioden=Request::post('giodi2');
        $ngaybay=Request::post('ngaybay');
        $ngayden=Request::post('ngayden');
        $kq = FlightModel::create($tencb,$noidi,$noiden,$hang,$maybay,$giodi,$gioden,$ngaybay,$ngayden);
        $response = [
            'thanhcong' => $kq
        ];
        $this->View->renderJSON($response);
    }

    
    public function getsohieu(){
        Auth::checkAuthentication();
        //Auth::ktraquyen("CN05");
        $noidi= Request::post('noidi');
        $noiden= Request::post('noiden');
        $hang= Request::post('hang');
        $ngaydi= Request::post('ngaybay');
        $ngayden= Request::post('ngayden');
        $giodi= Request::post('giodi');
        $gioden= Request::post('gioden');
        $data = FlightModel::getsohieu($noidi,$noiden,$hang,$ngaydi,$ngayden,$giodi,$gioden);
        $this->View->renderJSON($data);
    }

    public function update(){
        
    }

    public function delete(){
        Auth::checkAuthentication();
        //Auth::ktraquyen("CN05");
        $macb = Request::post('macb');
        $kq= FlightModel::delete($macb);
        //echo $macb;
        $response = [
            'thanhcong' => $kq
        ];
        $this->View->renderJSON($response);
    }

    public function delete1(){
        Auth::checkAuthentication();
        //Auth::ktraquyen("CN05");
        $macb = Request::post('macb');
        $kq= FlightModel::delete1($macb);
        $response = [
            'thanhcong' => $kq
        ];
        $this->View->renderJSON($response);
    }

    public function getList(){
        Auth::checkAuthentication(); // Ktra có đang đăng nhập hay chưa
        //Auth::ktraquyen("CN05");
        $search = Request::get('search');
        $page = Request::get('page', 1);
        $rowsPerPage = Request::get('rowsPerPage', 10);
        $data = FlightModel::getList($page,$rowsPerPage);
        $this->View->renderJSON($data);
    }

    public function getFlight(){
        Auth::checkAuthentication();
        //Auth::ktraquyen("CN05");
        $macb=Request::post('macb');
        $data = FlightModel::getFlightline($macb);
        if($data==null){
            $data['thanhcong']=false;
        }
        $this->View->renderJSON($data);
    }

    public function getsanbay(){
        Auth::checkAuthentication();
        //Auth::ktraquyen("CN05");
        $data = FlightModel::getsanbay();
        if($data==null){
            $data['thanhcong']=false;
        }
        $this->View->renderJSON($data);
    }
    public function searchFlight(){
        Auth::checkAuthentication();
        //Auth::ktraquyen("CN05");
        $search = Request::get('search');
        $search2 = Request::get('search2');
        $page = Request::get('page', 1);
        $rowsPerPage = Request::get('rowsPerPage', 10);
        $data = FlightModel::searchFlight($search, $search2,$page, $rowsPerPage);
        $this->View->renderJSON($data);
    }
    public function searchFlight1(){
        Auth::checkAuthentication();
        //Auth::ktraquyen("CN05");
        $search = Request::get('search');
        $page = Request::get('page', 1);
        $rowsPerPage = Request::get('rowsPerPage', 10);
        $data = FlightModel::searchFlight1($search,$page, $rowsPerPage);
        $this->View->renderJSON($data);
    }
    public function changestatus(){
        Auth::checkAuthentication();
        //Auth::ktraquyen("CN05");
        $macb=Request::post('macb');
        $tt=Request::post('tinhtrang');
        $kq = FlightModel::changestatus($macb,$tt);
        $response = [
            'thanhcong' => $kq
        ];
        $this->View->renderJSON($response);
    }
    public function setTrangThai(){
        Auth::checkAuthentication();
        //Auth::ktraquyen("CN05");
        $data = FlightModel::setTrangThai();
        $response = ['thanhcong' => false];
        if($data == null){
            $response['thanhcong'] = false;
        } else{
            $response['thanhcong'] = true;
        }
        $this->View->renderJSON($response);
    }
}