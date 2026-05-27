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

	//Mulai Multiple Autocomplete Cari nama peeserta
	$sql = "SELECT nm_lengkap FROM peserta ORDER BY nm_lengkap ASC ";
	$kueri = mysqli_query($koneksi, $sql);
	while($data = mysqli_fetch_array($kueri)) {
		$arrPesilatTanding[] = $data[0];
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

    <script>
	$( function() {
		var availableTags = <?php echo json_encode($arrPesilatTanding); ?>;
		function split( val ) {
			return val.split( /,\s*/ );
		}
		function extractLast( term ) {
			return split( term ).pop();
		}

		$( "#catatan" )
			// don't navigate away from the field on tab when selecting an item
			.on( "keydown", function( event ) {
				if ( event.keyCode === $.ui.keyCode.TAB &&
						$( this ).autocomplete( "instance" ).menu.active ) {
					event.preventDefault();
				}
			})
			.autocomplete({
				minLength: 0,
				source: function( request, response ) {
					// delegate back to autocomplete, but extract the last term
					response( $.ui.autocomplete.filter(
						availableTags, extractLast( request.term ) ) );
				},
				focus: function() {
					// prevent value inserted on focus
					return false;
				},
				select: function( event, ui ) {
					var terms = split( this.value );
					// remove the current input
					terms.pop();
					// add the selected item
					terms.push( ui.item.value );
					// add placeholder to get the comma-and-space at the end
					terms.push( "" );
					this.value = terms.join( ", " );
					return false;
				}
			});
	} );
	</script>
	
</head>
<body>
<!-- Start Wrapper -->
<div id="wrapper">
  <?php 
	include "headmenu.php";
  ?>

<p>
	Setelah melakukan proses pendaftaran, langkah selanjutnya adalah melunasi biaya pendaftaran sejumlah peserta yang telah didaftarkan sebelumnya (Rp. XXX.XXX,-/peserta). Pembayaran dapat ditransfer melalui nomor- nomor rekening dibawah ini :
</p>
</br>
<ul>
	<li>0808 0883 26542 - Bank ABC - A/N NAMA 1</li>
	<li>0809 7898 09981 - Bank ACC - A/N NAMA 2</li>
</ul>
</br>
<p>Setelah melakukan transfer, selanjutnya ialah melakukan konfirmasi melalui formulir dibawah ini.</p>
<p> Peserta yang didaftarkan pada sistem ini <strong>TETAPI tidak dikonfirmasi biaya pendaftarannya</strong> secara otomatis akan dicoret dari keikutsertaan kejuaraan. </p>
<p>Mengalami kesulitan ? Akses menu <A HREF="bantuan.php">Bantuan.</A></p>

</br></br>


<h1>FORMULIR KONFIRMASI PEMBAYARAN</h1>
<div align="center">
	<form name="konfirmasi" id="konfirmasi" method="POST" enctype="multipart/form-data" action="do_konfirmasi.php">
	<table border="0">
	<tr>
		<td>Bank Tujuan</td>
		<td>
			<select name="banktujuan" id="banktujuan">
				<option value="">--- Pilih Bank Tujuan ---</option>
				<option value="0808 0883 26542 - Bank ABC - A/N Satria Salam">0808 0883 26542 - Bank ABC - A/N Nama 1</option>
				<option value="0809 7898 09981 - Bank ACC - A/N Sofyan Hadi">0809 7898 09981 - Bank ACC - A/N Nama 2</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>Bank Pengirim</td>
		<td><input type="text" name="bankpengirim" id="bankpengirim" maxlength="100" placeholder="Misalnya: Bank BCA/ MANDIRI"></td>
	</tr>
	<tr>
		<td>Nomor Rekening Pengirim</td>
		<td><input type="text" name="norekening" id="norekening" maxlength="35"></td>
	</tr>
	<tr>
		<td>Nama Pengirim</td>
		<td><input type="text" name="nama" id="nama" maxlength="35">
		<input type="text" name="kontak" id="kontak" maxlength="35" value="No. HP">
		</td>
	</tr>
	<tr>
		<td>Tanggal Transfer</td>
		<td><input type="text" name="tgltransfer" id="tgltransfer" maxlength="35"></td>
	</tr>
	<tr>
		<td>Jumlah Transfer</td>
		<td><input type="text" name="jumlah" id="jumlah" maxlength="35"></td>
	</tr>
	<tr>
		<td>Upload bukti pembayaran</td>
		<td><input type="file" id="buktipembayaran" name="buktipembayaran"> File Gambar/Foto. Max size: 1 MB</td>
	</tr>
	<tr>
		<td>CATATAN</td>
		<td><textarea name="catatan" id="catatan" cols="50" rows="5" placeholder="Masukkan Nama-nama peserta yang dibayarkan..."></textarea></td>
	</tr>
	<tr>
      <td>Kode Verifikasi</td>
      <td>
      	<input name="vercode" type="text" id="vercode" size="9" maxlength="5" />
      	</BR><img src="capcay.php"/>
      </td>
    </tr>
	<tr>
		<td colspan="2"><input type="submit" name="konfirmasi" value="KIRIM"></td>
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