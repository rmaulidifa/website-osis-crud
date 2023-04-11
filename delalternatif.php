<?php
include "config.php";
$id_kandidat= $_GET['id_kandidat'];

$sql = "delete from alternatif where id_kandidat = '$id_kandidat'";

$a = $koneksi->query($sql);

header("location: dtalternatif.php");