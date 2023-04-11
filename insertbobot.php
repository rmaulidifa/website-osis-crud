<?php 
include 'config.php';
$id_kriteria = $_POST['id_kriteria'];
$value = $_POST['value'];

$sql="INSERT into bobot (id_kriteria,value) values ('$id_kriteria','$value')";

$hasil=mysqli_query($koneksi,$sql);

header("location:dtbobot.php");
?>