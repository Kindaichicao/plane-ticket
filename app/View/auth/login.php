<?php

use App\Core\Session;
use App\Core\View;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= View::assets('css/bootstrap.css') ?>">
    <link rel="stylesheet" href="<?= View::assets('vendors/bootstrap-icons/bootstrap-icons.css') ?>">
    <link rel="stylesheet" href="<?= View::assets('css/app.css') ?>">
    <link rel="stylesheet" href="<?= View::assets('css/pages/auth.css') ?>">
    <link rel="shortcut icon" href="<?= View::assets('images/favicon.ico') ?>" type="image/x-icon')" />
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-6 col-12">
                <div id="auth-left">
                    <h1 class="auth-title">Đăng nhập.</h1>
                    <p class="auth-subtitle mb-5">Nhập thông tin của bạn để đăng nhập</p>
                    <div id="login-error" class="alert alert-danger d-none">Lỗi nè</div>
                    <form name="login-form" action="<?= View::getAction('AuthController', 'loginPost') ?>" method="POST">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input id="email" type="text" name="email" class="form-control form-control-xl" placeholder="Tên đăng nhập">
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
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Đăng nhập</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                            <a href="<?= View::url('auth/forgotpassword') ?>" class="font-bold">Quên mật khẩu?</a>.
                    </div>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class="text-gray-600">Bạn chưa có tài khoản?
                            <a href="<?= View::url('auth/register') ?>" class="font-bold">Đăng ký</a>.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-block">
                <div id="auth-right">
                    <img src="<?= View::assets('images/bg/login.jpg')?>" class=" d-block w-100">
                </div>
            </div>
        </div>
    </div>
    <script src="<?= View::assets('vendors/jquery/jquery.min.js') ?>"></script>
    <script src="<?= View::assets('vendors/jquery/jquery.validate.js') ?>"></script>
    <script>
        // Cách viết ngắn của $( document ).ready()
        // Đợi page load xong
        $(function() {
            // Select form có name = login-form (giống như select bằng js thuần)
            $("form[name='login-form']").validate({
                // Định nghĩa rule validate
                rules: {
                    email: {
                        required: true,
                    },
                    password: {
                        required: true,
                        minlength: 8
                    }
                },
                messages: {
                    // Báo lỗi chung cho required và email
                    email: "Vui lòng nhập tên đăng nhập",
                    // Message báo lỗi cụ thể cho từng trường hợp
                    password: {
                        required: "Vui lòng nhập mật khẩu",
                        minlength: "Mật khẩu của bạn không được ngắn hơn 8 ký tự"
                    },
                },
                // JQuery sẽ chặn submit đến khi nào dữ liệu đã được validate
                submitHandler: function(form) {
                    dangNhapAjax()
                }
            });

            function dangNhapAjax() {
                $('#login-error').text("")
                $('#login-error').addClass("d-none")
                // lay gia tri input
                const email = $("#email").val()
                const password = $("#password").val()

                // dung ajax de submit 1 2 3
                $.ajax({
                    url: "http://localhost/Software-Technology/auth/loginPost",
                    type: "post",
                    data: {
                        email: email,
                        password: password
                    },
                    success: function(result) {
                        console.log(result);
                        console.log(result['summary']);
                        if (!result['thanhcong']) {
                            $('#login-error').text(result['summary'])
                            $('#login-error').removeClass("d-none")
                        }
                        else{
                            window.location.href = 'http://localhost/Software-Technology/'
                        }

                    }
                });

            }

        });
    </script>
</body>

</html>