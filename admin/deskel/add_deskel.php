<?php
if (isset($_POST['Simpan'])) {
    $nama_deskel = htmlspecialchars($_POST['nama_deskel']);
    $id_kec = htmlspecialchars($_POST['id_kec']);

    $data = [
        'nama_deskel' => $nama_deskel,
        'id_kec' => $id_kec,
    ];
    $Deskel->add($data);
}
$data_kecamatan = $Kecamatan->get();
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
                window.location = 'index.php?page=data-deskel';
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
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-edit"></i> Tambah Data
        </h3>
    </div>
    <form action="" method="post">
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Deskel</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="nama_deskel" name="nama_deskel" placeholder="Nama Desa/Kelurahan" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Kecamatan</label>
                <div class="col-sm-5">
                    <select name="id_kec" id="id_kec" class="form-control">
                        <option value="">- Pilih -</option>
                        <?php foreach ($data_kecamatan as $key => $kecamatan) : ?>
                            <option value="<?= $kecamatan['id_kec']; ?>"><?= $kecamatan['nm_kec']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
            <a href="?page=data-deskel" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>