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
        $("form[name='update-customer-form']").validate({
            rules: {
                fullnamekh: {
                    required: true,
                    validateName: true,
                },

                cccdkh: {
                    required: true,
                    number: true,
                },
                numberphonekh: {
                    required: true,
                    number: true,

                },
                emailkh: {
                    required: true,
                    email:true,
                },
                birthdaykh: {
                    required: true,
                },
                genderkh: {
                    required: true,
                },
                addresskh: {
                    required: true,
                },
            },
            messages: {
                fullnamekh: {
                    required: "Vui lòng nhập họ tên",
                },
                cccdkh: {
                    required: "Vui lòng nhập căn cước công dân",
                    number: "Căn cước công dân phải là số"
                },
                numberphonekh: {
                    required: "Vui lòng nhập số điện thoại",
                    number: "Số điện thoại dân phải là số"
                },
                emailkh: {
                    required: "Vui lòng nhập email",
                    email: "Vui lòng nhập đúng định dạng email"
                },
                birthdaykh: {
                    required: "Vui lòng nhập ngày sinh",
                },
                addresskh: {
                    required: "Vui lòng nhập địa chỉ",
                },
            },
            submitHandler: function(form, event) {
                event.preventDefault();
                $("#myModalLabel110").text("Thông tin khách hàng");
                $("#question-model").text("Bạn có chắc chắn muốn sửa khách hàng này không");
                $("#question-customer-modal").modal('toggle');
                $('#thuchien').off('click')
                $("#thuchien").click(function() {
                    // lấy dữ liệu từ form

                    const data = Object.fromEntries(new FormData(form).entries());
                    data['makh'] = $("#update-customer-modal").val();
                    $.post(`http://localhost/Software-Technology/customer/update`, data, function(response) {
                        if (response.thanhcong) {
                            currentPage = 1;
                            layDSCustomerAjax();
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
                        $("#repair-customer-modal").modal('toggle')
                    });
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
$("#open-update-profile").click(function() {
    data = $("#update-customer-modal").val();
    $.post(`http://localhost/Software-Technology/customer/viewCustomer`, data, function(response) {
            if (response.thanhcong) {
                $('#up-fullnamekh').val(response.FullName);
                $('#up-hochieukh').val(response.hochieu);
                $('#up-cccdkh').val(response.cccd);
                $('#up-numberphonekh').val(response.sdt);
                $('#up-emailkh').val(response.email);
                $('#up-birthdaykh').val(response.date);
                $('#up-genderkh').val(response.gender).prop('selected', true);;
                $('#up-addresskh').val(response.address);
            }
        });
    $("#update-customer-modal").modal('toggle');
});
