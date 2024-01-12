<?php
if (isset($_POST['Simpan'])) {
    $nama_klasifikasi = htmlspecialchars($_POST['nama_klasifikasi']);
    $Klasifikasi->add($nama_klasifikasi);
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
                window.location = 'index.php?page=data-ku';
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
                <label class="col-sm-2 col-form-label">Nama Klasifikasi Usaha</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="nama_klasifikasi" name="nama_klasifikasi" placeholder="Nama Klasifikasi Usaha" required>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
            <a href="?page=data-ku" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>