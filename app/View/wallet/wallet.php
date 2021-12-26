<?php

use App\Core\View;

View::$activeItem = 'wallet';

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
    <link rel="stylesheet" href="<?= View::assets('css/duc.css') ?>" />
</head>

<body>
    <div id="app">
        <!-- SIDEBAR -->
        <?php View::partial('sidebar')  ?>
        <div id="main" class="layout-navbar">
            <!-- HEADER -->
            <?php View::partial('header')  ?>
            <?php View::partial('changepass')  ?>
            <div class="container con1">
                <div class="row titlediem">
                    <div class="col-md-12 col-sm-12">
                        Điểm tích lũy
                    </div>
                </div>
                <div class="row khung1">
                    <div class="col-md-4 col-sm-4"></div>
                    <div class="col-md-4 col-sm-4 khungdiem">
                        <div class="row khung2">
                            <div class="col-md-12 col-sm-12">
                                <span><i class="bi bi-gem" style="color:#159ff9"></i></span>
                                <span>Điểm tích lũy: </span>
                                <span class="diem" id="diem"></span>
                                <span>point</span>
                            </div>
                        </div>
                        <div class="row khung2">
                            <div class="col-md-12 col-sm-12">
                                <span><i class="bi bi-trophy" style="color:#ee7404"></i></span>
                                <span>Hạng:</span>
                                <span id="rank"></span>
                            </div>
                        </div>
                        <div class="row khung2">
                            <div class="col-md-12 col-sm-12">
                                <span><i class="bi bi-star-fill" style="color:#e3ee04"></i></span>
                                <span>Còn </span>
                                <span class="diem" id="diemNew">17400</span>
                                <span> để lên hạng</span>
                                <span id="rankNew"> vàng</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4"></div>
                </div>
                <!-- Ví Airpro -->
                <div class="row titlediem1">
                    <div class="col-md-12 col-sm-12">
                        Ví Airpro
                    </div>
                </div>
                <div class="row khung3">
                    <div class="col-md-12 col-sm-12" id="lk">
                        <button id="open-connect" class="btn btn-lg btn-outline-primary">
                            <span><i class="bi bi-credit-card-2-front-fill" style="color: red"></i></span>
                            <span>Liên kết ngân hàng</span>
                        </button>
                    </div>
                </div>
                <div id="vi_thanh_toan" class="row khung1 d-none">
                    <div class="col-md-4 col-sm-4"></div>
                    <div class="col-md-4 col-sm-4 khungdiem">
                        <div class="row khung2">
                            <div class="col-md-12 col-sm-12">
                                <span><i class="bi bi-cash" style="color: #04ee07"></i></span>
                                <span>Số dư: </span>
                                <span id="sodu" class="diem">17400</span>
                                <span>VND</span>
                            </div>
                        </div>
                        <div class="row khung2">
                            <div id="nap" class="col-md-12 col-sm-12" style="cursor: pointer;">
                                <span><i class="bi bi-credit-card" style="color: #f28678"></i></span>
                                <span>Nạp thêm</span>
                                <span class="icondiem"><i class="bi bi-plus-square-fill" style="color: #f28678"></i></span>
                            </div>
                        </div>
                        <div class="row khung2">
                            <div id="rut" class="col-md-12 col-sm-12" style="cursor: pointer;">
                                <span><i class="bi bi-caret-down-square" style="color: #eaa135"></i></span>
                                <span>Rút tiền về thẻ</span>
                                <span class="icondiem1"><i class="bi bi-dash-square-fill" style="color: #eaa135"></i></span>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4 col-sm-4"></div>
                </div>
                <div class="modal fade text-left" id="repair-rank-modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header" >
                                <h4 class="modal-title">liên kết ngân hàng</h4>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <form name="repair-rank-form" action="/" method="POST">
                                <div class="modal-body">
                                    <label>Tài khoản ngân hàng </label>
                                    <div class="form-group">
                                        <input type="text" id="re-mahang" name="matknh" class="form-control" placeholder=" tài khaorn ngân gàng">
                                    </div>
                                    <label for="re-fullname">Tên ngân hàng hàng: </label>
                                    <div class="form-group">
                                        <input type="text" id="re-tenhang" name="tennh" placeholder=" nhập tên ngân hàng" class="form-control">
                                    </div>
                                    <label for="re-fullname">Mật khẩu: </label>
                                    <div class="form-group">
                                        <input type="password" id="re-mucdiem" name="pass" placeholder="nhập mật khẩu" class="form-control">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Đóng</span>
                                    </button>
                                    <button id="repair-queston" type="submit" class="btn btn-primary ml-1">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Liên kết</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade text-left" id="nap-modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header" >
                                <h4 class="modal-title">Nạp tiền</h4>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <form name="nap-form" action="/" method="POST">
                                <div class="modal-body">
                                    <label for="re-fullname">Số tiền muốn nạp: </label>
                                    <div class="form-group">
                                        <input type="text" id="re-tenhang" name="tien" placeholder=" nhập tên ngân hàng" class="form-control">
                                    </div>
                                    <label for="re-fullname">Mật khẩu: </label>
                                    <div class="form-group">
                                        <input type="password" id="re-pass" name="pass" placeholder="nhập mật khẩu" class="form-control">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Đóng</span>
                                    </button>
                                    <button id="repair-queston" type="submit" class="btn btn-primary ml-1">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Nạp</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade text-left" id="rut-modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header" >
                                <h4 class="modal-title">Rút tiền</h4>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <form name="rut-form" action="/" method="POST">
                                <div class="modal-body">
                                    <label for="re-fullname">Số tiền muốn rút: </label>
                                    <div class="form-group">
                                        <input type="text" id="re-tenhang" name="tien" placeholder=" nhập tên ngân hàng" class="form-control">
                                    </div>
                                    <label for="re-fullname">Mật khẩu: </label>
                                    <div class="form-group">
                                        <input type="password" id="re-pass" name="pass" placeholder="nhập mật khẩu" class="form-control">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Đóng</span>
                                    </button>
                                    <button id="repair-queston" type="submit" class="btn btn-primary ml-1">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Rút</span>
                                    </button>
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
        $(function() {
            $.post(`http://localhost/Software-Technology/wallet/readPoint`, function(response) {
                if (response) {
                    $('#diem').text(response.diem);
                    $('#diemNew').text(response.diemmoi);
                    $('#rank').text(response.rank);
                    $('#rankNew').text(response.rankNew);
                }
            });
            $.post(`http://localhost/Software-Technology/wallet/checkConnection`, function(response) {
                if (response.thanhcong) {
                    data = response.data;
                    $('#vi_thanh_toan').removeClass('d-none');
                    $('#sodu').text(data.so_du);
                    $('#lk').addClass('d-none');
                }
            });
            $('#rut').click(function(){
                $("#rut-modal").modal('toggle');
                $("form[name='rut-form']").validate({
                    ules: {
                        tien: {
                            required: true,
                        },
                        pass: {
                            required: true,
                        },
                    },
                    messages: {
                        tien: {
                            required: "Vui lòng nhập số tài khoản",
                        },
                        pass: {
                            required: "Vui lòng mật khẩu",
                        }
                    },
                    submitHandler: function(form, event) {
                        event.preventDefault();
                            // lấy dữ liệu từ form

                            const data = Object.fromEntries(new FormData(form).entries());
                            $.post(`http://localhost/Software-Technology/wallet/withDraw`, data, function(response) {
                                console.log(response);
                                if (response.thanhcong) {
                                    currentPage = 1;
                                    Toastify({
                                        text: "Rút Thành Công",
                                        duration: 1000,
                                        close: true,
                                        gravity: "top",
                                        position: "center",
                                        backgroundColor: "#4fbe87",
                                    }).showToast();
                                    setTimeout(function() {
                                        window.location = "http://localhost/Software-Technology/wallet/wallet";
                                    }, 1000)
                                } else {
                                    Toastify({
                                        text: "Rút Thất Bại",
                                        duration: 1000,
                                        close: true,
                                        gravity: "top",
                                        position: "center",
                                        backgroundColor: "#FF6A6A",
                                    }).showToast();
                                }

                                // Đóng modal
                                $("#rut-modal").modal('toggle')
                        });
                    }
                })
            });
            $('#nap').click(function(){
                $("#nap-modal").modal('toggle');
                $("form[name='nap-form']").validate({
                    ules: {
                        tien: {
                            required: true,
                        },
                        pass: {
                            required: true,
                        },
                    },
                    messages: {
                        tien: {
                            required: "Vui lòng nhập số tài khoản",
                        },
                        pass: {
                            required: "Vui lòng mật khẩu",
                        }
                    },
                    submitHandler: function(form, event) {
                        event.preventDefault();
                            // lấy dữ liệu từ form

                            const data = Object.fromEntries(new FormData(form).entries());
                            $.post(`http://localhost/Software-Technology/wallet/topUp`, data, function(response) {
                                console.log(response);
                                if (response.thanhcong) {
                                    currentPage = 1;
                                    Toastify({
                                        text: "Nạp Thành Công",
                                        duration: 1000,
                                        close: true,
                                        gravity: "top",
                                        position: "center",
                                        backgroundColor: "#4fbe87",
                                    }).showToast();
                                    setTimeout(function() {
                                        window.location = "http://localhost/Software-Technology/wallet/wallet";
                                    }, 1000)
                                } else {
                                    Toastify({
                                        text: "Nạp Thất Bại",
                                        duration: 1000,
                                        close: true,
                                        gravity: "top",
                                        position: "center",
                                        backgroundColor: "#FF6A6A",
                                    }).showToast();
                                }

                                // Đóng modal
                                $("#nap-modal").modal('toggle')
                        });
                    }
                })
            });
            $('#open-connect').click(function() {
                $("#repair-rank-modal").modal('toggle');
                //Sua form
                $("form[name='repair-rank-form']").validate({
                    rules: {
                        matknh: {
                            required: true,
                        },
                        tennh: {
                            required: true,
                        },
                        pass: {
                            required: true,
                        },
                    },
                    messages: {
                        matknh: {
                            required: "Vui lòng nhập số tài khoản",
                        },
                        tennh: {
                            required: "Vui lòng nhập tên ngân hàng",
                        },
                        pass: {
                            required: "Vui lòng mật khẩu",
                        }
                    },
                    submitHandler: function(form, event) {
                        event.preventDefault();
                            // lấy dữ liệu từ form

                            const data = Object.fromEntries(new FormData(form).entries());
                            $.post(`http://localhost/Software-Technology/wallet/bankConnection`, data, function(response) {
                                
                                if (response.thanhcong) {
                                    currentPage = 1;
                                    Toastify({
                                        text: "Liên kết Thành Công",
                                        duration: 1000,
                                        close: true,
                                        gravity: "top",
                                        position: "center",
                                        backgroundColor: "#4fbe87",
                                    }).showToast();
                                    setTimeout(function() {
                                        window.location = "http://localhost/Software-Technology/wallet/wallet";
                                    }, 1000)
                                } else {
                                    Toastify({
                                        text: "Liên kết Thất Bại",
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
                    }
                })
            })
        })
    </script>
</body>