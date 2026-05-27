<?php
session_start();
  if(!isset($_SESSION['pwd']))
  {
    header('location:login.php');
  }
include('includes/connection.php');

//AMBIL POST DATA
	$judul = mysqli_real_escape_string($koneksi, $_POST["judul"]);
	$tgl = mysqli_real_escape_string($koneksi, $_POST["tgl"]);
	$tanggal = date("j F Y", strtotime($tgl));
	$kategori = mysqli_real_escape_string($koneksi, $_POST["kategori"]);
	

	//Mencari data jadwal pertandingan
	$sqljadwaltgr = "SELECT * FROM jadwal_tgr 
					WHERE kategori = '$kategori'
					ORDER BY id_partai ASC";
	$jadwal_tgr = mysqli_query($koneksi,$sqljadwaltgr);
	//echo $sqljadwaltgr;
	
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
<h3><?php echo 'Kategori '.$kategori.', '.$tanggal; ?></h3></br>
</div>

<div align="center">
<table  border="1" width="100%">
	<thead>
	<tr bgcolor="#99CCFF">
		<td height="50"><center>NO</center></td>
		<td><center>GOLONGAN</center></td>
		<td><center>NO UNDIAN</center></td>
		<td><center>NAMA PESERTA</center></td>
		<td><center>KONTINGEN</center></td>
		<td><center>WAKTU</center></td>
		<td><center>NILAI</center></td>
		<td><center>JUARA</center></td>
	</tr>
	</thead>
	<tbody>
	<?php $no=0; while($jadwal = mysqli_fetch_array($jadwal_tgr)) { $no++;?>
	<tr <?php if($no % 2 == 0) { echo "bgcolor=#eeeeee"; } ?>>
		<td><center><?php echo $no; ?></td>
		<td><center><?php echo $jadwal['golongan']; ?></td>
		<td><center><?php echo $jadwal['noundian']; ?></td>
		<td><?php echo $jadwal['nama']; ?></td>
		<td><?php echo $jadwal['kontingen']; ?></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	</tr>
	</tr>
	</tr>
	</tr>
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