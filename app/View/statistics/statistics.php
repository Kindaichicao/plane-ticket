<?php

use App\Core\View;

View::$activeItem = 'statistics';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Web Học Tập</title>

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap"
        rel="stylesheet" />
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
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-7 order-md-1 order-last">
                                <label>
                                    <h3>Thống kê doanh thu</h3>
                                </label>
                            </div>
                            <div class="col-12 col-md-5 order-md-2 order-first">
                                <div class=" loat-start float-lg-end mb-3">
                                    <select class="btn btn btn-primary" name="search-cbb" id="time"
                                        onchange="timeAjax()">
                                        <option value="ngay">Thống kê theo ngày</option>
                                        <option value="thang">Thống kê theo tháng</option>
                                        <option value="quy">Thống kê theo quý</option>
                                        <option value="nam">Thống kê theo năm</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row" id='view-time'>
                            <div class="col-12 col-md-5">
                                <div class="form-group row align-items-center">
                                    <div class="col-lg-4 col-4">
                                        <label class="col-form-label">
                                            <h6>Ngày bắt đầu</h6>
                                        </label>
                                    </div>
                                    <div class="col-lg-8 col-8">
                                        <input type="date" class="form-control" id="view-ngaybd" name="ngaybd"
                                            onchange="checkdate()">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-5">
                                <div class="form-group row align-items-center">
                                    <div class="col-lg-4 col-4">
                                        <label class="col-form-label">
                                            <h6>Ngày kết thúc</h6>
                                        </label>
                                    </div>
                                    <div class="col-lg-8 col-8">
                                        <input type="date" class="form-control" id="view-ngaykt" name="ngaykt"
                                            onchange="checkdate()">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><br>
                    <section class="section">
                        <div class="card">
                            <div class="card-header">
                                <h4>Doanh thu theo thời gian</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-profile-visit"></div>
                            </div>
                        </div>
                    </section>
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
    <script src="<?= View::assets('vendors/apexcharts/apexcharts.js') ?>"></script>
    <script src="<?= View::assets('js/changepass.js') ?>"></script>
    <script src="<?= View::assets('js/menu.js') ?>"></script>
    <script src="<?= View::assets('js/api.js') ?>"></script>
    <script>
    let cates = [];
    let datas = [];

    Date.prototype.toDateInputValue = (function() {
        var local = new Date(this);
        local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
        return local.toJSON().slice(0, 10);
    });

    $(function() {
        $('#view-ngaybd').val(new Date().toDateInputValue());
        $('#view-ngaykt').val(new Date().toDateInputValue());
        cates.push($('#view-ngaykt').val());
        datas.push(Math.floor(Math.random() * 30) + 20);
        run();
    });

    function checkdate() {
        if ($('#view-ngaykt').val() > (new Date().toDateInputValue())) {
            alert("Ngày kết thúc không được lớn hơn ngày hiện tại");
            $('#view-ngaykt').val(new Date().toDateInputValue());
        } else if ($('#view-ngaybd').val() > $('#view-ngaykt').val()) {
            alert("Ngày bắt đầu không được lớn hơn ngày kết thúc");
            $('#view-ngaybd').val($('#view-ngaykt').val());
            $('#view-ngaybd').focus();
        } else {
            cates = [];
            datas = [];
            var temp = $('#view-ngaybd').val();
            while (temp <= $('#view-ngaykt').val()) {
                cates.push(temp);
                datas.push(Math.floor(Math.random() * 30) + 20);
                var d = temp.substr(8, 2);
                var m = temp.substr(5, 2);
                var y = temp.substr(0, 4);

                if (m == "02" && d == "28") {
                    m = "03";
                    d = "01";
                } else if (d == "31" && m == "12") {
                    d = "01";
                    m = "01";
                    y = (Number(y) + 1).toString();
                } else if (d == "31") {
                    d = "01";
                    var x = Number(m) + 1;
                    if (x < 10) m = "0" + x.toString();
                    else m = x.toString();
                } else {
                    var x = Number(d) + 1;
                    if (x < 10) d = "0" + x.toString();
                    else d = x.toString();
                }
                temp = y + "-" + m + "-" + d;
            }
            run();
        }
    }

    function checkmonth() {
        if ($('#thangkt').val() > (new Date().toDateInputValue().substr(0, 7))) {
            alert("Tháng kết thúc không được lớn hơn tháng hiện tại");
            $('#thangkt').val(new Date().toDateInputValue().substr(0, 7));
        } else if ($('#thangbd').val() > $('#thangkt').val()) {
            alert("Tháng bắt đầu không được lớn hơn tháng kết thúc");
            $('#thangbd').focus();
            $('#thangbd').val($('#thangkt').val());
        } else {
            cates = [];
            datas = [];
            var temp = $('#thangbd').val();
            while (temp <= $('#thangkt').val()) {
                cates.push(temp);
                datas.push(Math.floor(Math.random() * 200) + 100);
                var m = temp.substr(5, 2);
                var y = temp.substr(0, 4);
                if (m == "12") {
                    m = "01";
                    y = (Number(y) + 1).toString();
                } else {
                    var x = Number(m) + 1;
                    if (x < 10) m = "0" + x.toString();
                    else m = x.toString();
                }
                temp = y + "-" + m;
            }
            run();
        }
    }

    function checkquar() {
        if ($('#quybd').val() > $('#quykt').val()) {
            alert("Quý bắt đầu không được lớn hơn quý kết thúc");
            $('#quybd').focus();
            $('#quybd').val($('#quykt').val());
        } else {
            cates = [];
            datas = [];
            var temp = $('#quybd').val();
            while (temp <= $('#quykt').val()) {
                cates.push(temp);
                datas.push(Math.floor(Math.random() * 300) + 500);
                var m = temp.substr(5, 2);
                var y = temp.substr(0, 4);
                if (m == "04") {
                    m = "01";
                    y = (Number(y) + 1).toString();
                } else {
                    var x = Number(m) + 1;
                    m = "0" + x.toString();
                }
                temp = y + "-" + m;
            }
            run();
        }
    }

    function checkyear() {
        if ($('#yearbd').val() > $('#yearkt').val()) {
            alert("Tháng bắt đầu không được lớn hơn tháng kết thúc");
            $('#yearbd').focus();
            $('#yearbd').val($('#yearkt').val());
        } else {
            cates = [];
            datas = [];
            var temp = $('#yearbd').val();
            while (temp <= $('#yearkt').val()) {
                cates.push(temp);
                datas.push(Math.floor(Math.random() * 300) + 500);
                temp = (Number(temp) + 1).toString();
            }
            run();
        }
    }

    function timeAjax() {
        let search = $('#time option').filter(':selected').val();
        if (search == "ngay") {
            $('#view-time').empty();
            $('#view-time').append(`<div class="col-12 col-md-5">
                                <div class="form-group row align-items-center">
                                    <div class="col-lg-4 col-4">
                                        <label class="col-form-label">
                                            <h6>Ngày bắt đầu</h6>
                                        </label>
                                    </div>
                                    <div class="col-lg-8 col-8">
                                        <input type="date" class="form-control" id="view-ngaybd" name="ngaybd"
                                            onchange="checkdate()">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-5">
                                <div class="form-group row align-items-center">
                                    <div class="col-lg-4 col-4">
                                        <label class="col-form-label">
                                            <h6>Ngày kết thúc</h6>
                                        </label>
                                    </div>
                                    <div class="col-lg-8 col-8">
                                        <input type="date" class="form-control" id="view-ngaykt" name="ngaykt"
                                            onchange="checkdate()">
                                    </div>
                                </div>
                            </div>`);
            $('#view-ngaybd').val(new Date().toDateInputValue());
            $('#view-ngaykt').val(new Date().toDateInputValue());
            cates = [];
            datas = [];
            cates.push($('#view-ngaybd').val());
            datas.push(Math.floor(Math.random() * 200) + 100);
            run();

        } else if (search == "thang") {
            $('#view-time').empty();
            $('#view-time').append(`<div class="col-12 col-md-5">
                                <div class="form-group row align-items-center">
                                    <div class="col-lg-4 col-4">
                                        <label class="col-form-label">
                                            <h6>Tháng bắt đầu</h6>
                                        </label>
                                    </div>
                                    <div class="col-lg-8 col-8">
                                        <input type="month" class="form-control" id="thangbd" name="thangbd"
                                            onchange="checkmonth()">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-5">
                                <div class="form-group row align-items-center">
                                    <div class="col-lg-4 col-4">
                                        <label class="col-form-label">
                                            <h6>Tháng kết thúc</h6>
                                        </label>
                                    </div>
                                    <div class="col-lg-8 col-8">
                                        <input type="month" class="form-control" id="thangkt" name="thangkt"
                                            onchange="checkmonth()">
                                    </div>
                                </div>
                            </div>`);
            $('#thangbd').val(new Date().toDateInputValue().substr(0, 7));
            $('#thangkt').val(new Date().toDateInputValue().substr(0, 7));
            cates = [];
            datas = [];
            cates.push($('#thangbd').val());
            datas.push(Math.floor(Math.random() * 200) + 100);
            run();

        } else if (search == "quy") {
            $('#view-time').empty();
            $('#view-time').append(`<div class="col-12 col-md-4">
                                <div class="form-group row align-items-center">
                                    <div class="col-lg-5 col-6">
                                        <label class="col-form-label">
                                            <h6>Quý bắt đầu</h6>
                                        </label>
                                    </div>
                                    <div class="col-lg-5 col-6">
                                    <select class="form-select" id="quybd" onchange="checkquar()">
                                        <option value="2021-04">04/2021</option>
                                        <option value="2021-03">03/2021</option>
                                        <option value="2021-02">02/2021</option>
                                        <option value="2021-01">01/2021</option>
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group row align-items-center">
                                    <div class="col-lg-5 col-6">
                                        <label class="col-form-label">
                                            <h6>Quý kết thúc</h6>
                                        </label>
                                    </div>
                                    <div class="col-lg-5 col-6">
                                    <select class="form-select" id="quykt" onchange="checkquar()">
                                        <option value="2021-04">04/2021</option>
                                        <option value="2021-03">03/2021</option>
                                        <option value="2021-02">02/2021</option>
                                        <option value="2021-01">01/2021</option>
                                    </select>
                                    </div>
                                </div>
                            </div>`);
            cates = [];
            datas = [];
            cates.push($('#quybd').val());
            datas.push(Math.floor(Math.random() * 300) + 500);
            run();
        } else if (search == "nam") {
            $('#view-time').empty();
            $('#view-time').append(`<div class="col-12 col-md-4">
                                <div class="form-group row align-items-center">
                                    <div class="col-lg-5 col-6">
                                        <label class="col-form-label">
                                            <h6>Năm bắt đầu</h6>
                                        </label>
                                    </div>
                                    <div class="col-lg-5 col-6">
                                    <select class="form-select" id="yearbd" onchange="checkyear()">
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group row align-items-center">
                                    <div class="col-lg-5 col-6">
                                        <label class="col-form-label">
                                            <h6>Năm kết thúc</h6>
                                        </label>
                                    </div>
                                    <div class="col-lg-5 col-6">
                                    <select class="form-select" id="yearkt" onchange="checkyear()">
                                    </select>
                                    </div>
                                </div>
                            </div>`);
            for (var i = 2021; i > 2000; i--) {
                $('#yearbd').append(` 
                                    <option value="${i}">${i}</option>`);
                $('#yearkt').append(` 
                                    <option value="${i}">${i}</option>`);
            }
            cates = [];
            datas = [];
            cates.push($('#yearbd').val());
            datas.push(Math.floor(Math.random() * 500) + 1000);
            run();
        }
    }

    function run() {
        $("#chart-profile-visit").empty();

        var optionsProfileVisit = {
            annotations: {
                position: "back",
            },
            dataLabels: {
                enabled: false,
            },
            chart: {
                type: "bar",
                height: 300,
            },
            fill: {
                opacity: 1,
            },
            plotOptions: {},
            series: [{
                name: "Doanh thu (tỷ đồng)",
                data: datas,
            }, ],
            colors: "#435ebe",
            xaxis: {
                categories: cates,
            },
        };

        var chartProfileVisit = new ApexCharts(
            document.querySelector("#chart-profile-visit"),
            optionsProfileVisit
        );

        chartProfileVisit.render();
    }
    </script>
</body>