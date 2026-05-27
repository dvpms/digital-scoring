<?php 
	/*
	*---------------------------------------------------------------
	* E-REGISTRASI PENCAK SILAT
	*---------------------------------------------------------------
	* This program is free software; you can redistribute it and/or
	* modify it under the terms of the GNU General Public License
	* as published by the Free Software Foundation; either version 2
	* of the License, or (at your option) any later version.
	*
	* This program is distributed in the hope that it will be useful,
	* but WITHOUT ANY WARRANTY; without even the implied warranty of
	* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
	* GNU General Public License for more details.
	*
	* You should have received a copy of the GNU General Public License
	* along with this program; if not, write to the Free Software
	* Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
	*
	* @Author Yudha Yogasara
	* yudha.yogasara@gmail.com
	* @Contributor Sofyan Hadi, Satria Salam
	*
	* IPSI KABUPATEN TANGERANG
	* SALAM OLAHRAGA
	*/
	
	include "backend/includes/connection.php";

	$today = date("Y-m-d");

	//POST FROM MULAI PENDAFTARAN Page
	$kategori_tanding = mysqli_real_escape_string($koneksi, $_POST["kategori_tanding"]);
	$golongan = mysqli_real_escape_string($koneksi, $_POST["golongan"]);

	if($kategori_tanding == '' OR $golongan == '') {
		?>
		<script type="text/javascript">
			alert('Kategori dan Golongan Pertandingan Harus diisi terlebih dahulu.');
			document.location='mulai_pendaftaran.php';
		</script>
		<?php
		exit;
	}

	//cari data kelas tanding
	$sqlkelastanding = "SELECT * FROM kelastanding ORDER BY nm_kelastanding ASC;";
	$carikelas = mysqli_query($koneksi, $sqlkelastanding);

	//Mulai Autocomplete Cari asal kontingen
	$sqlkontingen = "SELECT DISTINCT(kontingen) FROM peserta";
	$kueri = mysqli_query($koneksi, $sqlkontingen);
	while($data = mysqli_fetch_array($kueri)) {
		$arrAsalKontingen[] = $data[0];
	}
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registrasi Pencak Silat</title>
<!-- CSS Files -->
    <link href="css/reset.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/stylesheet.css" rel="stylesheet" type="text/css" media="all" />
	
</head>
<body>
<!-- Start Wrapper -->
<div id="wrapper">
  <?php 
	include "headmenu.php";

	if($kategori_tanding == 'Tanding') {
		include "form_tanding.php";
	} elseif($kategori_tanding == 'Tunggal') {
		include "form_tunggal.php";
	} elseif($kategori_tanding == 'Ganda') {
		include "form_ganda.php";
	} else {
		include "form_regu.php";
	}
	
  ?>



<!-- start: footer -->
<div id="footer">
	<p>Copyleft 2016 <?php echo " - ".date("Y"); ?> <a href="developer.php">IPSI Kabupaten Tangerang</a> </p>
	<!-- end: footer -->
</div>
<!-- end: footer -->
</div>
  </body>
</html>