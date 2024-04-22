<?php 
if($_SESSION['level'] == "Kadis" || $_SESSION['level'] == "Admin"){
    echo "<script>
    Swal.fire({title: 'Anda tidak punya akses ke menu ini!',text: '',icon: 'error',confirmButtonText: 'OK'
    }).then((result) => {if (result.value){
        window.location = 'index.php?page=data-pengguna';
        }
    })</script>";
}
$get_data_unit = "SELECT * FROM jenis_user WHERE level!='Administrator'";
$data_ju = mysqli_query($koneksi, $get_data_unit);
?>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-edit"></i> Tambah Data
        </h3>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Level</label>
                <div class="col-sm-6">
                    <select name="id_jenus" id="id_jenus" class="form-control">
                        <option>- Pilih -</option>
                        <?php foreach ($data_ju as $key => $jenis_user) : ?>
                        <option value="<?= $jenis_user['id_jenus']; ?>"><?= $jenis_user['level']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
            <a href="?page=data-pengguna" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<?php

if (isset($_POST['Simpan'])) {
    // Mulai proses simpan data
    $username = $_POST['username'];
    $password = $_POST['password'];
    $id_jenus = $_POST['id_jenus'];

    // Pengecekan apakah username sudah ada di database
    $sql_cek_username = "SELECT * FROM admin WHERE uname = '$username'";
    $query_cek_username = mysqli_query($koneksi, $sql_cek_username);
    if (mysqli_num_rows($query_cek_username) > 0) {
        // Jika username sudah ada, tampilkan pesan
        echo "<script>
              Swal.fire({
                  title: 'Username sudah digunakan',
                  text: 'Silakan gunakan username lain.',
                  icon: 'error',
                  confirmButtonText: 'OK'
              }).then((result) => {
                  if (result.value) {
                      window.location = 'index.php?page=add-pengguna';
                  }
              });
              </script>";
    } else {
        // Jika username belum ada, lanjutkan proses penyimpanan
        $sql_simpan = "INSERT INTO admin (uname, password, id_jenus) VALUES (
            '$username',
            '" . password_hash($password, PASSWORD_BCRYPT) . "',
            '$id_jenus')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

        if ($query_simpan) {
            echo "<script>
                  Swal.fire({
                      title: 'Tambah Data Berhasil',
                      text: '',
                      icon: 'success',
                      confirmButtonText: 'OK'
                  }).then((result) => {
                      if (result.value) {
                          window.location = 'index.php?page=data-pengguna';
                      }
                  });
                  </script>";
        } else {
            echo "<script>
                  Swal.fire({
                      title: 'Tambah Data Gagal',
                      text: '',
                      icon: 'error',
                      confirmButtonText: 'OK'
                  }).then((result) => {
                      if (result.value) {
                          window.location = 'index.php?page=add-pengguna';
                      }
                  });
                  </script>";
        }
    }
}