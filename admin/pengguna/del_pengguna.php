<?php
if(isset($_GET['kode'])){
    if($_SESSION['level'] == "Kadis" || $_SESSION['level'] == "Admin"){
        echo "<script>
        Swal.fire({title: 'Anda tidak punya akses ke menu ini!',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {if (result.value){
            window.location = 'index.php?page=data-pengguna';
            }
        })</script>";
    }else{
        $sql_hapus = "DELETE FROM admin WHERE id_admin='".$_GET['kode']."'";
        $query_hapus = mysqli_query($koneksi, $sql_hapus);

        if ($query_hapus) {
            echo "<script>
            Swal.fire({title: 'Hapus Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'index.php?page=data-pengguna';
                }
            })</script>";
            }else{
            echo "<script>
            Swal.fire({title: 'Hapus Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'index.php?page=data-pengguna';
                }
            })</script>";
        }
    }
}