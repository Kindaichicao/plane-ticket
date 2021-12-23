$(function() {
    $("form[name='change-pass-form']").validate({
        rules: {
            oldpassword: {
                required: true,
            },
            newpassword: {
                required: true,
                minlength: 8
            },
            newpassword2: {
                required: true,
                equalTo: "#newpassword"
            },
        },
        messages: {
            oldpassword: {
                required: "Vui lòng nhập mật khẩu cũ",
            },
            newpassword: {
                required: "Vui lòng nhập mật khẩu mới",
                minlength: "Mật khẩu mới của bạn không được ngắn hơn 8 ký tự",
            },
            newpassword2: {
                required: "Vui lòng nhập lại mật khẩu mới",
                equalTo: "Mật khẩu mới không khớp",
            },
        },
        submitHandler: function(form, event) {
            event.preventDefault();
            const data = Object.fromEntries(new FormData(form).entries());
            $.post(`http://localhost/Software-Technology/user/changePassword`, data, function(response) {
                if (!response.thanhcong) {
                    Toastify({
                        text: "Mật khẩu không đúng",
                        duration: 1000,
                        close: true,
                        gravity: "top",
                        position: "center",
                        backgroundColor: "#FF6A6A",
                    }).showToast();
                } else {
                    Toastify({
                        text: "Thay đổi thành công",
                        duration: 1000,
                        close: true,
                        gravity: "top",
                        position: "center",
                        backgroundColor: "#4fbe87",
                    }).showToast();
                    $('#oldpassword').val("");
                    $('#newpassword').val("");
                    $('#newpassword2').val("");
                }
            });
        }
    })
});

$("#open-change-pass-btn").click(function() {
    $('#oldpassword').val("");
    $('#newpassword').val("");
    $('#newpassword2').val("");
    $("#change-pass-modal").modal('toggle')
});