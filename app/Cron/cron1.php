<?php
namespace App\Cron;
$GLOBALS['cron'] = true;

use App\Model\AccountModel;
use App\Model\UserticketModel;

// Không được xóa
spl_autoload_register(function($className){
    // Namespace prefix
    $prefix = 'App\\';

    // Base directory tương ứng cho namespace prefix
    // App\ tương ứng /app
    $base_dir = __DIR__ . '/../../app/';

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


$database = AccountModel::test();
UserticketModel::sale(); // săn vé
UserticketModel::autoBuy();
// luu info KH1 | LOAIVE1 | <1tr
// get bang san ve len
// neu > 1
   // lap qua, coi gia muon mua, va gia hien tại
   // neu ok thi tao ve cho no, va xoa record


