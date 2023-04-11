<?php 
include 'config.php';
$nama_kriteria = $_POST['nama_kriteria'];
$jenis = $_POST['jenis'];

$sql="INSERT into kriteria (nama_kriteria,jenis) values ('$nama_kriteria','$jenis')";

$hasil=mysqli_query($koneksi,$sql);

header("location:dtkriteria.php");
?>