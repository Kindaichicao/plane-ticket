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
        //Auth::ktraquyen("CN01");
        $this->View->render('ticket/ticket');
    }

    public function create(){

    }

    public function update(){
        
    }

    public function delete(){
        
    }

    public function getList(){
        
    }

    public function getTicket(){
        
    }
}