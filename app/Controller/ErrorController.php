<?php

namespace App\Controller;

use App\Core\Controller;

class ErrorController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    // Hiển trị trang 404 thay vì hiển thị lỗi
    public function error404()
    {
        header('HTTP/1.0 404 Not Found', true, 404);
        $this->View->render('error/404');
    }
}