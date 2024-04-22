<?php
if($_SESSION['level'] == "Kadis" || $_SESSION['level'] == "Admin"){
    echo "<script>
    Swal.fire({title: 'Anda tidak punya akses ke menu ini!',text: '',icon: 'error',confirmButtonText: 'OK'
    }).then((result) => {if (result.value){
        window.location = 'index.php?page=data-pengaturan';
        }
    })</script>";
}
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
                <?php if($_SESSION['level'] != 'Kadis'):?>
                <a href="?page=add-pengaturan" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Tambah Data</a>
                <?php endif;?>
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
                        <th>Kategori Jenis Usaha</th>
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
                            <?= $no++; ?>
                        </td>
                        <td>
                            <?= $pengaturan['nm_konten']; ?>
                        </td>
                        <td>
                            <img height="100" width="100" src="../assets/images/<?= $pengaturan['gambar']; ?>" alt="">
                        </td>
                        <td>
                            <?= substr($pengaturan['deskripsi'], 0, 20).'...'; ?>
                        </td>
                        <td>
                            <?= $pengaturan['jns_konten'] == 1 ? 'Halaman Utama' : (($pengaturan['jns_konten'] == 2 ? 'Visi' : (($pengaturan['jns_konten'] == 3)?'Misi':'Produk'))); ?>
                        </td>
                        <td>
                            <?= $pengaturan['nama_jenus']; ?>
                        </td>
                        <td>
                            <a href="?page=view-pengaturan&kode=<?= $pengaturan['id_konten']; ?>" title="Detail"
                                class="btn btn-info btn-sm">
                                <i class="fa fa-eye"></i>
                            </a>
                            <?php if($_SESSION['level'] != 'Kadis'):?>
                            <a href="?page=edit-pengaturan&kode=<?= $pengaturan['id_konten']; ?>" title="Ubah"
                                class="btn btn-success btn-sm">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="?page=del-pengaturan&kode=<?= $pengaturan['id_konten']; ?>"
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