<?php
require_once 'config.php';
$sqlCekJenus = "SELECT * FROM jenis_user WHERE level='admin'";
$resCekJenus = $koneksi->query($sqlCekJenus);

if($resCekJenus->num_rows < 1){
    $sql1 = "INSERT INTO jenis_user (nama_jenus,level)VALUES('Admin','admin')";
    $result1 = $koneksi->query($sql1);
}
sleep(0.7);
$sql = "SELECT * FROM admin a JOIN jenis_user ju WHERE ju.level='admin'";
$res = $koneksi->query($sql);
if($res->num_rows < 1){
    $sqlJenus = "SELECT * FROM jenis_user WHERE level='admin'";
    $resJenus = $koneksi->query($sqlJenus)->fetch_assoc();
    $id_jenus = $resJenus['id_jenus'];
    $password_hash = password_hash("admin",PASSWORD_BCRYPT);
    if($resJenus != null){
        $sql2 = "INSERT INTO admin (id_admin,uname,password,id_jenus) VALUES (0,'Admin','$password_hash','$id_jenus')";
        $result2 = $koneksi->query($sql2);
    }
}
// Mengambil URL yang dikirimkan melalui aturan rewriting
$url = isset($_GET['url']) ? $_GET['url'] : '';

// Mengonversi URL menjadi array dengan memisahkan setiap segment
$urlSegments = explode('/', rtrim($url, '/'));

/// Menentukan halaman yang akan ditampilkan berdasarkan URL
if (empty($urlSegments[0])) {
    // Jika URL kosong, tampilkan halaman beranda
    require_once 'home.php';
} elseif ($urlSegments[0] === 'admin') {
    // Jika URL dimulai dengan "admin", arahkan ke halaman admin
    if (isset($urlSegments[1])) {
        $adminPage = 'admin/' . $urlSegments[1] . '.php';
        if (file_exists($adminPage)) {
            require_once $adminPage;
        } else {
            header("Location: ../404.php");
            exit;
        }
    } else {
        header("Location: ../404.php");
        exit;
    }
} elseif ($urlSegments[0] === 'user') {
    // Jika URL dimulai dengan "user", arahkan ke halaman pengguna biasa
    if (isset($urlSegments[1])) {
        $userPage = 'user/' . $urlSegments[1] . '.php';
        if (file_exists($userPage)) {
            require_once $userPage;
        } else {
            header("Location: ../404.php");
            exit;
        }
    } else {
        header("Location: ../404.php");
        exit;
    }
} else {
    // Jika URL tidak cocok dengan kondisi di atas, tampilkan halaman 404
    header("Location: 404.php");
    exit;
}