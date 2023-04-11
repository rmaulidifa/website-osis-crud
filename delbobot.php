<?php
include "config.php";
$id_bobot= $_GET['id_bobot'];

$sql = "delete from bobot where id_bobot = '$id_bobot'";

$a = $koneksi->query($sql);

header("location: dtbobot.php");