<?php

use App\Core\View;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Mazer Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= View::assets('css/bootstrap.css') ?>">
    <link rel="stylesheet" href="<?= View::assets('vendors/toastify/toastify.css') ?>" />
    <link rel="stylesheet" href="<?= View::assets('vendors/bootstrap-icons/bootstrap-icons.css') ?>">
    <link rel="stylesheet" href="<?= View::assets('css/app.css') ?>">
    <link rel="stylesheet" href="<?= View::assets('css/pages/auth.css') ?>">
    <link rel="shortcut icon" href="<?= View::assets('images/favicon.ico') ?>" type="image/x-icon')" />
</head>

<body>
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-4 offset-lg-4 col-12" >
                <div id="auth-left">
                    <h1 class="auth-title">Đăng ký</h1>
                    <p class="auth-subtitle mb-2">Nhập thông tin của bạn để tiến hành đăng ký.</p>

                    <form name="register-form" action="/" method="POST">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" id="email" name="email" class="form-control form-control-xl" placeholder="Email">
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" id="fullname" name="fullname" class="form-control form-control-xl" placeholder="Họ và tên">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input id="password" type="password" name="password" class="form-control form-control-xl" placeholder="Mật khẩu">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" id="confirm-password" name="confirm-password" class="form-control form-control-xl" placeholder="Nhập lại mật khẩu">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Đăng ký</button>
                    </form>
                    <div class="text-center mt-2 text-lg fs-5">
                        <p class='text-gray-600'>Bạn đã có tài khoản?
                            <a href="<?= View::url('auth/login') ?>" class="font-bold">Đăng nhập</a>.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">
                </div>
            </div>
        </div>
    </div>
    <script src="<?= View::assets('vendors/toastify/toastify.js') ?>"></script>
    <script src="<?= View::assets('vendors/jquery/jquery.min.js') ?>"></script>
    <script src="<?= View::assets('vendors/jquery/jquery.validate.js') ?>"></script>
    <script>
        $(function() {
            $("form[name='register-form']").validate({
                rules: {
                    email: {
                        required: true,
                        email: true,
                        remote: {
                            url: "http://localhost/Software-Technology/account/checkValidEmailRegister",
                            type: "POST",
                        }
                    },
                    fullname: 'required',
                    password: {
                        required: true,
                        minlength: 8
                    },
                    'confirm-password': {
                        required: true,
                        minlength: 8,
                        equalTo: "#password",
                    }
                },
                messages: {
                    email: {
                        required: "Vui lòng nhập địa chỉ email",
                        email: "Định dạng email không hợp lệ",
                    },
                    fullname: "Vui lòng nhập họ tên",
                    password: {
                        required: "Vui lòng nhập mật khẩu",
                        minlength: "Mật khẩu của bạn không được ngắn hơn 8 ký tự",
                    },
                    'confirm-password': {
                        required: "Vui lòng nhập mật khẩu",
                        minlength: "Mật khẩu của bạn không được ngắn hơn 8 ký tự",
                        equalTo: "Mật khẩu không khớp",
                    },
                },
                submitHandler: function(form, event) {
                    event.preventDefault();
                    // lấy dữ liệu từ form
                    const data = Object.fromEntries(new FormData(form).entries());
                    console.log(data);

                    $.post(`http://localhost/Software-Technology/account/register`, data, function(response) {
                        if (response.thanhcong) {
                            Toastify({
                                text: "Đăng ký thành công",
                                duration: 1000,
                                close: true,
                                gravity: "top",
                                position: "center",
                                backgroundColor: "#4fbe87",
                            }).showToast();
                        } else {
                            Toastify({
                                text: "Đăng ký thất bại",
                                duration: 1000,
                                close: true,
                                gravity: "top",
                                position: "center",
                                backgroundColor: "#FF6A6A",
                            }).showToast();
                        }
                    });
                    $('#email').val("");
                    $('#password').val("");
                    $('#confirm-password').val("");
                    $('#fullname').val("");
                }
            });
        });
    </script>
</body>

</html>