<?php

use App\Core\View;
View::$activeItem = 'dashboard';
 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="<?= View::assets('css/bootstrap.css') ?>" />

    <link rel="stylesheet" href="<?= View::assets('vendors/toastify/toastify.css') ?>" />
    <link rel="stylesheet" href="<?= View::assets('vendors/perfect-scrollbar/perfect-scrollbar.css')?>" />
    <link rel="stylesheet" href="<?= View::assets('vendors/bootstrap-icons/bootstrap-icons.css') ?>" />
    <link rel="stylesheet" href="<?= View::assets('css/app.css') ?>" />
    <link rel="shortcut icon" href="<?= View::assets('images/favicon.ico') ?>" type="image/x-icon')" />
    <link rel="stylesheet" href="<?= View::assets('css/quan.css') ?>" />
</head>

<body>
    <div id="app">
        <!-- SIDEBAR -->
        <?php View::partial('sidebar')  ?>
        <div id="main" class="layout-navbar">
            <!-- HEADER -->
            <?php View::partial('header')  ?>
            <?php View::partial('changepass')  ?>
            <div id="main-content">
                <div class="page-heading">
                <section id="content-types">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="card-content">
                                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="assets/images/samples/slider0.jpg" class="d-block w-100">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="assets/images/samples/slider1.jpg" class="d-block w-100">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="assets/images/samples/Slider2.jpg" class="d-block w-100">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="assets/images/samples/Slider3.jpg" class="d-block w-100">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="assets/images/samples/Slider4.jpg" class="d-block w-100">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="assets/images/samples/slider5.jpg" class="d-block w-100">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="assets/images/samples/slider6.jpg" class="d-block w-100">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="assets/images/samples/slider7.jpg" class="d-block w-100">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="assets/images/samples/slider9.jpg" class="d-block w-100">
                                            </div>
                                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                                                data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            </a>
                                            <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                                                data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-4 col-md-4 col-sm-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <h4 class="card-title">Hướng tới tương lai</h4>
                                        <img class="img-fluid w-100" src="assets/images/samples/bìa.jpg">
                                        <p class="card-text">
                                        
Là một hãng hàng không quốc tế năng động, hiện đại và mang đậm dấu ấn bản sắc văn hóa truyền thống Việt Nam, trong suốt hơn 20 năm phát triển với tốc độ tăng trưởng ở mức hai con số, Vietnam Airlines đã và đang dẫn đầu thị trường hàng không Việt Nam - một trong những thị trường nội địa có sức tăng trưởng nhanh nhất thế giới. Là hãng hàng không hiện đại với thương hiệu được biết đến rộng rãi nhờ bản sắc văn hóa riêng biệt, TDPQ Air đang hướng tới trở thành hãng hàng không quốc tế chất lượng 5 sao dẫn đầu khu vực châu Á. 
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-4 col-sm-12">
                            <div class="card collapse-icon accordion-icon-rotate">
                                <div class="card-header">
                                    <h1 class="card-title pl-1">Phương châm</h1>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="accordion" id="cardAccordion">
                                        Sự hài lòng của khách hàng là thành tựu lớn nhất mà chất lượng dịch vụ mang lại
                                        Cùng với việc đảm bảo an toàn bay là nhiệm vụ số một, TPDQ Air cũng không ngừng nâng cao chất lượng dịch vụ, đảm bảo chỉ số đúng giờ để tăng sức cạnh tranh trong hàng không.
                                        </div>
                                    </div>
                                </div>
                                <img class="img-fluid w-80" src="assets/images/samples/bìa3.jpg">
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-4 col-sm-12">
                            <div class="card collapse-icon accordion-icon-rotate">
                                <div class="card-header">
                                    <h1 class="card-title pl-1">Vip Pro Team</h1>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="accordion" id="cardAccordion">
                                            <div class="card">
                                                <div id="headingFive" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive" role="button">
                                                    <i class="bi bi-star"></i><span class="collapsed collapse-title"> Trần Thị Thu Thanh</span>
                                                </div>
                                                <div id="collapseFive" class="collapse pt-1" aria-labelledby="headingFive" data-parent="#cardAccordion">
                                                    <div class="card-body">
                                                        <img src="assets/images/faces/thuthanh.png" class="d-block w-100">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card collapse-header">
                                                <div id="headingSix" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix" role="button">
                                                    <i class="bi bi-star"></i><span class="collapsed collapse-title"> Phan Thanh Thắng</span>
                                                </div>
                                                <div id="collapseSix" class="collapse pt-1" aria-labelledby="headingSix" data-parent="#cardAccordion">
                                                    <div class="card-body">
                                                        <img src="assets/images/faces/thanhthang.jpg" class="d-block w-100">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div id="headingSeven" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven" role="button">
                                                    <i class="bi bi-star"></i><span class="collapsed collapse-title"> Phan Anh Quân</span>
                                                </div>
                                                <div id="collapseSeven" class="collapse pt-1" aria-labelledby="headingSeven" data-parent="#cardAccordion">
                                                    <div class="card-body">
                                                        <img src="assets/images/faces/anhquan.jpg" class="d-block w-100">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div id="headingEight" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight" role="button">
                                                    <i class="bi bi-star"></i><span class="collapsed  collapse-title"> Lê Thị Cẩm Duyên</span>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div id="headingEight" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight" role="button">
                                                    <i class="bi bi-star"></i><span class="collapsed  collapse-title"> Nguyễn Văn Minh Đức</span>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div id="headingEight" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight" role="button">
                                                    <i class="bi bi-star"></i><span class="collapsed  collapse-title"> Nguyễn Huỳnh Thanh Duy</span>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div id="headingEight" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight" role="button">
                                                    <i class="bi bi-star"></i><span class="collapsed  collapse-title"> Tô Phương Dũng</span>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div id="headingEight" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight" role="button">
                                                    <i class="bi bi-star"></i><span class="collapsed  collapse-title"> Trần Kim Phú</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                </div>
                <!-- FOOTER -->
                <?php View::partial('footer')  ?>
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
        <script src="<?= View::assets('vendors/apexcharts/apexcharts.js') ?>"></script>
        <script src="<?= View::assets('js/api.js') ?>"></script>

</body>

</html