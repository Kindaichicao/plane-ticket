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
                            <input type="password"  id="oldpassword" name="oldpassword" placeholder="Mật khẩu cũ" class="form-control" pattern="12345678">
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