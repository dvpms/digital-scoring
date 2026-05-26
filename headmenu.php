<link rel="stylesheet" type="text/css" href="css/jquery-ui.css" />
<script type="text/javascript" src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.10.3.custom.js"></script>
<style type="text/css">
<!--
.stylesum {color: #00CCFF}
-->
</style>

	<?php
	include "backend/includes/connection.php";
	$NOW = date("Y-m-d");
	
	?>
    <!-- begin: head -->
	<div id="head" class="non-printable">
	  <!-- logo --><h1 id="logo" name="logo"><a href="index.php"></a><a href="index.php"><img src="images/logo_jawara.png" height="85" /></a></h1>
        <!-- Main menu -->
        <ul id="navigation">
            <li class="highlighted"><a href="index.php">Home</a></li>
            <li class="highlighted"><a href="mulai_pendaftaran.php">Pendaftaran</a></li>
			<li class="highlighted"><a href="pencarian.php">Pencarian Data</a></li>
			<li class="highlighted"><a href="konfirmasi.php">Konfirmasi Pembayaran</a></li>
			<li class="highlighted"><a href="bantuan.php">Bantuan</a></li>
        </ul>
    <!-- end: head -->
	</div>
	<!-- begin: promo-box -->
	<div id="promo-box" class="printable">
		<div class="inner">
		</div>
	</div>