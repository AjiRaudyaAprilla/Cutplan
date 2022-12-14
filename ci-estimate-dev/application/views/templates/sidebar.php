<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('user'); ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-cut"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Cutting Plan</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading Admin -->
    <div class="sidebar-heading">
        Admin
    </div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('user'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- <li class="nav-item">
        <a class="nav-link" href="<?= base_url('estimate'); ?>">
            <i class="fas fa-fw fa-list-alt"></i>
            <span>List Estimate</span></a>
    </li> -->

    <!-- <li class="nav-item">
        <a class="nav-link" href="<?php //base_url('Plan');
                                    ?>">
            <i class="fas fa-fw fa-list-alt"></i>
            <span>List Add Plan</span></a>
    </li> -->

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Import'); ?>">
            <i class="fas fa-fw fa-upload"></i>
            <span>Upload</span></a>
    </li>


    <!-- <li class="nav-item">
        <a class="nav-link" href="<?php //base_url('Invenit'); 
                                    ?>">
            <i class="fas fa-fw fa-upload"></i>
            <span>IT INVENTORY (DEVELOP)</span></a>
    </li> -->

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        User
    </div>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('user/profile'); ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>Profile</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">



    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->