<?php
session_start();
require_once '../config.php';
require_once './functions/home.php';
require_once './functions/usaha.php';
require_once './functions/kecamatan.php';
require_once './functions/deskel.php';
require_once './functions/sektor_usaha.php';
require_once './functions/klasifikasi_usaha.php';
require_once './functions/jenis_usaha.php';
require_once './functions/pengaturan.php';
require_once './functions/faq.php';
if (!isset($_SESSION['login']) && $_SESSION['login'] != true) {
    header("Location: ../index.php");
}

$data_level = "Administrator";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIG UMKM TTU</title>
    <link rel="icon" href="../assets/dist/img/logo_dinas.png">
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
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
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
                                <?php echo $_SESSION['username']; ?>
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
                <span class="brand-text"> SIG UMKM TTU</span>
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
                            <?php echo $_SESSION['username']; ?>
                        </a>
                        <span class="badge badge-success">
                            <?php echo $_SESSION['level']; ?>
                        </span>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

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
                            <a href="?page=data-usaha"
                                class="nav-link <?= isset($_GET['page']) ? ($_GET['page'] == 'data-usaha' ? 'active' : '') : '' ?>">
                                <i class="nav-icon far fa fa-table"></i>
                                <p>
                                    Data Usaha
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?page=data-kecamatan"
                                class="nav-link <?= isset($_GET['page']) ? ($_GET['page'] == 'data-kecamatan' || $_GET['page'] == 'add-kecamatan' || $_GET['page'] == 'edit-kecamatan' || $_GET['page'] == 'view-kecamatan' ? 'active' : '') : '' ?>">
                                <i class="nav-icon far fa fa-table"></i>
                                <p>
                                    Kecamatan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?page=data-deskel"
                                class="nav-link <?= isset($_GET['page']) ? ($_GET['page'] == 'data-deskel' || $_GET['page'] == 'add-deskel' || $_GET['page'] == 'edit-deskel' || $_GET['page'] == 'view-deskel' ? 'active' : '') : '' ?>">
                                <i class="nav-icon far fa fa-table"></i>
                                <p>
                                    Desa/Kelurahan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?page=data-su"
                                class="nav-link <?= isset($_GET['page']) ? ($_GET['page'] == 'data-su' || $_GET['page'] == 'add-su' || $_GET['page'] == 'edit-su' || $_GET['page'] == 'view-su' ? 'active' : '') : '' ?>">
                                <i class="nav-icon far fa fa-table"></i>
                                <p>
                                    Sektor Usaha
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?page=data-ku"
                                class="nav-link <?= isset($_GET['page']) ? ($_GET['page'] == 'data-ku' || $_GET['page'] == 'add-ku' || $_GET['page'] == 'edit-ku' || $_GET['page'] == 'view-ku' ? 'active' : '') : '' ?>">
                                <i class="nav-icon fa fa-object-group" aria-hidden="true"></i>
                                <p>
                                    Klasifikasi Usaha
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?page=data-ju"
                                class="nav-link <?= isset($_GET['page']) ? ($_GET['page'] == 'data-ju' || $_GET['page'] == 'add-ju' || $_GET['page'] == 'edit-ju' || $_GET['page'] == 'view-ju' ? 'active' : '') : '' ?>">
                                <i class="nav-icon fa fa-table" aria-hidden="true"></i>
                                <p>
                                    Jenis Usaha
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?page=data-faq"
                                class="nav-link <?= isset($_GET['page']) ? ($_GET['page'] == 'data-faq' || $_GET['page'] == 'add-faq' || $_GET['page'] == 'edit-faq' || $_GET['page'] == 'view-faq' ? 'active' : '') : '' ?>">
                                <i class="nav-icon fa fa-table" aria-hidden="true"></i>
                                <p>
                                    FAQ
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">Setting</li>
                        <li class="nav-item">
                            <a href="?page=data-pengguna"
                                class="nav-link <?= isset($_GET['page']) ? ($_GET['page'] == 'data-pengguna' ? 'active' : '') : '' ?>">
                                <i class="nav-icon far fa-user"></i>
                                <p>
                                    Administrator
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?page=data-pengaturan"
                                class="nav-link <?= isset($_GET['page']) ? ($_GET['page'] == 'data-pengaturan' ? 'active' : '') : '' ?>">
                                <i class="nav-icon fa fa-wrench"></i>
                                <p>
                                    Pengaturan Web
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
                            <a href="?page=data-pegawai"
                                class="nav-link <?= isset($_GET['page']) ? ($_GET['page'] == '-' ? 'active' : '') : '' ?>">
                                <i class="nav-icon far fa fa-users"></i>
                                <p>
                                    -
                                </p>
                            </a>
                        </li>

                        <li class="nav-header">Setting</li>

                        <?php
                        }
                        ?>

                        <li class="nav-item">
                            <a onclick="return confirm('Apakah anda yakin akan keluar ?')" href="../auth/logout.php"
                                class="nav-link">
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
                            case 'view-usaha':
                                include "./data_usaha/view_usaha.php";
                                break;

                                //Kecamatan
                            case 'data-kecamatan':
                                include "./kecamatan/data_kecamatan.php";
                                break;
                            case 'add-kecamatan':
                                include "./kecamatan/add_kecamatan.php";
                                break;
                            case 'edit-kecamatan':
                                include "./kecamatan/edit_kecamatan.php";
                                break;
                            case 'del-kecamatan':
                                include "./kecamatan/del_kecamatan.php";
                                break;
                            case 'view-kecamatan':
                                include "./kecamatan/view_kecamatan.php";
                                break;

                                //deskel
                            case 'data-deskel':
                                include "./deskel/data_deskel.php";
                                break;
                            case 'add-deskel':
                                include "./deskel/add_deskel.php";
                                break;
                            case 'edit-deskel':
                                include "./deskel/edit_deskel.php";
                                break;
                            case 'del-deskel':
                                include "./deskel/del_deskel.php";
                                break;
                            case 'view-deskel':
                                include "./deskel/view_deskel.php";
                                break;

                                //Sektor Usaha
                            case 'data-su':
                                include "./sektor_usaha/data_su.php";
                                break;
                            case 'add-su':
                                include "./sektor_usaha/add_su.php";
                                break;
                            case 'edit-su':
                                include "./sektor_usaha/edit_su.php";
                                break;
                            case 'del-su':
                                include "./sektor_usaha/del_su.php";
                                break;
                            case 'view-su':
                                include "./sektor_usaha/view_su.php";
                                break;

                                //Klasifikasi Usaha
                            case 'data-ku':
                                include "./klasifikasi_usaha/data_ku.php";
                                break;
                            case 'add-ku':
                                include "./klasifikasi_usaha/add_ku.php";
                                break;
                            case 'edit-ku':
                                include "./klasifikasi_usaha/edit_ku.php";
                                break;
                            case 'del-ku':
                                include "./klasifikasi_usaha/del_ku.php";
                                break;
                            case 'view-ku':
                                include "./klasifikasi_usaha/view_ku.php";
                                break;

                                //Jenis Usaha
                            case 'data-ju':
                                include "./jenis_usaha/data_ju.php";
                                break;
                            case 'add-ju':
                                include "./jenis_usaha/add_ju.php";
                                break;
                            case 'edit-ju':
                                include "./jenis_usaha/edit_ju.php";
                                break;
                            case 'del-ju':
                                include "./jenis_usaha/del_ju.php";
                                break;
                            case 'view-ju':
                                include "./jenis_usaha/view_ju.php";
                                break;

                                //konten
                            case 'data-pengaturan':
                                include "./pengaturan/data_pengaturan.php";
                                break;
                            case 'add-pengaturan':
                                include "./pengaturan/add_pengaturan.php";
                                break;
                            case 'edit-pengaturan':
                                include "./pengaturan/edit_pengaturan.php";
                                break;
                            case 'del-pengaturan':
                                include "./pengaturan/del_pengaturan.php";
                                break;
                            case 'view-pengaturan':
                                include "./pengaturan/view_pengaturan.php";
                                break;

                                //FAQ
                            case 'data-faq':
                                include "./faq/data_faq.php";
                                break;
                            case 'add-faq':
                                include "./faq/add_faq.php";
                                break;
                            case 'edit-faq':
                                include "./faq/edit_faq.php";
                                break;
                            case 'del-faq':
                                include "./faq/del_faq.php";
                                break;
                            case 'view-faq':
                                include "./faq/view_faq.php";
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
            <div class="float-left d-none d-sm-block">
                <a target="_blank" href="https://www.instagram.com/yufrii__/">
                    <strong> yupii </strong>
                </a>
            </div>
            <b> &copy; <span id="currentYear"></span> </b>
            <script>
            // Mengambil tahun saat ini
            var currentYear = new Date().getFullYear();

            // Menampilkan tahun dalam elemen dengan id "currentYear"
            document.getElementById("currentYear").textContent = currentYear;
            </script>
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

    <script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
    </script>


</body>

</html>