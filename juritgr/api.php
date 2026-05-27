<?php 

include "../backend/includes/connection.php";

// REQUIRED 
// agar bisa di akses oleh android API
header('Access-Control-Allow-Origin: *');

// get ACTION 
$param = isset($_GET['a']) ? $_GET['a'] : ''; 

if("" != $param)
{
	switch($param)
	{
		case "add_disk_ganda":
			
			$id_jadwal = $_POST['id_jadwal'];
			$id_juri = $_POST['id_juri'];

			$sql = "UPDATE nilai_ganda SET teknik_serang=0, mantap_kompak=0, serasi=0,hukum_1=0,hukum_2=0,hukum_3=0,hukum_4=0,hukum_5=0,hukum_6=0 WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

			mysqli_query($koneksi,$sql);

			echo json_encode(['status' => 'success']);
		break;

		case "clear_hukuman_ganda":
			
			$id_jadwal = $_POST['id_jadwal'];
			$id_juri = $_POST['id_juri'];

			$sql = "UPDATE nilai_ganda SET hukum_1=0,hukum_2=0,hukum_3=0,hukum_4=0,hukum_5=0,hukum_6=0 WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

			mysqli_query($koneksi,$sql);

			echo json_encode(['status' => 'success']);
		break;

		case "add_disk_tunggal":
			
			$id_jadwal = $_POST['id_jadwal'];
			$id_juri = $_POST['id_juri'];

			$sql = "UPDATE nilai_tunggal SET jurus1=0,jurus2=0,jurus3=0,jurus4=0,jurus5=0,jurus6=0,jurus7=0,jurus8=0,jurus9=0,jurus10=0,jurus11=0,jurus12=0,jurus13=0,jurus14=0,kemantapan=0,hukum_1=0,hukum_2=0,hukum_3=0,hukum_4=0,hukum_5=0  WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

			mysqli_query($koneksi,$sql);

			echo json_encode(['status' => 'success']);
		break;

		case "clear_hukuman_tunggal":
			
			$id_jadwal = $_POST['id_jadwal'];
			$id_juri = $_POST['id_juri'];

			$sql = "UPDATE nilai_tunggal SET hukum_1=0,hukum_2=0,hukum_3=0,hukum_4=0,hukum_5=0  WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";


			mysqli_query($koneksi,$sql);

			echo json_encode(['status' => 'success']);
		break;

		case "add_disk_regu":
			
			$id_jadwal = $_POST['id_jadwal'];
			$id_juri = $_POST['id_juri'];

			$sql = "UPDATE nilai_regu SET jurus1=0,jurus2=0,jurus3=0,jurus4=0,jurus5=0,jurus6=0,jurus7=0,jurus8=0,jurus9=0,jurus10=0,jurus11=0,jurus12=0,kemantapan=0,hukum_1=0,hukum_2=0,hukum_3=0,hukum_4=0 WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

			mysqli_query($koneksi,$sql);

			echo json_encode(['status' => 'success']);
		break;

		case "clear_hukuman_regu":
			
			$id_jadwal = $_POST['id_jadwal'];
			$id_juri = $_POST['id_juri'];

			$sql = "UPDATE nilai_regu SET hukum_1=0,hukum_2=0,hukum_3=0,hukum_4=0 WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

			mysqli_query($koneksi,$sql);

			echo json_encode(['status' => 'success']);
		break;

		case "insert_first_regu":
			$id_jadwal = $_POST['id_jadwal'];
			$id_juri = $_POST['id_juri'];
			$sql = "SELECT * FROM nilai_regu WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

			$exec = mysqli_query($koneksi,$sql);

			$row = mysqli_fetch_row($exec);
			
			if(!$row)
			{
				$sql = "INSERT INTO nilai_regu (id_jadwal, id_juri, kemantapan) VALUES ({$id_jadwal}, {$id_juri}, 0)";

				mysqli_query($koneksi,$sql);

				$sql = "SELECT * FROM nilai_regu WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

				$exec = mysqli_query($koneksi,$sql);

				$row = mysqli_fetch_row($exec);
			}

			echo json_encode(['status' => 'success', 'sub_total' => ($row[3] + $row[4] + $row[5] + $row[6] + $row[7] + $row[8] + $row[9] + $row[10] + $row[11] + $row[12] + $row[13] + $row[14]), 'kemantapan' => $row[15], 'hukuman_1' => $row[16],'hukuman_2' => $row[17], 'hukuman_3' => $row[18], 'hukuman_4' => $row[19],

				'jurus_1' => $row[3],'jurus_2' => $row[4],'jurus_3' => $row[5],'jurus_4' => $row[6],'jurus_5' => $row[7],'jurus_6' => $row[8],'jurus_7' => $row[9],'jurus_8' => $row[10],'jurus_9' => $row[11],'jurus_10' => $row[12],'jurus_11' => $row[13], 'jurus_12' => $row[14]
			]);

		break;

		case "add_hukuman_waktu_regu":

			$id_jadwal = $_POST['id_jadwal'];
			$id_juri = $_POST['id_juri'];

			$sql = "SELECT * FROM nilai_regu WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

			$exec = mysqli_query($koneksi,$sql);

			$row = mysqli_fetch_row($exec);
			
			if($row)
			{
				$sql = "UPDATE nilai_regu SET hukum_1=". $_POST['nilai']. " WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";
				$exec = mysqli_query($koneksi,$sql);
			}
			
			echo json_encode(['status' => 'success']);
		break;

		case "add_hukuman_regu":

			$id_jadwal = $_POST['id_jadwal'];
			$id_juri = $_POST['id_juri'];

			$sql = "SELECT hukum_1, hukum_2, hukum_3, hukum_4 FROM nilai_regu WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

			$exec = mysqli_query($koneksi,$sql);

			$row = mysqli_fetch_row($exec);
			
			if($row)
			{
				switch ($_POST['hukuman']) {
					case 2:
						$sql = "UPDATE nilai_regu SET hukum_2=". ($row[1] - $_POST['nilai']) . " WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";
						$exec = mysqli_query($koneksi,$sql);
					break;
					case 3:
						$sql = "UPDATE nilai_regu SET hukum_3=". ($row[2] - $_POST['nilai']) . " WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";
						$exec = mysqli_query($koneksi,$sql);
					break;
					case 4:
						$sql = "UPDATE nilai_regu SET hukum_4=". ($row[3] - $_POST['nilai']) . " WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";
						$exec = mysqli_query($koneksi,$sql);
					break;
				}
			}
			
			echo json_encode(['status' => 'success']);
		break;

		case "add_hukuman_regu_pakaian":

			$id_jadwal = $_POST['id_jadwal'];
			$id_juri = $_POST['id_juri'];

			$sql = "SELECT hukum_3 FROM nilai_regu WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

			$exec = mysqli_query($koneksi,$sql);

			$row = mysqli_fetch_row($exec);
			
			if($row)
			{
				$sql = "UPDATE nilai_regu SET hukum_3=". ($_POST['nilai']) . " WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";
				$exec = mysqli_query($koneksi,$sql);
			}
			
			echo json_encode(['status' => 'success']);
		break;

		case "plus_regu":
			$id_jadwal = $_POST['id_jadwal'];
			$id_juri = $_POST['id_juri'];
			$jurus =	$_POST['jurus'];

			$sql = "SELECT * FROM nilai_regu WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

			$exec = mysqli_query($koneksi,$sql);

			$row = mysqli_fetch_row($exec);
			
			if($row)
			{
				switch($jurus)
				{
					case 1:
						$sql = "UPDATE nilai_regu set jurus1=". ($row[3] + 1 ) ." WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

						$exec = mysqli_query($koneksi,$sql);
					break;
					case 2:
						$sql = "UPDATE nilai_regu set jurus2=". ($row[4] + 1 ) ." WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

						$exec = mysqli_query($koneksi,$sql);
					break;
					case 3:
						$sql = "UPDATE nilai_regu set jurus3=". ($row[5] + 1 ) ." WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

						$exec = mysqli_query($koneksi,$sql);
					break;
					case 4:
						$sql = "UPDATE nilai_regu set jurus4=". ($row[6] + 1 ) ." WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

						$exec = mysqli_query($koneksi,$sql);
					break;
					case 5:
						$sql = "UPDATE nilai_regu set jurus5=". ($row[7] + 1 ) ." WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

						$exec = mysqli_query($koneksi,$sql);
					break;
					case 6:
						$sql = "UPDATE nilai_regu set jurus6=". ($row[8] + 1 ) ." WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

						$exec = mysqli_query($koneksi,$sql);
					break;
					case 7:
						$sql = "UPDATE nilai_regu set jurus7=". ($row[9] + 1 ) ." WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

						$exec = mysqli_query($koneksi,$sql);
					break;
					case 8:
						$sql = "UPDATE nilai_regu set jurus8=". ($row[10] + 1 ) ." WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

						$exec = mysqli_query($koneksi,$sql);
					break;
					case 9:
						$sql = "UPDATE nilai_regu set jurus9=". ($row[11] + 1 ) ." WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

						$exec = mysqli_query($koneksi,$sql);
					break;
					case 10:
						$sql = "UPDATE nilai_regu set jurus10=". ($row[12] + 1 ) ." WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

						$exec = mysqli_query($koneksi,$sql);
					break;
					case 11:
						$sql = "UPDATE nilai_regu set jurus11=". ($row[13] + 1 ) ." WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

						$exec = mysqli_query($koneksi,$sql);
					break;
					case 12:
						$sql = "UPDATE nilai_regu set jurus12=". ($row[14] + 1 ) ." WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

						$exec = mysqli_query($koneksi,$sql);
					break;
				}

				$nilai = mysqli_query($koneksi,"SELECT jurus". $jurus ." FROM nilai_regu WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'");
				$nilai = mysqli_fetch_row($nilai);

				echo json_encode(['status' => 'success', 'nilai' => $nilai[0]]);
			}
			else
			{
				echo json_encode(['status' => 'success']);
			}
		break;
		case "minus_regu":

			$id_jadwal = $_POST['id_jadwal'];
			$id_juri = $_POST['id_juri'];
			$jurus =	$_POST['jurus'];

			$sql = "SELECT * FROM nilai_regu WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

			$exec = mysqli_query($koneksi,$sql);

			$row = mysqli_fetch_row($exec);
			
			if($row)
			{
				switch($jurus)
				{
					case 1:
						$sql = "UPDATE nilai_regu set jurus1=". ($row[3] - 1 ) ." WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

						$exec = mysqli_query($koneksi,$sql);
					break;
					case 2:
						$sql = "UPDATE nilai_regu set jurus2=". ($row[4] - 1 ) ." WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

						$exec = mysqli_query($koneksi,$sql);
					break;
					case 3:
						$sql = "UPDATE nilai_regu set jurus3=". ($row[5] - 1 ) ." WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

						$exec = mysqli_query($koneksi,$sql);
					break;
					case 4:
						$sql = "UPDATE nilai_regu set jurus4=". ($row[6] - 1 ) ." WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

						$exec = mysqli_query($koneksi,$sql);
					break;
					case 5:
						$sql = "UPDATE nilai_regu set jurus5=". ($row[7] - 1 ) ." WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

						$exec = mysqli_query($koneksi,$sql);
					break;
					case 6:
						$sql = "UPDATE nilai_regu set jurus6=". ($row[8] - 1 ) ." WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

						$exec = mysqli_query($koneksi,$sql);
					break;
					case 7:
						$sql = "UPDATE nilai_regu set jurus7=". ($row[9] - 1 ) ." WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

						$exec = mysqli_query($koneksi,$sql);
					break;
					case 8:
						$sql = "UPDATE nilai_regu set jurus8=". ($row[10] - 1 ) ." WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

						$exec = mysqli_query($koneksi,$sql);
					break;
					case 9:
						$sql = "UPDATE nilai_regu set jurus9=". ($row[11] - 1 ) ." WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

						$exec = mysqli_query($koneksi,$sql);
					break;
					case 10:
						$sql = "UPDATE nilai_regu set jurus10=". ($row[12] - 1 ) ." WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

						$exec = mysqli_query($koneksi,$sql);
					break;
					case 11:
						$sql = "UPDATE nilai_regu set jurus11=". ($row[13] - 1 ) ." WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

						$exec = mysqli_query($koneksi,$sql);
					break;
					case 12:
						$sql = "UPDATE nilai_regu set jurus12=". ($row[14] - 1 ) ." WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

						$exec = mysqli_query($koneksi,$sql);
					break;
				}

				$nilai = mysqli_query($koneksi,"SELECT jurus". $jurus ." FROM nilai_regu WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'");
				$nilai = mysqli_fetch_row($nilai);

				echo json_encode(['status' => 'success', 'nilai' => $nilai[0]]);
			}
			else
			{
				echo json_encode(['status' => 'success']);
			}
		break;

		case "insert_first_tunggal":
			$id_jadwal = $_POST['id_jadwal'];
			$id_juri = $_POST['id_juri'];
			$sql = "SELECT * FROM nilai_tunggal WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

			$exec = mysqli_query($koneksi,$sql);

			$row = mysqli_fetch_row($exec);
			
			if(!$row)
			{
				$sql = "INSERT INTO nilai_tunggal (id_jadwal, id_juri, kemantapan) VALUES ({$id_jadwal}, {$id_juri}, 0)";

				mysqli_query($koneksi,$sql);

				echo json_encode(['status' => 'success', 'total_minus' => 0, 'kemantapan' => 50 ]);
			}
			else
			{
				$total_minus = $row[3] + $row[4] +  $row[5] +  $row[6] +  $row[7] +  $row[8] +  $row[9] +  $row[10] +  $row[11] +  $row[12] +  $row[13] +  $row[14] +  $row[15] +  $row[16];

				echo json_encode(['status' => 'success', 'total_minus' => $total_minus, 'kemantapan' => $row[17], 'hukuman_1' => $row[18], 'hukuman_2' => $row[19], 'hukuman_3' => $row[20], 'hukuman_4' => $row[21], 'hukuman_5' => $row[22], 
						'jurus_1' => $row[3] ,'jurus_2' => $row[4],'jurus_3' => $row[5],'jurus_4' => $row[6],'jurus_5' => $row[7],'jurus_6' => $row[8],'jurus_7' => $row[9],'jurus_8' => $row[10],'jurus_9' => $row[11],'jurus_10' => $row[12],'jurus_11' => $row[13],'jurus_12' => $row[14],'jurus_13' => $row[15],'jurus_14' => $row[16] ]);
			}

		break;
		case "insert_first_ganda":
			$id_jadwal = $_POST['id_jadwal'];
			$id_juri = $_POST['id_juri'];
			$sql = "SELECT * FROM nilai_ganda WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

			$exec = mysqli_query($koneksi,$sql);

			$row = mysqli_fetch_row($exec);
			
			if(!$row)
			{
				$sql = "INSERT INTO nilai_ganda (id_jadwal, id_juri, teknik_serang, mantap_kompak, serasi) VALUES ({$id_jadwal}, {$id_juri}, 0, 0, 0)";

				mysqli_query($koneksi,$sql);

				$sql = "SELECT * FROM nilai_ganda WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";
				$exec = mysqli_query($koneksi,$sql);
				$row = mysqli_fetch_row($exec);
				
				$sub_total = 0;
			}
			else
			{
				$sub_total = $row[3] + $row[4] + $row[5];
			}

			echo json_encode(['status' => 'success', 'sub_total' => $sub_total, 'teknik' => $row[3], 'mantap' => $row[4], 'serasi'=> $row[5], 'hukuman_1' => $row[6], 'hukuman_2' => $row[7], 'hukuman_3' => $row[8], 'hukuman_4' => $row[9], 'hukuman_5' => $row[10], 'hukuman_6' => $row[11]]);

		break;
		
		case 'minus_nilai_serang_ganda':
			$id_jadwal = $_POST['id_jadwal'];
			$id_juri = $_POST['id_juri'];
			$sql = "SELECT teknik_serang FROM nilai_ganda WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

			$exec = mysqli_query($koneksi,$sql);

			$row = mysqli_fetch_row($exec);
			
			if($row)
			{
				if($row[0] != 60)
				{
					if($row[0]==0)
					{
						$sql = "UPDATE nilai_ganda set teknik_serang=60 WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";
						mysqli_query($koneksi,$sql);
					}
					else
					{
						$sql = "UPDATE nilai_ganda set teknik_serang=teknik_serang-1 WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";
						mysqli_query($koneksi,$sql);
					}
				}
			}
			echo json_encode(['status' => 'success']);

		break;
		case "plus_nilai_serang_ganda":
			$id_jadwal = $_POST['id_jadwal'];
			$id_juri = $_POST['id_juri'];
			$sql = "SELECT teknik_serang FROM nilai_ganda WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

			$exec = mysqli_query($koneksi,$sql);

			$row = mysqli_fetch_row($exec);
			if($row)
			{
				if($row[0] != 80)
				{
					if($row[0]==0)
					{
						$sql = "UPDATE nilai_ganda set teknik_serang=60 WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";
						mysqli_query($koneksi,$sql);
					}
					else
					{
						$sql = "UPDATE nilai_ganda set teknik_serang=teknik_serang+1 WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";
						mysqli_query($koneksi,$sql);
					}

				}
			}
			echo json_encode(['status' => 'success']);

		break;


		case 'minus_nilai_mantap_ganda':
			$id_jadwal = $_POST['id_jadwal'];
			$id_juri = $_POST['id_juri'];
			$sql = "SELECT mantap_kompak FROM nilai_ganda WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

			$exec = mysqli_query($koneksi,$sql);

			$row = mysqli_fetch_row($exec);
			
			if($row)
			{
				if($row[0] != 50)
				{
					if($row[0] == 0)
					{
						$sql = "UPDATE nilai_ganda set mantap_kompak=50 WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";
						mysqli_query($koneksi,$sql);
					}
					else
					{
						$sql = "UPDATE nilai_ganda set mantap_kompak=mantap_kompak-1 WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";
						mysqli_query($koneksi,$sql);
					}

				}
			}
			echo json_encode(['status' => 'success']);

		break;
		case "plus_nilai_mantap_ganda":
			$id_jadwal = $_POST['id_jadwal'];
			$id_juri = $_POST['id_juri'];
			$sql = "SELECT mantap_kompak FROM nilai_ganda WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

			$exec = mysqli_query($koneksi,$sql);

			$row = mysqli_fetch_row($exec);
			if($row)
			{
				if($row[0] != 60)
				{
					if($row[0] == 0)
					{
						$sql = "UPDATE nilai_ganda set mantap_kompak=50 WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";
						mysqli_query($koneksi,$sql);
					}
					else
					{
						$sql = "UPDATE nilai_ganda set mantap_kompak=mantap_kompak+1 WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";
						mysqli_query($koneksi,$sql);
					}
				}
			}
			echo json_encode(['status' => 'success']);

		break;


		case 'minus_nilai_serasi_ganda':
			$id_jadwal = $_POST['id_jadwal'];
			$id_juri = $_POST['id_juri'];
			$sql = "SELECT serasi FROM nilai_ganda WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

			$exec = mysqli_query($koneksi,$sql);

			$row = mysqli_fetch_row($exec);
			
			if($row)
			{
				if($row[0] != 50)
				{
					if($row[0] == 0)
					{
						$sql = "UPDATE nilai_ganda set serasi=50 WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";
						mysqli_query($koneksi,$sql);
					}
					else
					{
						$sql = "UPDATE nilai_ganda set serasi=serasi-1 WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";
						mysqli_query($koneksi,$sql);
					}
				}
			}
			echo json_encode(['status' => 'success']);

		break;
		case "plus_nilai_serasi_ganda":
			$id_jadwal = $_POST['id_jadwal'];
			$id_juri = $_POST['id_juri'];
			$sql = "SELECT serasi FROM nilai_ganda WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

			$exec = mysqli_query($koneksi,$sql);

			$row = mysqli_fetch_row($exec);
			if($row)
			{
				if($row[0] != 60)
				{
					if($row[0] == 0)
					{
						$sql = "UPDATE nilai_ganda set serasi=50 WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";
						mysqli_query($koneksi,$sql);
					}
					else
					{
						$sql = "UPDATE nilai_ganda set serasi=serasi+1 WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";
						mysqli_query($koneksi,$sql);
					}
				}
			}
			echo json_encode(['status' => 'success']);

		break;

		case 'plus_kemantapan_regu':
			$id_jadwal = $_POST['id_jadwal'];
			$id_juri = $_POST['id_juri'];
			$sql = "SELECT kemantapan FROM nilai_regu WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

			$exec = mysqli_query($koneksi,$sql);

			$row = mysqli_fetch_row($exec);
			
			if($row)
			{
				if($row[0] != 60)
				{
					if($row[0] == 0)
					{
						$sql = "UPDATE nilai_regu set kemantapan=50 WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";
						mysqli_query($koneksi,$sql);

						$kemantapan = 51;
					}
					else
					{
						$sql = "UPDATE nilai_regu set kemantapan=kemantapan+1 WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";
						mysqli_query($koneksi,$sql);

						$kemantapan = $row[0] + 1;
					}
				}
				else
				{
					$kemantapan = $row[0];
				}
			}
			echo json_encode(['status' => 'success', 'kemantapan' => $kemantapan]);

		break;
		case 'minus_kemantapan_regu':
			$id_jadwal = $_POST['id_jadwal'];
			$id_juri = $_POST['id_juri'];
			$sql = "SELECT kemantapan FROM nilai_regu WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

			$exec = mysqli_query($koneksi,$sql);

			$row = mysqli_fetch_row($exec);
			
			if($row)
			{
				if($row[0] != 50)
				{
					if($row[0] == 0)
					{
						$sql = "UPDATE nilai_regu set kemantapan=50 WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";
						mysqli_query($koneksi,$sql);
						$kemantapan = 50;
					}
					else
					{
						$sql = "UPDATE nilai_regu set kemantapan=kemantapan-1 WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";
						mysqli_query($koneksi,$sql);
						$kemantapan = $row[0] - 1;
					}
				}
				else
				{
					$kemantapan = $row[0];
				}
			}
			echo json_encode(['status' => 'success']);

		break;

		case 'plus_kemantapan_tunggal':
			$id_jadwal = $_POST['id_jadwal'];
			$id_juri = $_POST['id_juri'];
			$sql = "SELECT kemantapan FROM nilai_tunggal WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

			$exec = mysqli_query($koneksi,$sql);

			$row = mysqli_fetch_row($exec);
			
			if($row)
			{
				if($row[0] != 60)
				{
					if($row[0] == 0)
					{
						$sql = "UPDATE nilai_tunggal set kemantapan=50 WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";
						mysqli_query($koneksi,$sql);
						$kemantapan = 50;
					}
					else
					{
						$sql = "UPDATE nilai_tunggal set kemantapan=kemantapan+1 WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";
						mysqli_query($koneksi,$sql);
					 	$kemantapan = $row[0] + 1;
					}
				}
				else
				{
					$kemantapan = $row[0];
				}
			}
			echo json_encode(['status' => 'success', 'kemantapan' => $kemantapan]);

		break;
		case 'minus_kemantapan_tunggal':
			$id_jadwal = $_POST['id_jadwal'];
			$id_juri = $_POST['id_juri'];
			$sql = "SELECT kemantapan FROM nilai_tunggal WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

			$exec = mysqli_query($koneksi,$sql);

			$row = mysqli_fetch_row($exec);
			
			if($row)
			{
				if($row[0] != 50)
				{
					if($row[0] == 0)
					{
						$sql = "UPDATE nilai_tunggal set kemantapan=50 WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";
						mysqli_query($koneksi,$sql);
						$kemantapan = 50;
					}
					else
					{
						$sql = "UPDATE nilai_tunggal set kemantapan=kemantapan - 1 WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";
						mysqli_query($koneksi,$sql);
						$kemantapan = $row[0] - 1;	
					}
				}
				else
				{
					$kemantapan = $row[0];
				}
			}
			echo json_encode(['status' => 'success']);

		break;
		case "add_undo_minus_tunggal":
			$id_jadwal = $_POST['id_jadwal'];
			$id_juri = $_POST['id_juri'];
			$jurus =	$_POST['jurus'];

			$sql = "SELECT * FROM nilai_tunggal WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

			$exec = mysqli_query($koneksi,$sql);

			$row = mysqli_fetch_row($exec);
			
			if($row)
			{
				switch($jurus)
				{
					case 1:
						$sql = "UPDATE nilai_tunggal set jurus1=". ($row[3] + 1 ) ." WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

						$exec = mysqli_query($koneksi,$sql);
					break;
					case 2:
						$sql = "UPDATE nilai_tunggal set jurus2=". ($row[4] + 1 ) ." WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

						$exec = mysqli_query($koneksi,$sql);
					break;
					case 3:
						$sql = "UPDATE nilai_tunggal set jurus3=". ($row[5] + 1 ) ." WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

						$exec = mysqli_query($koneksi,$sql);
					break;
					case 4:
						$sql = "UPDATE nilai_tunggal set jurus4=". ($row[6] + 1 ) ." WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

						$exec = mysqli_query($koneksi,$sql);
					break;
					case 5:
						$sql = "UPDATE nilai_tunggal set jurus5=". ($row[7] + 1 ) ." WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

						$exec = mysqli_query($koneksi,$sql);
					break;
					case 6:
						$sql = "UPDATE nilai_tunggal set jurus6=". ($row[8] + 1 ) ." WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

						$exec = mysqli_query($koneksi,$sql);
					break;
					case 7:
						$sql = "UPDATE nilai_tunggal set jurus7=". ($row[9] + 1 ) ." WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

						$exec = mysqli_query($koneksi,$sql);
					break;
					case 8:
						$sql = "UPDATE nilai_tunggal set jurus8=". ($row[10] + 1 ) ." WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

						$exec = mysqli_query($koneksi,$sql);
					break;
					case 9:
						$sql = "UPDATE nilai_tunggal set jurus9=". ($row[11] + 1 ) ." WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

						$exec = mysqli_query($koneksi,$sql);
					break;
					case 10:
						$sql = "UPDATE nilai_tunggal set jurus10=". ($row[12] + 1 ) ." WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

						$exec = mysqli_query($koneksi,$sql);
					break;
					case 11:
						$sql = "UPDATE nilai_tunggal set jurus11=". ($row[13] + 1 ) ." WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

						$exec = mysqli_query($koneksi,$sql);
					break;
					case 12:
						$sql = "UPDATE nilai_tunggal set jurus12=". ($row[14] + 1 ) ." WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

						$exec = mysqli_query($koneksi,$sql);
					break;
					case 13:
						$sql = "UPDATE nilai_tunggal set jurus13=". ($row[15] + 1 ) ." WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

						$exec = mysqli_query($koneksi,$sql);
					break;
					case 14:
						$sql = "UPDATE nilai_tunggal set jurus14=". ($row[16] + 1 ) ." WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

						$exec = mysqli_query($koneksi,$sql);
					break;
				}

				$nilai = mysqli_query($koneksi,"SELECT jurus". $jurus ." FROM nilai_tunggal WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'");
				$nilai = mysqli_fetch_row($nilai);

				echo json_encode(['status' => 'success', 'nilai' => $nilai[0]]);
			}
			else
			{
				echo json_encode(['status' => 'success']);
			}
		break;
		case "add_minus_tunggal":

			$id_jadwal = $_POST['id_jadwal'];
			$id_juri = $_POST['id_juri'];
			$jurus =	$_POST['jurus'];

			$sql = "SELECT * FROM nilai_tunggal WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

			$exec = mysqli_query($koneksi,$sql);

			$row = mysqli_fetch_row($exec);
			
			if($row)
			{
				switch($jurus)
				{
					case 1:
						$sql = "UPDATE nilai_tunggal set jurus1=". ($row[3] - 1 ) ." WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

						$exec = mysqli_query($koneksi,$sql);
					break;
					case 2:
						$sql = "UPDATE nilai_tunggal set jurus2=". ($row[4] - 1 ) ." WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

						$exec = mysqli_query($koneksi,$sql);
					break;
					case 3:
						$sql = "UPDATE nilai_tunggal set jurus3=". ($row[5] - 1 ) ." WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

						$exec = mysqli_query($koneksi,$sql);
					break;
					case 4:
						$sql = "UPDATE nilai_tunggal set jurus4=". ($row[6] - 1 ) ." WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

						$exec = mysqli_query($koneksi,$sql);
					break;
					case 5:
						$sql = "UPDATE nilai_tunggal set jurus5=". ($row[7] - 1 ) ." WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

						$exec = mysqli_query($koneksi,$sql);
					break;
					case 6:
						$sql = "UPDATE nilai_tunggal set jurus6=". ($row[8] - 1 ) ." WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

						$exec = mysqli_query($koneksi,$sql);
					break;
					case 7:
						$sql = "UPDATE nilai_tunggal set jurus7=". ($row[9] - 1 ) ." WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

						$exec = mysqli_query($koneksi,$sql);
					break;
					case 8:
						$sql = "UPDATE nilai_tunggal set jurus8=". ($row[10] - 1 ) ." WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

						$exec = mysqli_query($koneksi,$sql);
					break;
					case 9:
						$sql = "UPDATE nilai_tunggal set jurus9=". ($row[11] - 1 ) ." WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

						$exec = mysqli_query($koneksi,$sql);
					break;
					case 10:
						$sql = "UPDATE nilai_tunggal set jurus10=". ($row[12] - 1 ) ." WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

						$exec = mysqli_query($koneksi,$sql);
					break;
					case 11:
						$sql = "UPDATE nilai_tunggal set jurus11=". ($row[13] - 1 ) ." WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

						$exec = mysqli_query($koneksi,$sql);
					break;
					case 12:
						$sql = "UPDATE nilai_tunggal set jurus12=". ($row[14] - 1 ) ." WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

						$exec = mysqli_query($koneksi,$sql);
					break;
					case 13:
						$sql = "UPDATE nilai_tunggal set jurus13=". ($row[15] - 1 ) ." WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

						$exec = mysqli_query($koneksi,$sql);
					break;
					case 14:
						$sql = "UPDATE nilai_tunggal set jurus14=". ($row[16] - 1 ) ." WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

						$exec = mysqli_query($koneksi,$sql);
					break;
				}

				$nilai = mysqli_query($koneksi,"SELECT jurus". $jurus ." FROM nilai_tunggal WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'");
				$nilai = mysqli_fetch_row($nilai);

				echo json_encode(['status' => 'success', 'nilai' => $nilai[0]]);
			}
			else
			{
				echo json_encode(['status' => 'success']);
			}
		break;
		case "add_hukuman_waktu_ganda":

			$id_jadwal = $_POST['id_jadwal'];
			$id_juri = $_POST['id_juri'];

			$sql = "SELECT * FROM nilai_ganda WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

			$exec = mysqli_query($koneksi,$sql);

			$row = mysqli_fetch_row($exec);
			
			if($row)
			{
				$sql = "UPDATE nilai_ganda SET hukum_1=". $_POST['nilai']. " WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";
				$exec = mysqli_query($koneksi,$sql);
			}
			
			echo json_encode(['status' => 'success']);
		break;

		case "add_hukuman_ganda":

			$id_jadwal = $_POST['id_jadwal'];
			$id_juri = $_POST['id_juri'];

			$sql = "SELECT hukum_2,hukum_3,hukum_4,hukum_5,hukum_6 FROM nilai_ganda WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

			$exec = mysqli_query($koneksi,$sql);

			$row = mysqli_fetch_row($exec);
			
			if($row)
			{ 
				switch ($_POST['hukuman']) {
					case 2:
						$sql = "UPDATE nilai_ganda SET hukum_2=". ($row[0] + $_POST['nilai']) . " WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";
						$exec = mysqli_query($koneksi,$sql);
					break;
					case 3:
						$sql = "UPDATE nilai_ganda SET hukum_3=". ($row[1] + $_POST['nilai']) . " WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";
						$exec = mysqli_query($koneksi,$sql);
					break;
					case 4:
						$sql = "UPDATE nilai_ganda SET hukum_4=". $_POST['nilai'] . " WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";
						$exec = mysqli_query($koneksi,$sql);
					break;
					case 5:
						$sql = "UPDATE nilai_ganda SET hukum_5=". ($row[3] + $_POST['nilai']) . " WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";
						$exec = mysqli_query($koneksi,$sql);
					break;
					case 6:
						$sql = "UPDATE nilai_ganda SET hukum_6=". $_POST['nilai'] . " WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";
						$exec = mysqli_query($koneksi,$sql);
					break;
				}
			}
			
			echo json_encode(['status' => 'success']);
		break;
		case "add_hukuman_waktu_tunggal":

			$id_jadwal = $_POST['id_jadwal'];
			$id_juri = $_POST['id_juri'];

			$sql = "SELECT * FROM nilai_tunggal WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

			$exec = mysqli_query($koneksi,$sql);

			$row = mysqli_fetch_row($exec);
			
			if($row)
			{
				$sql = "UPDATE nilai_tunggal SET hukum_1=". $_POST['nilai']. " WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";
				$exec = mysqli_query($koneksi,$sql);
			}
			
			echo json_encode(['status' => 'success']);
		break;

		case "add_hukuman_tunggal":

			$id_jadwal = $_POST['id_jadwal'];
			$id_juri = $_POST['id_juri'];

			$sql = "SELECT * FROM nilai_tunggal WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";

			$exec = mysqli_query($koneksi,$sql);

			$row = mysqli_fetch_row($exec);
			
			if($row)
			{
				switch ($_POST['hukuman']) {
					case 2:
						$sql = "UPDATE nilai_tunggal SET hukum_2=". ($row[19] - $_POST['nilai']) . " WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";
						$exec = mysqli_query($koneksi,$sql);
					break;
					case 3:
						$sql = "UPDATE nilai_tunggal SET hukum_3=". (-$_POST['nilai']) . " WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";
						$exec = mysqli_query($koneksi,$sql);
					break;
					case 4:
						$sql = "UPDATE nilai_tunggal SET hukum_4=". ($row[21] - $_POST['nilai']) . " WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";
						$exec = mysqli_query($koneksi,$sql);
					break;
					case 5:
						$sql = "UPDATE nilai_tunggal SET hukum_5=". ($row[22] - $_POST['nilai']) . " WHERE id_jadwal='{$id_jadwal}' and id_juri='{$id_juri}'";
						$exec = mysqli_query($koneksi,$sql);
					break;
				}
			}
			
			echo json_encode(['status' => 'success']);
		break;

		case "":

		break;
		
		case "partai":
			echo partai();
		break;

		case "juri":
			echo juri();
		break;

		case "login":


			$id_juri = $_GET['id'];
			$password = md5($_GET['password']);

			$sql = "SELECT * FROM wasit_juri WHERE id_juri='{$id_juri}' and pass_juri='{$password}'";

			$exec = mysqli_query($koneksi,$sql);

			$row = mysqli_fetch_row($exec);

			$get_jadwal = mysqli_query($koneksi,"SELECT kontingen FROM jadwal_tgr WHERE id_partai=". $_GET['id_partai']);
			$get_jadwal = mysqli_fetch_row($get_jadwal);
			
			if($row){
				echo json_encode(['status' => 'success', 'kontingen' => $get_jadwal[0]]);
			}else{
				echo json_encode(['status' => 'error']);
			}
		break;
		
		case "get_golongan_tgr":

			echo get_golongan_tgr();
		break;

		case "get_data_view_tunggal":
			echo get_data_view_tunggal();
		break;

		case "get_data_view_regu":
			echo get_data_view_regu();
		break;

		case "get_data_view_ganda":
			echo get_data_view_ganda();
		break;
	}
}	

