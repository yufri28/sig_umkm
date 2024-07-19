<?php
// require_once '../../config.php';
class Sektor
{
    private $db;
    public function __construct()
    {
        $this->db = connectDatabase();
    }

    public function get()
    {
        return $this->db->query(
            "SELECT * FROM sektor_usaha"
        );
    }
    
    public function getById($id)
    {
        return $this->db->query(
            "SELECT * FROM sektor_usaha WHERE id_su='$id'"
        );
    }

    public function add($nama_su)
    {
        if(!empty($nama_su)){
            $cekData = $this->db->query("SELECT * FROM `sektor_usaha` WHERE LOWER(nm_su) = '".strtolower($nama_su)."'");
            if ($cekData->num_rows > 0) {
                return $_SESSION['warning'] = 'Data sudah tersimpan sebelumnya!';
            }
            
            $insert = $this->db->query(
                        "INSERT INTO sektor_usaha (nm_su) VALUES('$nama_su')"
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
            $id_su = $data['id_su'];
            $nama_su = $data['nama_su'];

            $cekData = $this->db->query("SELECT * FROM `sektor_usaha` WHERE LOWER(nm_su) = '".strtolower($nama_su)."' AND id_su != '$id_su'");
            if ($cekData->num_rows > 0) {
                return $_SESSION['warning'] = 'Tidak bisa menyimpan data dengan nama yang sama!';
            }

            $update = $this->db->query(
                        "UPDATE sektor_usaha SET nm_su = '$nama_su' WHERE id_su='$id_su'"
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
                        "DELETE FROM sektor_usaha WHERE id_su='$id'"
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


$Sektor = new Sektor();