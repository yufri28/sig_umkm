<?php
// require_once '../../config.php';
class Jenus
{
    private $db;
    public function __construct()
    {
        $this->db = connectDatabase();
    }

    public function get()
    {
        return $this->db->query(
            "SELECT * FROM jenus"
        );
    }

    public function getById($id)
    {
        return $this->db->query(
            "SELECT * FROM jenus WHERE id_ju='$id'"
        );
    }

    public function add($data)
    {
        if (!empty($data)) {
            $nama_jenus = $data['nama_jenus'];
            $icon = $data['icon'];
            $cekData = $this->db->query("SELECT * FROM `jenus` WHERE LOWER(nama_jenus) = '" . strtolower($nama_jenus) . "'");
            if ($cekData->num_rows > 0) {
                return $_SESSION['warning'] = 'Data sudah tersimpan sebelumnya!';
            }

            $insert = $this->db->query(
                "INSERT INTO jenus (nama_jenus,icon) VALUES('$nama_jenus','$icon')"
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
            $id_ju = $data['id_ju'];
            $nama_jenus = $data['nama_jenus'];
            $icon = $data['icon'];

            $cekData = $this->db->query("SELECT * FROM `jenus` WHERE LOWER(nama_jenus) = '" . strtolower($nama_jenus) . "' AND id_ju != '$id_ju'");
            if ($cekData->num_rows > 0) {
                return $_SESSION['warning'] = 'Tidak bisa menyimpan data dengan nama yang sama!';
            }

            $update = $this->db->query(
                "UPDATE jenus SET nama_jenus = '$nama_jenus', icon='$icon' WHERE id_ju='$id_ju'"
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
                "DELETE FROM jenus WHERE id_ju='$id'"
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


$Jenus = new Jenus();