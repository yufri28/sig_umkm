<?php

require_once '../config.php';
require_once './functions/home.php';
require_once './functions/usaha.php';
require_once './functions/kecamatan.php';
require_once './functions/deskel.php';
require_once './functions/sektor_usaha.php';
require_once './functions/klasifikasi_usaha.php';

$data_level = "Administrator";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIG UMKM TTS</title>
    <link rel="icon" href="../assets/dist/img/logo.png">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="../assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="../assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Alert -->
    <script src="../assets/plugins/alert.js"></script>
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-blue navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#">
                        <i class="fas fa-bars text-white"></i>
                    </a>
                </li>

            </ul>

            <!-- SEARCH FORM -->
            <ul class="navbar-nav ml-auto">

                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index.php" class="nav-link">
                        <font color="white">
                            <b>
                                <?php echo "Default"; ?>
                            </b>
                        </font>
                    </a>
                </li>
            </ul>

        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index.php" class="brand-link">
                <img src="../assets/dist/img/logo.png" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
                <span class="brand-text"> SIG UMKM TTS</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-2 pb-2 mb-2 d-flex">
                    <div class="image">
                        <img src="../assets/dist/img/user.png" class="img-circle elevation-1" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="index.php" class="d-block">
                            <?php echo "Default Name"; ?>
                        </a>
                        <span class="badge badge-success">
                            <?php echo "Default Level"; ?>
                        </span>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        <!-- Level  -->
                        <?php
                        if ($data_level == "Administrator") {
                        ?>
                            <li class="nav-item">
                                <a href="index.php" class="nav-link <?= !isset($_GET['page']) ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="?page=data-usaha" class="nav-link <?= isset($_GET['page']) ? ($_GET['page'] == 'data-usaha' ? 'active' : '') : '' ?>">
                                    <i class="nav-icon far fa fa-table"></i>
                                    <p>
                                        Data Usaha
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="?page=data-kecamatan" class="nav-link <?= isset($_GET['page']) ? ($_GET['page'] == 'data-kecamatan' ? 'active' : '') : '' ?>">
                                    <i class="nav-icon far fa fa-table"></i>
                                    <p>
                                        Kecamatan
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="?page=data-keluarahan" class="nav-link <?= isset($_GET['page']) ? ($_GET['page'] == 'data-keluarahan' ? 'active' : '') : '' ?>">
                                    <i class="nav-icon far fa fa-table"></i>
                                    <p>
                                        Desa/Kelurahan
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="?page=data-su" class="nav-link <?= isset($_GET['page']) ? ($_GET['page'] == 'data-su' ? 'active' : '') : '' ?>">
                                    <i class="nav-icon far fa fa-table"></i>
                                    <p>
                                        Sektor Usaha
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="?page=data-ku" class="nav-link <?= isset($_GET['page']) ? ($_GET['page'] == 'data-ku' ? 'active' : '') : '' ?>">
                                    <i class="nav-icon fa fa-object-group" aria-hidden="true"></i>
                                    <p>
                                        Klasifikasi Usaha
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <?php if (isset($_GET['page']) && ($_GET['page'] == 'data-pensiun' || $_GET['page'] == 'data-mutasi' || $_GET['page'] == 'data-pendidikan' || $_GET['page'] == 'data-golongan' || $_GET['page'] == 'data-jabatan')) : ?>
                                    <a href="#" class="nav-link active">
                                    <?php else : ?>
                                        <a href="#" class="nav-link">
                                        <?php endif; ?>
                                        <i class="nav-icon fas fa-database"></i>
                                        <p>
                                            Master Data
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                        </a>

                                        <ul class="nav nav-treeview nav-pills nav-sidebar">
                                            <li class="nav-item">
                                                <a href="?page=data-pensiun" class="nav-link <?= isset($_GET['page']) ? ($_GET['page'] == 'data-pensiun' ? 'active' : '') : '' ?>">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Data Pensiun</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="?page=data-mutasi" class="nav-link <?= isset($_GET['page']) ? ($_GET['page'] == 'data-mutasi' ? 'active' : '') : '' ?>">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Data Mutasi</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="?page=data-pendidikan" class="nav-link <?= isset($_GET['page']) ? ($_GET['page'] == 'data-pendidikan' ? 'active' : '') : '' ?>">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Data Pendidikan</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="?page=data-golongan" class="nav-link <?= isset($_GET['page']) ? ($_GET['page'] == 'data-golongan' ? 'active' : '') : '' ?>">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Data Golongan</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="?page=data-jabatan" class="nav-link <?= isset($_GET['page']) ? ($_GET['page'] == 'data-jabatan' ? 'active' : '') : '' ?>">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Data Jabatan</p>
                                                </a>
                                            </li>
                                        </ul>
                            </li>
                            <li class="nav-header">Setting</li>
                            <li class="nav-item">
                                <a href="?page=data-pengguna" class="nav-link <?= isset($_GET['page']) ? ($_GET['page'] == 'data-pengguna' ? 'active' : '') : '' ?>">
                                    <i class="nav-icon far fa-user"></i>
                                    <p>
                                        Administrator
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="?page=data-periode" class="nav-link <?= isset($_GET['page']) ? ($_GET['page'] == 'data-periode' ? 'active' : '') : '' ?>">
                                    <i class="nav-icon fa fa-calendar"></i>
                                    <p>
                                        Periode
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="?page=data-profil" class="nav-link <?= isset($_GET['page']) ? ($_GET['page'] == 'data-profil' ? 'active' : '') : '' ?>">
                                    <i class="nav-icon fas fa-info-circle"></i>
                                    <p>
                                        Tentang Sistem
                                    </p>
                                </a>
                            </li>

                        <?php
                        } elseif ($data_level == "Sekretaris") {
                        ?>

                            <li class="nav-item">
                                <a href="index.php" class="nav-link <?= !isset($_GET['page']) ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="?page=data-pegawai" class="nav-link <?= isset($_GET['page']) ? ($_GET['page'] == 'data-pegawai' ? 'active' : '') : '' ?>">
                                    <i class="nav-icon far fa fa-users"></i>
                                    <p>
                                        Data Pegawai
                                    </p>
                                </a>
                            </li>

                            <li class="nav-header">Setting</li>

                        <?php
                        }
                        ?>

                        <li class="nav-item">
                            <a onclick="return confirm('Apakah anda yakin akan keluar ?')" href="logout.php" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>

                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- /. WEB DINAMIS DISINI ############################################################################### -->
                <div class="container-fluid">

                    <?php
                    if (isset($_GET['page'])) {
                        $hal = $_GET['page'];

                        switch ($hal) {
                                //Klik Halaman Home Pengguna
                            case 'admin':
                                include "home/admin.php";
                                break;
                            case 'sekretaris':
                                include "home/sekretaris.php";
                                break;

                                //usaha
                            case 'data-usaha':
                                include "./data_usaha/data_usaha.php";
                                break;
                            case 'add-usaha':
                                include "./data_usaha/add_usaha.php";
                                break;
                            case 'edit-usaha':
                                include "./data_usaha/edit_usaha.php";
                                break;
                            case 'del-usaha':
                                include "./data_usaha/del_usaha.php";
                                break;

                                //Periode
                            case 'data-periode':
                                include "admin/periode/data_periode.php";
                                break;
                            case 'add-periode':
                                include "admin/periode/add_periode.php";
                                break;
                            case 'edit-periode':
                                include "admin/periode/edit_periode.php";
                                break;
                            case 'del-periode':
                                include "admin/periode/del_periode.php";
                                break;

                                //pegawai
                            case 'data-pegawai':
                                include "admin/pegawai/data_pegawai.php";
                                break;
                            case 'add-pegawai':
                                include "admin/pegawai/add_pegawai.php";
                                break;
                            case 'edit-pegawai':
                                include "admin/pegawai/edit_pegawai.php";
                                break;
                            case 'del-pegawai':
                                include "admin/pegawai/del_pegawai.php";
                                break;
                            case 'view-pegawai':
                                include "admin/pegawai/view_pegawai.php";
                                break;

                                //Pensiun
                            case 'data-pensiun':
                                include "admin/pensiun/data_pensiun.php";
                                break;
                            case 'add-pensiun':
                                include "admin/pensiun/add_pensiun.php";
                                break;
                            case 'edit-pensiun':
                                include "admin/pensiun/edit_pensiun.php";
                                break;
                            case 'del-pensiun':
                                include "admin/pensiun/del_pensiun.php";
                                break;
                            case 'view-pensiun':
                                include "admin/pensiun/view_pensiun.php";
                                break;

                                //Mutasi
                            case 'data-mutasi':
                                include "admin/mutasi/data_mutasi.php";
                                break;
                            case 'add-mutasi':
                                include "admin/mutasi/add_mutasi.php";
                                break;
                            case 'edit-mutasi':
                                include "admin/mutasi/edit_mutasi.php";
                                break;
                            case 'del-mutasi':
                                include "admin/mutasi/del_mutasi.php";
                                break;
                            case 'view-mutasi':
                                include "admin/mutasi/view_mutasi.php";
                                break;

                                //Pendidikan
                            case 'data-pendidikan':
                                include "admin/pendidikan/data_pendidikan.php";
                                break;
                            case 'add-pendidikan':
                                include "admin/pendidikan/add_pendidikan.php";
                                break;
                            case 'edit-pendidikan':
                                include "admin/pendidikan/edit_pendidikan.php";
                                break;
                            case 'del-pendidikan':
                                include "admin/pendidikan/del_pendidikan.php";
                                break;
                            case 'view-pendidikan':
                                include "admin/pendidikan/view_pendidikan.php";
                                break;

                                //Golongan
                            case 'data-golongan':
                                include "admin/golongan/data_golongan.php";
                                break;
                            case 'add-golongan':
                                include "admin/golongan/add_golongan.php";
                                break;
                            case 'edit-golongan':
                                include "admin/golongan/edit_golongan.php";
                                break;
                            case 'del-golongan':
                                include "admin/golongan/del_golongan.php";
                                break;
                            case 'view-golongan':
                                include "admin/golongan/view_golongan.php";
                                break;

                                //Golongan
                            case 'data-jabatan':
                                include "admin/jabatan/data_jabatan.php";
                                break;
                            case 'add-jabatan':
                                include "admin/jabatan/add_jabatan.php";
                                break;
                            case 'edit-jabatan':
                                include "admin/jabatan/edit_jabatan.php";
                                break;
                            case 'del-jabatan':
                                include "admin/jabatan/del_jabatan.php";
                                break;
                            case 'view-jabatan':
                                include "admin/jabatan/view_jabatan.php";
                                break;

                                //Profil
                            case 'data-profil':
                                include "admin/profil/data_profil.php";
                                break;
                            case 'edit-profil':
                                include "admin/profil/edit_profil.php";
                                break;


                                //default
                            default:
                                echo "<center><h1> ERROR !</h1></center>";
                                break;
                        }
                    } else {
                        // Auto Halaman Home Pengguna
                        if ($data_level == "Administrator") {
                            include "./dashboard.php";
                        } elseif ($data_level == "Sekretaris") {
                            include "home/sekretaris.php";
                        }
                    }
                    ?>

                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                🛠️ Modified by <a target="_blank" href="https://www.instagram.com/yufrii__/">
                    <strong> yupii</strong>
                </a>
            </div>
            <b>Created 2022</b>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Select2 -->
    <script src="../assets/plugins/select2/js/select2.full.min.js"></script>
    <!-- DataTables -->
    <script src="../assets/plugins/datatables/jquery.dataTables.js"></script>
    <script src="../assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <!-- AdminLTE App -->
    <script src="../assets/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../assets/dist/js/demo.js"></script>
    <!-- page script -->
    <script src="../assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="../assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="../assets/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="../assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="../assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="../assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="../assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <script>
        $(function() {
            $("#example1").DataTable({
                "scrollX": true,
                "scrollY": true,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "scrollX": true,
                "scrollY": true,
            });
            $("#example3").DataTable({
                "scrollX": true,
                "scrollY": true,
            });
        });
    </script>

    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        })
    </script>

</body>

</html>