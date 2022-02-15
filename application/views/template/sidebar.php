<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SIB UPPD PELAIHARI</title>
    <link href="<? base_url('box.ico');?>" rel='shortcut icon'>

    <!-- Custom fonts for this template -->
    <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css');?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i") rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= base_url('assets/css/sb-admin-2.min.css" rel="stylesheet');?>">

    <!-- Custom styles for this page -->
    <link href="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css');?>" rel="stylesheet">

    
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                <i class="fas fa-laptop"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SIB UPPD Pelaihari</div>
            </a>

             <!-- Divider -->
             <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Mutasi Barang
            </div>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('mutasimasuk');?>">
                    <i class="fas fa-download"></i>
                    <span>Barang masuk</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('mutasikeluar');?>">
                    <i class="fas fa-upload"></i>
                    <span>Barang Keluar</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Kartu Inventaris
            </div>

            <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('dashboard');?>">
                    <i class="fas fa-book"></i>
                    <span>Kartu Inventaris Barang</span></a>
            </li>
            <li class="nav-item">
                     <a class="nav-link" href="<?php echo base_url('kir');?>">
                     <i class="fas fa-clipboard-list"></i>
                    <span>Kartu Inventaris Ruangan</span></a>
            </li>

            <div class="sidebar-heading">
                Kondisi Barang
            </div>

            <!-- Nav Item - Ruangan -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('barangbaik');?>">
                <i class="far fa-check-circle"></i>
                <span>Baik</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('barangrusakringan');?>">
                <i class="fas fa-screwdriver"></i>
                <span>Rusak Ringan</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('barangrusak');?>">
                <i class="fas fa-times"></i>
                <span>Rusak Berat</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Pemushanahan Barang
            </div>


            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('usulpemusnahan');?>">
                    <i class="fas fa-edit"></i>
                    <span>Usul Pemusnahan Barang</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('barangdimusnahkan');?>">
                    <i class="fas fa-trash-alt"></i>
                    <span>Barang Telah Dimusnahkan</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Master
            </div>

            <!-- Nav Item - Kondisi -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('instansi');?>">
                <i class="fas fa-building"></i>
            <span>Instansi</span></a>
           
            <!-- Nav Item - Kondisi -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('ruangan');?>">
                <i class="fas fa-building"></i>
                    <span>Ruangan</span></a>
            </li>

            <!-- Nav Item - Kondisi -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('tahunanggaran');?>">
                <i class="fas fa-calendar-week"></i>
                    <span>Tahun Anggaran</span></a>
            </li>

            <!-- Nav Item - Akun -->
            <?php if($this->session->userdata('level_pengguna') == 'admin'): ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('users');?>">
                    <i class="fas fa-users"></i>
                    <span>Users</span></a>
            </li>
            <?php endif ?>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->