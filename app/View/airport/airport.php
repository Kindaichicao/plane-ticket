<?php

use App\Core\View;

View::$activeItem = 'airport';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title></title>

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="<?= View::assets('css/bootstrap.css') ?>" />

    <link rel="stylesheet" href="<?= View::assets('vendors/toastify/toastify.css') ?>" />
    <link rel="stylesheet" href="<?= View::assets('vendors/perfect-scrollbar/perfect-scrollbar.css') ?>" />
    <link rel="stylesheet" href="<?= View::assets('vendors/bootstrap-icons/bootstrap-icons.css') ?>" />
    <link rel="stylesheet" href="<?= View::assets('css/app.css') ?>" />
    <link rel="shortcut icon" href="<?= View::assets('images/favicon.ico') ?>" type="image/x-icon" />
    <link rel="stylesheet" href="<?= View::assets('css/quan.css') ?>" />
    <style>
    </style>
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
                    <div class="col-sm-6">
                        <h6>Tìm Kiếm</h6>
                        <div id="search-user-form" name="search-user-form">
                            <div class="form-group position-relative has-icon-right">
                                <input id="serch-user-text" type="text" class="form-control" placeholder="Tìm kiếm" value="">
                                <div class="form-control-icon">
                                    <i class="bi bi-search"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-7 order-md-1 order-last">
                                <label>
                                    <h3 >Danh sách sân bay</h3>
                                </label>
                                <label>
                                    <h5 style="margin-left: 50px; margin-right: 10px;"> Lọc Theo:</h5>
                                </label>
                                <select class="btn btn btn-primary" name="search-cbb" id="cars-search">
                                    <option value="">Tất Cả</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-5 order-md-2 order-first">
                                <div class=" loat-start float-lg-end mb-3">
                                    <button id='btn-delete-user' class="btn btn-danger">
                                        <i class="bi bi-trash-fill"></i> Xóa tài khoản
                                    </button>
                                    <button id='btn-open-add-airport' class="btn btn-primary shadow-none" data-toggle="modal" data-target="#add-airport-modal" >
                                        <i class="bi bi-plus"></i> Thêm tài khoản
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <section class="section">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table mb-0 table-danger" id="table1">
                                        <thead>
                                            <tr>
                                                <th>Chọn</th>
                                                <th>Mã sân bay</th>
                                                <th>Tên sân bay</th>
                                                <th>Tỉnh/TP</th>
                                                <th>Quận/Huyện</th>
                                                <th>Phường/Xã</th>
                                                <th>Đường</th>
                                                <th>Loại</th>
                                                <th>Sức chứa</th>
                                                <th>Số lượng trống</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                    <nav class="mt-5">
                                        <ul id="pagination" class="pagination justify-content-center">
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                    </section>
                </div>
                <!-- MODAL ADD -->
                <div class="modal fade text-left" id="add-airport-modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Thêm thông tin sân bay</h4>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form name="add-user-form" action="/" method="POST">
                                    <div class="modal-body">
                                        <label for="email">Tên Đăng Nhập: </label>
                                        <div class="form-group">
                                            <input type="text" id="email" name="email" placeholder="Mã Số" class="form-control">
                                        </div>
                                        <label for="fullname">Họ tên: </label>
                                        <div class="form-group">
                                            <input type="text" id="fullname" name="fullname" placeholder="Họ tên" class="form-control">
                                        </div>
                                        <label for="password">Mật khẩu: </label>
                                        <div class="form-group">
                                            <input type="password" id="password" name="password" placeholder="Mật khẩu" class="form-control">
                                        </div>
                                        <label for="cars-quyen">Quyền: </label>
                                        <select class="form-group" name="maquyen" id="cars-quyen">
                                        </select>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Đóng</span>
                                </button>
                                <button type="submit" class="btn btn-primary ml-1">
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Thêm</span>
                                </button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= View::assets('js/bootstrap.min.js') ?>"></script>
    <script src="<?= View::assets('js/main.js') ?>"></script>
    <script src="<?= View::assets('js/menu.js') ?>"></script>
    <script src="<?= View::assets('js/api.js') ?>"></script>
    <script src="<?= View::assets('js/jquery.min.js') ?>"></script>
    

</body>
<script>
    $(document).ready(function(){
        $('#btn-open-add-airport').click(function () {
            $('#add-airport-modal').modal('show')
          })
    })
</script>