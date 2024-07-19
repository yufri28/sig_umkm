<?php
if($_SESSION['level'] == "Kadis"){
    echo "<script>
    Swal.fire({title: 'Anda tidak punya akses ke menu ini!',text: '',icon: 'error',confirmButtonText: 'OK'
    }).then((result) => {if (result.value){
        window.location = 'index.php?page=data-ku';
        }
    })</script>";
}
if (isset($_POST['Simpan'])) {
    $nama_klasifikasi = htmlspecialchars($_POST['nama_klasifikasi']);
    $min_tk = htmlspecialchars($_POST['min_tk']);
    $max_tk = htmlspecialchars($_POST['max_tk']);
    $min_aset = cleanRupiah(htmlspecialchars($_POST['min_aset']));
    $max_aset = cleanRupiah(htmlspecialchars($_POST['max_aset']));
    $min_omset = cleanRupiah(htmlspecialchars($_POST['min_omset']));
    $max_omset = cleanRupiah(htmlspecialchars($_POST['max_omset']));
    
    $data = [
        "nama_klasifikasi" => $nama_klasifikasi,
        "min_tk" => $min_tk,
        "max_tk" => $max_tk,
        "min_aset" => $min_aset,
        "max_aset" => $max_aset,
        "min_omset" => $min_omset,
        "max_omset" => $max_omset
    ];
    
    $Klasifikasi->add($data);
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
                    <input type="text" class="form-control" id="nama_klasifikasi" name="nama_klasifikasi"
                        placeholder="Nama Klasifikasi Usaha" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Minimal Tenaga Kerja</label>
                <div class="col-sm-5">
                    <input type="number" class="form-control" id="min_tk" name="min_tk"
                        placeholder="Minimal Tenaga Kerja" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Maksimal Tenaga Kerja</label>
                <div class="col-sm-5">
                    <input type="number" class="form-control" id="max_tk" name="max_tk"
                        placeholder="Maksimal Tenaga Kerja" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Minimal Aset</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="min_aset" name="min_aset" placeholder="Minimal Aset"
                        required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Maksimal Aset</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="max_aset" name="max_aset" placeholder="Maksimal Aset"
                        required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Minimal Omset</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="min_omset" name="min_omset" placeholder="Minimal Omset"
                        required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Maksimal Omset</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="max_omset" name="max_omset" placeholder="Maksimal Omset"
                        required>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
            <a href="?page=data-ku" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<script>
/* Dengan Rupiah */
var min_aset = document.getElementById('min_aset');
min_aset.addEventListener('keyup', function(e) {
    min_aset.value = formatRupiah(this.value, 'Rp');
});
var max_aset = document.getElementById('max_aset');
max_aset.addEventListener('keyup', function(e) {
    max_aset.value = formatRupiah(this.value, 'Rp');
});
var min_omset = document.getElementById('min_omset');
min_omset.addEventListener('keyup', function(e) {
    min_omset.value = formatRupiah(this.value, 'Rp');
});
var max_omset = document.getElementById('max_omset');
max_omset.addEventListener('keyup', function(e) {
    max_omset.value = formatRupiah(this.value, 'Rp');
});

/* Fungsi */
function formatRupiah(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp' + rupiah : '');
}
</script>