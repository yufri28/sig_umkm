<?php
class Deskel
{
    private $db;
    public function __construct()
    {
        $this->db = connectDatabase();
    }

    public function get()
    {
        return $this->db->query(
            "SELECT d.id_deskel, d.nm_deskel, k.id_kec AS id_kecamatan, k.nm_kec FROM deskel d JOIN kecamatan k ON d.id_kec = k.id_kec"
        );
    }

    public function getById($id)
    {
        return $this->db->query(
            "SELECT d.id_deskel, d.nm_deskel, k.id_kec AS id_kecamatan, k.nm_kec FROM deskel d JOIN kecamatan k ON d.id_kec = k.id_kec WHERE d.id_deskel='$id'"
        );
    }

    public function add($data)
    {
        if (!empty($data)) {

            $nama_deskel = $data['nama_deskel'];
            $id_kec = $data['id_kec'];
            $cekData = $this->db->query("SELECT * FROM `deskel` WHERE LOWER(nm_deskel) = '" . strtolower($nama_deskel) . "'");
            if ($cekData->num_rows > 0) {
                return $_SESSION['warning'] = 'Data sudah tersimpan sebelumnya!';
            }

            $insert = $this->db->query(
                "INSERT INTO deskel (id_deskel,nm_deskel,id_kec) VALUES(0,'$nama_deskel','$id_kec')"
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
            $id_deskel = $data['id_deskel'];
            $nama_deskel = $data['nama_deskel'];
            $id_kec = $data['id_kec'];

            $cekData = $this->db->query("SELECT * FROM `deskel` WHERE LOWER(nm_deskel) = '" . strtolower($nama_deskel) . "' AND id_deskel != '$id_deskel'");
            if ($cekData->num_rows > 0) {
                return $_SESSION['warning'] = 'Tidak bisa menyimpan data dengan nama yang sama!';
            }

            $update = $this->db->query(
                "UPDATE deskel SET nm_deskel = '$nama_deskel', id_kec='$id_kec' WHERE id_deskel='$id_deskel'"
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
                "DELETE FROM deskel WHERE id_deskel='$id'"
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


$Deskel = new Deskel();
