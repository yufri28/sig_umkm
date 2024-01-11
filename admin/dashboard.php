<?php

$jumlah_usaha = 0;
$jumlah_kecamatan = 0;
$jumlah_deskel = 0;
$jumlah_sektor_usaha = 0;
$jumlah_klasifikasi_usaha = 0;
$data = $Home->index();

if($data != NULL){
    $jumlah_usaha = $data['jumlah_usaha'];
    $jumlah_kecamatan = $data['jumlah_kecamatan'];
    $jumlah_deskel = $data['jumlah_deskel'];
    $jumlah_sektor_usaha = $data['jumlah_sektor_usaha'];
    $jumlah_klasifikasi_usaha = $data['jumlah_klasifikasi_usaha'];
}


?>

<div class="row">
    <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>
                    <?= $jumlah_usaha == NULL ? 0 : $jumlah_usaha;  ?>
                </h3>

                <h1>Jumlah Usaha</h1>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="index.php?page=data-usaha" class="small-box-footer">Selengkapnya
                <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>
                    <?= $jumlah_kecamatan;  ?>
                </h3>

                <h1>Kecamatan</h1>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="index.php?page=data-kecamatan" class="small-box-footer">Selengkapnya <i
                    class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>
                    <?= $jumlah_deskel; ?>
                </h3>

                <h1>Desa/Kelurahan</h1>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="index.php?page=data-deskel" class="small-box-footer">Selengkapnya <i
                    class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>
                    <?= $jumlah_sektor_usaha;  ?>
                </h3>

                <h1>Sektor Usaha</h1>
            </div>
            <div class="icon">
                <i class="ion ion-android-happy"></i>
            </div>
            <a href="index.php?page=data-su" class="small-box-footer">Selengkapnya <i
                    class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-secondary">
            <div class="inner">
                <h3>
                    <?= $jumlah_klasifikasi_usaha;  ?>
                </h3>
                <h1>Klasifikasi Usaha</h1>
            </div>
            <div class="icon">
                <i class="ion ion-android-happy"></i>
            </div>
            <a href="index.php?page=data-ku" class="small-box-footer">Selengkapnya <i
                    class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>