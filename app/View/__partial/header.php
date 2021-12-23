<?php

use App\Core\Cookie;
use App\Core\View;

?>
<header class="mb-3">
    <nav class="navbar navbar-expand navbar-light" style="height: 60px; padding-bottom: 0px;">
        <div class="container-fluid">
            <a href="#" class="burger-btn d-block">
                <i class="bi bi-justify fs-3"></i>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                </ul>
                <div class="dropdown">
                    <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="user-menu d-flex">
                            <div class="user-name text-end me-3">
                                <h6 class="mb-0 text-gray-600"><?= Cookie::get('user_fullname') ?></h6>
                                <p class="mb-0 text-sm text-gray-600" id="mail"><?= Cookie::get('user_email')?></p>
                            </div>
                            <div class="user-img d-flex align-items-center">
                                <div class="avatar avatar-md">
                                    <img src="<?= View::assets('images/faces/avatar-01.jpg') ?>" />
                                </div>
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                        <li>
                            <h6 class="dropdown-header"><?= Cookie::get('user_email') ?></h6>
                        </li>
                        <li>
                            <button class="btn-changepass"><a id='open-change-pass-btn' class="dropdown-item" ><i class="icon-mid bi bi-key me-2"></i> Đổi mật khẩu</a></button>
                        </li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li id="logout">
                            <a  class="dropdown-item" href="<?= View::getAction('AuthController', 'logout')  ?>"><i class="icon-mid bi bi-box-arrow-left me-2"></i>
                                Đăng Xuất</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>