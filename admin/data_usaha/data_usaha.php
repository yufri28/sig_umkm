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
            <div class="d-lg-flex">
                <?php if($_SESSION['level'] != 'Kadis'):?>
                <a href="?page=add-usaha" class="btn btn-primary mr-2">
                    <i class="fa fa-plus"></i> Tambah Data Usaha</a>
                <?php endif;?>
            </div>
            <div class="d-lg-flex">
                <!-- <a href="./../report/cetak_usaha.php" target="_blank" class="btn btn-success">
                    <i class="fa fa-print"></i> Cetak Data Usaha</a> -->
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
                <form class="mt-3 overflow-scroll d-lg-flex" method="post" action="./../report/cetak_data_usaha.php">
                    <div class="overflow-scroll d-lg-flex">
                        <div class="mt-lg-0 mt-2">
                            <?php 
                             $data_kecamatan = $Kecamatan->get();
                            ?>
                            <select class="form-control" name="kecamatan" id="kecamatan">
                                <option value="">-- Pilih Kecamatan --</option>
                                <?php foreach ($data_kecamatan as $key => $kec):?>
                                <option value="<?=$kec['id_kec'];?>"><?=$kec['nm_kec'];?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="ml-lg-2 mt-lg-0 mt-2">
                            <?php 
                             $data_jenus = $Jenus->get();
                            ?>
                            <select class="form-control" name="jenus" id="jenus">
                                <option value="">-- Pilih Jenis Usaha --</option>
                                <?php foreach ($data_jenus as $key => $jenus):?>
                                <?php if($jenus['nama_jenus'] != 'Default'):?>
                                <option value="<?=$jenus['id_ju'];?>"><?=$jenus['nama_jenus'];?></option>
                                <?php endif;?>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="ml-lg-2 mt-lg-0 mt-2">
                            <?php 
                             $data_sektor = $Sektor->get();
                            ?>
                            <select class="form-control" name="sektor_usaha" id="sektor_usaha">
                                <option value="">-- Pilih Sektor Usaha --</option>
                                <?php foreach ($data_sektor as $key => $sektor):?>
                                <option value="<?=$sektor['id_su'];?>"><?=$sektor['nm_su'];?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="ml-lg-2 mt-lg-0 mt-2">
                            <?php 
                             $data_klasifikasi = $Klasifikasi->get();
                            ?>
                            <select class="form-control" name="klasifikasi_usaha" id="klasifikasi_usaha">
                                <option value="">-- Pilih Klasifikasi Usaha --</option>
                                <?php foreach ($data_klasifikasi as $key => $klasifikasi):?>
                                <option value="<?=$klasifikasi['id_ku'];?>"><?=$klasifikasi['nm_ku'];?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="ml-lg-2 mt-lg-0 mt-2">
                            <label for="tahun_pembentukan">Tahun Pembentukan : </label>
                        </div>
                        <div class="ml-lg-2 mt-lg-0 mt-2">
                            <input type="number" min="1900" max="2100" placeholder="YYYY" name="tahun_pembentukan"
                                id="tahun_pembentukan" class="form-control">
                        </div>
                        <!-- <div class="ml-lg-2 mt-lg-0 mt-2">
                            <label for="tanggal_awal">Tanggal Awal :</label>
                        </div>
                        <div class="ml-lg-2 mt-lg-0 mt-2">
                            <input type="date" name="tanggal_awal" id="tanggal_awal" class="form-control">
                        </div>
                        <div class="ml-lg-2 mt-lg-0 mt-2">
                            <label for="tanggal_akhir">Tanggal Akhir :</label>
                        </div>
                        <div class="ml-lg-2 mt-lg-0 mt-2">
                            <input type="date" name="tanggal_akhir" id="tanggal_akhir" class="form-control">
                        </div> -->
                        <div class="ml-lg-2 mt-lg-0 mt-2">
                            <button class="btn btn-success" name="cetak_usaha" type="submit">
                                <i class="fa fa-print"></i> Cetak
                            </button>
                        </div>
                    </div>
                </form>
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
                        <th>NIK</th>
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
                            <?php echo formatRupiah($data['mdl_sendiri']); ?>
                        </td>
                        <td>
                            <?php echo formatRupiah($data['mdl_luar']); ?>
                        </td>
                        <td>
                            <?php echo formatRupiah($data['asset']); ?>
                        </td>
                        <td>
                            <?php echo formatRupiah($data['omset']); ?>
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
                            <?php echo $data['nik']??'-'; ?>
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