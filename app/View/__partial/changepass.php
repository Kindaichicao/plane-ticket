<?php
use App\Core\Cookie;
?>
<div class="modal fade text-left" id="change-pass-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Đổi mật khẩu</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form name="change-pass-form" action="/" method="POST">
                <div class="modal-body">
                    <label>Mật khẩu cũ: </label>
                    <div class="form-group">
                        <input type="password" id="oldpassword" name="oldpassword" placeholder="Mật khẩu cũ" class="form-control" pattern="12345678">
                    </div>
                    <label>Mật khẩu mới: </label>
                    <div class="form-group">
                        <input type="password" id="newpassword" name="newpassword" placeholder="Mật khẩu mới" class="form-control">
                    </div>
                    <label>Xác nhận mật khẩu mới: </label>
                    <div class="form-group">
                        <input type="password" id="newpassword2" name="newpassword2" placeholder="Nhập lại mật khẩu mới" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Đóng</span>
                    </button>
                    <button type="submit" class="btn btn-primary ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Lưu</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade text-left" id="update-customer-modal" value="<?= Cookie::get('user_matk') ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Thông tin khách hàng</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form name="update-customer-form" action="/" method="POST">
                    <div class="modal-body">
                        <label for="up-fullnamekh">Họ tên: </label>
                        <div class="form-group">
                            <input type="text" id="up-fullnamekh" name="fullnamekh" placeholder="Họ tên" class="form-control">
                        </div>
                        <label for="up-hochieukh">Số hộ chiếu: </label>
                        <div class="form-group">
                            <input type="text" id="up-hochieukh" name="hochieukh" placeholder="Số hộ chiếu" class="form-control">
                        </div>
                        <label for="up-cccdkh">Căn cước công dân: </label>
                        <div class="form-group">
                            <input type="text" id="up-cccdkh" name="cccdkh" placeholder="Căn cước công dân" class="form-control">
                        </div>
                        <label for="up-numberphonekh">Số điện thoại: </label>
                        <div class="form-group">
                            <input type="text" id="up-numberphonekh" name="numberphonekh" placeholder="Số điện thoại" class="form-control">
                        </div>
                        <label for="up-emailkh">Email: </label>
                        <div class="form-group">
                            <input type="email" id="up-emailkh" name="emailkh" placeholder="Email" class="form-control">
                        </div>
                        <label for="up-birthdaykh">Ngày sinh: </label>
                        <div class="form-group">
                            <input type="date" id="up-birthdaykh" name="birthdaykh" placeholder="Ngày sinh" class="form-control">
                        </div>
                        <label for="up-genderkh">Giới tính: </label>
                        <div class="form-group">
                            <select class="form-select" name="genderkh" id="up-genderkh">
                                <option value="Nam">Nam</option>
                                <option value="Nữ">Nữ</option>
                            </select>
                        </div>
                        <label for="up-addresskh">Địa chỉ: </label>
                        <div class="form-group">
                            <input type="text" id="up-addresskh" name="addresskh" placeholder="Địa chỉ" class="form-control">
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
                    <span class="d-none d-sm-block">Cập nhật</span>
                </button>
            </div>
            </form>
        </div>
    </div>
</div>