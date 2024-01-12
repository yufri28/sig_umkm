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
                <a href="?page=add-usaha" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Tambah Data Usaha</a>
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
                        <th>Kecamatan</th>
                        <th>Desa/Kelurahan</th>
                        <th>Sektor Usaha</th>
                        <th>Klasifikasi Usaha</th>
                        <th>Nama Usaha</th>
                        <th>Tahun Pembentukan</th>
                        <th>Jenis Usaha</th>
                        <th>No Izin</th>
                        <th>Nama Pemilik</th>
                        <th>Alamat</th>
                        <th>TK Laki-Laki</th>
                        <th>TK Perempuan</th>
                        <th>Modal Sendiri</th>
                        <th>Modal Luar</th>
                        <th>Asset</th>
                        <th>Omset</th>
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
                                <?php echo $data['nm_usaha']; ?>
                            </td>
                            <td>
                                <?php echo $data['thn_pmtkn']; ?>
                            </td>
                            <td>
                                <?php echo $data['jns_ush']; ?>
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
                                <a href="?page=view-usaha&kode=<?php echo $data['id_datum']; ?>" title="Detail" class="btn btn-info btn-sm">
                                    <i class="fa fa-eye"></i>
                                </a>
                                </a>
                                <a href="?page=edit-usaha&kode=<?php echo $data['id_datum']; ?>" title="Ubah" class="btn btn-success btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="?page=del-usaha&kode=<?php echo $data['id_datum']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
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