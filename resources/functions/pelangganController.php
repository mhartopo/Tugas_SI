<?php
	require_once("pelanggan_functions.php");

	$id = $_POST['id'];
	$username = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$phone = $_POST['phone'];
	$kuota = $_POST['kuota'];

	if (isset($_POST['pelanggan_ubah'])) {
		updatePelanggan($id, $username, $alamat, $phone);
		header("location: /Tugas_SI/SistemPenjadwalan/atur_pelanggan.php");
	} else if (isset($_POST['kuota_tambah'])) {
		updatePelangganKuota($id, $kuota);
		header("location: /Tugas_SI/SistemPenjadwalan/atur_pelanggan_ubah.php?id=" . $id);
	} else if (isset($_POST['pelanggan_baru'])) {
		createPelanggan($username, $alamat, $phone);
		header("location: /Tugas_SI/SistemPenjadwalan/atur_pelanggan.php");
	} else if (isset($_POST['pelanggan_hapus'])) {
		deletePelanggan($id);
		header("location: /Tugas_SI/SistemPenjadwalan/atur_pelanggan.php");
	}