<?php

use App\Core\Config;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Học Tập</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= Config::get('URL') ?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?= Config::get('URL') ?>assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= Config::get('URL') ?>assets/css/app.css">
    <link rel="stylesheet" href="<?= Config::get('URL') ?>assets/css/pages/error.css">
</head>

<body>
    <div id="error">


        <div class="error-page container">
            <div class="col-md-8 col-12 offset-md-2">
                <img class="img-error" src="<?= Config::get('URL') ?>assets/images/samples/error-404.png" alt="Not Found">
                <div class="text-center">
                    <h1 class="error-title">NOT FOUND</h1>
                    <p class='fs-5 text-gray-600'>Không tìm thấy trang này.</p>
                    <a href="<?= Config::get('URL') ?>" class="btn btn-lg btn-outline-primary mt-3">Quay lại trang chủ</a>
                </div>
            </div>
        </div>


    </div>
</body>

</html>