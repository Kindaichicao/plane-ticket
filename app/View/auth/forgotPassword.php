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
                    <div class="auth-logo">
                        <a href="index.html"><img src="<?= View::assets('images/logo/logo.jpeg') ?>" alt="Logo"></a>
                    </div>
                    <h1 class="auth-title">Quên mật khẩu.</h1>
                    <p class="auth-subtitle mb-5">Nhập tên đăng nhập của bạn</p>
                    <div id="login-error" class="alert alert-danger d-none">Lỗi nè</div>
                    <form name="login-form" action="/" method="POST">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input id="email" type="text" name="email" class="form-control form-control-xl" placeholder="Tên đăng nhập">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Gửi mã</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <a href="<?= View::url('auth/login') ?>" class="font-bold">Đăng nhập</a>.
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
                },
                messages: {
                    // Báo lỗi chung cho required và email
                    email: "Vui lòng nhập tên đăng nhập",
                },
                // JQuery sẽ chặn submit đến khi nào dữ liệu đã được validate
                submitHandler: function(form) {
                    forgotPasswordAjax()
                }
            });

            function forgotPasswordAjax() {
                $('#login-error').text("")
                $('#login-error').addClass("d-none")
                // lay gia tri input
                const email = $("#email").val()

                // dung ajax de submit 1 2 3
                $.ajax({
                    url: "http://localhost/Software-Technology/account/forgotPassword",
                    type: "post",
                    data: {
                        email: email,
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