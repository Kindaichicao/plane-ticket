<?php

use App\Core\View;

View::$activeItem = 'staff';

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
                        <div id="search-staff-form" name="search-staff-form">
                            <div class="form-group position-relative has-icon-right">
                                <input id="serch-staff-text" type="text" class="form-control" placeholder="Tìm kiếm" value="">
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
                                    <h3>Danh sách nhân viên</h3>
                                </label>
                                <label>
                                    <h5 style="margin-left: 50px; margin-right: 10px;"> Lọc Theo:</h5>
                                </label>
                                <select class="btn btn btn-primary" name="search-cbb" id="cars-search">
                                    <option value="0" selected>Tất Cả </option>
                                    <option value="1">Tên nhân viên </option>
                                    <option value="2">CMND/CCCD</option>
                                    <option value="3">Email</option>
                                    <!-- <option value="4">Ngày bán</option> -->
                                </select>
                            </div>
                            <div class="col-12 col-md-5 order-md-2 order-first">

                                <div class=" loat-start float-lg-end mb-3">
                                    <button id='btn-delete-staff' class="btn btn-danger">
                                        <i class="bi bi-trash-fill"></i> Xóa nhân viên
                                    </button>
                                    <button id='open-add-staff-btn' class="btn btn-primary">
                                        <i class="bi bi-plus"></i> Thêm nhân viên
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
                                                <th>Tên nhân viên</th>
                                                <th>Giới tính</th>
                                                <th>Ngày sinh</th>
                                                <th>Email</th>
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
                <div class="modal fade text-left" id="add-staff-modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Thêm nhân viên</h4>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form name="add-staff-form" action="/" method="POST">
                                    <div class="modal-body">
                                        <label for="tennhanvien">Tên nhân viên: </label>
                                        <div class="form-group">
                                            <input type="text" id="tennhanvien" name="tennhanvien" placeholder="Họ tên nhân viên" class="form-control">
                                        </div>
                                        <label for="gioitinhnhanvien">Giới tính: </label>
                                        <div class="form-group">
                                            <select class="form-select" name="gioitinhnhanvien" id="gioitinhnhanvien" >
                                                <option value="Nữ">Nữ</option>
                                                <option value="Nam" selected>Nam</option>
                                            </select>
                                        </div>
                                        <label for="ngaysinhnhanvien">Ngày sinh: </label>
                                        <div class="form-group">
                                            <input type="date" id="ngaysinhnhanvien" name="ngaysinhnhanvien"  class="form-control">
                                        </div>
                                        <label for="emailnhanvien">Email: </label>
                                        <div class="form-group">
                                            <input type="text" id="emailnhanvien" name="emailnhanvien" placeholder="Email" class="form-control">
                                        </div>
                                        <label for="cccdnhanvien">CMND/CCCD: </label>
                                        <div class="form-group">
                                            <input type="text" id="cccdnhanvien" name="cccdnhanvien" placeholder="CMND/CCCD" class="form-control">
                                        </div>
                                        <label for="sodienthoainhanvien">Số điện thoại: </label>
                                        <div class="form-group">
                                            <input type="text" id="sodienthoainhanvien" name="sodienthoainhanvien" placeholder="Số điện thoại" class="form-control">
                                        </div>
                                        <label for="diachinhanvienn">Địa chỉ: </label>
                                        <div class="form-group">
                                             <input type="text" id="diachinhanvienn" name="diachinhanvienn" placeholder="Địa chỉ" class="form-control">
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
                <div class="modal fade text-left" id="repair-staff-modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Sửa nhân viên</h4>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                            <form name="repair-staff-form" action="/" method="POST">
                                <div class="modal-body">
                                         <label for="manhanvien1">Mã nhân viên: </label>
                                        <div class="form-group">
                                            <input type="text" readonly id="manhanvien1" name="manhanvien1" placeholder="Mã nhân viên" class="form-control" disabled>
                                        </div>
                                        <label for="mataikhoan1">Mã tài khoản nhân viên: </label>
                                        <div class="form-group">
                                            <input type="text" id="mataikhoan1" name="mataikhoan1" placeholder="Mã nhân viên" class="form-control" disabled>
                                        </div>
                                        <label for="tennhanvien1">Tên nhân viên: </label>
                                        <div class="form-group">
                                            <input type="text" id="tennhanvien1" name="tennhanvien1" placeholder="Họ tên nhân viên" class="form-control">
                                        </div>
                                        <label for="gioitinhnhanvien1">Giới tính: </label>
                                        <div class="form-group">
                                            <select class="form-select" name="gioitinhnhanvien1" id="gioitinhnhanvien1" >
                                                <option value="Nữ">Nữ</option>
                                                <option value="Nam" selected>Nam</option>
                                            </select>
                                        </div>
                                        <label for="ngaysinhnhanvien1">Ngày sinh: </label>
                                        <div class="form-group">
                                            <input type="date" id="ngaysinhnhanvien1" name="ngaysinhnhanvien1"  class="form-control">
                                        </div>
                                        <label for="emailnhanvien1">Email: </label>
                                        <div class="form-group">
                                            <input type="text" id="emailnhanvien1" name="emailnhanvien1" placeholder="Email" class="form-control">
                                        </div>
                                        <label for="cccdnhanvien1">CMND/CCCD: </label>
                                        <div class="form-group">
                                            <input type="text" id="cccdnhanvien1" name="cccdnhanvien1" placeholder="CMND/CCCD" class="form-control">
                                        </div>
                                        <label for="sodienthoainhanvien1">Số điện thoại: </label>
                                        <div class="form-group">
                                            <input type="text" id="sodienthoainhanvien1" name="sodienthoainhanvien1" placeholder="Số điện thoại" class="form-control">
                                        </div>
                                        <label for="diachinhanvienn1">Địa chỉ: </label>
                                        <div class="form-group">
                                             <input type="text" id="diachinhanvienn1" name="diachinhanvienn1" placeholder="Địa chỉ" class="form-control">
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
                <div class="modal fade text-left" id="question-staff-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110" aria-hidden="true">
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
                <div class="modal fade" id="view-staff-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">

                            <div class="modal-body">
                                <ul class="list-group">
                                    <li class="list-group-item active">Thông Tin Chi Tiết</li>
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label>Mã nhân viên:</label>
                                            <input type="text" class="form-control" id="view-manhanvien" disabled>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label>Mã tài khoản:</label>
                                            <input type="text" class="form-control" id="view-mataikhoannhanvien" disabled>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label>Tên nhân viên:</label>
                                            <input type="text" class="form-control" id="view-tennhanvien" disabled>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label>Giới tính:</label>
                                                <select class="form-select"  id="view-gioitinhnhanvien" disabled>
                                                    <option value="Nam" selected>Nam </option>
                                                    <option value="Nữ">Nữ </option>
                                                    <!-- <option value="4">Ngày bán</option> -->
                                                </select>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label>Ngày sinh:</label>
                                            <input type="text" class="form-control" id="view-ngaysinhnhanvien" disabled>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label>Email:</label>
                                            <input type="text" class="form-control" id="view-emailnhanvien" disabled>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label>CMND/CCCD:</label>
                                            <input type="text" class="form-control" id="view-cccdnhanvien" disabled>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label>Số điện thoại:</label>
                                            <input type="text" class="form-control" id="view-sodienthoainhanvien" disabled>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label>Địa chỉ:</label>
                                            <textarea type="text" class="form-control" id="view-diachinhanvien" disabled></textarea>
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
            layDSListStaffAjax();
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
            

            // Đặt sự kiện validate cho modal add staff
            $("form[name='add-staff-form']").validate({
                rules: {
                    tennhanvien: {
                        required: true,
                        validateName: true,
                    },
                    diachinhanvienn: {
                        required: true,
                    },
                    ngaysinhnhanvien: {
                        required: true,
                    },
                    emailnhanvien: {
                        required: true,
                        email:true,
                    },
                    cccdnhanvien: {
                        required: true,
                        number:true,
                    },
                    sodienthoainhanvien: {
                        required: true,
                        number:true,
                    },

                },
                messages: {
                    tennhanvien: {
                        required: "Vui lòng nhập tên nhân viên",
                    },
                    diachinhanvienn: {
                        required: "Vui lòng nhập địa chỉ nhân viên",
                    },
                    ngaysinhnhanvien: {
                        required: "Vui lòng chọn ngày sinh nhân viên",
                    },
                    emailnhanvien: {
                        required: "Vui lòng nhập email nhân viên",
                    },
                    cccdnhanvien: {
                        required: "Vui lòng nhập CMND/CCCD nhân viên",
                    },
                    sodienthoainhanvien: {
                        required: "Vui lòng nhập số điện thoại nhân viên",
                    },

                },
                submitHandler: function(form, event) {         
                       event.preventDefault();
                        // lấy dữ liệu từ form
                        const data = Object.fromEntries(new FormData(form).entries());
                        $.post(`http://localhost/Software-Technology/staff/create`, data, function(response) {
                            if (response.thanhcong) {
                                currentPage = 1;
                                layDSListStaffAjax();
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
                            $("#add-staff-modal").modal('toggle')
                            
                        });
                       
                       
                    }

            })

        });

        $("#open-add-staff-btn").click(function() {
            $('#tennhanvien').val("");
            $('#ngaysinhnhanvien').val("");
            $('#emailnhanvien').val("");
            $('#cccdnhanvien').val("");
            $('#sodienthoainhanvien').val("");
            $("#add-staff-modal").modal('toggle')
        });


        function changePage(newPage) {
            currentPage = newPage;
            layDSListStaffAjax();
        }

        function changePageSearchNangCao(newPage, search, search2) {
            currentPage = newPage;
            layDSStaffSearchNangCao(search, search2);
        }

        $('#cars-search').change(function() {
            let search = $('#cars-search option').filter(':selected').val();
            currentPage = 1;
            layDSStaffSearchNangCao($('#serch-staff-text').val(), search);
        });

        $("#search-staff-form").keyup(debounce(function() {
            let search = $('#cars-search option').filter(':selected').val();
            currentPage = 1;
            layDSStaffSearchNangCao($('#serch-staff-text').val(), search);
        },200));

        function layDSListStaffAjax() {
            $.get(`http://localhost/Software-Technology/staff/getList?rowsPerPage=10&page=${currentPage}`, function(response) {
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
                                    <input type="checkbox" class="form-check-input form-check-success form-check-glow" id="${data.ma_nv}">
                                </div>
                            </td>
                            <td>${data.ho_ten}</td>
                            <td>${data.gioi_tinh}</td>
                            <td>${data.ngay_sinh}</td>
                            <td>${data.email}</td>
                            <td>
                                <button onclick="viewRow('${data.ma_nv}')" type="button" class="btn btn-sm btn-outline-primary" style="padding-top: 3px; padding-bottom: 4px;">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button onclick="repairRow('${data.ma_nv}')" type="button" class="btn btn-sm btn-outline-success" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-tools"></i>
                                </button>
                                <button onclick="deleteRow('${data.ma_nv}')" type="button" class="btn btn-sm btn-outline-danger" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </td>
                        </tr>`);
                    } else {
                        table1.append(`
                        <tr class="table-info">
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="form-check-input form-check-success form-check-glow" id="${data.ma_nv}">
                                </div>
                            </td>
                            <td>${data.ho_ten}</td>
                            <td>${data.gioi_tinh}</td>
                            <td>${data.ngay_sinh}</td>
                            <td>${data.email}</td>
                            <td>
                                <button onclick="viewRow('${data.ma_nv}')" type="button" class="btn btn-sm btn-outline-primary" style="padding-top: 3px; padding-bottom: 4px;">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button onclick="repairRow('${data.ma_nv}')" type="button" class="btn btn-sm btn-outline-success" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-tools"></i>
                                </button>
                                <button onclick="deleteRow('${data.ma_nv}')" type="button" class="btn btn-sm btn-outline-danger" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </td>
                        </tr>`);
                    }
                    checkedRows.push(data.ma_nv);
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

        function layDSStaffSearchNangCao(search, search2) {
            $.get(`http://localhost/Software-Technology/staff/advancedSearch?rowsPerPage=10&page=${currentPage}&search=${search}&search2=${search2}`, function(response) {
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
                                    <input type="checkbox" class="form-check-input form-check-success form-check-glow" id="${data.ma_nv}">
                                </div>
                            </td>
                            <td>${data.ho_ten}</td>
                            <td>${data.gioi_tinh}</td>
                            <td>${data.ngay_sinh}</td>
                            <td>${data.email}</td>
                            <td>
                                <button onclick="viewRow('${data.ma_nv}')" type="button" class="btn btn-sm btn-outline-primary" style="padding-top: 3px; padding-bottom: 4px;">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button onclick="repairRow('${data.ma_nv}')" type="button" class="btn btn-sm btn-outline-success" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-tools"></i>
                                </button>
                                <button onclick="deleteRow('${data.ma_nv}')" type="button" class="btn btn-sm btn-outline-danger" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </td>
                        </tr>`);
                    } else {
                        table1.append(`
                        <tr class="table-info">
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="form-check-input form-check-success form-check-glow" id="${data.ma_nv}">
                                </div>
                            </td>
                            <td>${data.ho_ten}</td>
                            <td>${data.gioi_tinh}</td>
                            <td>${data.ngay_sinh}</td>
                            <td>${data.email}</td>
                            <td>
                                <button onclick="viewRow('${data.ma_nv}')" type="button" class="btn btn-sm btn-outline-primary" style="padding-top: 3px; padding-bottom: 4px;">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button onclick="repairRow('${data.ma_nv}')" type="button" class="btn btn-sm btn-outline-success" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-tools"></i>
                                </button>
                                <button onclick="deleteRow('${data.ma_nv}')" type="button" class="btn btn-sm btn-outline-danger" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </td>
                        </tr>`);
                    }
                    checkedRows.push(data.ma_nv);
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
                manv: params    
            };
            $.post('http://localhost/Software-Technology/staff/getStaff', data, function(response) {
                if (response.thanhcong) {
                    $("#view-manhanvien").val(response.ma_nv); 
                    $("#view-mataikhoannhanvien").val(response.ma_tk);   
                    $("#view-tennhanvien").val(response.ho_ten);
                    $("#view-gioitinhnhanvien").val(response.gioi_tinh);
                    $("#view-ngaysinhnhanvien").val(response.ngay_sinh);
                    $("#view-emailnhanvien").val(response.email);   
                    $("#view-cccdnhanvien").val(response.cccd);
                    $("#view-sodienthoainhanvien").val(response.sdt);
                    $("#view-diachinhanvien").val(response.dia_chi);
                }
            });
            $("#view-staff-modal").modal('toggle');
        }


        function repairRow(params) {
            let data = {
                manv: params
            };

            $.post(`http://localhost/Software-Technology/staff/getStaff`, data, function(response) {
                if (response.thanhcong) {
                    $("#manhanvien1").val(response.ma_nv); 
                    $("#mataikhoan1").val(response.ma_tk);   
                    $("#tennhanvien1").val(response.ho_ten);
                    $("#gioitinhnhanvien1").val(response.gioi_tinh);
                    $("#ngaysinhnhanvien1").val(response.ngay_sinh);
                    $("#emailnhanvien1").val(response.email);   
                    $("#cccdnhanvien1").val(response.cccd);
                    $("#sodienthoainhanvien1").val(response.sdt);
                    $("#diachinhanvienn1").val(response.dia_chi); 
                }
            });
            $("#repair-staff-modal").modal('toggle');
            //Sua form
            $("form[name='repair-staff-form']").validate({
                rules: {
                    tennhanvien1: {
                        required: true,
                        validateName: true,
                    },
                    diachinhanvienn1: {
                        required: true,
                    },
                    ngaysinhnhanvien1: {
                        required: true,
                    },
                    emailnhanvien1: {
                        required: true,
                        email:true,
                    },
                    cccdnhanvien1: {
                        required: true,
                        number:true,
                    },
                    sodienthoainhanvien1: {
                        required: true,
                        number:true,
                    },

                },
                messages: {
                    tennhanvien1: {
                        required: "Vui lòng nhập tên nhân viên",
                    },
                    diachinhanvienn1: {
                        required: "Vui lòng nhập địa chỉ nhân viên",
                    },
                    ngaysinhnhanvien1: {
                        required: "Vui lòng chọn ngày sinh nhân viên",
                    },
                    emailnhanvien1: {
                        required: "Vui lòng nhập email nhân viên",
                    },
                    cccdnhanvien1: {
                        required: "Vui lòng nhập CMND/CCCD nhân viên",
                    },
                    sodienthoainhanvien1: {
                        required: "Vui lòng nhập số điện thoại nhân viên",
                    },

                },
                submitHandler: function(form, event) {
                    event.preventDefault();
                    $("#myModalLabel110").text("Quản lý nhân viên");
                    $("#question-model").text("Bạn có chắc chắn muốn sửa nhân viên này không");
                    $("#question-staff-modal").modal('toggle');
                    $('#thuchien').off('click')
                    $("#thuchien").click(function() {
                        // lấy dữ liệu từ form

                        const data = Object.fromEntries(new FormData(form).entries());
                        data['manhanvien1'] = $('#manhanvien1').val();
                        $.post(`http://localhost/Software-Technology/staff/update`, data, function(response) {
                            if (response.thanhcong) {
                                currentPage = 1;
                                layDSListStaffAjax();
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
                            $("#repair-staff-modal").modal('toggle')
                        });
                    });
                }
            })
        }

        function deleteRow(params) {
            let data = {
                manv: params
            };
            $("#myModalLabel110").text("Quản Lý Nhân Viên");
            $("#question-model").text("Bạn có chắc chắn muốn xóa nhân viên này không ?");
            $("#question-staff-modal").modal('toggle');
            $('#thuchien').off('click');
            $("#thuchien").click(function() {
                $.post(`http://localhost/Software-Technology/staff/delete`, data, function(response) {
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
                        layDSListStaffAjax();
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
        $("#btn-delete-staff").click(function() {
            $("#myModalLabel110").text("Quản Lý Nhân Viên");
            $("#question-model").text("Bạn có chắc chắn muốn xóa những nhân viên này không ?");
            $("#question-staff-modal").modal('toggle');
            $('#thuchien').off('click')
            $("#thuchien").click(function() {
                let datas = []
                checkedRows.forEach(checkedRow => {
                    if ($('#' + checkedRow).prop("checked")) {
                        datas.push(checkedRow);
                    }
                });
                let data = {
                    manvs: JSON.stringify(datas)
                };
                $.post(`http://localhost/Software-Technology/staff/deletes`, data, function(response) {
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
                        layDSListStaffAjax();
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