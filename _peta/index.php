<?php
    require_once('../koneksi.php');
    $head="Peta";
    $judul="Peta";
    $sql = "SELECT * FROM tahuna-gis";
    $query = mysqli_query($conn, $sql);
    
    $sqlf = "SELECT * FROM fitur";
    $queryf = mysqli_query($conn, $sqlf);
    
    ?>
    <!doctype html>
    <html lang="en">
    <?php include('../_layout/head.php');?>
    <link rel="stylesheet" href="css/leaflet.css"><link rel="stylesheet" href="css/L.Control.Locate.min.css">
            
    <body class="hold-transition skin-green sidebar-mini">
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
            <link rel="stylesheet" href="css/leaflet-search.css">
            <link rel="stylesheet" href="css/leaflet-control-geocoder.Geocoder.css">
            <style>
            #map {
                width: 100%;
                height: 800px;
            }
            </style>
            <div class="wrapper">
    <?php include('../_layout/header.php');?>
    <?php include('../_layout/sidebar.php');?>
    <div class="content-wrapper">
    
            <div id="map">
            </div>

    <script src="js/qgis2web_expressions.js"></script>
    <script src="js/leaflet.js"></script>
    <script src="js/L.Control.Locate.min.js"></script>
    <script src="js/leaflet.rotatedMarker.js"></script>
    <script src="js/leaflet.pattern.js"></script>
    <script src="js/leaflet-hash.js"></script>
    <script src="js/Autolinker.min.js"></script>
    <script src="js/rbush.min.js"></script>
    <script src="js/labelgun.min.js"></script>
    <script src="js/labels.js"></script>
    <script src="js/leaflet-control-geocoder.Geocoder.js"></script>
    <script src="js/leaflet-search.js"></script>
    <script src="js/L.KML.js"></script>
    <script>
        var map = L.map('map', {
            zoomControl:true, maxZoom:20, minZoom:1
        }).fitBounds([[3.4981247032968996,125.51965650693425],[3.5829541663394924,125.68593714048488]]);
        mbAttr = 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community';

        mbUrl = 'https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}';
        L.tileLayer(mbUrl, {
        id: 'mapbox.streets',
        maxZoom: 20,
        attribution: mbAttr
        }).addTo(map);
        
        var markersLayer = new L.LayerGroup() ;
        var controlSearch = new L.Control.Search({
		position:'topright',		
		layer: markersLayer,
		initial: false,
		zoom: 25,
		marker: false
	    });

        map.addControl(controlSearch);
      
    </script>



    <!--BLOK DATA mulai-->
    <script src="sumber/titik_lokasi_3.js"></script>
    <script>
        function pop_json_titik_lokasi_3(feature, layer) {
            /*layer.on({
                mouseout: function() {
                    for (i in e.target._eventParents) {
                        e.target._eventParents[i].resetStyle(e.target);
                    }
                    if (typeof layer.closePopup == 'function') {
                        layer.closePopup();
                    } else {
                        layer.eachLayer(function(feature){
                            feature.closePopup()
                        });
                    }
                },
                
                });*/
                var popupContent_json_titik_lokasi_3 = feature.properties.Name;
                layer.bindPopup(popupContent_json_titik_lokasi_3, {maxHeight: 400});
                //.console.log(feature.properties.Name);
        }
        function style_json_titik_lokasi_3() {
                return {
                    pane: 'pane_json_titik_lokasi_3',
                    opacity: 2,
                    color: 'rgba(0,255,255)',
                    dashArray: '',
                    lineCap: 'butt',
                    lineJoin: 'miter',
                    interactive: true,
                    style :style_json_titik_lokasi_3,
                }
            }
        map.createPane('pane_json_titik_lokasi_3');
        map.getPane('pane_json_titik_lokasi_3').style.zIndex = 404;
        map.getPane('pane_json_titik_lokasi_3').style['mix-blend-mode'] = 'normal';
        var layer_json_titik_lokasi_3 = new L.geoJson(json_titik_lokasi_3, {
            attribution: '',
            interactive: true,
            dataVar: 'json_json_titik_lokasi_3',
            layerName: 'layer_json_titik_lokasi_3',
            onEachFeature: pop_json_titik_lokasi_3,
            style: style_json_titik_lokasi_3
        });
        map.addLayer(layer_json_titik_lokasi_3);


        fetch('sumber/Gesit.kml')
                .then(res => res.text())
                .then(kmltext => {
                    // Create new kml overlay
                    const parser = new DOMParser();
                    const kml = parser.parseFromString(kmltext, 'text/xml');
                    const track = new L.KML(kml);
                    map.addLayer(track);

                    // Adjust map to show the kml
                    const bounds = track.getBounds();
                    map.fitBounds(bounds);
                });

                fetch('sumber/mangrove.kml')
                .then(res => res.text())
                .then(kmltext => {
                    // Create new kml overlay
                    const parser = new DOMParser();
                    const kml = parser.parseFromString(kmltext, 'text/xml');
                    const track = new L.KML(kml);
                    map.addLayer(track);
                    
                    // Adjust map to show the kml
                    const bounds = track.getBounds();
                    map.fitBounds(bounds);
                });

                fetch('sumber/Pelabuhan.kml')
                .then(res => res.text())
                .then(kmltext => {
                    // Create new kml overlay
                    const parser = new DOMParser();
                    const kml = parser.parseFromString(kmltext, 'text/xml');
                    const track = new L.KML(kml);
                    map.addLayer(track);
                    
                    // Adjust map to show the kml
                    const bounds = track.getBounds();
                    map.fitBounds(bounds);
                });

                fetch('sumber/pasar_towo.kml')
                .then(res => res.text())
                .then(kmltext => {
                    // Create new kml overlay
                    const parser = new DOMParser();
                    const kml = parser.parseFromString(kmltext, 'text/xml');
                    const track = new L.KML(kml);
                    map.addLayer(track);

                    // Adjust map to show the kml
                    const bounds = track.getBounds();
                    map.fitBounds(bounds);
                });
    </script>
    <!--BLOK DATA selesai-->    <?php include('../_layout/footer.php');?>
    <?php include('../_layout/javascript.php');?>
    </body>
    </http>