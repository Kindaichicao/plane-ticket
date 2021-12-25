<?php

use App\Core\View;

View::$activeItem = 'account';

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
                                    <h3>Danh sách người dùng</h3>
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
                                        <i class="bi bi-trash-fill"></i> Khóa tài khoản
                                    </button>
                                    <button id='btn-createaccount' class="btn btn-primary">
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
                                                <th>Tên Đăng Nhập</th>
                                                <th>Chức vụ</th>
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

                <!-- MODAL ADD -->
                <!-- <div class="modal fade text-left" id="add-user-modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Thêm Tài Khoản</h4>
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
                                        <label for="cars-quyen">Chức vụ: </label>
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
                </div> -->

                <div class="modal fade text-left" id="phancong-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">

                            <div class="modal-header bg-primary">
                                <div class="col-sm-1 offset-11" style="padding-left: 30px; padding-bottom: 38px;">
                                    <button type="button" class="btn btn-danger ml-1" data-bs-dismiss="modal" style="padding-top: 5px;">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Đóng</span>
                                    </button>
                                </div>
                            </div>
                            <div class="modal-body">
                                <div class="page-title">
                                    <div class="row">
                                        <div class="col-12 col-md-6 order-md-1 order-last">
                                            <label>
                                                <h5>Bảng Người Dùng</h5>
                                            </label>
                                            <label>
                                                <h6 style="margin-left: 50px; margin-right: 10px;"> Tạo tài khoản cho:</h6>
                                            </label>
                                            <select class="btn btn btn-primary" name="pc-cbb" id="cars-pc">
                                                <option value="staff">Nhân viên</option>
                                                <option value="customer">Khách hàng</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <section class="section">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table mb-0 table-danger" id="table2">
                                                    <thead>
                                                        <tr>
                                                            <th>Mã</th>
                                                            <th>Họ tên</th>
                                                            <th>Email</th>
                                                            <th>Tác vụ</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                                <nav class="mt-5">
                                                    <ul id="pagination2" class="pagination justify-content-center">
                                                    </ul>
                                                </nav>
                                            </div>
                                        </div>
                                </section>
                            </div>
                            <div class="modal-footer">

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Thong bao -->
                <div class="modal fade text-left" id="question-user-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-success">
                                <h5 class="modal-title white" id="myModalLabel110">
                                </h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <div class="modal-body" id="question-model">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Đóng</span>
                                </button>
                                <button type="button" class="btn btn-success ml-1" data-bs-dismiss="modal">
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span id="thuchien" class="d-none d-sm-block">Thực hiện</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal View -->
                <div class="modal fade" id="view-user-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">

                            <div class="modal-body">
                                <ul class="list-group">
                                    <li class="list-group-item active">Thông Tin Chi Tiết</li>
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label>Mã tài khoản:</label>
                                            <input type="text" class="form-control" id="view-hoten" disabled>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label>Tên Đăng Nhập:</label>
                                            <input type="text" class="form-control" id="view-ms" disabled>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label>Mã chức vụ:</label>
                                            <input type="text" class="form-control" id="view-quyen" disabled>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Đóng</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal thông báo pc -->
                <div class="modal fade text-left" id="add-user-modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="z-index: 10000 !important;">
                                <h4 class="modal-title">Thêm Tài Khoản</h4>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form name="add-user-form" action="/" method="POST">
                                    <div class="modal-body">
                                        <label for="password">Mật khẩu: </label>
                                        <div class="form-group">
                                            <input type="password" id="password" name="password" placeholder="Mật khẩu" class="form-control">
                                        </div>
                                        <label for="cars-quyen">Chức vụ: </label>
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
    <script src="<?= View::assets('js/api.js') ?>"></script>

    <script>
        let currentPage = 1
        let checkedRows = [];
        let quyens
        // on ready
        $(function() {
            $.post(`http://localhost/Software-Technology/position/getPositions`, function(response) {
                if (response.thanhcong) {
                    quyens = response.data;
                    quyens.forEach(data => {
                        let opt = '<option value="' + data.ma_chuc_vu + '">' + data.ten_chuc_vu + '</option>';
                        $("#cars-quyen").append(opt);
                    });
                    layDSUserAjax();
                }
            });
            //kietm tra quyen




        });

        $("#open-add-user-btn").click(function() {
            $('#email').val("");
            $('#password').val("");
            $('#maquyen').val("");
            $('#fullname').val("");
            $("#add-user-modal").modal('toggle')
        });

        $("#btn-createaccount").click(function() {

            $("#phancong-modal").modal('toggle');
            currentPage = 1;
            getListAjax();
        });

        $('#cars-pc').change(function() {
            currentPage = 1;
            getListAjax();
        });

        function getListAjax() {
            let search = $('#cars-pc option').filter(':selected').val();
            if (search == 'staff') {
                url = "http://localhost/Software-Technology/staff/getList?rowsPerPage=10&page=" + currentPage;
                $.get(`${url}`, function(response) {

                    const table2 = $('#table2 > tbody');
                    table2.empty();
                    checkedRows = [];
                    $row = 0;
                    response.data.forEach(data => {
                        if (search == 'staff') {
                            ma = data.ma_nv;
                        } else {
                            ma = data.ma_kh;
                        }
                        if ($row % 2 == 0) {

                            table2.append(`
                        <tr class="table-light">
                            <td>${ma}</td>
                            <td>${data.ho_ten}</td>
                            <td>${data.email}</td>
                            <td>
                                <button onclick="addTK('${ma}','${data.email}','${data.ho_ten}')" type="button" class="btn btn-sm btn-outline-success" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-person-plus"></i>
                                </button>
                            </td>
                        </tr>`);
                        } else {
                            table2.append(`
                        <tr class="table-light">
                            <td>${ma}</td>
                            <td>${data.ho_ten}</td>
                            <td>${data.email}</td>
                            <td>
                                <button onclick="addTK('${ma}','${data.email}','${data.ho_ten}')" type="button" class="btn btn-sm btn-outline-success" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-person-plus"></i>
                                </button>
                            </td>
                        </tr>`);
                        }
                        $row += 1;
                    });

                    const pagination = $('#pagination2');
                    // Xóa phân trang cũ
                    pagination.empty();
                    if (response.totalPage > 1) {
                        for (let i = 1; i <= response.totalPage; i++) {
                            if (i == currentPage) {
                                pagination.append(`
                        <li class="page-item active">
                            <button class="page-link" onClick='changePageGVM(${i})'>${i}</button>
                        </li>`)
                            } else {
                                pagination.append(`
                        <li class="page-item">
                            <button class="page-link" onClick='changePageGVM(${i})'>${i}</button>
                        </li>`)
                            }

                        }
                    }


                });
            } else {
                url = "http://localhost/Software-Technology/customer/getList?rowsPerPage=10&page=" + currentPage;
                $.get(`${url}`, function(response) {

                    const table2 = $('#table2 > tbody');
                    table2.empty();
                    checkedRows = [];
                    $row = 0;
                    response.data.forEach(data => {
                        if (search == 'staff') {
                            ma = data.ma_nv;
                        } else {
                            ma = data.ma_kh;
                        }
                        if ($row % 2 == 0) {

                            table2.append(`
                            <tr class="table-light">
                                <td>${ma}</td>
                                <td>${data.ho_ten}</td>
                                <td>${data.email}</td>
                                <td>
                                    <button onclick="addTKKH('${ma}','${data.email}','${data.ho_ten}')" type="button" class="btn btn-sm btn-outline-success" style="padding-top: 7px; padding-bottom: 0px;">
                                        <i class="bi bi-person-plus"></i>
                                    </button>
                                </td>
                            </tr>`);
                        } else {
                            table2.append(`
                                <tr class="table-light">
                                    <td>${ma}</td>
                                    <td>${data.ho_ten}</td>
                                    <td>${data.email}</td>
                                    <td>
                                        <button onclick="addTKKH('${ma}','${data.email}','${data.ho_ten}')" type="button" class="btn btn-sm btn-outline-success" style="padding-top: 7px; padding-bottom: 0px;">
                                            <i class="bi bi-person-plus"></i>
                                        </button>
                                    </td>
                                </tr>`);
                        }
                        $row += 1;
                    });

                    const pagination = $('#pagination2');
                    // Xóa phân trang cũ
                    pagination.empty();
                    if (response.totalPage > 1) {
                        for (let i = 1; i <= response.totalPage; i++) {
                            if (i == currentPage) {
                                pagination.append(`
                                <li class="page-item active">
                                    <button class="page-link" onClick='changePageGVM(${i})'>${i}</button>
                                </li>`)
                                                    } else {
                                                        pagination.append(`
                                <li class="page-item">
                                    <button class="page-link" onClick='changePageGVM(${i})'>${i}</button>
                                </li>`)
                            }

                        }
                    }


                });
            }

        }

        function addTK(ma, mail, hoten) {
            $("#phancong-modal").modal('toggle');
            $("#add-user-modal").modal('toggle');
            // Đặt sự kiện validate cho modal add user
            $("form[name='add-user-form']").validate({
                rules: {
                    password: {
                        required: true,
                        minlength: 8,
                    },
                },
                messages: {
                    password: {
                        required: "Vui lòng nhập mật khẩu",
                        minlength: "Mật khẩu của bạn không được ngắn hơn 8 ký tự",
                    },
                },
                submitHandler: function(form, event) {
                    event.preventDefault();
                    // lấy dữ liệu từ form
                    const data = Object.fromEntries(new FormData(form).entries());
                    data['email'] = mail;
                    data['fullname'] = hoten;
                    data['ma'] = ma;

                    $.post(`http://localhost/Software-Technology/account/create`, data, function(response) {
                        if (response.thanhcong) {
                            currentPage = 1;
                            layDSUserAjax();
                            Toastify({
                                text: "Thêm Thành Công",
                                duration: 1000,
                                close: true,
                                gravity: "top",
                                position: "center",
                                backgroundColor: "#4fbe87",
                            }).showToast();
                        } else {
                            Toastify({
                                text: "Thêm Thất Bại",
                                duration: 1000,
                                close: true,
                                gravity: "top",
                                position: "center",
                                backgroundColor: "#FF6A6A",
                            }).showToast();
                        }

                        // Đóng modal
                        $("#add-user-modal").modal('toggle')
                    });
                    $('#email').val("");
                    $('#password').val("");
                    $('#maquyen').val("");
                    $('#fullname').val("");
                }
            })
        }
        function addTKKH(ma, mail, hoten) {
            $("#phancong-modal").modal('toggle');
            $("#add-user-modal").modal('toggle');
            // Đặt sự kiện validate cho modal add user
            $("form[name='add-user-form']").validate({
                rules: {
                    password: {
                        required: true,
                        minlength: 8,
                    },
                },
                messages: {
                    password: {
                        required: "Vui lòng nhập mật khẩu",
                        minlength: "Mật khẩu của bạn không được ngắn hơn 8 ký tự",
                    },
                },
                submitHandler: function(form, event) {
                    event.preventDefault();
                    // lấy dữ liệu từ form
                    const data = Object.fromEntries(new FormData(form).entries());
                    data['email'] = email;
                    data['fullname'] = hoten;
                    data['ma'] = ma;

                    $.post(`http://localhost/Software-Technology/account/create2`, data, function(response) {
                        if (response.thanhcong) {
                            currentPage = 1;
                            layDSUserAjax();
                            Toastify({
                                text: "Thêm Thành Công",
                                duration: 1000,
                                close: true,
                                gravity: "top",
                                position: "center",
                                backgroundColor: "#4fbe87",
                            }).showToast();
                        } else {
                            Toastify({
                                text: "Thêm Thất Bại",
                                duration: 1000,
                                close: true,
                                gravity: "top",
                                position: "center",
                                backgroundColor: "#FF6A6A",
                            }).showToast();
                        }

                        // Đóng modal
                        $("#add-user-modal").modal('toggle')
                    });
                    $('#email').val("");
                    $('#password').val("");
                    $('#maquyen').val("");
                    $('#fullname').val("");
                }
            })
        }

        function changePage(newPage) {
            currentPage = newPage;
            layDSUserAjax();
        }


        function changePageSearch(newPage, search) {
            currentPage = newPage;
            layDSUserSearch(search);
        }

        $('#cars-search').change(function() {
            currentPage = 1;
            layDSUserSearch($('#serch-user-text').val());
        });

        $("#search-user-form").keyup(debounce(function() {
            currentPage = 1;
            layDSUserSearch($('#serch-user-text').val());
        }, 200));

        function layDSUserAjax() {
            $.get(`http://localhost/Software-Technology/account/getAccount?rowsPerPage=10&page=${currentPage}`, function(response) {
                // Không được gán biến response này ra ngoài function,
                // vì function này bất đồng bộ, khi nào gọi api xong thì response mới có dữ liệu
                // gán ra ngoài thì code ở ngoài chạy trc khi gọi api xong.
                //data là danh sách usser
                //page là trang hiện tại
                // rowsPerpage là số dòng trên 1 trang
                // totalPage là tổng số trang
                const table1 = $('#table1 > tbody');
                table1.empty();
                checkedRows = [];
                $row = 0;
                response.data.forEach(data => {
                    let disabled = "disabled btn icon icon-left btn-secondary";
                    let tenQuyen = "";
                    quyens.forEach(quyen => {
                        if (quyen.ma_chuc_vu == data.ma_cv) {
                            tenQuyen = quyen.ten_chuc_vu;
                            return true;
                        }
                    });
                    if ($row % 2 == 0) {
                        let bibi = "bi bi-lock";
                        if (data.trang_thai == 0) {
                            bibi = "bi bi-unlock";
                        }

                        table1.append(`
                        <tr class="table-light">
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="form-check-input form-check-success form-check-glow" id="${data.ma_tk}">
                                </div>
                            </td>
                            <td>${data.username}</td>
                            <td>${tenQuyen}</td>
                            <td>
                                <button onclick="viewRow('${data.username}')" type="button" class="btn btn-sm btn-outline-primary" style="padding-top: 3px; padding-bottom: 4px;">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button onclick="deleteRow('${data.username}')" type="button" class="btn btn-sm btn-outline-danger" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="${bibi}"></i>
                                </button>
                            </td>
                        </tr>`);
                    } else {
                        let bibi = "bi bi-lock";
                        if (data.trang_thai == 0) {
                            bibi = "bi bi-unlock";
                        }
                        table1.append(`
                        <tr class="table-light">
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="form-check-input form-check-success form-check-glow" id="${data.ma_tk}">
                                </div>
                            </td>
                            <td>${data.username}</td>
                            <td>${tenQuyen}</td>
                            <td>
                                <button onclick="viewRow('${data.username}')" type="button" class="btn btn-sm btn-outline-primary" style="padding-top: 3px; padding-bottom: 4px;">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button onclick="deleteRow('${data.username}')" type="button" class="btn btn-sm btn-outline-danger" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="${bibi}"></i>
                                </button>
                            </td>
                        </tr>`);
                    }
                    checkedRows.push(data.username);
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

        function layDSUserSearch(search) {
            $.get(`http://localhost/Software-Technology/account/advancedSearch?rowsPerPage=10&page=${currentPage}&search=${search}`, function(response) {
                // Không được gán biến response này ra ngoài function,
                // vì function này bất đồng bộ, khi nào gọi api xong thì response mới có dữ liệu
                // gán ra ngoài thì code ở ngoài chạy trc khi gọi api xong.
                //data là danh sách usser
                //page là trang hiện tại
                // rowsPerpage là số dòng trên 1 trang
                // totalPage là tổng số trang
                const table1 = $('#table1 > tbody');
                table1.empty();
                checkedRows = [];
                $row = 0;
                response.data.forEach(data => {
                    let disabled = "disabled btn icon icon-left btn-secondary";
                    let tenQuyen = "";
                    quyens.forEach(quyen => {
                        if (quyen.ma_chuc_vu == data.ma_cv) {
                            tenQuyen = quyen.ten_chuc_vu;
                            return true;
                        }
                    });
                    if ($row % 2 == 0) {
                        let bibi = "bi bi-lock";
                        if (data.trang_thai == 0) {
                            bibi = "bi bi-unlock";
                        }

                        table1.append(`
                        <tr class="table-light">
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="form-check-input form-check-success form-check-glow" id="${data.ma_tk}">
                                </div>
                            </td>
                            <td>${data.username}</td>
                            <td>${tenQuyen}</td>
                            <td>
                                <button onclick="viewRow('${data.username}')" type="button" class="btn btn-sm btn-outline-primary" style="padding-top: 3px; padding-bottom: 4px;">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button onclick="deleteRow('${data.username}')" type="button" class="btn btn-sm btn-outline-danger" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="${bibi}"></i>
                                </button>
                            </td>
                        </tr>`);
                    } else {
                        let bibi = "bi bi-lock";
                        if (data.trang_thai == 0) {
                            bibi = "bi bi-unlock";
                        }
                        table1.append(`
                        <tr class="table-light">
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="form-check-input form-check-success form-check-glow" id="${data.ma_tk}">
                                </div>
                            </td>
                            <td>${data.username}</td>
                            <td>${tenQuyen}</td>
                            <td>
                                <button onclick="viewRow('${data.username}')" type="button" class="btn btn-sm btn-outline-primary" style="padding-top: 3px; padding-bottom: 4px;">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button onclick="deleteRow('${data.username}')" type="button" class="btn btn-sm btn-outline-danger" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="${bibi}"></i>
                                </button>
                            </td>
                        </tr>`);
                    }
                    checkedRows.push(data.username);
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
                            <button class="page-link" onClick='changePageSearch(${i},${search})'>${i}</button>
                        </li>`)
                        } else {
                            pagination.append(`
                        <li class="page-item">
                            <button class="page-link" onClick='changePageSearch(${i},${search})'>${i}</button>
                        </li>`)
                        }

                    }
                }

            });
        }

        function viewRow(params) {
            let data = {
                email: params
            };
            $.post(`http://localhost/Software-Technology/account/viewUser`, data, function(response) {
                if (response.thanhcong) {
                    $("#view-hoten").val(response.ma_tk);
                    $("#view-ms").val(response.username);
                    let tenQuyen = "";
                    quyens.forEach(quyen => {
                        if (quyen.ma_chuc_vu == response.ma_cv) {
                            tenQuyen = quyen.ten_chuc_vu;
                            return true;
                        }
                    });
                    $("#view-quyen").val(tenQuyen);
                }
            });
            $("#view-user-modal").modal('toggle');
        }

        function resetPass(params) {
            let data = {
                email: params
            };
            $.post(`http://localhost/Software-Technology/user/resetPassword`, data, function(response) {
                if (response.thanhcong) {

                    Toastify({
                        text: "Khôi Phục Thành Công",
                        duration: 1000,
                        close: true,
                        gravity: "top",
                        position: "center",
                        backgroundColor: "#4fbe87",
                    }).showToast();
                    $("#reset" + params).removeClass("btn-primary");
                    $("#reset" + params).addClass("disabled icon icon-left btn-secondary");
                } else {
                    Toastify({
                        text: "Khôi Phục Thất Bại",
                        duration: 1000,
                        close: true,
                        gravity: "top",
                        position: "center",
                        backgroundColor: "#FF6A6A",
                    }).showToast();
                }
            });
        }

        function repairRow(params) {
            let data = {
                email: params
            };

            $.post(`http://localhost/Software-Technology/user/viewUser`, data, function(response) {
                if (response.thanhcong) {
                    $('#re-email').val(response.TenDangNhap);
                    $('#cars-quyen-sua').val(response.MaQuyen).prop('selected', true);
                    $('#re-fullname').val(response.FullName);
                }
            });
            $("#repair-user-modal").modal('toggle');
            //Sua form
            $("form[name='repair-user-form']").validate({
                rules: {
                    fullname: {
                        required: true,
                        validateName: true,
                    }
                },
                messages: {
                    fullname: {
                        required: "Vui lòng nhập họ tên",
                    }
                },
                submitHandler: function(form, event) {
                    event.preventDefault();
                    $("#myModalLabel110").text("Quản Lý Tài Khoản");
                    $("#question-model").text("Bạn có chắc chắn muốn sửa tài khoản này không");
                    $("#question-user-modal").modal('toggle');
                    $('#thuchien').off('click')
                    $("#thuchien").click(function() {
                        // lấy dữ liệu từ form

                        const data = Object.fromEntries(new FormData(form).entries());
                        data['email'] = $('#re-email').val();
                        $.post(`http://localhost/Software-Technology/user/repairUser`, data, function(response) {
                            if (response.thanhcong) {
                                currentPage = 1;
                                layDSUserAjax();
                                Toastify({
                                    text: "Sửa Thành Công",
                                    duration: 1000,
                                    close: true,
                                    gravity: "top",
                                    position: "center",
                                    backgroundColor: "#4fbe87",
                                }).showToast();
                            } else {
                                Toastify({
                                    text: "Sửa Thất Bại",
                                    duration: 1000,
                                    close: true,
                                    gravity: "top",
                                    position: "center",
                                    backgroundColor: "#FF6A6A",
                                }).showToast();
                            }

                            // Đóng modal
                            $("#repair-user-modal").modal('toggle')
                        });
                    });
                }
            })
        }

        function deleteRow(params) {
            let data = {
                email: params
            };
            $("#myModalLabel110").text("Quản Lý Tài Khoản");
            $("#question-model").text("Bạn có chắc chắn muốn khóa tài khoản này không");
            $("#question-user-modal").modal('toggle');
            $('#thuchien').off('click');
            $("#thuchien").click(function() {
                $.post(`http://localhost/Software-Technology/account/delete`, data, function(response) {
                    if (response.thanhcong) {
                        Toastify({
                            text: "Khóa Thành Công",
                            duration: 1000,
                            close: true,
                            gravity: "top",
                            position: "center",
                            backgroundColor: "#4fbe87",
                        }).showToast();
                        currentPage = 1;
                        layDSUserAjax();
                    } else {
                        Toastify({
                            text: "Khóa Thất Bại",
                            duration: 1000,
                            close: true,
                            gravity: "top",
                            position: "center",
                            backgroundColor: "#FF6A6A",
                        }).showToast();
                    }
                });
            });

        }
        $("#btn-delete-user").click(function() {
            $("#myModalLabel110").text("Quản Lý Tài Khoản");
            $("#question-model").text("Bạn có chắc chắn muốn khóa những tài khoản này không");
            $("#question-user-modal").modal('toggle');
            $('#thuchien').off('click')
            $("#thuchien").click(function() {
                let datas = []
                checkedRows.forEach(checkedRow => {
                    if ($('#' + checkedRow).prop("checked")) {
                        datas.push(checkedRow);
                    }
                });
                let data = {
                    emails: JSON.stringify(datas)
                };
                $.post(`http://localhost/Software-Technology/account/deletes`, data, function(response) {
                    if (response.thanhcong) {
                        Toastify({
                            text: "Khóa Thành Công",
                            duration: 1000,
                            close: true,
                            gravity: "top",
                            position: "center",
                            backgroundColor: "#4fbe87",
                        }).showToast();
                        currentPage = 1;
                        layDSUserAjax();
                    } else {
                        Toastify({
                            text: "Khóa Thất Bại",
                            duration: 1000,
                            close: true,
                            gravity: "top",
                            position: "center",
                            backgroundColor: "#FF6A6A",
                        }).showToast();
                    }
                });
            });
        });
    </script>
</body>

</html>