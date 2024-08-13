<?php
if($_SESSION['level'] == "Kadis"){
    echo "<script>
    Swal.fire({title: 'Anda tidak punya akses ke menu ini!',text: '',icon: 'error',confirmButtonText: 'OK'
    }).then((result) => {if (result.value){
        window.location = 'index.php?page=data-usaha';
        }
    })</script>";
}
$data_kecamatan = $Kecamatan->get();
$data_deskel = $Deskel->get();
$data_sektor = $Sektor->get();
$data_klasifikasi = $Klasifikasi->get();
$data_jenus = $Jenus->get();

if (isset($_POST['Simpan'])) {
    $data = array();
    $nama_usaha = htmlspecialchars($_POST['nama_usaha']);
    $id_deskel = htmlspecialchars($_POST['id_deskel']);
    $id_su = htmlspecialchars($_POST['id_su']);
    // $id_ku = htmlspecialchars($_POST['id_ku']);
    $tahun_pembentukan = htmlspecialchars($_POST['tahun_pembentukan']);
    $jenis_usaha = htmlspecialchars($_POST['jenis_usaha']);
    $no_izin = htmlspecialchars($_POST['no_izin']);
    $nama_pemilik = htmlspecialchars($_POST['nama_pemilik']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $tk_laki = htmlspecialchars($_POST['tk_laki']);
    $tk_perempuan = htmlspecialchars($_POST['tk_perempuan']);
    $modal_sendiri = cleanRupiah(htmlspecialchars($_POST['modal_sendiri']));
    $modal_luar = cleanRupiah(htmlspecialchars($_POST['modal_luar']));
    $asset = cleanRupiah(htmlspecialchars($_POST['asset']));
    $omset = cleanRupiah(htmlspecialchars($_POST['omset']));
    $id_ku = tentukanKategoriBisnis($omset, $data_klasifikasi);
    $latitude = htmlspecialchars($_POST['latitude']);
    $longitude = htmlspecialchars($_POST['longitude']);
    $no_telepon = htmlspecialchars($_POST['no_telepon']);
    $polygon = htmlspecialchars($_POST['polygon']);
    $nik = htmlspecialchars($_POST['nik']);

    // Upload gambar
    // if (!empty($_FILES['gambar_konten']['name'])) {
    //     $gambar_konten = $_FILES['gambar_konten']['name'];
    //     $gambar_tmp = $_FILES['gambar_konten']['tmp_name'];

    //     // Tentukan direktori tempat menyimpan gambar
    //     $upload_dir = "../assets/images/";

    //     // Generate nama unik untuk gambar (misalnya, menggunakan timestamp)
    //     $gambar_konten = time() . '_' . $gambar_konten;

    //     // Pindahkan file gambar ke direktori upload
    //     if (move_uploaded_file($gambar_tmp, $upload_dir . $gambar_konten)) {
    //         $data = [
    //             'nama_usaha' => $nama_usaha,
    //             'id_deskel' => $id_deskel,
    //             'id_su' => $id_su,
    //             'id_ku' => $id_ku,
    //             'tahun_pembentukan' => $tahun_pembentukan,
    //             'jenis_usaha' => $jenis_usaha,
    //             'no_izin' => $no_izin,
    //             'nama_pemilik' => $nama_pemilik,
    //             'alamat' => $alamat,
    //             'tk_laki' => $tk_laki,
    //             'tk_perempuan' => $tk_perempuan,
    //             'modal_sendiri' => $modal_sendiri,
    //             'modal_luar' => $modal_luar,
    //             'asset' => $asset,
    //             'omset' => $omset,
    //             'latitude' => $latitude,
    //             'longitude' => $longitude,
    //             'no_telpon' => $no_telepon,
    //             'polygon' => $polygon,
    //             'gambar' => $gambar_konten
    //         ];
    //     } else {
    //         return $_SESSION['error'] = "Gagal mengupload gambar!";
    //     }
    // } else {
    //     $data = [
    //         'nama_usaha' => $nama_usaha,
    //         'id_deskel' => $id_deskel,
    //         'id_su' => $id_su,
    //         'id_ku' => $id_ku,
    //         'tahun_pembentukan' => $tahun_pembentukan,
    //         'jenis_usaha' => $jenis_usaha,
    //         'no_izin' => $no_izin,
    //         'nama_pemilik' => $nama_pemilik,
    //         'alamat' => $alamat,
    //         'tk_laki' => $tk_laki,
    //         'tk_perempuan' => $tk_perempuan,
    //         'modal_sendiri' => $modal_sendiri,
    //         'modal_luar' => $modal_luar,
    //         'asset' => $asset,
    //         'omset' => $omset,
    //         'latitude' => $latitude,
    //         'longitude' => $longitude,
    //         'no_telpon' => $no_telepon,
    //         'polygon' => $polygon,
    //         'gambar' => NULL,
    //     ];
    // }
    if(!$id_ku){
        $_SESSION['error'] = 'Terjadi kesalahan saat menentukan klasifikasi usaha. Silahkan cek kembali inputan anda!';
    }else{
        $upload_dir_gk = "../assets/images/";
        $upload_dir_sk = "../assets/file/";
        $uploads = [
            'gambar_konten' => null,
            'surat_izin_usaha' => null,
            'ktp' => null
        ];
        
        // Function to handle file upload
        function handleUpload($file_key, &$uploads, $upload_dir) {
            if (!empty($_FILES[$file_key]['name'])) {
                $file_name = $_FILES[$file_key]['name'];
                $file_tmp = $_FILES[$file_key]['tmp_name'];
                $unique_file_name = time() . '_' . $file_name;
                
                if (move_uploaded_file($file_tmp, $upload_dir . $unique_file_name)) {
                    $uploads[$file_key] = $unique_file_name;
                } else {
                    return $_SESSION['error'] = "Gagal mengupload $file_key!";
                }
            }
        }
        
        // Handle each file upload
        handleUpload('gambar_konten', $uploads, $upload_dir_gk);
        handleUpload('surat_izin_usaha', $uploads, $upload_dir_sk);
        handleUpload('ktp', $uploads, $upload_dir_sk);
        
        // Data array with optional file uploads
        $data = [
            'nama_usaha' => $nama_usaha,
            'id_deskel' => $id_deskel,
            'id_su' => $id_su,
            'id_ku' => $id_ku,
            'tahun_pembentukan' => $tahun_pembentukan,
            'jenis_usaha' => $jenis_usaha,
            'no_izin' => $no_izin,
            'nama_pemilik' => $nama_pemilik,
            'alamat' => $alamat,
            'tk_laki' => $tk_laki,
            'tk_perempuan' => $tk_perempuan,
            'modal_sendiri' => $modal_sendiri,
            'modal_luar' => $modal_luar,
            'asset' => $asset,
            'omset' => $omset,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'no_telpon' => $no_telepon,
            'gambar' => $uploads['gambar_konten'],
            'polygon' => $polygon,
            'ktp' => $uploads['ktp'],
            'surat_izin_usaha' => $uploads['surat_izin_usaha'],
            'nik' => $nik
        ];
    
        $Usaha->add($data);
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
        window.location = 'index.php?page=data-usaha';
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
                <label class="col-sm-2 col-form-label">Nama Usaha</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="nama_usaha" name="nama_usaha" placeholder="Nama Usaha"
                        required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Desa/Kelurahan</label>
                <div class="col-sm-5">
                    <select name="id_deskel" id="id_deskel" class="form-control">
                        <option value="">- Pilih -</option>
                        <?php foreach ($data_deskel as $key => $deskel) : ?>
                        <option value="<?= $deskel['id_deskel']; ?>"><?= $deskel['nm_deskel']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Sektor Usaha</label>
                <div class="col-sm-5">
                    <select name="id_su" id="id_su" class="form-control">
                        <option value="">- Pilih -</option>
                        <?php foreach ($data_sektor as $key => $sektor) : ?>
                        <option value="<?= $sektor['id_su']; ?>"><?= $sektor['nm_su']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <!-- <div class="form-group row">
                <label class="col-sm-2 col-form-label">Klasifikasi Usaha</label>
                <div class="col-sm-5">
                    <select name="id_ku" id="id_ku" class="form-control">
                        <option value="">- Pilih -</option>
                        <?php foreach ($data_klasifikasi as $key => $klasifikasi) : ?>
                        <option value="<?= $klasifikasi['id_ku']; ?>"><?= $klasifikasi['nm_ku']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div> -->

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tahun Pembentukan</label>
                <div class="col-sm-5">
                    <input type="number" class="form-control" id="tahun_pembentukan" name="tahun_pembentukan"
                        placeholder="Contoh: 2019" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jenis Usaha</label>
                <div class="col-sm-5">
                    <select id="jenis_usaha" name="jenis_usaha" required class="form-control">
                        <option value="">- Pilih -</option>
                        <?php foreach ($data_jenus as $key => $jenus) : ?>
                        <?php if($jenus['nama_jenus'] != 'Default' || $jenus['id_ju'] != '1'):?>
                        <option value="<?= $jenus['id_ju']; ?>"><?= $jenus['nama_jenus']; ?></option>
                        <?php endif;?>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Izin Usaha Yang Dimiliki</label>
                <div class="col-sm-5">
                    <select id="no_izin" name="no_izin" required class="form-control">
                        <option value="">- Pilih -</option>
                        <option value="Punya">Punya</option>
                        <option value="Tidak Punya">Tidak Punya</option>
                    </select>
                    <!-- <input type="text" class="form-control" id="no_izin" name="no_izin" placeholder="Nomor Izin"
                            required> -->
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Pemilik</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik"
                        placeholder="Nama Pemilik" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">NIK Pemilik</label>
                <div class="col-sm-5">
                    <input type="number" class="form-control" id="nik" name="nik" placeholder="NIK Pemilik" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-5">
                    <textarea class="form-control" name="alamat" id="alamat" rows="3"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jumlah Pekerja Laki-laki</label>
                <div class="col-sm-5">
                    <input type="number" class="form-control" id="tk_laki" name="tk_laki"
                        placeholder="Jumlah Pekerja Laki-laki" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jumlah Pekerja Perempuan</label>
                <div class="col-sm-5">
                    <input type="number" class="form-control" id="tk_perempuan" name="tk_perempuan"
                        placeholder="Jumlah Pekerja Perempuan" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Modal Sendiri</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="modal_sendiri" name="modal_sendiri"
                        placeholder="Modal Sendiri" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Modal Luar</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="modal_luar" name="modal_luar" placeholder="Modal Luar"
                        required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Asset</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="asset" name="asset" placeholder="Asset" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Omset</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="omset" name="omset" placeholder="Omset" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Latitude</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="latitude" name="latitude" placeholder="Latitude"
                        required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Longitude</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="longitude" name="longitude" placeholder="Longitude"
                        required>
                </div>
            </div>
            <div class="form-group row">
                <label for="no_telepon" class="col-sm-2 col-form-label">No Telepon</label>
                <div class="col-sm-5">
                    <input type="number" class="form-control" id="no_telepon" name="no_telepon" placeholder="No Telepon"
                        required>
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
                <label for="polygon" class="col-sm-2 col-form-label">Polygon</label>
                <div class="col-sm-5">
                    <textarea class="form-control" name="polygon" id="polygon" rows="3" required></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">KTP</label>
                <div class="col-sm-5">
                    <input type="file" accept="image/png, image/jpeg, image/jpg" class="form-control" id="ktp"
                        name="ktp" placeholder="KTP" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">SURAT IZIN USAHA <i><small>(Optional)</small></i></label>
                <div class="col-sm-5">
                    <input type="file" accept=".pdf, .doc, .docx" class="form-control" id="surat_izin_usaha"
                        name="surat_izin_usaha" placeholder="SURAT IZIN USAHA">
                </div>
            </div>
        </div>
        <div class="card-footer">
            <input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
            <a href="?page=data-usaha" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
<script>
/* Dengan Rupiah */
var modal_luar = document.getElementById('modal_luar');
modal_luar.addEventListener('keyup', function(e) {
    modal_luar.value = formatRupiah(this.value, 'Rp');
});
var modal_sendiri = document.getElementById('modal_sendiri');
modal_sendiri.addEventListener('keyup', function(e) {
    modal_sendiri.value = formatRupiah(this.value, 'Rp');
});
var asset = document.getElementById('asset');
asset.addEventListener('keyup', function(e) {
    asset.value = formatRupiah(this.value, 'Rp');
});
var omset = document.getElementById('omset');
omset.addEventListener('keyup', function(e) {
    omset.value = formatRupiah(this.value, 'Rp');
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