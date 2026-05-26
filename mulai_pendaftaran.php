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
	
</head>
<body>
<!-- Start Wrapper -->
<div id="wrapper">
  <?php 
	include "headmenu.php";
  ?>

<div align="center">
	<form name="InputAwal" id="InputAwal" method="POST" action="pendaftaran.php">
	<table border="0">
	<tr>
		<td>Kategori</td>
		<td>:
			<select name="kategori_tanding" id="kategori_tanding">
				<option value="Tanding">Tanding</option>
				<option value="Tunggal">Tunggal</option>
				<option value="Ganda">Ganda</option>
				<option value="Regu">Regu</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>Golongan</td>
		<td>:
		<select name="golongan" id="golongan">
			<option value="Usia Dini">Usia Dini</option>
			<option value="Pra Remaja">Pra Remaja</option>
			<option value="Remaja">Remaja</option>
			<option value="Dewasa">Dewasa</option>
		</select>
		</td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" name="daftar" value="LANJUT"></td>
	</tr>
	</table>
	</form>
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