<?php

use App\Core\View;

View::$activeItem = 'wallet';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Web Học Tập</title>

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="<?= View::assets('css/bootstrap.css') ?>" />

    <link rel="stylesheet" href="<?= View::assets('vendors/toastify/toastify.css') ?>" />
    <link rel="stylesheet" href="<?= View::assets('vendors/perfect-scrollbar/perfect-scrollbar.css') ?>" />
    <link rel="stylesheet" href="<?= View::assets('vendors/bootstrap-icons/bootstrap-icons.css') ?>" />
    <link rel="stylesheet" href="<?= View::assets('css/app.css') ?>" />
    <link rel="shortcut icon" href="<?= View::assets('images/favicon.ico') ?>" type="image/x-icon" />
    <link rel="stylesheet" href="<?= View::assets('css/quan.css') ?>" />
    <link rel="stylesheet" href="<?= View::assets('css/duc.css') ?>" />
</head>

<body>
    <div id="app">
        <!-- SIDEBAR -->
        <?php View::partial('sidebar')  ?>
        <div id="main" class="layout-navbar">
            <!-- HEADER -->
            <?php View::partial('header')  ?>
            <?php View::partial('changepass')  ?>
            <div class="container con1">
                <div class="row titlediem">
                    <div class="col-md-12 col-sm-12">
                        Điểm tích lũy
                    </div>
                </div>
                <div class="row khung1">
                    <div class="col-md-4 col-sm-4"></div>
                    <div class="col-md-4 col-sm-4 khungdiem">
                        <div class="row khung2">
                            <div class="col-md-12 col-sm-12">
                                <span><i class="bi bi-gem" style="color:#159ff9"></i></span>
                                <span>Điểm tích lũy: </span>
                                <span class="diem" id="diem"></span>
                                <span>point</span>
                            </div>
                        </div>
                        <div class="row khung2">
                            <div class="col-md-12 col-sm-12">
                                <span><i class="bi bi-trophy" style="color:#ee7404"></i></span>
                                <span>Hạng:</span>                                
                                <span id="rank"></span>
                            </div>
                        </div>
                        <div class="row khung2">
                            <div class="col-md-12 col-sm-12">
                                <span><i class="bi bi-star-fill" style="color:#e3ee04"></i></span>
                                <span>Còn </span>                                
                                <span class="diem" id="diemNew">17400</span>
                                <span> để lên hạng</span>
                                <span id="rankNew"> vàng</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4"></div>
                </div>
                <!-- Ví Airpro -->
                <div class="row titlediem1">
                    <div class="col-md-12 col-sm-12">
                        Ví Airpro
                    </div>
                </div>
                <div class="row khung3">
                    <div class="col-md-12 col-sm-12">
                        <button class="btn btn-lg btn-outline-primary">
                            <span><i class="bi bi-credit-card-2-front-fill" style="color: red"></i></span>
                            <span>Liên kết ngân hàng</span>    
                        </button>                                                                                            
                    </div>
                </div>
                <div id="vi_thanh_toan" class="row khung1 d-none">
                    <div class="col-md-4 col-sm-4"></div>
                    <div class="col-md-4 col-sm-4 khungdiem">
                        <div class="row khung2">
                            <div class="col-md-12 col-sm-12">
                                <span><i class="bi bi-cash" style="color: #04ee07"></i></span>
                                <span>Số dư: </span>
                                <span class="diem">17400</span>
                                <span>VND</span>
                            </div>
                        </div>
                        <div class="row khung2">
                            <div class="col-md-12 col-sm-12">
                                <span><i class="bi bi-credit-card" style="color: #f28678"></i></span>
                                <span>Nạp thêm</span>                                
                                <span class="icondiem"><i class="bi bi-plus-square-fill" style="color: #f28678"></i></span>
                            </div>
                        </div>
                        <div class="row khung2">
                            <div class="col-md-12 col-sm-12">
                                <span><i class="bi bi-caret-down-square" style="color: #eaa135"></i></span>
                                <span>Rút tiền về thẻ</span>                                                                
                                <span class="icondiem1"><i class="bi bi-dash-square-fill" style="color: #eaa135"></i></span>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-md-4 col-sm-4"></div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= View::assets('vendors/toastify/toastify.js') ?>"></script>
    <script src="<?= View::assets('vendors/perfect-scrollbar/perfect-scrollbar.min.js') ?>"></script>
    <script src="<?= View::assets('js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= View::assets('vendors/jquery/jquery.min.js') ?>"></script>
    <script src="<?= View::assets('vendors/jquery/jquery.validate.js') ?>"></script>
    <script src="<?= View::assets('js/main.js') ?>"></script>
    <script src="<?= View::assets('js/changepass.js') ?>"></script>
    <script src="<?= View::assets('js/menu.js') ?>"></script>
    <script src="<?= View::assets('js/api.js') ?>"></script>
    <script>
         $(function() {
            $.post(`http://localhost/Software-Technology/wallet/readPoint`, function(response) {
                if (response) {
                    $('#diem').text(response.diem);
                    $('#diemNew').text(response.diemmoi);
                    $('#rank').text(response.rank);
                    $('#rankNew').text(response.rankNew);
                }
            });
            $.post(`http://localhost/Software-Technology/wallet/checkConnection`, function(response) {
                if (response.thanhcong) {
                    $('#vi_thanh_toan').removeClass('d-none');
                }
            });
         })
    </script>
</body>