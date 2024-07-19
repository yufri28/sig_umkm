<?php

class Kecamatan
{
    private $db;
    public function __construct()
    {
        $this->db = connectDatabase();
    }

    public function get()
    {
        return $this->db->query(
            "SELECT * FROM kecamatan"
        );
    }

    public function getById($id)
    {
        return $this->db->query(
            "SELECT * FROM kecamatan WHERE id_kec='$id'"
        );
    }

    public function add($data)
    {
        if(!empty($data)){
            $nama_kecamatan = $data['nama_kecamatan'];
            $warna = $data['warna'];
            $polygon = $data['polygon'];

            $cekData = $this->db->query("SELECT * FROM `kecamatan` WHERE LOWER(nm_kec) = '".strtolower($nama_kecamatan)."'");
            if ($cekData->num_rows > 0) {
                return $_SESSION['warning'] = 'Data sudah tersimpan sebelumnya!';
            }
            
            $insert = $this->db->query(
                        "INSERT INTO kecamatan (nm_kec,polygon,warna) VALUES('$nama_kecamatan','$polygon','$warna')"
                        );

            if($insert){
                return $_SESSION['success'] = "Data berhasil disimpan!";
            }else{
                return $_SESSION['error'] = "Data gagal disimpan!";
            }
        }else{
            return $_SESSION['error'] = "Tidak ada data yang dikirim!";
        }
    }

    public function update($data)
    {
        if(!empty($data)){
            $id_kec = $data['id_kec'];
            $nama_kecamatan = $data['nama_kecamatan'];
            $warna = $data['warna'];
            $polygon = $data['polygon'];

            $cekData = $this->db->query("SELECT * FROM `kecamatan` WHERE LOWER(nm_kec) = '".strtolower($nama_kecamatan)."' AND id_kec != '$id_kec'");
            if ($cekData->num_rows > 0) {
                return $_SESSION['warning'] = 'Tidak bisa menyimpan data dengan nama yang sama!';
            }

            $update = $this->db->query(
                        "UPDATE kecamatan SET nm_kec = '$nama_kecamatan', polygon = '$polygon', warna = '$warna' 
                         WHERE id_kec='$id_kec'"
                        );

            if($update){
                return $_SESSION['success'] = "Data berhasil diupdate!";
            }else{
                return $_SESSION['error'] = "Data gagal diupdate!";
            }
        }else{
            return $_SESSION['error'] = "Tidak ada data yang dikirim!";
        }
    }

    public function delete($id)
    {
        if(!empty($id)){
            $delete = $this->db->query(
                        "DELETE FROM kecamatan WHERE id_kec='$id'"
                        );
            if($delete){
                return $_SESSION['success'] = "Data berhasil dihapus!";
            }else{
                return $_SESSION['error'] = "Data gagal dihapus!";
            }
        }else{
            return $_SESSION['error'] = "Tidak ada data yang dikirim!";
        }
    }
}


$Kecamatan = new Kecamatan();