<?php 

include './header.php';

$data_halaman_utama = $koneksi->query("SELECT * FROM konten WHERE jns_konten = 1")->fetch_assoc();
$data_visi = $koneksi->query("SELECT * FROM konten WHERE jns_konten = 2")->fetch_assoc();
$data_misi = $koneksi->query("SELECT * FROM konten WHERE jns_konten = 3")->fetch_assoc();

?>
<div class="container hero">
    <div class="row my-5 d-flex justify-content-center">
        <div class="col-lg-6 d-flex align-items-center">
            <div class="container">
                <div class="wrapper py-4">
                    <img src="./assets/images/<?= isset($data_halaman_utama['gambar']) ? $data_halaman_utama['gambar']:''; ?>"
                        alt="Logo" width="330" height="324" class="d-inline-block align-text-top" />
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="container">
                <div class="wrapper py-4" style="font-family: roboto;">
                    <?= isset($data_halaman_utama['deskripsi']) ?$data_halaman_utama['deskripsi']:'No Content'; ?>
                </div>

                <!-- <a href="" class="btn btn-warning fw-bolder">CARA MENDAFTAR USAHA ANDA</a> -->
            </div>
        </div>
    </div>
</div>
<section class="bg-light my-5">
    <div class="container col-10">
        <div class="row pb-5 d-flex justify-content-center" style="font-family: 'DM Sans', sans-serif;">
            <div class="col-lg-6">
                <div class="wrapper">
                    <h1 class="text-center my-5">Visi</h1>
                    <?= isset($data_visi['deskripsi'])?$data_visi['deskripsi']:'No Content'; ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="wrapper">
                    <h1 class="text-center my-5">Misi</h1>
                    <?= isset($data_misi['deskripsi']) ?$data_misi['deskripsi']:'No Content'; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include './footer.php';?>