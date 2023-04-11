<?php 
include 'config.php';
$value = $_POST['value'];
$keterangan = $_POST['keterangan'];

$sql="INSERT into skala (value,keterangan) values ('$value','$keterangan')";

$hasil=mysqli_query($koneksi,$sql);

header("location:dtskala.php");
?>