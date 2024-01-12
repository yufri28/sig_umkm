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

    public function getById($id)
    {
        return $this->db->query(
            "SELECT * FROM usaha u 
            JOIN kecamatan k ON u.id_kec=k.id_kec 
            JOIN deskel d ON u.id_deskel=d.id_deskel 
            JOIN sektor_usaha su ON u.id_su=su.id_su 
            JOIN klasifikasi_usaha ku ON u.id_ku=ku.id_ku WHERE id_datum='$id'"
        );
    }

    public function add($data)
    {
        if (!empty($data)) {

            $nama_usaha = $data['nama_usaha'];
            $id_kec = $data['id_kec'];
            $id_deskel = $data['id_deskel'];
            $id_su = $data['id_su'];
            $id_ku = $data['id_ku'];
            $tahun_pembentukan = $data['tahun_pembentukan'];
            $jenis_usaha = $data['jenis_usaha'];
            $no_izin = $data['no_izin'];
            $nama_pemilik = $data['nama_pemilik'];
            $alamat = $data['alamat'];
            $tk_laki = $data['tk_laki'];
            $tk_perempuan = $data['tk_perempuan'];
            $modal_sendiri = $data['modal_sendiri'];
            $modal_luar = $data['modal_luar'];
            $asset = $data['asset'];
            $omset = $data['omset'];
            $latitude = $data['latitude'];
            $longitude = $data['longitude'];


            $insert = $this->db->query(
                "INSERT INTO usaha (id_datum,id_kec,id_deskel,id_su,id_ku,nm_usaha,thn_pmtkn,jns_ush,nmr_izin,nm_pemilik,alamat,tng_kerja_lki,tng_kerja_prmpn,mdl_sendiri,mdl_luar,asset,omset,latitude,longitude) VALUES(0,'$id_kec', '$id_deskel', '$id_su', '$id_ku','$nama_usaha','$tahun_pembentukan','$jenis_usaha','$no_izin', '$nama_pemilik','$alamat','$tk_laki','$tk_perempuan','$modal_sendiri','$modal_luar','$asset','$omset','$latitude','$longitude')"
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
            $id_kec = $data['id_kec'];
            $nama_usaha = $data['nama_usaha'];
            $warna = $data['warna'];
            $polygon = $data['polygon'];

            $cekData = $this->db->query("SELECT * FROM `usaha` WHERE LOWER(nm_kec) = '" . strtolower($nama_usaha) . "' AND id_kec != '$id_kec'");
            if ($cekData->num_rows > 0) {
                return $_SESSION['warning'] = 'Tidak bisa menyimpan data dengan nama yang sama!';
            }

            $update = $this->db->query(
                "UPDATE usaha SET nm_kec = '$nama_usaha', polygon = '$polygon', warna = '$warna' 
                         WHERE id_kec='$id_kec'"
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
                "DELETE FROM usaha WHERE id_datum='$id'"
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


$Usaha = new Usaha();
