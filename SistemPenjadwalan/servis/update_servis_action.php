<?php 
	include('../../resources/functions/servis/servis.php');
	include('../../resources/functions/log_manager.php');

	$jenis = $_POST['jenis'];
	$harga = $_POST['harga'];

	writeLog("Information", "update servis ".$jenis." ".$harga);

	updateServis($jenis, $harga);

	header('Location: lihat_servis.php');
?>