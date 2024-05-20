<?php 
if($_SESSION['level'] == "Kadis" || $_SESSION['level'] == "Admin"){
    echo "<script>
    Swal.fire({title: 'Anda tidak punya akses ke menu ini!',text: '',icon: 'error',confirmButtonText: 'OK'
    }).then((result) => {if (result.value){
        window.location = 'index.php?page=data-pengguna';
        }
    })</script>";
}
?>
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-table"></i> Data User
        </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive">
            <div>
                <?php if($_SESSION['level'] != 'Kadis'):?>
                <a href="?page=add-pengguna" class="btn btn-primary">
                    <i class="fa fa-edit"></i> Tambah Data</a>
                <?php endif;?>
            </div>
            <br>
            <table id="example1" class="table nowrap table-bordered table-striped" style="width:100%;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th style="width: 440px;">Username</th>
                        <th style="width: 350px;">Nama Jenis User</th>
                        <th style="width: 340px;">Level</th>
                        <?php if($_SESSION['level'] != 'Kadis'):?>
                        <th style="width: 230px;">Aksi</th>
                        <?php endif;?>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $no = 1;
                    $sql = $koneksi->query("SELECT * FROM admin a JOIN  jenis_user ju WHERE a.id_jenus=ju.id_jenus AND a.id_jenus!=1");
                    while ($data = $sql->fetch_assoc()) {
                    ?>

                    <tr>
                        <td>
                            <?php echo $no++; ?>
                        </td>
                        <td>
                            <?php echo $data['uname']; ?>
                        </td>
                        <td>
                            <?php echo $data['nama_jenus']; ?>
                        </td>
                        <td>
                            <?php echo $data['level']; ?>
                        </td>
                        <?php if($_SESSION['level'] != 'Kadis'):?>
                        <td>
                            <a href="?page=edit-pengguna&kode=<?php echo $data['id_admin']; ?>" title="Ubah"
                                class="btn btn-success btn-sm">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="?page=del-pengguna&kode=<?php echo $data['id_admin']; ?>"
                                onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus"
                                class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                                </>
                        </td>
                        <?php endif;?>
                    </tr>

                    <?php
                    }
                    ?>
                </tbody>
                </tfoot>
            </table>
        </div>
    </div>
    <!-- /.card-body -->