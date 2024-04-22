<?php
$data_jenus = $Jenus->get();
?>
<i class="fa fa-arrow-circle-o-down" aria-hidden="true"></i>
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-users"></i> Data Jenis Usaha
        </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive">
            <div class="d-flex">
                <?php if($_SESSION['level'] != 'Kadis'):?>
                <a href="?page=add-ju" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Tambah Data</a>
                <?php endif;?>
            </div>
            <br>
            <table id="example1" class="table nowrap table-bordered table-striped" style="width:100%;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Jenis Usaha</th>
                        <th>Icon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while ($jenus = $data_jenus->fetch_assoc()) {

                    ?>
                    <?php if($jenus['nama_jenus'] != 'Default' || $jenus['id_ju'] != '1'):?>
                    <tr>
                        <td>
                            <?php echo $no++; ?>
                        </td>
                        <td>
                            <?php echo $jenus['nama_jenus']; ?>
                        </td>
                        <td>
                            <?php echo $jenus['icon']; ?>
                        </td>
                        <td>
                            <a href="?page=view-ju&kode=<?php echo $jenus['id_ju']; ?>" title="Detail"
                                class="btn btn-info btn-sm">
                                <i class="fa fa-eye"></i>
                            </a>
                            <?php if($_SESSION['level'] != 'Kadis'):?>
                            <a href="?page=edit-ju&kode=<?php echo $jenus['id_ju']; ?>" title="Ubah"
                                class="btn btn-success btn-sm">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="?page=del-ju&kode=<?php echo $jenus['id_ju']; ?>"
                                onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus"
                                class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                            </a>
                            <?php endif;?>
                        </td>
                    </tr>
                    <?php endif;?>
                    <?php
                    }
                    ?>
                </tbody>
                </tfoot>
            </table>
        </div>
    </div>
</div>