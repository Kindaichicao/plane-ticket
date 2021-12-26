<?php

use App\Core\View;

View::$activeItem = 'plane';

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
                    <div class="col-sm-6">
                        <h6>Tìm Kiếm</h6>
                        <div id="search-plane-form" name="search-plane-form">
                            <div class="form-group position-relative has-icon-right">
                                <input id="search-plane-text" type="text" class="form-control" placeholder="Tìm kiếm"
                                    value="">
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
                                    <h3>Danh sách máy bay</h3>
                                </label>
                                <label>
                                    <h5 style="margin-left: 50px; margin-right: 10px;"> Lọc Theo:</h5>
                                </label>
                                <select class="btn btn btn-primary" name="search-cbb" id="cars-search">
                                    <option value="">Tất Cả</option>
                                    <option value="so_hieu">Số hiệu máy bay</option>
                                    <option value="hang">Hãng hàng không</option>
                                    <option value="ghe_thuong">Số ghế thường</option>
                                    <option value="thuong_gia">Số ghế thương gia</option>
                                    <option value="tong_ghe">Tổng số ghế</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-5 order-md-2 order-first">
                                <div class=" loat-start float-lg-end mb-3">
                                    <button id='btn-delete-plane' class="btn btn-danger">
                                        <i class="bi bi-trash-fill"></i> Xóa máy bay
                                    </button>
                                    <button id='open-add-plane-btn' class="btn btn-primary">
                                        <i class="bi bi-plus"></i> Thêm máy bay
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
                                                <th>Số hiệu máy bay</th>
                                                <th>Hãng hàng không</th>
                                                <th>Số ghế thường</th>
                                                <th>Số ghế thương gia</th>
                                                <th>Tổng số ghế</th>
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
                <div class="modal fade text-left" id="add-plane-modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Thêm máy bay</h4>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form name="add-plane-form" action="/" method="POST">
                                    <div class="modal-body">
                                        <label for="sohieu">Số hiệu máy Bay:</label>
                                        <div class="form-group">
                                            <input type="text" id="sohieu" name="sohieu" placeholder="Số hiệu máy bay"
                                                class="form-control">
                                        </div>
                                        <label for="cars-hang">Hãng hàng không: </label><br>
                                        <fieldset class="form-group">
                                            <select class="form-select" name="hang" id="cars-hang"
                                                style="margin-right: 15px;">
                                            </select>
                                        </fieldset>
                                        <label for="ghethuong">Số ghế thường:</label>
                                        <div class="form-group">
                                            <input type="text" id="ghethuong" name="ghethuong"
                                                placeholder="Số ghế thường" class="form-control">
                                        </div>
                                        <label for="thuonggia">Số ghế thương gia:</label>
                                        <div class="form-group">
                                            <input type="text" id="thuonggia" name="thuonggia"
                                                placeholder="Số ghế thương gia" class="form-control">
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

                <!-- MODAL UPDATE -->
                <div class="modal fade text-left" id="update-plane-modal" tabindex="-1" role="dialog"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Sửa thông tin máy bay</h4>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form name="update-plane-form" action="/" method="POST">
                                    <div class="modal-body">
                                        <label for="upsohieu">Số hiệu máy Bay:</label>
                                        <div class="form-group">
                                            <input type="text" id="upsohieu" name="upsohieu" class="form-control"
                                                disabled>
                                        </div>
                                        <label for="up-cars-hang">Hãng hàng không: </label><br>
                                        <fieldset class="form-group">
                                            <select class="form-select" name="re-cars-hang" id="re-cars-hang"
                                                style="margin-right: 15px;">
                                            </select>
                                        </fieldset>
                                        <label for="ghethuong">Số ghế thường:</label>
                                        <div class="form-group">
                                            <input type="text" id="upghethuong" name="upghethuong" class="form-control">
                                        </div>
                                        <label for="thuonggia">Số ghế thương gia:</label>
                                        <div class="form-group">
                                            <input type="text" id="upthuonggia" name="upthuonggia" class="form-control">
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
                                    <span class="d-none d-sm-block">Sửa</span>
                                </button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Modal Thong bao -->
                <div class="modal fade text-left" id="question-plane-modal" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel110" aria-hidden="true">
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
    let currentPage = 1;
    let checkedRows = [];

    $(function() {
        layDSMayBayAjax();

        $.post(`http://localhost/Software-Technology/plane/getNameAirlines`, function(response) {
            if (response.thanhcong) {
                hang = response.data;
                hang.forEach(data => {
                    let opt = '<option value="' + data.ma_hang_hang_khong + '">' + data.ten +
                        '</option>';
                    $("#cars-hang").append(opt);
                    $("#re-cars-hang").append(opt);
                });
            }

        });

        $("form[name='add-plane-form']").validate({
            rules: {
                sohieu: {
                    required: true,
                    remote: {
                        url: "http://localhost/Software-Technology/plane/checkValidPlane",
                        type: "POST",
                    }
                },
                ghethuong: {
                    required: true,
                },
                thuonggia: {
                    required: true,
                },
            },
            messages: {
                sohieu: {
                    required: "Vui lòng nhập số hiệu máy bay",
                },
                ghethuong: {
                    required: "Vui lòng nhập số lượng ghế thường",
                },
                thuonggia: {
                    required: "Vui lòng nhập số lượng ghế thương gia",
                },
            },
            submitHandler: function(form, event) {
                event.preventDefault();
                // lấy dữ liệu từ form
                const data = Object.fromEntries(new FormData(form).entries());
                console.log(data);
                $.post(`http://localhost/Software-Technology/plane/create`, data, function(
                    response) {
                    $("#add-plane-modal").modal('toggle')
                    if (response.thanhcong) {
                        currentPage = 1;
                        layDSMayBayAjax();
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
                });
                $('#sohieu').val("");
                $('#ghethuong').val("");
                $('#thuonggia').val("");
            }
        })
    });

    $("#open-add-plane-btn").click(function() {
        $("#add-plane-modal").modal('toggle')
    });

    function changePage(newPage) {
        currentPage = newPage;
        layDSMayBayAjax();
    }

    $('#cars-search').change(function() {
        currentPage = 1;
        layDSMayBayAjax();
    });

    $("#search-plane-form").keyup(debounce(function() {
        currentPage = 1;
        layDSMayBayAjax();
    }, 200));

    function layDSMayBayAjax() {
        let search = $('#cars-search option').filter(':selected').val();
        console.log('/' + search + "/");
        $.get(`http://localhost/Software-Technology/plane/getPlane?rowsPerPage=10&page=${currentPage}&search=${$("#search-plane-text").val()}&search2=${search}`,
            function(response) {
                const table1 = $('#table1 > tbody');
                table1.empty();
                checkedRows = [];
                $row = 0;
                response.data.forEach(data => {
                    if ($row % 2 == 0) {

                        table1.append(`
                        <tr class="table-light">
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="form-check-input form-check-success form-check-glow" id="${data.so_hieu_may_bay}">
                                </div>
                            </td>
                            <td>${data.so_hieu_may_bay}</td>
                            <td>${data.ten}</td>
                            <td>${data.so_ghe_thuong}</td>
                            <td>${data.so_ghe_thuong_gia}</td>
                            <td>${data.tong_so_ghe}</td>
                            <td>
                                <button onclick="repairRow('${data.so_hieu_may_bay}')" type="button" class="btn btn-sm btn-outline-success" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-tools"></i>
                                </button>
                                <button onclick="deleteRow('${data.so_hieu_may_bay}')" type="button" class="btn btn-sm btn-outline-danger" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </td>
                        </tr>`);
                    } else {
                        table1.append(`
                        <tr class="table-info">
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="form-check-input form-check-success form-check-glow" id="${data.so_hieu_may_bay}">
                                </div>
                            </td>
                            <td>${data.so_hieu_may_bay}</td>
                            <td>${data.ten}</td>
                            <td>${data.so_ghe_thuong}</td>
                            <td>${data.so_ghe_thuong_gia}</td>
                            <td>${data.tong_so_ghe}</td>
                            <td>
                                <button onclick="repairRow('${data.so_hieu_may_bay}')" type="button" class="btn btn-sm btn-outline-success" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-tools"></i>
                                </button>
                                <button onclick="deleteRow('${data.so_hieu_may_bay}')" type="button" class="btn btn-sm btn-outline-danger" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </td>
                        </tr>`);
                    }
                    checkedRows.push(data.so_hieu_may_bay);
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

    function repairRow(params) {
        let data = {
            sohieu: params
        };

        $.post(`http://localhost/Software-Technology/plane/findOneBySoHieu`, data, function(response) {
            if (response.thanhcong) {
                $('#upsohieu').val(response.so_hieu_may_bay);
                $("#re-cars-hang").val(response.ma_hang_hang_khong).prop('selected', true);
                $("#upghethuong").val(response.so_ghe_thuong);
                $("#upthuonggia").val(response.so_ghe_thuong_gia);
            }
        });
        $("#update-plane-modal").modal('toggle');
        //Sua form
        $("form[name='update-plane-form']").validate({
            rules: {
                ghethuong: {
                    required: true,
                },
                thuonggia: {
                    required: true,
                },
            },
            messages: {
                ghethuong: {
                    required: "Vui lòng nhập số lượng ghế thường",
                },
                thuonggia: {
                    required: "Vui lòng nhập số lượng ghế thương gia",
                },
            },
            submitHandler: function(form, event) {
                event.preventDefault();
                $("#myModalLabel110").text("Sửa máy bay");
                $("#question-model").text("Bạn có chắc chắn muốn sửa máy bay này không");
                $("#question-plane-modal").modal('toggle');
                $('#thuchien').off('click')
                $("#thuchien").click(function() {
                    // lấy dữ liệu từ form

                    const data = Object.fromEntries(new FormData(form).entries());
                    data['upsohieu'] = $('#upsohieu').val();
                    $.post(`http://localhost/Software-Technology/plane/update`, data, function(
                        response) {
                        $("#update-plane-modal").modal('toggle')
                        if (response.thanhcong) {
                            currentPage = 1;
                            layDSMayBayAjax();
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
                    });
                });
            }
        });
    }

    function deleteRow(params) {
        let data = {
            sohieu: params
        };
        $("#myModalLabel110").text("Xóa máy bay");
        $("#question-model").text("Bạn có chắc chắn muốn xóa máy bay này không");
        $("#question-plane-modal").modal('toggle');
        $('#thuchien').off('click');
        $("#thuchien").click(function() {
            $.post(`http://localhost/Software-Technology/plane/delete`, data, function(response) {
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
                    layDSMayBayAjax();
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

    $("#btn-delete-plane").click(function() {
        $("#myModalLabel110").text("Xóa máy bay");
        $("#question-model").text("Bạn có chắc chắn muốn xóa những máy bay này không?");
        $("#question-plane-modal").modal('toggle');
        $('#thuchien').off('click')
        $("#thuchien").click(function() {
            let datas = []
            checkedRows.forEach(checkedRow => {
                if ($('#' + checkedRow).prop("checked")) {
                    datas.push(checkedRow);
                }
            });
            let data = {
                sohieus: JSON.stringify(datas)
            };
            $.post(`http://localhost/Software-Technology/plane/deletes`, data, function(response) {
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
                    layDSMayBayAjax();
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