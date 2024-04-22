<?php
if($_SESSION['level'] == "Kadis"){
    echo "<script>
    Swal.fire({title: 'Anda tidak punya akses ke menu ini!',text: '',icon: 'error',confirmButtonText: 'OK'
    }).then((result) => {if (result.value){
        window.location = 'index.php?page=data-faq';
        }
    })</script>";
}
if (isset($_POST['Simpan'])) {
    $pertanyaan = htmlspecialchars($_POST['pertanyaan']);
    $jawaban = htmlspecialchars($_POST['jawaban']);
    $data = [
        'pertanyaan' => $pertanyaan,
        'jawaban' => $jawaban,
        'id_admin' => $_SESSION['id_user']
    ];
    $Faq->add($data);
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
        window.location = 'index.php?page=data-faq';
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
                <label class="col-sm-2 col-form-label">Pertanyaan</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="pertanyaan" name="pertanyaan"
                        placeholder="Masukkan pertanyaan" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jawaban</label>
                <div class="col-sm-5">
                    <textarea class="form-control" name="jawaban" required id="jawaban" cols="30" rows="10"></textarea>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
            <a href="?page=data-faq" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>