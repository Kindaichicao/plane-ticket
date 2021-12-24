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
                                    <option value="1">Mã hãng hàng không </option>
                                    <option value="2">Tên hãng hàng không</option>
                                    <option value="3">Loại hãng</option>
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
                <!-- <div class="modal fade text-left" id="add-staff-modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Thêm Hãng Hàng Không</h4>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form name="add-staff-form" action="/" method="POST">
                                    <div class="modal-body">
                                        <label for="mahanghangkhong">Mã hãng hàng không: </label>
                                        <div class="form-group">
                                            <input type="text" id="mahanghangkhong" name="mahanghangkhong" placeholder="Mã Hãng" class="form-control">
                                        </div>
                                        <label for="tenhanghangkhong">Tên hãng hàng không: </label>
                                        <div class="form-group">
                                            <input type="text" id="tenhanghangkhong" name="tenhanghangkhong" placeholder="Tên hãng" class="form-control">
                                        </div>
                                        <label for="motahanghangkhong">Mô tả: </label>
                                        <div class="form-group">
                                            <textarea type="text" id="motahanghangkhong" name="motahanghangkhong" placeholder="Mô tả" class="form-control"> </textarea>
                                        </div>
                                        <label for="loaihanghangkhong">Loại hãng: </label>
                                        <div class="form-group">
                                            <select class="form-select" name="loaihanghangkhong" id="loaihanghangkhong" >
                                                <option value="Ký hợp đồng">Ký hợp đồng</option>
                                                <option value="Công ty quản lý" selected>Công ty quản lý</option>
                                            </select>
                                        </div>
                                        <label for="ngaybanhanghangkhong">Ngày bán: </label>
                                        <ul id="view-thu-list" class="list-unstyled mb-0">

                                        </ul>
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
                <!-- <div class="modal fade text-left" id="repair-staff-modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Sửa Hãng Hàng Không</h4>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <form name="repair-staff-form" action="/" method="POST">
                                <div class="modal-body">
                                <label for="mahanghangkhong1">Mã hãng hàng không: </label>
                                        <div class="form-group">
                                            <input type="text" readonly id="mahanghangkhong1" name="mahanghangkhong1" placeholder="Mã Hãng" class="form-control">
                                        </div>
                                        <label for="tenhanghangkhong1">Tên hãng hàng không: </label>
                                        <div class="form-group">
                                            <input type="text" id="tenhanghangkhong1" name="tenhanghangkhong1" placeholder="Tên hãng" class="form-control">
                                        </div>
                                        <label for="motahanghangkhong1">Mô tả: </label>
                                        <div class="form-group">
                                            <textarea type="text" id="motahanghangkhong1" name="motahanghangkhong1" placeholder="Mô tả" class="form-control"> </textarea>
                                        </div>
                                        <label for="loaihanghangkhong1">Loại hãng: </label>
                                        <div class="form-group">
                                            <select class="form-select" name="loaihanghangkhong1" id="loaihanghangkhong1">
                                                <option value="Ký hợp đồng">Ký hợp đồng</option>
                                                <option value="Công ty quản lý">Công ty quản lý</option>
                                            </select>
                                        </div>
                                        <label for="ngaybanhanghangkhong1">Ngày bán: </label>
                                        <ul id="view-thu-list" class="list-unstyled mb-0">

                                        </ul>
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
                <!-- <div class="modal fade text-left" id="question-staff-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110" aria-hidden="true">
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
                                            <input type="text" class="form-control" id="view-diachinhanvien" disabled>
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
            // $("form[name='add-staff-form']").validate({
            //     rules: {
            //         mahanghangkhong: {
            //             required: true,
            //               remote: {
            //                 url: "http://localhost/Software-Technology/staff/checkValidMaHangHangKhong",
            //                 type: "POST",
            //             }
            //         },
            //         tenhanghangkhong: {
            //             required: true,
            //         },
            //         motahanghangkhong: {
            //             required: true,
            //         },
            //         loaihanghangkhong: {
            //             required: true,
            //         },
            //     },
            //     messages: {
            //         mahanghangkhong: {
            //             required: "Vui lòng nhập mã hãng hàng không",
            //         },
            //         tenhanghangkhong: {
            //             required: "Vui lòng nhập tên hãng hàng không",
            //         },
            //         motahanghangkhong: {
            //             required: "Vui lòng nhập mô tả hãng hàng không",
            //         },
            //         loaihanghangkhong: {
            //             required: "Vui lòng nhập loại hãng hàng không",
            //         },
            //     },
            //     submitHandler: function(form, event) {
            //         var s="";
            //         var x=document.getElementsByClassName('sc');
            //         var sl=0,d=0;
            //         for (i=0;i<x.length;i++){
            //             if (x[i].checked==true){
            //                 s+="1";
            //                 sl++;
            //             }
            //             else {
            //                 s+="0";
            //                 d++;
            //             }
            //         }
            //         if(d==x.length){
            //             alert("Chưa chọn ngày bán");
            //         }
            //         else{
                       
            //             event.preventDefault();
            //             // lấy dữ liệu từ form
            //             const data = Object.fromEntries(new FormData(form).entries());
            //             data['ngay_ban']=s;
            //             $.post(`http://localhost/Software-Technology/staff/addstaff`, data, function(response) {
            //                 if (response.thanhcong) {
            //                     currentPage = 1;
            //                     layDSListAjax();
            //                     Toastify({
            //                         text: "Thêm Thành Công",
            //                         duration: 1000,
            //                         close: true,
            //                         gravity: "top",
            //                         position: "center",
            //                         backgroundColor: "#4fbe87",
            //                     }).showToast();
            //                 } else {
            //                     Toastify({
            //                         text: "Thêm Thất Bại",
            //                         duration: 1000,
            //                         close: true,
            //                         gravity: "top",
            //                         position: "center",
            //                         backgroundColor: "#FF6A6A",
            //                     }).showToast();
            //                 }

                            // Đóng modal
                            $("#add-staff-modal").modal('toggle')
                            
            //             });
            //             var x=document.getElementsByClassName('sc');
            //                 for (i=0;i<x.length;i++){
            //                     x[i].checked=false;
            //                 }

                       
            //             $('#mahanghangkhong').val("");
            //             $('#tenhanghangkhong').val("");
            //             $('#motahanghangkhong').val("");
            //             $('#loaihanghangkhong').val("");;
            //         }

            //     }
            // })

        });

        $("#open-add-staff-btn").click(function() {
            $('#mahanghangkhong').val("");
            $('#tenhanghangkhong').val("");
            $('#motahanghangkhong').val("");
            $('#loaihanghangkhong').val("");
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
                                    <input type="checkbox" class="form-check-input form-check-success form-check-glow" id="${data.ma_hang_hang_khong}">
                                </div>
                            </td>
                            <td>${data.ten}</td>
                            <td>${data.mo_ta}</td>
                            <td>${data.loai_hang}</td>
                            <td>
                                <button onclick="viewRow('${data.ma_hang_hang_khong}')" type="button" class="btn btn-sm btn-outline-primary" style="padding-top: 3px; padding-bottom: 4px;">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button onclick="repairRow('${data.ma_hang_hang_khong}')" type="button" class="btn btn-sm btn-outline-success" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-tools"></i>
                                </button>
                                <button onclick="deleteRow('${data.ma_hang_hang_khong}')" type="button" class="btn btn-sm btn-outline-danger" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </td>
                        </tr>`);
                    } else {
                        table1.append(`
                        <tr class="table-info">
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="form-check-input form-check-success form-check-glow" id="${data.ma_hang_hang_khong}">
                                </div>
                            </td>
                            <td>${data.ten}</td>
                            <td>${data.mo_ta}</td>
                            <td>${data.loai_hang}</td>
                            <td>
                                <button onclick="viewRow('${data.ma_hang_hang_khong}')" type="button" class="btn btn-sm btn-outline-primary" style="padding-top: 3px; padding-bottom: 4px;">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button onclick="repairRow('${data.ma_hang_hang_khong}')" type="button" class="btn btn-sm btn-outline-success" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-tools"></i>
                                </button>
                                <button onclick="deleteRow('${data.ma_hang_hang_khong}')" type="button" class="btn btn-sm btn-outline-danger" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </td>
                        </tr>`);
                    }
                    checkedRows.push(data.ma_hang_hang_khong);
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
                console.log(response.thanhcong);
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


        // function repairRow(params) {
        //     let data = {
        //         mahhk: params
        //     };

        //     $.post(`http://localhost/Software-Technology/staff/getstaff`, data, function(response) {
        //         if (response.thanhcong) {
        //             var x=document.getElementsByClassName('sc2');
        //                     for (i=0;i<x.length;i++){
        //                         x[i].checked=false;
        //                     }
        //             $('#mahanghangkhong1').val(response.ma_hang_hang_khong);
        //             $('#tenhanghangkhong1').val(response.ten);
        //             $('#motahanghangkhong1').val(response.mo_ta);
        //             $('#loaihanghangkhong1').val(response.loai_hang);
        //             var db = response.ngay_ban;
        //             var x=document.getElementsByClassName('sc2');
        //                     for (i=0;i<x.length;i++){
        //                        if(db[i]=='1'){
        //                            x[i].checked=true;
        //                        }
        //                     } 
        //         }
        //     });
        //     $("#repair-staff-modal").modal('toggle');
        //     //Sua form
        //     $("form[name='repair-staff-form']").validate({
        //         rules: {

        //             tenhanghangkhong1: {
        //                 required: true,
        //             },
        //             motahanghangkhong1: {
        //                 required: true,
        //             },
        //             loaihanghangkhong1: {
        //                 required: true,
        //             },
        //         },
        //         messages: {
        //             tenhanghangkhong1: {
        //                 required: "Vui lòng nhập tên hãng hàng không",
        //             },
        //             motahanghangkhong1: {
        //                 required: "Vui lòng nhập mô tả hãng hàng không",
        //             },
        //             loaihanghangkhong1: {
        //                 required: "Vui lòng nhập loại hãng hàng không",
        //             },
        //         },
        //         submitHandler: function(form, event) {
        //             var s="";
        //             var x=document.getElementsByClassName('sc2');
        //             var sl=0,d=0;
        //             for (i=0;i<x.length;i++){
        //                 if (x[i].checked==true){
        //                     s+="1";
        //                     sl++;
        //                 }
        //                 else {
        //                     s+="0";
        //                     d++;
        //                 }
        //             }
        //             if(d==x.length){
        //                 alert("Chưa chọn ngày bán");
        //             }
        //             else{
        //             event.preventDefault();
        //             $("#myModalLabel110").text("Quản lý hãng hàng không");
        //             $("#question-model").text("Bạn có chắc chắn muốn sửa hãng hàng không này không");
        //             $("#question-staff-modal").modal('toggle');
        //             $('#thuchien').off('click')
        //             $("#thuchien").click(function() {
        //                 // lấy dữ liệu từ form

        //                 const data = Object.fromEntries(new FormData(form).entries());
        //                 data['ngay_ban1']=s;
        //                 data['mahanghangkhong1'] = $('#mahanghangkhong1').val();
        //                 $.post(`http://localhost/Software-Technology/staff/update`, data, function(response) {
        //                     if (response.thanhcong) {
        //                         currentPage = 1;
        //                         layDSListAjax();
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
        //                     $("#repair-staff-modal").modal('toggle')
        //                 });
        //             });
        //         }
        //         }
        //     })
        // }

        // function deleteRow(params) {
        //     let data = {
        //         mahhk: params
        //     };
        //     $("#myModalLabel110").text("Quản Lý Hãng Hàng Không");
        //     $("#question-model").text("Bạn có chắc chắn muốn xóa hãng hàng không này không ?");
        //     $("#question-staff-modal").modal('toggle');
        //     $('#thuchien').off('click');
        //     $("#thuchien").click(function() {
        //         $.post(`http://localhost/Software-Technology/staff/delete`, data, function(response) {
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
        //                 layDSListAjax();
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
        // $("#btn-delete-staff").click(function() {
        //     $("#myModalLabel110").text("Quản Lý Hãng Hàng Không");
        //     $("#question-model").text("Bạn có chắc chắn muốn xóa những hãng hàng không này không ?");
        //     $("#question-staff-modal").modal('toggle');
        //     $('#thuchien').off('click')
        //     $("#thuchien").click(function() {
        //         let datas = []
        //         checkedRows.forEach(checkedRow => {
        //             if ($('#' + checkedRow).prop("checked")) {
        //                 datas.push(checkedRow);
        //             }
        //         });
        //         let data = {
        //             mahhks: JSON.stringify(datas)
        //         };
        //         $.post(`http://localhost/Software-Technology/staff/deletes`, data, function(response) {
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
        //                 layDSListAjax();
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