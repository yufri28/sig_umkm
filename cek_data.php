<?php 

include './header.php';

$data_usaha = [];
if(isset($_POST['cekdata'])){
    $nik = htmlspecialchars($_POST['nik']);
    $data_usaha = $koneksi->query("SELECT *, u.polygon AS polygon_usaha FROM usaha u 
                                    JOIN deskel d ON u.id_deskel=d.id_deskel 
                                    JOIN sektor_usaha su ON u.id_su=su.id_su 
                                    JOIN kecamatan k ON d.id_kec=k.id_kec 
                                    JOIN klasifikasi_usaha ku ON u.id_ku=ku.id_ku
                                    JOIN jenus ju ON u.jns_ush=ju.id_ju 
                                    WHERE nik = '$nik'");
}
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
<section class="my-lg-5">
    <div class="container" style="margin-bottom: 350px;">
        <div class="row pb-5 d-flex align-items-center justify-content-center"
            style="font-family: 'DM Sans', sans-serif; text-align: justify;">
            <div class="card col-lg-10 mt-5 mb-5"
                style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); border-radius: 10px;">
                <?php if(!empty($data_usaha)):?>
                <div class=" table-responsive">
                    <table class="table my-5 table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Usaha</th>
                                <th scope="col">Pemilik</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;?>

                            <?php foreach ($data_usaha as $key => $value):?>
                            <tr>
                                <th scope="row"><?=$i++?>.</th>
                                <td><?=$value['nm_usaha'];?></td>
                                <td><?=$value['nm_pemilik'];?></td>
                                <td>
                                    <button type="button" data-bs-target="#details<?=$value['id_datum'];?>"
                                        data-bs-toggle="modal" class="btn btn-sm btn-primary">Detail</button>
                                </td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
                <?php else:?>
                <h1 class="text-center my-5">Tidak ada data yang ditemukan</h1>
                <?php endif;?>
            </div>
        </div>
    </div>
</section>
<?php foreach ($data_usaha as $key => $value):?>
<div class="modal fade" tabindex="-1" id="details<?=$value['id_datum'];?>" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Data Usaha</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card card-info">
                    <div class="card-body p-0">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td style="width: 150px">
                                        <b>Nama Usaha</b>
                                    </td>
                                    <td>:
                                        <?php echo $value['nm_usaha']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 150px">
                                        <b>Kecamatan</b>
                                    </td>
                                    <td>:
                                        <?php echo $value['nm_kec']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 150px">
                                        <b>Desa/Kelurahan</b>
                                    </td>
                                    <td>:
                                        <?php echo $value['nm_deskel']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 150px">
                                        <b>Nama Sektor Usaha</b>
                                    </td>
                                    <td>:
                                        <?php echo $value['nm_su']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 150px">
                                        <b>Nama Klasifikasi Usaha</b>
                                    </td>
                                    <td>:
                                        <?php echo $value['nm_ku']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 150px">
                                        <b>Tahun Pembentukan</b>
                                    </td>
                                    <td>:
                                        <?php echo $value['thn_pmtkn']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 150px">
                                        <b>Jenis Usaha</b>
                                    </td>
                                    <td>:
                                        <?php echo $value['nama_jenus']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 150px">
                                        <b>Izin Usaha Yang Dimiliki</b>
                                    </td>
                                    <td>:
                                        <?php echo $value['nmr_izin']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 150px">
                                        <b>Nama Pemilik</b>
                                    </td>
                                    <td>:
                                        <?php echo $value['nm_pemilik']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 150px">
                                        <b>Alamat</b>
                                    </td>
                                    <td>:
                                        <?php echo $value['alamat']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 150px">
                                        <b>TK Laki-laki</b>
                                    </td>
                                    <td>:
                                        <?php echo $value['tng_kerja_lki']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 150px">
                                        <b>TK Perempuan</b>
                                    </td>
                                    <td>:
                                        <?php echo $value['tng_kerja_prmpn']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 150px">
                                        <b>Modal Sendiri</b>
                                    </td>
                                    <td>:
                                        <?php echo formatRupiah($value['mdl_sendiri']); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 150px">
                                        <b>Modal Luar</b>
                                    </td>
                                    <td>:
                                        <?php echo formatRupiah($value['mdl_luar']); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 150px">
                                        <b>Asset</b>
                                    </td>
                                    <td>:
                                        <?php echo formatRupiah($value['asset']); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 150px">
                                        <b>Omset</b>
                                    </td>
                                    <td>:
                                        <?php echo formatRupiah($value['omset']); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 150px">
                                        <b>No Telepon</b>
                                    </td>
                                    <td>:
                                        <?= $value['no_telpon']??'-'; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 150px"><b>Gambar</b></td>
                                    <td>:
                                        <?php if (!empty($value['gambar'])): ?>
                                        <img src="../assets/images/<?= $value['gambar']; ?>"
                                            style="max-width: 100px; max-height: 100px;" alt="Gambar">
                                        <?php else: ?>
                                        -
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 150px"><b>KTP</b></td>
                                    <td>:
                                        <?php if (!empty($value['ktp'])): ?>
                                        <img src="./assets/file/<?= $value['ktp']; ?>"
                                            style="max-width: 100px; max-height: 100px;" alt="KTP">
                                        <?php else: ?>
                                        -
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 150px"><b>Surat Izin Usaha</b></td>
                                    <td>:
                                        <?php if (!empty($value['surat_izin_usaha'])): ?>
                                        <a href="./assets/file/<?= $value['surat_izin_usaha']; ?>"
                                            download><?= $value['surat_izin_usaha']; ?></a>
                                        <?php else: ?>
                                        -
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <a href="home.php" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>
</div>
<?php endforeach;?>
<?php include './footer.php';?>