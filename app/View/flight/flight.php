<?php

use App\Core\View;

View::$activeItem = 'flight';

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
                        <div id="search-flight-form" name="search-flight-form">
                            <div class="form-group position-relative has-icon-right">
                                <input id="serch-flight-text" type="text" class="form-control" placeholder="Tìm kiếm" value="">
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
                                    <h3>Danh sách chuyến bay</h3>
                                </label>
                                <label>
                                    <h5 style="margin-left: 50px; margin-right: 10px;"> Lọc Theo:</h5>
                                </label>
                                <select class="btn btn btn-primary" name="search-cbb" id="cars-search">
                                    <option value="0">Tất Cả</option>
                                    <option value="1">Mã chuyến bay</option>
                                    <option value="2">Tên chuyến bay</option>
                                </select>
                                <select class="btn btn btn-primary" name="search-cbb" id="cars-searchtt">
                                    <option value="0">Chọn tình trạng</option>
                                    <option value="1">Chưa công bố(chưa có vé)</option>
                                    <option value="2">Chưa công bố(có vé)</option>
                                    <option value="3">Đã công bố</option>
                                    <option value="4">Đã bay</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-5 order-md-2 order-first">

                                <div class=" loat-start float-lg-end mb-3">
                                    <button id='open-add-flight-btn' class="btn btn-primary">
                                        <i class="bi bi-plus"></i> Thêm chuyến bay
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
                                                <th>Mã chuyến bay</th>
                                                <th>Tên chuyến bay</th>
                                                <th>Nơi đi</th>
                                                <th>Nơi đến</th>
                                                <th>Ngày bay</th>
                                                <th>Tình trạng</th>
                                                <th>Chức năng</th>
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
                <div class="modal fade text-left" id="add-flight-modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Thêm chuyến bay</h4>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form name="add-flight-form" action="/" method="POST">
                                    <div class="modal-body">
                                        <label for="fullname">Tên chuyến bay: </label>
                                        <div class="form-group">
                                            <input type="text" id="themtencb" name="tencb" placeholder="Nhập tên chuyến bay" class="form-control">
                                        </div>
                                        <label for="fullname">Hãng hàng không: </label>
                                        <div class="form-group">
                                            <select class="form-select"  name="hang" id="cardthem-hang" >
                                            </select>
                                        </div>
                                        <label for="fullname">Nơi đi: </label>
                                        <div class="form-group" >
                                            <select class="form-select" name="noidi" id="cardthem-noidi" >
                                            </select>
                                        </div>
                                        <label for="fullname">Nơi đến: </label>
                                        <div class="form-group" >
                                            <select class="form-select" name="noiden" id="cardthem-noiden" >
                                            </select>
                                        </div>
                                        <label for="fullname">Ngày bay : </label>
                                        <div class="form-group">
                                            <input type="date" id="themngaybay" name="ngaybay" min="<?php date_default_timezone_set('Asia/Ho_Chi_Minh'); $today = date("Y-m-d"); echo $today?>"  class="form-control">
                                        </div>
                                        <label for="fullname">Ngày dến : </label>
                                        <div class="form-group">
                                            <input type="date" id="themngayden" name="ngayden" min="<?php date_default_timezone_set('Asia/Ho_Chi_Minh'); $today = date("Y-m-d"); echo $today?>"  class="form-control">
                                        </div>
                                        <label for="fullname">Giờ bay: </label>
                                        <div class="form-group">
                                        <select style="width:50% ;float:left" class="form-select" name="themgiodi" id="themgiodi" >
                                            <?php for($i=0 ;$i<=23;$i++){ ?>
                                            <option value="<?php echo $i ?>"><?php echo $i ?> </option>
                                            <?php } ?>
                                        </select>
                                        <select style="width:50%" class="form-select" name="themphutdi" id="themphutdi" >
                                            <?php for($i=0 ;$i<=59;$i++){ ?>
                                            <option value="<?php echo $i ?>"><?php echo $i ?> </option>
                                            <?php } ?>
                                        </select>
                                        </div>
                                        <label for="fullname">Giờ đến: </label>
                                        <div class="form-group">
                                        <select style="width:50% ;float:left" class="form-select" name="themgioden" id="themgioden" >
                                            <?php for($i=0 ;$i<=23;$i++){ ?>
                                            <option value="<?php echo $i ?>"><?php echo $i ?> </option>
                                            <?php } ?>
                                        </select>
                                        <select style="width:50%" class="form-select" name="themphutden" id="themphutden" >
                                            <?php for($i=0 ;$i<=59;$i++){ ?>
                                            <option value="<?php echo $i ?>"><?php echo $i ?> </option>
                                            <?php } ?>
                                        </select>
                                        </div>
                                        <label for="fullname">Số hiệu máy bay: </label>
                                        <div class="form-group">
                                            <select style="width:70%; float:left" class="form-select" name="themmaybay" id="themmaybay" >
                                            </select>
                                            <button style="width:30%" id="nutmaybay" type="button" class="btn btn-primary ml-1">
                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Cập nhật</span>
                                            </button>
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
                <div class="modal fade text-left" id="repair-flight-modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Sửa chuyến bay</h4>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form name="repair-flight-form" action="/" method="POST">
                                    <div class="modal-body">
                                        <label for="re-fullnamekh">Mã chuyến bay: </label>
                                        <div class="form-group">
                                            <input type="text" id="suamacb" name="macb" placeholder="mã chuyến bay" class="form-control">
                                        </div>
                                        <label for="re-hochieukh">Tên chuyến bay: </label>
                                        <div class="form-group">
                                            <input type="text" id="suatencb" name="tencb" placeholder="Số hộ chiếu" class="form-control">
                                        </div>
                                        <label for="re-cccdkh">Mã hãng hàng không: </label>
                                        <div class="form-group">
                                        <select class="form-select" name="hang" id="cardsua-hang" >
                                            </select>
                                        </div>
                                        <label for="fullname">Nơi đi: </label>
                                        <div class="form-group" id="suanoidi">
                                            <select class="form-select" name="noidi" id="cardsua-noidi" >
                                            </select>
                                        </div>
                                        <label for="fullname">Nơi đến: </label>
                                        <div class="form-group" id="suanoiden">
                                            <select class="form-select" name="noiden" id="cardsua-noiden" >
                                            </select>
                                        </div>
                                        <label for="re-birthdaykh">Ngày bay: </label>
                                        <div class="form-group">
                                            <input type="date" id="suangaybay" name="ngaybay" placeholder="Ngày sinh" class="form-control">
                                        </div>
                                        <label for="re-genderkh">Giờ bay: </label>
                                        <div class="form-group">
                                            <select style="width:50% ;float:left" class="form-select" name="suagiodi" id="cardthem-noiden" >
                                                <?php for($i=0 ;$i<=23;$i++){ ?>
                                                <option value="<?php echo $i ?>"><?php echo $i ?> </option>
                                                <?php } ?>
                                            </select>
                                            <select style="width:50%" class="form-select" name="suaphutdi" id="cardthem-noiden" >
                                                <?php for($i=0 ;$i<=59;$i++){ ?>
                                                <option value="<?php echo $i ?>"><?php echo $i ?> </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <label for="re-addresskh">Giờ đến: </label>
                                        <div class="form-group">
                                            <select style="width:50% ;float:left" class="form-select" name="suagioden" id="cardthem-noiden" >
                                                <?php for($i=0 ;$i<=23;$i++){ ?>
                                                <option value="<?php echo $i ?>"><?php echo $i ?> </option>
                                                <?php } ?>
                                            </select>
                                            <select style="width:50%" class="form-select" name="suaphutden" id="cardthem-noiden" >
                                                <?php for($i=0 ;$i<=59;$i++){ ?>
                                                <option value="<?php echo $i ?>"><?php echo $i ?> </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <label for="fullname">Số hiệu máy bay: </label>
                                        <div class="form-group">
                                            <input type="text" id="suamaybay" name="maybay" placeholder="Tên hạng" class="form-control">
                                        </div>
                                        <label for="fullname">Phần trăm hoàn tiền: </label>
                                        <div class="form-group">
                                            <input type="text" id="suaphantram" name="phantram" placeholder="Tên hạng" class="form-control">
                                        </div>
                                        <label for="fullname">Tình trạng: </label>
                                        <div class="form-group">
                                            <input type="number" id="suatt" name="tt" placeholder="Tên hạng" class="form-control">
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
                <div class="modal fade text-left" id="question-flight-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110" aria-hidden="true">
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
                <!-- Modal1 Thong bao -->
                <div class="modal fade text-left" id="question-flight1-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-success">
                                <h5 class="modal-title white" id="myModalLabel1101">
                                </h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <div class="modal-body" id="question1-model">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Đóng</span>
                                </button>
                                <button type="button" class="btn btn-success ml-1" data-bs-dismiss="modal">
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span id="thuchien1" class="d-none d-sm-block">Thực hiện</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal View -->
                <div class="modal fade" id="view-flight-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">

                            <div class="modal-body">
                                <ul class="list-group">
                                    <li class="list-group-item active">Thông Tin Chi Tiết</li>

                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label>Mã chuyến bay:</label>
                                            <input type="text" class="form-control" id="view-macb" disabled>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label>Tên chuyến bay:</label>
                                            <input type="text" class="form-control" id="view-tencb" disabled>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label>Hãng hàng không:</label>
                                            <input type="text" class="form-control" id="view-hang" disabled>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label>Số hiệu máy bay:</label>
                                            <input type="text" class="form-control" id="view-maybay" disabled>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label>Nơi đi:</label>
                                            <input type="text" class="form-control" id="view-noidi" disabled>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label>Nơi đến:</label>
                                            <input type="text" class="form-control" id="view-noiden" disabled>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label>Giờ bay:</label>
                                            <input type="text" class="form-control" id="view-giobay" disabled>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label>Giờ đến:</label>
                                            <input type="text" class="form-control" id="view-gioden" disabled>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label>Ngày bay:</label>
                                            <input type="text" class="form-control" id="view-ngaybay" disabled>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label>Phần trăm hoàn tiền:</label>
                                            <input type="number" class="form-control" id="view-phantram" disabled>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label>Tình trạng:</label>
                                            <input type="text" class="form-control" id="view-tt" disabled>
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
            layDSflightAjax();
            // kietm tra quyen
            // Đặt sự kiện validate cho modal add rank
            $.post(`http://localhost/Software-Technology/flight/getsanbay`, function(response) {
                if (response.thanhcong) {
                    response.sanbay.forEach(sanbay => {
                        let opt = '<option value="' + sanbay.ma_san_bay + '">' + sanbay.dia_diem + '</option>';
                        $("#cardthem-noidi").append(opt);
                        $("#cardthem-noiden").append(opt);

                        $("#cardsua-noidi").append(opt);
                        $("#cardsua-noiden").append(opt);
                    });
                    response.hang.forEach(hang => {
                        let opt = '<option value="' + hang.ma_hang_hang_khong + '">' + hang.ten + '</option>';
                        $("#cardthem-hang").append(opt);
                        $("#cardsua-hang").append(opt);

                    });
                    
                }
            });
            $.post(`http://localhost/Software-Technology/flight/setTrangThai`, function(response) {
                if(response.thanhcong) {
                    layDSflightAjax();
                }
            });
            $("form[name='add-flight-form']").validate({
                rules: {
                    tencb: {
                        required: true,
                    },
                    hang: {
                        required: true,
                        // remote: {
                        //     url: "http://localhost/Software-Technology/rank/checkvaliemucdiem",
                        //     type: "POST",
                        // }
                    },
                    noidi: {
                        required: true,
                        // remote: {
                        //     url: "http://localhost/Software-Technology/rank/checkvaliemucdiem",
                        //     type: "POST",
                        // }
                    },
                    noiden: {
                        required: true,
                        // remote: {
                        //     url: "http://localhost/Software-Technology/rank/checkvaliemucdiem",
                        //     type: "POST",
                        // }
                    },
                    ngaybay: {
                        required: true,
                        // remote: {
                        //     url: "http://localhost/Software-Technology/fl/checkvaliemucdiem",
                        //     type: "POST",
                        // }
                    },
                    ngayden: {
                        required: true,
                        // remote: {
                        //     url: "http://localhost/Software-Technology/flight/checkvaliemucdiem",
                        //     type: "POST",
                        // }
                    },
                    themgiodi: {
                        required: true,
                    },
                    themgioden: {
                        required: true,
                        
                    },
                    themphutdi: {
                        required: true,
                    },
                    themphutden: {
                        required: true,
                    },
                    themmaybay: {
                        required: true,
                    },

                },
                messages: {
                    tencb: {
                        required: "Vui lòng nhập tên chuyến bay",
                    },
                    hang: {
                        required: "Vui lòng nhập hãng hàng không",
                    },
                    noidi: {
                        required: "Vui lòng nhập nơi đi",
                    },
                    noiden: {
                        required: "Vui lòng nhập nơi đến",
                    },
                    ngaybay: {
                        required: "Vui lòng nhập ngày bay",
                    },
                    ngayden: {
                        required: "Vui lòng nhập ngày đến",
                    },
                    themgiodi: {
                        required: "Vui lòng nhập giờ đi",
                    },
                    themgioden: {
                        required: "Vui lòng nhập giờ đến",
                    },
                    themmaybay: {
                        required: "Vui lòng nhập tất cả dữ liệu",
                    },
                },
                submitHandler: function(form, event) {
                    event.preventDefault();
                    // lấy dữ liệu từ form
                    if(getmaybay()==true){
                        const data = Object.fromEntries(new FormData(form).entries());
                        var giodi1 = getthoigian(data['themgiodi'],data['themphutdi']);
                        var giodi2 = getthoigian(data['themgioden'],data['themphutden']);
                        data['giodi1']=giodi1;
                        data['giodi2']=giodi2;
                        if(data['noidi']!=data['noiden']){
                            $.post(`http://localhost/Software-Technology/flight/create`, data, function(response) {
                                console.log(response);
                                if (response.thanhcong) {
                                    currentPage = 1;
                                    layDSflightAjax();
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
                                $("#add-flight-modal").modal('toggle')
                            });
                            $('#themtencb').val("");
                            $('#themngaybay').val("");
                            $('#themngayden').val("");
                            $('#themgiobay').val(0);
                            $('#themgioden').val(0);
                            $('#cardthem-noidi').val("");
                            $('#cardthem-noiden').val("");
                            $('#themmaybay').val("");
                        }else{
                            Toastify({
                            text: "Nơi đi không được trùng với nơi đến",
                            duration: 1000,
                            close: true,
                            gravity: "top",
                            position: "center",
                            backgroundColor: "#FF6A6A",
                        }).showToast();
                        }
                    } else {
                        Toastify({
                            text: "Giờ đến phải lớn hơn giờ bay",
                            duration: 1000,
                            close: true,
                            gravity: "top",
                            position: "center",
                            backgroundColor: "#FF6A6A",
                        }).showToast();
                    }
                }
            })

        });
        function getmaybay(){
            var giodi= $('#themgiodi').val();
            var phutdi=$('#themphutdi').val();
            var gioden= $('#themgioden').val();
            var phutden= $('#themphutden').val();
            var gio2=getthoigian(giodi,phutdi);
            var gio3=getthoigian(gioden,phutden);
            if(gio2 > gio3){
                return false;
            }
            return true;
        }
        function getthoigian(gio,phut){
            var tg="";
            if(gio<10) {
                if(phut<10) {
                    tg="0"+gio+":0"+phut+":00";
                } else {
                    tg="0"+gio+":"+phut+":00";
                }
            } else {
                if(phut<10) {
                    tg=+gio+":0"+phut+":00";
                } else {
                    tg=+gio+":"+phut+":00";
                }
            }
            return tg;
        }
        $("#nutmaybay").click(function() {
            let data = {
                noidi: $('#cardthem-noidi').val(),
                noiden: $('#cardthem-noiden').val(),
                ngaybay: $('#themngaybay').val(),
                hang: $('#cardthem-hang').val(),
                giodi: getthoigian($('#themgiodi').val(),$('#themphutdi').val()),
                gioden: getthoigian($('#themgioden').val(),$('#themphutden').val()),
                ngayden: $('#themngayden').val(),
            };
            if(data['noidi']!=data['noiden']) {
                $.post(`http://localhost/Software-Technology/flight/getsohieu`, data, function(response) {
                    console.log(response);
                    let opt="";
                    response.forEach(data => {
                        opt+= '<option value="' + data + '">' + data + '</option>';
                    });
                    $("#themmaybay").html(opt);
                });
            } else {
                Toastify({
                    text: "Nơi đi không được trùng với nơi đến",
                    duration: 1000,
                    close: true,
                    gravity: "top",
                    position: "center",
                    backgroundColor: "#FF6A6A",
                }).showToast();
            }
        });
        
        $("#open-add-flight-btn").click(function() {
            $('#themtencb').val("");
            $('#themngaybay').val("");
            $('#themgiobay').val(0);
            //$('#themgioden').val("");
            $('#themmaybay').val("");
            $("#add-flight-modal").modal('toggle')
        });


        function changePage(newPage) {
            currentPage = newPage;
            layDSflightAjax();
        }

        function changePageSearchNangCao(newPage, search, search2) {
            currentPage = newPage;
            layDSFlightSearchNangCao(search, search2);
        }
        function changePageSearchNangCao1(newPage, search) {
            currentPage = newPage;
            layDSFlightSearchNangCao1(search);
        }
        $('#cars-searchtt').change(function() {
            let search = $('#cars-searchtt option').filter(':selected').val();
            //alert(search);
            currentPage = 1;
            layDSFlightSearchNangCao1(search);
        });
        $('#cars-search').change(function() {
            let search = $('#cars-search option').filter(':selected').val();
            //alert(search);
            currentPage = 1;
            layDSFlightSearchNangCao($('#serch-flight-text').val(), search);
        });

        $("#search-flight-form").keyup(debounce(function() {
            let search = $('#cars-search option').filter(':selected').val();
            currentPage = 1;
            //alert($('#serch-flight-text').val());
            layDSFlightSearchNangCao($('#serch-flight-text').val(), search);
        },200));

        function layDSflightAjax() {
            $.get(`http://localhost/Software-Technology/flight/getList?rowsPerPage=10&page=${currentPage}`, function(response) {
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
                let s=0;
                console.log("on");
                response.data.forEach(data => {
                    console.log("kon");
                    let noidi="";
                    let noiden="";
                    let tt="";
                    if(data.trang_thai==1){
                        tt='<select ><option selected value="1">Chưa công bố(chưa có vé)</option></select>';
                    }else if(data.trang_thai == 2){
                        tt='<select id="tinhtrang1" name="'+data.ma_chuyen_bay+'"><option selected value="2">Chưa công bố(Có vé)</option><option value="3">Đã công bố</option></select>';
                    }else if(data.trang_thai == 3){
                        tt='<select><option selected value="3">Đã công bố</option></select>';
                    }else{
                        tt='<select><option selected value="4">Đã cất cánh</option> <select>';
                    }
                    response.sanbay.forEach(sanbay => {
                         if (sanbay.ma_san_bay == data.ma_san_bay_di) {
                            noidi = sanbay.dia_diem;
                            s = s + 1;
                        }
                        if (sanbay.ma_san_bay == data.ma_san_bay_den) {
                            noiden = sanbay.dia_diem;
                            s = s + 1;
                        }
                        if(s==2) {
                            return true;
                        }
                    });
                    if ($row % 2 == 0) {
                        table1.append(`
                        <tr class="table-light">
                            
                            <td>${data.ma_chuyen_bay}</td>
                            <td>${data.ten}</td>
                            <td>${noidi}</td>
                            <td>${noiden}</td>
                            <td>${data.ngay_bay}</td>
                            <td>${tt}<td>
                                <button onclick="viewRow('${data.ma_chuyen_bay}')" type="button" class="btn btn-sm btn-outline-primary" style="padding-top: 3px; padding-bottom: 4px;">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button onclick="deleteRow('${data.ma_chuyen_bay}')" type="button" class="btn btn-sm btn-outline-danger" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </td>
                        </tr>`);
                    } else { 
                        table1.append(`
                        <tr class="table-info">
                           
                            <td>${data.ma_chuyen_bay}</td>
                            <td>${data.ten}</td>
                            <td>${noidi}</td>
                            <td>${noiden}</td>
                            <td>${data.ngay_bay}</td>
                            <td>${tt}</td>
                            <td>
                                <button onclick="viewRow('${data.ma_chuyen_bay}')" type="button" class="btn btn-sm btn-outline-primary" style="padding-top: 3px; padding-bottom: 4px;">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button onclick="deleteRow('${data.ma_chuyen_bay}')" type="button" class="btn btn-sm btn-outline-danger" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </td>
                        </tr>`);
                    }
                    checkedRows.push(data.ma_chuyen_bay);
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
        $(document).on('change',  '#tinhtrang1', function() {
            var value = $(this).children('option:selected').val();
            var id = $(this).attr('name');
            let data ={
                tinhtrang: value,
                macb: id,
            };
            $("#myModalLabel110").text("Quản Lý hạng khách hàng");
            $("#question-model").text("Bạn có chắc chắn muốn sửa tình trạng chuyến bay này này không?");
            $("#question-flight-modal").modal('toggle');
            $('#thuchien').off('click');
            $("#thuchien").click(function() {
                $.post(`http://localhost/Software-Technology/flight/changestatus`, data, function(response) {
                    if (response.thanhcong) {
                        currentPage = 1;
                        layDSflightAjax();
                        Toastify({
                            text: "Sửa tình trạng thành công",
                            duration: 1000,
                            close: true,
                            gravity: "top",
                            position: "center",
                            backgroundColor: "#4fbe87",
                        }).showToast();
                    }
                });
            });
        });
        function layDSFlightSearchNangCao(search, search2) {
            $.get(`http://localhost/Software-Technology/flight/searchFlight?rowsPerPage=10&page=${currentPage}&search=${search}&search2=${search2}`, function(response) {
                console.log(response);
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
                    let s=0;
                    let noidi="";
                    let noiden="";
                    response.sanbay.forEach(sanbay => {
                            if (sanbay.ma_san_bay == data.ma_san_bay_di) {
                                noidi = sanbay.dia_diem;
                                s = s + 1;
                            }
                            if (sanbay.ma_san_bay == data.ma_san_bay_den) {
                                noiden = sanbay.dia_diem;
                                s = s + 1;
                            }
                            if(s==2) {
                                return true;
                            }
                        });
                    let tt="";
                    if(data.trang_thai==1){
                        tt='<select ><option selected value="1">Chưa công bố(chưa có vé)</option></select>';
                    }else if(data.trang_thai == 2){
                        tt='<select id="tinhtrang1" name="'+data.ma_chuyen_bay+'"><option selected value="2">Chưa công bố(Có vé)</option><option value="3">Đã công bố</option></select>';
                    }else if(data.trang_thai == 3){
                        tt='<select ><option selected value="3">Đã công bố</option></select>';
                    }else{
                        tt='<select><option selected value="4">Đã cất cánh</option> <select>';
                    }
                    if ($row % 2 == 0) {
                        
                        table1.append(`
                        <tr class="table-light">
                            <td>${data.ma_chuyen_bay}</td>
                            <td>${data.ten}</td>
                            <td>${noidi}</td>
                            <td>${noiden}</td>
                            <td>${data.ngay_bay}</td>
                            <td>${tt}</td>
                            <td>
                                <button onclick="viewRow('${data.ma_chuyen_bay}')" type="button" class="btn btn-sm btn-outline-primary" style="padding-top: 3px; padding-bottom: 4px;">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button onclick="deleteRow('${data.ma_chuyen_bay}')" type="button" class="btn btn-sm btn-outline-danger" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </td>
                        </tr>`);
                    } else { 
                        table1.append(`
                        <tr class="table-info">
                            <td>${data.ma_chuyen_bay}</td>
                            <td>${data.ten}</td>
                            <td>${noidi}</td>
                            <td>${noiden}</td>
                            <td>${data.ngay_bay}</td>"
                            <td>${tt}</td>
                            <td>
                                <button onclick="viewRow('${data.ma_chuyen_bay}')" type="button" class="btn btn-sm btn-outline-primary" style="padding-top: 3px; padding-bottom: 4px;">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button onclick="deleteRow('${data.ma_chuyen_bay}')" type="button" class="btn btn-sm btn-outline-danger" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </td>
                        </tr>`);
                    }
                    checkedRows.push(data.ma_chuyen_bay);
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
                            <button class="page-link" onClick='changePageSearchNangCao(${i},"${search}","${search2}")'</button>
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


        function layDSFlightSearchNangCao1(search) {
            $.get(`http://localhost/Software-Technology/flight/searchFlight1?rowsPerPage=10&page=${currentPage}&search=${search}`, function(response) {
                console.log(response);
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
                    let s=0;
                    let noidi="";
                    let noiden="";
                    response.sanbay.forEach(sanbay => {
                            if (sanbay.ma_san_bay == data.ma_san_bay_di) {
                                noidi = sanbay.dia_diem;
                                s = s + 1;
                            }
                            if (sanbay.ma_san_bay == data.ma_san_bay_den) {
                                noiden = sanbay.dia_diem;
                                s = s + 1;
                            }
                            if(s==2) {
                                return true;
                            }
                        });
                    let tt="";
                    if(data.trang_thai==1){
                        tt='<select ><option selected value="1">Chưa công bố(chưa có vé)</option></select>';
                    }else if(data.trang_thai == 2){
                        tt='<select id="tinhtrang1" name="'+data.ma_chuyen_bay+'"><option selected value="2">Chưa công bố(Có vé)</option><option value="3">Đã công bố</option></select>';
                    }else if(data.trang_thai == 3){
                        tt='<select ><option selected value="3">Đã công bố</option></select>';
                    }else{
                        tt='<select><option selected value="4">Đã cất cánh</option> <select>';
                    }
                    if ($row % 2 == 0) {
                        
                        table1.append(`
                        <tr class="table-light">
                            
                            <td>${data.ma_chuyen_bay}</td>
                            <td>${data.ten}</td>
                            <td>${noidi}</td>
                            <td>${noiden}</td>
                            <td>${data.ngay_bay}</td>
                            <td>${tt}</td>
                            <td>
                                <button onclick="viewRow('${data.ma_chuyen_bay}')" type="button" class="btn btn-sm btn-outline-primary" style="padding-top: 3px; padding-bottom: 4px;">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button onclick="deleteRow('${data.ma_chuyen_bay}')" type="button" class="btn btn-sm btn-outline-danger" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </td>
                        </tr>`);
                    } else { 
                        table1.append(`
                        <tr class="table-info">
                            
                            <td>${data.ma_chuyen_bay}</td>
                            <td>${data.ten}</td>
                            <td>${noidi}</td>
                            <td>${noiden}</td>
                            <td>${data.ngay_bay}</td>"
                            <td>${tt}</td>
                            <td>
                                <button onclick="viewRow('${data.ma_chuyen_bay}')" type="button" class="btn btn-sm btn-outline-primary" style="padding-top: 3px; padding-bottom: 4px;">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button onclick="deleteRow('${data.ma_chuyen_bay}')" type="button" class="btn btn-sm btn-outline-danger" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </td>
                        </tr>`);
                    }
                    checkedRows.push(data.ma_chuyen_bay);
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
                            <button class="page-link" onClick='changePageSearchNangCao1(${i},"${search}")'>${i}</button>
                        </li>`)
                        } else {
                            pagination.append(`
                        <li class="page-item">
                            <button class="page-link" onClick='changePageSearchNangCao1(${i},"${search}")'>${i}</button>
                        </li>`)
                        }

                    }
                }

            });
        }

        function viewRow(params) {
            let data = {
                macb: params
            };
            $.post(`http://localhost/Software-Technology/flight/getFlight`, data, function(response) {
                console.log(response);
                if (response.thanhcong) {
                    let noidi="";
                    let noiden="";
                    let s=0;
                    response.sanbay.forEach(sanbay => {
                         if (sanbay.ma_san_bay == response.sanbaydi) {
                            noidi = sanbay.dia_diem;
                            s = s + 1;
                        }
                        if (sanbay.ma_san_bay == response.sanbayden) {
                            noiden = sanbay.dia_diem;
                            s = s + 1;
                        }
                        if(s==2) {
                            return true;
                        }
                    });
                    let tt = "";
                    if(response.tt==1){
                        tt='Chưa công bố(chưa có vé)';
                    }else if(response.tt == 2){
                        tt='Chưa công bố(Có vé)';
                    }else if(response.tt == 3){
                        tt='Đã công bố';
                    }else{
                        tt='Đã cất cánh';
                    }
                    $("#view-macb").val(response.macb);
                    $("#view-tencb").val(response.tencb);
                    $("#view-maybay").val(response.maybay);
                    $("#view-noidi").val(noidi);
                    $("#view-noiden").val(noiden);

                    $("#view-hang").val(response.hang);
                    $("#view-giobay").val(response.giobay);
                    $("#view-gioden").val(response.gioden);
                    $("#view-ngaybay").val(response.ngaybay);
                    $("#view-tt").val(tt);
                    $("#view-phantram").val(response.phantram);
                }
            });
            $("#view-flight-modal").modal('toggle');
        }

        // function resetPass(params) {
        //     let data = {
        //         email: params
        //     };
        //     $.post(`http://localhost/Software-Technology/flight/resetPassword`, data, function(response) {
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
                macb: params
            };
            $.post(`http://localhost/Software-Technology/flight/update`, data, function(response) {
                if (response.thanhcong) {
                    //alert(response.giobay);
                    $("#suamacb").val(response.macb);
                    $("#suatencb").val(response.tencb);
                    $("#suamaybay").val(response.maybay);
                    $("#suanoidi").val(noidi);
                    $("#suanoiden").val(noiden);
                    $("#suahang").val(response.hang);
                    $("#suagiobay").val(response.giobay);
                    $("#suagioden").val(response.gioden);
                    $("#suangaybay").val(response.ngaybay);
                    $("#suatt").val(response.tt);
                    $("#suaphantram").val(response.phantram);
                }
            });
            $("#repair-flight-modal").modal('toggle');
            //Sua form
            $("form[name='repair-flight-form']").validate({
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
                    $("#question-flight-modal").modal('toggle');
                    $('#thuchien').off('click');
                    $("#thuchien").click(function() {
                        // lấy dữ liệu từ form

                        const data = Object.fromEntries(new FormData(form).entries());
                        $.post(`http://localhost/Software-Technology/flight/update`, data, function(response) {
                            console.log(response);
                            if (response.thanhcong) {
                                currentPage = 1;
                                layDSflightAjax();
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
                            $("#repair-flight-modal").modal('toggle')
                        });
                    });
                }
            })
        }

        function deleteRow(params) {
            let data = {
                macb: params,
            };
            $("#myModalLabel110").text("Quản Lý chuyến bay");
            $("#question-model").text("Bạn có chắc chắn muốn xóa chuyến bay này này không?");
            $("#question-flight-modal").modal('toggle');
            $('#thuchien').off('click');
            $("#thuchien").click(function() {
                $.post(`http://localhost/Software-Technology/flight/delete`, data, function(response) {
                    
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
                        layDSflightAjax();
                    } else if(response.thanhcong==1){
                        Toastify({
                            text: "chuyến bay đã đủ số lượng khách hàng không thể xóa",
                            duration: 1000,
                            close: true,
                            gravity: "top",
                            position: "center",
                            backgroundColor: "#FF6A6A",
                        }).showToast();
                    }else if(response.thanhcong==2){
                        Toastify({
                            text: "chuyến bay đã cất cánh không thể xóa",
                            duration: 1000,
                            close: true,
                            gravity: "top",
                            position: "center",
                            backgroundColor: "#FF6A6A",
                        }).showToast();
                    }
                    else if(response.thanhcong==3){
                        Toastify({
                            text: "Xóa thật bại",
                            duration: 1000,
                            close: true,
                            gravity: "top",
                            position: "center",
                            backgroundColor: "#FF6A6A",
                        }).showToast();
                    } else {
                        
                        $("#myModalLabel1101").text("Quản Lý chuyến bay");
                        $("#question1-model").text("Nếu xóa chuyến bay này bạn phải hoàn tiền cho khách hàng đã mua vé");
                        $("#question-flight1-modal").modal('toggle');
                        
                        $('#thuchien1').off('click');
                        $("#thuchien1").click(function() {
                            $.post(`http://localhost/Software-Technology/flight/delete1`, data, function(response) {
                                if(response.thanhcong==1){
                                    Toastify({
                                        text: "Xóa thành công",
                                        duration: 1000,
                                        close: true,
                                        gravity: "top",
                                        position: "center",
                                        backgroundColor: "#FF6A6A",
                                    }).showToast();
                                }
                                console.log(response);
                            });
                        });
                    }
                });
            });
        }

        // $("#btn-delete-flight").click(function() {
        //     $("#myModalLabel110").text("Quản Lý Tài Khoản");
        //     $("#question-model").text("Bạn có chắc chắn muốn xóa những hạng khách hàng này không");
        //     $("#question-flight-modal").modal('toggle');
        //     $('#thuchien').off('click')
        //     $("#thuchien").click(function() {
        //         let datas = []
        //         checkedRows.forEach(checkedRow => {
        //             if ($('#' + checkedRow).prop("checked")) {
        //                 datas.push(checkedRow);
        //             }
        //         });
        //         let data = {
        //             mahang: JSON.stringify(datas)
        //         };
        //         $.post(`http://localhost/Software-Technology/flight/deletes`, data, function(response) {
        //             console.log(response);
        //             if (response.thanhcong>0) {
        //                 Toastify({
        //                     text: response.tb,
        //                     duration: 1000,
        //                     close: true,
        //                     gravity: "top",
        //                     position: "center",
        //                     backgroundColor: "#4fbe87",
        //                 }).showToast();
        //                 currentPage = 1;
        //                 layDSflightAjax();
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