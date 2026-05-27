<?php 
	include "../backend/includes/connection.php";

	//Mencari data jadwal pertandingan
	$sqljadwal = "SELECT * FROM jadwal_tanding ORDER BY id_partai ASC";
	$jadwal_tanding = mysqli_query($koneksi,$sqljadwal);
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
<center><h1>Jadwal Pertandingan</h1></center>
<div id="jadwaltanding" class="table-responsive">
<table class="table table-bordered table-striped">
	<thead>
	<tr>
		<td>NO</td>
		<td>GEL.</td>
		<td>PARTAI</td>
		<td>BABAK</td>
		<td>KELOMPOK</td>
		<td>SUDUT MERAH</td>
		<td>SUDUT BIRU</td>
		<td>SKOR</td>
		<td>PEMENANG</td>
		<td>ACTION</td>
	</tr>
	</thead>
	<?php $no=0; while($jadwal = mysqli_fetch_array($jadwal_tanding)) { ?>
	<tr>
		<td rowspan="2"><?php echo $no+1; ?></td>
		<td rowspan="2"><center><?php echo $jadwal['gelanggang']; ?></center></td>
		<td rowspan="2"><center><?php echo $jadwal['partai']; ?></center></td>
		<td rowspan="2"><center><?php echo $jadwal['babak']; ?></center></td>
		<td rowspan="2"><?php echo $jadwal['kelas']; ?></td>
		<td><?php echo $jadwal['nm_merah']; ?></td>
		<td><?php echo $jadwal['nm_biru']; ?></td>
		<td rowspan="2"><?php echo $jadwal['status']; ?></td>
		<td rowspan="2"><?php echo $jadwal['pemenang']; ?></td>
		<td rowspan="2">
			<a href="view_tanding.php?id_partai=<?php echo $jadwal['id_partai']; ?>" class="btn btn-warning" role="button">Lihat Nilai</a>
			<br/>
			<a href="monitor_nilai.php?id_partai=<?php echo $jadwal['id_partai']; ?>" class="btn btn-warning" role="button">Monitoring KP</a>
		</td>
	</tr>
	<tr>
		<td><?php echo $jadwal['kontingen_merah']; ?></td>
		<td><?php echo $jadwal['kontingen_biru']; ?></td>
	</tr>
	<?php $no++; } ?>
</table>
</div>
</div>
</body>
</html>