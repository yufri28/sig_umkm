<?php
if($_SESSION['level'] == "Kadis" || $_SESSION['level'] == "Admin"){
    echo "<script>
    Swal.fire({title: 'Anda tidak punya akses ke menu ini!',text: '',icon: 'error',confirmButtonText: 'OK'
    }).then((result) => {if (result.value){
        window.location = 'index.php?page=data-pengaturan';
        }
    })</script>";
}
if (isset($_GET['kode'])) {
    $sql_cek = $Pengaturan->getById($_GET['kode']);
    $data_cek = mysqli_fetch_array($sql_cek, MYSQLI_BOTH);
}
?>
<div class="row">
    <div class="col-md-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Detail Sektor Usaha</h3>

                <div class="card-tools">
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table">
                    <tbody>
                        <tr>
                            <td style="width: 150px">
                                <b>Nama Konten</b>
                            </td>
                            <td>:
                                <?php echo $data_cek['nm_konten']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 150px">
                                <b>Gambar</b>
                            </td>
                            <td>:
                                <img height="200px" width="200px" class="img-fluid"
                                    src="../assets/images/<?php echo $data_cek['gambar']; ?>" alt="">
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 150px">
                                <b>Deskripsi/Isi</b>
                            </td>
                            <td>:
                                <?php echo $data_cek['deskripsi']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 150px">
                                <b>Jenis Konten</b>
                            </td>
                            <td>:
                                <?php echo $data_cek['jns_konten'] == 1 ? 'Halaman Utama' : ($data_cek['jns_konten'] == 2 ? 'Visi Misi' : 'Produk'); ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 150px">
                                <b>Kategori Jenis Usaha</b>
                            </td>
                            <td>:
                                <?php echo $data_cek['nama_jenus']; ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="card-footer">
                    <a href="?page=data-pengaturan" class="btn btn-warning">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>