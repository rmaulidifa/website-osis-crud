<?php
include "config.php";
$id_matrix= $_GET['id_matrix'];

$sql = "delete from matrixkeputusan where id_matrix = '$id_matrix'";

$a = $koneksi->query($sql);

header("location: dtmatrix.php");