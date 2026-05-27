<?php
	include "../backend/includes/connection.php";

	//dapatkan ID jadwal pertandingan
	//$id_partai = mysqli_real_escape_string($koneksi, $_GET["id_partai"]);
	$id_partai = (int) $_GET['id_partai'];
	//echo $id_partai;

	//Mencari data jadwal pertandingan
	$sqljadwal = "SELECT * FROM jadwal_tanding 
					WHERE id_partai='$id_partai'";
	$jadwal_tanding = mysqli_query($koneksi,$sqljadwal);
	$jadwal = mysqli_fetch_array($jadwal_tanding);

?>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="noindex">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
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
			<tr class="text-center" style="font-weight: bold;">
				<td colspan="10">GELANGGANG : <?php echo $jadwal['gelanggang']; ?></td>
			</tr>
			<tr class="text-center" style="font-weight: bold;">
				<td colspan="10">
					PARTAI KE : <?php echo $jadwal['partai']; ?> - 
					<?php echo $jadwal['babak']; ?> -
					<?php echo $jadwal['kelas']; ?>
				</td>
			</tr>
		</table>

		<table class="table table-bordered">
			<tr class="text-center" style="font-weight: bold; color: white;">
				<td colspan="5" bgcolor="#ff4d4d" width="50%"><?php echo $jadwal['nm_merah']; ?></td>
				<td colspan="5" bgcolor="#4d94ff" width="50%"><?php echo $jadwal['nm_biru']; ?></td>
			</tr>
			<tr class="text-center" style="font-weight: bold;">
				<td colspan="5" width="50%"><?php echo $jadwal['kontingen_merah']; ?></td>
				<td colspan="5" width="50%"><?php echo $jadwal['kontingen_biru']; ?></td>
			</tr>
		</table>

		<div id="content_babak">
			<table class="table table-bordered">
				<tr class="text-center" style="font-weight: bold;" bgcolor="#e6e6e6">
					<td colspan="10">BABAK 1</td>
				</tr>
				<tr class="text-center" style="font-weight: bold;">
					<td colspan="2">JURI 1</td>
					<td colspan="2" bgcolor="#e6e6e6">JURI 2</td>
					<td colspan="2">JURI 3</td>
					<td colspan="2" bgcolor="#e6e6e6">JURI 4</td>
					<td colspan="2">JURI 5</td>
				</tr>
				<tr class="text-center">
					<td bgcolor="#ff4d4d">M</td>
					<td bgcolor="#4d94ff">B</td>
					<td bgcolor="#ff4d4d">M</td>
					<td bgcolor="#4d94ff">B</td>
					<td bgcolor="#ff4d4d">M</td>
					<td bgcolor="#4d94ff">B</td>
					<td bgcolor="#ff4d4d">M</td>
					<td bgcolor="#4d94ff">B</td>
					<td bgcolor="#ff4d4d">M</td>
					<td bgcolor="#4d94ff">B</td>
				</tr>
				<tr class="text-center">
					<td>
						<table style="width: 100%;">
							<?php
								$sqljadwal = "SELECT id_nilai,id_jadwal,button FROM nilai_tanding WHERE id_jadwal=$id_partai AND babak=1 AND id_juri=1 AND sudut='merah' ORDER BY id_nilai DESC";
								$jadwal_tanding = mysqli_query($koneksi,$sqljadwal);
								while($item = mysqli_fetch_array($jadwal_tanding)):
							?>
								<tr>
									<th class="text-center"><?=$item['button']?></th>
								</tr>
							<?php endwhile;?>
						</table>
					</td>
					<td>
						<table style="width: 100%;">
							<?php 
								$sqljadwal = "SELECT id_nilai,id_jadwal,button FROM nilai_tanding WHERE id_jadwal=$id_partai AND babak=1 AND id_juri=1 AND sudut='biru' ORDER BY id_nilai DESC";
								$jadwal_tanding = mysqli_query($koneksi,$sqljadwal);
								while($item = mysqli_fetch_array($jadwal_tanding)):
							?>
								<tr>
									<th class="text-center"><?=$item['button']?></th>
								</tr>
							<?php endwhile;?>
						</table>
					</td>

					<td>
						<table style="width: 100%;">
							<?php 
								$sqljadwal = "SELECT id_nilai,id_jadwal,button FROM nilai_tanding WHERE id_jadwal=$id_partai AND babak=1 AND id_juri=2 AND sudut='merah' ORDER BY id_nilai DESC";
								$jadwal_tanding = mysqli_query($koneksi,$sqljadwal);
								while($item = mysqli_fetch_array($jadwal_tanding)):
							?>
								<tr>
									<th class="text-center"><?=$item['button']?></th>
								</tr>
							<?php endwhile;?>
						</table>
					</td>
					<td>
						<table style="width: 100%;">
							<?php 
								$sqljadwal = "SELECT id_nilai,id_jadwal,button FROM nilai_tanding WHERE id_jadwal=$id_partai AND babak=1 AND id_juri=2 AND sudut='biru' ORDER BY id_nilai DESC";
								$jadwal_tanding = mysqli_query($koneksi,$sqljadwal);
								while($item = mysqli_fetch_array($jadwal_tanding)):
							?>
								<tr>
									<th class="text-center"><?=$item['button']?></th>
								</tr>
							<?php endwhile;?>
						</table>
					</td>
					
					<td>
						<table style="width: 100%;">
							<?php 
								$sqljadwal = "SELECT id_nilai,id_jadwal,button FROM nilai_tanding WHERE id_jadwal=$id_partai AND babak=1 AND id_juri=3 AND sudut='merah' ORDER BY id_nilai DESC";
								$jadwal_tanding = mysqli_query($koneksi,$sqljadwal);
								while($item = mysqli_fetch_array($jadwal_tanding)):
							?>
								<tr>
									<th class="text-center"><?=$item['button']?></th>
								</tr>
							<?php endwhile;?>
						</table>
					</td>
					<td>
						<table style="width: 100%;">
							<?php 
								$sqljadwal = "SELECT id_nilai,id_jadwal,button FROM nilai_tanding WHERE id_jadwal=$id_partai AND babak=1 AND id_juri=3 AND sudut='biru' ORDER BY id_nilai DESC";
								$jadwal_tanding = mysqli_query($koneksi,$sqljadwal);
								while($item = mysqli_fetch_array($jadwal_tanding)):
							?>
								<tr>
									<th class="text-center"><?=$item['button']?></th>
								</tr>
							<?php endwhile;?>
						</table>
					</td>

					<td>
						<table style="width: 100%;">
							<?php 
								$sqljadwal = "SELECT id_nilai,id_jadwal,button FROM nilai_tanding WHERE id_jadwal=$id_partai AND babak=1 AND id_juri=4 AND sudut='merah' ORDER BY id_nilai DESC";
								$jadwal_tanding = mysqli_query($koneksi,$sqljadwal);
								while($item = mysqli_fetch_array($jadwal_tanding)):
							?>
								<tr>
									<th class="text-center"><?=$item['button']?></th>
								</tr>
							<?php endwhile;?>
						</table>
					</td>
					<td>
						<table style="width: 100%;">
							<?php 
								$sqljadwal = "SELECT id_nilai,id_jadwal,button FROM nilai_tanding WHERE id_jadwal=$id_partai AND babak=1 AND id_juri=4 AND sudut='biru' ORDER BY id_nilai DESC";
								$jadwal_tanding = mysqli_query($koneksi,$sqljadwal);
								while($item = mysqli_fetch_array($jadwal_tanding)):
							?>
								<tr>
									<th class="text-center"><?=$item['button']?></th>
								</tr>
							<?php endwhile;?>
						</table>
					</td>

					<td>
						<table style="width: 100%;">
							<?php 
								$sqljadwal = "SELECT id_nilai,id_jadwal,button FROM nilai_tanding WHERE id_jadwal=$id_partai AND babak=1 AND id_juri=5 AND sudut='merah' ORDER BY id_nilai DESC";
								$jadwal_tanding = mysqli_query($koneksi,$sqljadwal);
								while($item = mysqli_fetch_array($jadwal_tanding)):
							?>
								<tr>
									<th class="text-center"><?=$item['button']?></th>
								</tr>
							<?php endwhile;?>
						</table>
					</td>
					<td>
						<table style="width: 100%;">
							<?php 
								$sqljadwal = "SELECT id_nilai,id_jadwal,button FROM nilai_tanding WHERE id_jadwal=$id_partai AND babak=1 AND id_juri=5 AND sudut='biru' ORDER BY id_nilai DESC";
								$jadwal_tanding = mysqli_query($koneksi,$sqljadwal);
								while($item = mysqli_fetch_array($jadwal_tanding)):
							?>
								<tr>
									<th class="text-center"><?=$item['button']?></th>
								</tr>
							<?php endwhile;?>
						</table>
					</td>

				</tr>
			</table>

			<table class="table table-bordered">
				<tr class="text-center" style="font-weight: bold;" bgcolor="#FFFF00">
					<td colspan="10" bgcolor="#e6e6e6">BABAK 2</td>
				</tr>
				<tr class="text-center" style="font-weight: bold;">
					<td colspan="2">JURI 1</td>
					<td colspan="2" bgcolor="#e6e6e6">JURI 2</td>
					<td colspan="2">JURI 3</td>
					<td colspan="2" bgcolor="#e6e6e6">JURI 4</td>
					<td colspan="2">JURI 5</td>
				</tr>
				<tr class="text-center">
					<td bgcolor="#ff4d4d">M</td>
					<td bgcolor="#4d94ff">B</td>
					<td bgcolor="#ff4d4d">M</td>
					<td bgcolor="#4d94ff">B</td>
					<td bgcolor="#ff4d4d">M</td>
					<td bgcolor="#4d94ff">B</td>
					<td bgcolor="#ff4d4d">M</td>
					<td bgcolor="#4d94ff">B</td>
					<td bgcolor="#ff4d4d">M</td>
					<td bgcolor="#4d94ff">B</td>
				</tr>
				<tr class="text-center">
					
					<td>
						<table style="width: 100%;">
							<?php 
								$sqljadwal = "SELECT id_nilai,id_jadwal,button FROM nilai_tanding WHERE id_jadwal=$id_partai AND babak=2 AND id_juri=1 AND sudut='merah' ORDER BY id_nilai DESC";
								$jadwal_tanding = mysqli_query($koneksi,$sqljadwal);
								while($item = mysqli_fetch_array($jadwal_tanding)):
							?>
								<tr>
									<th class="text-center"><?=$item['button']?></th>
								</tr>
							<?php endwhile;?>
						</table>
					</td>
					<td>
						<table style="width: 100%;">
							<?php 
								$sqljadwal = "SELECT id_nilai,id_jadwal,button FROM nilai_tanding WHERE id_jadwal=$id_partai AND babak=2 AND id_juri=1 AND sudut='biru' ORDER BY id_nilai DESC";
								$jadwal_tanding = mysqli_query($koneksi,$sqljadwal);
								while($item = mysqli_fetch_array($jadwal_tanding)):
							?>
								<tr>
									<th class="text-center"><?=$item['button']?></th>
								</tr>
							<?php endwhile;?>
						</table>
					</td>

					<td>
						<table style="width: 100%;">
							<?php 
								$sqljadwal = "SELECT id_nilai,id_jadwal,button FROM nilai_tanding WHERE id_jadwal=$id_partai AND babak=2 AND id_juri=2 AND sudut='merah' ORDER BY id_nilai DESC";
								$jadwal_tanding = mysqli_query($koneksi,$sqljadwal);
								while($item = mysqli_fetch_array($jadwal_tanding)):
							?>
								<tr>
									<th class="text-center"><?=$item['button']?></th>
								</tr>
							<?php endwhile;?>
						</table>
					</td>
					<td>
						<table style="width: 100%;">
							<?php 
								$sqljadwal = "SELECT id_nilai,id_jadwal,button FROM nilai_tanding WHERE id_jadwal=$id_partai AND babak=2 AND id_juri=2 AND sudut='biru' ORDER BY id_nilai DESC";
								$jadwal_tanding = mysqli_query($koneksi,$sqljadwal);
								while($item = mysqli_fetch_array($jadwal_tanding)):
							?>
								<tr>
									<th class="text-center"><?=$item['button']?></th>
								</tr>
							<?php endwhile;?>
						</table>
					</td>
					
					<td>
						<table style="width: 100%;">
							<?php 
								$sqljadwal = "SELECT id_nilai,id_jadwal,button FROM nilai_tanding WHERE id_jadwal=$id_partai AND babak=2 AND id_juri=3 AND sudut='merah' ORDER BY id_nilai DESC";
								$jadwal_tanding = mysqli_query($koneksi,$sqljadwal);
								while($item = mysqli_fetch_array($jadwal_tanding)):
							?>
								<tr>
									<th class="text-center"><?=$item['button']?></th>
								</tr>
							<?php endwhile;?>
						</table>
					</td>
					<td>
						<table style="width: 100%;">
							<?php 
								$sqljadwal = "SELECT id_nilai,id_jadwal,button FROM nilai_tanding WHERE id_jadwal=$id_partai AND babak=2 AND id_juri=3 AND sudut='biru' ORDER BY id_nilai DESC";
								$jadwal_tanding = mysqli_query($koneksi,$sqljadwal);
								while($item = mysqli_fetch_array($jadwal_tanding)):
							?>
								<tr>
									<th class="text-center"><?=$item['button']?></th>
								</tr>
							<?php endwhile;?>
						</table>
					</td>

					<td>
						<table style="width: 100%;">
							<?php 
								$sqljadwal = "SELECT id_nilai,id_jadwal,button FROM nilai_tanding WHERE id_jadwal=$id_partai AND babak=2 AND id_juri=4 AND sudut='merah' ORDER BY id_nilai DESC";
								$jadwal_tanding = mysqli_query($koneksi,$sqljadwal);
								while($item = mysqli_fetch_array($jadwal_tanding)):
							?>
								<tr>
									<th class="text-center"><?=$item['button']?></th>
								</tr>
							<?php endwhile;?>
						</table>
					</td>
					<td>
						<table style="width: 100%;">
							<?php 
								$sqljadwal = "SELECT id_nilai,id_jadwal,button FROM nilai_tanding WHERE id_jadwal=$id_partai AND babak=2 AND id_juri=4 AND sudut='biru' ORDER BY id_nilai DESC";
								$jadwal_tanding = mysqli_query($koneksi,$sqljadwal);
								while($item = mysqli_fetch_array($jadwal_tanding)):
							?>
								<tr>
									<th class="text-center"><?=$item['button']?></th>
								</tr>
							<?php endwhile;?>
						</table>
					</td>

					<td>
						<table style="width: 100%;">
							<?php 
								$sqljadwal = "SELECT id_nilai,id_jadwal,button FROM nilai_tanding WHERE id_jadwal=$id_partai AND babak=2 AND id_juri=5 AND sudut='merah' ORDER BY id_nilai DESC";
								$jadwal_tanding = mysqli_query($koneksi,$sqljadwal);
								while($item = mysqli_fetch_array($jadwal_tanding)):
							?>
								<tr>
									<th class="text-center"><?=$item['button']?></th>
								</tr>
							<?php endwhile;?>
						</table>
					</td>
					<td>
						<table style="width: 100%;">
							<?php 
								$sqljadwal = "SELECT id_nilai,id_jadwal,button FROM nilai_tanding WHERE id_jadwal=$id_partai AND babak=2 AND id_juri=5 AND sudut='biru' ORDER BY id_nilai DESC";
								$jadwal_tanding = mysqli_query($koneksi,$sqljadwal);
								while($item = mysqli_fetch_array($jadwal_tanding)):
							?>
								<tr>
									<th class="text-center"><?=$item['button']?></th>
								</tr>
							<?php endwhile;?>
						</table>
					</td>

				</tr>
			</table>

			<table class="table table-bordered">
				<tr class="text-center" style="font-weight: bold;" bgcolor="#e6e6e6">
					<td colspan="10"> BABAK 3</td>
				</tr>
				<tr class="text-center" style="font-weight: bold;">
					<td colspan="2">JURI 1</td>
					<td colspan="2" bgcolor="#e6e6e6">JURI 2</td>
					<td colspan="2">JURI 3</td>
					<td colspan="2" bgcolor="#e6e6e6">JURI 4</td>
					<td colspan="2">JURI 5</td>
				</tr>
				<tr class="text-center">
					<td bgcolor="#ff4d4d">M</td>
					<td bgcolor="#4d94ff">B</td>
					<td bgcolor="#ff4d4d">M</td>
					<td bgcolor="#4d94ff">B</td>
					<td bgcolor="#ff4d4d">M</td>
					<td bgcolor="#4d94ff">B</td>
					<td bgcolor="#ff4d4d">M</td>
					<td bgcolor="#4d94ff">B</td>
					<td bgcolor="#ff4d4d">M</td>
					<td bgcolor="#4d94ff">B</td>
				</tr>
				<tr class="text-center">
					<td>
						<table style="width: 100%;">
							<?php 
								$sqljadwal = "SELECT id_nilai,id_jadwal,button FROM nilai_tanding WHERE id_jadwal=$id_partai AND babak=3 AND id_juri=1 AND sudut='merah' ORDER BY id_nilai DESC";
								$jadwal_tanding = mysqli_query($koneksi,$sqljadwal);
								while($item = mysqli_fetch_array($jadwal_tanding)):
							?>
								<tr>
									<th class="text-center"><?=$item['button']?></th>
								</tr>
							<?php endwhile;?>
						</table>
					</td>
					<td>
						<table style="width: 100%;">
							<?php 
								$sqljadwal = "SELECT id_nilai,id_jadwal,button FROM nilai_tanding WHERE id_jadwal=$id_partai AND babak=3 AND id_juri=1 AND sudut='biru' ORDER BY id_nilai DESC";
								$jadwal_tanding = mysqli_query($koneksi,$sqljadwal);
								while($item = mysqli_fetch_array($jadwal_tanding)):
							?>
								<tr>
									<th class="text-center"><?=$item['button']?></th>
								</tr>
							<?php endwhile;?>
						</table>
					</td>

					<td>
						<table style="width: 100%;">
							<?php 
								$sqljadwal = "SELECT id_nilai,id_jadwal,button FROM nilai_tanding WHERE id_jadwal=$id_partai AND babak=3 AND id_juri=2 AND sudut='merah' ORDER BY id_nilai DESC";
								$jadwal_tanding = mysqli_query($koneksi,$sqljadwal);
								while($item = mysqli_fetch_array($jadwal_tanding)):
							?>
								<tr>
									<th class="text-center"><?=$item['button']?></th>
								</tr>
							<?php endwhile;?>
						</table>
					</td>
					<td>
						<table style="width: 100%;">
							<?php 
								$sqljadwal = "SELECT id_nilai,id_jadwal,button FROM nilai_tanding WHERE id_jadwal=$id_partai AND babak=3 AND id_juri=2 AND sudut='biru' ORDER BY id_nilai DESC";
								$jadwal_tanding = mysqli_query($koneksi,$sqljadwal);
								while($item = mysqli_fetch_array($jadwal_tanding)):
							?>
								<tr>
									<th class="text-center"><?=$item['button']?></th>
								</tr>
							<?php endwhile;?>
						</table>
					</td>
					
					<td>
						<table style="width: 100%;">
							<?php 
								$sqljadwal = "SELECT id_nilai,id_jadwal,button FROM nilai_tanding WHERE id_jadwal=$id_partai AND babak=3 AND id_juri=3 AND sudut='merah' ORDER BY id_nilai DESC";
								$jadwal_tanding = mysqli_query($koneksi,$sqljadwal);
								while($item = mysqli_fetch_array($jadwal_tanding)):
							?>
								<tr>
									<th class="text-center"><?=$item['button']?></th>
								</tr>
							<?php endwhile;?>
						</table>
					</td>
					<td>
						<table style="width: 100%;">
							<?php 
								$sqljadwal = "SELECT id_nilai,id_jadwal,button FROM nilai_tanding WHERE id_jadwal=$id_partai AND babak=3 AND id_juri=3 AND sudut='biru' ORDER BY id_nilai DESC";
								$jadwal_tanding = mysqli_query($koneksi,$sqljadwal);
								while($item = mysqli_fetch_array($jadwal_tanding)):
							?>
								<tr>
									<th class="text-center"><?=$item['button']?></th>
								</tr>
							<?php endwhile;?>
						</table>
					</td>

					<td>
						<table style="width: 100%;">
							<?php 
								$sqljadwal = "SELECT id_nilai,id_jadwal,button FROM nilai_tanding WHERE id_jadwal=$id_partai AND babak=3 AND id_juri=4 AND sudut='merah' ORDER BY id_nilai DESC";
								$jadwal_tanding = mysqli_query($koneksi,$sqljadwal);
								while($item = mysqli_fetch_array($jadwal_tanding)):
							?>
								<tr>
									<th class="text-center"><?=$item['button']?></th>
								</tr>
							<?php endwhile;?>
						</table>
					</td>
					<td>
						<table style="width: 100%;">
							<?php 
								$sqljadwal = "SELECT id_nilai,id_jadwal,button FROM nilai_tanding WHERE id_jadwal=$id_partai AND babak=3 AND id_juri=4 AND sudut='biru' ORDER BY id_nilai DESC";
								$jadwal_tanding = mysqli_query($koneksi,$sqljadwal);
								while($item = mysqli_fetch_array($jadwal_tanding)):
							?>
								<tr>
									<th class="text-center"><?=$item['button']?></th>
								</tr>
							<?php endwhile;?>
						</table>
					</td>

					<td>
						<table style="width: 100%;">
							<?php 
								$sqljadwal = "SELECT id_nilai,id_jadwal,button FROM nilai_tanding WHERE id_jadwal=$id_partai AND babak=3 AND id_juri=5 AND sudut='merah' ORDER BY id_nilai DESC";
								$jadwal_tanding = mysqli_query($koneksi,$sqljadwal);
								while($item = mysqli_fetch_array($jadwal_tanding)):
							?>
								<tr>
									<th class="text-center"><?=$item['button']?></th>
								</tr>
							<?php endwhile;?>
						</table>
					</td>
					<td>
						<table style="width: 100%;">
							<?php 
								$sqljadwal = "SELECT id_nilai,id_jadwal,button FROM nilai_tanding WHERE id_jadwal=$id_partai AND babak=3 AND id_juri=5 AND sudut='biru' ORDER BY id_nilai DESC";
								$jadwal_tanding = mysqli_query($koneksi,$sqljadwal);
								while($item = mysqli_fetch_array($jadwal_tanding)):
							?>
								<tr>
									<th class="text-center"><?=$item['button']?></th>
								</tr>
							<?php endwhile;?>
						</table>
					</td>
				</tr>
			</table>
		</div>
	</div>
</div>
<script type="text/javascript">
	
	setInterval(function(){
		$.ajax({
            url: 'http://localhost/skordigital/nilai/api.php', 
            data : {'a' : 'get_data_view_monitoring', 'id_partai': <?php echo $id_partai; ?>},
            type: "GET",
            success: function(obj){
            	$('#content_babak').html(obj);

            	console.log('Request ... Done');
            }
        });
	}, 2000);

</script>
</body>
</html>