<?php
use App\Core\Application;

// Hàm hỗ trợ tự động require file khi mình dùng 1 class nào đó từ file khác
spl_autoload_register(function($className){
    // Namespace prefix
    $prefix = 'App\\';

    // Base directory tương ứng cho namespace prefix
    // App\ tương ứng /app
    $base_dir = __DIR__ . '/../app/';

    // Tên Class đầy đủ có chứa Namespace prefix không?
    $len = strlen($prefix);
    if (strncmp($prefix, $className, $len) !== 0) {
        // Không => Không thuộc chuẩn PSR-4 => autoloader này sẽ bị bỏ qua
        return;
    }

    // Lấy phần còn của class name trừ namespace prefix
    $relative_class = substr($className, $len);

    /*
    Tìm đường dẫn đến file class:
    - Thay thế namespace prefix bằng tên base directory
    - Thay thế ký tự namespace separators \ bằng directory separator / (Linux)
    - Thêm ext .php
    */
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    // Nếu file tồn tại thì require nó
    if (file_exists($file)) {
        require $file;
    }
});

// Khởi tạo application

// Bỏ try catch để debug
// try {
//     $init = new Application();
// } catch (Exception $ex) {
//     require Config::get('PATH_VIEW') . 'error/500.php';
// }

$init = new Application();


// tạo một controller /auth/login