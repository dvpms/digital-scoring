<?php 
	include "../backend/includes/connection.php";

	//dapatkan ID jadwal pertandingan
	$id_partai = mysqli_real_escape_string($koneksi, $_GET["id_partai"]);
	//echo $id_partai;

	//Mencari data jadwal pertandingan
	$sqljadwal = "SELECT * FROM jadwal_tanding 
					WHERE id_partai='$id_partai'";
	$jadwal_tanding = mysqli_query($koneksi,$sqljadwal);
	$jadwal = mysqli_fetch_array($jadwal_tanding);

	
	//----------------- WASIT JURI 1 MERAH
	//Kueri nilai wasit juri 1, babak 1, sudut merah
	$sqljuri1babak1merah = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='1' AND
							babak='1' AND
							sudut='MERAH'";
	$juri1babak1merah = mysqli_query($koneksi,$sqljuri1babak1merah);
	$nilaijuri1babak1merah = mysqli_fetch_array($juri1babak1merah);

	//Kueri nilai wasit juri 1, babak 2, sudut merah
	$sqljuri1babak2merah = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='1' AND
							babak='2' AND
							sudut='MERAH'";
	$juri1babak2merah = mysqli_query($koneksi,$sqljuri1babak2merah);
	$nilaijuri1babak2merah = mysqli_fetch_array($juri1babak2merah);

	//Kueri nilai wasit juri 1, babak 3, sudut merah
	$sqljuri1babak3merah = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='1' AND
							babak='3' AND
							sudut='MERAH'";
	$juri1babak3merah = mysqli_query($koneksi,$sqljuri1babak3merah);
	$nilaijuri1babak3merah = mysqli_fetch_array($juri1babak3merah);
	//----------------- END WASIT JURI 1 MERAH

	//----------------- WASIT JURI 2 MERAH
	//Kueri nilai wasit juri 2, babak 1, sudut merah
	$sqljuri2babak1merah = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='2' AND
							babak='1' AND
							sudut='MERAH'";
	$juri2babak1merah = mysqli_query($koneksi,$sqljuri2babak1merah);
	$nilaijuri2babak1merah = mysqli_fetch_array($juri2babak1merah);

	//Kueri nilai wasit juri 2, babak 2, sudut merah
	$sqljuri2babak2merah = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='2' AND
							babak='2' AND
							sudut='MERAH'";
	$juri2babak2merah = mysqli_query($koneksi,$sqljuri2babak2merah);
	$nilaijuri2babak2merah = mysqli_fetch_array($juri2babak2merah);

	//Kueri nilai wasit juri 2, babak 3, sudut merah
	$sqljuri2babak3merah = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='2' AND
							babak='3' AND
							sudut='MERAH'";
	$juri2babak3merah = mysqli_query($koneksi,$sqljuri2babak3merah);
	$nilaijuri2babak3merah = mysqli_fetch_array($juri2babak3merah);
	//----------------- END WASIT JURI 2 MERAH


	//----------------- WASIT JURI 3 MERAH
	//Kueri nilai wasit juri 3, babak 1, sudut merah
	$sqljuri3babak1merah = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='3' AND
							babak='1' AND
							sudut='MERAH'";
	$juri3babak1merah = mysqli_query($koneksi,$sqljuri3babak1merah);
	$nilaijuri3babak1merah = mysqli_fetch_array($juri3babak1merah);

	//Kueri nilai wasit juri 3, babak 2, sudut merah
	$sqljuri3babak2merah = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='3' AND
							babak='2' AND
							sudut='MERAH'";
	$juri3babak2merah = mysqli_query($koneksi,$sqljuri3babak2merah);
	$nilaijuri3babak2merah = mysqli_fetch_array($juri3babak2merah);

	//Kueri nilai wasit juri 3, babak 3, sudut merah
	$sqljuri3babak3merah = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='3' AND
							babak='3' AND
							sudut='MERAH'";
	$juri3babak3merah = mysqli_query($koneksi,$sqljuri3babak3merah);
	$nilaijuri3babak3merah = mysqli_fetch_array($juri3babak3merah);
	//----------------- END WASIT JURI 3 MERAH


	//----------------- WASIT JURI 4 MERAH
	//Kueri nilai wasit juri 4, babak 1, sudut merah
	$sqljuri4babak1merah = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='4' AND
							babak='1' AND
							sudut='MERAH'";
	$juri4babak1merah = mysqli_query($koneksi,$sqljuri4babak1merah);
	$nilaijuri4babak1merah = mysqli_fetch_array($juri4babak1merah);

	//Kueri nilai wasit juri 4, babak 2, sudut merah
	$sqljuri4babak2merah = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='4' AND
							babak='2' AND
							sudut='MERAH'";
	$juri4babak2merah = mysqli_query($koneksi,$sqljuri4babak2merah);
	$nilaijuri4babak2merah = mysqli_fetch_array($juri4babak2merah);

	//Kueri nilai wasit juri 4, babak 3, sudut merah
	$sqljuri4babak3merah = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='4' AND
							babak='3' AND
							sudut='MERAH'";
	$juri4babak3merah = mysqli_query($koneksi,$sqljuri4babak3merah);
	$nilaijuri4babak3merah = mysqli_fetch_array($juri4babak3merah);
	//----------------- END WASIT JURI 4 MERAH


	//----------------- WASIT JURI 5 MERAH
	//Kueri nilai wasit juri 5, babak 1, sudut merah
	$sqljuri5babak1merah = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='5' AND
							babak='1' AND
							sudut='MERAH'";
	$juri5babak1merah = mysqli_query($koneksi,$sqljuri5babak1merah);
	$nilaijuri5babak1merah = mysqli_fetch_array($juri5babak1merah);

	//Kueri nilai wasit juri 5, babak 2, sudut merah
	$sqljuri5babak2merah = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='5' AND
							babak='2' AND
							sudut='MERAH'";
	$juri5babak2merah = mysqli_query($koneksi,$sqljuri5babak2merah);
	$nilaijuri5babak2merah = mysqli_fetch_array($juri5babak2merah);

	//Kueri nilai wasit juri 5, babak 3, sudut merah
	$sqljuri5babak3merah = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='5' AND
							babak='3' AND
							sudut='MERAH'";
	$juri5babak3merah = mysqli_query($koneksi,$sqljuri5babak3merah);
	$nilaijuri5babak3merah = mysqli_fetch_array($juri5babak3merah);
	//----------------- END WASIT JURI 5 MERAH


	//----------------- AREA BIRU --------------------------
	//------------------------------------------------------

	//----------------- WASIT JURI 1 BIRU
	//Kueri nilai wasit juri 1, babak 1, sudut biru
	$sqljuri1babak1biru = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='1' AND
							babak='1' AND
							sudut='BIRU'";
	$juri1babak1biru = mysqli_query($koneksi,$sqljuri1babak1biru);
	$nilaijuri1babak1biru = mysqli_fetch_array($juri1babak1biru);

	//Kueri nilai wasit juri 1, babak 2, sudut biru
	$sqljuri1babak2biru = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='1' AND
							babak='2' AND
							sudut='BIRU'";
	$juri1babak2biru = mysqli_query($koneksi,$sqljuri1babak2biru);
	$nilaijuri1babak2biru = mysqli_fetch_array($juri1babak2biru);

	//Kueri nilai wasit juri 1, babak 3, sudut biru
	$sqljuri1babak3biru = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='1' AND
							babak='3' AND
							sudut='BIRU'";
	$juri1babak3biru = mysqli_query($koneksi,$sqljuri1babak3biru);
	$nilaijuri1babak3biru = mysqli_fetch_array($juri1babak3biru);
	//----------------- END WASIT JURI 1 biru

	//----------------- WASIT JURI 2 biru
	//Kueri nilai wasit juri 2, babak 1, sudut biru
	$sqljuri2babak1biru = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='2' AND
							babak='1' AND
							sudut='BIRU'";
	$juri2babak1biru = mysqli_query($koneksi,$sqljuri2babak1biru);
	$nilaijuri2babak1biru = mysqli_fetch_array($juri2babak1biru);

	//Kueri nilai wasit juri 2, babak 2, sudut biru
	$sqljuri2babak2biru = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='2' AND
							babak='2' AND
							sudut='BIRU'";
	$juri2babak2biru = mysqli_query($koneksi,$sqljuri2babak2biru);
	$nilaijuri2babak2biru = mysqli_fetch_array($juri2babak2biru);

	//Kueri nilai wasit juri 2, babak 3, sudut biru
	$sqljuri2babak3biru = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='2' AND
							babak='3' AND
							sudut='BIRU'";
	$juri2babak3biru = mysqli_query($koneksi,$sqljuri2babak3biru);
	$nilaijuri2babak3biru = mysqli_fetch_array($juri2babak3biru);
	//----------------- END WASIT JURI 2 biru


	//----------------- WASIT JURI 3 biru
	//Kueri nilai wasit juri 3, babak 1, sudut biru
	$sqljuri3babak1biru = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='3' AND
							babak='1' AND
							sudut='BIRU'";
	$juri3babak1biru = mysqli_query($koneksi,$sqljuri3babak1biru);
	$nilaijuri3babak1biru = mysqli_fetch_array($juri3babak1biru);

	//Kueri nilai wasit juri 3, babak 2, sudut biru
	$sqljuri3babak2biru = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='3' AND
							babak='2' AND
							sudut='BIRU'";
	$juri3babak2biru = mysqli_query($koneksi,$sqljuri3babak2biru);
	$nilaijuri3babak2biru = mysqli_fetch_array($juri3babak2biru);

	//Kueri nilai wasit juri 3, babak 3, sudut biru
	$sqljuri3babak3biru = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='3' AND
							babak='3' AND
							sudut='BIRU'";
	$juri3babak3biru = mysqli_query($koneksi,$sqljuri3babak3biru);
	$nilaijuri3babak3biru = mysqli_fetch_array($juri3babak3biru);
	//----------------- END WASIT JURI 3 biru


	//----------------- WASIT JURI 4 biru
	//Kueri nilai wasit juri 4, babak 1, sudut biru
	$sqljuri4babak1biru = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='4' AND
							babak='1' AND
							sudut='BIRU'";
	$juri4babak1biru = mysqli_query($koneksi,$sqljuri4babak1biru);
	$nilaijuri4babak1biru = mysqli_fetch_array($juri4babak1biru);

	//Kueri nilai wasit juri 4, babak 2, sudut biru
	$sqljuri4babak2biru = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='4' AND
							babak='2' AND
							sudut='BIRU'";
	$juri4babak2biru = mysqli_query($koneksi,$sqljuri4babak2biru);
	$nilaijuri4babak2biru = mysqli_fetch_array($juri4babak2biru);

	//Kueri nilai wasit juri 4, babak 3, sudut biru
	$sqljuri4babak3biru = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='4' AND
							babak='3' AND
							sudut='BIRU'";
	$juri4babak3biru = mysqli_query($koneksi,$sqljuri4babak3biru);
	$nilaijuri4babak3biru = mysqli_fetch_array($juri4babak3biru);
	//----------------- END WASIT JURI 4 biru


	//----------------- WASIT JURI 5 biru
	//Kueri nilai wasit juri 5, babak 1, sudut biru
	$sqljuri5babak1biru = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='5' AND
							babak='1' AND
							sudut='BIRU'";
	$juri5babak1biru = mysqli_query($koneksi,$sqljuri5babak1biru);
	$nilaijuri5babak1biru = mysqli_fetch_array($juri5babak1biru);

	//Kueri nilai wasit juri 5, babak 2, sudut biru
	$sqljuri5babak2biru = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='5' AND
							babak='2' AND
							sudut='BIRU'";
	$juri5babak2biru = mysqli_query($koneksi,$sqljuri5babak2biru);
	$nilaijuri5babak2biru = mysqli_fetch_array($juri5babak2biru);

	//Kueri nilai wasit juri 5, babak 3, sudut biru
	$sqljuri5babak3biru = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='5' AND
							babak='3' AND
							sudut='BIRU'";
	$juri5babak3biru = mysqli_query($koneksi,$sqljuri5babak3biru);
	$nilaijuri5babak3biru = mysqli_fetch_array($juri5babak3biru);
	//----------------- END WASIT JURI 5 biru

	// HITUNG HUKUMAN UNTUK MERAH
	$hukumanmerahj1 = mysqli_query($koneksi,"SELECT COUNT(button) AS hukmerahj1 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=1 AND button LIKE '%-%' AND sudut='MERAH'");
	$hukmerahj1 = mysqli_fetch_array($hukumanmerahj1);

	$hukumanmerahj2 = mysqli_query($koneksi,"SELECT COUNT(button) AS hukmerahj2 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=2 AND button LIKE '%-%' AND sudut='MERAH'");
	$hukmerahj2 = mysqli_fetch_array($hukumanmerahj2);

	$hukumanmerahj3 = mysqli_query($koneksi,"SELECT COUNT(button) AS hukmerahj3 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=3 AND button LIKE '%-%' AND sudut='MERAH'");
	$hukmerahj3 = mysqli_fetch_array($hukumanmerahj3);

	$hukumanmerahj4 = mysqli_query($koneksi,"SELECT COUNT(button) AS hukmerahj4 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=4 AND button LIKE '%-%' AND sudut='MERAH'");
	$hukmerahj4 = mysqli_fetch_array($hukumanmerahj4);

	$hukumanmerahj5 = mysqli_query($koneksi,"SELECT COUNT(button) AS hukmerahj5 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=5 AND button LIKE '%-%' AND sudut='MERAH'");
	$hukmerahj5 = mysqli_fetch_array($hukumanmerahj5);

	// HITUNG HUKUMAN UNTUK BIRU
	$hukumanbiruj1 = mysqli_query($koneksi,"SELECT COUNT(button) AS hukbiruj1 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=1 AND button LIKE '%-%' AND sudut='BIRU'");
	$hukbiruj1 = mysqli_fetch_array($hukumanbiruj1);

	$hukumanbiruj2 = mysqli_query($koneksi,"SELECT COUNT(button) AS hukbiruj2 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=2 AND button LIKE '%-%' AND sudut='BIRU'");
	$hukbiruj2 = mysqli_fetch_array($hukumanbiruj2);

	$hukumanbiruj3 = mysqli_query($koneksi,"SELECT COUNT(button) AS hukbiruj3 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=3 AND button LIKE '%-%' AND sudut='BIRU'");
	$hukbiruj3 = mysqli_fetch_array($hukumanbiruj3);

	$hukumanbiruj4 = mysqli_query($koneksi,"SELECT COUNT(button) AS hukbiruj4 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=4 AND button LIKE '%-%' AND sudut='BIRU'");
	$hukbiruj4 = mysqli_fetch_array($hukumanbiruj4);

	$hukumanbiruj5 = mysqli_query($koneksi,"SELECT COUNT(button) AS hukbiruj5 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=5 AND button LIKE '%-%' AND sudut='BIRU'");
	$hukbiruj5 = mysqli_fetch_array($hukumanbiruj5);
	//SELESAI HUKUMAN

	//COUNT NILAI MERAH
	// MERAH JURI 1
	$countmerahj1p1 = mysqli_query($koneksi,"SELECT COUNT(button) AS merahj1p1 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=1 AND button='1' AND sudut='MERAH' ");
	$merahj1p1 = mysqli_fetch_array($countmerahj1p1);

	$countmerahj1p2 = mysqli_query($koneksi,"SELECT COUNT(button) AS merahj1p2 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=1 AND button='2' AND sudut='MERAH' ");
	$merahj1p2 = mysqli_fetch_array($countmerahj1p2);

	$countmerahj1p3 = mysqli_query($koneksi,"SELECT COUNT(button) AS merahj1p3 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=1 AND button='3' AND sudut='MERAH' ");
	$merahj1p3 = mysqli_fetch_array($countmerahj1p3);

	$countmerahj1p1plus1 = mysqli_query($koneksi,"SELECT COUNT(button) AS merahj1p1plus1 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=1 AND button='1+1' AND sudut='MERAH' ");
	$merahj1p1plus1 = mysqli_fetch_array($countmerahj1p1plus1);

	$countmerahj1p1plus2 = mysqli_query($koneksi,"SELECT COUNT(button) AS merahj1p1plus2 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=1 AND button='1+2' AND sudut='MERAH' ");
	$merahj1p1plus2 = mysqli_fetch_array($countmerahj1p1plus2);

	$countmerahj1p1plus3 = mysqli_query($koneksi,"SELECT COUNT(button) AS merahj1p1plus3 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=1 AND button='1+3' AND sudut='MERAH' ");
	$merahj1p1plus3 = mysqli_fetch_array($countmerahj1p1plus3);

	// MERAH JURI 2
	$countmerahj2p1 = mysqli_query($koneksi,"SELECT COUNT(button) AS merahj2p1 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=2 AND button='1' AND sudut='MERAH' ");
	$merahj2p1 = mysqli_fetch_array($countmerahj2p1);

	$countmerahj2p2 = mysqli_query($koneksi,"SELECT COUNT(button) AS merahj2p2 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=2 AND button='2' AND sudut='MERAH' ");
	$merahj2p2 = mysqli_fetch_array($countmerahj2p2);

	$countmerahj2p3 = mysqli_query($koneksi,"SELECT COUNT(button) AS merahj2p3 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=2 AND button='3' AND sudut='MERAH' ");
	$merahj2p3 = mysqli_fetch_array($countmerahj2p3);

	$countmerahj2p1plus1 = mysqli_query($koneksi,"SELECT COUNT(button) AS merahj2p1plus1 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=2 AND button='1+1' AND sudut='MERAH' ");
	$merahj2p1plus1 = mysqli_fetch_array($countmerahj2p1plus1);

	$countmerahj2p1plus2 = mysqli_query($koneksi,"SELECT COUNT(button) AS merahj2p1plus2 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=2 AND button='1+2' AND sudut='MERAH' ");
	$merahj2p1plus2 = mysqli_fetch_array($countmerahj2p1plus2);

	$countmerahj2p1plus3 = mysqli_query($koneksi,"SELECT COUNT(button) AS merahj2p1plus3 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=2 AND button='1+3' AND sudut='MERAH' ");
	$merahj2p1plus3 = mysqli_fetch_array($countmerahj2p1plus3);

	// MERAH JURI 3
	$countmerahj3p1 = mysqli_query($koneksi,"SELECT COUNT(button) AS merahj3p1 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=3 AND button='1' AND sudut='MERAH' ");
	$merahj3p1 = mysqli_fetch_array($countmerahj3p1);

	$countmerahj3p2 = mysqli_query($koneksi,"SELECT COUNT(button) AS merahj3p2 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=3 AND button='2' AND sudut='MERAH' ");
	$merahj3p2 = mysqli_fetch_array($countmerahj3p2);

	$countmerahj3p3 = mysqli_query($koneksi,"SELECT COUNT(button) AS merahj3p3 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=3 AND button='3' AND sudut='MERAH' ");
	$merahj3p3 = mysqli_fetch_array($countmerahj3p3);

	$countmerahj3p1plus1 = mysqli_query($koneksi,"SELECT COUNT(button) AS merahj3p1plus1 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=3 AND button='1+1' AND sudut='MERAH' ");
	$merahj3p1plus1 = mysqli_fetch_array($countmerahj3p1plus1);

	$countmerahj3p1plus2 = mysqli_query($koneksi,"SELECT COUNT(button) AS merahj3p1plus2 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=3 AND button='1+2' AND sudut='MERAH' ");
	$merahj3p1plus2 = mysqli_fetch_array($countmerahj3p1plus2);

	$countmerahj3p1plus3 = mysqli_query($koneksi,"SELECT COUNT(button) AS merahj3p1plus3 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=3 AND button='1+3' AND sudut='MERAH' ");
	$merahj3p1plus3 = mysqli_fetch_array($countmerahj3p1plus3);

	// MERAH JURI 4
	$countmerahj4p1 = mysqli_query($koneksi,"SELECT COUNT(button) AS merahj4p1 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=4 AND button='1' AND sudut='MERAH' ");
	$merahj4p1 = mysqli_fetch_array($countmerahj4p1);

	$countmerahj4p2 = mysqli_query($koneksi,"SELECT COUNT(button) AS merahj4p2 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=4 AND button='2' AND sudut='MERAH' ");
	$merahj4p2 = mysqli_fetch_array($countmerahj4p2);

	$countmerahj4p3 = mysqli_query($koneksi,"SELECT COUNT(button) AS merahj4p3 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=4 AND button='3' AND sudut='MERAH' ");
	$merahj4p3 = mysqli_fetch_array($countmerahj4p3);

	$countmerahj4p1plus1 = mysqli_query($koneksi,"SELECT COUNT(button) AS merahj4p1plus1 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=4 AND button='1+1' AND sudut='MERAH' ");
	$merahj4p1plus1 = mysqli_fetch_array($countmerahj4p1plus1);

	$countmerahj4p1plus2 = mysqli_query($koneksi,"SELECT COUNT(button) AS merahj4p1plus2 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=4 AND button='1+2' AND sudut='MERAH' ");
	$merahj4p1plus2 = mysqli_fetch_array($countmerahj4p1plus2);

	$countmerahj4p1plus3 = mysqli_query($koneksi,"SELECT COUNT(button) AS merahj4p1plus3 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=4 AND button='1+3' AND sudut='MERAH' ");
	$merahj4p1plus3 = mysqli_fetch_array($countmerahj4p1plus3);

	// MERAH JURI 5
	$countmerahj5p1 = mysqli_query($koneksi,"SELECT COUNT(button) AS merahj5p1 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=5 AND button='1' AND sudut='MERAH' ");
	$merahj5p1 = mysqli_fetch_array($countmerahj5p1);

	$countmerahj5p2 = mysqli_query($koneksi,"SELECT COUNT(button) AS merahj5p2 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=5 AND button='2' AND sudut='MERAH' ");
	$merahj5p2 = mysqli_fetch_array($countmerahj5p2);

	$countmerahj5p3 = mysqli_query($koneksi,"SELECT COUNT(button) AS merahj5p3 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=5 AND button='3' AND sudut='MERAH' ");
	$merahj5p3 = mysqli_fetch_array($countmerahj5p3);

	$countmerahj5p1plus1 = mysqli_query($koneksi,"SELECT COUNT(button) AS merahj5p1plus1 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=5 AND button='1+1' AND sudut='MERAH' ");
	$merahj5p1plus1 = mysqli_fetch_array($countmerahj5p1plus1);

	$countmerahj5p1plus2 = mysqli_query($koneksi,"SELECT COUNT(button) AS merahj5p1plus2 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=5 AND button='1+2' AND sudut='MERAH' ");
	$merahj5p1plus2 = mysqli_fetch_array($countmerahj5p1plus2);

	$countmerahj5p1plus3 = mysqli_query($koneksi,"SELECT COUNT(button) AS merahj5p1plus3 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=5 AND button='1+3' AND sudut='MERAH' ");
	$merahj5p1plus3 = mysqli_fetch_array($countmerahj5p1plus3);
	// ------- **** ----------
	//END COUNT NILAI MERAH


	//COUNT NILAI BIRU
	// BIRU JURI 1
	$countbiruj1p1 = mysqli_query($koneksi,"SELECT COUNT(button) AS biruj1p1 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=1 AND button='1' AND sudut='BIRU' ");
	$biruj1p1 = mysqli_fetch_array($countbiruj1p1);

	$countbiruj1p2 = mysqli_query($koneksi,"SELECT COUNT(button) AS biruj1p2 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=1 AND button='2' AND sudut='BIRU' ");
	$biruj1p2 = mysqli_fetch_array($countbiruj1p2);

	$countbiruj1p3 = mysqli_query($koneksi,"SELECT COUNT(button) AS biruj1p3 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=1 AND button='3' AND sudut='BIRU' ");
	$biruj1p3 = mysqli_fetch_array($countbiruj1p3);

	$countbiruj1p1plus1 = mysqli_query($koneksi,"SELECT COUNT(button) AS biruj1p1plus1 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=1 AND button='1+1' AND sudut='BIRU' ");
	$biruj1p1plus1 = mysqli_fetch_array($countbiruj1p1plus1);

	$countbiruj1p1plus2 = mysqli_query($koneksi,"SELECT COUNT(button) AS biruj1p1plus2 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=1 AND button='1+2' AND sudut='BIRU' ");
	$biruj1p1plus2 = mysqli_fetch_array($countbiruj1p1plus2);

	$countbiruj1p1plus3 = mysqli_query($koneksi,"SELECT COUNT(button) AS biruj1p1plus3 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=1 AND button='1+3' AND sudut='BIRU' ");
	$biruj1p1plus3 = mysqli_fetch_array($countbiruj1p1plus3);

	// BIRU JURI 2
	$countbiruj2p1 = mysqli_query($koneksi,"SELECT COUNT(button) AS biruj2p1 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=2 AND button='1' AND sudut='BIRU' ");
	$biruj2p1 = mysqli_fetch_array($countbiruj2p1);

	$countbiruj2p2 = mysqli_query($koneksi,"SELECT COUNT(button) AS biruj2p2 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=2 AND button='2' AND sudut='BIRU' ");
	$biruj2p2 = mysqli_fetch_array($countbiruj2p2);

	$countbiruj2p3 = mysqli_query($koneksi,"SELECT COUNT(button) AS biruj2p3 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=2 AND button='3' AND sudut='BIRU' ");
	$biruj2p3 = mysqli_fetch_array($countbiruj2p3);

	$countbiruj2p1plus1 = mysqli_query($koneksi,"SELECT COUNT(button) AS biruj2p1plus1 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=2 AND button='1+1' AND sudut='BIRU' ");
	$biruj2p1plus1 = mysqli_fetch_array($countbiruj2p1plus1);

	$countbiruj2p1plus2 = mysqli_query($koneksi,"SELECT COUNT(button) AS biruj2p1plus2 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=2 AND button='1+2' AND sudut='BIRU' ");
	$biruj2p1plus2 = mysqli_fetch_array($countbiruj2p1plus2);

	$countbiruj2p1plus3 = mysqli_query($koneksi,"SELECT COUNT(button) AS biruj2p1plus3 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=2 AND button='1+3' AND sudut='BIRU' ");
	$biruj2p1plus3 = mysqli_fetch_array($countbiruj2p1plus3);

	// BIRU JURI 3
	$countbiruj3p1 = mysqli_query($koneksi,"SELECT COUNT(button) AS biruj3p1 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=3 AND button='1' AND sudut='BIRU' ");
	$biruj3p1 = mysqli_fetch_array($countbiruj3p1);

	$countbiruj3p2 = mysqli_query($koneksi,"SELECT COUNT(button) AS biruj3p2 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=3 AND button='2' AND sudut='BIRU' ");
	$biruj3p2 = mysqli_fetch_array($countbiruj3p2);

	$countbiruj3p3 = mysqli_query($koneksi,"SELECT COUNT(button) AS biruj3p3 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=3 AND button='3' AND sudut='BIRU' ");
	$biruj3p3 = mysqli_fetch_array($countbiruj3p3);

	$countbiruj3p1plus1 = mysqli_query($koneksi,"SELECT COUNT(button) AS biruj3p1plus1 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=3 AND button='1+1' AND sudut='BIRU' ");
	$biruj3p1plus1 = mysqli_fetch_array($countbiruj3p1plus1);

	$countbiruj3p1plus2 = mysqli_query($koneksi,"SELECT COUNT(button) AS biruj3p1plus2 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=3 AND button='1+2' AND sudut='BIRU' ");
	$biruj3p1plus2 = mysqli_fetch_array($countbiruj3p1plus2);

	$countbiruj3p1plus3 = mysqli_query($koneksi,"SELECT COUNT(button) AS biruj3p1plus3 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=3 AND button='1+3' AND sudut='BIRU' ");
	$biruj3p1plus3 = mysqli_fetch_array($countbiruj3p1plus3);

	// BIRU JURI 4
	$countbiruj4p1 = mysqli_query($koneksi,"SELECT COUNT(button) AS biruj4p1 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=4 AND button='1' AND sudut='BIRU' ");
	$biruj4p1 = mysqli_fetch_array($countbiruj4p1);

	$countbiruj4p2 = mysqli_query($koneksi,"SELECT COUNT(button) AS biruj4p2 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=4 AND button='2' AND sudut='BIRU' ");
	$biruj4p2 = mysqli_fetch_array($countbiruj4p2);

	$countbiruj4p3 = mysqli_query($koneksi,"SELECT COUNT(button) AS biruj4p3 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=4 AND button='3' AND sudut='BIRU' ");
	$biruj4p3 = mysqli_fetch_array($countbiruj4p3);

	$countbiruj4p1plus1 = mysqli_query($koneksi,"SELECT COUNT(button) AS biruj4p1plus1 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=4 AND button='1+1' AND sudut='BIRU' ");
	$biruj4p1plus1 = mysqli_fetch_array($countbiruj4p1plus1);

	$countbiruj4p1plus2 = mysqli_query($koneksi,"SELECT COUNT(button) AS biruj4p1plus2 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=4 AND button='1+2' AND sudut='BIRU' ");
	$biruj4p1plus2 = mysqli_fetch_array($countbiruj4p1plus2);

	$countbiruj4p1plus3 = mysqli_query($koneksi,"SELECT COUNT(button) AS biruj4p1plus3 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=4 AND button='1+3' AND sudut='BIRU' ");
	$biruj4p1plus3 = mysqli_fetch_array($countbiruj4p1plus3);

	// BIRU JURI 5
	$countbiruj5p1 = mysqli_query($koneksi,"SELECT COUNT(button) AS biruj5p1 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=5 AND button='1' AND sudut='BIRU' ");
	$biruj5p1 = mysqli_fetch_array($countbiruj5p1);

	$countbiruj5p2 = mysqli_query($koneksi,"SELECT COUNT(button) AS biruj5p2 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=5 AND button='2' AND sudut='BIRU' ");
	$biruj5p2 = mysqli_fetch_array($countbiruj5p2);

	$countbiruj5p3 = mysqli_query($koneksi,"SELECT COUNT(button) AS biruj5p3 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=5 AND button='3' AND sudut='BIRU' ");
	$biruj5p3 = mysqli_fetch_array($countbiruj5p3);

	$countbiruj5p1plus1 = mysqli_query($koneksi,"SELECT COUNT(button) AS biruj5p1plus1 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=5 AND button='1+1' AND sudut='BIRU' ");
	$biruj5p1plus1 = mysqli_fetch_array($countbiruj5p1plus1);

	$countbiruj5p1plus2 = mysqli_query($koneksi,"SELECT COUNT(button) AS biruj5p1plus2 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=5 AND button='1+2' AND sudut='BIRU' ");
	$biruj5p1plus2 = mysqli_fetch_array($countbiruj5p1plus2);

	$countbiruj5p1plus3 = mysqli_query($koneksi,"SELECT COUNT(button) AS biruj5p1plus3 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=5 AND button='1+3' AND sudut='BIRU' ");
	$biruj5p1plus3 = mysqli_fetch_array($countbiruj5p1plus3);
	// ------- **** ----------
	//END COUNT NILAI BIRU
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
<div class="table-responsive">
<table class="table">
  <thead>
  	<tr>
      <td colspan="6" rowspan="3">
      	<h1 class="waktu" style="font-size: 50px">00:00</h1>
      </td>
    </tr>
    <tr class="text-right">
      <td colspan="5" style="font-size: 28px; font-weight: bold;">GELANGGANG : <?php echo $jadwal['gelanggang']; ?></td>
    </tr>
    <tr class="text-right">
      <td colspan="5" style="font-size: 28px; font-weight: bold;">PARTAI : <?php echo $jadwal['partai']." (".$jadwal['babak'].")"; ?></td>
    </tr>
    <tr>
    	<td colspan="6">
	      	<h1 class="btn btn-success btn-xs" onclick="init_start()" style="margin-bottom:10px;margin-top:0;"> START</h1>
	      	<h1 class="btn btn-warning btn-xs btn-stop" onclick="resume_time()" style="margin-bottom:10px;margin-top:0;"> PAUSE</h1>
	      	<h1 class="btn btn-danger btn-xs" onclick="stop_time()" style="margin-bottom:10px;margin-top:0;"> STOP</h1>
	    </td>
      	<td colspan="5" class="text-right" style="font-size: 28px; font-weight: bold;"><?php echo $jadwal['kelas']; ?></td>
    </tr>
    
    <tr class="text-center">
      <td colspan="5" style="font-size: 16px; font-weight: bold;"><p><?php echo $jadwal['nm_merah']; ?></p></td>
      <td>&nbsp;</td>
      <td colspan="5" style="font-size: 16px; font-weight: bold;"><?php echo $jadwal['nm_biru']; ?></td>
    </tr>
    <tr class="text-center">
      <td colspan="5" style="font-size: 16px; font-weight: bold;"><p><?php echo $jadwal['kontingen_merah']; ?></p></td>
      <td>&nbsp;</td>
      <td colspan="5" style="font-size: 16px; font-weight: bold;"><p><?php echo $jadwal['kontingen_biru']; ?></p></td>
    </tr>
    <tr class="text-center">
      <td colspan="5" bgcolor="#FF0000" style="font-size: 16px; font-weight: bold;"><font color="white">SUDUT MERAH</font></td>
      <td bgcolor="#F5F5F5">&nbsp;</td>
      <td colspan="5" bgcolor="#1E90FF" style="font-size: 16px; font-weight: bold;"><font color="white">SUDUT BIRU</font></td>
    </tr>
    <tr bgcolor="#F5F5F5" class="text-center" style="font-weight: bold;">
      <td>WASIT</td>
      <td>WASIT</td>
      <td>WASIT</td>
      <td>WASIT</td>
      <td>WASIT</td>
      <td rowspan="2" bgcolor="#F5F5F5" style="font-size: 18px;">BABAK</td>
      <td>WASIT</td>
      <td>WASIT</td>
      <td>WASIT</td>
      <td>WASIT</td>
      <td>WASIT</td>
    </tr>
    <tr bgcolor="#F5F5F5" class="text-center" style="font-weight: bold;">
      <td>JURI 1</td>
      <td>JURI 2</td>
      <td>JURI 3</td>
      <td>JURI 4</td>
      <td>JURI 5</td>
      <td>JURI 1</td>
      <td>JURI 2</td>
      <td>JURI 3</td>
      <td>JURI 4</td>
      <td>JURI 5</td>
    </tr>
  </thead>
  <tbody class="content_penilaian">
  	<tr class="text-center" style="font-size: 24px;">
      <td><?php echo $nilaijuri1babak1merah[0]; ?></td>
      <td><?php echo $nilaijuri2babak1merah[0]; ?></td>
      <td><?php echo $nilaijuri3babak1merah[0]; ?></td>
      <td><?php echo $nilaijuri4babak1merah[0]; ?></td>
      <td><?php echo $nilaijuri5babak1merah[0]; ?></td>
      <td bgcolor="#F5F5F5">I</td>
      <td><?php echo $nilaijuri1babak1biru[0]; ?></td>
      <td><?php echo $nilaijuri2babak1biru[0]; ?></td>
      <td><?php echo $nilaijuri3babak1biru[0]; ?></td>
      <td><?php echo $nilaijuri4babak1biru[0]; ?></td>
      <td><?php echo $nilaijuri5babak1biru[0]; ?></td>
    </tr>
    <tr class="text-center" style="font-size: 24px;">
      <td><?php echo $nilaijuri1babak2merah[0]; ?></td>
      <td><?php echo $nilaijuri2babak2merah[0]; ?></td>
      <td><?php echo $nilaijuri3babak2merah[0]; ?></td>
      <td><?php echo $nilaijuri4babak2merah[0]; ?></td>
      <td><?php echo $nilaijuri5babak2merah[0]; ?></td>
      <td bgcolor="#F5F5F5">II</td>
      <td><?php echo $nilaijuri1babak2biru[0]; ?></td>
      <td><?php echo $nilaijuri2babak2biru[0]; ?></td>
      <td><?php echo $nilaijuri3babak2biru[0]; ?></td>
      <td><?php echo $nilaijuri4babak2biru[0]; ?></td>
      <td><?php echo $nilaijuri5babak2biru[0]; ?></td>
    </tr>
    <tr class="text-center" style="font-size: 24px;">
      <td><?php echo $nilaijuri1babak3merah[0]; ?></td>
      <td><?php echo $nilaijuri2babak3merah[0]; ?></td>
      <td><?php echo $nilaijuri3babak3merah[0]; ?></td>
      <td><?php echo $nilaijuri4babak3merah[0]; ?></td>
      <td><?php echo $nilaijuri5babak3merah[0]; ?></td>
      <td bgcolor="#F5F5F5">III</td>
      <td><?php echo $nilaijuri1babak3biru[0]; ?></td>
      <td><?php echo $nilaijuri2babak3biru[0]; ?></td>
      <td><?php echo $nilaijuri3babak3biru[0]; ?></td>
      <td><?php echo $nilaijuri4babak3biru[0]; ?></td>
      <td><?php echo $nilaijuri5babak3biru[0]; ?></td>
    </tr>
    <?php
    	//DEFINE Variabel truemerah
	    	$merahsatunyala = 0;
	    	$merahduanyala = 0;
	    	$merahtiganyala = 0;
	    	$merahempatnyala = 0;
	    	$merahlimanyala = 0;

	    	$birusatunyala = 0;
	    	$biruduanyala = 0;
	    	$birutiganyala = 0;
	    	$biruempatnyala = 0;
	    	$birulimanyala = 0;

	    	$skorakhirmerah = 0;
      		$skorakhirbiru = 0;
	    	//hitung total nilai masing-masing juri MERAH
	    	$totalwasitjuri1merah = $nilaijuri1babak1merah[0] + $nilaijuri1babak2merah[0] + $nilaijuri1babak3merah[0];
	    	$totalwasitjuri2merah = $nilaijuri2babak1merah[0] + $nilaijuri2babak2merah[0] + $nilaijuri2babak3merah[0];
	    	$totalwasitjuri3merah = $nilaijuri3babak1merah[0] + $nilaijuri3babak2merah[0] + $nilaijuri3babak3merah[0];
	    	$totalwasitjuri4merah = $nilaijuri4babak1merah[0] + $nilaijuri4babak2merah[0] + $nilaijuri4babak3merah[0];
	      	$totalwasitjuri5merah = $nilaijuri5babak1merah[0] + $nilaijuri5babak2merah[0] + $nilaijuri5babak3merah[0];
	      	
	      	//hitung total nilai masing-masing juri BIRU
	      	$totalwasitjuri1biru = $nilaijuri1babak1biru[0] + $nilaijuri1babak2biru[0] + $nilaijuri1babak3biru[0];
	      	$totalwasitjuri2biru = $nilaijuri2babak1biru[0] + $nilaijuri2babak2biru[0] + $nilaijuri2babak3biru[0];
	      	$totalwasitjuri3biru = $nilaijuri3babak1biru[0] + $nilaijuri3babak2biru[0] + $nilaijuri3babak3biru[0];
	      	$totalwasitjuri4biru = $nilaijuri4babak1biru[0] + $nilaijuri4babak2biru[0] + $nilaijuri4babak3biru[0];
	      	$totalwasitjuri5biru = $nilaijuri5babak1biru[0] + $nilaijuri5babak2biru[0] + $nilaijuri5babak3biru[0];

	      	//NYALA JURI 1
	      	if($totalwasitjuri1merah > $totalwasitjuri1biru) {
	      		$merahsatunyala = 1;
	      		$skorakhirmerah = $skorakhirmerah + 1;
	      	}

	      	if($totalwasitjuri1biru > $totalwasitjuri1merah) {
	      		$birusatunyala = 1;
	      		$skorakhirbiru = $skorakhirbiru + 1;
	      	}

	      	if($hukmerahj1 < $hukbiruj1 AND $merahsatunyala == 0 AND $birusatunyala == 0) {
	      		$merahsatunyala = 1;
	      		$skorakhirmerah = $skorakhirmerah + 1;
	      	}

	      	if($hukbiruj1 < $hukmerahj1 AND $merahsatunyala == 0 AND $birusatunyala == 0) {
	      		$birusatunyala = 1;
	      		$skorakhirbiru = $skorakhirbiru + 1;
	      	}

	      	if($merahj1p1plus3 > $biruj1p1plus3 AND $merahsatunyala == 0 AND $birusatunyala == 0) {
	      		$merahsatunyala = 1;
	      		$skorakhirmerah = $skorakhirmerah + 1;
	      	}

	      	if($biruj1p1plus3 > $merahj1p1plus3 AND $merahsatunyala == 0 AND $birusatunyala == 0) {
	      		$birusatunyala = 1;
	      		$skorakhirbiru  = $skorakhirbiru + 1;
	      	}

	      	if($merahj1p3 > $biruj1p3 AND $merahsatunyala == 0 AND $birusatunyala == 0) {
	      		$merahsatunyala = 1;
	      		$skorakhirmerah = $skorakhirmerah + 1;
	      	}

	      	if($biruj1p3 > $merahj1p3 AND $merahsatunyala == 0 AND $birusatunyala == 0) {
	      		$birusatunyala = 1;
	      		$skorakhirbiru = $skorakhirbiru + 1;
	      	}

	      	if($merahj1p1plus2 > $biruj1p1plus2 AND $merahsatunyala == 0 AND $birusatunyala == 0) {
	      		$merahsatunyala = 1;
	      		$skorakhirmerah = $skorakhirmerah + 1;
	      	}

	      	if($biruj1p1plus2 > $merahj1p1plus2  AND $merahsatunyala == 0 AND $birusatunyala == 0) {
	      		$birusatunyala = 1;
	      		$skorakhirbiru = $skorakhirbiru + 1;
	      	}

	      	if($merahj1p2 > $biruj1p2 AND $merahsatunyala == 0 AND $birusatunyala == 0) {
	      		$merahsatunyala = 1;
	      		$skorakhirmerah = $skorakhirmerah + 1;
	      	}

	      	if($biruj1p2 > $merahj1p2 AND $merahsatunyala == 0 AND $birusatunyala == 0) {
	      		$birusatunyala = 1;
	      		$skorakhirbiru = $skorakhirbiru + 1;
	      	}

	      	if($merahj1p1plus1 > $biruj1p1plus1 AND $merahsatunyala == 0 AND $birusatunyala == 0) {
	      		$merahsatunyala = 1;
	      		$skorakhirmerah = $skorakhirmerah + 1;
	      	}

	      	if($biruj1p1plus1 > $merahj1p1plus1  AND $merahsatunyala == 0 AND $birusatunyala == 0) {
	      		$birusatunyala = 1;
	      		$skorakhirbiru = $skorakhirbiru + 1;
	      	}

	      	if($merahj1p1 > $biruj1p1 AND $merahsatunyala == 0 AND $birusatunyala == 0) {
	      		$merahsatunyala = 1;
	      		$skorakhirmerah = $skorakhirmerah + 1;
	      	}

	      	if($biruj1p1 > $merahj1p1 AND $merahsatunyala == 0 AND $birusatunyala == 0) {
	      		$birusatunyala = 1;
	      		$skorakhirbiru = $skorakhirbiru + 1;
	      	}

	      	//NYALA JURI 2
	      	if($totalwasitjuri2merah > $totalwasitjuri2biru) {
	      		$merahduanyala = 1;
	      		$skorakhirmerah = $skorakhirmerah + 1;
	      	}

	      	if($totalwasitjuri2biru > $totalwasitjuri2merah) {
	      		$biruduanyala = 1;
	      		$skorakhirbiru = $skorakhirbiru + 1;
	      	}

	      	if($hukmerahj2 < $hukbiruj2 AND $merahduanyala == 0 AND $biruduanyala == 0) {
	      		$merahduanyala = 1;
	      		$skorakhirmerah = $skorakhirmerah + 1;
	      	}

	      	if($hukbiruj2 < $hukmerahj2 AND $merahduanyala == 0 AND $biruduanyala == 0) {
	      		$biruduanyala = 1;
	      		$skorakhirbiru = $skorakhirbiru + 1;
	      	}

	      	if($merahj2p1plus3 > $biruj2p1plus3 AND $merahduanyala == 0 AND $biruduanyala == 0) {
	      		$merahduanyala = 1;
	      		$skorakhirmerah = $skorakhirmerah + 1;
	      	}

	      	if($biruj2p1plus3 > $merahj2p1plus3 AND $merahduanyala == 0 AND $biruduanyala == 0) {
	      		$biruduanyala = 1;
	      		$skorakhirbiru = $skorakhirbiru + 1;
	      	}

	      	if($merahj2p3 > $biruj2p3 AND $merahduanyala == 0 AND $biruduanyala == 0) {
	      		$merahduanyala = 1;
	      		$skorakhirmerah = $skorakhirmerah + 1;
	      	}

	      	if($biruj2p3 > $merahj2p3 AND $merahduanyala == 0 AND $biruduanyala == 0) {
	      		$biruduanyala = 1;
	      		$skorakhirbiru = $skorakhirbiru + 1;
	      	}

	      	if($merahj2p1plus2 > $biruj2p1plus2 AND $merahduanyala == 0 AND $biruduanyala == 0) {
	      		$merahduanyala = 1;
	      		$skorakhirmerah = $skorakhirmerah + 1;
	      	}

	      	if($biruj2p1plus2 > $merahj2p1plus2  AND $merahduanyala == 0 AND $biruduanyala == 0) {
	      		$biruduanyala = 1;
	      		$skorakhirbiru = $skorakhirbiru + 1;
	      	}

	      	if($merahj2p2 > $biruj2p2 AND $merahduanyala == 0 AND $biruduanyala == 0) {
	      		$merahduanyala = 1;
	      		$skorakhirmerah = $skorakhirmerah + 1;
	      	}

	      	if($biruj2p2 > $merahj2p2 AND $merahduanyala == 0 AND $biruduanyala == 0) {
	      		$biruduanyala = 1;
	      		$skorakhirbiru = $skorakhirbiru + 1;
	      	}

	      	if($merahj2p1plus1 > $biruj2p1plus1 AND $merahduanyala == 0 AND $biruduanyala == 0) {
	      		$merahduanyala = 1;
	      		$skorakhirmerah = $skorakhirmerah + 1;
	      	}

	      	if($biruj2p1plus1 > $merahj2p1plus1  AND $merahduanyala == 0 AND $biruduanyala == 0) {
	      		$biruduanyala = 1;
	      		$skorakhirbiru = $skorakhirbiru + 1;
	      	}

	      	if($merahj2p1 > $biruj2p1 AND $merahduanyala == 0 AND $biruduanyala == 0) {
	      		$merahduanyala = 1;
	      		$skorakhirmerah = $skorakhirmerah + 1;
	      	}

	      	if($biruj2p1 > $merahj2p1 AND $merahduanyala == 0 AND $biruduanyala == 0) {
	      		$biruduanyala = 1;
	      		$skorakhirbiru = $skorakhirbiru + 1;
	      	}

	      	//NYALA JURI 3
	      	if($totalwasitjuri3merah > $totalwasitjuri3biru) {
	      		$merahtiganyala = 1;
	      		$skorakhirmerah = $skorakhirmerah + 1;
	      	}

	      	if($totalwasitjuri3biru > $totalwasitjuri3merah) {
	      		$birutiganyala = 1;
	      		$skorakhirbiru = $skorakhirbiru + 1;
	      	}

	      	if($hukmerahj3 < $hukbiruj3 AND $merahtiganyala == 0 AND $birutiganyala == 0) {
	      		$merahtiganyala = 1;
	      		$skorakhirmerah = $skorakhirmerah + 1;
	      	}

	      	if($hukbiruj3 < $hukmerahj3 AND $merahtiganyala == 0 AND $birutiganyala == 0) {
	      		$birutiganyala = 1;
	      		$skorakhirbiru = $skorakhirbiru + 1;
	      	}

	      	if($merahj3p1plus3 > $biruj3p1plus3 AND $merahtiganyala == 0 AND $birutiganyala == 0) {
	      		$merahtiganyala = 1;
	      		$skorakhirmerah = $skorakhirmerah + 1;
	      	}

	      	if($biruj3p1plus3 > $merahj3p1plus3 AND $merahtiganyala == 0 AND $birutiganyala == 0) {
	      		$birutiganyala = 1;
	      		$skorakhirbiru = $skorakhirbiru + 1;
	      	}

	      	if($merahj3p3 > $biruj3p3 AND $merahtiganyala == 0 AND $birutiganyala == 0) {
	      		$merahtiganyala = 1;
	      		$skorakhirmerah = $skorakhirmerah + 1;
	      	}

	      	if($biruj3p3 > $merahj3p3 AND $merahtiganyala == 0 AND $birutiganyala == 0) {
	      		$birutiganyala = 1;
	      		$skorakhirbiru = $skorakhirbiru + 1;
	      	}

	      	if($merahj3p1plus2 > $biruj3p1plus2 AND $merahtiganyala == 0 AND $birutiganyala == 0) {
	      		$merahtiganyala = 1;
	      		$skorakhirmerah = $skorakhirmerah + 1;
	      	}

	      	if($biruj3p1plus2 > $merahj3p1plus2  AND $merahtiganyala == 0 AND $birutiganyala == 0) {
	      		$birutiganyala = 1;
	      		$skorakhirbiru = $skorakhirbiru + 1;
	      	}

	      	if($merahj3p2 > $biruj3p2 AND $merahtiganyala == 0 AND $birutiganyala == 0) {
	      		$merahtiganyala = 1;
	      		$skorakhirmerah = $skorakhirmerah + 1;
	      	}

	      	if($biruj3p2 > $merahj3p2 AND $merahtiganyala == 0 AND $birutiganyala == 0) {
	      		$birutiganyala = 1;
	      		$skorakhirbiru = $skorakhirbiru + 1;
	      	}

	      	if($merahj3p1plus1 > $biruj3p1plus1 AND $merahtiganyala == 0 AND $birutiganyala == 0) {
	      		$merahtiganyala = 1;
	      		$skorakhirmerah = $skorakhirmerah + 1;
	      	}

	      	if($biruj3p1plus1 > $merahj3p1plus1  AND $merahtiganyala == 0 AND $birutiganyala == 0) {
	      		$birutiganyala = 1;
	      		$skorakhirbiru = $skorakhirbiru + 1;
	      	}

	      	if($merahj3p1 > $biruj3p1 AND $merahtiganyala == 0 AND $birutiganyala == 0) {
	      		$merahtiganyala = 1;
	      		$skorakhirmerah = $skorakhirmerah + 1;
	      	}

	      	if($biruj3p1 > $merahj3p1 AND $merahtiganyala == 0 AND $birutiganyala == 0) {
	      		$birutiganyala = 1;
	      		$skorakhirbiru = $skorakhirbiru + 1;
	      	}

	      	//NYALA JURI 4
	      	if($totalwasitjuri4merah > $totalwasitjuri4biru) {
	      		$merahempatnyala = 1;
	      		$skorakhirmerah = $skorakhirmerah + 1;
	      	}

	      	if($totalwasitjuri4biru > $totalwasitjuri4merah) {
	      		$biruempatnyala = 1;
	      		$skorakhirbiru = $skorakhirbiru + 1;
	      	}

	      	if($hukmerahj4 < $hukbiruj4 AND $merahempatnyala == 0 AND $biruempatnyala == 0) {
	      		$merahempatnyala = 1;
	      		$skorakhirmerah = $skorakhirmerah + 1;
	      	}

	      	if($hukbiruj4 < $hukmerahj4 AND $merahempatnyala == 0 AND $biruempatnyala == 0) {
	      		$biruempatnyala = 1;
	      		$skorakhirbiru = $skorakhirbiru + 1;
	      	}

	      	if($merahj4p1plus3 > $biruj4p1plus3 AND $merahempatnyala == 0 AND $biruempatnyala == 0) {
	      		$merahempatnyala = 1;
	      		$skorakhirmerah = $skorakhirmerah + 1;
	      	}

	      	if($biruj4p1plus3 > $merahj4p1plus3 AND $merahempatnyala == 0 AND $biruempatnyala == 0) {
	      		$biruempatnyala = 1;
	      		$skorakhirbiru = $skorakhirbiru + 1;
	      	}

	      	if($merahj4p3 > $biruj4p3 AND $merahempatnyala == 0 AND $biruempatnyala == 0) {
	      		$merahempatnyala = 1;
	      		$skorakhirmerah = $skorakhirmerah + 1;
	      	}

	      	if($biruj4p3 > $merahj4p3 AND $merahempatnyala == 0 AND $biruempatnyala == 0) {
	      		$biruempatnyala = 1;
	      		$skorakhirbiru = $skorakhirbiru + 1;
	      	}

	      	if($merahj4p1plus2 > $biruj4p1plus2 AND $merahempatnyala == 0 AND $biruempatnyala == 0) {
	      		$merahempatnyala = 1;
	      		$skorakhirmerah = $skorakhirmerah + 1;
	      	}

	      	if($biruj4p1plus2 > $merahj4p1plus2  AND $merahempatnyala == 0 AND $biruempatnyala == 0) {
	      		$biruempatnyala = 1;
	      		$skorakhirbiru = $skorakhirbiru + 1;
	      	}

	      	if($merahj4p2 > $biruj4p2 AND $merahempatnyala == 0 AND $biruempatnyala == 0) {
	      		$merahempatnyala = 1;
	      		$skorakhirmerah = $skorakhirmerah + 1;
	      	}

	      	if($biruj4p2 > $merahj4p2 AND $merahempatnyala == 0 AND $biruempatnyala == 0) {
	      		$biruempatnyala = 1;
	      		$skorakhirbiru = $skorakhirbiru + 1;
	      	}

	      	if($merahj4p1plus1 > $biruj4p1plus1 AND $merahempatnyala == 0 AND $biruempatnyala == 0) {
	      		$merahempatnyala = 1;
	      		$skorakhirmerah = $skorakhirmerah + 1;
	      	}

	      	if($biruj4p1plus1 > $merahj4p1plus1  AND $merahempatnyala == 0 AND $biruempatnyala == 0) {
	      		$biruempatnyala = 1;
	      		$skorakhirbiru = $skorakhirbiru + 1;
	      	}

	      	if($merahj4p1 > $biruj4p1 AND $merahempatnyala == 0 AND $biruempatnyala == 0) {
	      		$merahempatnyala = 1;
	      		$skorakhirmerah = $skorakhirmerah + 1;
	      	}

	      	if($biruj4p1 > $merahj4p1 AND $merahempatnyala == 0 AND $biruempatnyala == 0) {
	      		$biruempatnyala = 1;
	      		$skorakhirbiru = $skorakhirbiru + 1;
	      	}

	      	//NYALA JURI 5
	      	if($totalwasitjuri5merah > $totalwasitjuri5biru) {
	      		$merahlimanyala = 1;
	      		$skorakhirmerah = $skorakhirmerah + 1;
	      	}

	      	if($totalwasitjuri5biru > $totalwasitjuri5merah) {
	      		$birulimanyala = 1;
	      		$skorakhirbiru = $skorakhirbiru + 1;
	      	}

	      	if($hukmerahj5 < $hukbiruj5 AND $merahlimanyala == 0 AND $birulimanyala == 0) {
	      		$merahlimanyala = 1;
	      		$skorakhirmerah = $skorakhirmerah + 1;
	      	}

	      	if($hukbiruj5 < $hukmerahj5 AND $merahlimanyala == 0 AND $birulimanyala == 0) {
	      		$birulimanyala = 1;
	      		$skorakhirbiru = $skorakhirbiru + 1;
	      	}

	      	if($merahj5p1plus3 > $biruj5p1plus3 AND $merahlimanyala == 0 AND $birulimanyala == 0) {
	      		$merahlimanyala = 1;
	      		$skorakhirmerah = $skorakhirmerah + 1;
	      	}

	      	if($biruj5p1plus3 > $merahj5p1plus3 AND $merahlimanyala == 0 AND $birulimanyala == 0) {
	      		$birulimanyala = 1;
	      		$skorakhirbiru = $skorakhirbiru + 1;
	      	}

	      	if($merahj5p3 > $biruj5p3 AND $merahlimanyala == 0 AND $birulimanyala == 0) {
	      		$merahlimanyala = 1;
	      		$skorakhirmerah = $skorakhirmerah + 1;
	      	}

	      	if($biruj5p3 > $merahj5p3 AND $merahlimanyala == 0 AND $birulimanyala == 0) {
	      		$birulimanyala = 1;
	      		$skorakhirbiru = $skorakhirbiru + 1;
	      	}

	      	if($merahj5p1plus2 > $biruj5p1plus2 AND $merahlimanyala == 0 AND $birulimanyala == 0) {
	      		$merahlimanyala = 1;
	      		$skorakhirmerah = $skorakhirmerah + 1;
	      	}

	      	if($biruj5p1plus2 > $merahj5p1plus2  AND $merahlimanyala == 0 AND $birulimanyala == 0) {
	      		$birulimanyala = 1;
	      		$skorakhirbiru = $skorakhirbiru + 1;
	      	}

	      	if($merahj5p2 > $biruj5p2 AND $merahlimanyala == 0 AND $birulimanyala == 0) {
	      		$merahlimanyala = 1;
	      		$skorakhirmerah = $skorakhirmerah + 1;
	      	}

	      	if($biruj5p2 > $merahj5p2 AND $merahlimanyala == 0 AND $birulimanyala == 0) {
	      		$birulimanyala = 1;
	      		$skorakhirbiru = $skorakhirbiru + 1;
	      	}

	      	if($merahj5p1plus1 > $biruj5p1plus1 AND $merahlimanyala == 0 AND $birulimanyala == 0) {
	      		$merahlimanyala = 1;
	      		$skorakhirmerah = $skorakhirmerah + 1;
	      	}

	      	if($biruj5p1plus1 > $merahj5p1plus1  AND $merahlimanyala == 0 AND $birulimanyala == 0) {
	      		$birulimanyala = 1;
	      		$skorakhirbiru = $skorakhirbiru + 1;
	      	}

	      	if($merahj5p1 > $biruj5p1 AND $merahlimanyala == 0 AND $birulimanyala == 0) {
	      		$merahlimanyala = 1;
	      		$skorakhirbiru = $skorakhirbiru + 1;
	      	}

	      	if($biruj5p1 > $merahj5p1 AND $merahlimanyala == 0 AND $birulimanyala == 0) {
	      		$birulimanyala = 1;
	      		$skorakhirbiru = $skorakhirbiru + 1;
	      	}

	    ?>
	    <tr class="text-center" style="font-size: 22px; font-weight: bold;">
	      	<?php 
	      		//juri 1 merah
	      		if($merahsatunyala == 1) {
	      			echo "<td bgcolor=red><font color=white>".$totalwasitjuri1merah."</font></td>";
	      		} else {
	      			echo "<td>".$totalwasitjuri1merah."</td>";
	      		}

	      		//juri 2 merah
	      		if($merahduanyala == 1) {
	      			echo "<td bgcolor=red><font color=white>".$totalwasitjuri2merah."</font></td>";
	      		} else {
	      			echo "<td>".$totalwasitjuri2merah."</td>";
	      		}

	      		//juri 3 merah
	      		if($merahtiganyala == 1) {
	      			echo "<td bgcolor=red><font color=white>".$totalwasitjuri3merah."</font></td>";
	      		} else {
	      			echo "<td>".$totalwasitjuri3merah."</td>";
	      		}

	      		//juri 4 merah
	      		if($merahempatnyala == 1) {
	      			echo "<td bgcolor=red><font color=white>".$totalwasitjuri4merah."</font></td>";
	      		} else {
	      			echo "<td>".$totalwasitjuri4merah."</td>";
	      		}

	      		//juri 5 merah
	      		if($merahlimanyala == 1) {
	      			echo "<td bgcolor=red><font color=white>".$totalwasitjuri5merah."</font></td>";
	      		} else {
	      			echo "<td>".$totalwasitjuri5merah."</td>";
	      		}
	      	?>
	      <td bgcolor="#F5F5F5" style="font-size: 22px; font-weight: bold;">TOTAL</td>
	      	<?php
	      		//juri 1 biru
	      		if($birusatunyala == 1) {
	      			echo "<td bgcolor=blue><font color=white>".$totalwasitjuri1biru."</font></td>";
	      		} else {
	      			echo "<td>".$totalwasitjuri1biru."</td>";
	      		}

	      		//juri 2 biru
	      		if($biruduanyala == 1) {
	      			echo "<td bgcolor=blue><font color=white>".$totalwasitjuri2biru."</font></td>";
	      		} else {
	      			echo "<td>".$totalwasitjuri2biru."</td>";
	      		}

	      		//juri 3 biru
	      		if($birutiganyala == 1) {
	      			echo "<td bgcolor=blue><font color=white>".$totalwasitjuri3biru."</font></td>";
	      		} else {
	      			echo "<td>".$totalwasitjuri3biru."</td>";
	      		}

	      		//juri 4 biru
	      		if($biruempatnyala == 1) {
	      			echo "<td bgcolor=blue><font color=white>".$totalwasitjuri4biru."</font></td>";
	      		} else {
	      			echo "<td>".$totalwasitjuri4biru."</td>";
	      		}

	      		//juri 5 biru
	      		if($birulimanyala == 1) {
	      			echo "<td bgcolor=blue><font color=white>".$totalwasitjuri5biru."</font></td>";
	      		} else {
	      			echo "<td>".$totalwasitjuri5biru."</td>";
	      		}
	      	?>
	    </tr>

    <tr class="text-center" bgcolor="#16C367" style="font-size: 24px; color: white;">
      <td colspan="5">
      	<b>
      	<?php
      		echo $skorakhirmerah;
      	?>
      	</b>
      </td>
      <td><b>SKOR</b></td>
      <td colspan="5">
      	<b>
      	<?php
      		echo $skorakhirbiru;
      	?>
      	</b>
      </td>
    </tr>
  </tbody>
