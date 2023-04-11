<?php 
include 'config.php';
$id_kandidat = $_POST['id_kandidat'];
$id_bobot = $_POST['id_bobot'];
$id_skala = $_POST['id_skala'];

$sql="INSERT into matrixkeputusan (id_kandidat,id_bobot,id_skala) values ('$id_kandidat','$id_bobot','$id_skala')";

$hasil=mysqli_query($koneksi,$sql);

header("location:dtmatrix.php");
?>