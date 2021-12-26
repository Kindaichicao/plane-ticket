<?php

use App\Core\View;

View::$activeItem = 'auto';

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
            <div class="col-md-10 offset-md-1 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tìm chuyến bay</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" name="timchuyenbay">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-3 form-group">
                                            <label>Từ : </label>
                                            <select class="form-select form-group" id="noidi" name="noidi">

                                            </select>
                                        </div>
                                        <div class="col-md-3 ">
                                            <label>Đến : </label>
                                            <select class="form-select form-group" id="noiden" name="noiden">
                                            </select>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>Số hành khách</label>
                                            <div class="row">
                                                <div class="col-md-4 col-12">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Lớn</span>
                                                        </div>
                                                        <input name="nguoilon" type="text" class="form-control" value="1">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Trẻ em</span>
                                                        </div>
                                                        <input name="treem" type="text" class="form-control" value="0">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Em bé</span>
                                                        </div>
                                                        <input name="embe" type="text" class="form-control" value="0">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3 form-group">
                                            <label>Ngày đi:</label>
                                            <input type="date" name="ngaydi">
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <input type="checkbox" id="khuhoi" class='form-check-input'>
                                            <label for="checkbox1">Khứ hồi</label>
                                            <input class="d-none" id="ngayve" type="date" name="ngayve">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>Hạng ghế : </label>
                                            <select class="form-select form-group" id="hangdv" name="hangdv">
                                                <option value="hdv1">Thương gia</option>
                                                <option value="hdv2">Phổ thông</option selected>
                                            </select>
                                        </div>
                                        <div class="col-3 offset-9">
                                            <button type="button" class="btn btn-success ml-1" data-bs-dismiss="modal">
                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                <span id="thuchien" class="d-none d-sm-block">Mua vé tự động</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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
        let diadiemss;
        $(function() {
            $.post(`http://localhost/Software-Technology/userticket/getAirports`, function(response) {
                if (response.thanhcong) {
                    diadiems = response.data;
                    diadiems.forEach(data => {
                        let opt = '<option value="' + data.ma_san_bay + '">' + data.dia_diem + '</option>';
                        $("#noidi").append(opt);
                        $("#noiden").append(opt);
                    });
                }
            });
            $('#khuhoi').click(function(){
                if($('#khuhoi').is(":checked")){
                    $('#ngayve').removeClass("d-none");
                } else{
                    $('#ngayve').addClass("d-none");
                }
            });
            //kietm tra quyen
            $("form[name='timchuyenbay']").validate({
                rules: {
                    ngaydi: {
                        required: true,
                    },
                    nguoilon:{
                        require: true,
                        number: true,
                        min:1
                    },
                    treem:{
                        number: true,
                        min:0
                    },
                    embe: {
                        number: true,
                        min:0
                    }
                },
                messages: {
                    password: {
                        required: "Vui lòng chọn ngày đi",
                    },
                    nguoilon:{
                        required:"Vui lòng chọn số người lớn",
                        number: "Phải là số",
                        min:"Lớn hơn 0"
                    },
                    treem:{
                        number: "Phải là số",
                        min:"Lớn hơn 0"
                    },
                    embe: {
                        number: "Phải là số",
                        min:"Lớn hơn 0"  
                    }
                },
                submitHandler: function(form, event) {
                    event.preventDefault();
                    // lấy dữ liệu từ form
                    const data = Object.fromEntries(new FormData(form).entries());

                    $.post(`http://localhost/Software-Technology/userticket/getList`, data, function(response) {
                        if (response.thanhcong) {
                            currentPage = 1;
                            layDSVe();
                        } else {
                            Toastify({
                                text: "Không có chuyến bay phù hợp",
                                duration: 1000,
                                close: true,
                                gravity: "top",
                                position: "center",
                                backgroundColor: "#FF6A6A",
                            }).showToast();
                        }
                    });
                }
            });
        });
    </script>
</body>