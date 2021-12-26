<?php

use App\Core\View;

View::$activeItem = 'airport';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title></title>

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="<?= View::assets('css/bootstrap.css') ?>" />
    <link rel="stylesheet" href="<?= View::assets('js/toastify.css') ?>" />
    <link rel="stylesheet" href="<?= View::assets('css/app.css') ?>" />
    <link rel="shortcut icon" href="<?= View::assets('images/favicon.ico') ?>" type="image/x-icon" />
    <link rel="stylesheet" href="<?= View::assets('css/quan.css') ?>" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
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
                        <div id="search-airport-form" name="search-airport-form">
                            <div class="form-group position-relative has-icon-right">
                                <input id="search-airport-text" type="text" class="form-control shadow-none" placeholder="Tìm kiếm" value="">
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
                                    <h3>Danh sách sân bay</h3>
                                </label>
                                <label>
                                    <h5 style="margin-left: 50px; margin-right: 10px;"> Lọc Theo:</h5>
                                </label>
                                <select class="btn btn btn-primary shadow-none" name="search-cbb" id="cars-search">
                                    <option value="">Tất Cả</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-5 order-md-2 order-first">
                                <div class=" loat-start float-lg-end mb-3">
                                    <button id='btn-delete-airport' class="btn btn-danger shadow-none">
                                        <i class="bi bi-trash-fill"></i> Xóa sân bay
                                    </button>
                                    <button id='btn-open-add-airport' class="btn btn-primary shadow-none" data-toggle="modal" data-target="#add-airport-modal">
                                        <i class="bi bi-plus"></i> Thêm sân bay
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
                                                <th>Mã sân bay</th>
                                                <th>Tên sân bay</th>
                                                <th>Địa điểm</th>
                                                <th>Loại</th>
                                                <th>Sức chứa</th>
                                                <th>Số lượng dự bị</th>
                                            </tr>
                                        </thead>
                                        <tbody id="table-airport">
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
                <div class="modal fade text-left" id="add-airport-modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Thêm thông tin sân bay</h4>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form name="add-airport-form">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="id">Mã sân bay: </label>
                                            <div class="name">
                                                <input type="text" id="id" name="id" placeholder="Mã sân bay" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="fullname">Tên sân bay: </label>
                                            <input type="text" id="name" name="name" placeholder="Tên sân bay" class="form-control">
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="province">TP/Tỉnh: </label>
                                                    <select class="form-control shadow-none" id="tinh">
                                                        <option value="-1"> Chọn TP/Tỉnh</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="province">Quận/Huyện: </label>
                                                    <select class="form-control shadow-none" id="huyen">
                                                        <option value="-1"> Chọn Quận/Huyện</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="province">Phường/Xã: </label>
                                                    <select class="form-control shadow-none" id="xa">
                                                        <option value="-1"> Chọn Phường/Xã</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="fullname">Tên đường: </label>
                                            <input type="text" id="stress" name="stress" placeholder="Tên đường" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="fullname">Loại máy bay: </label>
                                            <div class="radio-type row">
                                                <div class="col-6">
                                                    <input type="radio" id="Type-1" name="type" value="Ký kết hợp đồng" checked=true /> Ký kết hợp đồng
                                                </div>
                                                <div class="col-6">
                                                    <input type="radio" id="Type-1" name="type" value="Tập đoàn xây dựng" /> Tập đoàn xây dựng
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="fullname">Số lượng máy bay tối đa (sức chứa): </label>
                                            <input type="text" id="max_num" name="max_num" placeholder="Sức chứa" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="fullname">Số lượng khoảng trống dự bị: </label>
                                            <input type="text" id="reserve_num" name="reserve_num" placeholder="Số lượng khoảng trống" class="form-control">
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Đóng</span>
                                </button>
                                <button type="button" class="btn btn-primary ml-1 shadow-none" id="btn-add-airport">
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Thêm</span>
                                </button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= View::assets('js/bootstrap.min.js') ?>"></script>
    <script src="<?= View::assets('js/main.js') ?>"></script>
    <script src="<?= View::assets('js/menu.js') ?>"></script>
    <script src="<?= View::assets('js/api.js') ?>"></script>
    <script src="<?= View::assets('js/jquery.min.js') ?>"></script>
    <script src="<?= View::assets('js/jquery.validate.js') ?>"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
