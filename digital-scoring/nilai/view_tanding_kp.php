<?php 
	include "../backend/includes/connection.php";

	//dapatkan ID jadwal pertandingan
	$id_partai = mysqli_real_escape_string($koneksi, $_GET["id_partai"]);

	//Mencari data jadwal pertandingan
	$sqljadwal = "SELECT * FROM jadwal_tanding 
					WHERE id_partai='$id_partai'";
	$jadwal_tanding = mysqli_query($koneksi,$sqljadwal);
	$jadwal = mysqli_fetch_array($jadwal_tanding);

	
	//----------------- WASIT JURI 1 MERAH
	//Kueri nilai wasit juri 1, babak 1, sudut merah
	$sqljuri1babak1merah = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='1' AND
							babak='1' AND
							sudut='MERAH'";
	$juri1babak1merah = mysqli_query($koneksi,$sqljuri1babak1merah);
	$nilaijuri1babak1merah = mysqli_fetch_array($juri1babak1merah);

	//Kueri nilai wasit juri 1, babak 2, sudut merah
	$sqljuri1babak2merah = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='1' AND
							babak='2' AND
							sudut='MERAH'";
	$juri1babak2merah = mysqli_query($koneksi,$sqljuri1babak2merah);
	$nilaijuri1babak2merah = mysqli_fetch_array($juri1babak2merah);

	//Kueri nilai wasit juri 1, babak 3, sudut merah
	$sqljuri1babak3merah = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='1' AND
							babak='3' AND
							sudut='MERAH'";
	$juri1babak3merah = mysqli_query($koneksi,$sqljuri1babak3merah);
	$nilaijuri1babak3merah = mysqli_fetch_array($juri1babak3merah);
	//----------------- END WASIT JURI 1 MERAH

	//----------------- WASIT JURI 2 MERAH
	//Kueri nilai wasit juri 2, babak 1, sudut merah
	$sqljuri2babak1merah = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='2' AND
							babak='1' AND
							sudut='MERAH'";
	$juri2babak1merah = mysqli_query($koneksi,$sqljuri2babak1merah);
	$nilaijuri2babak1merah = mysqli_fetch_array($juri2babak1merah);

	//Kueri nilai wasit juri 2, babak 2, sudut merah
	$sqljuri2babak2merah = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='2' AND
							babak='2' AND
							sudut='MERAH'";
	$juri2babak2merah = mysqli_query($koneksi,$sqljuri2babak2merah);
	$nilaijuri2babak2merah = mysqli_fetch_array($juri2babak2merah);

	//Kueri nilai wasit juri 2, babak 3, sudut merah
	$sqljuri2babak3merah = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='2' AND
							babak='3' AND
							sudut='MERAH'";
	$juri2babak3merah = mysqli_query($koneksi,$sqljuri2babak3merah);
	$nilaijuri2babak3merah = mysqli_fetch_array($juri2babak3merah);
	//----------------- END WASIT JURI 2 MERAH


	//----------------- WASIT JURI 3 MERAH
	//Kueri nilai wasit juri 3, babak 1, sudut merah
	$sqljuri3babak1merah = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='3' AND
							babak='1' AND
							sudut='MERAH'";
	$juri3babak1merah = mysqli_query($koneksi,$sqljuri3babak1merah);
	$nilaijuri3babak1merah = mysqli_fetch_array($juri3babak1merah);

	//Kueri nilai wasit juri 3, babak 2, sudut merah
	$sqljuri3babak2merah = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='3' AND
							babak='2' AND
							sudut='MERAH'";
	$juri3babak2merah = mysqli_query($koneksi,$sqljuri3babak2merah);
	$nilaijuri3babak2merah = mysqli_fetch_array($juri3babak2merah);

	//Kueri nilai wasit juri 3, babak 3, sudut merah
	$sqljuri3babak3merah = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='3' AND
							babak='3' AND
							sudut='MERAH'";
	$juri3babak3merah = mysqli_query($koneksi,$sqljuri3babak3merah);
	$nilaijuri3babak3merah = mysqli_fetch_array($juri3babak3merah);
	//----------------- END WASIT JURI 3 MERAH


	//----------------- WASIT JURI 4 MERAH
	//Kueri nilai wasit juri 4, babak 1, sudut merah
	$sqljuri4babak1merah = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='4' AND
							babak='1' AND
							sudut='MERAH'";
	$juri4babak1merah = mysqli_query($koneksi,$sqljuri4babak1merah);
	$nilaijuri4babak1merah = mysqli_fetch_array($juri4babak1merah);

	//Kueri nilai wasit juri 4, babak 2, sudut merah
	$sqljuri4babak2merah = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='4' AND
							babak='2' AND
							sudut='MERAH'";
	$juri4babak2merah = mysqli_query($koneksi,$sqljuri4babak2merah);
	$nilaijuri4babak2merah = mysqli_fetch_array($juri4babak2merah);

	//Kueri nilai wasit juri 4, babak 3, sudut merah
	$sqljuri4babak3merah = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='4' AND
							babak='3' AND
							sudut='MERAH'";
	$juri4babak3merah = mysqli_query($koneksi,$sqljuri4babak3merah);
	$nilaijuri4babak3merah = mysqli_fetch_array($juri4babak3merah);
	//----------------- END WASIT JURI 4 MERAH


	//----------------- WASIT JURI 5 MERAH
	//Kueri nilai wasit juri 5, babak 1, sudut merah
	$sqljuri5babak1merah = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='5' AND
							babak='1' AND
							sudut='MERAH'";
	$juri5babak1merah = mysqli_query($koneksi,$sqljuri5babak1merah);
	$nilaijuri5babak1merah = mysqli_fetch_array($juri5babak1merah);

	//Kueri nilai wasit juri 5, babak 2, sudut merah
	$sqljuri5babak2merah = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='5' AND
							babak='2' AND
							sudut='MERAH'";
	$juri5babak2merah = mysqli_query($koneksi,$sqljuri5babak2merah);
	$nilaijuri5babak2merah = mysqli_fetch_array($juri5babak2merah);

	//Kueri nilai wasit juri 5, babak 3, sudut merah
	$sqljuri5babak3merah = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='5' AND
							babak='3' AND
							sudut='MERAH'";
	$juri5babak3merah = mysqli_query($koneksi,$sqljuri5babak3merah);
	$nilaijuri5babak3merah = mysqli_fetch_array($juri5babak3merah);
	//----------------- END WASIT JURI 5 MERAH


	//----------------- AREA BIRU --------------------------
	//------------------------------------------------------

	//----------------- WASIT JURI 1 BIRU
	//Kueri nilai wasit juri 1, babak 1, sudut biru
	$sqljuri1babak1biru = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='1' AND
							babak='1' AND
							sudut='BIRU'";
	$juri1babak1biru = mysqli_query($koneksi,$sqljuri1babak1biru);
	$nilaijuri1babak1biru = mysqli_fetch_array($juri1babak1biru);

	//Kueri nilai wasit juri 1, babak 2, sudut biru
	$sqljuri1babak2biru = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='1' AND
							babak='2' AND
							sudut='BIRU'";
	$juri1babak2biru = mysqli_query($koneksi,$sqljuri1babak2biru);
	$nilaijuri1babak2biru = mysqli_fetch_array($juri1babak2biru);

	//Kueri nilai wasit juri 1, babak 3, sudut biru
	$sqljuri1babak3biru = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='1' AND
							babak='3' AND
							sudut='BIRU'";
	$juri1babak3biru = mysqli_query($koneksi,$sqljuri1babak3biru);
	$nilaijuri1babak3biru = mysqli_fetch_array($juri1babak3biru);
	//----------------- END WASIT JURI 1 biru

	//----------------- WASIT JURI 2 biru
	//Kueri nilai wasit juri 2, babak 1, sudut biru
	$sqljuri2babak1biru = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='2' AND
							babak='1' AND
							sudut='BIRU'";
	$juri2babak1biru = mysqli_query($koneksi,$sqljuri2babak1biru);
	$nilaijuri2babak1biru = mysqli_fetch_array($juri2babak1biru);

	//Kueri nilai wasit juri 2, babak 2, sudut biru
	$sqljuri2babak2biru = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='2' AND
							babak='2' AND
							sudut='BIRU'";
	$juri2babak2biru = mysqli_query($koneksi,$sqljuri2babak2biru);
	$nilaijuri2babak2biru = mysqli_fetch_array($juri2babak2biru);

	//Kueri nilai wasit juri 2, babak 3, sudut biru
	$sqljuri2babak3biru = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='2' AND
							babak='3' AND
							sudut='BIRU'";
	$juri2babak3biru = mysqli_query($koneksi,$sqljuri2babak3biru);
	$nilaijuri2babak3biru = mysqli_fetch_array($juri2babak3biru);
	//----------------- END WASIT JURI 2 biru


	//----------------- WASIT JURI 3 biru
	//Kueri nilai wasit juri 3, babak 1, sudut biru
	$sqljuri3babak1biru = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='3' AND
							babak='1' AND
							sudut='BIRU'";
	$juri3babak1biru = mysqli_query($koneksi,$sqljuri3babak1biru);
	$nilaijuri3babak1biru = mysqli_fetch_array($juri3babak1biru);

	//Kueri nilai wasit juri 3, babak 2, sudut biru
	$sqljuri3babak2biru = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='3' AND
							babak='2' AND
							sudut='BIRU'";
	$juri3babak2biru = mysqli_query($koneksi,$sqljuri3babak2biru);
	$nilaijuri3babak2biru = mysqli_fetch_array($juri3babak2biru);

	//Kueri nilai wasit juri 3, babak 3, sudut biru
	$sqljuri3babak3biru = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='3' AND
							babak='3' AND
							sudut='BIRU'";
	$juri3babak3biru = mysqli_query($koneksi,$sqljuri3babak3biru);
	$nilaijuri3babak3biru = mysqli_fetch_array($juri3babak3biru);
	//----------------- END WASIT JURI 3 biru


	//----------------- WASIT JURI 4 biru
	//Kueri nilai wasit juri 4, babak 1, sudut biru
	$sqljuri4babak1biru = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='4' AND
							babak='1' AND
							sudut='BIRU'";
	$juri4babak1biru = mysqli_query($koneksi,$sqljuri4babak1biru);
	$nilaijuri4babak1biru = mysqli_fetch_array($juri4babak1biru);

	//Kueri nilai wasit juri 4, babak 2, sudut biru
	$sqljuri4babak2biru = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='4' AND
							babak='2' AND
							sudut='BIRU'";
	$juri4babak2biru = mysqli_query($koneksi,$sqljuri4babak2biru);
	$nilaijuri4babak2biru = mysqli_fetch_array($juri4babak2biru);

	//Kueri nilai wasit juri 4, babak 3, sudut biru
	$sqljuri4babak3biru = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='4' AND
							babak='3' AND
							sudut='BIRU'";
	$juri4babak3biru = mysqli_query($koneksi,$sqljuri4babak3biru);
	$nilaijuri4babak3biru = mysqli_fetch_array($juri4babak3biru);
	//----------------- END WASIT JURI 4 biru


	//----------------- WASIT JURI 5 biru
	//Kueri nilai wasit juri 5, babak 1, sudut biru
	$sqljuri5babak1biru = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='5' AND
							babak='1' AND
							sudut='BIRU'";
	$juri5babak1biru = mysqli_query($koneksi,$sqljuri5babak1biru);
	$nilaijuri5babak1biru = mysqli_fetch_array($juri5babak1biru);

	//Kueri nilai wasit juri 5, babak 2, sudut biru
	$sqljuri5babak2biru = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='5' AND
							babak='2' AND
							sudut='BIRU'";
	$juri5babak2biru = mysqli_query($koneksi,$sqljuri5babak2biru);
	$nilaijuri5babak2biru = mysqli_fetch_array($juri5babak2biru);

	//Kueri nilai wasit juri 5, babak 3, sudut biru
	$sqljuri5babak3biru = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='5' AND
							babak='3' AND
							sudut='BIRU'";
	$juri5babak3biru = mysqli_query($koneksi,$sqljuri5babak3biru);
	$nilaijuri5babak3biru = mysqli_fetch_array($juri5babak3biru);
	//----------------- END WASIT JURI 5 biru
