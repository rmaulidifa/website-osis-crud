<?php
include "config.php";
$id_skala= $_GET['id_skala'];

$sql = "delete from skala where id_skala = '$id_skala'";

$a = $koneksi->query($sql);

header("location: dtskala.php");