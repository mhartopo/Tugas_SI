<?php 
	include('../../resources/functions/servis/servis.php');
	
	$jenis = $_POST['jenis'];
	$harga = $_POST['harga'];
	updateServis($jenis, $harga);
	header('Location: lihat_servis.php');
?>