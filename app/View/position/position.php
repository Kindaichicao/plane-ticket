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
                        <div id="search-position-form" name="search-position-form">
                            <div class="form-group position-relative has-icon-right">
                                <input id="serch-position-text" type="text" class="form-control" placeholder="Tìm kiếm" value="">
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
                                    <option value="1">Tất Cả</option>
                                    <option value="2">Mã chức vụ</option>
                                    <option value="3">Tên chức vụ</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-5 order-md-2 order-first">

                                <div class=" loat-start float-lg-end mb-3">
                                    <button id='btn-delete-position' class="btn btn-danger">
                                        <i class="bi bi-trash-fill"></i> Xóa chức vụ
                                    </button>
                                    <button id='open-add-position-btn' class="btn btn-primary">
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
                <div class="modal fade text-left" id="add-position-modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Thêm Chức Vụ</h4>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form name="add-position-form" action="/" method="POST">
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label>Mã chức vụ:</label>
                                            <input type="text" class="form-control" id="machucvu" name="machucvu">
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label>Tên chức vụ:</label>
                                            <input type="text" class="form-control" id="tenchucvu" name="tenchucvu">
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <label>Chi Tiết:</label>
                                        <ul id="chucnang-list" class="list-unstyled mb-0">

                                        </ul>
                                    </li>
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
                <div class="modal fade text-left" id="repair-position-modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Sửa Chức vụ</h4>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <form name="repair-position-form" action="/" method="POST">
                                <div class="modal-body">
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label>Mã chức vụ:</label>
                                            <input type="text" class="form-control" id="re-machucvu" name="machucvu" readonly>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label>Tên chức vụ:</label>
                                            <input type="text" class="form-control" id="re-tenchucvu" name="tenchucvu">
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <label>Chi Tiết:</label>
                                        <ul id="re-chucnang-list" class="list-unstyled mb-0">

                                        </ul>
                                    </li>
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
                <div class="modal fade text-left" id="question-position-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110" aria-hidden="true">
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
                <div class="modal fade" id="view-position-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                    <li class="list-group-item">
                                        <label>Chi Tiết:</label>
                                        <ul id="view-chucnang-list" class="list-unstyled mb-0">

                                        </ul>
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
        let chucnangs
        // on ready
        $(function() {          
            //kietm tra quyen
            $.post(`http://localhost/Software-Technology/position/getChucNang`, function(response) {
                chucnangs = response.data;
                chucnangs.forEach(data => {
                    let viewopt = '<li class="d-inline-block me-0 mb-1 w-50">\
                                    <div class="form-check">\
                                        <div class="custom-control custom-checkbox">\
                                            <input type="checkbox" class="form-check-input form-check-success" name="' + data.ma_chuc_nang + '" id="view-' + data.ma_chuc_nang + '" disabled>\
                                            <label class="form-check-label" for="customColorCheck3">' + data.ten + '</label>\
                                        </div>\
                                    </div>\
                                </li>';
                    let opt = '<li class="d-inline-block me-0 mb-1 w-50">\
                                    <div class="form-check">\
                                        <div class="custom-control custom-checkbox">\
                                            <input type="checkbox" class="form-check-input form-check-success"  name="' + data.ma_chuc_nang + '" id="add-' + data.ma_chuc_nang + '" >\
                                            <label class="form-check-label" for="customColorCheck3">' + data.ten + '</label>\
                                        </div>\
                                    </div>\
                                </li>';
                    let reopt = '<li class="d-inline-block me-0 mb-1 w-50">\
                                <div class="form-check">\
                                    <div class="custom-control custom-checkbox">\
                                        <input type="checkbox" class="form-check-input form-check-success" name="' + data.ma_chuc_nang + '" id="re-' + data.ma_chuc_nang + '" >\
                                        <label class="form-check-label" for="customColorCheck3">' + data.ten + '</label>\
                                    </div>\
                                </div>\
                            </li>';
                    $("#chucnang-list").append(opt);
                    $("#re-chucnang-list").append(reopt);
                    $("#view-chucnang-list").append(viewopt);
                });
            });             
            layDSChucVuAjax();
            //Đặt sự kiện validate cho modal add position
            $("form[name='add-position-form']").validate({
                rules: {                   
                    machucvu: {
                        required: true,   
                        remote: {
                            url: "http://localhost/Software-Technology/position/checkValidMaChucVu",
                            type: "POST",
                        }                    
                    },                  
                    tenchucvu: {
                        required: true,
                    },
                },
                messages: {
                    machucvu: {
                        required: "Vui lòng nhập mã chức vụ",
                    },
                    tenchucvu: {
                        required: "Vui lòng nhập tên chức vụ",
                    },                    
                },
                submitHandler: function(form, event) {
                    event.preventDefault();
                    // lấy dữ liệu từ form
                    const tam = Object.fromEntries(new FormData(form).entries());
                    chucnangs.forEach(cn => {
                            if ($('#add-' + cn.ma_chuc_nang).prop("checked")) {
                                tam[cn.ma_chuc_nang] = 1;
                            }
                        });
                        let chitiet = [];
                        Object.keys(tam).forEach(key => {
                            if(key == 'machucvu' || key == 'tenchucvu'){
                                return;
                            }
                            let temp = {
                                ma_chuc_vu: tam['machucvu'],
                                ma_chuc_nang: key,                                
                            }
                            chitiet.push(temp)
                        })
                        let data = {
                            machucvu :tam['machucvu'],
                            tenchucvu :tam['tenchucvu'],
                            chitiets : JSON.stringify(chitiet)
                        }
                    $.post(`http://localhost/Software-Technology/position/create`, data, function(response) {
                        if (response.thanhcong) {
                            currentPage = 1;
                            layDSChucVuAjax();
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
                        $("#add-position-modal").modal('toggle')
                    });
                    $('#machucvu').val("");
                    $('#tenchucvu').val("");
                }
            })

        });

        $("#open-add-position-btn").click(function() {
            $('#machucvu').val("");
            $('#tenchucvu').val("");
            $("#add-position-modal").modal('toggle')
        });


        function changePage(newPage) {
            currentPage = newPage;
            layDSChucVuAjax();
        }

        function changePageSearchNangCao(newPage, search, search2) {
            currentPage = newPage;
            layDSChucVuSearchNangCao(search, search2);
        }

        $('#cars-search').change(function() {
            let search = $('#cars-search option').filter(':selected').val();
            currentPage = 1;
            layDSChucVuSearchNangCao($('#serch-position-text').val(), search);
        });

        $("#search-position-form").keyup(debounce(function() {
            let search = $('#cars-search').val();
            currentPage = 1;
            layDSChucVuSearchNangCao($('#serch-position-text').val(), search);
        },200));

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
                                    <input type="checkbox" class="form-check-input form-check-success form-check-glow" id="${data.ma_chuc_vu}">
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
                                    <input type="checkbox" class="form-check-input form-check-success form-check-glow" id="${data.ma_chuc_vu}">
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

        function layDSChucVuSearchNangCao(search, search2) {
            $.get(`http://localhost/Software-Technology/position/getListSearch?rowsPerPage=10&page=${currentPage}&search=${search}&search2=${search2}`, function(response) {
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
                                    <input type="checkbox" class="form-check-input form-check-success form-check-glow" id="${data.ma_chuc_vu}">
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
                                    <input type="checkbox" class="form-check-input form-check-success form-check-glow" id="${data.ma_chuc_vu}">
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
            chucnangs.forEach(function(cn) {
                    $('#view-' + cn.ma_chuc_nang).prop('checked', false);                        
            }); 
            let data = {
                macv: params
            };
            $.post(`http://localhost/Software-Technology/position/getPosition`, data, function(response) {
                if (response.thanhcong) {
                    $("#view-machucvu").val(response.ma_chuc_vu);
                    $("#view-tenchucvu").val(response.ten_chuc_vu);   
                    response.chitiet.forEach(function(cn) {
                        $('#view-' + cn.ma_chuc_nang).prop('checked', true);                        
                    });                 
                }
            });
            $("#view-position-modal").modal('toggle');
        }        

        function repairRow(params) {
            chucnangs.forEach(function(cn) {
                $('#re-' + cn.ma_chuc_nang).prop('checked', false);                        
            }); 
            let data = {
                macv: params
            };
            $.post(`http://localhost/Software-Technology/position/getPosition`, data, function(response) {
                if (response.thanhcong) {
                    $("#re-machucvu").val(response.ma_chuc_vu);
                    $("#re-tenchucvu").val(response.ten_chuc_vu);   
                    response.chitiet.forEach(function(cn) {
                        $('#re-' + cn.ma_chuc_nang).prop('checked', true);                        
                    });                 
                }
            });
            $("#repair-position-modal").modal('toggle');
            //Sua form
            $("form[name='repair-position-form']").validate({
                rules: {                                
                    tenchucvu: {
                        required: true,
                    },
                },
                messages: {                    
                    tenchucvu: {
                        required: "Vui lòng nhập tên chức vụ",
                    },                    
                },
                submitHandler: function(form, event) {                    
                    event.preventDefault();
                    $("#myModalLabel110").text("Quản Lý chức vụ");
                    $("#question-model").text("Bạn có chắc chắn muốn sửa chức vụ này không");
                    $("#question-position-modal").modal('toggle');                    
                    $('#thuchien').off('click')
                    $("#thuchien").click(function() {
                        // lấy dữ liệu từ form

                        const tam = Object.fromEntries(new FormData(form).entries());
                        tam['machucvu'] = $('#re-machucvu').val();
                        chucnangs.forEach(cn => {
                            if ($('#re-' + cn.ma_chuc_nang).prop("checked")) {
                                tam[cn.ma_chuc_nang] = 1;
                            }
                        });
                        let chitiet = [];
                        Object.keys(tam).forEach(key => {
                            if(key == 'machucvu' || key == 'tenchucvu'){
                                return;
                            }
                            let temp = {
                                ma_chuc_vu: tam['machucvu'],
                                ma_chuc_nang: key,                                
                            }
                            chitiet.push(temp)
                        })
                        let data = {
                            machucvu :tam['machucvu'],
                            tenchucvu :tam['tenchucvu'],
                            chitiets : JSON.stringify(chitiet)
                        }
                        $.post(`http://localhost/Software-Technology/position/update`, data, function(response) {
                            if (response.thanhcong) {
                                currentPage = 1;
                                layDSChucVuAjax();
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
                            $("#repair-position-modal").modal('toggle')
                        });
                    });
                }
            })
        }

        function deleteRow(params) {
            let data = {
                macv: params
            };
            $("#myModalLabel110").text("Quản Lý Chức Vụ");
            $("#question-model").text("Bạn có chắc chắn muốn xóa chức vụ này không");
            $("#question-position-modal").modal('toggle');
            $('#thuchien').off('click');
            $("#thuchien").click(function() {
                $.post(`http://localhost/Software-Technology/position/delete`, data, function(response) {
                    if (response.thanhcong) {
                        Toastify({
                            text: "Xóa Thành Công",
                            duration: 1000,
                            close: true,
                            gravity: "top",
                            position: "center",
                            backgroundColor: "#4fbe87",
                        }).showToast();
                        currentPage = 1;
                        layDSChucVuAjax();
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

        }
        $("#btn-delete-position").click(function() {
            $("#myModalLabel110").text("Quản Lý Chức Vụ");
            $("#question-model").text("Bạn có chắc chắn muốn xóa những chức vụ này không");
            $("#question-position-modal").modal('toggle');
            $('#thuchien').off('click')
            $("#thuchien").click(function() {
                let datas = []
                checkedRows.forEach(checkedRow => {
                    if ($('#' + checkedRow).prop("checked")) {
                        datas.push(checkedRow);
                    }
                });
                let data = {
                    macvs: JSON.stringify(datas)
                };
                $.post(`http://localhost/Software-Technology/position/deletes`, data, function(response) {
                    if (response.thanhcong) {
                        Toastify({
                            text: "Xóa Thành Công",
                            duration: 1000,
                            close: true,
                            gravity: "top",
                            position: "center",
                            backgroundColor: "#4fbe87",
                        }).showToast();
                        currentPage = 1;
                        layDSChucVuAjax();
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