<?php
// require_once '../../config.php';
class Pengaturan
{
    private $db;
    public function __construct()
    {
        $this->db = connectDatabase();
    }

    public function get()
    {
        return $this->db->query(
            "SELECT * FROM konten k JOIN jenus ju ON k.f_id_jenus=ju.id_ju"
        );
    }

    public function getById($id)
    {
        return $this->db->query(
            "SELECT * FROM konten k JOIN jenus ju ON k.f_id_jenus=ju.id_ju WHERE k.id_konten='$id'"
        );
    }

    public function add($data)
    {
        if (!empty($data)) {
            $judul_konten = $data['judul_konten'];
            $gambar_konten = $data['gambar_konten'];
            $deskripsi = $data['deskripsi'];
            $jns_konten = $data['jns_konten'];
            $id_user = $data['id_user'];
            $f_id_jenus = $data['f_id_jenus'];
            $latitude = $data['latitude'];
            $longitude = $data['longitude'];


            // Insert data ke database
            $insert = $this->db->query(
                "INSERT INTO konten (id_konten,nm_konten,gambar,deskripsi,jns_konten,id_admin,f_id_jenus,latitude,longitude) 
                VALUES(0,'$judul_konten','$gambar_konten','$deskripsi','$jns_konten','$id_user','$f_id_jenus','$latitude','$longitude')"
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

            $judul_konten = $data['judul_konten'];
            $gambar_konten = $data['gambar_konten'];
            $deskripsi = $data['deskripsi'];
            $jns_konten = $data['jns_konten'];
            $id_user = $data['id_user'];
            $id_konten = $data['id_konten'];
            $f_id_jenus = $data['f_id_jenus'];
            $latitude = $data['latitude'];
            $longitude = $data['longitude'];


            $update = $this->db->query(
                "UPDATE konten SET nm_konten = '$judul_konten', gambar='$gambar_konten', deskripsi='$deskripsi', jns_konten='$jns_konten', id_admin='$id_user', f_id_jenus='$f_id_jenus',latitude='$latitude',longitude='$longitude' WHERE id_konten='$id_konten'"
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
                "DELETE FROM konten WHERE id_konten='$id'"
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


$Pengaturan = new Pengaturan();
