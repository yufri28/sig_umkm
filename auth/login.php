<?php
session_start();
if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
    header("Location: ../admin/index.php");
}
require_once '../config.php';

// Memproses inputan dari form login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cekAdmin = $koneksi->query("SELECT * FROM admin a JOIN jenis_user ju ON a.id_jenus=ju.id_jenus WHERE a.uname='$username'");

    if (mysqli_num_rows($cekAdmin) > 0) {
        $fetch = mysqli_fetch_assoc($cekAdmin);
        $password_hash = password_verify($password, $fetch['password']);
        if ($cekAdmin && $password_hash) {
            $_SESSION['login'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['level'] = $fetch['level'];
            $_SESSION['id_user'] = $fetch['id_admin'];
            // Jika role nya admin, redirect ke halaman index.php
            header("Location: ../admin/index.php");
            exit();
        } else {
            $_SESSION['error'] = 'Login Gagal';
        }
    }
    if (!mysqli_num_rows($cekPelamar) > 0 && !mysqli_num_rows($cekAdmin) > 0) {
        $_SESSION['error'] = 'Login Gagal';
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="../assets/dist/img/logo_dinas.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;700;800&family=Prompt&family=Righteous&family=Roboto:wght@500&display=swap"
        rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link href="../assets/DataTables/datatables.min.css" rel="stylesheet" />
</head>

<body>
    <?php if (isset($_SESSION['success'])) : ?>
    <script>
    Swal.fire({
        title: 'Sukses!',
        text: '<?php echo $_SESSION['success']; ?>',
        icon: 'success',
        confirmButtonText: 'OK'
    });
    </script>
    <?php unset($_SESSION['success']); // Menghapus session setelah ditampilkan 
        ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['error'])) : ?>
    <script>
    Swal.fire({
        title: 'Error!',
        text: '<?php echo $_SESSION['error']; ?>',
        icon: 'error',
        confirmButtonText: 'OK'
    });
    </script>
    <?php unset($_SESSION['error']); // Menghapus session setelah ditampilkan 
        ?>
    <?php endif; ?>
    <!-- Section: Design Block -->
    <section class="">
        <!-- Jumbotron -->
        <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
            <div class="container" style="height:100vh;">
                <div class="row gx-lg-5 d-flex mt-5 justify-content-center align-items-center">
                    <div class="col-lg-5 mb-5 mb-lg-0">
                        <div class="card">
                            <div class="card-body py-5 px-md-5">
                                <h4 class="mt-2 mb-4 text-center">DINAS KOPERASI & UMKM KABUPATEN TIMOR TENGAH UTARA
                                </h4>
                                <div class="col-12 d-flex justify-content-center mb-3">
                                    <img src="../assets/images/1705585762_logo_kab.ttu-removebg-preview.png" alt=""
                                        style="width: 200px; height: 200px;">
                                </div>
                                <form method="post" action="">
                                    <!-- Email input -->
                                    <div class="form-outline mb-4">
                                        <!-- <label class="form-label" for="username">Username</label> -->
                                        <div class="d-flex">
                                            <div class="col-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                                                    fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                                    <path fill-rule="evenodd"
                                                        d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                                                </svg>
                                            </div>
                                            <div class="col-10">
                                                <input type="text" id="username" placeholder="USERNAME" required
                                                    name="username" class="form-control" />
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Password input -->
                                    <div class="form-outline mb-4">
                                        <!-- <label class="form-label" for="password">Password</label> -->
                                        <div class="d-flex">
                                            <div class="col-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                                                    fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2M2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                                                </svg>
                                            </div>
                                            <div class="col-10">
                                                <input type="password" id="password" placeholder="******" required
                                                    name="password" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Submit button -->
                                    <button type="submit" name="login" class="btn col-12 btn-primary btn-block mb-3">
                                        Login
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Jumbotron -->
    </section>
</body>


</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
</script>

<script src="../assets/DataTables/jquery.js"></script>
<script src="../assets/DataTables/datatables.min.js"></script>
<!-- Sweet Alert -->
<script>