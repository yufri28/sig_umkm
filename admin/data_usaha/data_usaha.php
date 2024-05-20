<?php
// require_once '../functions/usaha.php';
?>
<i class="fa fa-arrow-circle-o-down" aria-hidden="true"></i>
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-users"></i> Data Usaha
        </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive">
            <div class="d-flex">
                <?php if($_SESSION['level'] != 'Kadis'):?>
                <a href="?page=add-usaha" class="btn btn-primary mr-2">
                    <i class="fa fa-plus"></i> Tambah Data Usaha</a>
                <?php endif;?>
                <a href="./../report/cetak_usaha.php" target="_blank" class="btn btn-success">
                    <i class="fa fa-print"></i> Cetak Data Usaha</a>
                <!-- <a href="./report/cetak-pegawai.php" target="_blank" class="btn btn-primary"><i class="fas fa-print"></i> Laporan</a> -->
                <!-- <div class="dropdown ml-1">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-print"></i> Laporan
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" target="_blank" href="./report/cetak-pegawai.php">Semua</a></li>
                        <li><a class="dropdown-item" target="_blank" href="./report/cetak-pegawai.php?st=ttp">Tetap</a></li>
                        <li><a class="dropdown-item" target="_blank" href="./report/cetak-pegawai.php?st=hnr">Honorer</a></li>
                    </ul>
                </div>
                <div class="dropdown ml-1">
                    <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-filter"></i> Filter Periode
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="?page=data-pegawai">Semua</a></li>

                    </ul>
                </div> -->
            </div>
            <br>
            <table id="example1" class="table nowrap table-bordered table-striped" style="width:100%;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Nama Usaha</th>
                        <th>Kecamatan</th>
                        <th>Desa/Kelurahan</th>
                        <th>Sektor Usaha</th>
                        <th>Klasifikasi Usaha</th>
                        <th>Tahun Pembentukan</th>
                        <th>Jenis Usaha</th>
                        <th>Izin Usaha Yang Dimiliki</th>
                        <th>Nama Pemilik</th>
                        <th>Alamat</th>
                        <th>TK Laki-Laki</th>
                        <th>TK Perempuan</th>
                        <th>Modal Sendiri</th>
                        <th>Modal Luar</th>
                        <th>Asset</th>
                        <th>Omset</th>
                        <th>Nomor Telepon</th>
                        <th>KTP Pemilik</th>
                        <th>Surat Izin Usaha</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $sql = $Usaha->get();
                    while ($data = $sql->fetch_assoc()) {
                    ?>

                    <tr>
                        <td>
                            <?php echo $no++; ?>
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
                        <td>
                            <img height="100" width="100"
                                src="../assets/<?= $data['ktp'] == NULL?'img/no-image.svg':'file/'.$data['ktp']; ?>"
                                alt="">
                        </td>
                        <td>
                            <?php if (!empty($data['surat_izin_usaha'])): ?>
                            <a href="../assets/file/<?= $data['surat_izin_usaha']; ?>"
                                download><?= $data['surat_izin_usaha']; ?></a>
                            <?php else: ?>
                            -
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="?page=view-usaha&kode=<?php echo $data['id_datum']; ?>" title="Detail"
                                class="btn btn-info btn-sm">
                                <i class="fa fa-eye"></i>
                            </a>
                            <?php if($_SESSION['level'] != 'Kadis'):?>
                            <a href="?page=edit-usaha&kode=<?php echo $data['id_datum']; ?>" title="Ubah"
                                class="btn btn-success btn-sm">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="?page=del-usaha&kode=<?php echo $data['id_datum']; ?>"
                                onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus"
                                class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                            </a>
                            <?php endif;?>
                        </td>
                    </tr>

                    <?php
                    }
                    ?>
                </tbody>
                </tfoot>
            </table>
        </div>
    </div>
</div>