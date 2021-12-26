<?php

namespace App\Controller;

use App\Core\Auth;
use App\Core\Cookie;
use App\Core\Controller;
use App\Core\Request;
use App\Model\PositionModel;

class PositionController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function position()
    {
        Auth::checkAuthentication();
        //Auth::ktraquyen("CN01");
        $this->View->render('position/position');
    }

    public function checkValidMaChucVu()
    {
        Auth::checkAuthentication();
        $macv = Request::post('machucvu');
        $macv1 = PositionModel::checkValidMaChucVu($macv);

        $response = true;

        if ($macv1) {
            $response = 'Mã chức vụ đã tồn tại trong hệ thống';
        }
        $this->View->renderJSON($response);
    }

    public function create(){
        Auth::checkAuthentication();
        // Auth::ktraquyen("CN07");
        $machucvu= Request::post('machucvu');
        $tenchucvu = Request::post('tenchucvu');
        $chitiets = Request::post('chitiets');
        $chitiets = json_decode($chitiets);
        $kq = PositionModel::create($machucvu,$tenchucvu,$chitiets);
        $response = [
            'thanhcong' => $kq
        ];
        $this->View->renderJSON($response);
    }

    public function update(){
        Auth::checkAuthentication();
        // Auth::ktraquyen("CN07");
        $machucvu= Request::post('machucvu');
        $tenchucvu = Request::post('tenchucvu');
        $chitiets = Request::post('chitiets');
        $chitiets = json_decode($chitiets);
        $kq = PositionModel::update($machucvu, $tenchucvu,$chitiets);
        $response = [
            'thanhcong' => $kq
        ];
        $this->View->renderJSON($response);
    }

    public function delete(){
        Auth::checkAuthentication();
        // Auth::ktraquyen("CN07");
        $macv = Request::post('macv');
        $kq= PositionModel::delete($macv);
        $response = [
            'thanhcong' => $kq
        ];
        $this->View->renderJSON($response);
    }

    public function deletes(){
        Auth::checkAuthentication();       
        // Auth::ktraquyen("CN07");
        $macvs = Request::post('macvs');
        $macvs = json_decode($macvs);
        $kq = PositionModel::deletes($macvs);
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
        $data = PositionModel::getList($page, $rowsPerPage);
        $this->View->renderJSON($data);
    }

    public function getPosition(){
        Auth::checkAuthentication();
        // Auth::ktraquyen("CN01");
        $macv = Request::post('macv');
        $kq1 = PositionModel::getPosition($macv);
        $kq2 = PositionModel::getPositionDetails($macv);
        if($kq1 == null || $kq2 == null ){
            $response['thanhcong'] = false;
        } else{   
            $response['ma_chuc_vu'] = $kq1->ma_chuc_vu;
            $response['ten_chuc_vu'] = $kq1->ten_chuc_vu;
            $response['chitiet'] = $kq2['data'];
            $response['thanhcong'] = true;
        }
        $this->View->renderJSON($response);
    }
    public function getPositions(){
        Auth::checkAuthentication();
        // Auth::ktraquyen("CN01");
        $kq = PositionModel::getPositions();
        if($kq == null ){
            $response['thanhcong'] = false;
        } else{   
            $response['data'] = $kq['data'];
            $response['thanhcong'] = true;
        }
        $this->View->renderJSON($response);
    }
    public function getChucNang(){
        Auth::checkAuthentication();
        // Auth::ktraquyen("CN07");
        $data = PositionModel::getChucNang();
        $this->View->renderJSON($data);
    }
    public function getListSearch(){
        Auth::checkAuthentication();
        // Auth::ktraquyen("CN01");
        $search = Request::get('search');
        $search2 = Request::get('search2');
        $page = Request::get('page', 1);
        $rowsPerPage = Request::get('rowsPerPage', 10);
        $data = PositionModel::getListSearch($search, $search2,$page, $rowsPerPage);
        $this->View->renderJSON($data);
    }
}