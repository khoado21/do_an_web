 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo admin_url('home') ?>">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="<?php echo admin_url('/home') ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Interface
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Danh mục quản lý</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Quản lý người dùng</h6>
            <a class="collapse-item" href="<?php echo admin_url('vaitronguoidung') ?>">Vai trò người dùng</a>
            <a class="collapse-item" href="<?php echo admin_url('nguoidung') ?>">Người dùng</a>
            <h6 class="collapse-header">Quản lý sản phẩm</h6>
            <a class="collapse-item" href="<?php echo admin_url('nhacungcap') ?>">Nhà cung cấp</a>
            <a class="collapse-item" href="<?php echo admin_url('thuonghieu') ?>">Thương hiệu</a>
            <a class="collapse-item" href="<?php echo admin_url('danhmuc') ?>">Danh mục sản phẩm</a>
            <a class="collapse-item" href="<?php echo admin_url('sanpham') ?>">Sản phẩm</a>
            <a class="collapse-item" href="<?php echo admin_url('hinhanh') ?>">Hình ảnh sản phẩm</a>                   
            <h6 class="collapse-header">Quản lý đơn hàng</h6>
            <a class="collapse-item" href="<?php echo admin_url('donhang') ?>">Đơn hàng</a>
            <a class="collapse-item" href="<?php echo admin_url('ctdh') ?>">Chi tiết đơn hàng</a>
            <a class="collapse-item" href="<?php echo admin_url('giaohang') ?>">Giao hàng</a>
            <h6 class="collapse-header">Khác</h6>
            <a class="collapse-item" href="<?php echo admin_url('tintuc') ?>">Tin tức</a>
            <a class="collapse-item" href="<?php echo admin_url('binhluan') ?>">Bình luận</a>
            <a class="collapse-item" href="<?php echo admin_url('voucher') ?>">Voucher</a>
            <a class="collapse-item" href="<?php echo admin_url('contact') ?>">Contact</a>
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Addons
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Pages</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Screens:</h6>
            <a class="collapse-item" href="login.html">Login</a>
            <a class="collapse-item" href="register.html">Register</a>
            <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a class="collapse-item" href="blank.html">Blank Page</a>
        </div>
    </div>
</li>

<!-- Nav Item - Charts -->
<li class="nav-item">
    <a class="nav-link" href="charts.html">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Charts</span></a>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item">
    <a class="nav-link" href="tables.html">
        <i class="fas fa-fw fa-table"></i>
        <span>Tables</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

<!-- Sidebar Message -->


</ul>
<!-- End of Sidebar -->