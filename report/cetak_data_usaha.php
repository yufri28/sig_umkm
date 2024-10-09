<?php
session_start();

require_once '../config.php';
include '../admin/functions/usaha.php';

$sql =array();
// if(isset($_POST['cetak_usaha'])){
//     $kecamatan = htmlspecialchars($_POST['kecamatan']);
//     $tanggal_awal = htmlspecialchars($_POST['tanggal_awal']);
//     $tanggal_akhir = htmlspecialchars($_POST['tanggal_akhir']);

//     if($kecamatan != '' && $tanggal_awal != '' && $tanggal_akhir != ''){
//         $sql = $Usaha->getBy($kecamatan, $tanggal_awal, $tanggal_akhir);
//     }elseif($tanggal_awal != '' && $tanggal_akhir != ''){
//         $sql = $Usaha->getByDate($tanggal_awal, $tanggal_akhir);
//     }elseif($kecamatan != ''){
//         $sql = $Usaha->getByKecamatan($kecamatan);
//     }else{
//         if($tanggal_awal != '' && $tanggal_akhir == ''){
//             echo "<script>alert('Tanggal akhir tidak boleh kosong jika tanggal awal terisi!');window.location.href='../admin/index.php?page=data-usaha'</script>";
//         }
//         elseif($tanggal_awal == '' && $tanggal_akhir != ''){
//             echo "<script>alert('Tanggal awal tidak boleh kosong jika tanggal akhir terisi!');window.location.href='../admin/index.php?page=data-usaha'</script>";
//         }
//         $sql = $Usaha->get();
//     }
// }
if (isset($_POST['cetak_usaha'])) {
    $kecamatan = htmlspecialchars($_POST['kecamatan']);
    $tahun_pembentukan = htmlspecialchars($_POST['tahun_pembentukan']);
    $jenus = htmlspecialchars($_POST['jenus']);
    $sektor_usaha = htmlspecialchars($_POST['sektor_usaha']);
    $klasifikasi_usaha = htmlspecialchars($_POST['klasifikasi_usaha']);

    // Inisialisasi query
    if ($kecamatan != '' || $tahun_pembentukan != '' || $jenus != '' || $sektor_usaha != '' || $klasifikasi_usaha != '') {
        // Jika semua kriteria terisi
        $sql = $Usaha->filterBy($kecamatan, $tahun_pembentukan, $jenus, $sektor_usaha, $klasifikasi_usaha);
    } else {
        // Jika tidak ada kriteria terisi, tampilkan semua data
        $sql = $Usaha->get();
    }
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>CETAK DATA USAHA</title>
    <!-- Alert -->
    <script src="../assets/plugins/alert.js"></script>
    <style>
    .header {
        text-align: center;
        margin: 0 auto;
        width: 80%;
    }

    .header-content {
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 20px 0;
    }

    .header-logo img {
        width: 100px;
        height: 100px;
    }

    .header-text {
        margin-left: 20px;
        text-align: left;
    }

    .header h2,
    .header h3 {
        margin: 0;
    }

    hr {
        border: 1px solid black;
        margin-top: 20px;
    }

    .titik-dua {
        text-align: center;
    }

    th {
        padding: 5px 0;
    }

    td {
        padding-left: 7px;
    }

    table {
        font-size: 5pt;
    }
    </style>
</head>

<body>
    <div class="header">
        <div class="header-content">
            <div class="header-logo">
                <img src="../assets/dist/img/logo_dinas.png" alt="Logo Dinas">
            </div>
            <div class="header-text">
                <h2>DINAS KOPERASI & UMKM KAB. TTU</h2>
                <h3>Jl. Eltari, Kefamenanu Selatan, Kec. Kota Kefamenanu, Kabupaten Timor Tengah Utara, Nusa Tenggara
                    Timur
                </h3>
            </div>
        </div>
        <hr>
        <?php
        $no = 1;
        if (mysqli_num_rows($sql) < 1) {
            echo "<script>alert('Tidak ada data yang dapat dicetak!');window.location.href='../admin/index.php?page=data-usaha'</script>";
        }
        echo "<h4><u>DATA USAHA</u></h4>";
        ?>
    </div>

    <table border="1" cellspacing="0" style="width: 100%; border-collapse: collapse; text-wrap:wrap;" align="center">
        <thead>
            <tr style="text-align: center;">
                <th style="padding: 15px;">No</th>
                <th style="padding: 15px;">Gambar</th>
                <th style="padding: 15px;">Nama Usaha</th>
                <th style="padding: 5px;">Kecamatan</th>
                <th style="padding: 20px;">Desa/Kelurahan</th>
                <th style="padding: 20px;">Sektor Usaha</th>
                <th style="padding: 5px;">Klasifikasi Usaha</th>
                <th style="padding: 5px;">Tahun Pembentukan</th>
                <th style="padding: 5px;">Jenis Usaha</th>
                <th style="padding: 5px;">Izin Usaha</th>
                <th style="padding: 5px;">Nama Pemilik</th>
                <th style="padding: 5px;">Alamat</th>
                <th style="padding: 15px;">TK. Laki-Laki</th>
                <th style="padding: 15px;">TK. Perempuan</th>
                <th style="padding: 15px;">Modal Sendiri</th>
                <th style="padding: 15px;">Modal Luar</th>
                <th style="padding: 15px;">Asset</th>
                <th style="padding: 15px;">Omset</th>
                <th style="padding: 15px;">No.Telp</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($data = mysqli_fetch_array($sql, MYSQLI_BOTH)) : ?>
            <tr>
                <td>
                    <?= $no++; ?>.
                </td>
                <td>
                    <img height="100" width="100"
                        src="../assets/<?= $data['gambar'] == NULL?'img/no-image.svg':'images/'.$data['gambar']; ?>"
                        alt="">
                </td>
                <td>
                    <?php echo $data['nm_usaha']; ?>
                </td>
                <td>
                    <?php echo $data['nm_kec']; ?>
                </td>
                <td>
                    <?php echo $data['nm_deskel']; ?>
                </td>
                <td>
                    <?php echo $data['nm_su']; ?>
                </td>
                <td>
                    <?php echo $data['nm_ku']; ?>
                </td>
                <td>
                    <?php echo $data['thn_pmtkn']; ?>
                </td>
                <td>
                    <?php echo $data['nama_jenus']; ?>
                </td>
                <td>
                    <?php echo $data['nmr_izin']; ?>
                </td>
                <td>
                    <?php echo $data['nm_pemilik']; ?>
                </td>
                <td class="text-wrap">
                    <?php echo $data['alamat']; ?>
                </td>
                <td>
                    <?php echo $data['tng_kerja_lki']; ?>
                </td>
                <td>
                    <?php echo $data['tng_kerja_prmpn']; ?>
                </td>
                <td>
                    <?php echo $data['mdl_sendiri']; ?>
                </td>
                <td>
                    <?php echo $data['mdl_luar']; ?>
                </td>
                <td>
                    <?php echo $data['asset']; ?>
                </td>
                <td>
                    <?php echo $data['omset']; ?>
                </td>
                <td>
                    <?= $data['no_telpon'] == NULL?'-':$data['no_telpon']; ?>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <script>
    window.print();
    </script>

</body>

</html>