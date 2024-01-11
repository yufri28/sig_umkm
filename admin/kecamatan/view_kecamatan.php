<?php

    if(isset($_GET['kode'])){
        $sql_cek = $Kecamatan->getById($_GET['kode']);
        $data_cek = mysqli_fetch_array($sql_cek,MYSQLI_BOTH);
    }
?>
<div class="row">
    <div class="col-md-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Detail Kecamatan</h3>

                <div class="card-tools">
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table">
                    <tbody>
                        <tr>
                            <td style="width: 150px">
                                <b>Nama Kecamatan</b>
                            </td>
                            <td>:
                                <?php echo $data_cek['nm_kec']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 150px">
                                <b>Kode Warna</b>
                            </td>
                            <td>:
                                <?php echo $data_cek['warna']; ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="card-footer">
                    <a href="?page=data-kecamatan" class="btn btn-warning">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>