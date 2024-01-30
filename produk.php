<?php

include './header.php';

$data_produk = $koneksi->query("SELECT * FROM konten WHERE jns_konten = 4");

?>
<div class="container hero" style="height: 100vh;">
    <div class="row my-5 d-flex justify-content-center">
        <div class="col-lg-10">
            <div class="row d-flex justify-content-center">
                <div class="mb-3">
                    <div class="">
                        <h2 class="card-title text-center" style="
                    font-family: 'DM Sans', sans-serif;
                    font-weight: bolder;
                  ">
                            Produk
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row mt-5 d-flex justify-content-center" style="font-family: 'Open Sans', sans-serif; font-weight: 600">
                <?php foreach ($data_produk as $key => $produk) : ?>
                    <div class="card col-lg-3 m-1" style="width: 18rem">
                        <img src="./assets/images/<?= $produk['gambar']; ?>" class="card-img-top pt-3" alt="..." />
                        <div class="card-body">
                            <h5 class="card-title fw-bold"><?= $produk['nm_konten']; ?></h5>
                            <p class="card-text">
                                <?= $produk['deskripsi']; ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<?php include './footer.php'; ?>