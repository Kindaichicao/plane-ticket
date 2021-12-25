<?php

use App\Core\View;

View::$activeItem = 'plane';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Web Học Tập</title>

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="<?= View::assets('css/bootstrap.css') ?>" />

    <link rel="stylesheet" href="<?= View::assets('vendors/toastify/toastify.css') ?>" />
    <link rel="stylesheet" href="<?= View::assets('vendors/perfect-scrollbar/perfect-scrollbar.css') ?>" />
    <link rel="stylesheet" href="<?= View::assets('vendors/bootstrap-icons/bootstrap-icons.css') ?>" />
    <link rel="stylesheet" href="<?= View::assets('css/app.css') ?>" />
    <link rel="shortcut icon" href="<?= View::assets('images/favicon.ico') ?>" type="image/x-icon" />
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
                    <div class="col-sm-6">
                        <h6>Tìm Kiếm</h6>
                        <div id="search-plane-form" name="search-plane-form">
                            <div class="form-group position-relative has-icon-right">
                                <input id="search-plane-text" type="text" class="form-control" placeholder="Tìm kiếm"
                                    value="">
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
                                    <h3>Danh sách máy bay</h3>
                                </label>
                                <label>
                                    <h5 style="margin-left: 50px; margin-right: 10px;"> Lọc Theo:</h5>
                                </label>
                                <select class="btn btn btn-primary" name="search-cbb" id="cars-search">
                                    <option value="">Tất Cả</option>
                                    <option value="so_hieu">Số hiệu máy bay</option>
                                    <option value="hang">Hãng hàng không</option>
                                    <option value="ghe_thuong">Số ghế thường</option>
                                    <option value="thuong_gia">Số ghế thương gia</option>
                                    <option value="tong_ghe">Tổng số ghế</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-5 order-md-2 order-first">
                                <div class=" loat-start float-lg-end mb-3">
                                    <button id='btn-delete-plane' class="btn btn-danger">
                                        <i class="bi bi-trash-fill"></i> Xóa máy bay
                                    </button>
                                    <button id='open-add-plane-btn' class="btn btn-primary">
                                        <i class="bi bi-plus"></i> Thêm máy bay
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
                                                <th>Số hiệu máy bay</th>
                                                <th>Hãng hàng không</th>
                                                <th>Số ghế thường</th>
                                                <th>Số ghế thương gia</th>
                                                <th>Tổng số ghế</th>
                                                <th>Tác Vụ</th>
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
                <!-- FOOTER -->
                <?php View::partial('footer')  ?>
            </div>
        </div>
    </div>
    <script src="<?= View::assets('js/extensions/toastify.js') ?>"></script>
    <script src="<?= View::assets('js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= View::assets('js/jquery.min.js') ?>"></script>
    <script src="<?= View::assets('js/jquery.validate.js') ?>"></script>
    <script src="<?= View::assets('js/main.js') ?>"></script>
    <script src="<?= View::assets('js/vendors.js') ?>"></script>
    <script src="<?= View::assets('js/changepass.js') ?>"></script>
    <script src="<?= View::assets('js/menu.js') ?>"></script>
    <script src="<?= View::assets('js/api.js') ?>"></script>
    <script>
    let currentPage = 1;
    let checkedRows = [];

    $(function() {
        layDSMayBayAjax();
    });

    function changePage(newPage) {
        currentPage = newPage;
        layDSMayBayAjax();
    }

    $('#cars-search').change(function() {
        currentPage = 1;
        layDSMayBayAjax();
    });

    $("#search-plane-form").keyup(debounce(function() {
        currentPage = 1;
        layDSMayBayAjax();
    }, 200));

    function layDSMayBayAjax() {
        let search = $('#cars-search option').filter(':selected').val();
        console.log('/' + search + "/");
        $.get(`http://localhost/Software-Technology/plane/getPlane?rowsPerPage=10&page=${currentPage}&search=${$("#search-plane-text").val()}&search2=${search}`,
            function(response) {
                const table1 = $('#table1 > tbody');
                table1.empty();
                checkedRows = [];
                $row = 0;
                response.data.forEach(data => {
                    if ($row % 2 == 0) {

                        table1.append(`
                        <tr class="table-light">
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="form-check-input form-check-success form-check-glow" id="${data.so_hieu_may_bay}">
                                </div>
                            </td>
                            <td>${data.so_hieu_may_bay}</td>
                            <td>${data.ten}</td>
                            <td>${data.so_ghe_thuong}</td>
                            <td>${data.so_ghe_thuong_gia}</td>
                            <td>${data.tong_so_ghe}</td>
                            <td>
                                <button onclick="viewRow('${data.so_hieu_may_bay}')" type="button" class="btn btn-sm btn-outline-primary" style="padding-top: 3px; padding-bottom: 4px;">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button onclick="repairRow('${data.so_hieu_may_bay}')" type="button" class="btn btn-sm btn-outline-success" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-tools"></i>
                                </button>
                                <button onclick="deleteRow('${data.so_hieu_may_bay}')" type="button" class="btn btn-sm btn-outline-danger" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </td>
                        </tr>`);
                    } else {
                        table1.append(`
                        <tr class="table-info">
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="form-check-input form-check-success form-check-glow" id="${data.so_hieu_may_bay}">
                                </div>
                            </td>
                            <td>${data.so_hieu_may_bay}</td>
                            <td>${data.ten}</td>
                            <td>${data.so_ghe_thuong}</td>
                            <td>${data.so_ghe_thuong_gia}</td>
                            <td>${data.tong_so_ghe}</td>
                            <td>
                                <button onclick="viewRow('${data.so_hieu_may_bay}')" type="button" class="btn btn-sm btn-outline-primary" style="padding-top: 3px; padding-bottom: 4px;">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button onclick="repairRow('${data.so_hieu_may_bay}')" type="button" class="btn btn-sm btn-outline-success" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-tools"></i>
                                </button>
                                <button onclick="deleteRow('${data.so_hieu_may_bay}')" type="button" class="btn btn-sm btn-outline-danger" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </td>
                        </tr>`);
                    }
                    checkedRows.push(data.so_hieu_may_bay);
                    $row += 1;
                });

                const pagination = $('#pagination');
                // Xóa phân trang cũ
                pagination.empty();
                if (response.totalPage > 1) {
                    for (let i = 1; i <= response.totalPage; i++) {
                        if (i == currentPage) {
                            pagination.append(`
                        <li class="page-item active">
                            <button class="page-link" onClick='changePage(${i})'>${i}</button>
                        </li>`)
                        } else {
                            pagination.append(`
                        <li class="page-item">
                            <button class="page-link" onClick='changePage(${i})'>${i}</button>
                        </li>`)
                        }

                    }
                }

            });
    }
    </script>
</body>