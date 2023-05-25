<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Restoran | <?php echo $title ?></title>

    <base href="<?php echo base_url('assets') ?>/">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">

    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">

    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">

    <!-- Font Awesome 2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button)
    </script>

    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>

    <!-- Sparkline -->
    <script src="plugins/sparklines/sparkline.js"></script>

    <!-- JQVMap -->
    <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>

    <!-- jQuery Knob Chart -->
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>

    <!-- daterangepicker -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>

    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>

    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
        <!-- end of Scritps -->
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

    <!-- Preloader -->
    <!-- <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div> -->

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link">Home</a>
        </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url()?>logout"><i class="fas fa-right-from-bracket"></i></a>
        </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="" class="brand-link">
        <img src="../img/logo.png" alt="AdminLTE Logo" class="brand-image" style="opacity: .8" height="100">
        <span class="brand-text font-weight-light">POS Restaurant</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
            <img src="../img/profile.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
            <a href="#" class="d-block"><?= $_SESSION['username']?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
            <li class="nav-item <?php if (in_array($activeMenu,['dashboard'])) echo "menu-open" ?>">
                <a href="<?php echo site_url('dashboard')?>" class="nav-link <?php if (in_array($activeMenu,['dashboard'])) echo "active" ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
                </a>
            </li>
            <li class="nav-item <?php if (in_array($activeMenu,['cashier'])) echo "menu-open" ?>">
                <a href="<?php echo site_url('cashier')?>" class="nav-link <?php if (in_array($activeMenu,['cashier'])) echo "active" ?>">
                <i class="nav-icon fa-solid fa-user-tie"></i>
                <p>
                    Cashiers
                </p>
                </a>
            </li>
            <li class="nav-item <?php if (in_array($activeMenu,['customer'])) echo "menu-open" ?>">
                <a href="<?php echo site_url('customer')?>" class="nav-link <?php if (in_array($activeMenu,['customer'])) echo "active" ?>">
                <i class="nav-icon fa-solid fa-users"></i>
                <p>
                    Customers
                </p>
                </a>
            </li>
            <li class="nav-item <?php if (in_array($activeMenu,['table'])) echo "menu-open" ?>">
                <a href="<?php echo site_url('table')?>" class="nav-link <?php if (in_array($activeMenu,['table'])) echo "active" ?>">
                <i class="nav-icon fa-solid fa-chair"></i>
                <p>
                    Table
                </p>
                </a>
            </li>
            <li class="nav-item <?php if (in_array($activeMenu,['product'])) echo "menu-open" ?>">
                <a href="<?php echo site_url('product')?>" class="nav-link <?php if (in_array($activeMenu,['product'])) echo "active" ?>">
                <i class="nav-icon fa-solid fa-bowl-food"></i>
                <p>
                    Products
                </p>
                </a>
            </li>
            <li class="nav-item <?php if (in_array($activeMenu,['order'])) echo "menu-open" ?>">
                <a href="<?php echo site_url('order')?>" class="nav-link <?php if (in_array($activeMenu,['order'])) echo "active" ?>">
                <i class="nav-icon fa-solid fa-cart-shopping"></i>
                <p>
                    Orders
                </p>
                </a>
            </li>
            <li class="nav-item <?php if (in_array($activeMenu,['payment'])) echo "menu-open" ?>">
                <a href="<?php echo site_url('payment')?>" class="nav-link <?php if (in_array($activeMenu,['payment'])) echo "active" ?>">
                <i class="nav-icon fa-solid fa-money-bill"></i>
                <p>
                    Payments
                </p>
                </a>
            </li>
            <li class="nav-item <?php if (in_array($activeMenu,['receipt'])) echo "menu-open" ?>">
                <a href="<?php echo site_url('receipt')?>" class="nav-link <?php if (in_array($activeMenu,['receipt'])) echo "active" ?>">
                <i class="nav-icon fa-solid fa-file-invoice"></i>
                <p>
                    Receipts
                </p>
                </a>
            </li>
            <li class="nav-header">REPORTS</li>
            <li class="nav-item <?php if (in_array($activeMenu,['orders'])) echo "menu-open" ?>">
                <a href="<?php echo site_url('orders')?>" class="nav-link <?php if (in_array($activeMenu,['orders'])) echo "active" ?>">
                <i class="nav-icon fa-solid fa-basket-shopping"></i>
                <p>
                    Orders
                </p>
                </a>
            </li>
            <li class="nav-item <?php if (in_array($activeMenu,['payments'])) echo "menu-open" ?>">
                <a href="<?php echo site_url('payments')?>" class="nav-link <?php if (in_array($activeMenu,['payment'])) echo "active" ?>">
                <i class="nav-icon fa-solid fa-money-bill-trend-up"></i>
                <p>
                    Payments
                </p>
                </a>
            </li>
            </ul>
        </nav>
        </div>
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"><?php echo $title ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?php echo site_url()?>">Home</a></li>
                <li class="breadcrumb-item active"><?php echo $title ?></li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
    <!-- /.content-header -->