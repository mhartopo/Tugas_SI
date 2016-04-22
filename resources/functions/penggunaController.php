<?php
	require_once("pengguna_functions.php");

	$id = $_POST['id'];
	$password = $_POST['password'];
	$password_c = $_POST['password_c'];
	$username = $_POST['username'];
	$peran = $_POST['peran'];

	if (isset($_POST['pengguna_ubah'])) {
		if ($password == $password_c) {
			updatePengguna($id, $username, $password, $peran);
			header("location: /Tugas_SI/SistemPenjadwalan/atur_pengguna.php");
		} else

		header("location: /Tugas_SI/SistemPenjadwalan/atur_pengguna_ubah.php?pwdc=-1&id=" . $id);
	} else if (isset($_POST['pengguna_baru'])) {
		if ($password == $password_c) {
			createPengguna($username, $peran, $password);
			header("location: /Tugas_SI/SistemPenjadwalan/atur_pengguna.php");
		} else

		header("location: /Tugas_SI/SistemPenjadwalan/atur_pengguna_baru.php?pwdc=-1");
	} else if (isset($_POST['pengguna_hapus'])) {
		deletePengguna($id);
		header("location: /Tugas_SI/SistemPenjadwalan/atur_pengguna.php");
	} else if (isset($_POST['login'])) {
		if (loginPengguna($username, $password)) {
			header("location: /Tugas_SI/SistemPenjadwalan/home.php");
		} else {
			header("location: /Tugas_SI/SistemPenjadwalan/index.php");
		}
	}