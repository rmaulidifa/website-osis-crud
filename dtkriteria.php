<!doctype html>
<html lang="en">
  <head>
  	<title>Kriteria</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">
    <link REL="STYLESHEET" TYPE="text/css" HREF="style.css">

	</head>
	<body>
    <div class="navi">
        <ul>
            <li><a href="dtalternatif.php">Alternatif</a></li>
            <li><a href="dtkriteria.php">Kriteria</a></li>
            <li><a href="dtbobot.php">Bobot</a></li>
            <li><a href="dtskala.php">Skala</a></li>
            <li><a href="dtmatrix.php">Matrix Keputusan</a></li>
            <li><a href="result.php?metode=SAW">SAW</a></li>
            <li><a href="result.php?metode=WP">WP</a></li>
            <li><a href="result.php?metode=TOPSIS">TOPSIS</a></li>
            <li><a href="result.php?metode=MULTIMOORA">MULTIMOORA</a></li>
        </ul>
    </div>

	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">KRITERIA</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						<table class="table table-bordered table-dark table-hover">
							<thead>
                                <tr>
                                <th>ID Kriteria</th>
                                    <th>Nama Kriteria</th>
                                    <th>Jenis</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "config.php";
                                $a = "SELECT * FROM kriteria";
                                $b = $koneksi->query($a);
                                while ($c = $b->fetch_array()) {
                                ?>
                                    <tr>
                                        <td><?php echo $c['id_kriteria'] ?></td>
                                        <td><?php echo $c['nama_kriteria'] ?></td>
                                        <td><?php echo $c['jenis'] ?></td>
                                        <td>
                                        <button type=" button" class=" btn-primary btn-sm"><a href="editkriteria.php?id_kriteria=<?php echo $c['id_kriteria'] ?>" class="text-white">Edit</a></button>
                                        <button type=" button" class=" btn-danger btn-sm"><a href="delkriteria.php?id_kriteria=<?php echo $c['id_kriteria'] ?>" class="text-white">Hapus</a></button>
                                    </tr>
                                <?php } ?>
                            </tbody>
        <button type=" button" class="btn-primary btn-sm"><a href="formkriteria.php" class="text-white">Add Data</a></button>
       
       
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

