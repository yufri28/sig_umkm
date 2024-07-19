<?php
// Konfigurasi database
define('DB_HOST', 'localhost'); // Ganti dengan host database Anda
define('DB_USERNAME', 'root'); // Ganti dengan username database Anda
define('DB_PASSWORD', ''); // Ganti dengan password database Anda
define('DB_NAME', 'sig_umkm'); // Ganti dengan nama database Anda

// Konfigurasi URL
define('BASE_URL', 'http://dinkopukm-ttu.biz.id/'); // Ganti dengan URL dasar website Anda

// Fungsi untuk menghubungkan ke database
function connectDatabase()
{
    $conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if ($conn->connect_error) {
        die("Koneksi database gagal: " . $conn->connect_error);
    }

    return $conn;
}

$koneksi = connectDatabase();
$url = $_SERVER['REQUEST_URI'];
$segments = explode('/', rtrim($url, '/'));
$last_segment = end($segments);

function cleanRupiah($rupiah) {
    // Remove "Rp.", spaces, and dots
    $cleaned = str_replace(['Rp', '.', ' '], '', $rupiah);
    return intval($cleaned);
}

function formatRupiah($angka) {
    // Ensure that the input is a valid number
    $angka = (int)$angka;
    return 'Rp' . number_format($angka, 0, ',', '.');
}

function tentukanKategoriBisnis($jumlahKaryawan, $aset, $omset, $klasifikasi_usaha) {
    foreach ($klasifikasi_usaha as $kategori) {
        if ($jumlahKaryawan >= $kategori['min_tk'] && $jumlahKaryawan <= $kategori['max_tk'] &&
            $aset >= $kategori['min_aset'] && $aset <= $kategori['max_aset'] &&
            $omset >= $kategori['min_omset'] && $omset <= $kategori['max_omset']) {
            return $kategori['id_ku'];
        }
    }
    return false;
}