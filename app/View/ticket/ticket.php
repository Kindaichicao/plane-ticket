<?php

use App\Core\View;

View::$activeItem = 'ticket';

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
                        <div id="search-ticket-form" name="search-ticket-form">
                            <div class="form-group position-relative has-icon-right">
                                <input id="serch-ticket-text" type="text" class="form-control" placeholder="Tìm kiếm" value="">
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
                                    <h3>Danh sách vé máy bay</h3>
                                </label>
                                <label>
                                    <h5 style="margin-left: 50px; margin-right: 10px;"> Lọc Theo:</h5>
                                </label>
                                <select class="btn btn btn-primary" name="search-cbb" id="cars-search">
                                    <option value="1">Tất Cả</option>
                                    <option value="2">Mã chuyến bay</option>
                                    <option value="3">Mã vé</option>
                                    <option value="4">Tên hãng</option>
                                    <option value="5">Ngày bay</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-5 order-md-2 order-first">

                                <div class=" loat-start float-lg-end mb-3">
                                <button id='open-repair-ticket-btn' class="btn btn-dark">
                                        <i class="bi bi-tools"></i> Sửa vé máy bay
                                    </button>
                                    <button id='open-add-ticket-btn' class="btn btn-primary">
                                        <i class="bi bi-plus"></i> Thêm vé máy bay
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
                                                <th>Mã vé</th>
                                                <th>Tên hãng</th>
                                                <th>Nơi đi</th>
                                                <th>Nơi đến</th>
                                                <th>Ngày bay</th>
                                                <th>Trạng thái</th>
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
                <div class="modal fade text-left" id="add-ticket-modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Chọn các chuyến bay để tạo vé</h4>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form name="add-ticket-form" action="/" method="POST">
                                    <div class="modal-header">
                                        <div>
                                            
                                        </div>
                                        
                                    </div>
                                    <div class="modal-body">
                                        <div class="table-responsive">
                                            <table class="table mb-0 table-danger" id="tb2">
                                                <thead>
                                                    <tr>
                                                        <th>Mã CB</th>
                                                        <th>Tên hãng</th>
                                                        <th>Số hiệu MB</th>
                                                        <th>Ngày bay</th>
                                                        <th>Nơi đi</th>
                                                        <th>Nơi đến</th>
                                                        <th>Giờ bay</th>
                                                        <th>Giờ đến</th>
                                                        <th>Trạng thái</th>
                                                        <th>Tác vụ</th>
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
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Đóng</span>
                                </button>
                                
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- MODAL ADD1 -->
                <div class="modal fade text-left" id="add-ticket1-modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Tạo vé cho chuyến bay</h4>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form name="add-ticket1-form" action="/" method="POST">
                                    
                                    <div class="modal-body">
                                        <label for="machuyenbay1">Mã chuyến bay: </label>
                                        <div class="form-group">
                                            <input type="text" id="machuyenbay1" readonly="readonly" name="machuyenbay1" placeholder="" class="form-control">
                                        </div>
                                        <label for="tenhang1">Tên hãng: </label>
                                        <div class="form-group">
                                            <input type="text" id="tenhang1" readonly="readonly" name="tenhang1" placeholder="" class="form-control">
                                        </div>
                                        <label for="sohieumaybay1">Số hiệu máy bay: </label>
                                        <div class="form-group">
                                            <input type="text" id="sohieumaybay1" readonly="readonly" name="sohieumaybay1" placeholder="" class="form-control">
                                        </div>
                                        <label for="ngaybay1">Ngày bay: </label>
                                        <div class="form-group">
                                            <input type="text" id="ngaybay1" readonly="readonly" name="ngaybay1" placeholder="" class="form-control">
                                        </div>
                                        <label for="noidi1">Nơi đi: </label>
                                        <div class="form-group">
                                            <input type="text" id="noidi1" readonly="readonly" name="noidi1" placeholder="" class="form-control">
                                        </div>
                                        <label for="noiden1">Nơi đến: </label>
                                        <div class="form-group">
                                            <input type="text" id="noiden1" readonly="readonly" name="noiden1" placeholder="" class="form-control">
                                        </div>
                                        <label for="giobay1">Giờ bay: </label>
                                        <div class="form-group">
                                            <input type="text" id="giobay1" readonly="readonly" name="giobay1" placeholder="" class="form-control">
                                        </div>
                                        <label for="gioden1">Giờ dến: </label>
                                        <div class="form-group">
                                            <input type="text" id="gioden1" readonly="readonly" name="gioden1" placeholder="" class="form-control">
                                        </div>
                                        <label for="ghethuonggia" style="color:black; font-weight:bold; font-size:20px">Ghế thương gia: </label>
                                        <div class="form-group">
                                            <input type="hidden" id="ghethuonggia" readonly="readonly" name="ghethuonggia" placeholder="" class="form-control">
                                        </div>
                                        <label for="giagocthuonggia">Giá gốc: </label>
                                        <div class="form-group">
                                            <input type="text" id="giagocthuonggia" name="giagocthuonggia" placeholder="0" class="form-control">
                                        </div>
                                        <label for="giathuethuonggia">Giá thuế: </label>
                                        <div class="form-group">
                                            <input type="text" id="giathuethuonggia" name="giathuethuonggia" placeholder="0" class="form-control">
                                        </div>
                                        <label for="ghethuong" style="color:black; font-weight:bold; font-size:20px">Ghế thường: </label>
                                        <div class="form-group">
                                            <input type="hidden" id="ghethuong" readonly="readonly" name="ghethuong" placeholder="" class="form-control">
                                        </div>
                                        <label for="giagocthuong">Giá gốc: </label>
                                        <div class="form-group">
                                            <input type="text" id="giagocthuong" name="giagocthuong" placeholder="0" class="form-control">
                                        </div>
                                        <label for="giathuethuong">Giá thuế: </label>
                                        <div class="form-group">
                                            <input type="text" id="giathuethuong" name="giathuethuong" placeholder="0" class="form-control">
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
                <div class="modal fade text-left" id="repair-ticket-modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Sửa Thông Tin Vé Máy Bay</h4>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                            <form name="repair-ticket-form" action="/" method="POST">
                                    <div class="modal-header">
                                        <div>
                                            
                                        </div>
                                        
                                    </div>
                                    <div class="modal-body">
                                        <div class="table-responsive">
                                            <table class="table mb-0 table-danger" id="tb3">
                                                <thead>
                                                    <tr>
                                                        <th>Mã CB</th>
                                                        <th>Tên hãng</th>
                                                        <th>Số hiệu MB</th>
                                                        <th>Ngày bay</th>
                                                        <th>Nơi đi</th>
                                                        <th>Nơi đến</th>
                                                        <th>Giờ bay</th>
                                                        <th>Giờ đến</th>
                                                        <th>Trạng thái</th>
                                                        <th>Tác vụ</th>
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
                                
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Đóng</span>
                                    </button>
                                    
                                </div>
                                </form>
                        </div>
                    </div>
                </div>
                <!-- MODAL SUA1 -->
                <div class="modal fade text-left" id="repair-ticket1-modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Sửa vé cho chuyến bay</h4>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form name="repair-ticket1-form" action="/" method="POST">
                                    
                                    <div class="modal-body">
                                    <label for="re-machuyenbay1">Mã chuyến bay: </label>
                                        <div class="form-group">
                                            <input type="text" id="re-machuyenbay1" readonly="readonly" name="suamachuyenbay1" placeholder="" class="form-control">
                                        </div>
                                        <label for="re-tenhang1">Tên hãng: </label>
                                        <div class="form-group">
                                            <input type="text" id="re-tenhang1" readonly="readonly" name="suatenhang1" placeholder="" class="form-control">
                                        </div>
                                        <label for="re-sohieumaybay1">Số hiệu máy bay: </label>
                                        <div class="form-group">
                                            <input type="text" id="re-sohieumaybay1" readonly="readonly" name="suasohieumaybay1" placeholder="" class="form-control">
                                        </div>
                                        <label for="re-ngaybay1">Ngày bay: </label>
                                        <div class="form-group">
                                            <input type="text" id="re-ngaybay1" readonly="readonly" name="suangaybay1" placeholder="" class="form-control">
                                        </div>
                                        <label for="re-noidi1">Nơi đi: </label>
                                        <div class="form-group">
                                            <input type="text" id="re-noidi1" readonly="readonly" name="suanoidi1" placeholder="" class="form-control">
                                        </div>
                                        <label for="re-noiden1">Nơi đến: </label>
                                        <div class="form-group">
                                            <input type="text" id="re-noiden1" readonly="readonly" name="suanoiden1" placeholder="" class="form-control">
                                        </div>
                                        <label for="re-giobay1">Giờ bay: </label>
                                        <div class="form-group">
                                            <input type="text" id="re-giobay1" readonly="readonly" name="suagiobay1" placeholder="" class="form-control">
                                        </div>
                                        <label for="re-gioden1">Giờ dến: </label>
                                        <div class="form-group">
                                            <input type="text" id="re-gioden1" readonly="readonly" name="suagioden1" placeholder="" class="form-control">
                                        </div>
                                        <label for="re-ghethuonggia" style="color:black; font-weight:bold; font-size:20px">Ghế thương gia: </label>
                                        <div class="form-group">
                                            <input type="hidden" id="re-ghethuonggia" readonly="readonly" name="suaghethuonggia" placeholder="" class="form-control">
                                        </div>
                                        <label for="re-giagocthuonggia">Giá gốc: </label>
                                        <div class="form-group">
                                            <input type="text" id="re-giagocthuonggia" name="suagiagocthuonggia" placeholder="0" class="form-control">
                                        </div>
                                        <label for="re-giathuethuonggia">Giá thuế: </label>
                                        <div class="form-group">
                                            <input type="text" id="re-giathuethuonggia" name="suagiathuethuonggia" placeholder="0" class="form-control">
                                        </div>
                                        <label for="re-ghethuong" style="color:black; font-weight:bold; font-size:20px">Ghế thường: </label>
                                        <div class="form-group">
                                            <input type="hidden" id="re-ghethuong" readonly="readonly" name="suaghethuong" placeholder="" class="form-control">
                                        </div>
                                        <label for="re-giagocthuong">Giá gốc: </label>
                                        <div class="form-group">
                                            <input type="text" id="re-giagocthuong" name="suagiagocthuong" placeholder="0" class="form-control">
                                        </div>
                                        <label for="re-giathuethuong">Giá thuế: </label>
                                        <div class="form-group">
                                            <input type="text" id="re-giathuethuong" name="suagiathuethuong" placeholder="0" class="form-control">
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
                <div class="modal fade text-left" id="question-ticket-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110" aria-hidden="true">
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
                <div class="modal fade text-left " id="view-ticket-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">

                            <div class="modal-body">
                                <ul class="list-group">
                                    <li class="list-group-item active">Thông Tin Chi Tiết</li>
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label>Mã vé:</label>
                                            <input type="text" class="form-control" id="view-ve" disabled>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label>Tên hàng không:</label>
                                            <input type="text" class="form-control" id="view-hangkhong" disabled>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label>Số hiệu máy bay:</label>
                                            <input type="text" class="form-control" id="view-hieumaybay" disabled>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label>Tên chuyến bay:</label>
                                            <input type="text" class="form-control" id="view-chuyenbay" disabled>
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
                                            <label>Giờ đi:</label>
                                            <input type="text" class="form-control" id="view-giodi" disabled>
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
                                            <label>Tên hạng dịch vụ:</label>
                                            <input type="text" class="form-control" id="view-hangdichvu" disabled>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label>Số ghế:</label>
                                            <input type="text" class="form-control" id="view-soghe" disabled>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label>Giá gốc:</label>
                                            <input type="text" class="form-control" id="view-giagoc" disabled>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label>Tiền thuế:</label>
                                            <input type="text" class="form-control" id="view-tienthue" disabled>
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
            
            layDSTicketAjax();
            layDSTicketAjax1();
            layDSTicketAjax2();
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
            
            $.post(`http://localhost/Software-Technology/Ticket/setTrangThai`, function(response) {
                if(response.thanhcong) {
                    layDSTicketAjax();
                    layDSTicketAjax1();
                    layDSTicketAjax2();
                } 
            });

            // Đặt sự kiện validate cho modal add user
            $("form[name='add-ticket1-form']").validate({
                rules: {
                    machuyenbay1: {
                        required: true,
                    },
                    ghethuong: {
                        required: true,
                    },
                    ghethuonggia: {
                        required: true,
                    },
                    giagocthuonggia: {
                        required: true,
                        number:true,
                        min:99999,
                    },

                    giathuethuonggia: {
                        required: true,
                        number: true,
                        min:999999,
                    },
                    giagocthuong: {
                        required: true,
                        number: true,
                        min:49999,

                    },
                    giathuethuong: {
                        required: true,
                        number: true,
                        min:699999,

                    },

                },
                messages: {
                    giagocthuonggia: {
                        required: "Vui lòng nhập giá gốc ghế thương gia",
                        number: "Giá gốc ghế thương gia phải là số",
                        min: "Giá gốc ghế thương gia giá phải lớn hơn 99,999 VND",
                    },
                    giathuethuonggia: {
                        required: "Vui lòng nhập giá thuế ghế thương gia",
                        number: "Giá thuế ghế thương gia phải là số",
                        min: "Giá thuế ghế thương gia giá phải lớn hơn 999,999 VND",
                    },
                    giagocthuong: {
                        required: "Vui lòng nhập giá gốc ghế thường",
                        number: "Giá gốc ghế thường phải là số",
                        min: "Giá gốc ghế thường giá phải lớn hơn 49,999 VND",
                    },
                    giathuethuong: {
                        required: "Vui lòng nhập giá thuế ghế thường",
                        email: "Giá thuế ghế thường phải là số",
                        min: "Giá thuế ghế thường giá phải lớn hơn 699,999 VND",
                    },
                },
                submitHandler: function(form, event) {
                    event.preventDefault();
                    // lấy dữ liệu từ form
                    const data = Object.fromEntries(new FormData(form).entries());

                    $.post(`http://localhost/Software-Technology/ticket/create`, data, function(response) {
                        console.log(response.thanhcong);
                        if (response.thanhcong) {
                            currentPage = 1;
                            layDSTicketAjax1();
                            layDSTicketAjax();
                            layDSTicketAjax2()
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
                        $("#add-ticket1-modal").modal('toggle')
                    });
                    $('#giagocthuonggia').val("");
                    $('#giathuethuonggia').val("");
                    $('#giagocthuong').val("");
                    $('#giathuethuong').val("");
                }
            })

        });
        
        $("#open-add-ticket-btn").click(function() {
            
            $("#add-ticket-modal").modal('toggle');
        });
        $("#open-repair-ticket-btn").click(function() {
            
            $("#repair-ticket-modal").modal('toggle');
        });

        
        function changePage(newPage) {
            currentPage = newPage;
            layDSTicketAjax();
        }

        function changePageSearchNangCao(newPage, search, search2) {
            currentPage = newPage;
            layDSTicketSearchNangCao(search, search2);
        }

        $('#cars-search').change(function() {
            let search = $('#cars-search option').filter(':selected').val();
            currentPage = 1;
            layDSTicketSearchNangCao($('#serch-ticket-text').val(), search);
        });

        $("#search-ticket-form").keyup(debounce(function() {
            let search = $('#cars-search option').filter(':selected').val();
            currentPage = 1;
            layDSTicketSearchNangCao($('#serch-ticket-text').val(), search);
        },200));

        function layDSTicketAjax() {
            $.get(`http://localhost/Software-Technology/ticket/getList?rowsPerPage=10&page=${currentPage}`, function(response) {
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
                
                    let noidi="";
                    let noiden="";
                    let s = 0;
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
                    let tt = ""
                    if(data.trang_thai==1) {
                        tt="Chưa bán";
                    } else if(data.trang_thai==2) {
                        tt="Đã bán";
                    } else if(data.trang_thai==3) {
                        tt="Đã hết hạn";
                    }
                    if ($row % 2 == 0) {

                        table1.append(`
                        <tr class="table-light">
                            
                            <td>${data.ma_chuyen_bay}</td>
                            <td>${data.ma_ve}</td>
                            <td>${data.ten}</td>
                            <td>${noidi}</td>
                            <td>${noiden}</td>
                            <td>${data.ngay_bay}</td>
                            <td>${tt}</td>
                            <td>
                                <button onclick="viewRow('${data.ma_ve}')" type="button" class="btn btn-sm btn-outline-primary" style="padding-top: 3px; padding-bottom: 4px;">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </td>
                        </tr>`);
                    } else {
                        table1.append(`
                        <tr class="table-info">
                        <td>${data.ma_chuyen_bay}</td>
                            <td>${data.ma_ve}</td>
                            <td>${data.ten}</td>
                            <td>${noidi}</td>
                            <td>${noiden}</td>
                            <td>${data.ngay_bay}</td>
                            <td>${tt}</td>
                            <td>
                                <button onclick="viewRow('${data.ma_ve}')" type="button" class="btn btn-sm btn-outline-primary" style="padding-top: 3px; padding-bottom: 4px;">
                                    <i class="bi bi-eye"></i>
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
        //-----------------------
        function layDSTicketAjax1() {
            $.get(`http://localhost/Software-Technology/ticket/getList1?rowsPerPage=10&page=${currentPage}`, function(response) {
                // Không được gán biến response này ra ngoài function,
                // vì function này bất đồng bộ, khi nào gọi api xong thì response mới có dữ liệu
                // gán ra ngoài thì code ở ngoài chạy trc khi gọi api xong.
                //data là danh sách usser
                //page là trang hiện tại
                // rowsPerpage là số dòng trên 1 trang
                // totalPage là tổng số trang
                const table1 = $('#tb2 > tbody');
                table1.empty();
                checkedRows = [];
                $row = 0;
                response.data.forEach(data => {
                    let disabled = "disabled btn icon icon-left btn-secondary";
                
                    let noidi="";
                    let noiden="";
                    let s = 0;
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
                    let tt = "";
                    if(data.trang_thai==1) {
                        tt="Chưa có vé";
                    }
                    if ($row % 2 == 0) {

                        table1.append(`
                        <tr class="table-light">
                            
                            <td>${data.ma_chuyen_bay}</td>
                            <td>${data.ten}</td>
                            <td>${data.so_hieu_may_bay}</td>
                            <td>${data.ngay_bay}</td>
                            <td>${noidi}</td>
                            <td>${noiden}</td>
                            <td>${data.gio_bay}</td>
                            <td>${data.gio_den}</td>
                            <td>${tt}</td>
                            <td>
                                <button onclick="addRow('${data.ma_chuyen_bay}')" type="button" class="btn btn-sm btn-outline-primary" style="padding-top: 3px; padding-bottom: 4px;">
                                    <i class="bi bi-plus">Add</i>
                                </button>
                            </td>
                        </tr>`);
                    } else {
                        table1.append(`
                        <tr class="table-info">
                            <td>${data.ma_chuyen_bay}</td>
                            <td>${data.ten}</td>
                            <td>${data.so_hieu_may_bay}</td>
                            <td>${data.ngay_bay}</td>
                            <td>${noidi}</td>
                            <td>${noiden}</td>
                            <td>${data.gio_bay}</td>
                            <td>${data.gio_den}</td>
                            <td>${tt}</td>
                            <td>
                                <button onclick="addRow('${data.ma_chuyen_bay}')" type="button" class="btn btn-sm btn-outline-primary" style="padding-top: 3px; padding-bottom: 4px;">
                                    <i class="bi bi-plus">Add</i>
                                </button>
                            </td>
                        </tr>`);
                    }
                    checkedRows.push(data.ma_kh);
                    $row += 1;
                });

                // const pagination = $('#pagination');
                // // Xóa phân trang cũ
                // pagination.empty();
                // if (response.totalPage > 1) {
                //     for (let i = 1; i <= response.totalPage; i++) {
                //         if (i == currentPage) {
                //             pagination.append(`
                //         <li class="page-item active">
                //             <button class="page-link" onClick='changePage(${i})'>${i}</button>
                //         </li>`)
                //         } else {
                //             pagination.append(`
                //         <li class="page-item">
                //             <button class="page-link" onClick='changePage(${i})'>${i}</button>
                //         </li>`)
                //         }

                //     }
                // }

            });
        }
        //-----------------------
        function layDSTicketAjax2() {
            $.get(`http://localhost/Software-Technology/ticket/getList2?rowsPerPage=10&page=${currentPage}`, function(response) {
                // Không được gán biến response này ra ngoài function,
                // vì function này bất đồng bộ, khi nào gọi api xong thì response mới có dữ liệu
                // gán ra ngoài thì code ở ngoài chạy trc khi gọi api xong.
                //data là danh sách usser
                //page là trang hiện tại
                // rowsPerpage là số dòng trên 1 trang
                // totalPage là tổng số trang
                const table1 = $('#tb3 > tbody');
                table1.empty();
                checkedRows = [];
                $row = 0;
                response.data.forEach(data => {
                    let disabled = "disabled btn icon icon-left btn-secondary";
                
                    let noidi="";
                    let noiden="";
                    let s = 0;
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
                    let tt = "";
                    if(data.trang_thai==2) {
                        tt="Đã có vé";
                    }
                    if ($row % 2 == 0) {

                        table1.append(`
                        <tr class="table-light">
                            
                            <td>${data.ma_chuyen_bay}</td>
                            <td>${data.ten}</td>
                            <td>${data.so_hieu_may_bay}</td>
                            <td>${data.ngay_bay}</td>
                            <td>${noidi}</td>
                            <td>${noiden}</td>
                            <td>${data.gio_bay}</td>
                            <td>${data.gio_den}</td>
                            <td>${tt}</td>
                            <td>
                                <button onclick="repairRow('${data.ma_chuyen_bay}')" type="button" class="btn btn-sm btn-outline-primary" style="padding-top: 3px; padding-bottom: 4px;">
                                    <i class="bi bi-tools">Repair</i>
                                </button>
                            </td>
                        </tr>`);
                    } else {
                        table1.append(`
                        <tr class="table-info">
                            <td>${data.ma_chuyen_bay}</td>
                            <td>${data.ten}</td>
                            <td>${data.so_hieu_may_bay}</td>
                            <td>${data.ngay_bay}</td>
                            <td>${noidi}</td>
                            <td>${noiden}</td>
                            <td>${data.gio_bay}</td>
                            <td>${data.gio_den}</td>
                            <td>${tt}</td>
                            <td>
                                <button onclick="repairRow('${data.ma_chuyen_bay}')" type="button" class="btn btn-sm btn-outline-primary" style="padding-top: 3px; padding-bottom: 4px;">
                                    <i class="bi bi-tools">Repair</i>
                                </button>
                            </td>
                        </tr>`);
                    }
                    checkedRows.push(data.ma_kh);
                    $row += 1;
                });

                // const pagination = $('#pagination');
                // // Xóa phân trang cũ
                // pagination.empty();
                // if (response.totalPage > 1) {
                //     for (let i = 1; i <= response.totalPage; i++) {
                //         if (i == currentPage) {
                //             pagination.append(`
                //         <li class="page-item active">
                //             <button class="page-link" onClick='changePage(${i})'>${i}</button>
                //         </li>`)
                //         } else {
                //             pagination.append(`
                //         <li class="page-item">
                //             <button class="page-link" onClick='changePage(${i})'>${i}</button>
                //         </li>`)
                //         }

                //     }
                // }

            });
        }
        function layDSTicketSearchNangCao(search, search2) {
            $.get(`http://localhost/Software-Technology/ticket/getListSearch?rowsPerPage=10&page=${currentPage}&search=${search}&search2=${search2}`, function(response) {
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
                    let noidi="";

                    let noiden="";
                    let s = 0;
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
                    let tt = ""
                    if(data.trang_thai==1) {
                        tt="Chưa bán";
                    } else if(data.trang_thai==2) {
                        tt="Đã bán";
                    } else if(data.trang_thai==3) {
                        tt="Đã hết hạn";
                    }
                    
                    if ($row % 2 == 0) {

                        table1.append(`
                        <tr class="table-light">
                            <td>${data.ma_chuyen_bay}</td>
                            <td>${data.ma_ve}</td>
                            <td>${data.ten}</td>
                            <td>${noidi}</td>
                            <td>${noiden}</td>
                            <td>${data.ngay_bay}</td>
                            <td>${tt}</td>
                            <td>
                                <button onclick="viewRow('${data.ma_ve}')" type="button" class="btn btn-sm btn-outline-primary" style="padding-top: 3px; padding-bottom: 4px;">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </td>
                        </tr>`);
                    } else {
                        table1.append(`
                        <tr class="table-info">
                            <td>${data.ma_chuyen_bay}</td>
                            <td>${data.ma_ve}</td>
                            <td>${data.ten}</td>
                            <td>${noidi}</td>
                            <td>${noiden}</td>
                            <td>${data.ngay_bay}</td>
                            <td>${tt}</td>
                            <td>
                                <button onclick="viewRow('${data.ma_ve}')" type="button" class="btn btn-sm btn-outline-primary" style="padding-top: 3px; padding-bottom: 4px;">
                                    <i class="bi bi-eye"></i>
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
                mav: params
            };
            
            $.post(`http://localhost/Software-Technology/ticket/viewTicket`, data, function(response) {
                if (response.thanhcong) {
                    $("#view-ve").val(response.ve);
                    $("#view-hangkhong").val(response.hangkhong);
                    $("#view-hieumaybay").val(response.maybay);
                    $("#view-chuyenbay").val(response.chuyenbay);
                    $("#view-ngaybay").val(response.ngaybay);
                    $("#view-noidi").val(response.noidi);
                    $("#view-noiden").val(response.noiden);
                    $("#view-giodi").val(response.giodi);
                    $("#view-gioden").val(response.gioden);
                    $("#view-hangdichvu").val(response.hangdichvu);
                    $("#view-soghe").val(response.soghe);
                    $("#view-giagoc").val(response.giagoc);
                    $("#view-tienthue").val(response.tienthue);
                }
            });
            $("#view-ticket-modal").modal('toggle');
        }

        function addRow(params) {
            let data = {
                macb: params
            };
            console.log(params);
            $.post(`http://localhost/Software-Technology/ticket/viewTicket1`, data, function(response) {
                if (response.thanhcong) {
                    $("#machuyenbay1").val(response.chuyenbay);
                    $("#tenhang1").val(response.tenhang);
                    $("#sohieumaybay1").val(response.sohieumaybay);
                    $("#ngaybay1").val(response.ngaybay);
                    $("#noidi1").val(response.noidi);
                    $("#noiden1").val(response.noiden);
                    $("#giobay1").val(response.giodi);
                    $("#gioden1").val(response.gioden);
                    $("#ghethuong").val(response.ghethuong);
                    $("#ghethuonggia").val(response.ghethuonggia);
                }
            });
            $("#add-ticket1-modal").modal('toggle');
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
                macb: params
            };

            $.post(`http://localhost/Software-Technology/ticket/viewTicket2`, data, function(response) {
                if (response.thanhcong) {
                    $("#re-machuyenbay1").val(response.chuyenbay);
                    $("#re-tenhang1").val(response.tenhang);
                    $("#re-sohieumaybay1").val(response.sohieumaybay);
                    $("#re-ngaybay1").val(response.ngaybay);
                    $("#re-noidi1").val(response.noidi);
                    $("#re-noiden1").val(response.noiden);
                    $("#re-giobay1").val(response.giodi);
                    $("#re-gioden1").val(response.gioden);
                    $("#re-ghethuong").val(response.ghethuong);
                    $("#re-ghethuonggia").val(response.ghethuonggia);
                    $("#re-giagocthuong").val(response.giagocthuong);
                    $("#re-giathuethuong").val(response.giathuethuong);
                    $("#re-giagocthuonggia").val(response.giagocthuonggia);
                    $("#re-giathuethuonggia").val(response.giathuethuonggia);
                }
            });
            
            $("#repair-ticket1-modal").modal('toggle');
            //Sua form
            $("form[name='repair-ticket1-form']").validate({
                rules: {
                    

                    
                    suamachuyenbay1: {
                        required: true,
                    },
                    suaghethuong: {
                        required: true,
                    },
                    suaghethuonggia: {
                        required: true,
                    },
                    suagiagocthuonggia: {
                        required: true,
                        number:true,
                        min:99999,
                    },
                    suagiathuethuonggia: {
                        required: true,
                        number: true,
                        min:999999,
                    },
                    suagiagocthuong: {
                        required: true,
                        number: true,
                        min:49999,

                    },
                    suagiathuethuong: {
                        required: true,
                        number: true,
                        min:699999,

                    },

                },
                messages: {
                    suagiagocthuonggia: {
                        required: "Vui lòng nhập giá gốc ghế thương gia",
                        number: "Giá gốc ghế thương gia phải là số",
                        min: "Giá gốc ghế thương gia giá phải lớn hơn 99,999 VND",
                    },
                    suagiathuethuonggia: {
                        required: "Vui lòng nhập giá thuế ghế thương gia",
                        number: "Giá thuế ghế thương gia phải là số",
                        min: "Giá thuế ghế thương gia giá phải lớn hơn 999,999 VND",
                    },
                    suagiagocthuong: {
                        required: "Vui lòng nhập giá gốc ghế thường",
                        number: "Giá gốc ghế thường phải là số",
                        min: "Giá gốc ghế thường giá phải lớn hơn 49,999 VND",
                    },
                    suagiathuethuong: {
                        required: "Vui lòng nhập giá thuế ghế thường",
                        email: "Giá thuế ghế thường phải là số",
                        min: "Giá thuế ghế thường giá phải lớn hơn 699,999 VND",
                    },
                },
                submitHandler: function(form, event) {
                    event.preventDefault();
                    $("#myModalLabel110").text("Quản Lý Vé Máy Bay");
                    $("#question-model").text("Bạn có chắc chắn muốn sửa giá vé cho chuyến bay này không");
                    $("#question-ticket-modal").modal('toggle');
                    $('#thuchien').off('click')
                    $("#thuchien").click(function() {
                        // lấy dữ liệu từ form
                        
                        const data = Object.fromEntries(new FormData(form).entries());
                        
                        $.post(`http://localhost/Software-Technology/ticket/update`, data, function(response) {
                            if (response.thanhcong) {
                                currentPage = 1;
                                layDSTicketAjax();
                                layDSTicketAjax2();
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
                            $("#repair-ticket1-modal").modal('toggle')
                        });
                    });
                }
            })
        }

        // function deleteRow(params) {
        //     let data = {
        //         makh: params
        //     };
        //     $("#myModalLabel110").text("Quản Lý Vé Máy Bay");
        //     $("#question-model").text("Bạn có chắc chắn muốn xóa vé máy bay này không");
        //     $("#question-ticket-modal").modal('toggle');
        //     $('#thuchien').off('click');
        //     $("#thuchien").click(function() {
        //         $.post(`http://localhost/Software-Technology/ticket/delete`, data, function(response) {
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
        //                 layDSTicketAjax();
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

        // $("#btn-delete-ticket").click(function() {
        //     $("#myModalLabel110").text("Quản Lý Vé Máy Bay");
        //     $("#question-model").text("Bạn có chắc chắn muốn xóa những vé máy bay này không");
        //     $("#question-ticket-modal").modal('toggle');
        //     $('#thuchien').off('click')
        //     $("#thuchien").click(function() {
        //         let datas = []
        //         checkedRows.forEach(checkedRow => {
        //             if ($('#' + checkedRow).prop("checked")) {
        //                 datas.push(checkedRow);
        //             }
        //         });
        //         let data = {
        //             makh: JSON.stringify(datas)
        //         };
        //         $.post(`http://localhost/Software-Technology/ticket/deletes`, data, function(response) {
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
        //                 layDSTicketAjax();
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
