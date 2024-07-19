<?php
$data_klasifikasi = $Klasifikasi->get();
?>
<i class="fa fa-arrow-circle-o-down" aria-hidden="true"></i>
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-users"></i> Data Klasifikasi Usaha
        </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive">
            <div class="d-flex">
                <?php if($_SESSION['level'] != 'Kadis'):?>
                <a href="?page=add-ku" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Tambah Data</a>
                <?php endif;?>
            </div>
            <br>
            <table id="example1" class="table nowrap table-bordered table-striped" style="width:100%;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Klasifikasi Usaha</th>
                        <th>Min Tenaga Kerja</th>
                        <th>Max Tenaga Kerja</th>
                        <th>Min Aset</th>
                        <th>Max Aset</th>
                        <th>Min Omset</th>
                        <th>Max Omset</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while ($klasifikasi = $data_klasifikasi->fetch_assoc()) {
                    ?>

                    <tr>
                        <td>
                            <?php echo $no++; ?>
                        </td>
                        <td>
                            <?php echo $klasifikasi['nm_ku']; ?>
                        </td>
                        <td>
                            <?php echo $klasifikasi['min_tk']; ?>
                        </td>
                        <td>
                            <?php echo $klasifikasi['max_tk']; ?>
                        </td>
                        <td>
                            <?php echo formatRupiah($klasifikasi['min_aset']); ?>
                        </td>
                        <td>
                            <?php echo formatRupiah($klasifikasi['max_aset']); ?>
                        </td>
                        <td>
                            <?php echo formatRupiah($klasifikasi['min_omset']); ?>
                        </td>
                        <td>
                            <?php echo formatRupiah($klasifikasi['max_omset']); ?>
                        </td>
                        <td>
                            <a href="?page=view-ku&kode=<?php echo $klasifikasi['id_ku']; ?>" title="Detail"
                                class="btn btn-info btn-sm">
                                <i class="fa fa-eye"></i>
                            </a>
                            <?php if($_SESSION['level'] != 'Kadis'):?>
                            <a href="?page=edit-ku&kode=<?php echo $klasifikasi['id_ku']; ?>" title="Ubah"
                                class="btn btn-success btn-sm">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="?page=del-ku&kode=<?php echo $klasifikasi['id_ku']; ?>"
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