<?php

include './header.php';

$data_produk = $koneksi->query("SELECT * FROM konten WHERE jns_konten = 4");

?>
<div id="carouselExampleIndicators" class="carousel slide" style="margin-bottom: -120px;">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active text-white"
            aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="./assets/images/1705587449_Screenshot (1).png" style="height:50vh;" class="d-block w-100"
                alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Judul Gambar 1</h5>
            </div>
        </div>
        <div class="carousel-item">
            <img src="./assets/images/1705587449_Screenshot (1).png" style="height:50vh;" class="d-block w-100"
                alt="...">
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
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="next">
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
            <div class="row mt-5 d-flex justify-content-center"
                style="font-family: 'Open Sans', sans-serif; font-weight: 600">
                <?php foreach ($data_produk as $key => $produk) : ?>
                <div class="card col-lg-3 m-1" style="width: 18rem">
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
            </div>
        </div>
    </div>
</div>
<?php include './footer.php'; ?>