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
            "SELECT * FROM kecamatan"
        );
    }
}


$Sektor = new Sektor();