function get_data_view_ganda()
{
	ob_start();
	include "../backend/includes/connection.php";
	?>	
	<table class="table table-bordered">
	<tr class="text-center" bgcolor="#FFFF00">
		<td rowspan="2">UNDIAN</td>
		<td rowspan="2">GOLONGAN</td>
		<td rowspan="2">NAMA PESILAT</td>
		<td rowspan="2">KONTINGEN</td>
		<td colspan="3">UNSUR NILAI</td>
		<td rowspan="2">HUKUMAN</td>
		<td rowspan="2">NILAI /JURI</td>
		<td rowspan="2"> TOTAL NILAI</td>
	</tr>
	<tr class="text-center" bgcolor="#FFFF00">
		<td>SERANG/BELA</td>
		<td>KEMANTAPAN</td>
		<td>SERASI</td>
	</tr>
	<?php

	//Mencari data jadwal pertandingan TUNGGAL
	$sqljadwal = "SELECT * FROM jadwal_tgr
					WHERE kategori='Ganda'
					ORDER BY id_partai,golongan ASC";
	$jadwal_tunggal = mysqli_query($koneksi,$sqljadwal);
	 
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

			$exec = mysqli_query($koneksi,$sql);

			$array_nilai = [];

			while ($juri = mysqli_fetch_array($exec)) {

				$serang = mysqli_query($koneksi,"SELECT teknik_serang FROM nilai_ganda WHERE id_juri=". $juri['id_juri'] ." AND id_jadwal=". $jadwal['id_partai']);
				$row = mysqli_fetch_row($serang);
				$serang = $row[0];

				$array_nilai[$juri['id_juri']]['serang'] = $serang;
		?>
			<?=$juri[1]?> : <?=$serang?><br />
		<?php } ?>
		</td>
		<td>
			<?php
			$sql = "SELECT * FROM wasit_juri";

			$exec = mysqli_query($koneksi,$sql);

			while ($juri = mysqli_fetch_array($exec)) {

				$kompak = mysqli_query($koneksi,"SELECT mantap_kompak FROM nilai_ganda WHERE id_juri=". $juri['id_juri'] ." AND id_jadwal=". $jadwal['id_partai']);
				$row = mysqli_fetch_row($kompak);
				$kompak = $row[0];

				$array_nilai[$juri['id_juri']]['kompak'] = $kompak;
		?>
			<?=$juri[1]?>  : <?=$kompak?><br />
		<?php } ?>
		</td>
		<td>
			<?php
			$sql = "SELECT * FROM wasit_juri";

			$exec = mysqli_query($koneksi,$sql);

			while ($juri = mysqli_fetch_array($exec)) {

				$serasi = mysqli_query($koneksi,"SELECT serasi FROM nilai_ganda WHERE id_juri=". $juri['id_juri'] ." AND id_jadwal=". $jadwal['id_partai']);
				$row = mysqli_fetch_row($serasi);
				$serasi = $row[0];

				$array_nilai[$juri['id_juri']]['serasi'] = $serasi;

		?>
			<?=$juri[1]?>  : <?=$serasi?><br />
		<?php } ?>
		</td> 
		<td>
			<?php
			$sql = "SELECT * FROM wasit_juri";

			$exec = mysqli_query($koneksi,$sql);
			while ($juri = mysqli_fetch_array($exec)) {

				$hukum = mysqli_query($koneksi,"SELECT hukum_1,hukum_2,hukum_3,hukum_4,hukum_5,hukum_6 FROM nilai_ganda WHERE id_juri=". $juri['id_juri'] ." AND id_jadwal=". $jadwal['id_partai']);
				$row = mysqli_fetch_row($hukum);
				$hukum = $row[0]+$row[1]+$row[2]+$row[3]+$row[4]+$row[5];
				$array_nilai[$juri['id_juri']]['hukum'] = $hukum;

		?>
			<?=$juri[1]?>  : <?=$hukum?><br />
		<?php } ?>
		</td>
		<td>
			<?php
			$sql = "SELECT * FROM wasit_juri";

			$exec = mysqli_query($koneksi,$sql);
			$tempNilai = [];
			$totalNilai = 0;
			while ($juri = mysqli_fetch_array($exec)) {

				if(isset($array_nilai[$juri['id_juri']]['serang']))
				{
					$nilai = ($array_nilai[$juri['id_juri']]['serang'] + $array_nilai[$juri['id_juri']]['kompak'] + $array_nilai[$juri['id_juri']]['serasi']) - (- $array_nilai[$juri['id_juri']]['hukum']) ; 

					$totalNilai +=  $nilai;					
				}
				else
				{
					$nilai = 0;
				}

				$tempNilai[] = $nilai;
		?>
			<?=$juri[1]?>  : <?=$nilai?><br />
		<?php } ?>
		</td>
		<td>
			<?=($totalNilai - @min($tempNilai) - @max($tempNilai))?>
			<br>MIN : <?=@min($tempNilai)?>
			<br>MAX : <?=@max($tempNilai)?>		
		</td>
	</tr>
	<?php } ?>
