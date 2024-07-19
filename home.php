<?php 

include './header.php';

$data_halaman_utama = $koneksi->query("SELECT * FROM konten WHERE jns_konten = 1")->fetch_assoc();
$data_visi = $koneksi->query("SELECT * FROM konten WHERE jns_konten = 2")->fetch_assoc();
$data_misi = $koneksi->query("SELECT * FROM konten WHERE jns_konten = 3")->fetch_assoc();

?>
<style>
#myBtn {
    position: fixed;
    bottom: 20px;
    right: 30px;
    z-index: 99;
    font-size: 18px;
    border: none;
    outline: none;
    color: white;
    cursor: pointer;
    padding: 15px;
    border-radius: 4px;
}

#myBtn:hover {
    background-color: #555;
}

/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

/* Firefox */
input[type=number] {
    -moz-appearance: textfield;
}
</style>
<div class="container hero col-12 mt-5 pt-5 text-center">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                class="active text-white" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                aria-label="Slide 4"></button>
        </div>
        <div class="carousel-inner" style="box-shadow: 0 4px 45px rgba(0, 0, 0, 0.2); border-radius: 10px;">
            <div class="carousel-item active">
                <img src="./assets/images/slide1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5></h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="./assets/images/slide2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5></h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="./assets/images/slide3.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5></h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="./assets/images/slide4.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5></h5>
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
</div>
<section class="my-lg-5">
    <div class="container col-10">
        <div class="row pb-5 d-flex justify-content-center"
            style="font-family: 'DM Sans', sans-serif; text-align:justify;">
            <div class="col-lg-5 mx-3"
                style="background-color:#C7B7A3; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); border-radius: 10px;">
                <div class="wrapper">
                    <h1 class="text-center my-5">Visi</h1>
                    <?= isset($data_visi['deskripsi'])?$data_visi['deskripsi']:'No Content'; ?>
                </div>
            </div>
            <div class="col-lg-5 mx-3 mt-lg-0 mt-3"
                style="background-color:#C7B7A3; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); border-radius: 10px;">
                <div class="wrapper">
                    <h1 class="text-center my-5">Misi</h1>
                    <?= isset($data_misi['deskripsi']) ?$data_misi['deskripsi']:'No Content'; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" id="myBtn" title="Go to top">Lihat
    detail usaha anda?</button>
<!-- Link to Bootstrap JS and Popper.js -->
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>-->
<!--</body>-->
<!--</html>-->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="./cek_data.php" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cek Data Usaha</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input class="form-control form-control-lg" type="number" name="nik" placeholder="Masukkan NIK">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" name="cekdata" class="btn btn-primary">Cek Data</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php include './footer.php';?>