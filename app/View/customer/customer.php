<?php

use App\Core\View;

View::$activeItem = 'customer';

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
                        <div id="search-customer-form" name="search-customer-form">
                            <div class="form-group position-relative has-icon-right">
                                <input id="serch-customer-text" type="text" class="form-control" placeholder="Tìm kiếm" value="">
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
                                    <h3>Danh sách khách hàng</h3>
                                </label>
                                <label>
                                    <h5 style="margin-left: 50px; margin-right: 10px;"> Lọc Theo:</h5>
                                </label>
                                <select class="btn btn btn-primary" name="search-cbb" id="cars-search">
                                    <option value="1">Tất Cả</option>
                                    <option value="2">Họ tên</option>
                                    <option value="3">Căn cước công dân</option>
                                    <option value="4">Số điện thoại</option>
                                    <option value="5">Hạng</option>
                                    <option value="6">Điểm tích lũy</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-5 order-md-2 order-first">

                                <div class=" loat-start float-lg-end mb-3">
                                    <button id='btn-delete-customer' class="btn btn-danger">
                                        <i class="bi bi-trash-fill"></i> Xóa khách hàng
                                    </button>
                                    <button id='open-add-customer-btn' class="btn btn-primary">
                                        <i class="bi bi-plus"></i> Thêm khách hàng
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
                                                <th>Họ tên</th>
                                                <th>Hạng khách hàng</th>
                                                <th>Số điện thoại</th>
                                                <th>Căn cước công dân</th>
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
                <div class="modal fade text-left" id="add-customer-modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Thêm khách hàng</h4>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form name="add-customer-form" action="/" method="POST">
                                    <div class="modal-body">
                                        <label for="fullnamekh">Họ tên: </label>
                                        <div class="form-group">
                                            <input type="text" id="fullnamekh" name="fullnamekh" placeholder="Họ tên" class="form-control">
                                        </div>
                                        <label for="hochieukh">Số hộ chiếu: </label>
                                        <div class="form-group">
                                            <input type="text" id="hochieukh" name="hochieukh" placeholder="Số hộ chiếu" class="form-control">
                                        </div>
                                        <label for="cccdkh">Căn cước công dân: </label>
                                        <div class="form-group">
                                            <input type="text" id="cccdkh" name="cccdkh" placeholder="Căn cước công dân" class="form-control">
                                        </div>
                                        <label for="numberphonekh">Số điện thoại: </label>
                                        <div class="form-group">
                                            <input type="text" id="numberphonekh" name="numberphonekh" placeholder="Số điện thoại" class="form-control">
                                        </div>
                                        <label for="emailkh">Email: </label>
                                        <div class="form-group">
                                            <input type="email" id="emailkh" name="emailkh" placeholder="Email" class="form-control">
                                        </div>
                                        <label for="birthdaykh">Ngày sinh: </label>
                                        <div class="form-group">
                                            <input type="date" id="birthdaykh" name="birthdaykh" placeholder="Ngày sinh" class="form-control">
                                        </div>
                                        <label for="genderkh">Giới tính: </label>
                                        <div class="form-group">
                                        <select class="form-select" name="genderkh" id="genderkh">
                                            <option value="Nam">Nam</option>
                                            <option value="Nữ">Nữ</option>
                                        </select>
                                        </div>
                                        <label for="addresskh">Địa chỉ: </label>
                                        <div class="form-group">
                                            <input type="text" id="addresskh" name="addresskh" placeholder="Địa chỉ" class="form-control">
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
                <div class="modal fade text-left" id="repair-customer-modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Sửa Thông Tin Khách Hàng</h4>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form name="repair-customer-form" action="/" method="POST">
                                    <div class="modal-body">
                                        <label for="re-fullnamekh">Họ tên: </label>
                                        <div class="form-group">
                                            <input type="text" id="re-fullnamekh" name="fullnamekh" placeholder="Họ tên" class="form-control">
                                        </div>
                                        <label for="re-hochieukh">Số hộ chiếu: </label>
                                        <div class="form-group">
                                            <input type="text" id="re-hochieukh" name="hochieukh" placeholder="Số hộ chiếu" class="form-control">
                                        </div>
                                        <label for="re-cccdkh">Căn cước công dân: </label>
                                        <div class="form-group">
                                            <input type="text" id="re-cccdkh" name="cccdkh" placeholder="Căn cước công dân" class="form-control">
                                        </div>
                                        <label for="re-numberphonekh">Số điện thoại: </label>
                                        <div class="form-group">
                                            <input type="text" id="re-numberphonekh" name="numberphonekh" placeholder="Số điện thoại" class="form-control">
                                        </div>
                                        <label for="re-emailkh">Email: </label>
                                        <div class="form-group">
                                            <input type="email" id="re-emailkh" name="emailkh" placeholder="Email" class="form-control">
                                        </div>
                                        <label for="re-birthdaykh">Ngày sinh: </label>
                                        <div class="form-group">
                                            <input type="date" id="re-birthdaykh" name="birthdaykh" placeholder="Ngày sinh" class="form-control">
                                        </div>
                                        <label for="re-genderkh">Giới tính: </label>
                                        <div class="form-group">
                                        <select class="form-select" name="genderkh" id="re-genderkh">
                                            <option value="Nam">Nam</option>
                                            <option value="Nữ">Nữ</option>
                                        </select>
                                        </div>
                                        <label for="re-addresskh">Địa chỉ: </label>
                                        <div class="form-group">
                                            <input type="text" id="re-addresskh" name="addresskh" placeholder="Địa chỉ" class="form-control">
                                        </div>
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
                <div class="modal fade text-left" id="question-customer-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110" aria-hidden="true">
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
                <div class="modal fade" id="view-customer-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">

                            <div class="modal-body">
                                <ul class="list-group">
                                    <li class="list-group-item active">Thông Tin Chi Tiết</li>
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label>Họ Và Tên:</label>
                                            <input type="text" class="form-control" id="view-hotenkh" disabled>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label>Tên hạng:</label>
                                            <input type="text" class="form-control" id="view-tenhangkh" disabled>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label>Số hộ chiếu:</label>
                                            <input type="text" class="form-control" id="view-hochieukh" disabled>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label>Căn cước công dân:</label>
                                            <input type="text" class="form-control" id="view-cccdkh" disabled>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label>Số điện thoại:</label>
                                            <input type="text" class="form-control" id="view-sdtkh" disabled>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label>Email:</label>
                                            <input type="text" class="form-control" id="view-emailkh" disabled>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label>Ngày sinh:</label>
                                            <input type="text" class="form-control" id="view-datekh" disabled>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label>Giới tính:</label>
                                            <input type="text" class="form-control" id="view-genderkh" disabled>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label>Địa chỉ:</label>
                                            <input type="text" class="form-control" id="view-addresskh" disabled>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label>Điểm tích lũy:</label>
                                            <input type="text" class="form-control" id="view-tichluykh" disabled>
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
        let hangkhs
        // on ready
        $(function() {
            layDSCustomerAjax();
            // $.post(`http://localhost/Software-Technology/quyen/getQuyens`, function(response) {
            //     if (response.thanhcong) {
            //         quyens = response.data;
            //         quyens.forEach(data => {
            //             let opt = '<option value="' + data.MaQuyen + '">' + data.TenQuyen + '</option>';
            //             $("#cars-quyen").append(opt);
            //             $("#cars-search").append(opt);
            //             $("#cars-quyen-sua").append(opt);
            //         });
            //         layDSUserAjax();
            //     }
            // });
            //kietm tra quyen
            

            // Đặt sự kiện validate cho modal add user
            $("form[name='add-customer-form']").validate({
                rules: {
                    fullnamekh: {
                        required: true,
                        validateName: true,
                    },

                    cccdkh: {
                        required: true,
                        number: true,
                    },
                    numberphonekh: {
                        required: true,
                        number: true,

                    },
                    emailkh: {
                        required: true,
                        email:true,
                    },
                    birthdaykh: {
                        required: true,
                    },
                    genderkh: {
                        required: true,
                    },
                    addresskh: {
                        required: true,
                    },
                },
                messages: {
                    fullnamekh: {
                        required: "Vui lòng nhập họ tên",
                    },
                    cccdkh: {
                        required: "Vui lòng nhập căn cước công dân",
                        number: "Căn cước công dân phải là số"
                    },
                    numberphonekh: {
                        required: "Vui lòng nhập số điện thoại",
                        number: "Số điện thoại dân phải là số"
                    },
                    emailkh: {
                        required: "Vui lòng nhập email",
                        email: "Vui lòng nhập đúng định dạng email"
                    },
                    birthdaykh: {
                        required: "Vui lòng nhập ngày sinh",
                    },
                    addresskh: {
                        required: "Vui lòng nhập địa chỉ",
                    },
                },
                submitHandler: function(form, event) {
                    event.preventDefault();
                    // lấy dữ liệu từ form
                    const data = Object.fromEntries(new FormData(form).entries());

                    $.post(`http://localhost/Software-Technology/customer/create`, data, function(response) {
                        if (response.thanhcong) {
                            currentPage = 1;
                            layDSCustomerAjax();
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
                        $("#add-customer-modal").modal('toggle')
                    });
                    $('#fullnamekh').val("");
                    $('#hochieukh').val("");
                    $('#cccdkh').val("");
                    $('#numberphonekh').val("");
                    $('#emailkh').val("");
                    $('#birthdaykh').val("");
                    $('#addresskh').val("");
                }
            })

        });

        $("#open-add-customer-btn").click(function() {
            $('#fullnamekh').val("");
            $('#hochieukh').val("");
            $('#cccdkh').val("");
            $('#numberphonekh').val("");
            $('#emailkh').val("");
            $('#birthdaykh').val("");
            $('#addresskh').val("");
            $("#add-customer-modal").modal('toggle')
        });


        function changePage(newPage) {
            currentPage = newPage;
            layDSCustomerAjax();
        }

        function changePageSearchNangCao(newPage, search, search2) {
            currentPage = newPage;
            layDSCustomerSearchNangCao(search, search2);
        }

        $('#cars-search').change(function() {
            let search = $('#cars-search option').filter(':selected').val();
            currentPage = 1;
            layDSCustomerSearchNangCao($('#serch-customer-text').val(), search);
        });

        $("#search-customer-form").keyup(debounce(function() {
            let search = $('#cars-search option').filter(':selected').val();
            currentPage = 1;
            layDSCustomerSearchNangCao($('#serch-customer-text').val(), search);
        },200));

        function layDSCustomerAjax() {
            $.get(`http://localhost/Software-Technology/customer/getList?rowsPerPage=10&page=${currentPage}`, function(response) {
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
                    
                    if ($row % 2 == 0) {

                        table1.append(`
                        <tr class="table-light">
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="form-check-input form-check-success form-check-glow" id="${data.ma_kh}">
                                </div>
                            </td>
                            <td>${data.ho_ten}</td>
                            <td>${data.ten_hang}</td>
                            <td>${data.sdt}</td>
                            <td>${data.cccd}</td>
                            <td>
                                <button onclick="viewRow('${data.ma_kh}')" type="button" class="btn btn-sm btn-outline-primary" style="padding-top: 3px; padding-bottom: 4px;">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button onclick="repairRow('${data.ma_kh}')" type="button" class="btn btn-sm btn-outline-success" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-tools"></i>
                                </button>
                                <button onclick="deleteRow('${data.ma_kh}')" type="button" class="btn btn-sm btn-outline-danger" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </td>
                        </tr>`);
                    } else {
                        table1.append(`
                        <tr class="table-info">
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="form-check-input form-check-success form-check-glow" id="${data.ma_kh}">
                                </div>
                            </td>
                            <td>${data.ho_ten}</td>
                            <td>${data.ten_hang}</td>
                            <td>${data.sdt}</td>
                            <td>${data.cccd}</td>
                            <td>
                                <button onclick="viewRow('${data.ma_kh}')" type="button" class="btn btn-sm btn-outline-primary" style="padding-top: 3px; padding-bottom: 4px;">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button onclick="repairRow('${data.ma_kh}')" type="button" class="btn btn-sm btn-outline-success" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-tools"></i>
                                </button>
                                <button onclick="deleteRow('${data.ma_kh}')" type="button" class="btn btn-sm btn-outline-danger" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </td>
                        </tr>`);
                    }
                    checkedRows.push(data.ma_kh);
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

        function layDSCustomerSearchNangCao(search, search2) {
            $.get(`http://localhost/Software-Technology/customer/getListSearch?rowsPerPage=10&page=${currentPage}&search=${search}&search2=${search2}`, function(response) {
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
                                    <input type="checkbox" class="form-check-input form-check-success form-check-glow" id="${data.ma_kh}">
                                </div>
                            </td>
                            <td>${data.ho_ten}</td>
                            <td>${data.ten_hang}</td>
                            <td>${data.sdt}</td>
                            <td>${data.cccd}</td>
                            
                            <td>
                                <button onclick="viewRow('${data.ma_kh}')" type="button" class="btn btn-sm btn-outline-primary" style="padding-top: 3px; padding-bottom: 4px;">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button onclick="repairRow('${data.ma_kh}')" type="button" class="btn btn-sm btn-outline-success" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-tools"></i>
                                </button>
                                <button onclick="deleteRow('${data.ma_kh}')" type="button" class="btn btn-sm btn-outline-danger" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </td>
                        </tr>`);
                    } else {
                        table1.append(`
                        <tr class="table-info">
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="form-check-input form-check-success form-check-glow" id="${data.ma_kh}">
                                </div>
                            </td>
                            <td>${data.ho_ten}</td>
                            <td>${data.ten_hang}</td>
                            <td>${data.sdt}</td>
                            <td>${data.cccd}</td>
                            
                            <td>
                                <button onclick="viewRow('${data.ma_kh}')" type="button" class="btn btn-sm btn-outline-primary" style="padding-top: 3px; padding-bottom: 4px;">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button onclick="repairRow('${data.ma_kh}')" type="button" class="btn btn-sm btn-outline-success" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-tools"></i>
                                </button>
                                <button onclick="deleteRow('${data.ma_kh}')" type="button" class="btn btn-sm btn-outline-danger" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </td>
                        </tr>`);
                    }
                    checkedRows.push(data.ma_kh);
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
                makh: params
            };
            $.post(`http://localhost/Software-Technology/customer/viewCustomer`, data, function(response) {
                if (response.thanhcong) {
                    $("#view-hotenkh").val(response.FullName);
                    $("#view-tenhangkh").val(response.tenhang);
                    $("#view-hochieukh").val(response.hochieu);
                    $("#view-cccdkh").val(response.cccd);
                    $("#view-sdtkh").val(response.sdt);
                    $("#view-emailkh").val(response.email);
                    $("#view-datekh").val(response.date);
                    $("#view-genderkh").val(response.gender);
                    $("#view-addresskh").val(response.address);
                    $("#view-tichluykh").val(response.diemtichluy);
                }
            });
            $("#view-customer-modal").modal('toggle');
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
                makh: params
            };

            $.post(`http://localhost/Software-Technology/customer/viewCustomer`, data, function(response) {
                if (response.thanhcong) {
                    $('#re-fullnamekh').val(response.FullName);
                    $('#re-hochieukh').val(response.hochieu);
                    $('#re-cccdkh').val(response.cccd);
                    $('#re-numberphonekh').val(response.sdt);
                    $('#re-emailkh').val(response.email);
                    $('#re-birthdaykh').val(response.date);
                    $('#re-genderkh').val(response.gender).prop('selected', true);;
                    $('#re-addresskh').val(response.address);
                }
            });
            $("#repair-customer-modal").modal('toggle');
            //Sua form
            $("form[name='repair-customer-form']").validate({
                rules: {
                    fullnamekh: {
                        required: true,
                        validateName: true,
                    },

                    cccdkh: {
                        required: true,
                        number: true,
                    },
                    numberphonekh: {
                        required: true,
                        number: true,

                    },
                    emailkh: {
                        required: true,
                        email:true,
                    },
                    birthdaykh: {
                        required: true,
                    },
                    genderkh: {
                        required: true,
                    },
                    addresskh: {
                        required: true,
                    },
                },
                messages: {
                    fullnamekh: {
                        required: "Vui lòng nhập họ tên",
                    },
                    cccdkh: {
                        required: "Vui lòng nhập căn cước công dân",
                        number: "Căn cước công dân phải là số"
                    },
                    numberphonekh: {
                        required: "Vui lòng nhập số điện thoại",
                        number: "Số điện thoại dân phải là số"
                    },
                    emailkh: {
                        required: "Vui lòng nhập email",
                        email: "Vui lòng nhập đúng định dạng email"
                    },
                    birthdaykh: {
                        required: "Vui lòng nhập ngày sinh",
                    },
                    addresskh: {
                        required: "Vui lòng nhập địa chỉ",
                    },
                },
                submitHandler: function(form, event) {
                    event.preventDefault();
                    $("#myModalLabel110").text("Quản Lý Khách Hàng");
                    $("#question-model").text("Bạn có chắc chắn muốn sửa khách hàng này không");
                    $("#question-customer-modal").modal('toggle');
                    $('#thuchien').off('click')
                    $("#thuchien").click(function() {
                        // lấy dữ liệu từ form

                        const data = Object.fromEntries(new FormData(form).entries());
                        data['makh'] = params;
                        $.post(`http://localhost/Software-Technology/customer/update`, data, function(response) {
                            if (response.thanhcong) {
                                currentPage = 1;
                                layDSCustomerAjax();
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
                            $("#repair-customer-modal").modal('toggle')
                        });
                    });
                }
            })
        }

        function deleteRow(params) {
            let data = {
                makh: params
            };
            $("#myModalLabel110").text("Quản Lý Khách Hàng");
            $("#question-model").text("Bạn có chắc chắn muốn xóa khách hàng này không");
            $("#question-customer-modal").modal('toggle');
            $('#thuchien').off('click');
            $("#thuchien").click(function() {
                $.post(`http://localhost/Software-Technology/customer/delete`, data, function(response) {
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
                        layDSCustomerAjax();
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

        $("#btn-delete-customer").click(function() {
            $("#myModalLabel110").text("Quản Lý Khách Hàng");
            $("#question-model").text("Bạn có chắc chắn muốn xóa những khách hàng này không");
            $("#question-customer-modal").modal('toggle');
            $('#thuchien').off('click')
            $("#thuchien").click(function() {
                let datas = []
                checkedRows.forEach(checkedRow => {
                    if ($('#' + checkedRow).prop("checked")) {
                        datas.push(checkedRow);
                    }
                });
                let data = {
                    makh: JSON.stringify(datas)
                };
                $.post(`http://localhost/Software-Technology/customer/deletes`, data, function(response) {
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
                        layDSCustomerAjax();
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
