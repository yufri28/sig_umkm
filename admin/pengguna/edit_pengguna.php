<?php
if($_SESSION['level'] == "Kadis" || $_SESSION['level'] == "Admin"){
    echo "<script>
    Swal.fire({title: 'Anda tidak punya akses ke menu ini!',text: '',icon: 'error',confirmButtonText: 'OK'
    }).then((result) => {if (result.value){
        window.location = 'index.php?page=data-pengguna';
        }
    })</script>";
}
    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM admin WHERE id_admin='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }

    $data_jenis_user = "SELECT * FROM jenis_user WHERE level!='Administrator'";
    $data_jenus = mysqli_query($koneksi, $data_jenis_user);
?>

<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-edit"></i> Ubah Data
        </h3>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">
            <input type='hidden' class="form-control" name="id_admin" value="<?php echo $data_cek['id_admin']; ?>"
                readonly />
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="username" name="username"
                        value="<?php echo $data_cek['uname']; ?>" />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" id="pass" name="password" />
                    <small><i>Diisi jika ingin mengubah password</i></small>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Level</label>
                <div class="col-sm-6">
                    <select name="id_jenus" id="id_jenus" class="form-control">
                        <option>- Pilih -</option>
                        <?php foreach ($data_jenus as $key => $jenis_user) : ?>
                        <option <?= $data_cek['id_jenus'] == $jenis_user['id_jenus'] ? 'selected':''; ?>
                            value="<?= $jenis_user['id_jenus']; ?>"><?= $jenis_user['level']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
            <a href="?page=data-pengguna" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>



<?php

if (isset($_POST['Ubah'])) {
    $id_admin = $_POST['id_admin'];
    $username = $_POST['username'];
    $id_jenus = $_POST['id_jenus'];
    $password = $_POST['password'];

    // Jika password tidak kosong, maka password akan diubah
    if (!empty($password)) {
        $password = password_hash($password, PASSWORD_BCRYPT);
        $sql_ubah = "UPDATE admin SET
                     uname='$username',
                     password='$password',
                     id_jenus='$id_jenus'
                     WHERE id_admin='$id_admin'";
    } else {
        // Jika password kosong, maka password tidak akan diubah
        $sql_ubah = "UPDATE admin SET
                     uname='$username',
                     id_jenus='$id_jenus'
                     WHERE id_admin='$id_admin'";
    }

    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
        echo "<script>
              Swal.fire({
                  title: 'Ubah Data Berhasil',
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
                  title: 'Ubah Data Gagal',
                  text: '',
                  icon: 'error',
                  confirmButtonText: 'OK'
              }).then((result) => {
                  if (result.value) {
                      window.location = 'index.php?page=data-pengguna';
                  }
              });
              </script>";
    }
}
?>

<script type="text/javascript">
function change() {
    var x = document.getElementById('pass').type;

    if (x == 'password') {
        document.getElementById('pass').type = 'text';
        document.getElementById('mybutton').innerHTML;
    } else {
        document.getElementById('pass').type = 'password';
        document.getElementById('mybutton').innerHTML;
    }
}
</script>