?>

<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="noindex">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

</head>
<body>
<div class="container">
<div class="table-responsive">
	<table class="table table-bordered">
		<tr class="text-center">
			<td><a href="index.php" class="btn btn-warning" role="button">DAFTAR PARTAI</a></td>				
			<td><a href="monitor_nilai.php?id_partai=<?php echo $jadwal['id_partai']; ?>" class="btn btn-warning" role="button">MONITORING JURI</a></td>
			<td><a href="view_tanding_kp.php?id_partai=<?php echo $jadwal['id_partai']; ?>" class="btn btn-warning" role="button">MONITORING NILAI</a></td>
			<td><a href="view_stats.php?id_partai=<?php echo $jadwal['id_partai']; ?>" class="btn btn-warning" role="button">STATISTIK NILAI</a></td>
		</tr>
	</table>
</div>
<div class="table-responsive">
<table class="table">
  <thead>
  	<tr>
      <td colspan="6" rowspan="3">
      	<!-- <h1 class="waktu" style="font-size: 50px">00:00</h1> -->
      </td>
    </tr>
    <tr class="text-right">
      <td colspan="5" style="font-size: 16px; font-weight: bold;">GELANGGANG : <?php echo $jadwal['gelanggang']; ?></td>
    </tr>
    <tr class="text-right">
      <td colspan="5" style="font-size: 16px; font-weight: bold;">PARTAI : <?php echo $jadwal['partai']." (".$jadwal['babak'].")"; ?></td>
    </tr>
    <tr>
    	<td colspan="6">
	      	<!-- <h1 class="btn btn-success btn-xs" onclick="init_start()" style="margin-bottom:10px;margin-top:0;"> START</h1> -->
	      	<!-- <h1 class="btn btn-warning btn-xs btn-stop" onclick="resume_time()" style="margin-bottom:10px;margin-top:0;"> PAUSE</h1> -->
	      	<!-- <h1 class="btn btn-danger btn-xs" onclick="stop_time()" style="margin-bottom:10px;margin-top:0;"> STOP</h1> -->
	    </td>
      	<td colspan="5" class="text-right" style="font-size: 16px; font-weight: bold;"><?php echo $jadwal['kelas']; ?></td>
    </tr>
    
    <tr class="text-center">
      <td colspan="5" style="font-size: 16px; font-weight: bold;"><p><?php echo $jadwal['nm_merah']; ?></p></td>
      <td>&nbsp;</td>
      <td colspan="5" style="font-size: 16px; font-weight: bold;"><?php echo $jadwal['nm_biru']; ?></td>
    </tr>
    <tr class="text-center">
      <td colspan="5" style="font-size: 16px; font-weight: bold;"><p><?php echo $jadwal['kontingen_merah']; ?></p></td>
      <td>&nbsp;</td>
      <td colspan="5" style="font-size: 16px; font-weight: bold;"><p><?php echo $jadwal['kontingen_biru']; ?></p></td>
    </tr>
    <tr class="text-center">
      <td colspan="5" bgcolor="#FF0000" style="font-size: 16px; font-weight: bold;"><font color="white">SUDUT MERAH</font></td>
      <td bgcolor="#F5F5F5">&nbsp;</td>
      <td colspan="5" bgcolor="#1E90FF" style="font-size: 16px; font-weight: bold;"><font color="white">SUDUT BIRU</font></td>
    </tr>
    <tr class="text-center" style="font-weight: bold;">
      <td>WASIT</td>
      <td>WASIT</td>
      <td>WASIT</td>
      <td>WASIT</td>
      <td>WASIT</td>
      <td rowspan="2" bgcolor="#F5F5F5" style="font-size: 18px;">BABAK</td>
      <td>WASIT</td>
      <td>WASIT</td>
      <td>WASIT</td>
      <td>WASIT</td>
      <td>WASIT</td>
    </tr>
    <tr class="text-center" style="font-weight: bold;">
      <td>JURI 1</td>
      <td>JURI 2</td>
      <td>JURI 3</td>
      <td>JURI 4</td>
      <td>JURI 5</td>
      <td>JURI 1</td>
      <td>JURI 2</td>
      <td>JURI 3</td>
      <td>JURI 4</td>
      <td>JURI 5</td>
    </tr>
  </thead>
  <tbody class="content_penilaian">
  	<tr class="text-center" style="font-size: 24px;">
      <td><?php echo $nilaijuri1babak1merah[0]; ?></td>
      <td><?php echo $nilaijuri2babak1merah[0]; ?></td>
      <td><?php echo $nilaijuri3babak1merah[0]; ?></td>
      <td><?php echo $nilaijuri4babak1merah[0]; ?></td>
      <td><?php echo $nilaijuri5babak1merah[0]; ?></td>
      <td bgcolor="#F5F5F5">I</td>
      <td><?php echo $nilaijuri1babak1biru[0]; ?></td>
      <td><?php echo $nilaijuri2babak1biru[0]; ?></td>
      <td><?php echo $nilaijuri3babak1biru[0]; ?></td>
      <td><?php echo $nilaijuri4babak1biru[0]; ?></td>
      <td><?php echo $nilaijuri5babak1biru[0]; ?></td>
    </tr>
    <tr class="text-center" style="font-size: 24px;">
      <td><?php echo $nilaijuri1babak2merah[0]; ?></td>
      <td><?php echo $nilaijuri2babak2merah[0]; ?></td>
      <td><?php echo $nilaijuri3babak2merah[0]; ?></td>
      <td><?php echo $nilaijuri4babak2merah[0]; ?></td>
      <td><?php echo $nilaijuri5babak2merah[0]; ?></td>
      <td bgcolor="#F5F5F5">II</td>
      <td><?php echo $nilaijuri1babak2biru[0]; ?></td>
      <td><?php echo $nilaijuri2babak2biru[0]; ?></td>
      <td><?php echo $nilaijuri3babak2biru[0]; ?></td>
      <td><?php echo $nilaijuri4babak2biru[0]; ?></td>
      <td><?php echo $nilaijuri5babak2biru[0]; ?></td>
    </tr>
    <tr class="text-center" style="font-size: 24px;">
      <td><?php echo $nilaijuri1babak3merah[0]; ?></td>
      <td><?php echo $nilaijuri2babak3merah[0]; ?></td>
      <td><?php echo $nilaijuri3babak3merah[0]; ?></td>
      <td><?php echo $nilaijuri4babak3merah[0]; ?></td>
      <td><?php echo $nilaijuri5babak3merah[0]; ?></td>
      <td bgcolor="#F5F5F5">III</td>
      <td><?php echo $nilaijuri1babak3biru[0]; ?></td>
      <td><?php echo $nilaijuri2babak3biru[0]; ?></td>
      <td><?php echo $nilaijuri3babak3biru[0]; ?></td>
      <td><?php echo $nilaijuri4babak3biru[0]; ?></td>
      <td><?php echo $nilaijuri5babak3biru[0]; ?></td>
    </tr>
    <?php
	    	//hitung total nilai masing-masing juri MERAH
	    	$totalwasitjuri1merah = $nilaijuri1babak1merah[0] + $nilaijuri1babak2merah[0] + $nilaijuri1babak3merah[0];
	    	$totalwasitjuri2merah = $nilaijuri2babak1merah[0] + $nilaijuri2babak2merah[0] + $nilaijuri2babak3merah[0];
	    	$totalwasitjuri3merah = $nilaijuri3babak1merah[0] + $nilaijuri3babak2merah[0] + $nilaijuri3babak3merah[0];
	    	$totalwasitjuri4merah = $nilaijuri4babak1merah[0] + $nilaijuri4babak2merah[0] + $nilaijuri4babak3merah[0];
	      	$totalwasitjuri5merah = $nilaijuri5babak1merah[0] + $nilaijuri5babak2merah[0] + $nilaijuri5babak3merah[0];
	      	
	      	//hitung total nilai masing-masing juri BIRU
	      	$totalwasitjuri1biru = $nilaijuri1babak1biru[0] + $nilaijuri1babak2biru[0] + $nilaijuri1babak3biru[0];
	      	$totalwasitjuri2biru = $nilaijuri2babak1biru[0] + $nilaijuri2babak2biru[0] + $nilaijuri2babak3biru[0];
	      	$totalwasitjuri3biru = $nilaijuri3babak1biru[0] + $nilaijuri3babak2biru[0] + $nilaijuri3babak3biru[0];
	      	$totalwasitjuri4biru = $nilaijuri4babak1biru[0] + $nilaijuri4babak2biru[0] + $nilaijuri4babak3biru[0];
	      	$totalwasitjuri5biru = $nilaijuri5babak1biru[0] + $nilaijuri5babak2biru[0] + $nilaijuri5babak3biru[0];
	    ?>
	    <tr class="text-center" style="font-size: 22px; font-weight: bold;">
	      	<?php 
	      		//juri 1 merah
	      		if($totalwasitjuri1merah > $totalwasitjuri1biru) {
	      			echo "<td bgcolor=red><font color=white>".$totalwasitjuri1merah."</font></td>";
	      		} else {
	      			echo "<td>".$totalwasitjuri1merah."</td>";
	      		}
	      		
	      		//juri 2 merah
	      		if($totalwasitjuri2merah > $totalwasitjuri2biru) {
	      			echo "<td bgcolor=red><font color=white>".$totalwasitjuri2merah."</font></td>";
	      		} else {
	      			echo "<td>".$totalwasitjuri2merah."</td>";
	      		}

	      		//juri 3 merah
	      		if($totalwasitjuri3merah > $totalwasitjuri3biru) {
	      			echo "<td bgcolor=red><font color=white>".$totalwasitjuri3merah."</font></td>";
	      		} else {
	      			echo "<td>".$totalwasitjuri3merah."</td>";
	      		}

	      		//juri 4 merah
	      		if($totalwasitjuri4merah > $totalwasitjuri4biru) {
	      			echo "<td bgcolor=red><font color=white>".$totalwasitjuri4merah."</font></td>";
	      		} else {
	      			echo "<td>".$totalwasitjuri4merah."</td>";
	      		}

	      		//juri 5 merah
	      		if($totalwasitjuri5merah > $totalwasitjuri5biru) {
	      			echo "<td bgcolor=red><font color=white>".$totalwasitjuri5merah."</font></td>";
	      		} else {
	      			echo "<td>".$totalwasitjuri5merah."</td>";
	      		}
	      	?>
	      <td bgcolor="#F5F5F5" style="font-size: 22px; font-weight: bold;">TOTAL</td>
	      	<?php
	      		//juri 1 biru
	      		if($totalwasitjuri1biru > $totalwasitjuri1merah) {
	      			echo "<td bgcolor=blue><font color=white>".$totalwasitjuri1biru."</font></td>";
	      		} else {
	      			echo "<td>".$totalwasitjuri1biru."</td>";
	      		}

	      		//juri 2 biru
	      		if($totalwasitjuri2biru > $totalwasitjuri2merah) {
	      			echo "<td bgcolor=blue><font color=white>".$totalwasitjuri2biru."</font></td>";
	      		} else {
	      			echo "<td>".$totalwasitjuri2biru."</td>";
	      		}

	      		//juri 3 biru
	      		if($totalwasitjuri3biru > $totalwasitjuri3merah) {
	      			echo "<td bgcolor=blue><font color=white>".$totalwasitjuri3biru."</font></td>";
	      		} else {
	      			echo "<td>".$totalwasitjuri3biru."</td>";
	      		}

	      		//juri 4 biru
	      		if($totalwasitjuri4biru > $totalwasitjuri4merah) {
	      			echo "<td bgcolor=blue><font color=white>".$totalwasitjuri4biru."</font></td>";
	      		} else {
	      			echo "<td>".$totalwasitjuri4biru."</td>";
	      		}

	      		//juri 5 biru
	      		if($totalwasitjuri5biru > $totalwasitjuri5merah) {
	      			echo "<td bgcolor=blue><font color=white>".$totalwasitjuri5biru."</font></td>";
	      		} else {
	      			echo "<td>".$totalwasitjuri5biru."</td>";
	      		}
	      	?>
	    </tr>
    <?php 
	  	$skorakhirmerah = 0;
      	$skorakhirbiru = 0;
    ?>
    <tr class="text-center" bgcolor="#16C367" style="font-size: 24px; color: white;">
      <td colspan="5">
      	<b>
      	<?php
      				if($totalwasitjuri1merah > $totalwasitjuri1biru) {
      					$skorakhirmerah = $skorakhirmerah + 1;
      				}
      				if($totalwasitjuri2merah > $totalwasitjuri2biru) {
      					$skorakhirmerah = $skorakhirmerah + 1;
      				}
      				if($totalwasitjuri3merah > $totalwasitjuri3biru) {
      					$skorakhirmerah = $skorakhirmerah + 1;
      				}
      				if($totalwasitjuri4merah > $totalwasitjuri4biru) {
      					$skorakhirmerah = $skorakhirmerah + 1;
      				}
      				if($totalwasitjuri5merah > $totalwasitjuri5biru) {
      					$skorakhirmerah = $skorakhirmerah + 1;
      				}
      				echo $skorakhirmerah;
      	?>
      	</b>
      </td>
      <td><b>SKOR</b></td>
      <td colspan="5">
      	<b>
      	<?php
      				if($totalwasitjuri1biru > $totalwasitjuri1merah) {
      					$skorakhirbiru = $skorakhirbiru + 1;
      				}
      				if($totalwasitjuri2biru > $totalwasitjuri2merah) {
      					$skorakhirbiru = $skorakhirbiru + 1;
      				}
      				if($totalwasitjuri3biru > $totalwasitjuri3merah) {
      					$skorakhirbiru = $skorakhirbiru + 1;
      				}
      				if($totalwasitjuri4biru > $totalwasitjuri4merah) {
      					$skorakhirbiru = $skorakhirbiru + 1;
      				}
      				if($totalwasitjuri5biru > $totalwasitjuri5merah) {
      					$skorakhirbiru = $skorakhirbiru + 1;
      				}
      				echo $skorakhirbiru;
      	?>
      	</b>
      </td>
    </tr>
  </tbody>
