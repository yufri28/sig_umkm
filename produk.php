<?php

include './header.php';


$data_jenus = $koneksi->query("SELECT * FROM jenus WHERE nama_jenus != 'Default'");
if (isset($_GET['ju'])) {
    $id_ju = base64_decode($_GET['ju']);
    $data_produk = $koneksi->query("SELECT * FROM konten WHERE  jns_konten = 4 AND f_id_jenus = '$id_ju'");
} else {
    $data_produk = $koneksi->query("SELECT * FROM konten WHERE jns_konten = 4");
}
$num_rows = $data_produk->num_rows;
?>

<style>
    .daftar-list::-webkit-scrollbar {
        width: 0;
    }

    .daftar-list {
        overflow-x: auto;
    }
</style>
<div id="carouselExampleIndicators" class="carousel slide" style="margin-bottom: -120px;">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active text-white" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="./assets/images/banner1.jpg" style="height:50vh;" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Judul Gambar 1</h5>
            </div>
        </div>
        <div class="carousel-item">
            <img src="./assets/images/banner2.jpg" style="height:50vh;" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Judul Gambar 2</h5>
            </div>
        </div>
        <div class="carousel-item">
            <img src="./assets/images/1710246389_Penguins.jpg" style="height:50vh;" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Judul Gambar 3</h5>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<div class="container hero">
    <div class="row mb-5 d-flex justify-content-center">
        <div class="col-lg-10">
            <div class="row d-flex justify-content-center">
                <div class="mb-3">
                    <div class="">
                        <h2 class="card-title text-center" style="
                    font-family: 'DM Sans', sans-serif;
                    font-weight: bolder;
                  ">
                            UMKM
                        </h2>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <div class="d-flex daftar-list justify-content-lg-center col-10 mt-5">
                    <!-- Isi Konten UMKM -->
                    <div class="d-flex" style="white-space: nowrap;">
                        <?php foreach ($data_jenus as $key => $jenus) : ?>
                            <a href="?ju=<?= base64_encode($jenus['id_ju']); ?>" style="text-decoration: none;">
                                <div class="card text-center nowrap p-2 mx-1" style="font-size: 12pt; cursor:pointer; max-width: max-content;">
                                    <i class="fa" aria-hidden="true"> <?= $jenus['nama_jenus']; ?></i>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="row mt-3 d-flex justify-content-center" style="font-family: 'Open Sans', sans-serif; font-weight: 600">
                <?php if ($num_rows == 0) : ?>
                    <h4 class="text-center"><i>Data belum ada!</i></h4>
                <?php else : ?>
                    <?php foreach ($data_produk as $key => $produk) : ?>
                        <div class="card col-lg-3 m-1" style="width: 18rem" data-aos="fade-up" data-aos-duration="3000">
                            <img src="./assets/images/<?= $produk['gambar']; ?>" class="card-img-top pt-3" alt="..." />
                            <div class="card-body">
                                <h5 class="card-title fw-bold"><?= $produk['nm_konten']; ?></h5>
                                <p class="card-text">
                                    <?= $produk['deskripsi']; ?>
                                </p>
                                <div class="d-flex justify-content-center">
                                    <a href="#" class="btn btn-primary me-1">Detail</a>
                                    <a href="#" class="btn btn-secondary">Lokasi</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php include './footer.php'; ?>