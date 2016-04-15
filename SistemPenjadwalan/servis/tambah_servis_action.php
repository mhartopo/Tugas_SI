<?php
	include('../../resources/functions/servis/servis.php');
	include('../../resources/functions/log_manager.php');

	$jenis = $_POST['jenis'];
	$harga = $_POST['harga'];
	addServis($jenis, $harga);

	writeLog("Information", "Menambahkan servis ".$jenis);

	header('Location: lihat_servis.php');
?>