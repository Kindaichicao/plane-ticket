<?php

use App\Core\View;

View::$activeItem = 'rank';

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
                        <div id="search-rank-form" name="search-rank-form">
                            <div class="form-group position-relative has-icon-right">
                                <input id="serch-rank-text" type="text" class="form-control" placeholder="Tìm kiếm" value="">
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
                                    <h3>Danh sách hạng</h3>
                                </label>
                                <label>
                                    <h5 style="margin-left: 50px; margin-right: 10px;"> Lọc Theo:</h5>
                                </label>
                                <select class="btn btn btn-primary" name="search-cbb" id="cars-search">
                                    <option value="0">Tất Cả</option>
                                    <option value="1">Mã hạng</option>
                                    <option value="2">Tên hạng</option>
                                    <option value="3">Mức điểm</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-5 order-md-2 order-first">

                                <div class=" loat-start float-lg-end mb-3">
                                    <button id='btn-delete-rank' class="btn btn-danger">
                                        <i class="bi bi-trash-fill"></i> Xóa hạng
                                    </button>
                                    <button id='open-add-rank-btn' class="btn btn-primary">
                                        <i class="bi bi-plus"></i> Thêm hạng
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
                                                <th>Mã hạng khách hàng</th>
                                                <th>Tên hạng khách hàng</th>
                                                <th>Mức điểm</th>
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
                <div class="modal fade text-left" id="add-rank-modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Thêm hạng khách hàng</h4>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form name="add-rank-form" action="/" method="POST">
                                    <div class="modal-body">
                                        <label for="email">Mã hạng khách hàng: </label>
                                        <div class="form-group">
                                            <input type="text" id="themmahang" name="mahang" placeholder="Mã hạng" class="form-control">
                                        </div>
                                        <label for="fullname">Tên hạng khách hàng: </label>
                                        <div class="form-group">
                                            <input type="text" id="themtenhang" name="tenhang" placeholder="Tên hạng" class="form-control">
                                        </div>
                                        <label for="password">Mức điểm: </label>
                                        <div class="form-group">
                                            <input type="number" id="themmucdiem" name="mucdiem" placeholder="Mức điểm" class="form-control">
                                        </div>
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
                <!--MODAL SUA-->
                <div class="modal fade text-left" id="repair-rank-modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Sửa hạng khách hàng</h4>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <form name="repair-rank-form" action="/" method="POST">
                                <div class="modal-body">
                                    <label>Mã hạng khách hàng: </label>
                                    <div class="form-group">
                                        <input type="text" id="re-mahang" name="mahang" class="form-control" readonly>
                                    </div>
                                    <label for="re-fullname">Tên hạng khách hàng: </label>
                                    <div class="form-group">
                                        <input type="text" id="re-tenhang" name="tenhang" placeholder=" nhập tên hạng" class="form-control">
                                    </div>
                                    <label for="re-fullname">Mức điểm: </label>
                                    <div class="form-group">
                                        <input type="text" id="re-mucdiem" name="mucdiem" placeholder="nhập mức điểm" class="form-control">
                                    </div>
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
                </div>
                <!-- Modal Thong bao -->
                <div class="modal fade text-left" id="question-rank-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110" aria-hidden="true">
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
                <div class="modal fade" id="view-rank-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">

                            <div class="modal-body">
                                <ul class="list-group">
                                    <li class="list-group-item active">Thông Tin Chi Tiết</li>
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label>Mã hạng khách hàng:</label>
                                            <input type="text" class="form-control" id="view-mahang" disabled>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label>Tên hạng khách hàng:</label>
                                            <input type="text" class="form-control" id="view-tenhang" disabled>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label>Mức điểm:</label>
                                            <input type="text" class="form-control" id="view-mucdiem" disabled>
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
            layDSRankAjax();
            // kietm tra quyen
            // Đặt sự kiện validate cho modal add user
            $("form[name='add-rank-form']").validate({
                rules: {
                    mahang: {
                        required: true,
                        remote: {
                            url: "http://localhost/Software-Technology/rank/checkvaliemahang",
                            type: "POST",
                        }
                    },
                    tenhang: {
                        required: true,
                    },
                    mucdiem: {
                        required: true,
                        remote: {
                            url: "http://localhost/Software-Technology/rank/checkvaliemucdiem",
                            type: "POST",
                        }
                    },
                },
                messages: {
                    mahang: {
                        required: "Vui lòng nhập mã hạng",
                    },
                    tenhang: {
                        required: "Vui lòng nhập tên hạng",
                    },
                    mucdiem: {
                        required: "Vui lòng nhập mức điểm",
                    },
                },
                submitHandler: function(form, event) {
                    event.preventDefault();
                    // lấy dữ liệu từ form
                    const data = Object.fromEntries(new FormData(form).entries());
                    $.post(`http://localhost/Software-Technology/rank/create`, data, function(response) {
                        console.log(response);
                        if (response.thanhcong) {
                            currentPage = 1;
                            layDSRankAjax();
                            Toastify({
                                text: "Thêm thành công",
                                duration: 1000,
                                close: true,
                                gravity: "top",
                                position: "center",
                                backgroundColor: "#4fbe87",
                            }).showToast();
                        } else{
                            Toastify({
                                text: "Thêm thất bại",
                                duration: 1000,
                                close: true,
                                gravity: "top",
                                position: "center",
                                backgroundColor: "#FF6A6A",
                            }).showToast();
                        }
                        // Đóng modal
                        $("#add-rank-modal").modal('toggle')
                    });
                    $('#themmahang').val("");
                    $('#themtenhang').val("");
                    $('#themmucdiem').val("");
                }
            })

        });

        $("#open-add-rank-btn").click(function() {
            $('#themmahang').val("");
            $('#themtenhang').val("");
            $('#themmucdiem').val("");
            $("#add-rank-modal").modal('toggle')
        });


        function changePage(newPage) {
            currentPage = newPage;
            layDSRankAjax();
        }

        function changePageSearchNangCao(newPage, search, search2) {
            currentPage = newPage;
            layDSRankSearchNangCao(search, search2);
        }

        $('#cars-search').change(function() {
            let search = $('#cars-search option').filter(':selected').val();
            //alert(search);
            currentPage = 1;
            layDSRankSearchNangCao($('#serch-rank-text').val(), search);
        });

        $("#search-rank-form").keyup(debounce(function() {
            let search = $('#cars-search option').filter(':selected').val();
            currentPage = 1;
            //alert($('#serch-rank-text').val());
            layDSRankSearchNangCao($('#serch-rank-text').val(), search);
        },200));

        function layDSRankAjax() {
            $.get(`http://localhost/Software-Technology/rank/getList?rowsPerPage=10&page=${currentPage}`, function(response) {
                console.log(response);
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
                    if (data.YeuCau == 1) {
                        disabled = "btn btn-primary";
                    }
                    let tenQuyen = "";
                    // quyens.forEach(quyen => {
                    //     if (quyen.MaQuyen == data.MaQuyen) {
                    //         tenQuyen = quyen.TenQuyen;
                    //         return true;
                    //     }
                    // });
                    if ($row % 2 == 0) {

                        table1.append(`
                        <tr class="table-light">
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="form-check-input form-check-success form-check-glow" id="${data.ma_hang_kh}">
                                </div>
                            </td>
                            <td>${data.ma_hang_kh}</td>
                            <td>${data.ten_hang}</td>
                            <td>${data.muc_diem}</td>
                            <td>
                                <button onclick="viewRow('${data.ma_hang_kh}')" type="button" class="btn btn-sm btn-outline-primary" style="padding-top: 3px; padding-bottom: 4px;">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button onclick="repairRow('${data.ma_hang_kh}')" type="button" class="btn btn-sm btn-outline-success" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-tools"></i>
                                </button>
                                <button onclick="deleteRow('${data.ma_hang_kh}')" type="button" class="btn btn-sm btn-outline-danger" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </td>
                        </tr>`);
                    } else { 
                        table1.append(`
                        <tr class="table-info">
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="form-check-input form-check-success form-check-glow" id="${data.ma_hang_kh}">
                                </div>
                            </td>
                            <td>${data.ma_hang_kh}</td>
                            <td>${data.ten_hang}</td>
                            <td>${data.muc_diem}</td>
                            <td>
                                <button onclick="viewRow('${data.ma_hang_kh}')" type="button" class="btn btn-sm btn-outline-primary" style="padding-top: 3px; padding-bottom: 4px;">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button onclick="repairRow('${data.ma_hang_kh}')" type="button" class="btn btn-sm btn-outline-success" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-tools"></i>
                                </button>
                                <button onclick="deleteRow('${data.ma_hang_kh}')" type="button" class="btn btn-sm btn-outline-danger" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </td>
                        </tr>`);
                    }
                    checkedRows.push(data.ma_hang_kh);
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

        function layDSRankSearchNangCao(search, search2) {
            $.get(`http://localhost/Software-Technology/rank/searchRank1?rowsPerPage=10&page=${currentPage}&search=${search}&search2=${search2}`, function(response) {
                // Không được gán biến response này ra ngoài function,
                // vì function này bất đồng bộ, khi nào gọi api xong thì response mới có dữ liệu
                // gán ra ngoài thì code ở ngoài chạy trc khi gọi api xong.
                //data là danh sách usser
                //page là trang hiện tại
                // rowsPerpage là số dòng trên 1 trang
                // totalPage là tổng số trang;
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
                                    <input type="checkbox" class="form-check-input form-check-success form-check-glow" id="${data.ma_hang_kh}">
                                </div>
                            </td>
                            <td>${data.ma_hang_kh}</td>
                            <td>${data.ten_hang}</td>
                            <td>${data.muc_diem}</td>
                            <td>
                                <button onclick="viewRow('${data.ma_hang_kh}')" type="button" class="btn btn-sm btn-outline-primary" style="padding-top: 3px; padding-bottom: 4px;">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button onclick="repairRow('${data.ma_hang_kh}')" type="button" class="btn btn-sm btn-outline-success" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-tools"></i>
                                </button>
                                <button onclick="deleteRow('${data.ma_hang_kh}')" type="button" class="btn btn-sm btn-outline-danger" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </td>
                        </tr>`);
                    } else {
                        table1.append(`
                        <tr class="table-info">
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="form-check-input form-check-success form-check-glow" id="${data.ma_hang_kh}">
                                </div>
                            </td>
                            <td>${data.ma_hang_kh}</td>
                            <td>${data.ten_hang}</td>
                            <td>${data.muc_diem}</td>

                            <td>
                                <button onclick="viewRow('${data.ma_hang_kh}')" type="button" class="btn btn-sm btn-outline-primary" style="padding-top: 3px; padding-bottom: 4px;">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button onclick="repairRow('${data.ma_hang_kh}')" type="button" class="btn btn-sm btn-outline-success" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-tools"></i>
                                </button>
                                <button onclick="deleteRow('${data.ma_hang_kh}')" type="button" class="btn btn-sm btn-outline-danger" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </td>
                        </tr>`);
                    }
                    checkedRows.push(data.ma_hang_kh);
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
                            <button class="page-link" onClick='changePageSearchNangCao(${i},"${search}","${search2}")'>${i}</button>
                        </li>`)
                        } else {
                            pagination.append(`
                        <li class="page-item">
                            <button class="page-link" onClick='changePageSearchNangCao(${i},"${search}","${search2}")'>${i}</button>
                        </li>`)
                        }

                    }
                }

            });
        }

        function viewRow(params) {
            let data = {
                mahang: params
            };
            $.post(`http://localhost/Software-Technology/rank/getRank`, data, function(response) {
                if (response.thanhcong) {
                    $("#view-mahang").val(response.mahang);
                    $("#view-tenhang").val(response.tenhang);
                    $("#view-mucdiem").val(response.mucdiem);
                }
            });
            $("#view-rank-modal").modal('toggle');
        }

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

        function repairRow(params) {
            let data = {
                mahang: params
            };
            $.post(`http://localhost/Software-Technology/rank/getRank`, data, function(response) {
                if (response.thanhcong) {
                    $('#re-mahang').val(response.mahang);
                    $('#re-tenhang').val(response.tenhang);
                    $('#re-mucdiem').val(response.mucdiem);
                }
            });
            $("#repair-rank-modal").modal('toggle');
            //Sua form
            $("form[name='repair-rank-form']").validate({
                rules: {
                    mahang: {
                        required: true,
                    },
                    tenhang: {
                        required: true,
                    },
                    mucdiem: {
                        required: true,
                    },
                },
                messages: {
                    mahang: {
                        required: "Vui lòng nhập mã hạng",
                    },
                    tenhang: {
                        required: "Vui lòng nhập tên hạng",
                    },
                    mucdiem: {
                        required: "Vui lòng nhập mức điểm",
                    }
                },
                submitHandler: function(form, event) {
                    event.preventDefault();
                    $("#myModalLabel110").text("Quản Lý hạng khách hàng");
                    $("#question-model").text("Bạn có chắc chắn muốn sửa hạng khách hàng này không?");
                    $("#question-rank-modal").modal('toggle');
                    $('#thuchien').off('click');
                    $("#thuchien").click(function() {
                        // lấy dữ liệu từ form

                        const data = Object.fromEntries(new FormData(form).entries());
                        $.post(`http://localhost/Software-Technology/rank/update`, data, function(response) {
                            console.log(response);
                            if (response.thanhcong) {
                                currentPage = 1;
                                layDSRankAjax();
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
                            $("#repair-rank-modal").modal('toggle')
                        });
                    });
                }
            })
        }

        function deleteRow(params) {
            let data = {
                mahang: params
            };
            $("#myModalLabel110").text("Quản Lý hạng khách hàng");
            $("#question-model").text("Bạn có chắc chắn muốn xóa  hạng khách hàng này không?");
            $("#question-rank-modal").modal('toggle');
            $('#thuchien').off('click');
            $("#thuchien").click(function() {
                $.post(`http://localhost/Software-Technology/rank/delete`, data, function(response) {
                    console.log(response);
                    if (response.thanhcong==0) {
                        Toastify({
                            text: "Xóa Thành Công",
                            duration: 1000,
                            close: true,
                            gravity: "top",
                            position: "center",
                            backgroundColor: "#4fbe87",
                        }).showToast();
                        currentPage = 1;
                        layDSRankAjax();
                    } else  if(response.thanhcong==1){
                        Toastify({
                            text: "Xóa Thất Bại",
                            duration: 1000,
                            close: true,
                            gravity: "top",
                            position: "center",
                            backgroundColor: "#FF6A6A",
                        }).showToast();
                    }else {
                        Toastify({
                            text: "Hạng khách hàng có chứa khách hàng không thể xóa",
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
        $("#btn-delete-rank").click(function() {
            $("#myModalLabel110").text("Quản Lý Tài Khoản");
            $("#question-model").text("Bạn có chắc chắn muốn xóa những hạng khách hàng này không");
            $("#question-rank-modal").modal('toggle');
            $('#thuchien').off('click')
            $("#thuchien").click(function() {
                let datas = []
                checkedRows.forEach(checkedRow => {
                    if ($('#' + checkedRow).prop("checked")) {
                        datas.push(checkedRow);
                    }
                });
                let data = {
                    mahang: JSON.stringify(datas)
                };
                $.post(`http://localhost/Software-Technology/rank/deletes`, data, function(response) {
                    console.log(response);
                    if (response.thanhcong>0) {
                        Toastify({
                            text: response.tb,
                            duration: 1000,
                            close: true,
                            gravity: "top",
                            position: "center",
                            backgroundColor: "#4fbe87",
                        }).showToast();
                        currentPage = 1;
                        layDSRankAjax();
                    } else {
                        Toastify({
                            text: "Xóa Thất Bại",
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