<?php

use App\Core\View;

View::$activeItem = 'position';

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
                                    <h3>Danh sách chức vụ</h3>
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
                                        <i class="bi bi-trash-fill"></i> Xóa chức vụ
                                    </button>
                                    <button id='open-add-user-btn' class="btn btn-primary">
                                        <i class="bi bi-plus"></i> Thêm chức vụ
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
                                                <th>Mã chức vụ</th>
                                                <th>Tên chức vụ</th>
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
                </div> -->
                <!--MODAL SUA-->
                <!-- <div class="modal fade text-left" id="repair-user-modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Sửa Tài Khoản</h4>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <form name="repair-user-form" action="/" method="POST">
                                <div class="modal-body">
                                    <label>Tên Đăng Nhập: </label>
                                    <div class="form-group">
                                        <input type="text" id="re-email" name="email" class="form-control" disabled>
                                    </div>
                                    <label for="re-fullname">Họ tên: </label>
                                    <div class="form-group">
                                        <input type="text" id="re-fullname" name="fullname" placeholder="Họ tên" class="form-control">
                                    </div>
                                    <label for="cars-quyen-sua">Quyền: </label>
                                    <select class="form-group " name="maquyen" id="cars-quyen-sua">
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Đóng</span>
                                    </button>
                                    <button id="repair-queston" type="submit" class="btn btn-primary ml-1">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Sửa</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> -->
                <!-- Modal Thong bao -->
                <!-- <div class="modal fade text-left" id="question-user-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110" aria-hidden="true">
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
                </div> -->
                <!-- Modal View -->
                <div class="modal fade" id="view-user-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">

                            <div class="modal-body">
                                <ul class="list-group">
                                    <li class="list-group-item active">Thông Tin Chi Tiết</li>
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label>Mã chức vụ:</label>
                                            <input type="text" class="form-control" id="view-machucvu" disabled>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label>Tên chức vụ:</label>
                                            <input type="text" class="form-control" id="view-tenchucvu" disabled>
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

                <!-- FOOTER -->
                <?php View::partial('footer')  ?>
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
            layDSChucVuAjax();
            // Đặt sự kiện validate cho modal add user
            // $("form[name='add-user-form']").validate({
            //     rules: {
            //         email: {
            //             required: true,
            //             remote: {
            //                 url: "http://localhost/Software-Technology/user/checkValidEmail",
            //                 type: "POST",
            //             }
            //         },
            //         fullname: {
            //             required: true,
            //             validateName: true,
            //         },
            //         password: {
            //             required: true,
            //             minlength: 8,
            //         },
            //     },
            //     messages: {
            //         email: {
            //             required: "Vui lòng nhập tên đăng nhập",
            //         },
            //         fullname: {
            //             required: "Vui lòng nhập họ tên",
            //         },
            //         password: {
            //             required: "Vui lòng nhập mật khẩu",
            //             minlength: "Mật khẩu của bạn không được ngắn hơn 8 ký tự",
            //         },
            //     },
            //     submitHandler: function(form, event) {
            //         event.preventDefault();
            //         // lấy dữ liệu từ form
            //         const data = Object.fromEntries(new FormData(form).entries());

            //         $.post(`http://localhost/Software-Technology/user/addUser`, data, function(response) {
            //             if (response.thanhcong) {
            //                 currentPage = 1;
            //                 layDSUserAjax();
            //                 Toastify({
            //                     text: "Thêm Thành Công",
            //                     duration: 1000,
            //                     close: true,
            //                     gravity: "top",
            //                     position: "center",
            //                     backgroundColor: "#4fbe87",
            //                 }).showToast();
            //             } else {
            //                 Toastify({
            //                     text: "Thêm Thất Bại",
            //                     duration: 1000,
            //                     close: true,
            //                     gravity: "top",
            //                     position: "center",
            //                     backgroundColor: "#FF6A6A",
            //                 }).showToast();
            //             }

            //             // Đóng modal
            //             $("#add-user-modal").modal('toggle')
            //         });
            //         $('#email').val("");
            //         $('#password').val("");
            //         $('#maquyen').val("");
            //         $('#fullname').val("");
            //     }
            // })

        });

        // $("#open-add-user-btn").click(function() {
        //     $('#email').val("");
        //     $('#password').val("");
        //     $('#maquyen').val("");
        //     $('#fullname').val("");
        //     $("#add-user-modal").modal('toggle')
        // });


        function changePage(newPage) {
            currentPage = newPage;
            layDSChucVuAjax();
        }

        // function changePageSearchNangCao(newPage, search, search2) {
        //     currentPage = newPage;
        //     layDSUserSearchNangCao(search, search2);
        // }

        // $('#cars-search').change(function() {
        //     let search = $('#cars-search option').filter(':selected').val();
        //     currentPage = 1;
        //     layDSUserSearchNangCao($('#serch-user-text').val(), search);
        // });

        // $("#search-user-form").keyup(debounce(function() {
        //     let search = $('#cars-search option').filter(':selected').val();
        //     currentPage = 1;
        //     layDSUserSearchNangCao($('#serch-user-text').val(), search);
        // },200));

        function layDSChucVuAjax() {
            $.get(`http://localhost/Software-Technology/position/getList?rowsPerPage=10&page=${currentPage}`, function(response) {
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
                    if ($row % 2 == 0) {

                        table1.append(`
                        <tr class="table-light">
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="form-check-input form-check-success form-check-glow" id="${data.TenDangNhap}">
                                </div>
                            </td>
                            <td>${data.ma_chuc_vu}</td>
                            <td>${data.ten_chuc_vu}</td>                        
                            <td>
                                <button onclick="viewRow('${data.ma_chuc_vu}')" type="button" class="btn btn-sm btn-outline-primary" style="padding-top: 3px; padding-bottom: 4px;">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button onclick="repairRow('${data.ma_chuc_vu}')" type="button" class="btn btn-sm btn-outline-success" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-tools"></i>
                                </button>
                                <button onclick="deleteRow('${data.ma_chuc_vu}')" type="button" class="btn btn-sm btn-outline-danger" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </td>
                        </tr>`);
                    } else {
                        table1.append(`
                        <tr class="table-info">
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="form-check-input form-check-success form-check-glow" id="${data.TenDangNhap}">
                                </div>
                            </td>
                            <td>${data.ma_chuc_vu}</td>
                            <td>${data.ten_chuc_vu}</td>
                            <td>
                                <button onclick="viewRow('${data.ma_chuc_vu}')" type="button" class="btn btn-sm btn-outline-primary" style="padding-top: 3px; padding-bottom: 4px;">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button onclick="repairRow('${data.ma_chuc_vu}')" type="button" class="btn btn-sm btn-outline-success" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-tools"></i>
                                </button>
                                <button onclick="deleteRow('${data.ma_chuc_vu}')" type="button" class="btn btn-sm btn-outline-danger" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </td>
                        </tr>`);
                    }
                    checkedRows.push(data.ma_chuc_vu);
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

        // function layDSUserSearchNangCao(search, search2) {
        //     $.get(`http://localhost/Software-Technology/user/advancedSearch?rowsPerPage=10&page=${currentPage}&search=${search}&search2=${search2}`, function(response) {
        //         // Không được gán biến response này ra ngoài function,
        //         // vì function này bất đồng bộ, khi nào gọi api xong thì response mới có dữ liệu
        //         // gán ra ngoài thì code ở ngoài chạy trc khi gọi api xong.
        //         //data là danh sách usser
        //         //page là trang hiện tại
        //         // rowsPerpage là số dòng trên 1 trang
        //         // totalPage là tổng số trang
        //         const table1 = $('#table1 > tbody');
        //         table1.empty();
        //         checkedRows = [];
        //         $row = 0;
        //         response.data.forEach(data => {
        //             let disabled = "disabled btn icon icon-left btn-secondary";
        //             if (data.YeuCau == 1) {
        //                 disabled = "btn btn-primary";
        //             }
        //             let tenQuyen = "";
        //             quyens.forEach(quyen => {
        //                 if (quyen.MaQuyen == data.MaQuyen) {
        //                     tenQuyen = quyen.TenQuyen;
        //                     return true;
        //                 }
        //             });
        //             if ($row % 2 == 0) {

        //                 table1.append(`
        //                 <tr class="table-light">
        //                     <td>
        //                         <div class="custom-control custom-checkbox">
        //                             <input type="checkbox" class="form-check-input form-check-success form-check-glow" id="${data.TenDangNhap}">
        //                         </div>
        //                     </td>
        //                     <td>${data.TenDangNhap}</td>
        //                     <td>${data.FullName}</td>
        //                     <td>${tenQuyen}</td>
        //                     <td><button id="reset${data.TenDangNhap}" type="button" onclick="resetPass('${data.TenDangNhap}')" class="${disabled}">Khôi Phục</button></td>
        //                     <td>
        //                         <button onclick="viewRow('${data.TenDangNhap}')" type="button" class="btn btn-sm btn-outline-primary" style="padding-top: 3px; padding-bottom: 4px;">
        //                             <i class="bi bi-eye"></i>
        //                         </button>
        //                         <button onclick="repairRow('${data.TenDangNhap}')" type="button" class="btn btn-sm btn-outline-success" style="padding-top: 7px; padding-bottom: 0px;">
        //                             <i class="bi bi-tools"></i>
        //                         </button>
        //                         <button onclick="deleteRow('${data.TenDangNhap}')" type="button" class="btn btn-sm btn-outline-danger" style="padding-top: 7px; padding-bottom: 0px;">
        //                             <i class="bi bi-trash-fill"></i>
        //                         </button>
        //                     </td>
        //                 </tr>`);
        //             } else {
        //                 table1.append(`
        //                 <tr class="table-info">
        //                     <td>
        //                         <div class="custom-control custom-checkbox">
        //                             <input type="checkbox" class="form-check-input form-check-success form-check-glow" id="${data.TenDangNhap}">
        //                         </div>
        //                     </td>
        //                     <td>${data.TenDangNhap}</td>
        //                     <td>${data.FullName}</td>
        //                     <td>${tenQuyen}</td>
        //                     <td><button id="reset${data.TenDangNhap}" type="button" onclick="resetPass('${data.TenDangNhap}')" class="${disabled}">Khôi Phục</button></td>
        //                     <td>
        //                         <button onclick="viewRow('${data.TenDangNhap}')" type="button" class="btn btn-sm btn-outline-primary" style="padding-top: 3px; padding-bottom: 4px;">
        //                             <i class="bi bi-eye"></i>
        //                         </button>
        //                         <button onclick="repairRow('${data.TenDangNhap}')" type="button" class="btn btn-sm btn-outline-success" style="padding-top: 7px; padding-bottom: 0px;">
        //                             <i class="bi bi-tools"></i>
        //                         </button>
        //                         <button onclick="deleteRow('${data.TenDangNhap}')" type="button" class="btn btn-sm btn-outline-danger" style="padding-top: 7px; padding-bottom: 0px;">
        //                             <i class="bi bi-trash-fill"></i>
        //                         </button>
        //                     </td>
        //                 </tr>`);
        //             }
        //             checkedRows.push(data.TenDangNhap);
        //             $row += 1;
        //         });

        //         const pagination = $('#pagination');
        //         // Xóa phân trang cũ
        //         pagination.empty();
        //         if (response.totalPage > 1) {
        //             for (let i = 1; i <= response.totalPage; i++) {
        //                 if (i == currentPage) {
        //                     pagination.append(`
        //                 <li class="page-item active">
        //                     <button class="page-link" onClick='changePageSearchNangCao(${i},"${search}","${search2}")'>${i}</button>
        //                 </li>`)
        //                 } else {
        //                     pagination.append(`
        //                 <li class="page-item">
        //                     <button class="page-link" onClick='changePageSearchNangCao(${i},"${search}","${search2}")'>${i}</button>
        //                 </li>`)
        //                 }

        //             }
        //         }

        //     });
        // }

        // function viewRow(params) {
        //     let data = {
        //         macv: params
        //     };
        //     $.post(`http://localhost/Software-Technology/position/getPosition`, data, function(response) {
        //         if (response.thanhcong) {
        //             $("#view-machucvu").val(response.ma_chuc_vu);
        //             $("#view-tenchucvu").val(response.ten_chuc_vu);                    
        //         }
        //     });
        //     $("#view-user-modal").modal('toggle');
        // }

        // function resetPass(params) {
        //     let data = {
        //         email: params
        //     };
        //     $.post(`http://localhost/Software-Technology/user/resetPassword`, data, function(response) {
        //         if (response.thanhcong) {

        //             Toastify({
        //                 text: "Khôi Phục Thành Công",
        //                 duration: 1000,
        //                 close: true,
        //                 gravity: "top",
        //                 position: "center",
        //                 backgroundColor: "#4fbe87",
        //             }).showToast();
        //             $("#reset" + params).removeClass("btn-primary");
        //             $("#reset" + params).addClass("disabled icon icon-left btn-secondary");
        //         } else {
        //             Toastify({
        //                 text: "Khôi Phục Thất Bại",
        //                 duration: 1000,
        //                 close: true,
        //                 gravity: "top",
        //                 position: "center",
        //                 backgroundColor: "#FF6A6A",
        //             }).showToast();
        //         }
        //     });
        // }

        // function repairRow(params) {
        //     let data = {
        //         email: params
        //     };

        //     $.post(`http://localhost/Software-Technology/user/viewUser`, data, function(response) {
        //         if (response.thanhcong) {
        //             $('#re-email').val(response.TenDangNhap);
        //             $('#cars-quyen-sua').val(response.MaQuyen).prop('selected', true);
        //             $('#re-fullname').val(response.FullName);
        //         }
        //     });
        //     $("#repair-user-modal").modal('toggle');
        //     //Sua form
        //     $("form[name='repair-user-form']").validate({
        //         rules: {
        //             fullname: {
        //                 required: true,
        //                 validateName: true,
        //             }
        //         },
        //         messages: {
        //             fullname: {
        //                 required: "Vui lòng nhập họ tên",
        //             }
        //         },
        //         submitHandler: function(form, event) {
        //             event.preventDefault();
        //             $("#myModalLabel110").text("Quản Lý Tài Khoản");
        //             $("#question-model").text("Bạn có chắc chắn muốn sửa tài khoản này không");
        //             $("#question-user-modal").modal('toggle');
        //             $('#thuchien').off('click')
        //             $("#thuchien").click(function() {
        //                 // lấy dữ liệu từ form

        //                 const data = Object.fromEntries(new FormData(form).entries());
        //                 data['email'] = $('#re-email').val();
        //                 $.post(`http://localhost/Software-Technology/user/repairUser`, data, function(response) {
        //                     if (response.thanhcong) {
        //                         currentPage = 1;
        //                         layDSUserAjax();
        //                         Toastify({
        //                             text: "Sửa Thành Công",
        //                             duration: 1000,
        //                             close: true,
        //                             gravity: "top",
        //                             position: "center",
        //                             backgroundColor: "#4fbe87",
        //                         }).showToast();
        //                     } else {
        //                         Toastify({
        //                             text: "Sửa Thất Bại",
        //                             duration: 1000,
        //                             close: true,
        //                             gravity: "top",
        //                             position: "center",
        //                             backgroundColor: "#FF6A6A",
        //                         }).showToast();
        //                     }

        //                     // Đóng modal
        //                     $("#repair-user-modal").modal('toggle')
        //                 });
        //             });
        //         }
        //     })
        // }

        // function deleteRow(params) {
        //     let data = {
        //         email: params
        //     };
        //     $("#myModalLabel110").text("Quản Lý Tài Khoản");
        //     $("#question-model").text("Bạn có chắc chắn muốn xóa tài khoản này không");
        //     $("#question-user-modal").modal('toggle');
        //     $('#thuchien').off('click');
        //     $("#thuchien").click(function() {
        //         $.post(`http://localhost/Software-Technology/user/deleteUser`, data, function(response) {
        //             if (response.thanhcong) {
        //                 Toastify({
        //                     text: "Xóa Thành Công",
        //                     duration: 1000,
        //                     close: true,
        //                     gravity: "top",
        //                     position: "center",
        //                     backgroundColor: "#4fbe87",
        //                 }).showToast();
        //                 currentPage = 1;
        //                 layDSUserAjax();
        //             } else {
        //                 Toastify({
        //                     text: "Xóa Thất Bại",
        //                     duration: 1000,
        //                     close: true,
        //                     gravity: "top",
        //                     position: "center",
        //                     backgroundColor: "#FF6A6A",
        //                 }).showToast();
        //             }
        //         });
        //     });

        // }
        // $("#btn-delete-user").click(function() {
        //     $("#myModalLabel110").text("Quản Lý Tài Khoản");
        //     $("#question-model").text("Bạn có chắc chắn muốn xóa những tài khoản này không");
        //     $("#question-user-modal").modal('toggle');
        //     $('#thuchien').off('click')
        //     $("#thuchien").click(function() {
        //         let datas = []
        //         checkedRows.forEach(checkedRow => {
        //             if ($('#' + checkedRow).prop("checked")) {
        //                 datas.push(checkedRow);
        //             }
        //         });
        //         let data = {
        //             emails: JSON.stringify(datas)
        //         };
        //         $.post(`http://localhost/Software-Technology/user/deleteUsers`, data, function(response) {
        //             if (response.thanhcong) {
        //                 Toastify({
        //                     text: "Xóa Thành Công",
        //                     duration: 1000,
        //                     close: true,
        //                     gravity: "top",
        //                     position: "center",
        //                     backgroundColor: "#4fbe87",
        //                 }).showToast();
        //                 currentPage = 1;
        //                 layDSUserAjax();
        //             } else {
        //                 Toastify({
        //                     text: "Xóa Thất Bại",
        //                     duration: 1000,
        //                     close: true,
        //                     gravity: "top",
        //                     position: "center",
        //                     backgroundColor: "#FF6A6A",
        //                 }).showToast();
        //             }
        //         });
        //     });
        // });
    </script>
</body>