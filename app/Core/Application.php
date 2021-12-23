<?php

namespace App\Core;

use App\Controller\ErrorController;

class Application
{
    private $controller;

    private $parameters = array();

    private $controllerName;

    private $actionName;

    /**
     * Khởi tạo app, phân tích URL, gọi controller/method
     */
    public function __construct()
    {
        // tạo array  create array with URL parts in $url
        $this->splitUrl();

        // creates controller and action names (from URL input)
        $this->createControllerAndActionNames();

        // Kiểm tra xem file controller này có tồn tại không
        if (file_exists(Config::get('PATH_CONTROLLER') . $this->controllerName . '.php')) {
            // Chỗ này auto load không được, vì không khai báo rõ class (tên class lấy từ biến)
            // nên phải tự require vô
            require Config::get('PATH_CONTROLLER') . $this->controllerName . '.php';
            $controller = 'App\\Controller\\' . $this->controllerName;
            
            // vd: controllerName là UserController -> new App\Controller\UserController
            $this->controller = new $controller();

            // Kiểm tra xem method này có tồn tại trong controller không
            if (is_callable(array($this->controller, $this->actionName))) {
                if (!empty($this->parameters)) {
                    // nếu có tham số thì gọi hàm và truyền tham số
                    call_user_func_array(array($this->controller, $this->actionName), $this->parameters);
                } else {
                    //nếu không có tham số thì gọi bình thường 
                    $this->controller->{$this->actionName}();
                }
            } else {
                // load 404 error page
                $this->controller = new ErrorController;
                $this->controller->error404();
            }
        } else {
            // load 404 error page
            $this->controller = new ErrorController;
            $this->controller->error404();
        }
    }

    /**
     * Cắt url
     */
    private function splitUrl()
    {
        if (Request::get('url')) {

            // localhost/mvc
            // localhost/mvc/abv/edb

            // cắt URL
            // auth/login/1/2
            // 0 auth
            // 1 login

            $url = trim(Request::get('url'), '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);  

            // gán từng phần đã cắt vào các thuộc tính của class
            $this->controllerName = isset($url[0]) ? $url[0] : null;
            $this->actionName = isset($url[1]) ? $url[1] : null;

            // bỏ controller name và action name trong url đã cắt (phần còn lại sẽ là parameters)
            unset($url[0], $url[1]);
            $this->parameters = array_values($url);
        }
    }

    /**
     * Kiểm tra nếu controller and action names được set hay không. Nếu không, thì set giá trị mặc định cho nó
     * Đồng thời chỉnh sửa lại tên controller để sử dụng sau này
     */
    private function createControllerAndActionNames()
    {
        // nếu không set controller name thì lấy mặc định từ config
        if (!$this->controllerName) {
            $this->controllerName = Config::get('DEFAULT_CONTROLLER');
        }

        if (!$this->actionName OR (strlen($this->actionName) == 0)) {
            $this->actionName = Config::get('DEFAULT_ACTION');
        }

        // sửa tên controller lại thành tên controller class (tên file) ("auth" to "AuthController")
        $this->controllerName = ucwords($this->controllerName) . 'Controller';
    }
}