</table>
</div>
<div class="table-responsive">
	<table class="table">
		<tr>
			<td class="text-left">
				<a href="index.php" class="btn btn-warning" role="button">KEMBALI</a>
			</td>
			<td class="text-right">
				<form name="SetorNilai" id="SetorNilai" method="POST" action="setor_nilai.php" onclick="return cek_selesai();">
					<?php
						if($skorakhirmerah > $skorakhirbiru) {
							$pemenang = $jadwal['nm_merah']." (".$jadwal['kontingen_merah'].")";
						} else {
							$pemenang = $jadwal['nm_biru']." (".$jadwal['kontingen_biru'].")";
						}
						//echo $skorakhirmerah;
						//echo $skorakhirbiru;
						//echo $pemenang;
					?>
					<input type="hidden" name="skorakhirmerah" id="skorakhirmerah" value="<?php echo $skorakhirmerah; ?>">
					<input type="hidden" name="skorakhirbiru" id="skorakhirbiru" value="<?php echo $skorakhirbiru; ?>">
					<input type="hidden" name="pemenang" id="pemenang" value="<?php echo $pemenang; ?>">
					<input type="hidden" name="id_partai" id="id_partai" value="<?php echo $id_partai; ?>">
					<input type="submit" class="btn btn-info" value="SELESAI">
				</form>
			</td>
		</tr>
	</table>
