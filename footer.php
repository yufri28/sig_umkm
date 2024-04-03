<!-- Section: Design Block -->
<footer class="bg-white text-center text-lg-start">
    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: #f0f0f0">
        Copyright ©
        <a href="#" style="text-decoration: none" target="_blank" class="text-gray-800 text-dark text-hover-primary">DINAS KOPERASI & UMKM KAB. TTU
        </a>
    </div>
    <!-- Copyright -->
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-control-geocoder@1.13.0/dist/Control.Geocoder.js"></script>
<!-- ==== AOS ==== -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script>
    AOS.init();
</script>


<script>
    var mymap = L.map("mapid").setView([-9.3405531, 124.4736825], 11);

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
    $kec = '';
    if (isset($_GET['k'])) {
        $kec = htmlspecialchars($_GET['k']);
    }
    if (isset($_GET['q'])) {
        $id = htmlspecialchars($_GET['q']);
        $data_usaha = $koneksi->query(
            "SELECT * FROM usaha u 
                JOIN deskel d ON u.id_deskel=d.id_deskel 
                JOIN sektor_usaha su ON u.id_su=su.id_su 
                JOIN kecamatan k ON d.id_kec=k.id_kec 
                JOIN klasifikasi_usaha ku ON u.id_ku=ku.id_ku
                JOIN jenus ju ON u.jns_ush=ju.id_ju
                WHERE u.id_datum='$id'"
        );
    } else {
        $data_usaha = $koneksi->query(
            "SELECT * FROM usaha u 
                JOIN deskel d ON u.id_deskel=d.id_deskel 
                JOIN sektor_usaha su ON u.id_su=su.id_su 
                JOIN kecamatan k ON d.id_kec=k.id_kec 
                JOIN klasifikasi_usaha ku ON u.id_ku=ku.id_ku
                JOIN jenus ju ON u.jns_ush=ju.id_ju"
        );
    }

    $jenus = $koneksi->query("SELECT * FROM jenus WHERE id_ju!='1'");

    // Membuat legenda di luar loop foreach
    $legendContent = "<h4>Legenda</h4>";
    foreach ($jenus as $key => $jenis_usaha) {
        $legendContent .= "<p>" . $jenis_usaha['icon'] . " " . $jenis_usaha['nama_jenus'] . "</p>";
    }
    $legendContent .= "<p><i class=\"fa fa-circle-thin text-primary\" aria-hidden=\"true\"></i> Polygon Jenis Usaha</p>";

    echo "var legend = L.control({position: 'bottomright'});";
    echo "legend.onAdd = function (map) {";
    echo "    var div = L.DomUtil.create('div', 'info legend');";
    echo "    div.innerHTML = '" . addslashes($legendContent) . "';";
    echo "    return div;";
    echo "};";
    echo "legend.addTo(mymap);";

    $formFilter = "<form class=\"form-kec\">";
    $formFilter .= "<select class=\"form-select filter-kecamatan\" aria-label=\"Default select example\">";
    $formFilter .= "<option selected>Open this select menu</option>";
    $formFilter .= "<option " . (isset($_GET['k']) && $_GET['k'] == '10' ? 'selected' : '') . " value=\"10\">One</option>";
    $formFilter .= "<option " . (isset($_GET['k']) && $_GET['k'] == '20' ? 'selected' : '') . " value=\"20\">Two</option>";
    $formFilter .= "<option " . (isset($_GET['k']) && $_GET['k'] == '30' ? 'selected' : '') . " value=\"30\">Three</option>";
    $formFilter .= "</select>";
    $formFilter .= "</form>";


    echo "var legend = L.control({position: 'topright'});";
    echo "legend.onAdd = function (map) {";
    echo "    var div = L.DomUtil.create('div', 'filter');";
    echo "    div.innerHTML = '" . addslashes($formFilter) . "';";
    echo "    return div;";
    echo "};";
    echo "legend.addTo(mymap);";


    foreach ($data_usaha as $location) {
        if ($location['latitude'] != '-' && $location['longitude'] != '-') {
            // Membuat marker
            echo "var marker = L.marker([" . $location['latitude'] . ", " . $location['longitude'] . "], {";
            echo "  icon: L.divIcon({";
            echo "    className: 'custom-icon-campuran',";
            echo "    html: '<div class=\"test text-center rounded-circle\">" . $location['icon'] . "</div>',";
            echo "    iconSize: [5, 5],";
            echo "    iconAnchor: [20, 20]";
            echo "  })";
            echo "}).addTo(mymap);";


            // Menentukan jari-jari poligon bulat
            $radius = 0.02; // Atur jari-jari sesuai kebutuhan

            // Menentukan jumlah sudut untuk pembentukan poligon
            $numPoints = 20; // Anda bisa menyesuaikan jumlah titik sesuai keinginan

            // Menghitung titik-titik poligon bulat
            $polygonCoords = [];
            for ($i = 0; $i < $numPoints; $i++) {
                $angle = $i * (360 / $numPoints);
                $x = $location['latitude'] + $radius * cos(deg2rad($angle));
                $y = $location['longitude'] + $radius * sin(deg2rad($angle));
                $polygonCoords[] = "L.latLng(" . $x . ", " . $y . ")";
            }

            // Membuat poligon
            // echo "var polygonCoords = [" . implode(",", $polygonCoords) . "];";
            // echo "var polygon = L.polygon(polygonCoords).addTo(mymap);";

            // Mengikat pop-up pada marker
            if ($location['gambar'] == NULL) {
                echo "marker.bindPopup('<div class=\"custom-popup\"><img src=\"./assets/img/" . "no-image.svg" . "\" width=\"210\" height=\"150\"><br><br><b>" . $location['nm_usaha'] . "</b><br>Kecamatan : " . $location['nm_kec'] . "<br>Desa/Keluarah : " . $location['nm_deskel'] . "<br>Sektor Usaha : " . $location['nm_su'] . "<br>Klasifikasi Usaha : " . $location['nm_ku'] . "<br>Tahun Pembentukan : " . $location['thn_pmtkn'] . "').openPopup();";
            } else {
                echo "marker.bindPopup('<div class=\"custom-popup\"><img src=\"./assets/images/" . $location['gambar']  . "\" width=\"210\" height=\"150\"><br><br><b>" . $location['nm_usaha'] . "</b><br>Kecamatan : " . $location['nm_kec'] . "<br>Desa/Keluarah : " . $location['nm_deskel'] . "<br>Sektor Usaha : " . $location['nm_su'] . "<br>Klasifikasi Usaha : " . $location['nm_ku'] . "<br>Tahun Pembentukan : " . $location['thn_pmtkn'] . "<br><br><a target=\"_blank\" href=\"https://www.google.com/maps/dir/?api=1&destination=" . $location['latitude'] . ',' . $location['longitude'] . "\" title=\"Lokasi di Google Maps\" class=\"btn text-white btn-sm btn-success\">Rute G.Maps</a><a href=\"./produk.php\" title=\"Lokasi di Google Maps\" class=\"btn text-white btn-sm btn-danger\">UMKM</a>').openPopup();";
            }
        }
    }

    ?>

    let filterKecamatan = document.querySelector(".filter-kecamatan");

    filterKecamatan.addEventListener("change", select);

    function select(e) {
        window.location.href = "?k=" + e.target.value;
        console.log(e.target.value);
    }
</script>
</body>

</html>

<style>
    .test>.fa {
        border: 1px solid blue;
    }

    .test {
        border: 1px solid transparent;
        font-size: 12pt;
        width: 25px;
        height: 25px;
    }

    .legend,
    .filter {
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