</table>
</div>
</div>
<script type="text/javascript">
	setInterval(function(){
		$.ajax({
            url: 'http://localhost/skordigital/nilai/api.php', 
            data : {'a' : 'get_data_view_tanding', 'id_partai': <?=$_GET["id_partai"]?>},
            type: "GET",
            success: function(obj){
            	$('.content_penilaian').html(obj);

            	console.log('Request ... Done');
            }
        });
	}, 2000);

    var var_start_timer = true;
    var var_stop = false;
    var interval= "";
	var resume_time = function(){
		if(var_stop)
    	{
    		return false;
    	}
        if(var_start_timer)
        {
            $('.btn-stop').html(' RESUME');
            var_start_timer = false;
        }
        else
        {
            var_start_timer = true;
            $('.btn-stop').html(' PAUSE');
        }
    }
    function stop_time()
    {	
    	var_stop = true;
        $(".waktu").html("00:00");
        clearInterval(interval);
    }
    function init_start()
    {
        clearInterval(interval);
        var duration = 60 * 3; // 3 Menit         
        var_stop = false;
        var_start_timer = true;

    	start_time(duration)	
    }
    function start_time(duration) 
    {
        var timer = duration, minutes, seconds;

        interval = setInterval(function () {
        	if(var_stop)
	    	{
	    		return false;
	    	}

            if(var_start_timer == false)
            {
                return false;
            }

            minutes = parseInt(timer / 60, 10)
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            if (--timer < 0) {
            	var_stop = true;
                $(".waktu").html("WAKTU HABIS");
        		clearInterval(interval);
            }
            else
            {
                $(".waktu").html(minutes + ":" + seconds);
            }
        }, 1000);
    }

</script>
<!-- SELESAI Confirm Function -->	
	<script>
		function cek_selesai()
		{
			if(confirm('Apakah Anda Yakin Pertandingan Sudah Berakhir?')){
				return true;
			} else {
				return false;
			}
		}
	</script>
</body>
</html>


