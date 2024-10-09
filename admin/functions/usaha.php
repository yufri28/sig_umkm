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
            "SELECT *, u.polygon AS polygon_usaha FROM usaha u 
            JOIN deskel d ON u.id_deskel=d.id_deskel 
            JOIN sektor_usaha su ON u.id_su=su.id_su 
            JOIN kecamatan k ON d.id_kec=k.id_kec 
            JOIN klasifikasi_usaha ku ON u.id_ku=ku.id_ku
            JOIN jenus ju ON u.jns_ush=ju.id_ju
            ORDER BY u.id_datum DESC"
        );
    }

    public function getBy($kecamatan, $tanggal_awal, $tanggal_akhir)
    {
        if ($tanggal_awal == $tanggal_akhir) {
            // Jika tanggal awal dan akhir sama, cari data pada hari itu saja
            return $this->db->query(
                "SELECT *, u.polygon AS polygon_usaha 
                FROM usaha u 
                JOIN deskel d ON u.id_deskel = d.id_deskel 
                JOIN sektor_usaha su ON u.id_su = su.id_su 
                JOIN kecamatan k ON d.id_kec = k.id_kec 
                JOIN klasifikasi_usaha ku ON u.id_ku = ku.id_ku
                JOIN jenus ju ON u.jns_ush = ju.id_ju
                WHERE k.id_kec = '$kecamatan' 
                AND DATE(u.created_at) = '$tanggal_awal'
                ORDER BY u.id_datum DESC"
            );
        } else {
            // Jika tanggal awal dan akhir berbeda, cari data di antara dua tanggal tersebut
            return $this->db->query(
                "SELECT *, u.polygon AS polygon_usaha 
                FROM usaha u 
                JOIN deskel d ON u.id_deskel = d.id_deskel 
                JOIN sektor_usaha su ON u.id_su = su.id_su 
                JOIN kecamatan k ON d.id_kec = k.id_kec 
                JOIN klasifikasi_usaha ku ON u.id_ku = ku.id_ku
                JOIN jenus ju ON u.jns_ush = ju.id_ju
                WHERE k.id_kec = '$kecamatan' 
                AND u.created_at BETWEEN '$tanggal_awal' AND '$tanggal_akhir'
                ORDER BY u.id_datum DESC"
            );
        }
    }

    public function getByKecamatan($kecamatan)
    {
        return $this->db->query(
            "SELECT *, u.polygon AS polygon_usaha FROM usaha u 
            JOIN deskel d ON u.id_deskel=d.id_deskel 
            JOIN sektor_usaha su ON u.id_su=su.id_su 
            JOIN kecamatan k ON d.id_kec=k.id_kec 
            JOIN klasifikasi_usaha ku ON u.id_ku=ku.id_ku
            JOIN jenus ju ON u.jns_ush=ju.id_ju
            WHERE k.id_kec='$kecamatan'
            ORDER BY u.id_datum DESC"
        );
    }

    public function getByDate($tanggal_awal, $tanggal_akhir)
    {
        if ($tanggal_awal == $tanggal_akhir) {
            // Jika tanggal awal dan akhir sama, cari data pada hari itu saja
            return $this->db->query(
                "SELECT *, u.polygon AS polygon_usaha 
                 FROM usaha u 
                 JOIN deskel d ON u.id_deskel = d.id_deskel 
                 JOIN sektor_usaha su ON u.id_su = su.id_su 
                 JOIN kecamatan k ON d.id_kec = k.id_kec 
                 JOIN klasifikasi_usaha ku ON u.id_ku = ku.id_ku
                 JOIN jenus ju ON u.jns_ush = ju.id_ju
                 WHERE DATE(u.created_at) = '$tanggal_awal'
                 ORDER BY u.id_datum DESC"
            );
        } else {
            // Jika tanggal awal dan akhir berbeda, cari data di antara dua tanggal tersebut
            return $this->db->query(
                "SELECT *, u.polygon AS polygon_usaha 
                 FROM usaha u 
                 JOIN deskel d ON u.id_deskel = d.id_deskel 
                 JOIN sektor_usaha su ON u.id_su = su.id_su 
                 JOIN kecamatan k ON d.id_kec = k.id_kec 
                 JOIN klasifikasi_usaha ku ON u.id_ku = ku.id_ku
                 JOIN jenus ju ON u.jns_ush = ju.id_ju
                 WHERE u.created_at BETWEEN '$tanggal_awal' AND '$tanggal_akhir'
                 ORDER BY u.id_datum DESC"
            );
        }
    }

    public function getById($id)
    {
        return $this->db->query(
            "SELECT *, u.polygon AS polygon_usaha FROM usaha u 
            JOIN deskel d ON u.id_deskel=d.id_deskel 
            JOIN sektor_usaha su ON u.id_su=su.id_su 
            JOIN kecamatan k ON d.id_kec=k.id_kec 
            JOIN klasifikasi_usaha ku ON u.id_ku=ku.id_ku
            JOIN jenus ju ON u.jns_ush=ju.id_ju WHERE id_datum='$id'"
        );
    }

    public function filterBy($kecamatan, $tahun_pembentukan, $jenus, $sektor_usaha, $klasifikasi_usaha) {
        $query = "SELECT *, u.polygon AS polygon_usaha 
                FROM usaha u 
                JOIN deskel d ON u.id_deskel = d.id_deskel 
                JOIN sektor_usaha su ON u.id_su = su.id_su 
                JOIN kecamatan k ON d.id_kec = k.id_kec 
                JOIN klasifikasi_usaha ku ON u.id_ku = ku.id_ku
                JOIN jenus ju ON u.jns_ush = ju.id_ju WHERE 1=1";
        
        if ($kecamatan != '') {
            $query .= " AND k.id_kec = '$kecamatan'";
        }
        if ($tahun_pembentukan != '') {
            $query .= " AND u.thn_pmtkn = '$tahun_pembentukan'";
        }
        if ($jenus != '') {
            $query .= " AND u.jns_ush = '$jenus'";
        }
        if ($sektor_usaha != '') {
            $query .= " AND u.id_su = '$sektor_usaha'";
        }
        if ($klasifikasi_usaha != '') {
            $query .= " AND u.id_ku = '$klasifikasi_usaha'";
        }
        
        // Jalankan query dan kembalikan hasil
        return $this->db->query($query);
    }
    

    public function add($data)
    {
        if (!empty($data)) {

            $nama_usaha = $data['nama_usaha'];
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
            $no_telpon = $data['no_telpon'];
            $polygon = $data['polygon'];
            $gambar = $data['gambar'];
            $ktp = $data['ktp'];
            $surat_izin_usaha = $data['surat_izin_usaha'];
            $nik = $data['nik'];

            
            $query = "SELECT * FROM `usaha` WHERE id_deskel = ? AND id_su = ? AND id_ku = ? AND LOWER(nm_usaha) = ? AND thn_pmtkn = ? AND jns_ush = ? AND LOWER(nmr_izin) = ? AND LOWER(nm_pemilik) = ? AND LOWER(alamat) = ? AND latitude = ? AND longitude = ? AND no_telpon = ? AND nik = ?";
            $stmt = $this->db->prepare($query);

            if ($stmt) {
                $nm_usaha_lower = strtolower($nama_usaha);
                $nmr_izin_lower = strtolower($no_izin);
                $nm_pemilik_lower = strtolower($nama_pemilik);
                $alamat_lower = strtolower($alamat);
                
                $stmt->bind_param(
                    "iiisiisssssss",
                    $id_deskel,
                    $id_su,
                    $id_ku,
                    $nm_usaha_lower,
                    $tahun_pembentukan,
                    $jenis_usaha,
                    $nmr_izin_lower,
                    $nm_pemilik_lower,
                    $alamat_lower,
                    $latitude,
                    $longitude,
                    $no_telpon,
                    $nik
                );

                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $_SESSION['warning'] = 'Data sudah tersimpan sebelumnya!';
                }else{
                    $insert = $this->db->query(
                        "INSERT INTO usaha (id_deskel,id_su,id_ku,nm_usaha,thn_pmtkn,jns_ush,nmr_izin,nm_pemilik,alamat,tng_kerja_lki,tng_kerja_prmpn,mdl_sendiri,mdl_luar,asset,omset,latitude,longitude,no_telpon,gambar,polygon,ktp,surat_izin_usaha,nik,created_at) VALUES('$id_deskel', '$id_su', '$id_ku','$nama_usaha','$tahun_pembentukan','$jenis_usaha','$no_izin', '$nama_pemilik','$alamat','$tk_laki','$tk_perempuan','$modal_sendiri','$modal_luar','$asset','$omset','$latitude','$longitude','$no_telpon','$gambar','$polygon','$ktp','$surat_izin_usaha','$nik',NOW())"
                    );

                    if ($insert) {
                        return $_SESSION['success'] = "Data berhasil disimpan!";
                    } else {
                        return $_SESSION['error'] = "Data gagal disimpan!";
                    }
                }
            } else {
                $_SESSION['error'] = 'Terjadi kesalahan saat mempersiapkan query!';
            }

        } else {
            return $_SESSION['error'] = "Tidak ada data yang dikirim!";
        }
    }

    public function update($data)
    {

        if (!empty($data)) {
            $id_datum = $data['id_datum'];
            $nama_usaha = $data['nama_usaha'];
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
            $no_telpon = $data['no_telpon'];
            $polygon = $data['polygon'];
            $gambar = $data['gambar'];
            $ktp = $data['ktp'];
            $surat_izin_usaha = $data['surat_izin_usaha'];
            $nik = $data['nik'];

            $update = $this->db->query(
                "UPDATE usaha SET id_deskel = '$id_deskel', id_su='$id_su', id_ku='$id_ku',
                nm_usaha='$nama_usaha', thn_pmtkn='$tahun_pembentukan', jns_ush='$jenis_usaha',
                nmr_izin='$no_izin', nm_pemilik='$nama_pemilik', alamat='$alamat', tng_kerja_lki='$tk_laki',
                tng_kerja_prmpn='$tk_perempuan', mdl_sendiri='$modal_sendiri', mdl_luar='$modal_luar',
                asset='$asset', omset='$omset', latitude='$latitude', longitude='$longitude',no_telpon='$no_telpon',gambar='$gambar',polygon='$polygon',ktp='$ktp',surat_izin_usaha='$surat_izin_usaha', nik='$nik' WHERE id_datum='$id_datum'"
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

    // public function delete($id)
    // {
    //     if (!empty($id)) {
    //         $delete = $this->db->query(
    //             "DELETE FROM usaha WHERE id_datum='$id'"
    //         );
    //         if ($delete) {
    //             return $_SESSION['success'] = "Data berhasil dihapus!";
    //         } else {
    //             return $_SESSION['error'] = "Data gagal dihapus!";
    //         }
    //     } else {
    //         return $_SESSION['error'] = "Tidak ada data yang dikirim!";
    //     }
    // }
    public function delete($id)
    {
    if (!empty($id)) {
        // Fetch the data to get file paths
        $data = $this->db->query("SELECT gambar, ktp, surat_izin_usaha FROM usaha WHERE id_datum='$id'")->fetch_assoc();

        // Delete files associated with the data
        if (!empty($data['gambar']) && file_exists("../assets/images/" . $data['gambar'])) {
            unlink("../assets/images/" . $data['gambar']);
        }
        if (!empty($data['ktp']) && file_exists("../assets/file/" . $data['ktp'])) {
            unlink("../assets/file/" . $data['ktp']);
        }
        if (!empty($data['surat_izin_usaha']) && file_exists("../assets/file/" . $data['surat_izin_usaha'])) {
            unlink("../assets/file/" . $data['surat_izin_usaha']);
        }

        // Delete data from the database
        $delete = $this->db->query("DELETE FROM usaha WHERE id_datum='$id'");
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