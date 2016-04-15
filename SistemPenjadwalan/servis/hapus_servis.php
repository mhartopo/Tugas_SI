<?php
	include('../../resources/functions/servis/servis.php');
	include('../../resources/functions/log_manager.php');
	
	$jenis = $_GET['jenis'];
	
	writeLog("Information","Menghapus servis ".$jenis);

	deleteServis($jenis);
	
	header('Location: lihat_servis.php');
?>