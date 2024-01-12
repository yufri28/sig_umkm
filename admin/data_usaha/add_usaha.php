<?php

$data_kecamatan = $Kecamatan->get();
$data_deskel = $Deskel->get();
$data_sektor = $Sektor->get();
$data_klasifikasi = $Klasifikasi->get();


if (isset($_POST['Simpan'])) {
    $data = array();
    $nama_usaha = htmlspecialchars($_POST['nama_usaha']);
    $id_kec = htmlspecialchars($_POST['id_kec']);
    $id_deskel = htmlspecialchars($_POST['id_deskel']);
    $id_su = htmlspecialchars($_POST['id_su']);
    $id_ku = htmlspecialchars($_POST['id_ku']);
    $tahun_pembentukan = htmlspecialchars($_POST['tahun_pembentukan']);
    $jenis_usaha = htmlspecialchars($_POST['jenis_usaha']);
    $no_izin = htmlspecialchars($_POST['no_izin']);
    $nama_pemilik = htmlspecialchars($_POST['nama_pemilik']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $tk_laki = htmlspecialchars($_POST['tk_laki']);
    $tk_perempuan = htmlspecialchars($_POST['tk_perempuan']);
    $modal_sendiri = htmlspecialchars($_POST['modal_sendiri']);
    $modal_luar = htmlspecialchars($_POST['modal_luar']);
    $asset = htmlspecialchars($_POST['asset']);
    $omset = htmlspecialchars($_POST['omset']);
    $latitude = htmlspecialchars($_POST['latitude']);
    $longitude = htmlspecialchars($_POST['longitude']);

    $data = [
        'nama_usaha' => $nama_usaha,
        'id_kec' => $id_kec,
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
        'longitude' => $longitude
    ];
    $Usaha->add($data);
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
    <form action="" method="post">
        <div class="card-body">

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Usaha</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="nama_usaha" name="nama_usaha" placeholder="Nama Usaha" required>
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
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Klasifikasi Usaha</label>
                <div class="col-sm-5">
                    <select name="id_ku" id="id_ku" class="form-control">
                        <option value="">- Pilih -</option>
                        <?php foreach ($data_klasifikasi as $key => $klasifikasi) : ?>
                            <option value="<?= $klasifikasi['id_ku']; ?>"><?= $klasifikasi['nm_ku']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tahun Pembentukan</label>
                <div class="col-sm-5">
                    <input type="number" class="form-control" id="tahun_pembentukan" name="tahun_pembentukan" placeholder="Contoh: 2019" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jenis Usaha</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="jenis_usaha" name="jenis_usaha" placeholder="Jenis Usaha" required>
                </div>
            </div>



            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nomor Izin</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="no_izin" name="no_izin" placeholder="Nomor Izin" required>
                </div>
            </div>


            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Pemilik</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik" placeholder="Nama Pemilik" required>
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
                    <input type="number" class="form-control" id="tk_laki" name="tk_laki" placeholder="Jumlah Pekerja Laki-laki" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jumlah Pekerja Perempuan</label>
                <div class="col-sm-5">
                    <input type="number" class="form-control" id="tk_perempuan" name="tk_perempuan" placeholder="Jumlah Pekerja Perempuan" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Modal Sendiri</label>
                <div class="col-sm-5">
                    <input type="number" class="form-control" id="modal_sendiri" name="modal_sendiri" placeholder="Modal Sendiri" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Modal Luar</label>
                <div class="col-sm-5">
                    <input type="number" class="form-control" id="modal_luar" name="modal_luar" placeholder="Modal Luar" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Asset</label>
                <div class="col-sm-5">
                    <input type="number" class="form-control" id="asset" name="asset" placeholder="Asset" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Omset</label>
                <div class="col-sm-5">
                    <input type="number" class="form-control" id="omset" name="omset" placeholder="Omset" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Latitude</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="latitude" name="latitude" placeholder="Latitude" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Longitude</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="longitude" name="longitude" placeholder="Longitude" required>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
            <a href="?page=data-pegawai" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>