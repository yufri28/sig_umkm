<?php
$data_pengaturan = $Pengaturan->get();
?>
<i class="fa fa-arrow-circle-o-down" aria-hidden="true"></i>
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-users"></i> Data Pengaturan
        </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive">
            <div class="d-flex">
                <a href="?page=add-pengaturan" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Tambah Data</a>

            </div>
            <br>
            <table id="example1" class="table nowrap table-bordered table-striped" style="width:100%;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Konten</th>
                        <th>Gambar</th>
                        <th>Deskripsi/Isi</th>
                        <th>Jenis Konten</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while ($pengaturan = $data_pengaturan->fetch_assoc()) {
                    ?>

                        <tr>
                            <td>
                                <?php echo $no++; ?>
                            </td>
                            <td>
                                <?php echo $pengaturan['nm_konten']; ?>
                            </td>
                            <td>
                                <img height="100" width="100" src="../assets/images/<?php echo $pengaturan['gambar']; ?>" alt="">
                            </td>
                            <td>
                                <?php echo substr($pengaturan['deskripsi'], 0, 20); ?>
                            </td>
                            <td>
                                <?php echo $pengaturan['jns_konten'] == 1 ? 'Halaman Utama' : ($pengaturan['jns_konten'] == 2 ? 'Visi Misi' : 'Produk'); ?>
                            </td>
                            <td>
                                <a href="?page=view-pengaturan&kode=<?php echo $pengaturan['id_konten']; ?>" title="Detail" class="btn btn-info btn-sm">
                                    <i class="fa fa-eye"></i>
                                </a>
                                </a>
                                <a href="?page=edit-pengaturan&kode=<?php echo $pengaturan['id_konten']; ?>" title="Ubah" class="btn btn-success btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="?page=del-pengaturan&kode=<?php echo $pengaturan['id_konten']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
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