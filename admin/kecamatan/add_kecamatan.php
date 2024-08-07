<?php
if($_SESSION['level'] == "Kadis"){
    echo "<script>
    Swal.fire({title: 'Anda tidak punya akses ke menu ini!',text: '',icon: 'error',confirmButtonText: 'OK'
    }).then((result) => {if (result.value){
        window.location = 'index.php?page=data-kecamatan';
        }
    })</script>";
}
if (isset($_POST['Simpan'])) {
    $data = [
        'nama_kecamatan' => htmlspecialchars($_POST['nama_kecamatan']),
        'polygon' => htmlspecialchars($_POST['polygon']),
        'warna' => htmlspecialchars($_POST['warna'])
    ];
    $Kecamatan->add($data);
}

?>
<?php if (isset($_SESSION['success'])): ?>
<script>
Swal.fire({
    title: 'Sukses!',
    text: '<?php echo $_SESSION['success']; ?>',
    icon: 'success',
    confirmButtonText: 'OK'
}).then((result) => {
    if (result.value) {
        window.location = 'index.php?page=data-kecamatan';
    }
});
</script>
<?php unset($_SESSION['success']); // Menghapus session setelah ditampilkan ?>
<?php endif; ?>

<?php if (isset($_SESSION['warning'])): ?>
<script>
Swal.fire({
    title: 'Warning!',
    text: '<?php echo $_SESSION['warning']; ?>',
    icon: 'warning',
    confirmButtonText: 'OK'
});
</script>
<?php unset($_SESSION['warning']); // Menghapus session setelah ditampilkan ?>
<?php endif; ?>

<?php if (isset($_SESSION['error'])): ?>
<script>
Swal.fire({
    title: 'Error!',
    text: '<?php echo $_SESSION['error']; ?>',
    icon: 'error',
    confirmButtonText: 'OK'
});
</script>
<?php unset($_SESSION['error']); // Menghapus session setelah ditampilkan ?>
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
                <label class="col-sm-2 col-form-label">Nama Kecamatan</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="nama_kecamatan" name="nama_kecamatan"
                        placeholder="Nama Kecamatan" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Warna</label>
                <div class="col-sm-5">
                    <input type="color" class="form-control" id="warna" name="warna" placeholder="Warna" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="polygon" class="col-sm-2 col-form-label">Polygon</label>
                <div class="col-sm-5">
                    <textarea class="form-control" required name="polygon" id="polygon" rows="15"></textarea>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
            <a href="?page=data-kecamatan" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>