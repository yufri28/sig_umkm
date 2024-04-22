<?php
if($_SESSION['level'] == "Kadis" || $_SESSION['level'] == "Admin"){
    echo "<script>
    Swal.fire({title: 'Anda tidak punya akses ke menu ini!',text: '',icon: 'error',confirmButtonText: 'OK'
    }).then((result) => {if (result.value){
        window.location = 'index.php?page=data-pengaturan';
        }
    })</script>";
}
if (isset($_POST['Simpan'])) {
    $judul_konten = htmlspecialchars($_POST['judul_konten']);
    $deskripsi = $_POST['deskripsi'];
    $jns_konten = htmlspecialchars($_POST['jns_konten']);
    $id_user = htmlspecialchars($_SESSION['id_user']);
    $f_id_jenus = htmlspecialchars($_POST['jenis_usaha']);
    $id_datum = htmlspecialchars($_POST['id_datum']);
    // $latitude = htmlspecialchars($_POST['latitude']);
    // $longitude = htmlspecialchars($_POST['longitude']);

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
            $data = [
                'judul_konten' => $judul_konten,
                'gambar_konten' => $gambar_konten,
                'deskripsi' => $deskripsi,
                'jns_konten' => $jns_konten,
                'id_user' => $id_user,
                'f_id_jenus' => $f_id_jenus,
                'id_datum' => $id_datum,
                // 'latitude' => $latitude,
                // 'longitude' => $longitude
            ];
            $Pengaturan->add($data);
        } else {
            return $_SESSION['error'] = "Gagal mengupload gambar!";
        }
    } else {
        $data = [
            'judul_konten' => $judul_konten,
            'gambar_konten' => NULL,
            'deskripsi' => $deskripsi,
            'jns_konten' => $jns_konten,
            'id_user' => $id_user,
            'f_id_jenus' => $f_id_jenus,
            'id_datum' => $id_datum,
            // 'latitude' => $latitude,
            // 'longitude' => $longitude
        ];
        $Pengaturan->add($data);
    }
}
$data_jenus = $Jenus->get();
$datum = $Usaha->get();
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
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-edit"></i> Tambah Data
        </h3>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Judul Konten</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="judul_konten" name="judul_konten"
                        placeholder="Judul Konten" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Gambar Konten <i><small>(Optional)</small></i></label>
                <div class="col-sm-5">
                    <input type="file" accept="image/png, image/jpeg, image/jpg" class="form-control" id="gambar_konten"
                        name="gambar_konten" placeholder="Gambar Konten">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Isi Konten</label>
                <div class="col-sm-5">
                    <textarea name="deskripsi" id="editor" cols="30" rows="10"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jenis Konten</label>
                <div class="col-sm-5">
                    <select name="jns_konten" id="jns_konten" class="form-control">
                        <option value="">- Pilih -</option>
                        <option value="1">Halaman Utama</option>
                        <option value="2">Visi</option>
                        <option value="3">Misi</option>
                        <option value="4">Produk</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Kategori Jenis Usaha</label>
                <div class="col-sm-5">
                    <select id="jenis_usaha" name="jenis_usaha" required class="form-control">
                        <option value="">- Pilih -</option>
                        <?php foreach ($data_jenus as $key => $jenus) : ?>
                        <option value="<?= $jenus['id_ju']; ?>"><?= $jenus['nama_jenus']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Data Usaha</label>
                <div class="col-sm-5">
                    <select id="id_datum" name="id_datum" required class="form-control">
                        <option value="">- Pilih -</option>
                        <?php foreach ($datum as $key => $data_umkm) : ?>
                        <option value="<?= $data_umkm['id_datum']; ?>"><?= $data_umkm['nm_usaha']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <!-- <div class="form-group row">
                <label class="col-sm-2 col-form-label">Latitude</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" value="" id="latitude" name="latitude"
                        placeholder="Latitude">
                    <i><small>Diisi jika kategori jenis usaha adalah Produk</small></i>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Longitude</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" value="" id="longitude" name="longitude"
                        placeholder="Longitude">
                    <i><small>Diisi jika kategori jenis usaha adalah Produk</small></i>
                </div>
            </div> -->
        </div>
        <div class="card-footer">
            <input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
            <a href="?page=data-pengaturan" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
<script>
document.addEventListener("DOMContentLoaded", function() {
    var jnsKontenSelect = document.getElementById("jns_konten");
    // var latitudeInput = document.getElementById("latitude").closest('.form-group');
    // var longitudeInput = document.getElementById("longitude").closest('.form-group');
    var dataUsahaSelect = document.getElementById("id_datum").closest('.form-group');

    jnsKontenSelect.addEventListener("change", function() {
        if (jnsKontenSelect.value != "4") { // Jika dipilih "Produk"
            // latitudeInput.style.display = "none";
            // longitudeInput.style.display = "none";
            dataUsahaSelect.style.display = "none";
        } else {
            // latitudeInput.style.display = "flex";
            // longitudeInput.style.display = "flex";
            dataUsahaSelect.style.display = "flex";
        }
    });
    // Inisialisasi awal
    if (jnsKontenSelect.value != "4") {
        // latitudeInput.style.display = "none";
        // longitudeInput.style.display = "none";
        dataUsahaSelect.style.display = "none";
    } else {
        // latitudeInput.style.display = "flex";
        // longitudeInput.style.display = "flex";
        dataUsahaSelect.style.display = "flex";
    }
});
</script>