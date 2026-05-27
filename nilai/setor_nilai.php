<?php
	include "../backend/includes/connection.php";

	$pemenang = mysqli_real_escape_string($koneksi, $_POST["pemenang"]);
	$id_partai = mysqli_real_escape_string($koneksi, $_POST["id_partai"]);
	
	$skorakhirmerah = mysqli_real_escape_string($koneksi, $_POST["skorakhirmerah"]);
	$skorakhirbiru = mysqli_real_escape_string($koneksi, $_POST["skorakhirbiru"]);
	$skorakhir = "( ".$skorakhirmerah."-".$skorakhirbiru." )";
	

	if($pemenang == '' OR $id_partai == '')
	{
		?>
		<script type="text/javascript">
			alert('Gagal!');
			document.location='index.php';
		</script>
		<?php
		exit; 
	}
	
	$update = mysqli_query($koneksi,"UPDATE jadwal_tanding SET status='$skorakhir', pemenang='$pemenang' WHERE id_partai='$id_partai'");

	?>
		<script type="text/javascript">
			alert('Nilai berhasil tersimpan.');
			document.location='index.php';
		</script>
	<?php
?>