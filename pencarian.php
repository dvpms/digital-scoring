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
	//cari data perguruan
	$sqlperguruan = "SELECT * FROM perguruan ORDER BY nm_perguruan ASC;";
	$cariperguruan = mysqli_query($koneksi, $sqlperguruan);
	$cariperguruan2 = mysqli_query($koneksi, $sqlperguruan);

	//Mulai Autocomplete Cari asal kontingen
	$sql = "SELECT DISTINCT(kontingen) FROM peserta";
	$kueri = mysqli_query($koneksi, $sql);
	while($data = mysqli_fetch_array($kueri)) {
		$arrAsalKontingen[] = $data[0];
	}
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registrasi Pencak Silat</title>
<meta name="description" content="Registrasi Online Kejuaraan Pencak Silat">
<meta name="keywords" content="registrasi,online,pencak,silat">
<meta name="robots" content="index,follow">
<meta name="author" content="Yudha Yogasara">
<!-- CSS Files -->
    <link href="css/reset.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/stylesheet.css" rel="stylesheet" type="text/css" media="all" />
    <script src="js/jquery-1.12.4.js"></script>
	<script src="js/jquery-ui.js"></script>
	
</head>
<body>
<!-- Start Wrapper -->
<div id="wrapper">
  <?php 
	include "headmenu.php";
  ?>

<h1>Pencarian Data Peserta - Tanding</h1>
<div>
	<form name="CariPeserta" id="CariPeserta" method="POST" action="do_pencarian.php">
	<table border="0">
	<tr>
		<td>Nama Peserta : <input type="text" name="nama" id="nama" maxlength="35" placeholder="Input nama perserta / kosongkan"></td>
		<td>Kontingen : <input type="text" name="kontingen" id="kontingen" placeholder="Input Kontingen / kosongkan"></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" name="cari" value="CARI"></td>
	</tr>
	</table>
	</form>
	<script>
      var arrAsalKontingen = <?php echo json_encode($arrAsalKontingen); ?>;
      $(document).ready(function() { 
        $("#kontingen").autocomplete({
          source: arrAsalKontingen
        });
      });
  	</script>
</div>

<h1>Pencarian Data Peserta - TGR</h1>
<div>
	<form name="CariPeserta" id="CariPeserta" method="POST" action="do_pencarian_tgr.php">
	<table border="0">
	<tr>
		<td>Nama Peserta : <input type="text" name="nama" id="nama" maxlength="35" placeholder="Input nama perserta / kosongkan"></td>
		<td>Kontingen : <input type="text" name="kontingen2" id="kontingen2" placeholder="Input Kontingen / kosongkan"></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" name="cari" value="CARI"></td>
	</tr>
	</table>
	</form>
	<script>
      var arrAsalKontingen = <?php echo json_encode($arrAsalKontingen); ?>;
      $(document).ready(function() { 
        $("#kontingen2").autocomplete({
          source: arrAsalKontingen
        });
      });
  </script>
</div>

<!-- start: footer -->
<div id="footer">
	<p>Copyleft 2016 <?php echo " - ".date("Y"); ?> <a href="developer.php">IPSI Kabupaten Tangerang</a> </p>
	<!-- end: footer -->
</div>
<!-- end: footer -->
</div>
  </body>
</html>