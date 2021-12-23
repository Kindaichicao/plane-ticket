<?php

namespace App\Controller;

use App\Core\Auth;
use App\Core\Cookie;
use App\Core\Controller;
use App\Core\Request;
use App\Model\StatisticsModel;

class StatisticsController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function statistics()
    {
        Auth::checkAuthentication();
        //Auth::ktraquyen("CN01");
        $this->View->render('statistics/statistics');
    }

    public static function statisticByDay(){

    }

    public static function statisticByMonth(){
        
    }

    public static function statisticByQuarterly(){
        
    }

    public static function statisticByYear(){
        
    }
}