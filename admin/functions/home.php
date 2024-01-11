<?php
class Home
{
    private $db;
    private $data;
    public function __construct()
    {
        $this->db = connectDatabase();
        $this->index();
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

        return $this->data;
    }

    public function count_usaha()
    {
        $jumlah = $this->db->query(
            "SELECT COUNT(*) AS jumlah_usaha FROM usaha"
        )->fetch_assoc();
        return $jumlah['jumlah_usaha'];
    }
    public function count_kecamatan()
    {
        $jumlah = $this->db->query(
            "SELECT COUNT(*) AS jumlah_kecamatan FROM kecamatan"
        )->fetch_assoc();

        return $jumlah['jumlah_kecamatan'];
    }
    public function count_deskel()
    {
        $jumlah = $this->db->query(
            "SELECT COUNT(*) AS jumlah_deskel FROM deskel"
        )->fetch_assoc();
        return $jumlah['jumlah_deskel'];
    }
    public function count_sektor_usaha()
    {
        $jumlah = $this->db->query(
            "SELECT COUNT(*) AS jumlah_sektor_usaha FROM sektor_usaha"
        )->fetch_assoc();
         return $jumlah['jumlah_sektor_usaha'];
    }
    public function count_klasifikasi_usaha()
    {
        $jumlah = $this->db->query(
            "SELECT COUNT(*) AS jumlah_klasifikasi_usaha FROM klasifikasi_usaha"
        )->fetch_assoc();
         return $jumlah['jumlah_klasifikasi_usaha'];
    }
}


$Home = new Home();