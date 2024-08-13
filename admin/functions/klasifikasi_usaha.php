<?php
// require_once '../../config.php';
class Klasifikasi
{
    private $db;
    public function __construct()
    {
        $this->db = connectDatabase();
    }

    public function get()
    {
        return $this->db->query(
            "SELECT * FROM klasifikasi_usaha"
        );
    }

    public function getById($id)
    {
        return $this->db->query(
            "SELECT * FROM klasifikasi_usaha WHERE id_ku='$id'"
        );
    }

    public function add($data)
    {
        $nama_ku = $data['nama_klasifikasi'];
        $min_omset = $data['min_omset'];
        $max_omset = $data['max_omset'];
        
        if (!empty($data)) {
            $cekData = $this->db->query("SELECT * FROM `klasifikasi_usaha` WHERE LOWER(nm_ku) = '" . strtolower($nama_ku) . "'");
            if ($cekData->num_rows > 0) {
                return $_SESSION['warning'] = 'Data sudah tersimpan sebelumnya!';
            }

            $insert = $this->db->query(
                "INSERT INTO 
                        `klasifikasi_usaha`
                        (nm_ku,min_omset,max_omset)
                VALUES
                        ('$nama_ku','$min_omset','$max_omset')"
            );

            if ($insert) {
                return $_SESSION['success'] = "Data berhasil disimpan!";
            } else {
                return $_SESSION['error'] = "Data gagal disimpan!";
            }
        } else {
            return $_SESSION['error'] = "Tidak ada data yang dikirim!";
        }
    }

    public function update($data)
    {
        if (!empty($data)) {
            $id_ku = $data['id_ku'];
            $nama_ku = $data['nama_ku'];
            $min_omset = $data['min_omset'];
            $max_omset = $data['max_omset'];
            
            $cekData = $this->db->query("SELECT * FROM `klasifikasi_usaha` WHERE LOWER(nm_ku) = '" . strtolower($nama_ku) . "' AND id_ku != '$id_ku'");
            if ($cekData->num_rows > 0) {
                return $_SESSION['warning'] = 'Tidak bisa menyimpan data dengan nama yang sama!';
            }

            $update = $this->db->query(
                "UPDATE 
                    klasifikasi_usaha 
                SET 
                    nm_ku = '$nama_ku', 
                    min_omset = '$min_omset', 
                    max_omset = '$max_omset'
                 WHERE 
                    id_ku='$id_ku'"
            );

            if ($update) {
                return $_SESSION['success'] = "Data berhasil diupdate!";
            } else {
                return $_SESSION['error'] = "Data gagal diupdate!";
            }
        } else {
            return $_SESSION['error'] = "Tidak ada data yang dikirim!";
        }
    }

    public function delete($id)
    {
        if (!empty($id)) {
            $delete = $this->db->query(
                "DELETE FROM klasifikasi_usaha WHERE id_ku='$id'"
            );
            if ($delete) {
                return $_SESSION['success'] = "Data berhasil dihapus!";
            } else {
                return $_SESSION['error'] = "Data gagal dihapus!";
            }
        } else {
            return $_SESSION['error'] = "Tidak ada data yang dikirim!";
        }
    }
}


$Klasifikasi = new Klasifikasi();