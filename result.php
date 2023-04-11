<!doctype html>
<html lang="en">
  <head>
  	<title>View</title>
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

    <?php
     $metode=$_GET['metode'];
     if($metode=='SAW'){
         
    ?>
    
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">VIEW SAW</h2>
				</div>
			</div>
			<div class="mk">
            <h2 class="heading-section">Matrix Keputusan</h2>
    </div>
    
    <table class="table table-bordered table-dark table-hover" id="">
                            <thead>
                                <tr>
                                    <th>ID Matrix</th>
                                    <th>ID Alternatif</th>
                                    <th>Nama Alternatif</th>
                                    <th>ID Kriteria</th>
                                    <th>Nama Kriteria</th>
                                    <th>Jenis</th>
                                    <th>ID Bobot</th>
                                    <th>Nilai</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "config.php";
                                $a = "SELECT matrixkeputusan.id_matrix,alternatif.*,kriteria.*,bobot.id_bobot,bobot.value,
                                skala.value AS nilai,skala.keterangan FROM matrixkeputusan,skala,bobot,kriteria,
                                alternatif WHERE matrixkeputusan.id_kandidat=alternatif.id_kandidat AND 
                                matrixkeputusan.id_bobot=bobot.id_bobot AND matrixkeputusan.id_skala=skala.id_skala
                                AND kriteria.id_kriteria=bobot.id_kriteria";
                                $b = $koneksi->query($a);
                                while ($c = $b->fetch_array()) {
                                ?>
                                    <tr>
                                        <td><?= $c['id_matrix']?></td>
                                        <td><?= $c['id_kandidat']?></td>
                                        <td><?= $c['nama_kandidat']?></td>
                                        <td><?= $c['id_kriteria']?></td>
                                        <td><?= $c['nama_kriteria']?></td>
                                        <td><?= $c['jenis']?></td>
                                        <td><?= $c['id_bobot']?></td>
                                        <td><?= $c['nilai']?></td>
                                        <td><?= $c['keterangan']?></td>
  
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

    <div class="nm">
    <h2 class="heading-section">Normalisasi</h2>
    </div>
    <table class="table table-bordered table-dark table-hover" id="">
                            <thead>
                                <tr>
                                    <th>ID Matrix</th>
                                    <th>ID Alternatif</th>
                                    <th>Nama Alternatif</th>
                                    <th>ID Kriteria</th>
                                    <th>Nama Kriteria</th>
                                    <th>Jenis</th>
                                    <th>ID Bobot</th>
                                    <th>Value</th>
                                    <th>Nilai</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "config.php";
                                $a = "SELECT vmatrixkeputusan.*,(vmatrixkeputusan.nilai/nilaimax.maksimum) AS 
                                normalisasi FROM vmatrixkeputusan,nilaimax WHERE nilaimax.id_kriteria=
                                vmatrixkeputusan.id_kriteria GROUP BY vmatrixkeputusan.id_matrix";
                                $b = $koneksi->query($a);
                                while ($c = $b->fetch_array()) {
                                ?>
                                    <tr>
                                        <td><?= $c['id_matrix']?></td>
                                        <td><?= $c['id_kandidat']?></td>
                                        <td><?= $c['nama_kandidat']?></td>
                                        <td><?= $c['id_kriteria']?></td>
                                        <td><?= $c['nama_kriteria']?></td>
                                        <td><?= $c['jenis']?></td>
                                        <td><?= $c['id_bobot']?></td>
                                        <td><?= $c['value']?></td>
                                        <td><?= $c['nilai']?></td>
                                        <td><?= $c['keterangan']?></td>
  
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

    <div class="rk">
    <h2 class="heading-section">Rangking</h2>
    </div>
    <table class="table table-bordered table-dark table-hover" id="">
                            <thead>
                                <tr>
                                    <th>ID Alternatif</th>
                                    <th>Nama Alternatif</th>
                                    <th>Rangking</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "config.php";
                                $a = "SELECT id_kandidat,nama_kandidat,SUM(prarangking) AS rangking FROM vprarangking
                                GROUP BY id_kandidat ";
                                $b = $koneksi->query($a);
                                while ($c = $b->fetch_array()) {
                                ?>
                                    <tr>
                                        <td><?= $c['id_kandidat']?></td>
                                        <td><?= $c['nama_kandidat']?></td>
                                        <td><?= $c['rangking']?></td>
  
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
        <?php
            } elseif ($metode=='WP') {
         ?>

<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">VIEW WP</h2>
				</div>
			</div>
            <div class="mk">
            <h2 class="heading-section">Matrix Keputusan</h2>
    </div>
    
    <table class="table table-bordered table-dark table-hover" id="">
                            <thead>
                                <tr>
                                    <th>ID Matrix</th>
                                    <th>ID Alternatif</th>
                                    <th>Nama Alternatif</th>
                                    <th>ID Kriteria</th>
                                    <th>Nama Kriteria</th>
                                    <th>Jenis</th>
                                    <th>ID Bobot</th>
                                    <th>Nilai</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "config.php";
                                $a = "SELECT matrixkeputusan.id_matrix,alternatif.*,kriteria.*,bobot.id_bobot,bobot.value,
                                skala.value AS nilai,skala.keterangan FROM matrixkeputusan,skala,bobot,kriteria,
                                alternatif WHERE matrixkeputusan.id_kandidat=alternatif.id_kandidat AND 
                                matrixkeputusan.id_bobot=bobot.id_bobot AND matrixkeputusan.id_skala=skala.id_skala
                                AND kriteria.id_kriteria=bobot.id_kriteria";
                                $b = $koneksi->query($a);
                                while ($c = $b->fetch_array()) {
                                ?>
                                    <tr>
                                        <td><?= $c['id_matrix']?></td>
                                        <td><?= $c['id_kandidat']?></td>
                                        <td><?= $c['nama_kandidat']?></td>
                                        <td><?= $c['id_kriteria']?></td>
                                        <td><?= $c['nama_kriteria']?></td>
                                        <td><?= $c['jenis']?></td>
                                        <td><?= $c['id_bobot']?></td>
                                        <td><?= $c['nilai']?></td>
                                        <td><?= $c['keterangan']?></td>
  
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

<div class="jm">
    <h2 class="heading-section">Jumbo Bot</h2>
    </div>
    <table class="table table-bordered table-dark table-hover" id="">
                            <thead>
                                <tr>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "config.php";
                                $a = "SELECT SUM(VALUE) AS jumlah FROM bobot ";
                                $b = $koneksi->query($a);
                                while ($c = $b->fetch_array()) {
                                ?>
                                    <tr>
                                        <td><?= $c['jumlah']?></td>
                                      
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

    <div class="nb">
    <h2 class="heading-section">Normalisasi Bobot</h2>
    </div>
    <table class="table table-bordered table-dark table-hover" id="">
                            <thead>
                                <tr>
                                    <th>ID Bobot</th>
                                    <th>ID Kriteria</th>
                                    <th>Value</th>
                                    <th>Jumlah</th>
                                    <th>Normalisasi_W</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "config.php";
                                $a = "SELECT bobot.*,wp_jumbobot.jumlah,(bobot.value/wp_jumbobot.jumlah) AS normalisasi_w FROM bobot,wp_jumbobot ";
                                $b = $koneksi->query($a);
                                while ($c = $b->fetch_array()) {
                                ?>
                                    <tr>
                                        <td><?= $c['id_bobot']?></td>
                                        <td><?= $c['id_kriteria']?></td>
                                        <td><?= $c['value']?></td>
                                        <td><?= $c['jumlah']?></td>
                                        <td><?= $c['normalisasi_w']?></td>
                                      
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

    <div class="np">
    <h2 class="heading-section">Nilai Pangkat Pra Nilai S</h2>
    </div>
    <table class="table table-bordered table-dark table-hover" id="">
                            <thead>
                                <tr>
                                    <th>ID Matrix</th>
                                    <th>ID Kandidat</th>
                                    <th>Nama Kandidat</th>
                                    <th>ID Kriteria</th>
                                    <th>Nama Kriteria</th>
                                    <th>Jenis</th>
                                    <th>ID Bobot</th>
                                    <th>Value</th>
                                    <th>Nilai</th>
                                    <th>Keterangan</th>
                                    <th>Normalisasi_W</th>
                                    <th>Pangkat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "config.php";
                                $a = "SELECT vmatrixkeputusan.*,wp_normalisasiterbobot.normalisasi_w,POW(vmatrixkeputusan.nilai,
                                wp_normalisasiterbobot.normalisasi_w) AS pangkat FROM vmatrixkeputusan,
                                wp_normalisasiterbobot WHERE wp_normalisasiterbobot.id_kriteria=vmatrixkeputusan.id_kriteria 
                                GROUP BY vmatrixkeputusan.id_matrix ";
                                $b = $koneksi->query($a);
                                while ($c = $b->fetch_array()) {
                                ?>
                                    <tr>
                                        <td><?= $c['id_matrix']?></td>
                                        <td><?= $c['id_kandidat']?></td>
                                        <td><?= $c['nama_kandidat']?></td>
                                        <td><?= $c['id_kriteria']?></td>
                                        <td><?= $c['nama_kriteria']?></td>
                                        <td><?= $c['jenis']?></td>
                                        <td><?= $c['id_bobot']?></td>
                                        <td><?= $c['value']?></td>
                                        <td><?= $c['nilai']?></td>
                                        <td><?= $c['keterangan']?></td>
                                        <td><?= $c['normalisasi_w']?></td>
                                        <td><?= $c['pangkat']?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

    <div class="ns">
    <h2 class="heading-section">Nilai S</h2>
    </div>
    <table class="table table-bordered table-dark table-hover" id="">
                            <thead>
                                <tr>
                                    <th>ID Kandidat</th>
                                    <th>Nama Kandidat</th>
                                    <th>Nilai S</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "config.php";
                                $a = "SELECT id_kandidat,nama_kandidat,EXP(SUM(LOG(wp_pangkat.pangkat))) AS nilaiS FROM wp_pangkat GROUP BY id_kandidat ";
                                $b = $koneksi->query($a);
                                while ($c = $b->fetch_array()) {
                                ?>
                                    <tr>
                                        <td><?= $c['id_kandidat']?></td>
                                        <td><?= $c['nama_kandidat']?></td>
                                        <td><?= $c['nilaiS']?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
    
    <div class="ns">
    <h2 class="heading-section">Sum Nilai S</h2>
    </div>
    <table class="table table-bordered table-dark table-hover" id="">
                            <thead>
                                <tr>
                                    <th>Jum</th>
                                 
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "config.php";
                                $a = "SELECT SUM(wp_nilais.nilaiS) AS jum FROM wp_nilais ";
                                $b = $koneksi->query($a);
                                while ($c = $b->fetch_array()) {
                                ?>
                                    <tr>
                                        <td><?= $c['jum']?></td>
                                      
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
    
     
    <div class="nv">
    <h2 class="heading-section">Nilai V</h2>
    </div>
    <table class="table table-bordered table-dark table-hover" id="">
                            <thead>
                                <tr>
                                    <th>ID Kandidat</th>
                                    <th>Nama Kandidat</th>
                                    <th>Nilai V</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "config.php";
                                $a = "SELECT wp_nilais.id_kandidat, wp_nilais.nama_kandidat, (nilais/jum) AS nilaiv FROM wp_nilais, wp_sums ";
                                $b = $koneksi->query($a);
                                while ($c = $b->fetch_array()) {
                                ?>
                                    <tr>
                                        <td><?= $c['id_kandidat']?></td>
                                        <td><?= $c['nama_kandidat']?></td>
                                        <td><?= $c['nilaiv']?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

        <?php
        } elseif ($metode=='TOPSIS'){
        ?>

        <section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">VIEW TOPSIS</h2>
				</div>
			</div>
            <div class="mk">
            <h2 class="heading-section">Matrix Keputusan</h2>
    </div>
    
    <table class="table table-bordered table-dark table-hover" id="">
                            <thead>
                                <tr>
                                    <th>ID Matrix</th>
                                    <th>ID Alternatif</th>
                                    <th>Nama Alternatif</th>
                                    <th>ID Kriteria</th>
                                    <th>Nama Kriteria</th>
                                    <th>Jenis</th>
                                    <th>ID Bobot</th>
                                    <th>Nilai</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "config.php";
                                $a = "SELECT matrixkeputusan.id_matrix,alternatif.*,kriteria.*,bobot.id_bobot,bobot.value,
                                skala.value AS nilai,skala.keterangan FROM matrixkeputusan,skala,bobot,kriteria,
                                alternatif WHERE matrixkeputusan.id_kandidat=alternatif.id_kandidat AND 
                                matrixkeputusan.id_bobot=bobot.id_bobot AND matrixkeputusan.id_skala=skala.id_skala
                                AND kriteria.id_kriteria=bobot.id_kriteria";
                                $b = $koneksi->query($a);
                                while ($c = $b->fetch_array()) {
                                ?>
                                    <tr>
                                        <td><?= $c['id_matrix']?></td>
                                        <td><?= $c['id_kandidat']?></td>
                                        <td><?= $c['nama_kandidat']?></td>
                                        <td><?= $c['id_kriteria']?></td>
                                        <td><?= $c['nama_kriteria']?></td>
                                        <td><?= $c['jenis']?></td>
                                        <td><?= $c['id_bobot']?></td>
                                        <td><?= $c['nilai']?></td>
                                        <td><?= $c['keterangan']?></td>
  
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

<div class="tp">
    <h2 class="heading-section">Topsis Pembagi</h2>
    </div>
    <table class="table table-bordered table-dark table-hover" id="">
                            <thead>
                                <tr>
                                    <th>ID Kriteria</th>
                                    <th>Nama Kriteria</th>
                                    <th>Bagi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "config.php";
                                $a = "SELECT vmatrixkeputusan.id_kriteria, vmatrixkeputusan.nama_kriteria, SQRT(SUM(POW(vmatrixkeputusan.nilai,2))) 
                                AS bagi FROM vmatrixkeputusan GROUP BY vmatrixkeputusan.id_kriteria ";
                                $b = $koneksi->query($a);
                                while ($c = $b->fetch_array()) {
                                ?>
                                    <tr>
                                        <td><?= $c['id_kriteria']?></td>
                                        <td><?= $c['nama_kriteria']?></td>
                                        <td><?= $c['bagi']?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

    <div class="tn">
    <h2 class="heading-section">Topsis Normalisasi</h2>
    </div>
    <table class="table table-bordered table-dark table-hover" id="">
                            <thead>
                                <tr>
                                    <th>ID Matrix</th>
                                    <th>ID Alternatif</th>
                                    <th>Nama Alternatif</th>
                                    <th>ID Kriteria</th>
                                    <th>Nama Kriteria</th>
                                    <th>Jenis</th>
                                    <th>ID Bobot</th>
                                    <th>Value</th>
                                    <th>Nilai</th>
                                    <th>Keterangan</th>
                                    <th>Normalisasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "config.php";
                                $a = "SELECT vmatrixkeputusan.*,(vmatrixkeputusan.nilai/topsis_pembagi.bagi) AS normalisasi FROM vmatrixkeputusan,topsis_pembagi
                                WHERE topsis_pembagi.id_kriteria=vmatrixkeputusan.id_kriteria GROUP BY vmatrixkeputusan.id_matrix ";
                                $b = $koneksi->query($a);
                                while ($c = $b->fetch_array()) {
                                ?>
                                    <tr>
                                        <td><?= $c['id_matrix']?></td>
                                        <td><?= $c['id_kandidat']?></td>
                                        <td><?= $c['nama_kandidat']?></td>
                                        <td><?= $c['id_kriteria']?></td>
                                        <td><?= $c['nama_kriteria']?></td>
                                        <td><?= $c['jenis']?></td>
                                        <td><?= $c['id_bobot']?></td>
                                        <td><?= $c['value']?></td>
                                        <td><?= $c['nilai']?></td>
                                        <td><?= $c['keterangan']?></td>
                                        <td><?= $c['normalisasi']?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

    <div class="tt">
    <h2 class="heading-section">Topsis Terbobot</h2>
    </div>
    <table class="table table-bordered table-dark table-hover" id="">
                            <thead>
                                <tr>
                                    <th>ID Matrix</th>
                                    <th>ID Kandidat</th>
                                    <th>Nama Kandidat</th>
                                    <th>ID Kriteria</th>
                                    <th>Nama Kriteria</th>
                                    <th>Jenis</th>
                                    <th>ID Bobot</th>
                                    <th>Value</th>
                                    <th>Nilai</th>
                                    <th>Keterangan</th>
                                    <th>Normalisasi</th>
                                    <th>Terbobot</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "config.php";
                                $a = "SELECT topsis_normalisasi.*,(bobot.value*topsis_normalisasi.normalisasi) AS terbobot FROM topsis_normalisasi,bobot 
                                WHERE bobot.id_kriteria=topsis_normalisasi.id_kriteria GROUP BY topsis_normalisasi.id_matrix ";
                                $b = $koneksi->query($a);
                                while ($c = $b->fetch_array()) {
                                ?>
                                    <tr>
                                        <td><?= $c['id_matrix']?></td>
                                        <td><?= $c['id_kandidat']?></td>
                                        <td><?= $c['nama_kandidat']?></td>
                                        <td><?= $c['id_kriteria']?></td>
                                        <td><?= $c['nama_kriteria']?></td>
                                        <td><?= $c['jenis']?></td>
                                        <td><?= $c['id_bobot']?></td>
                                        <td><?= $c['value']?></td>
                                        <td><?= $c['nilai']?></td>
                                        <td><?= $c['keterangan']?></td>
                                        <td><?= $c['normalisasi']?></td>
                                        <td><?= $c['terbobot']?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

    <div class="tm">
    <h2 class="heading-section">Topsis MaxMin</h2>
    </div>
    <table class="table table-bordered table-dark table-hover" id="">
                            <thead>
                                <tr>
                                    <th>ID Matrix</th>
                                    <th>ID Kriteria</th>
                                    <th>Nama Kriteria</th>
                                    <th>Maximum</th>
                                    <th>Minimum</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "config.php";
                                $a = "SELECT topsis_terbobot.id_matrix,topsis_terbobot.id_kriteria,topsis_terbobot.nama_kriteria,MAX(topsis_terbobot.terbobot) 
                                AS maximum, MIN(topsis_terbobot.terbobot) AS minimum FROM topsis_terbobot GROUP BY topsis_terbobot.id_kriteria";
                                $b = $koneksi->query($a);
                                while ($c = $b->fetch_array()) {
                                ?>
                                    <tr>
                                        <td><?= $c['id_matrix']?></td>
                                        <td><?= $c['id_kriteria']?></td>
                                        <td><?= $c['nama_kriteria']?></td>
                                        <td><?= $c['maximum']?></td>
                                        <td><?= $c['minimum']?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
    
    <div class="ts">
    <h2 class="heading-section">Topsis SipSin</h2>
    </div>
    <table class="table table-bordered table-dark table-hover" id="">
                            <thead>
                                <tr>
                                    <th>ID Alternatif</th>
                                    <th>D Plus</th>
                                    <th>D Min</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "config.php";
                                $a = "SELECT topsis_terbobot.id_kandidat, SQRT(SUM(POW((topsis_maxmin.maximum-topsis_terbobot.terbobot),2))) AS 
                                dplus, SQRT(SUM(POW((topsis_maxmin.minimum-topsis_terbobot.terbobot),2))) AS dmin FROM topsis_terbobot,topsis_maxmin WHERE 
                                topsis_terbobot.id_kriteria=topsis_maxmin.id_kriteria GROUP BY topsis_terbobot.id_kandidat";
                                $b = $koneksi->query($a);
                                while ($c = $b->fetch_array()) {
                                ?>
                                    <tr>
                                        <td><?= $c['id_kandidat']?></td>
                                        <td><?= $c['dplus']?></td>
                                        <td><?= $c['dmin']?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
    
     
    <div class="tv">
    <h2 class="heading-section">Topsis Nilai V</h2>
    </div>
    <table class="table table-bordered table-dark table-hover" id="">
                            <thead>
                                <tr>
                                    <th>ID Kandidat</th>
                                    <th>D Plus</th>
                                    <th>D Min</th>
                                    <th>Nilai V</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "config.php";
                                $a = "SELECT topsis_sipsin.*,(topsis_sipsin.dmin/(topsis_sipsin.dplus+topsis_sipsin.dmin)) AS nilaiv FROM topsis_sipsin
                                GROUP BY topsis_sipsin.id_kandidat";
                                $b = $koneksi->query($a);
                                while ($c = $b->fetch_array()) {
                                ?>
                                    <tr>
                                        <td><?= $c['id_kandidat']?></td>
                                        <td><?= $c['dplus']?></td>
                                        <td><?= $c['dmin']?></td>
                                        <td><?= $c['nilaiv']?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
        <?php
        } elseif ($metode=='MULTIMOORA'){
        ?>

        <section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">VIEW MULTIMOORA</h2>
				</div>
			</div>
            <div class="mk">
            <h2 class="heading-section">Matrix Keputusan</h2>
    </div>
    
    <table class="table table-bordered table-dark table-hover" id="">
                            <thead>
                                <tr>
                                    <th>ID Matrix</th>
                                    <th>ID Alternatif</th>
                                    <th>Nama Alternatif</th>
                                    <th>ID Kriteria</th>
                                    <th>Nama Kriteria</th>
                                    <th>Jenis</th>
                                    <th>ID Bobot</th>
                                    <th>Nilai</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "config.php";
                                $a = "SELECT matrixkeputusan.id_matrix,alternatif.*,kriteria.*,bobot.id_bobot,bobot.value,
                                skala.value AS nilai,skala.keterangan FROM matrixkeputusan,skala,bobot,kriteria,
                                alternatif WHERE matrixkeputusan.id_kandidat=alternatif.id_kandidat AND 
                                matrixkeputusan.id_bobot=bobot.id_bobot AND matrixkeputusan.id_skala=skala.id_skala
                                AND kriteria.id_kriteria=bobot.id_kriteria";
                                $b = $koneksi->query($a);
                                while ($c = $b->fetch_array()) {
                                ?>
                                    <tr>
                                        <td><?= $c['id_matrix']?></td>
                                        <td><?= $c['id_kandidat']?></td>
                                        <td><?= $c['nama_kandidat']?></td>
                                        <td><?= $c['id_kriteria']?></td>
                                        <td><?= $c['nama_kriteria']?></td>
                                        <td><?= $c['jenis']?></td>
                                        <td><?= $c['id_bobot']?></td>
                                        <td><?= $c['nilai']?></td>
                                        <td><?= $c['keterangan']?></td>
  
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

<div class="m1">
    <h2 class="heading-section">Multimoora 1</h2>
    </div>
    <table class="table table-bordered table-dark table-hover" id="">
                            <thead>
                                <tr>
                                    <th>ID Matrix</th>
                                    <th>ID Alternatif</th>
                                    <th>Nama Alternatif</th>
                                    <th>ID Kriteria</th>
                                    <th>Nama kriteria</th>
                                    <th>Jenis</th>
                                    <th>ID Bobot</th>
                                    <th>Value</th>
                                    <th>Nilai</th>
                                    <th>Keterangan</th>
                                    <th>PRA</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "config.php";
                                $a = "SELECT vmatrixkeputusan.*,SQRT(SUM(POW(vmatrixkeputusan.nilai,2))) AS pra FROM 
                                vmatrixkeputusan GROUP BY vmatrixkeputusan.id_kriteria ";
                                $b = $koneksi->query($a);
                                while ($c = $b->fetch_array()) {
                                ?>
                                    <tr>
                                        <td><?= $c['id_matrix']?></td>
                                        <td><?= $c['id_kandidat']?></td>
                                        <td><?= $c['nama_kandidat']?></td>
                                        <td><?= $c['id_kriteria']?></td>
                                        <td><?= $c['nama_kriteria']?></td>
                                        <td><?= $c['jenis']?></td>
                                        <td><?= $c['id_bobot']?></td>
                                        <td><?= $c['value']?></td>
                                        <td><?= $c['nilai']?></td>
                                        <td><?= $c['keterangan']?></td>
                                        <td><?= $c['pra']?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

    <div class="m2">
    <h2 class="heading-section">Multimoora 2</h2>
    </div>
    <table class="table table-bordered table-dark table-hover" id="">
                            <thead>
                                <tr>
                                    <th>ID Matrix</th>
                                    <th>ID Alternatif</th>
                                    <th>Nama Alternatif</th>
                                    <th>ID Kriteria</th>
                                    <th>Nama Kriteria</th>
                                    <th>Jenis</th>
                                    <th>ID Bobot</th>
                                    <th>Value</th>
                                    <th>Nilai</th>
                                    <th>Keterangan</th>
                                    <th>Keterangan</th>
                                    <th>Normalisasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "config.php";
                                $a = "SELECT vmatrixkeputusan.*,multimoora_1.pra, (vmatrixkeputusan.nilai/multimoora_1.pra) AS 
                                normalisasi FROM vmatrixkeputusan, multimoora_1 WHERE multimoora_1.id_kriteria=vmatrixkeputusan.id_kriteria 
                                GROUP BY vmatrixkeputusan.id_matrix ";
                                $b = $koneksi->query($a);
                                while ($c = $b->fetch_array()) {
                                ?>
                                    <tr>
                                        <td><?= $c['id_matrix']?></td>
                                        <td><?= $c['id_kandidat']?></td>
                                        <td><?= $c['nama_kandidat']?></td>
                                        <td><?= $c['id_kriteria']?></td>
                                        <td><?= $c['nama_kriteria']?></td>
                                        <td><?= $c['jenis']?></td>
                                        <td><?= $c['id_bobot']?></td>
                                        <td><?= $c['value']?></td>
                                        <td><?= $c['nilai']?></td>
                                        <td><?= $c['keterangan']?></td>
                                        <td><?= $c['pra']?></td>
                                        <td><?= $c['normalisasi']?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

    <div class="m3">
    <h2 class="heading-section">Multimoora 3</h2>
    </div>
    <table class="table table-bordered table-dark table-hover" id="">
                            <thead>
                                <tr>
                                    <th>ID Matrix</th>
                                    <th>ID Alternatif</th>
                                    <th>Nama Alternatif</th>
                                    <th>ID Kriteria</th>
                                    <th>Nama Kriteria</th>
                                    <th>Jenis</th>
                                    <th>ID Bobot</th>
                                    <th>Value</th>
                                    <th>Nilai</th>
                                    <th>Keterangan</th>
                                    <th>PRA</th>
                                    <th>Normalisasi</th>
                                    <th>Normalisasi Bobot</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "config.php";
                                $a = "SELECT multimoora_2.*,(multimoora_2.normalisasi*multimoora_2.value) as normalisasibobot 
                                FROM multimoora_2 GROUP BY multimoora_2.id_matrix ";
                                $b = $koneksi->query($a);
                                while ($c = $b->fetch_array()) {
                                ?>
                                    <tr>
                                        <td><?= $c['id_matrix']?></td>
                                        <td><?= $c['id_kandidat']?></td>
                                        <td><?= $c['nama_kandidat']?></td>
                                        <td><?= $c['id_kriteria']?></td>
                                        <td><?= $c['nama_kriteria']?></td>
                                        <td><?= $c['jenis']?></td>
                                        <td><?= $c['id_bobot']?></td>
                                        <td><?= $c['value']?></td>
                                        <td><?= $c['nilai']?></td>
                                        <td><?= $c['keterangan']?></td>
                                        <td><?= $c['pra']?></td>
                                        <td><?= $c['normalisasi']?></td>
                                        <td><?= $c['normalisasibobot']?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
    
    <div class="m4">
    <h2 class="heading-section">Multimoora 4</h2>
    </div>
    <table class="table table-bordered table-dark table-hover" id="">
                            <thead>
                                <tr>
                                    <th>ID Alternatif</th>
                                    <th>Hasil</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "config.php";
                                $a = "SELECT multimoora_3.id_kandidat,SUM(multimoora_3.normalisasibobot) AS hasil 
                                FROM multimoora_3 GROUP BY multimoora_3.id_kandidat ";
                                $b = $koneksi->query($a);
                                while ($c = $b->fetch_array()) {
                                ?>
                                    <tr>
                                        <td><?= $c['id_kandidat']?></td>
                                        <td><?= $c['hasil']?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

         <?php
        }
        ?>
                    </form>
                    </form>
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

