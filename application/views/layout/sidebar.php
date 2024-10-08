<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar" data-navbarbg="skin5">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
            <div class="navbar-header" data-logobg="skin5">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <a class="navbar-brand" href="<?php echo base_url(); ?>">
                    <!-- Logo icon -->
                    <b class="logo-icon ps-2">
                        <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                        <!-- Dark Logo icon -->
                        <img src="<?php echo base_url(); ?>assets/images/logo-icon.png" alt="homepage" class="light-logo" />
                    </b>
                    <!--End Logo icon -->
                    <!-- Logo text -->
                    <span class="logo-text">
                        <!-- dark Logo text -->
                        <img src="<?php echo base_url(); ?>assets/images/logo-text.png" alt="homepage" class="light-logo" />
                    </span>
                    <!-- Logo icon -->
                    <!-- <b class="logo-icon"> -->
                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                    <!-- Dark Logo icon -->
                    <!-- <img src="assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->
                    <!-- </b> -->
                    <!--End Logo icon -->
                </a>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Toggle which is visible on mobile only -->
                <!-- ============================================================== -->
                <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                <!-- ============================================================== -->
                <!-- toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav float-start me-auto">
                    <li class="nav-item d-none d-lg-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                </ul>
                <!-- ============================================================== -->
                <!-- Right side toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav float-end">
                    <!-- ============================================================== -->
                    <!-- Comment -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-plus font-24"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="<?php echo base_url(); ?>dokter/create">Dokter</a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url(); ?>pasien/create">Pasien</a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url(); ?>obat">Obat</a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url(); ?>penyakit">Penyakit</a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url(); ?>layanan">Layanan</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="<?php echo base_url(); ?>pendaftaran">Pendaftaran Pasien</a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url(); ?>periksa/create">Periksa Pasien</a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url(); ?>transaksi/create/new">Transaksi Baru</a></li>
                        </ul>
                    </li>
                    <!-- ============================================================== -->
                    <!-- End Comment -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Messages -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" id="2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="font-24 mdi mdi-comment-processing"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end mailbox animated bounceInDown" aria-labelledby="2">
                            <ul class="list-style-none">
                                <li>
                                    <div class="">
                                        <!-- Message -->
                                        <a href="javascript:void(0)" class="link border-top">
                                            <div class="d-flex no-block align-items-center p-10">
                                                <span class="btn btn-success btn-circle"><i class="ti-user"></i></span>
                                                <div class="ms-2">
                                                    <h5 class="mb-0">Pendaftaran Pasien</h5>
                                                    <span class="mail-desc">Mawar Kartika <i class="mdi mdi-calendar-clock"></i> Menunggu</span>
                                                </div>
                                            </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="javascript:void(0)" class="link border-top">
                                            <div class="d-flex no-block align-items-center p-10">
                                                <span class="btn btn-info btn-circle"><i class="ti-user"></i></span>
                                                <div class="ms-2">
                                                    <h5 class="mb-0">Pendaftaran Pasien</h5>
                                                    <span class="mail-desc">Hani Leziana <i class="mdi mdi-calendar-clock"></i> Menunggu</span>
                                                </div>
                                            </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="javascript:void(0)" class="link border-top">
                                            <div class="d-flex no-block align-items-center p-10">
                                                <span class="btn btn-primary btn-circle"><i class="ti-user"></i></span>
                                                <div class="ms-2">
                                                    <h5 class="mb-0">Pendaftaran Pasien</h5>
                                                    <span class="mail-desc">Walid <i class="mdi mdi-calendar-clock"></i> Menunggu</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </ul>
                    </li>
                    <!-- ============================================================== -->
                    <!-- End Messages -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="<?php echo base_url($this->session->userdata("image")); ?>" alt="user" class="rounded-circle" width="31">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo base_url('admin'); ?>"><i class="mdi mdi-account-settings-variant me-1 ms-1"></i>Admin</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo base_url('pendaftaran'); ?>"><i class="mdi mdi-plus-circle me-1 ms-1"></i>Pendaftaran Pasien</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo base_url('auth/logout'); ?>"><i class="mdi mdi-logout me-1 ms-1"></i>Logout</a>
                        </ul>
                    </li>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                </ul>
            </div>
        </nav>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <aside class="left-sidebar" data-sidebarbg="skin5">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav" class="pt-4">
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url(); ?>" aria-expanded="false"><i class="mdi mdi-home"></i><span class="hide-menu">Dashboard</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('pendaftaran'); ?>" aria-expanded="false"><i class="mdi mdi-plus-circle"></i><span class="hide-menu">Pendaftaran</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-file-document-box"></i><span class="hide-menu">Data</span></a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item"><a href="<?php echo base_url('dokter'); ?>" class="sidebar-link"><i class="mdi mdi-stethoscope"></i><span class="hide-menu">Dokter</span></a></li>
                            <li class="sidebar-item"><a href="<?php echo base_url('pasien'); ?>" class="sidebar-link"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">Pasien</span></a></li>
                            <li class="sidebar-item"><a href="<?php echo base_url('obat'); ?>" class="sidebar-link"><i class="mdi mdi-flask-empty"></i><span class="hide-menu">Obat</span></a></li>
                            <li class="sidebar-item"><a href="<?php echo base_url('penyakit'); ?>" class="sidebar-link"><i class="mdi mdi-alert"></i><span class="hide-menu">Penyakit</span></a></li>
                            <li class="sidebar-item"><a href="<?php echo base_url('layanan'); ?>" class="sidebar-link"><i class="mdi mdi-hotel"></i><span class="hide-menu">Layanan</span></a></li>
                        </ul>
                    </li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('periksa'); ?>" aria-expanded="false"><i class="mdi mdi-heart-pulse"></i><span class="hide-menu">Periksa</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('transaksi'); ?>" aria-expanded="false"><i class="mdi mdi-cart"></i><span class="hide-menu">Transaksi</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('admin'); ?>" aria-expanded="false"><i class="mdi mdi-account-settings-variant"></i><span class="hide-menu">Admin</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('auth/logout'); ?>" aria-expanded="false"><i class="mdi mdi-logout"></i><span class="hide-menu">Logout</span></a></li>
                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>