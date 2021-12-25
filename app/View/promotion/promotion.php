<?php

use App\Core\View;

View::$activeItem = 'promotion';

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
                        <div id="search-promotion-form" name="search-promotion-form">
                            <div class="form-group promotion-relative has-icon-right">
                                <input id="serch-promotion-text" type="text" class="form-control" placeholder="Tìm kiếm" value="">
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
                                    <h3>Danh sách khuyến mãi</h3>
                                </label>
                                <label>
                                    <h5 style="margin-left: 50px; margin-right: 10px;"> Lọc Theo:</h5>
                                </label>
                                <select class="btn btn btn-primary" name="search-cbb" id="cars-search">
                                    <option value="1">Tất Cả</option>
                                    <option value="2">Tên chương trình</option>                                    
                                </select>
                            </div>
                            <div class="col-12 col-md-5 order-md-2 order-first">

                                <div class=" loat-start float-lg-end mb-3">
                                    <button id='btn-delete-promotion' class="btn btn-danger">
                                        <i class="bi bi-trash-fill"></i> Xóa khuyến mãi
                                    </button>
                                    <button id='open-add-promotion-btn' class="btn btn-primary">
                                        <i class="bi bi-plus"></i> Thêm khuyến mãi
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
                                                <th>Tên chương trình</th>
                                                <th>Ngày bắt đầu</th>
                                                <th>Ngày kết thúc</th>
                                                <th>Tình trạng</th>
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
                <div class="modal fade text-left" id="add-promotion-modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Thêm Chương Trình Khuyến Mãi</h4>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form name="add-promotion-form" action="/" method="POST">
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label>Tên chương trình:</label>
                                            <input type="text" class="form-control" id="add-tenkm" name="tenkm">
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label>Ngày bắt đầu:</label>
                                            <input type="date" class="form-control" id="add-ngaybdkm" name="ngaybdkm">
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label>Ngày kết thúc:</label>
                                            <input type="date" class="form-control" id="add-ngayktkm" name="ngayktkm">
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label>Nội dung:</label>
                                            <textarea rows="3" class="form-control" id="add-noidungkm" name="noidungkm"></textarea>
                                        </div>
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
                <div class="modal fade" id="repair-promotion-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div style="width:700px" class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content" style="width:700px;overflow:visible">                        
                            <div class="modal-body" style="width:700px">
                            <form name="repair-promotion-form" action="/" method="POST">
                                <ul class="list-group">
                                <li class="list-group-item active">Cập nhật chương trình khuyến mãi</li>
                                    
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label>Mã chương trình:</label>
                                            <input type="text" class="form-control" id="re-makm" disabled>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label>Tên chương trình:</label>
                                            <input type="text" class="form-control" id="re-tenkm" name="tenkm">
                                        </div>
                                    </li>             
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label>Ngày bắt đầu:</label>
                                            <input type="date" class="form-control" id="re-ngaybdkm" name="ngaybdkm" >
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label>Ngày kết thúc:</label>
                                            <input type="date" class="form-control" id="re-ngayktkm" name="ngayktkm" >
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label>Nội dung:</label>
                                            <textarea rows="3" class="form-control" id="re-noidungkm" name="noidungkm" ></textarea>
                                        </div>
                                    </li>   
                                    <form name="repair-promotiondetails-form" action="/" method="POST">
                                        <li class="list-group-item">
                                            <label>Thêm Chi Tiết:</label>
                                            <li class="list-group-item">
                                                <div class="form-group">
                                                    <label>Hạng dịch vụ:</label>                                                
                                                    <select class="form-select" id="re-hangdv" name="hangdv">
                                                        <option value="-1">Chọn hạng dịch vụ</option>
                                                    </select>
                                                </div>
                                            </li>  
                                            <li class="list-group-item">
                                                <div class="form-group">
                                                    <label>Chuyến bay:</label>                                                
                                                    <select class="form-select" id="re-chuyenbay" name="chuyenbay">
                                                        <option value="-1">Chọn chuyến bay</option>
                                                        <option value="0">Tất cả</option>
                                                    </select>
                                                </div>
                                            </li> 
                                            <li class="list-group-item">
                                                <div class="form-group">
                                                    <label>Hãng hàng không:</label>
                                                    <select class="form-select" id="re-hanghk" name="hanghk">
                                                        <option value="-1">Chọn hãng hàng không</option>
                                                    </select>
                                                </div>
                                            </li> 
                                            <li class="list-group-item">
                                                <div class="form-group">
                                                    <label>Hạng khách hàng:</label>                                   
                                                    <select class="form-select" id="re-hangkh" name="hangkh">
                                                        <option value="-1">Chọn hạng khách hàng</option>
                                                        <option value="0">Tất cả</option>
                                                    </select>
                                                </div>
                                            </li>   
                                            <li class="list-group-item">
                                                <div class="form-group">
                                                    <label>% khuyến mãi:</label>
                                                    <input type="number" class="form-control" id="re-ptkm" name="ptkm" >
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="form-group">                                                
                                                    <input type="button" class="form-control btn btn-primary ml-1" id="re-btthemct" value="Thêm chi tiết" >
                                                </div>
                                            </li>                                        
                                        </li> 
                                      
                                    <li class="list-group-item">
                                        <label>Chi Tiết:</label>
                                            <table class="table mb-0 table-danger" id="table3">
                                            <thead>
                                                <tr>
                                                    <th>Hạng DV</th>
                                                    <th>Chuyến bay</th>
                                                    <th>Hãng</th>
                                                    <th>Hạng KH</th>
                                                    <th>%KM</th>
                                                    <th>Tác vụ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                    </table>
                                    </li>              
                                </ul>                                
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
                </div>
                <!-- Modal Thong bao -->
                <div class="modal fade text-left" id="question-promotion-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110" aria-hidden="true">
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
                <div class="modal fade" id="view-promotion-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div style="width:700px" class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content" style="width:700px;overflow:visible">
                            <div class="modal-body" style="width:700px">
                                <ul class="list-group">
                                    <li class="list-group-item active">Thông Tin Chi Tiết</li>
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label>Mã chương trình:</label>
                                            <input type="text" class="form-control" id="view-makm" disabled>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label>Tên chương trình:</label>
                                            <input type="text" class="form-control" id="view-tenkm" disabled>
                                        </div>
                                    </li>             
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label>Ngày bắt đầu:</label>
                                            <input type="date" class="form-control" id="view-ngaybdkm" name="ngaybdkm" disabled>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label>Ngày kết thúc:</label>
                                            <input type="date" class="form-control" id="view-ngayktkm" name="ngayktkm" disabled>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label>Nội dung:</label>
                                            <textarea rows="3" class="form-control" id="view-noidungkm" name="noidungkm" disabled></textarea>
                                        </div>
                                    </li>   
                                    <li class="list-group-item">
                                        <label>Chi Tiết:</label>
                                            <table class="table mb-0 table-danger" id="table2">
                                            <thead>
                                                <tr>
                                                    <th>Hạng DV</th>
                                                    <th>Chuyến bay</th>
                                                    <th>Hãng</th>
                                                    <th>Hạng KH</th>
                                                    <th>%KM</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                    </table>
                                    </li>              
                                </ul>
                            </div>
                            <div class="modal-footer" style="width:700px">
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
            layDSKhuyenMaiAjax();
            $.post(`http://localhost/Software-Technology/promotion/getHangDV`,function(response){
                let dv=response.data;
                dv.forEach(data => {
                    let reopt='<option value="'+data.ma_hang_dich_vu+'">'+data.ten_hang+'</option>';
                    $("#re-hangdv").append(reopt);
                })
            });
            $.post(`http://localhost/Software-Technology/promotion/getChuyenBay`,function(response){
                let dv=response.data;
                dv.forEach(data => {
                    let reopt='<option value="'+data.ma_chuyen_bay+'">'+data.ma_chuyen_bay+'</option>';
                    $("#re-chuyenbay").append(reopt);
                })
            });
            $.post(`http://localhost/Software-Technology/promotion/getHangHK`,function(response){
                let dv=response.data;
                dv.forEach(data => {
                    let reopt='<option value="'+data.ma_hang_hang_khong+'">'+data.ten+'</option>';
                    $("#re-hanghk").append(reopt);
                })
            });
            $.post(`http://localhost/Software-Technology/promotion/getHangKH`,function(response){
                let dv=response.data;
                dv.forEach(data => {
                    let reopt='<option value="'+data.ma_hang_kh+'">'+data.ten_hang+'</option>';
                    $("#re-hangkh").append(reopt);
                })
            });
            //Đặt sự kiện validate cho modal add promotion
            $("form[name='add-promotion-form']").validate({
                rules: {                                
                    tenkm: {
                        required: true,
                    },
                    ngaybdkm: {
                        required: true,
                    },
                    ngayktkm: {
                        required: true,
                    },
                    noidungkm: {
                        required: true,
                    },
                },
                messages: {                    
                    tenkm: {
                        required: "Vui lòng nhập tên chương trình",
                    },  
                    ngaybdkm: {
                        required: "Vui lòng chọn ngày bắt đầu",
                    },  
                    ngayktkm: {
                        required: "Vui lòng nhập chọn ngày kết thúc",
                    },  
                    noidungkm: {
                        required: "Vui lòng nhập nội dung chương trình",
                    },                    
                },
                submitHandler: function(form, event) {
                    var bd=$("#add-ngaybdkm").val(); 
                    var kt=$("#add-ngayktkm").val();  
                    var d = new Date();
                    var hientai=(d.getFullYear())+'-'+(d.getMonth()+1)+'-'+(d.getDate());                  
                    if (bd<=hientai){
                        alert("Ngày bắt đầu phải lớn hơn ngày hiện tại");
                        $("#add-ngaybdkm").focus();
                    }
                    else{
                        if (kt<bd){
                            alert("Ngày kết thúc lớn hơn ngày bắt đầu");
                            $("#add-ngayktkm").focus();
                        } 
                        else{                     
                        event.preventDefault();
                        // lấy dữ liệu từ form
                        const data = Object.fromEntries(new FormData(form).entries());                    
                        $.post(`http://localhost/Software-Technology/promotion/create`, data, function(response) {
                            if (response.thanhcong) {                                
                                Toastify({
                                    text: "Thêm Thành Công",
                                    duration: 1000,
                                    close: true,
                                    gravity: "top",
                                    promotion: "center",
                                    backgroundColor: "#4fbe87",
                                }).showToast();
                                currentPage = 1;
                                layDSKhuyenMaiAjax();
                            } else {
                                Toastify({
                                    text: "Thêm Thất Bại",
                                    duration: 1000,
                                    close: true,
                                    gravity: "top",
                                    promotion: "center",
                                    backgroundColor: "#FF6A6A",
                                }).showToast();
                            }

                            // Đóng modal
                            $("#add-promotion-modal").modal('toggle')
                        });
                        $('#add-tenkm').val("");
                        $('#add-ngaybdkm').val("");
                        $('#add-ngayktkm').val("");
                        $('#add-noidungkm').val("");
                        }
                    }
                }
            })

        });

        $("#open-add-promotion-btn").click(function() {
            $('#add-tenkm').val("");
            $('#add-ngaybdkm').val("");
            $('#add-ngayktkm').val("");
            $('#add-noidungkm').val("");
            $("#add-promotion-modal").modal('toggle')
        });


        function changePage(newPage) {
            currentPage = newPage;
            layDSKhuyenMaiAjax();
        }

        function changePageSearchNangCao(newPage, search, search2) {
            currentPage = newPage;
            layDSKhuyenMaiSearchNangCao(search, search2);
        }

        $('#cars-search').change(function() {
            let search = $('#cars-search option').filter(':selected').val();
            currentPage = 1;
            layDSKhuyenMaiSearchNangCao($('#serch-promotion-text').val(), search);
        });

        $("#search-promotion-form").keyup(debounce(function() {
            let search = $('#cars-search').val();
            currentPage = 1;
            layDSKhuyenMaiSearchNangCao($('#serch-promotion-text').val(), search);
        },200));

        function layDSKhuyenMaiAjax() {
            $.get(`http://localhost/Software-Technology/promotion/getList?rowsPerPage=10&page=${currentPage}`, function(response) {
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
                    var tt=data.trang_thai;
                    if (data.trang_thai==1)
                        data.trang_thai='Chưa tới hạn';  
                    if (data.trang_thai==2)
                        data.trang_thai='Đang khuyến mãi';    
                    if (data.trang_thai==3) 
                        data.trang_thai='Hết hạn';               
                    if ($row % 2 == 0) {

                        table1.append(`
                        <tr class="table-light">
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="form-check-input form-check-success form-check-glow" id="${data.ma_km}">
                                </div>
                            </td>
                            <td>${data.ten}</td>
                            <td>${data.ngay_bat_dau}</td>  
                            <td>${data.ngay_ket_thuc}</td>
                            <td>${data.trang_thai}</td>                        
                            <td>
                                <button onclick="viewRow('${data.ma_km}')" type="button" class="btn btn-sm btn-outline-primary" style="padding-top: 3px; padding-bottom: 4px;">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button onclick="repairRow('${data.ma_km}','${tt}')" type="button" class="btn btn-sm btn-outline-success" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-tools"></i>
                                </button>
                                <button onclick="deleteRow('${data.ma_km}')" type="button" class="btn btn-sm btn-outline-danger" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </td>
                        </tr>`);
                    } else {
                        table1.append(`
                        <tr class="table-info">
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="form-check-input form-check-success form-check-glow" id="${data.ma_km}">
                                </div>
                            </td>
                            <td>${data.ten}</td>
                            <td>${data.ngay_bat_dau}</td>  
                            <td>${data.ngay_ket_thuc}</td>
                            <td>${data.trang_thai}</td>  
                            <td>
                                <button onclick="viewRow('${data.ma_km}')" type="button" class="btn btn-sm btn-outline-primary" style="padding-top: 3px; padding-bottom: 4px;">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button onclick="repairRow('${data.ma_km}','${tt}')" type="button" class="btn btn-sm btn-outline-success" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-tools"></i>
                                </button>
                                <button onclick="deleteRow('${data.ma_km}')" type="button" class="btn btn-sm btn-outline-danger" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </td>
                        </tr>`);
                    }
                    checkedRows.push(data.ma_km);
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

        function layDSKhuyenMaiSearchNangCao(search, search2) {
            $.get(`http://localhost/Software-Technology/promotion/getListSearch?rowsPerPage=10&page=${currentPage}&search=${search}&search2=${search2}`, function(response) {
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
                    var tt=data.trang_thai;
                    if (data.trang_thai==1)
                        data.trang_thai='Chưa tới hạn';  
                    if (data.trang_thai==2)
                        data.trang_thai='Đang khuyến mãi';    
                    if (data.trang_thai==3) 
                        data.trang_thai='Hết hạn';                      
                    if ($row % 2 == 0) {

                        table1.append(`
                        <tr class="table-light">
                        <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="form-check-input form-check-success form-check-glow" id="${data.ma_km}">
                                </div>
                            </td>
                            <td>${data.ten}</td>
                            <td>${data.ngay_bat_dau}</td>  
                            <td>${data.ngay_ket_thuc}</td>
                            <td>${data.trang_thai}</td>                        
                            <td>
                                <button onclick="viewRow('${data.ma_km}')" type="button" class="btn btn-sm btn-outline-primary" style="padding-top: 3px; padding-bottom: 4px;">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button onclick="repairRow('${data.ma_km}','${tt}')" type="button" class="btn btn-sm btn-outline-success" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-tools"></i>
                                </button>
                                <button onclick="deleteRow('${data.ma_km}')" type="button" class="btn btn-sm btn-outline-danger" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </td>
                        </tr>`);
                    } else {
                        table1.append(`
                        <tr class="table-info">
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="form-check-input form-check-success form-check-glow" id="${data.ma_km}">
                                </div>
                            </td>
                            <td>${data.ten}</td>
                            <td>${data.ngay_bat_dau}</td>  
                            <td>${data.ngay_ket_thuc}</td>
                            <td>${data.trang_thai}</td>                        
                            <td>
                                <button onclick="viewRow('${data.ma_km}')" type="button" class="btn btn-sm btn-outline-primary" style="padding-top: 3px; padding-bottom: 4px;">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button onclick="repairRow('${data.ma_km}','${tt}')" type="button" class="btn btn-sm btn-outline-success" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-tools"></i>
                                </button>
                                <button onclick="deleteRow('${data.ma_km}')" type="button" class="btn btn-sm btn-outline-danger" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </td>
                        </tr>`);
                    }
                    checkedRows.push(data.ma_km);
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
                makm: params
            };
            $.post(`http://localhost/Software-Technology/promotion/getPromotion`, data, function(response) {
                if (response.thanhcong) {
                    $("#view-makm").val(response.ma_km);
                    $("#view-tenkm").val(response.ten);   
                    $("#view-ngaybdkm").val(response.ngay_bat_dau); 
                    $("#view-ngayktkm").val(response.ngay_ket_thuc); 
                    $("#view-noidungkm").val(response.noi_dung);  
                    $.post(`http://localhost/Software-Technology/promotion/getPromotionDetail`,data, function(response) {
                // Không được gán biến response này ra ngoài function,
                // vì function này bất đồng bộ, khi nào gọi api xong thì response mới có dữ liệu
                // gán ra ngoài thì code ở ngoài chạy trc khi gọi api xong.
                //data là danh sách usser
                //page là trang hiện tại
                // rowsPerpage là số dòng trên 1 trang
                // totalPage là tổng số trang
                const table1 = $('#table2 > tbody');
                table1.empty();
                checkedRows = [];
                $row = 0;

                response.chitiet.forEach(data => {
                    let disabled = "disabled btn icon icon-left btn-secondary";                                     
                    if ($row % 2 == 0) {

                        table1.append(`
                        <tr class="table-light">                            
                            <td>${data.ma_hang_dich_vu}</td>
                            <td>${data.ma_chuyen_bay}</td>  
                            <td>${data.ma_hang}</td>
                            <td>${data.ma_hang_kh}</td> 
                            <td>${data.khuyen_mai}</td>                                                     
                        </tr>`);
                    } else {
                        table1.append(`
                        <tr class="table-info">                           
                            <td>${data.ma_hang_dich_vu}</td>
                            <td>${data.ma_chuyen_bay}</td>  
                            <td>${data.ma_hang}</td>
                            <td>${data.ma_hang_kh}</td> 
                            <td>${data.khuyen_mai}</td>                           
                        </tr>`);
                    }                   
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
            });
            $("#view-promotion-modal").modal('toggle');
        }        

        function repairRow(params,tt) {
            if (tt==1){
                let data = {
                    makm: params
                };
                $.post(`http://localhost/Software-Technology/promotion/getPromotion`, data, function(response) {
                    if (response.thanhcong) {
                        $("#re-makm").val(response.ma_km);
                        $("#re-tenkm").val(response.ten);   
                        $("#re-ngaybdkm").val(response.ngay_bat_dau); 
                        $("#re-ngayktkm").val(response.ngay_ket_thuc); 
                        $("#re-noidungkm").val(response.noi_dung);                      
                        $("#re-hangdv").val(-1);
                        $("#re-chuyenbay").val(-1);
                        $("#re-hanghk").val(-1);
                        $("#re-hangkh").val(-1);
                        $("#re-ptkm").val("");
                        $.post(`http://localhost/Software-Technology/promotion/getPromotionDetail`,data, function(response) {
                    // Không được gán biến response này ra ngoài function,
                    // vì function này bất đồng bộ, khi nào gọi api xong thì response mới có dữ liệu
                    // gán ra ngoài thì code ở ngoài chạy trc khi gọi api xong.
                    //data là danh sách usser
                    //page là trang hiện tại
                    // rowsPerpage là số dòng trên 1 trang
                    // totalPage là tổng số trang
                    const table1 = $('#table3 > tbody');
                    table1.empty();
                    checkedRows = [];
                    $row = 0;

                    response.chitiet.forEach(data => {
                        let disabled = "disabled btn icon icon-left btn-secondary";                                     
                        if ($row % 2 == 0) {

                            table1.append(`
                            <tr class="table-light">                            
                                <td>${data.ma_hang_dich_vu}</td>
                                <td>${data.ma_chuyen_bay}</td>  
                                <td>${data.ma_hang}</td>
                                <td>${data.ma_hang_kh}</td> 
                                <td>${data.khuyen_mai}</td> 
                                <td>                                
                                    <button onclick="deleteRowDetail('${data.ma_km}','${data.ma_hang_dich_vu}','${data.ma_chuyen_bay}','${data.ma_hang}','${data.ma_hang_kh}')" type="button" class="btn btn-sm btn-outline-danger" style="padding-top: 7px; padding-bottom: 0px;">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </td>                                                    
                            </tr>`);
                        } else {
                            table1.append(`
                            <tr class="table-info">                           
                                <td>${data.ma_hang_dich_vu}</td>
                                <td>${data.ma_chuyen_bay}</td>  
                                <td>${data.ma_hang}</td>
                                <td>${data.ma_hang_kh}</td> 
                                <td>${data.khuyen_mai}</td>      
                                <td>                                
                                    <button onclick="deleteRowDetail('${data.ma_km}','${data.ma_hang_dich_vu}','${data.ma_chuyen_bay}','${data.ma_hang}','${data.ma_hang_kh}')" type="button" class="btn btn-sm btn-outline-danger" style="padding-top: 7px; padding-bottom: 0px;">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </td>                     
                            </tr>`);
                        }                   
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
                });//----------------//
                $("#repair-promotion-modal").modal('toggle');
                //Sua form
                $("form[name='repair-promotion-form']").validate({
                    rules: {                                
                        tenkm: {
                            required: true,
                        },
                        ngaybdkm: {
                            required: true,
                        },
                        ngayktkm: {
                            required: true,
                        },
                        noidungkm: {
                            required: true,
                        },
                    },
                    messages: {                    
                        tenkm: {
                            required: "Vui lòng nhập tên chương trình",
                        },  
                        ngaybdkm: {
                            required: "Vui lòng chọn ngày bắt đầu",
                        },  
                        ngayktkm: {
                            required: "Vui lòng nhập chọn ngày kết thúc",
                        },  
                        noidungkm: {
                            required: "Vui lòng nhập nội dung chương trình",
                        },                    
                    },
                    submitHandler: function(form, event) {     
                        var bd=$("#re-ngaybdkm").val(); 
                        var kt=$("#re-ngayktkm").val();                                        
                            if (kt<bd){
                                alert("Ngày kết thúc lớn hơn ngày bắt đầu");
                                $("#re-ngayktkm").focus();
                            } 
                            else{                                                     
                                event.preventDefault();
                                $("#myModalLabel110").text("Quản Lý chương trình khuyến mãi");
                                $("#question-model").text("Bạn có chắc chắn muốn sửa chương trình này không");
                                $("#question-promotion-modal").modal('toggle');                    
                                $('#thuchien').off('click')
                                $("#thuchien").click(function() {
                                    // lấy dữ liệu từ form

                                    const data = Object.fromEntries(new FormData(form).entries());
                                    data['makm'] = $('#re-makm').val();
                                    
                                    $.post(`http://localhost/Software-Technology/promotion/update`, data, function(response) {
                                        if (response.thanhcong) {
                                            currentPage = 1;
                                            layDSKhuyenMaiAjax();
                                            Toastify({
                                                text: "Sửa Thành Công",
                                                duration: 1000,
                                                close: true,
                                                gravity: "top",
                                                promotion: "center",
                                                backgroundColor: "#4fbe87",
                                            }).showToast();
                                        } else {
                                            Toastify({
                                                text: "Sửa Thất Bại",
                                                duration: 1000,
                                                close: true,
                                                gravity: "top",
                                                promotion: "center",
                                                backgroundColor: "#FF6A6A",
                                            }).showToast();
                                        }

                                        // Đóng modal
                                        $("#repair-promotion-modal").modal('toggle')
                                    });
                                });
                            
                        }         
                        
                    }
                })
            }
            else{
                alert("Không được phép sửa chương trình đã hết hạn hoặc đang khuyến mãi");
            }
        }

        $("#re-btthemct").click(function(){
            var hangdv=$("#re-hangdv").val();
            var chuyenbay=$("#re-chuyenbay").val();
            var hanghk=$("#re-hanghk").val();
            var hangkh=$("#re-hangkh").val();
            var ptkm=$("#re-ptkm").val();
            if (hangdv==-1){
                alert("Chưa chọn hạng dịch vụ");
                $("#re-hangdv").focus();
                return false;
            }
            if (chuyenbay==-1){
                alert("Chưa chọn chuyến bay");
                $("#re-chuyenbay").focus();
                return false;
            }
            if (hanghk==-1){
                alert("Chưa chọn hãng hàng không");
                $("#re-hanghk").focus();
                return false;
            }
            if (hangkh==-1){
                alert("Chưa chọn hạng khách hàng");
                $("#re-hangkh").focus();
                return false;
            }
            if (ptkm=="" || ptkm<=0){
                alert("Chưa nhập phần trăm khuyến mãi");
                $("#re-ptkm").focus();
                return false;
            }
            if (hangkh==0){
                if (chuyenbay==0){
                    alert("Chưa chọn chuyến bay");
                    $("#re-chuyenbay").focus();
                    return false;
                }
            }
            if (chuyenbay==0){
                hangkh=0;
            }
            
            let data = {
                mahangdv:hangdv,
                machuyenbay:chuyenbay,
                mahanghk:hanghk,
                mahangkh:hangkh,
                ptkm1:ptkm
            };
            data['makm']=$("#re-makm").val();
            $.post(`http://localhost/Software-Technology/promotion/addDetail`, data, function(response) {
                    if (response.thanhcong) {
                        Toastify({
                            text: "Thêm chi tiết Thành Công",
                            duration: 1000,
                            close: true,
                            gravity: "top",
                            promotion: "center",
                            backgroundColor: "#4fbe87",
                        }).showToast();   
                        $("#repair-promotion-modal").modal('toggle');                                             
                    } else {
                        Toastify({
                            text: "Chi tiết khuyến mãi đã tồn tại",
                            duration: 1000,
                            close: true,
                            gravity: "top",
                            promotion: "center",
                            backgroundColor: "#FF6A6A",
                        }).showToast();
                    }
                });
        });

        function deleteRowDetail(makm1,mahangdv1,machuyenbay1,mahanghk1,mahangkh1) {
            let data = {
                makm:makm1,
                mahangdv:mahangdv1,
                machuyenbay:machuyenbay1,
                mahanghk:mahanghk1,
                mahangkh:mahangkh1,
            };
            $("#myModalLabel110").text("Quản Lý Chương Trình Khuyến Mãi");
            $("#question-model").text("Bạn có chắc chắn muốn xóa chi tiết này không");
            $("#question-promotion-modal").modal('toggle');
            $('#thuchien').off('click');
            $("#thuchien").click(function() {
                $.post(`http://localhost/Software-Technology/promotion/deleteDetail`, data, function(response) {
                    if (response.thanhcong) {
                        Toastify({
                            text: "Xóa chi tiết Thành Công",
                            duration: 1000,
                            close: true,
                            gravity: "top",
                            promotion: "center",
                            backgroundColor: "#4fbe87",
                        }).showToast();
                        $("#repair-promotion-modal").modal('toggle');
                    } else {
                        Toastify({
                            text: "Xóa chi tiết Thất Bại",
                            duration: 1000,
                            close: true,
                            gravity: "top",
                            promotion: "center",
                            backgroundColor: "#FF6A6A",
                        }).showToast();
                    }
                });
            });
        }

        function deleteRow(params) {
            let data = {
                makm: params
            };
            $("#myModalLabel110").text("Quản Lý chương trình khuyến mãi");
            $("#question-model").text("Bạn có chắc chắn muốn xóa chương trình này không");
            $("#question-promotion-modal").modal('toggle');
            $('#thuchien').off('click');
            $("#thuchien").click(function() {
                $.post(`http://localhost/Software-Technology/promotion/delete`, data, function(response) {
                    if (response.thanhcong) {
                        Toastify({
                            text: "Xóa Thành Công",
                            duration: 1000,
                            close: true,
                            gravity: "top",
                            promotion: "center",
                            backgroundColor: "#4fbe87",
                        }).showToast();
                        currentPage = 1;
                        layDSKhuyenMaiAjax();
                    } else {
                        Toastify({
                            text: "Xóa Thất Bại",
                            duration: 1000,
                            close: true,
                            gravity: "top",
                            promotion: "center",
                            backgroundColor: "#FF6A6A",
                        }).showToast();
                    }
                });
            });
        }

        $("#btn-delete-promotion").click(function() {
            $("#myModalLabel110").text("Quản Lý chương trình khuyến mãi");
            $("#question-model").text("Bạn có chắc chắn muốn xóa những chương trình này không");
            $("#question-promotion-modal").modal('toggle');
            $('#thuchien').off('click')
            $("#thuchien").click(function() {
                let datas = []
                checkedRows.forEach(checkedRow => {
                    if ($('#' + checkedRow).prop("checked")) {
                        datas.push(checkedRow);
                    }
                });
                let data = {
                    makms: JSON.stringify(datas)
                };
                $.post(`http://localhost/Software-Technology/promotion/deletes`, data, function(response) {
                    if (response.thanhcong) {
                        Toastify({
                            text: "Xóa Thành Công",
                            duration: 1000,
                            close: true,
                            gravity: "top",
                            promotion: "center",
                            backgroundColor: "#4fbe87",
                        }).showToast();
                        currentPage = 1;
                        layDSKhuyenMaiAjax();
                    } else {
                        Toastify({
                            text: "Xóa Thất Bại",
                            duration: 1000,
                            close: true,
                            gravity: "top",
                            promotion: "center",
                            backgroundColor: "#FF6A6A",
                        }).showToast();
                    }
                });
            });
        });
    </script>    
</body>