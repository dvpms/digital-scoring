<?php 
	include "../backend/includes/connection.php";
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
<center><h2>MONITORING PENILAIAN WASJUR</h2>
<h2>KATEGORI TUNGGAL</h2></center>
<!-- * Unsur nilai (KEBENARAN) = 100 - (penjumlahan field jurus1 s.d. jurus14) FROM TABLE nilai_tunggal WHERE id_jadwal=id_partai(table jadwal_tgr) AND id_juri=1/2/3/4/5<br>
* Unsur nilai (KEMANTAPAN) = field kemantapan FROM TABLE nilai_tunggal WHERE id_jadwal=id_partai(table jadwal_tgr) AND id_juri=1/2/3/4/5 <br>
* HUKUMAN = penjumlahan field hukum_1 s.d hukum_5 FROM TABLE nilai_tunggal WHERE id_jadwal=id_partai(table jadwal_tgr) AND id_juri=1/2/3/4/5<br>
* NILAI/JURI = (KEBENARAN) + (KEMANTAPAN) - (HUKUMAN) pada masing" juri <br>
* TOTAL NILAI = (penjumlahan NILAI JURI 1 s.d. 5) - (NILAI JURI TERKECIL) - (NILAI JURI TERBESAR) -->

<div id="jadwaltunggal" class="table-responsive">
<table class="table table-bordered">
	<tr class="text-center" bgcolor="#FFFF00">
		<td rowspan="2">NO UNDIAN</td>
		<td rowspan="2">GOLONGAN</td>
		<td rowspan="2">NAMA PESILAT</td>
		<td rowspan="2">KONTINGEN</td>
		<td colspan="2">UNSUR NILAI</td>
		<td rowspan="2">HUKUMAN</td>
		<td rowspan="2">NILAI /JURI</td>
		<td rowspan="2"> TOTAL NILAI</td>
	</tr>
	<tr class="text-center" bgcolor="#FFFF00">
		<td>KEBENARAN</td>
		<td>KEMANTAPAN</td>
	</tr>
	<?php 
	 $no = 0;

	 //Mencari data jadwal pertandingan TUNGGAL
	$sqljadwal = "SELECT * FROM jadwal_tgr
					WHERE kategori='Tunggal'
					ORDER BY id_partai,golongan ASC";
	$jadwal_tunggal = mysqli_query($koneksi, $sqljadwal);
	
	?>
	<?php while ($jadwal = mysqli_fetch_array($jadwal_tunggal)) { ?>
	<tr class="text-center">
		<td ><?php echo $jadwal['noundian']; ?></td>
		<td><?php echo $jadwal['golongan']; ?></td>
		<td><?php echo $jadwal['nama']; ?></td>
		<td><?php echo $jadwal['kontingen']; ?></td>
		<td>
		<?php
			$sql = "SELECT * FROM wasit_juri";

			$exec = mysqli_query($koneksi, $sql);

			$array_nilai = [];

			while ($juri = mysqli_fetch_array($exec)) {


				$kebenaran = mysqli_query($koneksi, "SELECT * FROM nilai_tunggal WHERE id_juri=". $juri['id_juri'] ." AND id_jadwal=". $jadwal['id_partai']);
				$row = mysqli_fetch_row($kebenaran);
				$kebenaran = ($row[3]+$row[4]+$row[5]+$row[6]+$row[7]+$row[8]+$row[9]+$row[10]+$row[11]+$row[12]+$row[13]+$row[14]+$row[15]+$row[16]);
				if($kebenaran != 0 )
				{
					$kebenaran = 100 - ( - $kebenaran); 
				}
				
				$array_nilai[$juri['id_juri']]['kebenaran'] = $kebenaran;
		?>
			<?=$juri[1]?>  : <?=empty($kebenaran) ? 0 : $kebenaran?><br />
		<?php } ?>
		</td>
		<td>
			<?php
			$sql = "SELECT * FROM wasit_juri";

			$exec = mysqli_query($koneksi, $sql);

			while ($juri = mysqli_fetch_array($exec)) {
				$kemantapan = mysqli_query($koneksi, "SELECT kemantapan FROM nilai_tunggal WHERE id_juri=". $juri['id_juri'] ." AND id_jadwal=". $jadwal['id_partai']);
				$row = mysqli_fetch_row($kemantapan);
				$kemantapan = $row[0];

				$array_nilai[$juri['id_juri']]['kemantapan'] = $kemantapan;
		?>
			<?=$juri[1]?>  : <?=empty($kemantapan) ? 0 : $kemantapan?><br />
		<?php } ?>
		</td>
		<td>
			<?php
			$sql = "SELECT * FROM wasit_juri";

			$exec = mysqli_query($koneksi, $sql);

			while ($juri = mysqli_fetch_array($exec)) {

				$hukuman = mysqli_query($koneksi, "SELECT hukum_1,hukum_2,hukum_3,hukum_4,hukum_5 FROM nilai_tunggal WHERE id_juri=". $juri['id_juri'] ." AND id_jadwal=". $jadwal['id_partai']);
				$row = mysqli_fetch_row($hukuman);
				$hukuman = $row[0] + $row[1] + $row[2] + $row[3] + $row[4];
				$array_nilai[$juri['id_juri']]['hukuman'] = $hukuman;
		?>
			<?=$juri[1]?>  : <?=empty($hukuman) ? 0 : $hukuman?><br />
		<?php } ?>
		</td>
		<td>
			<?php
			$sql = "SELECT * FROM wasit_juri";

			$exec = mysqli_query($koneksi, $sql);
			
			$tempNilai = [];
			$totalNilai = 0;

			while ($juri = mysqli_fetch_array($exec)) {


				if(isset($array_nilai[$juri['id_juri']]['kebenaran']))
				{
					$nilai = ($array_nilai[$juri['id_juri']]['kebenaran'] + $array_nilai[$juri['id_juri']]['kemantapan']) - ( - $array_nilai[$juri['id_juri']]['hukuman'] );
					$tempNilai[] = $nilai;
					$totalNilai += $nilai;
				}
				else
				{
					$nilai = 0;
				}
		?>
			<?=$juri[1]?>  : <?=$nilai?><br />
		<?php } ?>
		</td>
		<td>
			<?=$totalNilai - ((min($tempNilai) + max($tempNilai)))?>
			<br>MIN : <?=min($tempNilai)?>
			<br>MAX : <?=max($tempNilai)?>
		</td>
	</tr>
	<?php $no++; } ?>
</table>
</div>
<div class="table-responsive">
	<table class="table">
		<tr>
			<td class="text-left">
				<a href="index.php" class="btn btn-warning" role="button">KEMBALI</a>
			</td>
		</tr>
	</table>

	<script type="text/javascript">
	
	setInterval(function(){
		$.ajax({
            url: 'http://localhost/skordigital/juritgr/api.php', 
            data : {'a' : 'get_data_view_tunggal'},
            type: "GET",
            success: function(obj){
            	$('#jadwaltunggal').html(obj);

            	console.log('Request ... Done');
            }
        });
	}, 2000);

</script>
</div>
</div>
</body>
</html>