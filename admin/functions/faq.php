<?php
// require_once '../../config.php';
class Faq
{
    private $db;
    public function __construct()
    {
        $this->db = connectDatabase();
    }

    public function get()
    {
        return $this->db->query(
            "SELECT * FROM faq"
        );
    }

    public function getById($id)
    {
        return $this->db->query(
            "SELECT * FROM faq WHERE id_faq='$id'"
        );
    }

    public function add($data)
    {
        if (!empty($data)) {
            $pertanyaan = $data['pertanyaan'];
            $jawaban = $data['jawaban'];
            $id_admin = $data['id_admin'];

            $insert = $this->db->query(
                "INSERT INTO faq (id_faq,pertanyaan,jawaban,id_admin) VALUES(0,'$pertanyaan','$jawaban','$id_admin')"
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
            $id_faq = $data['id_faq'];
            $pertanyaan = $data['pertanyaan'];
            $jawaban = $data['jawaban'];
            $id_admin = $data['id_admin'];

            $update = $this->db->query(
                "UPDATE faq SET pertanyaan = '$pertanyaan', jawaban='$jawaban', id_admin='$id_admin' WHERE id_faq='$id_faq'"
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
                "DELETE FROM faq WHERE id_faq='$id'"
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


$Faq = new Faq();
