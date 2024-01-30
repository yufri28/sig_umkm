<?php

if (isset($_GET['kode'])) {
    $sql_cek = $Faq->getById($_GET['kode']);
    $data_cek = mysqli_fetch_array($sql_cek, MYSQLI_BOTH);
}
if (isset($_POST['Ubah'])) {
    $data = [
        'id_faq' => htmlspecialchars($_GET['kode']),
        'pertanyaan' => htmlspecialchars($_POST['pertanyaan']),
        'jawaban' => htmlspecialchars($_POST['jawaban']),
        'id_admin' => $_SESSION['id_user']
    ];
    $Faq->update($data);
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

<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-edit"></i> Ubah Data
        </h3>
    </div>
    <form action="" method="post">
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Pertanyaan</label>
                <div class="col-sm-5">

                    <input type="text" class="form-control" id="pertanyaan" value="<?= $data_cek['pertanyaan']; ?>" name="pertanyaan" placeholder="Masukkan pertanyaan" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jawaban</label>
                <div class="col-sm-5">
                    <textarea class="form-control" name="jawaban" required id="jawaban" cols="30" rows="10"><?= $data_cek['jawaban']; ?></textarea>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
            <a href="?page=data-faq" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>