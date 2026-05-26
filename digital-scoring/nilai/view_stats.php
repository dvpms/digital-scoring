<?php

	include "../backend/includes/connection.php";

	//dapatkan ID jadwal pertandingan
	$id_partai = mysqli_real_escape_string($koneksi, $_GET["id_partai"]);

	//Mencari data jadwal pertandingan
	$cari_jadwal = mysqli_query($koneksi,"SELECT * FROM jadwal_tanding WHERE id_partai='$id_partai'");
	$jadwal = mysqli_fetch_array($cari_jadwal);
	//---------------------------------

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
	
	
	//PERSENTASE POV JURI 1 untuk MERAH dan BIRU
	$persenmerahpovjuri1 = mysqli_query($koneksi,"SELECT COUNT(button) AS merahpovjuri1 FROM nilai_tanding 
									WHERE id_jadwal='$id_partai'
				                    AND id_juri='1'
				                    AND nilai NOT LIKE '-%' 
				                    AND sudut='MERAH'");
	$merahpovjuri1 = mysqli_fetch_array($persenmerahpovjuri1);

	$persenbirupovjuri1 = mysqli_query($koneksi,"SELECT COUNT(button) AS birupovjuri1 FROM nilai_tanding 
									WHERE id_jadwal='$id_partai'
				                    AND id_juri='1'
				                    AND nilai NOT LIKE '-%' 
				                    AND sudut='BIRU'");
	$birupovjuri1 = mysqli_fetch_array($persenbirupovjuri1);

	$totalpovjuri1 = $merahpovjuri1['merahpovjuri1'] + $birupovjuri1['birupovjuri1'];
	if ($totalpovjuri1 == 0) {
		$totalpovjuri1 = 1;
	}
	//echo $totalpovjuri1;

	$merahpovjuri1 = ($merahpovjuri1['merahpovjuri1']/$totalpovjuri1)*100;

	$birupovjuri1 = ($birupovjuri1['birupovjuri1']/$totalpovjuri1)*100;
	//---------------------------------

	//PERSENTASE POV JURI 2 untuk MERAH dan BIRU
	$persenmerahpovjuri2 = mysqli_query($koneksi,"SELECT COUNT(button) AS merahpovjuri2 FROM nilai_tanding 
									WHERE id_jadwal='$id_partai'
				                    AND id_juri='2'
				                    AND nilai NOT LIKE '-%' 
				                    AND sudut='MERAH'");
	$merahpovjuri2 = mysqli_fetch_array($persenmerahpovjuri2);

	$persenbirupovjuri2 = mysqli_query($koneksi,"SELECT COUNT(button) AS birupovjuri2 FROM nilai_tanding 
									WHERE id_jadwal='$id_partai'
				                    AND id_juri='2' 
				                    AND nilai NOT LIKE '-%'
				                    AND sudut='BIRU'");
	$birupovjuri2 = mysqli_fetch_array($persenbirupovjuri2);

	$totalpovjuri2 = $merahpovjuri2['merahpovjuri2'] + $birupovjuri2['birupovjuri2'];
	if($totalpovjuri2 == 0) {
		$totalpovjuri2 = 1;
	}
	//echo $totalpovjuri2;

	$merahpovjuri2 = ($merahpovjuri2['merahpovjuri2']/$totalpovjuri2)*100;

	$birupovjuri2 = ($birupovjuri2['birupovjuri2']/$totalpovjuri2)*100;
	//---------------------------------

	//PERSENTASE POV JURI 3 untuk MERAH dan BIRU
	$persenmerahpovjuri3 = mysqli_query($koneksi,"SELECT COUNT(button) AS merahpovjuri3 FROM nilai_tanding 
									WHERE id_jadwal='$id_partai'
				                    AND id_juri='3' 
				                    AND nilai NOT LIKE '-%'
				                    AND sudut='MERAH'");
	$merahpovjuri3 = mysqli_fetch_array($persenmerahpovjuri3);

	$persenbirupovjuri3 = mysqli_query($koneksi,"SELECT COUNT(button) AS birupovjuri3 FROM nilai_tanding 
									WHERE id_jadwal='$id_partai'
				                    AND id_juri='3' 
				                    AND nilai NOT LIKE '-%'
				                    AND sudut='BIRU'");
	$birupovjuri3 = mysqli_fetch_array($persenbirupovjuri3);

	$totalpovjuri3 = $merahpovjuri3['merahpovjuri3'] + $birupovjuri3['birupovjuri3'];
	//echo $totalpovjuri3;
	if($totalpovjuri3 == 0) {
		$totalpovjuri3 = 1;
	}

	$merahpovjuri3 = ($merahpovjuri3['merahpovjuri3']/$totalpovjuri3)*100;

	$birupovjuri3 = ($birupovjuri3['birupovjuri3']/$totalpovjuri3)*100;
	//---------------------------------

	//PERSENTASE POV JURI 4 untuk MERAH dan BIRU
	$persenmerahpovjuri4 = mysqli_query($koneksi,"SELECT COUNT(button) AS merahpovjuri4 FROM nilai_tanding 
									WHERE id_jadwal='$id_partai'
				                    AND id_juri='4'
				                    AND nilai NOT LIKE '-%' 
				                    AND sudut='MERAH'");
	$merahpovjuri4 = mysqli_fetch_array($persenmerahpovjuri4);

	$persenbirupovjuri4 = mysqli_query($koneksi,"SELECT COUNT(button) AS birupovjuri4 FROM nilai_tanding 
									WHERE id_jadwal='$id_partai'
				                    AND id_juri='4'
				                    AND nilai NOT LIKE '-%'
				                    AND sudut='BIRU'");
	$birupovjuri4 = mysqli_fetch_array($persenbirupovjuri4);

	$totalpovjuri4 = $merahpovjuri4['merahpovjuri4'] + $birupovjuri4['birupovjuri4'];
	if($totalpovjuri4 == 0) {
		$totalpovjuri4 = 1;
	}
	//echo $totalpovjuri4;

	$merahpovjuri4 = ($merahpovjuri4['merahpovjuri4']/$totalpovjuri4)*100;

	$birupovjuri4 = ($birupovjuri4['birupovjuri4']/$totalpovjuri4)*100;
	//---------------------------------

	//PERSENTASE POV JURI 5 untuk MERAH dan BIRU
	$persenmerahpovjuri5 = mysqli_query($koneksi,"SELECT COUNT(button) AS merahpovjuri5 FROM nilai_tanding 
									WHERE id_jadwal='$id_partai'
				                    AND id_juri='5' 
				                    AND nilai NOT LIKE '-%'
				                    AND sudut='MERAH'");
	$merahpovjuri5 = mysqli_fetch_array($persenmerahpovjuri5);

	$persenbirupovjuri5 = mysqli_query($koneksi,"SELECT COUNT(button) AS birupovjuri5 FROM nilai_tanding 
									WHERE id_jadwal='$id_partai'
				                    AND id_juri='5'
				                    AND nilai NOT LIKE '-%'
				                    AND sudut='BIRU'");
	$birupovjuri5 = mysqli_fetch_array($persenbirupovjuri5);

	$totalpovjuri5 = $merahpovjuri5['merahpovjuri5'] + $birupovjuri5['birupovjuri5'];
	if($totalpovjuri5 == 0) {
		$totalpovjuri5 = 1;
	}
	//echo $totalpovjuri5;

	$merahpovjuri5 = ($merahpovjuri5['merahpovjuri5']/$totalpovjuri5)*100;

	$birupovjuri5 = ($birupovjuri5['birupovjuri5']/$totalpovjuri5)*100;
	//---------------------------------


	// ********** HUKUMAN ***************
	//HUKUMAN NILAI MERAH
	// HUKUMAN MERAH JURI 1
	$hukmerahj1min1 = mysqli_query($koneksi,"SELECT COUNT(button) AS merahj1min1 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=1 AND button='-1' AND sudut='MERAH' ");
	$merahj1min1 = mysqli_fetch_array($hukmerahj1min1);

	$hukmerahj1min2 = mysqli_query($koneksi,"SELECT COUNT(button) AS merahj1min2 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=1 AND button='-2' AND sudut='MERAH' ");
	$merahj1min2 = mysqli_fetch_array($hukmerahj1min2);

	$hukmerahj1min5 = mysqli_query($koneksi,"SELECT COUNT(button) AS merahj1min5 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=1 AND button='-5' AND sudut='MERAH' ");
	$merahj1min5 = mysqli_fetch_array($hukmerahj1min5);

	// HUKUMAN MERAH JURI 2
	$hukmerahj2min1 = mysqli_query($koneksi,"SELECT COUNT(button) AS merahj2min1 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=2 AND button='-1' AND sudut='MERAH' ");
	$merahj2min1 = mysqli_fetch_array($hukmerahj2min1);

	$hukmerahj2min2 = mysqli_query($koneksi,"SELECT COUNT(button) AS merahj2min2 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=2 AND button='-2' AND sudut='MERAH' ");
	$merahj2min2 = mysqli_fetch_array($hukmerahj2min2);

	$hukmerahj2min5 = mysqli_query($koneksi,"SELECT COUNT(button) AS merahj2min5 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=2 AND button='-5' AND sudut='MERAH' ");
	$merahj2min5 = mysqli_fetch_array($hukmerahj2min5);

	// HUKUMAN MERAH JURI 3
	$hukmerahj3min1 = mysqli_query($koneksi,"SELECT COUNT(button) AS merahj3min1 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=3 AND button='-1' AND sudut='MERAH' ");
	$merahj3min1 = mysqli_fetch_array($hukmerahj3min1);

	$hukmerahj3min2 = mysqli_query($koneksi,"SELECT COUNT(button) AS merahj3min2 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=3 AND button='-2' AND sudut='MERAH' ");
	$merahj3min2 = mysqli_fetch_array($hukmerahj3min2);

	$hukmerahj3min5 = mysqli_query($koneksi,"SELECT COUNT(button) AS merahj3min5 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=3 AND button='-5' AND sudut='MERAH' ");
	$merahj3min5 = mysqli_fetch_array($hukmerahj3min5);

	// HUKUMAN MERAH JURI 4
	$hukmerahj4min1 = mysqli_query($koneksi,"SELECT COUNT(button) AS merahj4min1 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=4 AND button='-1' AND sudut='MERAH' ");
	$merahj4min1 = mysqli_fetch_array($hukmerahj4min1);

	$hukmerahj4min2 = mysqli_query($koneksi,"SELECT COUNT(button) AS merahj4min2 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=4 AND button='-2' AND sudut='MERAH' ");
	$merahj4min2 = mysqli_fetch_array($hukmerahj4min2);

	$hukmerahj4min5 = mysqli_query($koneksi,"SELECT COUNT(button) AS merahj4min5 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=4 AND button='-5' AND sudut='MERAH' ");
	$merahj4min5 = mysqli_fetch_array($hukmerahj4min5);

	// HUKUMAN MERAH JURI 5
	$hukmerahj5min1 = mysqli_query($koneksi,"SELECT COUNT(button) AS merahj5min1 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=5 AND button='-1' AND sudut='MERAH' ");
	$merahj5min1 = mysqli_fetch_array($hukmerahj5min1);

	$hukmerahj5min2 = mysqli_query($koneksi,"SELECT COUNT(button) AS merahj5min2 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=5 AND button='-2' AND sudut='MERAH' ");
	$merahj5min2 = mysqli_fetch_array($hukmerahj5min2);

	$hukmerahj5min5 = mysqli_query($koneksi,"SELECT COUNT(button) AS merahj5min5 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=5 AND button='-5' AND sudut='MERAH' ");
	$merahj5min5 = mysqli_fetch_array($hukmerahj5min5);

	// *******************
	// *********** END HUKUMAN MERAH ***********

	// ********** HUKUMAN ***************
	//HUKUMAN NILAI BIRU
	// HUKUMAN BIRU JURI 1
	$hukbiruj1min1 = mysqli_query($koneksi,"SELECT COUNT(button) AS biruj1min1 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=1 AND button='-1' AND sudut='BIRU' ");
	$biruj1min1 = mysqli_fetch_array($hukbiruj1min1);

	$hukbiruj1min2 = mysqli_query($koneksi,"SELECT COUNT(button) AS biruj1min2 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=1 AND button='-2' AND sudut='BIRU' ");
	$biruj1min2 = mysqli_fetch_array($hukbiruj1min2);

	$hukbiruj1min5 = mysqli_query($koneksi,"SELECT COUNT(button) AS biruj1min5 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=1 AND button='-5' AND sudut='BIRU' ");
	$biruj1min5 = mysqli_fetch_array($hukbiruj1min5);

	// HUKUMAN BIRU JURI 2
	$hukbiruj2min1 = mysqli_query($koneksi,"SELECT COUNT(button) AS biruj2min1 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=2 AND button='-1' AND sudut='BIRU' ");
	$biruj2min1 = mysqli_fetch_array($hukbiruj2min1);

	$hukbiruj2min2 = mysqli_query($koneksi,"SELECT COUNT(button) AS biruj2min2 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=2 AND button='-2' AND sudut='BIRU' ");
	$biruj2min2 = mysqli_fetch_array($hukbiruj2min2);

	$hukbiruj2min5 = mysqli_query($koneksi,"SELECT COUNT(button) AS biruj2min5 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=2 AND button='-5' AND sudut='BIRU' ");
	$biruj2min5 = mysqli_fetch_array($hukbiruj2min5);

	// HUKUMAN BIRU JURI 3
	$hukbiruj3min1 = mysqli_query($koneksi,"SELECT COUNT(button) AS biruj3min1 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=3 AND button='-1' AND sudut='BIRU' ");
	$biruj3min1 = mysqli_fetch_array($hukbiruj3min1);

	$hukbiruj3min2 = mysqli_query($koneksi,"SELECT COUNT(button) AS biruj3min2 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=3 AND button='-2' AND sudut='BIRU' ");
	$biruj3min2 = mysqli_fetch_array($hukbiruj3min2);

	$hukbiruj3min5 = mysqli_query($koneksi,"SELECT COUNT(button) AS biruj3min5 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=3 AND button='-5' AND sudut='BIRU' ");
	$biruj3min5 = mysqli_fetch_array($hukbiruj3min5);

	// HUKUMAN BIRU JURI 4
	$hukbiruj4min1 = mysqli_query($koneksi,"SELECT COUNT(button) AS biruj4min1 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=4 AND button='-1' AND sudut='BIRU' ");
	$biruj4min1 = mysqli_fetch_array($hukbiruj4min1);

	$hukbiruj4min2 = mysqli_query($koneksi,"SELECT COUNT(button) AS biruj4min2 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=4 AND button='-2' AND sudut='BIRU' ");
	$biruj4min2 = mysqli_fetch_array($hukbiruj4min2);

	$hukbiruj4min5 = mysqli_query($koneksi,"SELECT COUNT(button) AS biruj4min5 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=4 AND button='-5' AND sudut='BIRU' ");
	$biruj4min5 = mysqli_fetch_array($hukbiruj4min5);

	// HUKUMAN BIRU JURI 5
	$hukbiruj5min1 = mysqli_query($koneksi,"SELECT COUNT(button) AS biruj5min1 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=5 AND button='-1' AND sudut='BIRU' ");
	$biruj5min1 = mysqli_fetch_array($hukbiruj5min1);

	$hukbiruj5min2 = mysqli_query($koneksi,"SELECT COUNT(button) AS biruj5min2 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=5 AND button='-2' AND sudut='BIRU' ");
	$biruj5min2 = mysqli_fetch_array($hukbiruj5min2);

	$hukbiruj5min5 = mysqli_query($koneksi,"SELECT COUNT(button) AS biruj5min5 FROM nilai_tanding
									WHERE id_jadwal='$id_partai'
									AND id_juri=5 AND button='-5' AND sudut='BIRU' ");
	$biruj5min5 = mysqli_fetch_array($hukbiruj5min5);

	// *******************
	// *********** END HUKUMAN BIRU ***********

	
?>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="robots" content="noindex">
		<meta http-equiv="refresh" content="3" />
  		<link rel="stylesheet" href="css/bootstrap.min.css">
  		<script src="js/jquery.min.js"></script>
  		<script src="js/bootstrap.min.js"></script>
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
			<center>
				<h3>STATISTIK PERTANDINGAN</h3>
				<h3>PARTAI : <?php echo $jadwal['partai']." ".$jadwal['gelanggang']." - (".$jadwal['kelas'].")"; ?></h3>
			</center>
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr class="text-center">
						<td colspan="5" width="40%" bgcolor="red" style="color: white;"><?php echo $jadwal['nm_merah']; ?></td>
						<td bgcolor="#F2F2F2" style="font-weight: bold;">SKOR</td>
						<td colspan="5" width="40%" bgcolor="blue" style="color: white;"><?php echo $jadwal['nm_biru']; ?></td>
					</tr>
					<tr class="text-center">
						<td colspan="5" bgcolor="red" style="color: white;"><?php echo $jadwal['kontingen_merah']; ?></td>
						<td><?php echo $jadwal['status']; ?></td>
						<td colspan="5" bgcolor="blue" style="color: white;"><?php echo $jadwal['kontingen_biru']; ?></td>
					</tr>
					<tr class="text-center" style="font-weight: bold;">
						<td colspan="11" bgcolor="yellow">DETAIL POIN</td>
					</tr>
					<tr bgcolor="#F2F2F2" class="text-center" style="font-weight: bold;">
						<td>JURI 1</td>
						<td>JURI 2</td>
						<td>JURI 3</td>
						<td>JURI 4</td>
						<td>JURI 5</td>
						<td>POIN</td>
						<td>JURI 1</td>
						<td>JURI 2</td>
						<td>JURI 3</td>
						<td>JURI 4</td>
						<td>JURI 5</td>
					</tr>
					<tr class="text-center" style="font-weight: bold;">
						<td><?php echo $merahj1p1[0]; ?></td>
						<td><?php echo $merahj2p1[0]; ?></td>
						<td><?php echo $merahj3p1[0]; ?></td>
						<td><?php echo $merahj4p1[0]; ?></td>
						<td><?php echo $merahj5p1[0]; ?></td>
						<td bgcolor="#F2F2F2">1</td>
						<td><?php echo $biruj1p1[0]; ?></td>
						<td><?php echo $biruj2p1[0]; ?></td>
						<td><?php echo $biruj3p1[0]; ?></td>
						<td><?php echo $biruj4p1[0]; ?></td>
						<td><?php echo $biruj5p1[0]; ?></td>
					</tr>
					<tr class="text-center" style="font-weight: bold;">
						<td><?php echo $merahj1p2[0]; ?></td>
						<td><?php echo $merahj2p2[0]; ?></td>
						<td><?php echo $merahj3p2[0]; ?></td>
						<td><?php echo $merahj4p2[0]; ?></td>
						<td><?php echo $merahj5p2[0]; ?></td>
						<td bgcolor="#F2F2F2">2</td>
						<td><?php echo $biruj1p2[0]; ?></td>
						<td><?php echo $biruj2p2[0]; ?></td>
						<td><?php echo $biruj3p2[0]; ?></td>
						<td><?php echo $biruj4p2[0]; ?></td>
						<td><?php echo $biruj5p2[0]; ?></td>
					</tr>
					<tr class="text-center" style="font-weight: bold;">
						<td><?php echo $merahj1p3[0]; ?></td>
						<td><?php echo $merahj2p3[0]; ?></td>
						<td><?php echo $merahj3p3[0]; ?></td>
						<td><?php echo $merahj4p3[0]; ?></td>
						<td><?php echo $merahj5p3[0]; ?></td>
						<td bgcolor="#F2F2F2">3</td>
						<td><?php echo $biruj1p3[0]; ?></td>
						<td><?php echo $biruj2p3[0]; ?></td>
						<td><?php echo $biruj3p3[0]; ?></td>
						<td><?php echo $biruj4p3[0]; ?></td>
						<td><?php echo $biruj5p3[0]; ?></td>
					</tr>
					<tr class="text-center" style="font-weight: bold;">
						<td><?php echo $merahj1p1plus1[0]; ?></td>
						<td><?php echo $merahj2p1plus1[0]; ?></td>
						<td><?php echo $merahj3p1plus1[0]; ?></td>
						<td><?php echo $merahj4p1plus1[0]; ?></td>
						<td><?php echo $merahj5p1plus1[0]; ?></td>
						<td bgcolor="#F2F2F2">1+1</td>
						<td><?php echo $biruj1p1plus1[0]; ?></td>
						<td><?php echo $biruj2p1plus1[0]; ?></td>
						<td><?php echo $biruj3p1plus1[0]; ?></td>
						<td><?php echo $biruj4p1plus1[0]; ?></td>
						<td><?php echo $biruj5p1plus1[0]; ?></td>
					</tr>
					<tr class="text-center" style="font-weight: bold;">
						<td><?php echo $merahj1p1plus2[0]; ?></td></td>
						<td><?php echo $merahj2p1plus2[0]; ?></td>
						<td><?php echo $merahj3p1plus2[0]; ?></td>
						<td><?php echo $merahj4p1plus2[0]; ?></td>
						<td><?php echo $merahj5p1plus2[0]; ?></td>
						<td bgcolor="#F2F2F2">1+2</td>
						<td><?php echo $biruj1p1plus2[0]; ?></td></td>
						<td><?php echo $biruj2p1plus2[0]; ?></td>
						<td><?php echo $biruj3p1plus2[0]; ?></td>
						<td><?php echo $biruj4p1plus2[0]; ?></td>
						<td><?php echo $biruj5p1plus2[0]; ?></td>
					</tr>
					<tr class="text-center" style="font-weight: bold;">
						<td><?php echo $merahj1p1plus3[0]; ?></td>
						<td><?php echo $merahj2p1plus3[0]; ?></td>
						<td><?php echo $merahj3p1plus3[0]; ?></td>
						<td><?php echo $merahj4p1plus3[0]; ?></td>
						<td><?php echo $merahj5p1plus3[0]; ?></td>
						<td bgcolor="#F2F2F2">1+3</td>
						<td><?php echo $biruj1p1plus3[0]; ?></td>
						<td><?php echo $biruj2p1plus3[0]; ?></td>
						<td><?php echo $biruj3p1plus3[0]; ?></td>
						<td><?php echo $biruj4p1plus3[0]; ?></td>
						<td><?php echo $biruj5p1plus3[0]; ?></td>
					</tr>
					<tr class="text-center" style="font-weight: bold;">
						<td colspan="11" bgcolor="yellow">DETAIL HUKUMAN</td>
					</tr>
					<tr bgcolor="#F2F2F2" class="text-center" style="font-weight: bold;">
						<td>JURI 1</td>
						<td>JURI 2</td>
						<td>JURI 3</td>
						<td>JURI 4</td>
						<td>JURI 5</td>
						<td>HUKUMAN</td>
						<td>JURI 1</td>
						<td>JURI 2</td>
						<td>JURI 3</td>
						<td>JURI 4</td>
						<td>JURI 5</td>
					</tr>
					<tr class="text-center" style="font-weight: bold;">
						<td><?php echo $merahj1min1[0]; ?></td>
						<td><?php echo $merahj2min1[0]; ?></td>
						<td><?php echo $merahj3min1[0]; ?></td>
						<td><?php echo $merahj4min1[0]; ?></td>
						<td><?php echo $merahj5min1[0]; ?></td>
						<td bgcolor="#F2F2F2">-1</td>
						<td><?php echo $biruj1min1[0]; ?></td>
						<td><?php echo $biruj2min1[0]; ?></td>
						<td><?php echo $biruj3min1[0]; ?></td>
						<td><?php echo $biruj4min1[0]; ?></td>
						<td><?php echo $biruj5min1[0]; ?></td>
					</tr>
					<tr class="text-center" style="font-weight: bold;">
						<td><?php echo $merahj1min2[0]; ?></td>
						<td><?php echo $merahj2min2[0]; ?></td>
						<td><?php echo $merahj3min2[0]; ?></td>
						<td><?php echo $merahj4min2[0]; ?></td>
						<td><?php echo $merahj5min2[0]; ?></td>
						<td bgcolor="#F2F2F2">-2</td>
						<td><?php echo $biruj1min2[0]; ?></td>
						<td><?php echo $biruj2min2[0]; ?></td>
						<td><?php echo $biruj3min2[0]; ?></td>
						<td><?php echo $biruj4min2[0]; ?></td>
						<td><?php echo $biruj5min2[0]; ?></td>
					</tr>
					<tr class="text-center" style="font-weight: bold;">
						<td><?php echo $merahj1min5[0]; ?></td>
						<td><?php echo $merahj2min5[0]; ?></td>
						<td><?php echo $merahj3min5[0]; ?></td>
						<td><?php echo $merahj4min5[0]; ?></td>
						<td><?php echo $merahj5min5[0]; ?></td>
						<td bgcolor="#F2F2F2">-5</td>
						<td><?php echo $biruj1min5[0]; ?></td>
						<td><?php echo $biruj2min5[0]; ?></td>
						<td><?php echo $biruj3min5[0]; ?></td>
						<td><?php echo $biruj4min5[0]; ?></td>
						<td><?php echo $biruj5min5[0]; ?></td>
					</tr>
				</table>
			</div>
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr class="text-center" bgcolor="yellow" style="font-weight: bold;">
						<td colspan="3">PERSENTASE PENILAIAN SUDUT PANDANG JURI</td>
					</tr>
					<tr class="text-center" style="font-weight: bold;">
						<td><?php echo round($merahpovjuri1,2)."%"; ?></td>
						<td bgcolor="#F2F2F2">JURI 1</td>
						<td><?php echo round($birupovjuri1,2)."%"; ?></td>
					</tr>
					<tr class="text-center" style="font-weight: bold;">
						<td><?php echo round($merahpovjuri2,2)."%"; ?></td>
						<td bgcolor="#F2F2F2">JURI 2</td>
						<td><?php echo round($birupovjuri2,2)."%"; ?></td>
					</tr>
					<tr class="text-center" style="font-weight: bold;">
						<td><?php echo round($merahpovjuri3,2)."%"; ?></td>
						<td bgcolor="#F2F2F2">JURI 3</td>
						<td><?php echo round($birupovjuri3,2)."%"; ?></td>
					</tr>
					<tr class="text-center" style="font-weight: bold;">
						<td><?php echo round($merahpovjuri4,2)."%"; ?></td>
						<td bgcolor="#F2F2F2">JURI 4</td>
						<td><?php echo round($birupovjuri4,2)."%"; ?></td>
					</tr>
					<tr class="text-center" style="font-weight: bold;">
						<td><?php echo round($merahpovjuri5,2)."%"; ?></td>
						<td bgcolor="#F2F2F2">JURI 5</td>
						<td><?php echo round($birupovjuri5,2)."%"; ?></td>
					</tr>
				</table>
			</div>
		</div>

	</body>
</html>