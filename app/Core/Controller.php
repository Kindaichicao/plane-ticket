<?php

namespace App\Core;

class Controller
{
    public $View;

    public function __construct()
    {
        // Tạo session nếu chưa có
        Session::init();

        $this->View = new View();
    }
}