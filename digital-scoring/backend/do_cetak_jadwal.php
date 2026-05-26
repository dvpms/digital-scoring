<?php
session_start();
  if(!isset($_SESSION['pwd']))
  {
    header('location:login.php');
  }
include('includes/connection.php');

//AMBIL POST DATA
	$judul = mysqli_real_escape_string($koneksi, $_POST["judul"]);

	$gelanggang = mysqli_real_escape_string($koneksi, $_POST["gelanggang"]);
	$tgl = mysqli_real_escape_string($koneksi, $_POST["tgl"]);
	$tanggal = date("j F Y", strtotime($tgl));

	//Mencari data jadwal pertandingan
	$sqljadwal = "SELECT * FROM jadwal_tanding 
					WHERE tgl = '$tgl'
					AND gelanggang = '$gelanggang'
					ORDER BY id_partai ASC";
	$jadwal_tanding = mysqli_query($koneksi,$sqljadwal);

	//echo $sqljadwal;
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BACKEND REGISTRASI SILAT</title>
<!-- CSS Files -->
   <!-- <link href="css/reset.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/stylesheet.css" rel="stylesheet" type="text/css" media="all" /> -->

</head>
<body>
<!-- Start Wrapper -->
<div id="wrapper">

<div class="non-printable"><button onclick="window.print()">Cetak Halaman</button></div>
<div align="center">
<h2><?php echo $judul; ?></h2></br>
<h3><?php echo 'Gelanggang '.$gelanggang.', '.$tanggal; ?></h3></br>
</div>

<div align="center">
<table  border="1" width="100%">
	<thead>
	<tr bgcolor="yellow">
		<td height="50"><center>NO</center></td>
		<td><center>GEL.</center></td>
		<td><center>PARTAI</center></td>
		<td><center>BABAK</center></td>
		<td><center>KELOMPOK</center></td>
		<td><center>SUDUT MERAH</center></td>
		<td><center>SUDUT BIRU</center></td>
		<td><center>SKOR</center></td>
		<td><center>PEMENANG</center></td>
	</tr>
	</thead>
	<tbody>
	<?php $no=0; while($jadwal = mysqli_fetch_array($jadwal_tanding)) { $no++;?>
	<tr <?php if($no % 2 == 0) { echo "bgcolor=#eeeeee"; } ?>>
		<td rowspan="2"><center><?php echo $no; ?></center></td>
		<td rowspan="2"><center><?php echo $jadwal['gelanggang']; ?></center></td>
		<td rowspan="2"><center><?php echo $jadwal['partai']; ?></center></td>
		<td rowspan="2"><center><?php echo $jadwal['babak']; ?></center></td>
		<td rowspan="2"><?php echo $jadwal['kelas']; ?></td>
		<td><?php echo $jadwal['nm_merah']; ?></td>
		<td><?php echo $jadwal['nm_biru']; ?></td>
		<td rowspan="2"><center><?php echo $jadwal['status']; ?></center></td>
		<td rowspan="2"><center><?php echo $jadwal['pemenang']; ?></center></td>
	</tr>
	<tr <?php if($no % 2 == 0) { echo "bgcolor=#eeeeee"; } ?>>
		<td><?php echo $jadwal['kontingen_merah']; ?></td>
		<td><?php echo $jadwal['kontingen_biru']; ?></td>
	</tr>
	</tbody>
	<?php } ?>
</table>
</div>

<style style="text/css">
	@media print
    {
    	.non-printable { display: none; }
    	.printable { display: block; }
    }
	</style>

  </body>
</html>