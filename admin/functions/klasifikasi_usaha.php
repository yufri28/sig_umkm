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
            "SELECT * FROM kecamatan"
        );
    }
}


$Klasifikasi = new Klasifikasi();
