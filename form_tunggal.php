<h1>FORMULIR PENDAFTARAN - <?php echo "Kategori: ".$kategori_tanding." - Golongan: ".$golongan; ?></h1>
<div align="center">
	<form name="InputPeserta" id="InputPeserta" method="POST" enctype="multipart/form-data" action="do_pendaftaran_tunggal.php">
	<table border="0">
	<tr>
		<td>Foto Peserta</td>
		<td>: <input type="file" id="fotopeserta" name="fotopeserta"> File Gambar/Foto. Max size: 500 KB</td>
	</tr>
	<tr>
		<td>Nama Lengkap</td>
		<td>: <input type="text" name="nama" id="nama" maxlength="35"></td>
		<input type="hidden" name="kategori_tanding" id="kategori_tanding" value="<?php echo $kategori_tanding; ?>">
		<input type="hidden" name="golongan" id="golongan" value="<?php echo $golongan; ?>">
	<tr>
		<td>Jenis Kelamin</td>
		<td>: 
			<select name="jenis_kelamin" id="jenis_kelamin">
			<option value="Laki-laki">Laki-laki</option>
			<option value="Perempuan">Perempuan</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>Tempat Lahir</td>
		<td>: <input type="text" name="tpt_lahir" id="tpt_lahir"></td>
	</tr>
	<tr>
		<td>Tanggal Lahir</td>
		<td>: <input type="text" name="tgl_lahir" id="tgl_lahir" value="<?php echo $today; ?>">format (YYYY-MM-DD)</td>
	</tr>
	<tr>
		<td>Tinggi Badan</td>
		<td>: <input type="text" name="tb" id="tb"> cm</td>
	</tr>
	<tr>
		<td>Berat Badan</td>
		<td>: <input type="text" name="bb" id="bb"> kg</td>
	</tr>
	<?php
		if($golongan == 'Dewasa') {
			echo "<input type=hidden name=asal_sekolah id=asal_sekolah value=>";
			echo "<input type=hidden name=kelas id=kelas value=>";
			echo "<tr><td>Foto/Scan KTP</td><td>: <input type=file id='ktppeserta' name='ktppeserta'> File Gambar/Foto. Max size: 500 KB</td></tr>";
		} else {
			include "asal_sekolah_tanding.php";
		}
	?>
	<tr>
		<td>Kontingen</td>
		<td>: <input type="text" name="kontingen" id="kontingen"></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" name="daftar" value="DAFTAR"></td>
	</tr>
	</table>
	</form>
</div>
	<script>
      var arrAsalKontingen = <?php echo json_encode($arrAsalKontingen); ?>;
      $(document).ready(function() { 
        $("#kontingen").autocomplete({
          source: arrAsalKontingen
        });
      });
  	</script>