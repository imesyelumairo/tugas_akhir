<?php
require_once('../koneksi.php');
$sql = "";
if (isset($_POST['mode'])){
    $id = $_POST['id'];
    $nama_fitur = $_POST['nama_fitur'];
    $file_geojson = $_POST['file_geojson'];
    if($_POST['mode'] == 'tambah'){
        $sql = "INSERT INTO fitur (nama_fitur,files) VALUES ('$nama_fitur','$files')";
    } else if($_POST['mode'] == 'update'){
        $sql= "UPDATE fitur SET nama_fitur='$nama_fitur',file_geojson='$file_geojson' WHERE id=".$id; 
    }
} else if (isset($_GET['mode']) && $_GET['mode'] == 'hapus'){
    $id = $_GET['id'];
    $sql = "DELETE FROM fitur WHERE id = ". $id;
}


if (mysqli_query($conn, $sql)) {
  header('location:fitur.php');
  echo $sql;
} else {
  echo "Error: " . $sql ;
}
?>