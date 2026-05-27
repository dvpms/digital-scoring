<?php
session_start();
  if(!isset($_SESSION['pwd']))
  {
    header('location:login.php');
  }
include('includes/connection.php');

//AMBIL VARIABEL
	$golongan = mysqli_real_escape_string($koneksi, $_POST["golongan"]);
	$no_undian = mysqli_real_escape_string($koneksi, $_POST["no_undian"]);
	$nama = mysqli_real_escape_string($koneksi, $_POST["nama"]);
	$kontingen = mysqli_real_escape_string($koneksi, $_POST["kontingen"]);
	

//CEK DATA KOSONG
	if($golongan == '' OR $no_undian == '' OR $nama == '' OR $kontingen == '')
	{
		?>
		<script type="text/javascript">
			alert('GAGAL ! Data masih ada yang kosong!');
			document.location='jadwal_partai_tanding.php';
		</script>
		<?php
		exit;
	}

$sql = "INSERT INTO jadwal_tgr(kategori, golongan, noundian, nama, 
					kontingen) 
					VALUES('Tunggal', '$golongan', '$no_undian', '$nama',
						'$kontingen')";

if(mysqli_query($koneksi,$sql))
{
	?>
		<script type="text/javascript">
			alert('Berhasil Diinput');
			document.location='jadwal_partai_tgr.php';
		</script>
	<?php
}
else
{
	?>
		<script type="text/javascript">
			alert('Gagal Diinput!');
			document.location='jadwal_partai_tgr.php';
		</script>
	<?php
	die('Unable to delete record: ' .mysqli_error($koneksi));
}
?>