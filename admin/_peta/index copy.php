<?php
    require_once('../koneksi.php');
    $head="Peta";
    $judul="Peta";
    $sql = "SELECT * FROM tahuna-gis";
    $query = mysqli_query($conn, $sql);
    
    $sqla = "SELECT * FROM fitur";
    $querya = mysqli_query($conn, $sqla);

    ?>
<!doctype html>
<html lang="en">
<?php include('../_layout/head.php');?>
<link rel="stylesheet" href="css/leaflet.css"><link rel="stylesheet" href="css/L.Control.Locate.min.css">
        
<body class="hold-transition skin-blue sidebar-mini">
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
      // show the scale bar on the lower left corner
      
        </script>
   <?php
        //START rumah
            while($dbr = mysqli_fetch_array($queryr)) { 
        ?>
        </script>
        <script>

       function style_<?php echo $dbr['id'];?>() {
            return {
                pane: 'pane_<?php echo $dbr['id'];?>',
                opacity: 1,
                color: 'rgba(255, 0, 0, 1)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity:0.3,
                fillColor: 'red',
                interactive: true,
                style :style_<?php echo $dbr['id'];?>,
            }
        }
        map.createPane('pane_<?php echo $dbr['id'];?>');
        map.getPane('pane_<?php echo $dbr['id'];?>').style.zIndex = 404;
        map.getPane('pane_<?php echo $dbr['id'];?>').style['mix-blend-mode'] = 'normal';
        var layer_<?php echo $dbr['id'];?> = new L.marker([<?php echo $dbr['koordinat_E'];?>,<?php echo $dbr['koordinat_N'];?>], {
            attribution: '',
            title: '<?php echo $dbr['ket'];?>',
            interactive: true,
            layerName: 'layer_<?php echo $dbr['ket'];?>',
           

        });  
        layer_<?php echo $dbr['id'];?>.bindPopup('<?php echo $dbr['ket'];?>');
        markersLayer.addLayer(layer_<?php echo $dbr['id'];?>);
  
        map.addLayer(markersLayer);


<?php
        }
     ?>
        
              <?php
        //START sungai
            while($dbs = mysqli_fetch_array($querys)) { 
        ?>
        </script>
        <script src="data/<?php echo $dbs['file_geojson'];?>"></script>
        <script>

            function pop_<?php echo $dbs['nama_variabel'];?>(feature, layer) {
            layer.on({
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
                
            });
            var popupContent_<?php echo $dbs['nama_variabel'];?> = '<table><tr><td colspan="2"></td></tr></table>';
            layer.bindPopup(popupContent_<?php echo $dbs['nama_variabel'];?>, {maxHeight: 400});
        }
       function style_<?php echo $dbs['nama_variabel'];?>() {
            return {
                pane: 'pane_<?php echo $dbs['nama_variabel'];?>',
                opacity: 2,
                color: 'rgba(0,255,255)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                interactive: true,
                style :style_<?php echo $dbs['nama_variabel'];?>,
            }
        }
        map.createPane('pane_<?php echo $dbs['nama_variabel'];?>');
        map.getPane('pane_<?php echo $dbs['nama_variabel'];?>').style.zIndex = 404;
        map.getPane('pane_<?php echo $dbs['nama_variabel'];?>').style['mix-blend-mode'] = 'normal';
        var layer_<?php echo $dbs['nama_variabel'];?> = new L.geoJson(<?php echo $dbs['nama_geojson'];?>, {
            attribution: '',
            interactive: true,
            dataVar: 'json_<?php echo $dbs['nama_geojson'];?>',
            layerName: 'layer_<?php echo $dbs['nama_variabel'];?>',
            onEachFeature: pop_<?php echo $dbs['nama_variabel'];?>,
            style: style_<?php echo $dbs['nama_variabel'];?>

        });
        map.addLayer(layer_<?php echo $dbs['nama_variabel'];?>);
        <?php
            }
        ?>
 <?php
        //START drainase
            while($dbd = mysqli_fetch_array($queryd)) { 
        ?>
        </script>
        <script src="data/<?php echo $dbd['file_geojson'];?>"></script>
        <script>

            function pop_<?php echo $dbd['nama_variabel'];?>(feature, layer) {
            layer.on({
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
                
            });
            var popupContent_<?php echo $dbd['nama_variabel'];?> = '<table><tr><td colspan="2"></td></tr></table>';
            layer.bindPopup(popupContent_<?php echo $dbd['nama_variabel'];?>, {maxHeight: 400});
        }
       function style_<?php echo $dbd['nama_variabel'];?>() {
            return {
                pane: 'pane_<?php echo $dbd['nama_variabel'];?>',
                opacity: 1,
                color: 'rgba(255,69,0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                interactive: true,
                style :style_<?php echo $dbd['nama_variabel'];?>,
            }
        }
        map.createPane('pane_<?php echo $dbd['nama_variabel'];?>');
        map.getPane('pane_<?php echo $dbd['nama_variabel'];?>').style.zIndex = 404;
        map.getPane('pane_<?php echo $dbd['nama_variabel'];?>').style['mix-blend-mode'] = 'normal';
        var layer_<?php echo $dbd['nama_variabel'];?> = new L.geoJson(<?php echo $dbd['nama_geojson'];?>, {
            attribution: '',
            interactive: true,
            dataVar: 'json_<?php echo $dbd['nama_geojson'];?>',
            layerName: 'layer_<?php echo $dbd['nama_variabel'];?>',
            onEachFeature: pop_<?php echo $dbd['nama_variabel'];?>,
            style: style_<?php echo $dbd['nama_variabel'];?>

        });
        map.addLayer(layer_<?php echo $dbd['nama_variabel'];?>);
        <?php
            }
        ?>
      <?php
        //START kecamatan
            $queryk =mysqli_query($conn, $sqlk);
            while($db = mysqli_fetch_array($queryk)) { 
        ?>
        </script>
        <script src="data/<?php echo $db['file_geojson'];?>"></script>
        <script>

            function pop_<?php echo $db['nama_variabel'];?>(feature,layer) {
            layer.on({
                mouseout: function() {
                    for (i in e.target_eventParents) {
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
                
            });
            var popupContent_<?php echo $db['nama_variabel'];?> = '<table><tr><td colspan="2"></td><?php echo $db['ket'];?></tr></table>';
            layer.bindPopup(popupContent_<?php echo $db['nama_variabel'];?>, {maxHeight: 400});
        }
       function style_<?php echo $db['nama_variabel'];?>() {
            return {
                pane: 'pane_<?php echo $db['nama_variabel'];?>',
                opacity: 1,
                color: 'rgba(255, 0, 0, 1)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity:0.3,
                fillColor: '<?php echo $db['color'];?>',
                interactive: true,
                style :style_<?php echo $db['nama_variabel'];?>,
            }
        }
        map.createPane('pane_<?php echo $db['nama_variabel'];?>');
        map.getPane('pane_<?php echo $db['nama_variabel'];?>').style.zIndex = 404;
        map.getPane('pane_<?php echo $db['nama_variabel'];?>').style['mix-blend-mode'] = 'normal';
        var layer_<?php echo $db['nama_variabel'];?> = new L.geoJson(<?php echo $db['nama_geojson'];?>, {
            attribution: '',
            interactive: true,
            dataVar: 'json_<?php echo $db['nama_geojson'];?>',
            layerName: 'layer_<?php echo $db['nama_variabel'];?>',
            onEachFeature: pop_<?php echo $db['nama_variabel'];?>,
            style: style_<?php echo $db['nama_variabel'];?>

        });
        map.addLayer(layer_<?php echo $db['nama_variabel'];?>);
        <?php
            }
        ?>
        <?php
        //START jalan
        while($dbj = mysqli_fetch_array($queryj)) { 
            ?>
            </script>
            <script src="data/<?php echo $dbj['file_geojson'];?>"></script>
            <script>
    
                function pop_<?php echo $dbj['nama_variabel'];?>(feature, layer) {
                layer.on({
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
                    
                });
                var popupContent_<?php echo $dbj['nama_variabel'];?> = '<table><tr><td colspan="2"></td></tr></table>';
                layer.bindPopup(popupContent_<?php echo $dbj['nama_variabel'];?>, {maxHeight: 400});
            }
           function style_<?php echo $dbj['nama_variabel'];?>() {
                return {
                    pane: 'pane_<?php echo $dbj['nama_variabel'];?>',
                     opacity: 2,
                    color: '<?php echo $dbj['color'];?>',
                    dashArray: '',
                    lineCap: 'butt',
                    lineJoin: 'miter',
                    weight: 1.0,
                    fill: true,
                    fillOpacity:0,
                    fillColor: '<?php echo $dbj['color'];?>',
                    interactive: true,
                    style :style_<?php echo $dbj['nama_variabel'];?>,
                }
            }
            map.createPane('pane_<?php echo $dbj['nama_variabel'];?>');
            map.getPane('pane_<?php echo $dbj['nama_variabel'];?>').style.zIndex = 404;
            map.getPane('pane_<?php echo $dbj['nama_variabel'];?>').style['mix-blend-mode'] = 'normal';
            var layer_<?php echo $dbj['nama_variabel'];?> = new L.geoJson(<?php echo $dbj['nama_geojson'];?>, {
                attribution: '',
                interactive: true,
                dataVar: 'json_<?php echo $dbj['nama_geojson'];?>',
                layerName: 'layer_<?php echo $dbj['nama_variabel'];?>',
                onEachFeature: pop_<?php echo $dbj['nama_variabel'];?>,
                style: style_<?php echo $dbj['nama_variabel'];?>
    
            });
            map.addLayer(layer_<?php echo $dbj['nama_variabel'];?>);
            <?php
                }
            ?>
             <?php
        //START LINDONGAN
            $query =mysqli_query($conn, $sql);
            while($db = mysqli_fetch_array($query)) { 
        ?>
        </script>
        <script src="data/<?php echo $db['file_geojson'];?>"></script>
        <script>

            function pop_<?php echo $db['nama_variabel'];?>(feature,layer) {
            layer.on({
                mouseout: function() {
                    for (i in e.target_eventParents) {
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
                
            });
            var popupContent_<?php echo $db['nama_variabel'];?> = '<table><tr><td colspan="2"><?php echo $db['ket'];?></td></tr></table>';
            layer.bindPopup(popupContent_<?php echo $db['nama_variabel'];?>, {maxHeight: 400});
        }
       function style_<?php echo $db['nama_variabel'];?>() {
            return {
                pane: 'pane_<?php echo $db['nama_variabel'];?>',
                opacity: 1,
                color: 'rgba(255, 0, 0, 1)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity:0.3,
                fillColor: '<?php echo $db['color'];?>',
                interactive: true,
                style :style_<?php echo $db['nama_variabel'];?>,
            }
        }
        map.createPane('pane_<?php echo $db['nama_variabel'];?>');
        map.getPane('pane_<?php echo $db['nama_variabel'];?>').style.zIndex = 404;
        map.getPane('pane_<?php echo $db['nama_variabel'];?>').style['mix-blend-mode'] = 'normal';
        var layer_<?php echo $db['nama_variabel'];?> = new L.geoJson(<?php echo $db['nama_geojson'];?>, {
            attribution: '',
            interactive: true,
            dataVar: 'json_<?php echo $db['nama_geojson'];?>',
            layerName: 'layer_<?php echo $db['nama_variabel'];?>',
            onEachFeature: pop_<?php echo $db['nama_variabel'];?>,
            style: style_<?php echo $db['nama_variabel'];?>

        });
        map.addLayer(layer_<?php echo $db['nama_variabel'];?>);
        <?php
            }
        ?>
        </script>
    <?php include('../_layout/footer.php');?>
    <?php include('../_layout/javascript.php');?>
    </body>
    </http>
   