</table>
	<?php 

	$out1 = ob_get_contents();

	ob_end_clean();

	return $out1;
}


function get_data_view_regu()
{
	ob_start();
	include "../backend/includes/connection.php";
?>
	<table class="table table-bordered">
	<tr class="text-center" bgcolor="#FFFF00">
		<td rowspan="2">NO UNDIAN</td>
		<td rowspan="2">GOLONGAN</td>
		<td rowspan="2">NAMA PESILAT</td>
		<td rowspan="2">KONTINGEN</td>
		<td colspan="2">UNSUR NILAI</td>
		<td rowspan="2">HUKUMAN</td>
		<td rowspan="2">NILAI /JURI</td>
		<td rowspan="2">TOTAL NILAI</td>
	</tr>
	<tr class="text-center" bgcolor="#FFFF00">
		<td>KEBENARAN</td>
		<td>KEMANTAPAN</td>
	</tr>
	<?php 

	//Mencari data jadwal pertandingan TUNGGAL
	$sqljadwal = "SELECT * FROM jadwal_tgr
					WHERE kategori='Regu'
					ORDER BY id_partai,golongan ASC";
	$jadwal_tunggal = mysqli_query($koneksi,$sqljadwal);

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

			$exec = mysqli_query($koneksi,$sql);

			$array_nilai = [];

			while ($juri = mysqli_fetch_array($exec)) {

				$kebenaran = mysqli_query($koneksi,"SELECT jurus1, jurus2, jurus3, jurus4, jurus5, jurus6, jurus7, jurus8, jurus9, jurus10, jurus11, jurus12 FROM nilai_regu WHERE id_juri=". $juri['id_juri'] ." AND id_jadwal=". $jadwal['id_partai']);
				$row = mysqli_fetch_row($kebenaran);
				$kebenaran = $row[0] + $row[1] + $row[2] + $row[3] + $row[4] + $row[5] + $row[6] + $row[7] + $row[8] + $row[9] + $row[10] + $row[11];

				if($kebenaran != 0)
				{
					$kebenaran = 100 - (- $kebenaran);
				}
				
				$array_nilai[$juri['id_juri']]['kebenaran'] = $kebenaran;
		?>
			<?=$juri[1]?>  : <?=$kebenaran?><br />
		<?php } ?>
		</td>
		<td>
			<?php
			$sql = "SELECT * FROM wasit_juri";

			$exec = mysqli_query($koneksi,$sql);

			while ($juri = mysqli_fetch_array($exec)) {

				$kemantapan = mysqli_query($koneksi,"SELECT kemantapan FROM nilai_regu WHERE id_juri=". $juri['id_juri'] ." AND id_jadwal=". $jadwal['id_partai']);
				$row = mysqli_fetch_row($kemantapan);
				$kemantapan = $row[0];

				$array_nilai[$juri['id_juri']]['kemantapan'] = $kemantapan;
		?>
			<?=$juri[1]?>  : <?=$kemantapan?><br />
		<?php } ?>
		</td>
		<td>
			<?php
			$sql = "SELECT * FROM wasit_juri";

			$exec = mysqli_query($koneksi,$sql);

			while ($juri = mysqli_fetch_array($exec)) {

				$hukum = mysqli_query($koneksi,"SELECT hukum_1,hukum_2,hukum_3,hukum_4 FROM nilai_regu WHERE id_juri=". $juri['id_juri'] ." AND id_jadwal=". $jadwal['id_partai']);
				$row = mysqli_fetch_row($hukum);
				$hukum = $row[0]+$row[1]+$row[2]+$row[3];
				$array_nilai[$juri['id_juri']]['hukum'] = $hukum;

		?>
			<?=$juri[1]?>  : <?=$hukum?><br />
		<?php } ?>
		</td>
		<td>
			<?php
			$sql = "SELECT * FROM wasit_juri";

			$exec = mysqli_query($koneksi,$sql);
			$tempNilai = [];
			$totalNilai = 0;
			while ($juri = mysqli_fetch_array($exec)) {

				$hukum = mysqli_query($koneksi,"SELECT hukum_1,hukum_2,hukum_3,hukum_4 FROM nilai_regu WHERE id_juri=". $juri['id_juri'] ." AND id_jadwal=". $jadwal['id_partai']);
				$row = mysqli_fetch_row($hukum);
				$hukum = $row[0]+$row[1]+$row[2]+$row[3];

				if(isset($array_nilai[$juri['id_juri']]['hukum']))
				{
					$nilai = $array_nilai[$juri['id_juri']]['kebenaran'] + $array_nilai[$juri['id_juri']]['kemantapan'] - ( - ($array_nilai[$juri['id_juri']]['hukum']));

					$totalNilai +=  $nilai;					
				}
				else
				{
					$nilai = 0;
				}
				$tempNilai[] = $nilai;


		?>
			<?=$juri[1]?>  : <?=$nilai?><br />
		<?php } ?>
		</td>
		<td>
			<?=($totalNilai - @min($tempNilai) - @max($tempNilai))?>
			<br>MIN : <?=min($tempNilai)?>
			<br>MAX : <?=max($tempNilai)?>
		</td>
	</tr>
	<?php } ?>
