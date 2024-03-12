<!-- Section: Design Block -->
<footer class="bg-white text-center text-lg-start">
    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: #f0f0f0">
        Copyright ©
        <a href="#" style="text-decoration: none" target="_blank"
            class="text-gray-800 text-dark text-hover-primary">DINAS KOPERASI & UMKM KAB. TTU
        </a>
    </div>
    <!-- Copyright -->
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-control-geocoder@1.13.0/dist/Control.Geocoder.js"></script>






<script>
var mymap = L.map("mapid").setView([-9.3405531, 124.4736825], 10);

L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
    attribution: "© OpenStreetMap contributors",
}).addTo(mymap);

// var searchControl = L.Control.geocoder({
//         defaultMarkGeocode: false,
//     })
//     .on("markgeocode", function(e) {
//         mymap.setView(e.geocode.center, 13);
//     })
//     .addTo(mymap);
</script>


<script>
var drawnItems = new L.FeatureGroup();
mymap.addLayer(drawnItems);
<?php
    $data = $koneksi->query("SELECT * FROM kecamatan");

    foreach ($data as $key => $value) {
        $polygonArray = json_decode('[' . $value['polygon'] . ']', true);

        if ($polygonArray !== null) {
            // Memproses setiap koordinat dan membalik urutannya (Longitude, Latitude)
            $reversedPolygon = array_map(function ($coordinate) {
                return [$coordinate[1], $coordinate[0]];
            }, $polygonArray);

            echo "var polygon = L.polygon(" . json_encode($reversedPolygon) . ", {color: '" . $value['warna'] . "'}).addTo(mymap);";
        } else {
            echo "console.error('Gagal mengonversi string JSON.');";
        }
    }
    ?>

<?php

    $data_usaha = $koneksi->query(
        "SELECT * FROM usaha u 
            JOIN deskel d ON u.id_deskel=d.id_deskel 
            JOIN sektor_usaha su ON u.id_su=su.id_su 
            JOIN kecamatan k ON d.id_kec=k.id_kec 
            JOIN klasifikasi_usaha ku ON u.id_ku=ku.id_ku
            JOIN jenus ju ON u.jns_ush=ju.id_ju"
    );

    foreach ($data_usaha as $location) {
        if ($location['latitude'] != '-' && $location['longitude'] != '-') {
            echo "var marker = L.marker([" . $location['latitude'] . ", " . $location['longitude'] . "], {";
            echo "  icon: L.divIcon({";
            echo "className: 'custom-icon-campuran',";
            echo "html: '".$location['icon']."',"; // Menggunakan kelas 'fa' dan kelas angka sesuai dengan $iconNumber
            echo "    iconSize: [40, 40],";
            echo "    iconAnchor: [20, 40]";
            echo "  })";
            echo "}).addTo(mymap);";
            echo "marker.bindPopup('<b>" . $location['nm_usaha'] . "</b><br>Kecamatan : " . $location['nm_kec'] . "<br>Desa/Keluarah : " . $location['nm_deskel'] . "<br>Sektor Usaha : " . $location['nm_su'] . "<br>Klasifikasi Usaha : " . $location['nm_ku'] . "<br>Tahun Pembentukan : " . $location['thn_pmtkn'] . "').openPopup();";
        }
    }
    ?>
</script>
</body>

</html>

<style>
.legend {
    background-color: white;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.legend i {
    width: 20px;
    height: 20px;
    display: inline-block;
    margin-right: 5px;
}

.custom-icon-campuran {
    text-align: center;
    color: #EB455F;
    font-size: 20pt;
    font-weight: bold;
}

.custom-icon-blue {
    text-align: center;
    color: blue;
    font-size: 20pt;
    font-weight: bold;
}

.custom-icon-green {
    text-align: center;
    color: #17594A;
    font-size: 20pt;
    font-weight: bold;
}
</style>