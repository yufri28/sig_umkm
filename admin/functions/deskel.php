<?php
// require_once '../../config.php';
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
            "SELECT * FROM deskel"
        );
    }
}


$Deskel = new Deskel();
