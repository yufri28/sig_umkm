<!-- Section: Design Block -->
<footer class="bg-white text-center text-lg-start">
    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: #f0f0f0">
        Copyright ©
        <a href="#" style="text-decoration: none" target="_blank"
            class="text-gray-800 text-dark text-hover-primary">DINAS KOPERASI USAHA KECIL DAN MENENGAH KAB. TTU</a>
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

var searchControl = L.Control.geocoder({
        defaultMarkGeocode: false,
    })
    .on("markgeocode", function(e) {
        mymap.setView(e.geocode.center, 13);
    })
    .addTo(mymap);
</script>


<script>
var drawnItems = new L.FeatureGroup();
mymap.addLayer(drawnItems);
<?php 
    $data = $koneksi->query("SELECT * FROM kecamatan");

    foreach ($data as $key => $value) {
        $polygonArray = json_decode('['.$value['polygon'].']', true);

        if ($polygonArray !== null) {
            // Memproses setiap koordinat dan membalik urutannya (Longitude, Latitude)
            $reversedPolygon = array_map(function($coordinate) {
                return [$coordinate[1], $coordinate[0]];
            }, $polygonArray);

            echo "var polygon = L.polygon(".json_encode($reversedPolygon).", {color: '".$value['warna']."'}).addTo(mymap);";
        } else {
            echo "console.error('Gagal mengonversi string JSON.');";
        }
    }
?>
</script>
</body>

</html>