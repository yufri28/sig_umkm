<?php

if (isset($_GET['kode'])) {
    if($_SESSION['level'] == "Kadis" || $_SESSION['level'] == "Admin"){
        echo "<script>
        Swal.fire({title: 'Anda tidak punya akses ke menu ini!',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {if (result.value){
            window.location = 'index.php?page=data-pengaturan';
            }
        })</script>";
    }else{
        $Pengaturan->delete($_GET['kode']);
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
        window.location = 'index.php?page=data-pengaturan';
    }
});
</script>
<?php unset($_SESSION['success']); // Menghapus session setelah ditampilkan 
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