</table>
<?php
	$out1 = ob_get_contents();

	ob_end_clean();

	return $out1;
}

function get_data_view_tunggal()
{
	ob_start();
	include "../backend/includes/connection.php";
?>
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
	$jadwal_tunggal = mysqli_query($koneksi,$sqljadwal);
	
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

			$exec = mysqli_query($koneksi,$sql);

			$array_nilai = [];

			while ($juri = mysqli_fetch_array($exec)) {


				$kebenaran = mysqli_query($koneksi,"SELECT * FROM nilai_tunggal WHERE id_juri=". $juri['id_juri'] ." AND id_jadwal=". $jadwal['id_partai']);
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

			$exec = mysqli_query($koneksi,$sql);

			while ($juri = mysqli_fetch_array($exec)) {
				$kemantapan = mysqli_query($koneksi,"SELECT kemantapan FROM nilai_tunggal WHERE id_juri=". $juri['id_juri'] ." AND id_jadwal=". $jadwal['id_partai']);
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

			$exec = mysqli_query($koneksi,$sql);

			while ($juri = mysqli_fetch_array($exec)) {
				
				$hukuman = mysqli_query($koneksi,"SELECT hukum_1,hukum_2,hukum_3,hukum_4,hukum_5 FROM nilai_tunggal WHERE id_juri=". $juri['id_juri'] ." AND id_jadwal=". $jadwal['id_partai']);
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

			$exec = mysqli_query($koneksi,$sql);
			
			$tempNilai = [];
			$totalNilai = 0;

			while ($juri = mysqli_fetch_array($exec)) {


				if(isset($array_nilai[$juri['id_juri']]['kebenaran']))
				{
					$nilai = ($array_nilai[$juri['id_juri']]['kebenaran'] + $array_nilai[$juri['id_juri']]['kemantapan']) - ( - $array_nilai[$juri['id_juri']]['hukuman'] );
					$totalNilai += $nilai;
				}
				else
				{
					$nilai = 0;
				}
				$tempNilai[] = $nilai;

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
<?php 
	$out1 = ob_get_contents();

	ob_end_clean();

	return $out1;
}

/**
 * [get_golongan_tgr description]
 * @return [type] [description]
 */
function get_golongan_tgr()
{
	include "../backend/includes/connection.php";

	$sql = "SELECT golongan, id_partai FROM jadwal_tgr WHERE kategori='". $_GET['kategori'] ."' group by golongan";

	$exec = mysqli_query($koneksi,$sql);

	$result = [];
	
	$key = 0;
	while($item = mysqli_fetch_array($exec)):
		$result[$key]['id'] = $item['id_partai'];
		$result[$key]['name'] = $item['golongan'];
		$key++;
	endwhile;

	return json_encode($result);
}


/**
 * [partai description]
 * @return [type] [description]
 */
function partai()
{
	include "../backend/includes/connection.php";

	$sql = "SELECT * FROM jadwal_tgr WHERE kategori='". $_GET['kategori'] ."' and golongan='". $_GET['golongan'] ."' ORDER BY id_partai ASC";

	$exec = mysqli_query($koneksi,$sql);

	$result = [];
	
	$key = 0;
	while($item = mysqli_fetch_array($exec)):
		$result[$key]['id'] = $item['id_partai'];
		$result[$key]['name'] = $item['noundian'] .' - '. $item['kontingen'];
		$result[$key]['nama_pemain'] = $item['nama'];
		$result[$key]['undian'] = $item['noundian'];

		$key++;
	endwhile;

	return json_encode($result);
}

function juri()
{
	include "../backend/includes/connection.php";

	$sql = "SELECT * FROM wasit_juri";

	$exec = mysqli_query($koneksi,$sql);

	$result = [];
	
	$key = 0;
	while($item = mysqli_fetch_array($exec)):
		$result[$key]['id'] = $item['id_juri'];
		$result[$key]['name'] = $item['nm_juri'];
		$key++;
	endwhile;

	return json_encode($result);
}

?>