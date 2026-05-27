<?php
	require_once("functions/function.php");
	get_header();
	get_sidebar();
	get_bread_two();

	include("includes/connection.php");

	//Mencari data jadwal pertandingan
	$sqljadwal = "SELECT * FROM jadwal_tgr ORDER BY id_partai DESC";
	$jadwal_tgr = mysqli_query($koneksi,$sqljadwal);
	
?>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white download"></i><span class="break"></span>Input Jadwal Tunggal</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="post" action="do_post_jadwal_tunggal.php">
							<table>
								<tr>
									<td>Golongan</td>
									<td>: 	<input type="text" name="golongan" id="golongan" maxlength="35" placeholder="Contoh: Putra Dewasa"></td>
								</tr>
								<tr>
									<td>No Undian</td>
									<td>: 	<input type="text" name="no_undian" id="no_undian" maxlength="35"></td>
								</tr>
								<tr>
									<td>Nama Pesilat</td>
									<td>: 	<input type="text" name="nama" id="nama" maxlength="35"></td>
								</tr>
								<tr>
									<td>Kontingen</td>
									<td>: 	<input type="text" name="kontingen" id="kontingen" maxlength="35"></td>
								</tr>
								<tr>
									<td colspan="2"><input type="submit" class="btn btn-info" value="SUBMIT"></td>
								</tr>
							</table>
						</form>
					</div>
				</div><!--/span-->
			</div><!--/row-->

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white download"></i><span class="break"></span>Input Jadwal Ganda</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="post" action="do_post_jadwal_ganda.php">
							<table>
								<tr>
									<td>Golongan</td>
									<td>: 	<input type="text" name="golongan" id="golongan" maxlength="35" placeholder="Contoh: Putra Dewasa"></td>
								</tr>
								<tr>
									<td>No Undian</td>
									<td>: 	<input type="text" name="no_undian" id="no_undian" maxlength="35"></td>
								</tr>
								<tr>
									<td>Nama Pesilat 1</td>
									<td>: 	<input type="text" name="nama1" id="nama1" maxlength="35"></td>
								</tr>
								<tr>
									<td>Nama Pesilat 2</td>
									<td>: 	<input type="text" name="nama2" id="nama2" maxlength="35"></td>
								</tr>
								<tr>
									<td>Kontingen</td>
									<td>: 	<input type="text" name="kontingen" id="kontingen" maxlength="35"></td>
								</tr>
								<tr>
									<td colspan="2"><input type="submit" class="btn btn-info" value="SUBMIT"></td>
								</tr>
							</table>
						</form>
					</div>
				</div><!--/span-->
			</div><!--/row-->

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white download"></i><span class="break"></span>Input Jadwal Regu</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="post" action="do_post_jadwal_regu.php">
							<table>
								<tr>
									<td>Golongan</td>
									<td>: 	<input type="text" name="golongan" id="golongan" maxlength="35" placeholder="Contoh: Putra Dewasa"></td>
								</tr>
								<tr>
									<td>No Undian</td>
									<td>: 	<input type="text" name="no_undian" id="no_undian" maxlength="35"></td>
								</tr>
								<tr>
									<td>Nama Pesilat 1</td>
									<td>: 	<input type="text" name="nama1" id="nama1" maxlength="35"></td>
								</tr>
								<tr>
									<td>Nama Pesilat 2</td>
									<td>: 	<input type="text" name="nama2" id="nama2" maxlength="35"></td>
								</tr>
								<tr>
									<td>Nama Pesilat 3</td>
									<td>: 	<input type="text" name="nama3" id="nama3" maxlength="35"></td>
								</tr>
								<tr>
									<td>Kontingen</td>
									<td>: 	<input type="text" name="kontingen" id="kontingen" maxlength="35"></td>
								</tr>
								<tr>
									<td colspan="2"><input type="submit" class="btn btn-info" value="SUBMIT"></td>
								</tr>
							</table>
						</form>
					</div>
				</div><!--/span-->
			</div><!--/row-->

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white download"></i><span class="break"></span>Data Jadwal TGR</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						<thead>
							<tr>
								<th>NO</th>
								<th>KATEGORI</th>
								<th>GOLONGAN</th>
								<th>NO UNDIAN</th>
								<th>NAMA</th>
								<th>KONTINGEN</th>
								<th>ACTIONS</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=0; while($jadwal = mysqli_fetch_array($jadwal_tgr)) { $no++;?>
							<tr>
								<td><?php echo $no; ?></td>
								<td><?php echo $jadwal['kategori']; ?></td>
								<td><?php echo $jadwal['golongan']; ?></td>
								<td><?php echo $jadwal['noundian']; ?></td>
								<td><?php echo $jadwal['nama']; ?></td>
								<td><?php echo $jadwal['kontingen']; ?></td>
								<td class="center">
									<a class="btn btn-danger" onclick="return confirmDel()" href="del_partai_tgr.php?id_partai=<?php echo $jadwal['id_partai'];?>">
										<i class="halflings-icon white trash"></i>
									</a>
								</td>
							</tr>
							<?php } ?>
						</tbody>
						</table>
					</div>
				</div><!--/span-->
			</div><!--/row-->

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon white remove"></i><span class="break"></span>CLEAR ALL - JADWAL & NILAI KELAS TGR</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
			</div>
		</div>

		<div class="box-content">
			<form class="form-horizontal" method="post" action="do_clear_jadwal_tgr.php">
				<p>Dengan menekan tombol "HAPUS SEMUA" di bawah ini, maka seluruh data <b>Jadwal Partai beserta Nilai Penjuriannya</b> pada <b>Kelas TGR</b> akan hilang dari database.</p>
				<input type="submit" onclick="return confirmDel()" class="btn btn-danger" value="HAPUS SEMUA">
			</form>
		</div>
	</div><!--/span-->		
</div><!--/row-->


<?php
	get_footer();
?>