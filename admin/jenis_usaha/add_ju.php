<?php
if (isset($_POST['Simpan'])) {
    $nama_jenus= htmlspecialchars($_POST['nama_jenus']);
    $icon= $_POST['icon'];
    $data = [
        'nama_jenus' => $nama_jenus,
        'icon' => $icon
    ];
    $Jenus->add($data);
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
        window.location = 'index.php?page=data-ju';
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
                <label class="col-sm-2 col-form-label">Nama Jenis Usaha</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="nama_jenus" name="nama_jenus"
                        placeholder="Nama Jenis Usaha" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Ikon</label>
                <div class="col-sm-5">
                    <textarea class="form-control" id="icon" required name="icon" cols="30" rows="5"></textarea>
                    <small><i>Sumber ikon yang digunakan (<a href="https://fontawesome.com/v4/icons/"
                                target="_blank">https://fontawesome.com/v4/icons/</a>)</i></small>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
            <a href="?page=data-ju" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>