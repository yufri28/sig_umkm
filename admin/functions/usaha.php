<?php
// require_once '../../config.php';
class Usaha
{
    private $db;
    public function __construct()
    {
        $this->db = connectDatabase();
    }

    public function get()
    {
        return $this->db->query(
            "SELECT * FROM usaha u 
            JOIN kecamatan k ON u.id_kec=k.id_kec 
            JOIN deskel d ON u.id_deskel=d.id_deskel 
            JOIN sektor_usaha su ON u.id_su=su.id_su 
            JOIN klasifikasi_usaha ku ON u.id_ku=ku.id_ku"
        );
    }
}


$Usaha = new Usaha();