</body>
<script>
    $(document).ready(function() {
        $('#btn-open-add-airport').click(function() {
            $('#add-airport-modal').modal('show')
        })
        getList();
        getAddress();
        $('#btn-add-airport').click(function() {
            addAirport();
        })
    })

    function getList() {
        $.ajax({
            url: 'http://localhost/Software-Technology/Airport/getList',
            data: {
                page: 1,
                rowPerPage: 10,
            }
        }).done(function(data) {
            $('#table-airport').empty();
            var row = 1;
            data.forEach(function(element) {
                var code = '<tr class="table-primary">\
                            <td>' + element['ma_san_bay'] + '</td>\
                            <td>' + element['ten'] + '</td>\
                            <td>' + element['dia_diem'] + '</td>\
                            <td>' + element['loai_san_bay'] + '</td>\
                            <td>' + element['so_luong_may_bay_toi_da'] + '</td>\
                            <td>' + element['so_luong_may_bay_du_bi'] + '</td>\
                            </tr>'
                if (row % 2) {
                    code = '<tr class="table-light">\
                            <td>' + element['ma_san_bay'] + '</td>\
                            <td>' + element['ten'] + '</td>\
                            <td>' + element['dia_diem'] + '</td>\
                            <td>' + element['loai_san_bay'] + '</td>\
                            <td>' + element['so_luong_may_bay_toi_da'] + '</td>\
                            <td>' + element['so_luong_may_bay_du_bi'] + '</td>\
                            </tr>'
                }
                row++;
                $('#table-airport').append(code)
            })
        })
    }
    /**@function
     * Hàm format địa chỉ (cắt chuỗi)
     * @param: 
     * - address: chuỗi địa chỉ
     * - index: vị trí cắt chuỗi
     */
    function formatAddress(index, address) {
        address.toString();
        return address.slice(index, address.length);
    }
    /**@function
     * Hàm chuẩn hóa
     */
    function formatString(str) {
        return str.trim();
    }

    function getAddress() {
        $.ajax({
            url: 'https://provinces.open-api.vn/api/?depth=3',
        }).done(function(data) {
            data.forEach(function(element, index) {
                if (element["division_type"] == 'tỉnh')
                    $('#tinh').append('<option class="tinh" value="' + index + '">' + formatAddress(5, element['name']) + '</option>');
                else $('#tinh').append('<option class="tinh" value="' + index + '">' + formatAddress(9, element['name']) + '</option>');
            })
            $('#tinh').change(function() {
                $('#huyen').empty();
                $('#huyen').append('<option value="-1"> Chọn Quận/Huyện</option>')
                $('#xa').empty();
                $('#xa').append('<option value="-1"> Chọn Phường/Xã </option>')
                var districs = data[$('#tinh').val()]['districts'];
                districs.forEach(function(element, index) {
                    $('#huyen').append('<option class="huyen" value="' + index + '">' + element['name'] + '</option>')
                })
                $('#huyen').change(function() {
                    $('#xa').empty();
                    $('#xa').append('<option value="-1"> Chọn Phường/Xã </option>')
                    var wards = districs[$('#huyen').val()]['wards'];
                    wards.forEach(function(element, index) {
                        $('#xa').append('<option  class="xa" value="' + index + '">' + element['name'] + '</option>')
                    })
                })
            })
        })
    }

    function addAirport() {
        var name = formatString($('#name').val());
        var id = formatString($('#id').val());
        var tinh = formatString($('.tinh:selected').text());
        var huyen = formatString($('.huyen:selected').text());
        var xa = formatString($('.xa:selected').text());
        var duong = formatString($('#stress').val());
        var loai = formatString($('#Type-1').val());
        var max_number = formatString($('#max_num').val());
        var reserve_number = formatString($('#reserve_num').val());
        if (name == '' || id == '' || tinh == '' || huyen == '' || xa == '' || duong == '' || loai == '' || max_number == '' || reserve_number == '') {
            Toastify({
                text: "Dữ liệu không hợp lệ",
                duration: 1000,
                close: true,
                gravity: "top",
                position: "center",
                style: {
                    background: "#FF6633"
                }
            }).showToast();
        } else $.ajax({
            url: 'http://localhost/Software-Technology/Airport/create',
            data: {
                id_ : id,
                name_: name,
                diadiem_: tinh,
                loai_: loai,
                max_number_: max_number,
                reserve_number_: reserve_number
            }
        }).done(function(data) {
            alert(data['thanhcong']);
            if (data['thanhcong']) {
                alert("OK");
                Toastify({
                    text: "Thêm thành công",
                    duration: 1000,
                    close: true,
                    gravity: "top",
                    position: "center",
                    style: {
                        background: "#339900"
                    }
                })
            }    else {
                if (data['error'] == -1) {
                    Toastify({
                        text: "Mã sân bay đã tồn tại",
                        duration: 1000,
                        close: true,
                        gravity: "top",
                        position: "center",
                        style: {
                            background: "#339900"
                        }
                    })
                }
            }
        })
    }
</script>