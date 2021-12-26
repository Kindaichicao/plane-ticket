<?php

namespace App\Core;

class View
{
    public static $activeItem = 'dashboard';

    public function render($filename, $data = null)
    {
        if ($data) {
            foreach ($data as $key => $value) {
                $this->{$key} = $value;
            }
        }

        if (file_exists(Config::get('PATH_VIEW') . $filename . '.php')) {
            require Config::get('PATH_VIEW') . $filename . '.php';
        } else {
            echo "<b> Không tìm thấy view " . Config::get('PATH_VIEW') . $filename . '.php </b>';
            require Config::get('PATH_VIEW') . 'error/500.php';
        }
    }

    public function renderMulti($filenames, $data = null)
    {
        if (!is_array($filenames)) {
            $this->render($filenames, $data);
            return false;
        }

        if ($data) {
            foreach ($data as $key => $value) {
                $this->{$key} = $value;
            }
        }

        foreach($filenames as $filename) {
            require Config::get('PATH_VIEW') . $filename . '.php';
        }
    }

    /**
     * Renders JSON dùng là api
     * @param $data
     */
    public function renderJSON($data)
    {
        header("Content-Type: application/json");
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }

    public static function getBaseUrl()
    {
        return Config::get('URL');
    }

    public static function url($path)
    {
        return Config::get('URL') . $path;
    }

    public static function assets($path)
    {
        return Config::get('URL') . 'assets/' . $path;
    }

    public static function partial($name)
    {
        if (file_exists(Config::get('PATH_VIEW') . '__partial/' .  $name . '.php')) {
            require Config::get('PATH_VIEW') . '__partial/' .  $name . '.php';
        } else {
            echo "<b> Không tìm thấy partial view " . $name . '.php </b>';
            require Config::get('PATH_VIEW') . 'error/500.php';
        }
    }

    /**
     * Hàm trả về url theo Controller và Action
     */
    public static function getAction($controller, $action)
    {
        /**
         * Vd:
         * $controller = UserController
         * $action = create
         * 
         */
        // Sửa UserController thành User
        $url = str_replace("Controller", "", $controller);
        // url = user/create
        $url = strtolower($url) . '/' . strtolower($action);
        // url = localhost/user/create
        $url = Config::get('URL') . $url;
        return $url;
    }
}