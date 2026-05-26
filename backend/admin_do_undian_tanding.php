<?php
session_start();
  if(!isset($_SESSION['pwd']))
  {
    header('location:login.php');
  }
include('includes/connection.php');

//Ambil variabel
$golongan = mysqli_real_escape_string($koneksi, $_POST["golongan"]);
$jenis_kelamin = mysqli_real_escape_string($koneksi, $_POST["jenis_kelamin"]);
$kelas_tanding = mysqli_real_escape_string($koneksi, $_POST["kelas_tanding"]);

//Tidur dulu ah 5 detik
sleep(5);

//CEK APABILA VARIABEL KOSONG = DITOLAK
if($golongan == '' OR $jenis_kelamin == '' OR $kelas_tanding == '') {
		?>
		<script type="text/javascript">
			alert('GAGAL. Filter Data Tidak Lengkap!');
			document.location='admin_undian_tanding.php';
		</script>
		<?php
		exit;
	}

//PERIKSA DATA PESERTA SUDAH DIUNDI ATAU BELUM PADA TABEL UNDIAN
	$sqlcaripeserta = "SELECT * FROM undian
						INNER JOIN peserta ON undian.id_peserta=peserta.ID_peserta
						WHERE golongan = '$golongan' 
						AND jenis_kelamin = '$jenis_kelamin'
						AND kelas_tanding_FK = '$kelas_tanding'";
	$caripeserta = mysqli_query($koneksi,$sqlcaripeserta);
	
	while($peserta = mysqli_fetch_array($caripeserta)) {
		if ($peserta['id_peserta'] == $peserta['ID_peserta']) {
				?>
				<script type="text/javascript">
					alert('GAGAL. Ditemukan data peserta sudah pernah diundi.');
					document.location='admin_undian_tanding.php';
				</script>
				<?php
				exit;
			}
	}

// ***************************************** //
	//hitung jumlah peserta kelas
	$sqlcountputraA = "SELECT * FROM peserta 
					WHERE golongan = '$golongan' 
					AND jenis_kelamin = '$jenis_kelamin'
					AND kelas_tanding_FK = '$kelas_tanding' 
					AND status = 'PAID' ";
	$countputraA = mysqli_query($koneksi,$sqlcountputraA);
	$jumlahputraA = mysqli_num_rows($countputraA);	
	
	//BLOCK JIKA PESERTA PADA KELOMPOK TIDAK DITEMUKAN
	if ($jumlahputraA == 0) {
				?>
				<script type="text/javascript">
					alert('GAGAL. Peserta tidak ditemukan pada kelompok tersebut.');
					document.location='admin_undian_tanding.php';
				</script>
				<?php
				exit;
	}

	//mulai mengundi (shuffle)
	$numbersputraA = range(1, $jumlahputraA);
	shuffle($numbersputraA);
	
	
	//cari data peserta kelas & INSERT NO UNDIAN KE TABEL UNDIAN
	$sqlpesertaAputra = "SELECT * FROM peserta
						WHERE golongan = '$golongan' 
						AND jenis_kelamin = '$jenis_kelamin'
						AND kelas_tanding_FK = '$kelas_tanding'
						AND status = 'PAID'
						ORDER BY ID_peserta ASC";
	$pesertaAputra = mysqli_query($koneksi,$sqlpesertaAputra);
	$arundian = 0; 
	
	while($undianAputra = mysqli_fetch_array($pesertaAputra)) {
		//echo $arundian;
		//echo $undianAputra['id_peserta'];
		//MULAI INSERT DATA UNDIAN UNTUK SETIAP PESERTA
		$insertundian = mysqli_query($koneksi,"INSERT INTO undian(ID_peserta,no_undian)
						VALUES('$undianAputra[ID_peserta]','$numbersputraA[$arundian]')");
		$arundian++;
	}
	// UNDIAN BERAKHIR SAMPAI DISINI
	// ############################################### //
?>
	<script type="text/javascript">
		alert('Data peserta berhasil diundi.');
		document.location='admin_undian_tanding.php';
	</script>