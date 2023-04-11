<?php
include "config.php";
$id_kriteria= $_GET['id_kriteria'];

$sql = "delete from kriteria where id_kriteria = '$id_kriteria'";

$a = $koneksi->query($sql);

header("location: dtkriteria.php");