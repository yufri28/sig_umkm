<?php

if (isset($_GET['kode'])) {
    $sql_cek = $Faq->getById($_GET['kode']);
    $data_cek = mysqli_fetch_array($sql_cek, MYSQLI_BOTH);
}
?>
<div class="row">
    <div class="col-md-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Detail FAQ</h3>

                <div class="card-tools">
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table">
                    <tbody>
                        <tr>
                            <td style="width: 150px">
                                <b>Pertanyaan</b>
                            </td>
                            <td>:
                                <?php echo $data_cek['pertanyaan']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 150px">
                                <b>Jawaban</b>
                            </td>
                            <td>:
                                <?php echo $data_cek['jawaban']; ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="card-footer">
                    <a href="?page=data-faq" class="btn btn-warning">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>