<?php

if (isset($_GET['kode'])) {
    $sql_cek = $Usaha->getById($_GET['kode']);
    $data_cek = mysqli_fetch_array($sql_cek, MYSQLI_BOTH);
}
?>
<div class="row">
    <div class="col-md-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Detail Usaha</h3>

                <div class="card-tools">
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table">
                    <tbody>
                        <tr>
                            <td style="width: 150px">
                                <b>Nama Usaha</b>
                            </td>
                            <td>:
                                <?php echo $data_cek['nm_usaha']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 150px">
                                <b>Kecamatan</b>
                            </td>
                            <td>:
                                <?php echo $data_cek['nm_kec']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 150px">
                                <b>Desa/Kelurahan</b>
                            </td>
                            <td>:
                                <?php echo $data_cek['nm_deskel']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 150px">
                                <b>Nama Sektor Usaha</b>
                            </td>
                            <td>:
                                <?php echo $data_cek['nm_su']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 150px">
                                <b>Nama Klasifikasi Usaha</b>
                            </td>
                            <td>:
                                <?php echo $data_cek['nm_su']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 150px">
                                <b>Tahun Pembentukan</b>
                            </td>
                            <td>:
                                <?php echo $data_cek['thn_pmtkn']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 150px">
                                <b>Jenis Usaha</b>
                            </td>
                            <td>:
                                <?php echo $data_cek['nama_jenus']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 150px">
                                <b>Izin Usaha Yang Dimiliki</b>
                            </td>
                            <td>:
                                <?php echo $data_cek['nmr_izin']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 150px">
                                <b>Nama Pemilik</b>
                            </td>
                            <td>:
                                <?php echo $data_cek['nm_pemilik']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 150px">
                                <b>Alamat</b>
                            </td>
                            <td>:
                                <?php echo $data_cek['alamat']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 150px">
                                <b>TK Laki-laki</b>
                            </td>
                            <td>:
                                <?php echo $data_cek['tng_kerja_lki']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 150px">
                                <b>TK Perempuan</b>
                            </td>
                            <td>:
                                <?php echo $data_cek['tng_kerja_prmpn']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 150px">
                                <b>Modal Sendiri</b>
                            </td>
                            <td>:
                                <?php echo $data_cek['mdl_sendiri']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 150px">
                                <b>Modal Luar</b>
                            </td>
                            <td>:
                                <?php echo $data_cek['mdl_luar']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 150px">
                                <b>Asset</b>
                            </td>
                            <td>:
                                <?php echo $data_cek['asset']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 150px">
                                <b>Omset</b>
                            </td>
                            <td>:
                                <?php echo $data_cek['omset']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 150px">
                                <b>No Telepon</b>
                            </td>
                            <td>:
                                <?= $data_cek['no_telpon']??'-'; ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 150px"><b>Gambar</b></td>
                            <td>:
                                <?php if (!empty($data_cek['gambar'])): ?>
                                <img src="../assets/images/<?= $data_cek['gambar']; ?>"
                                    style="max-width: 100px; max-height: 100px;" alt="Gambar">
                                <?php else: ?>
                                -
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 150px"><b>KTP</b></td>
                            <td>:
                                <?php if (!empty($data_cek['ktp'])): ?>
                                <img src="../assets/file/<?= $data_cek['ktp']; ?>"
                                    style="max-width: 100px; max-height: 100px;" alt="KTP">
                                <?php else: ?>
                                -
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 150px"><b>Surat Izin Usaha</b></td>
                            <td>:
                                <?php if (!empty($data_cek['surat_izin_usaha'])): ?>
                                <a href="../assets/file/<?= $data_cek['surat_izin_usaha']; ?>"
                                    download><?= $data_cek['surat_izin_usaha']; ?></a>
                                <?php else: ?>
                                -
                                <?php endif; ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="card-footer">
                    <a href="?page=data-usaha" class="btn btn-warning">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>