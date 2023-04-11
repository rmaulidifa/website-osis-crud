<?php 
include 'config.php';
$nama_kandidat = $_POST['nama_kandidat'];

$sql="INSERT into alternatif (nama_kandidat) values ('$nama_kandidat')";

$hasil=mysqli_query($koneksi,$sql);

header("location:dtalternatif.php");
?>