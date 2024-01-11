<?php
// require_once '../../config.php';
class Home
{
    private $db;
    private $data;
    public function __construct()
    {
        $this->db = connectDatabase();
    }

    public function index()
    {
        $this->data = [
            'jumlah_usaha' => $this->count_usaha(),
            'jumlah_kecamatan' => $this->count_kecamatan(),
            'jumlah_deskel' => $this->count_deskel(),
            'jumlah_sektor_usaha' => $this->count_sektor_usaha(),
            'jumlah_klasifikasi_usaha' => $this->count_klasifikasi_usaha()
        ];
    }

    public function count_usaha()
    {
        return $this->db->query(
            "SELECT COUNT(*) AS jumlah_usaha FROM usaha"
        )->fetch_assoc();
    }
    public function count_kecamatan()
    {
        return $this->db->query(
            "SELECT COUNT(*) AS jumlah_kecamatan FROM kecamatan"
        )->fetch_assoc();
    }
    public function count_deskel()
    {
        return $this->db->query(
            "SELECT COUNT(*) AS jumlah_deskel FROM deskel"
        )->fetch_assoc();
    }
    public function count_sektor_usaha()
    {
        return $this->db->query(
            "SELECT COUNT(*) AS jumlah_sektor_usaha FROM sektor_usaha"
        )->fetch_assoc();
    }
    public function count_klasifikasi_usaha()
    {
        return $this->db->query(
            "SELECT COUNT(*) AS jumlah_klasifikasi_usaha FROM klasifikasi_usaha"
        )->fetch_assoc();
    }
}


$Home = new Home();
