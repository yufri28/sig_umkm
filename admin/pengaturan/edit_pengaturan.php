<?php

if (isset($_GET['kode'])) {
    $sql_cek = $Pengaturan->getById($_GET['kode']);
    $data_cek = mysqli_fetch_array($sql_cek, MYSQLI_BOTH);
}
if (isset($_POST['Ubah'])) {
    $judul_konten = htmlspecialchars($_POST['judul_konten']);
    $gambar_lama = htmlspecialchars($_POST['gambar_lama']);
    $deskripsi = $_POST['deskripsi'];
    $jns_konten = htmlspecialchars($_POST['jns_konten']);
    $id_user = htmlspecialchars($_SESSION['id_user']);
    $id_konten = htmlspecialchars($_GET['kode']);

    // Upload gambar
    if (!empty($_FILES['gambar_konten']['name'])) {
        $gambar_konten = $_FILES['gambar_konten']['name'];
        $gambar_tmp = $_FILES['gambar_konten']['tmp_name'];

        // Tentukan direktori tempat menyimpan gambar
        $upload_dir = "../assets/images/";

        // Generate nama unik untuk gambar (misalnya, menggunakan timestamp)
        $gambar_konten = time() . '_' . $gambar_konten;

        // Pindahkan file gambar ke direktori upload
        if (move_uploaded_file($gambar_tmp, $upload_dir . $gambar_konten)) {
            // Hapus gambar lama jika ada
            if (!empty($gambar_lama)) {
                $old_image_path = $upload_dir . $gambar_lama;
                if (file_exists($old_image_path)) {
                    unlink($old_image_path);
                }
            }

            $data = [
                'judul_konten' => $judul_konten,
                'gambar_konten' => $gambar_konten,
                'deskripsi' => $deskripsi,
                'jns_konten' => $jns_konten,
                'id_user' => $id_user,
                'id_konten' => $id_konten
            ];

            $Pengaturan->update($data);
        } else {
            return $_SESSION['error'] = "Gagal mengupload gambar!";
        }
    } else {
        // Jika gambar tidak diubah, gunakan gambar lama
        $data = [
            'judul_konten' => $judul_konten,
            'gambar_konten' => $gambar_lama,
            'deskripsi' => $deskripsi,
            'jns_konten' => $jns_konten,
            'id_user' => $id_user,
            'id_konten' => $id_konten
        ];

        $Pengaturan->update($data);
    }
}
?>
<?php if (isset($_SESSION['success'])) : ?>
    <script>
        Swal.fire({
            title: 'Sukses!',
            text: '<?php echo $_SESSION['success']; ?>',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-pengaturan';
            }
        });
    </script>
    <?php unset($_SESSION['success']); // Menghapus session setelah ditampilkan 
    ?>
<?php endif; ?>

<?php if (isset($_SESSION['warning'])) : ?>
    <script>
        Swal.fire({
            title: 'Warning!',
            text: '<?php echo $_SESSION['warning']; ?>',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
    </script>
    <?php unset($_SESSION['warning']); // Menghapus session setelah ditampilkan 
    ?>
<?php endif; ?>

<?php if (isset($_SESSION['error'])) : ?>
    <script>
        Swal.fire({
            title: 'Error!',
            text: '<?php echo $_SESSION['error']; ?>',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    </script>
    <?php unset($_SESSION['error']); // Menghapus session setelah ditampilkan 
    ?>
<?php endif; ?>

<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-edit"></i> Ubah Data
        </h3>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Judul Konten</label>
                <div class="col-sm-5">
                    <input type="text" value="<?= $data_cek['nm_konten']; ?>" class="form-control" id="judul_konten" name="judul_konten" placeholder="Judul Konten" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Gambar Konten <i><small>(Optional)</small></i></label>
                <div class="col-sm-5">
                    <input type="file" accept="image/png, image/jpeg, image/jpg" class="form-control" id="gambar_konten" name="gambar_konten" placeholder="Gambar Konten">
                    <input type="hidden" accept="image/png, image/jpeg, image/jpg" value="<?= $data_cek['gambar']; ?>" class="form-control" id="gambar_lama" name="gambar_lama" required>
                    <small><i>* Diisi jika ingin mengubah gambar</i></small>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Isi Konten</label>
                <div class="col-sm-5">
                    <textarea name="deskripsi" id="editor" cols="30" rows="10"><?= $data_cek['deskripsi']; ?></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jenis Konten</label>
                <div class="col-sm-5">
                    <select name="jns_konten" id="jns_konten" class="form-control">
                        <option value="">- Pilih -</option>
                        <option <?= $data_cek['jns_konten'] == '1' ? 'selected' : ''; ?> value="1">Halaman Utama</option>
                        <option <?= $data_cek['jns_konten'] == '2' ? 'selected' : ''; ?> value="2">Visi Misi</option>
                        <option <?= $data_cek['jns_konten'] == '3' ? 'selected' : ''; ?> value="3">Produk</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
            <a href="?page=data-su" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>