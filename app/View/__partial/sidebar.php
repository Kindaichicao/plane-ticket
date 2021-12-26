<?php

use App\Core\View;

?>
<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-center">
                <div class="logo">
                    <a href="index.html"><img src="<?= View::assets('images/logo/logo.jpeg') ?>" alt="Logo"
                            srcset="" /></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-item <?= View::$activeItem == 'dashboard' ? 'active' : '' ?>">
                    <a href="<?= View::getBaseUrl() ?>" class="sidebar-link">
                        <i class="bi bi-grid-fill"></i>
                        <span>Trang chủ</span>
                    </a>
                </li>
                <li id="CN13" class=" sidebar-item  <?= View::$activeItem == 'index' ? 'active' : '' ?>">
                    <a href="<?= View::url('userticket/index') ?>" class="sidebar-link">
                        <i class="bi bi-cast"></i>
                        <span>Đặt vé</span>
                    </a>
                </li>
                <li id="CN01" class=" sidebar-item  <?= View::$activeItem == 'account' ? 'active' : '' ?>">
                    <a href="<?= View::url('account/account') ?>" class="sidebar-link">
                        <i class="bi bi-person-circle"></i>
                        <span>Tài khoản</span>
                    </a>
                </li>
                <li id="CN02" class=" sidebar-item  <?= View::$activeItem == 'airline' ? 'active' : '' ?>">
                    <a href="<?= View::url('airline/airline') ?>" class="sidebar-link">
                        <i class="bi bi-cloud"></i>
                        <span>Hãng hàng không</span>
                    </a>
                </li>
                <li id="CN03" class=" sidebar-item  <?= View::$activeItem == 'airport' ? 'active' : '' ?>">
                    <a href="<?= View::url('airport/airport') ?>" class="sidebar-link">
                        <i class="bi bi-pentagon"></i>
                        <span>Sân bay</span>
                    </a>
                </li>
                <li id="CN04" class=" sidebar-item  <?= View::$activeItem == 'customer' ? 'active' : '' ?>">
                    <a href="<?= View::url('customer/customer') ?>" class="sidebar-link">
                        <i class="bi bi-people"></i>
                        <span>Khách hàng</span>
                    </a>
                </li>
                <li id="CN05" class=" sidebar-item  <?= View::$activeItem == 'flight' ? 'active' : '' ?>">
                    <a href="<?= View::url('flight/flight') ?>" class="sidebar-link">
                        <i class="bi bi-symmetry-horizontal"></i>
                        <span>Chuyến bay</span>
                    </a>
                </li>
                <li id="CN06" class=" sidebar-item  <?= View::$activeItem == 'plane' ? 'active' : '' ?>">
                    <a href="<?= View::url('plane/plane') ?>" class="sidebar-link">
                        <i class="bi bi-cursor"></i>
                        <span>Máy bay</span>
                    </a>
                </li>
                <li id="CN07" class=" sidebar-item  <?= View::$activeItem == 'position' ? 'active' : '' ?>">
                    <a href="<?= View::url('position/position') ?>" class="sidebar-link">
                        <i class="bi bi-person-check"></i>
                        <span>Chức vụ</span>
                    </a>
                </li>
                <li id="CN08" class=" sidebar-item  <?= View::$activeItem == 'promotion' ? 'active' : '' ?>">
                    <a href="<?= View::url('promotion/promotion') ?>" class="sidebar-link">
                        <i class="bi bi-gift"></i>
                        <span>Chương trình khuyến mãi</span>
                    </a>
                </li>
                <li id="CN09" class=" sidebar-item  <?= View::$activeItem == 'rank' ? 'active' : '' ?>">
                    <a href="<?= View::url('rank/rank') ?>" class="sidebar-link">
                        <i class="bi bi-bookmark"></i>
                        <span>Hạng khách hàng</span>
                    </a>
                </li>
                <li id="CN10" class=" sidebar-item  <?= View::$activeItem == 'staff' ? 'active' : '' ?>">
                    <a href="<?= View::url('staff/staff') ?>" class="sidebar-link">
                        <i class="bi bi-people-fill"></i>
                        <span>Nhân viên</span>
                    </a>
                </li>
                <li id="CN11" class=" sidebar-item  <?= View::$activeItem == 'wallet' ? 'active' : '' ?>">
                    <a href="<?= View::url('wallet/wallet') ?>" class="sidebar-link">
                        <i class="bi bi-wallet2"></i>
                        <span>Ví Airpro</span>
                    </a>
                </li>
                <li id="CN18" class=" sidebar-item  <?= View::$activeItem == 'ticket' ? 'active' : '' ?>">
                    <a href="<?= View::url('ticket/ticket') ?>" class="sidebar-link">
                        <i class="bi bi-cash-stack"></i>
                        <span>Quản lý vé</span>
                    </a>
                </li>
                <li id="CN12" class=" sidebar-item  <?= View::$activeItem == 'statistics' ? 'active' : '' ?>">
                    <a href="<?= View::url('statistics/statistics') ?>" class="sidebar-link">
                        <i class="bi bi-graph-up"></i>
                        <span>Thống kê</span>
                    </a>
                </li>
                
                <li id="CN14" class=" sidebar-item  <?= View::$activeItem == 'sale' ? 'active' : '' ?>">
                    <a href="<?= View::url('userticket/sale') ?>" class="sidebar-link">
                        <i class="bi bi-lightning"></i>
                        <span>Săn vé giá rẻ</span>
                    </a>
                </li>
                <li id="CN15" class=" sidebar-item  <?= View::$activeItem == 'auto' ? 'active' : '' ?>">
                    <a href="<?= View::url('userticket/auto') ?>" class="sidebar-link">
                        <i class="bi bi-broadcast"></i>
                        <span>Mua vé tự động</span>
                    </a>
                </li>
                <li id="CN16" class=" sidebar-item  <?= View::$activeItem == 'ticketuser' ? 'active' : '' ?>">
                    <a href="<?= View::url('userticket/ticket') ?>" class="sidebar-link">
                        <i class="bi bi-cash"></i>
                        <span>Kho vé của tôi</span>
                    </a>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x">
            <i data-feather="x"></i>
        </button>
    </div>
</div>