</div>
</div>
<script type="text/javascript">
	setInterval(function(){
		$.ajax({
            url: 'http://localhost/skordigital/nilai/api.php', 
            data : {'a' : 'get_data_view_tanding', 'id_partai': <?=$_GET["id_partai"]?>},
            type: "GET",
            success: function(obj){
            	$('.content_penilaian').html(obj);

            	console.log('Request ... Done');
            }
        });
	}, 2000);

    var var_start_timer = true;
    var var_stop = false;
    var interval= "";
	var resume_time = function(){
		if(var_stop)
    	{
    		return false;
    	}
        if(var_start_timer)
        {
            $('.btn-stop').html(' RESUME');
            var_start_timer = false;
        }
        else
        {
            var_start_timer = true;
            $('.btn-stop').html(' PAUSE');
        }
    }
    function stop_time()
    {	
    	var_stop = true;
        $(".waktu").html("00:00");
        clearInterval(interval);
    }
    function init_start()
    {
        clearInterval(interval);
        var duration = 60 * 1.5; // 2 Menit         
        var_stop = false;
        var_start_timer = true;

    	start_time(duration)	
    }
    function start_time(duration) 
    {
        var timer = duration, minutes, seconds;

        interval = setInterval(function () {
        	if(var_stop)
	    	{
	    		return false;
	    	}

            if(var_start_timer == false)
            {
                return false;
            }

            minutes = parseInt(timer / 60, 10)
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            if (--timer < 0) {
            	var_stop = true;
                $(".waktu").html("WAKTU HABIS");
        		clearInterval(interval);
            }
            else
            {
                $(".waktu").html(minutes + ":" + seconds);
            }
        }, 1000);
    }

</script>
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
</body>
</html>


