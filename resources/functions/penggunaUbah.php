<?php
	require_once("pengguna_functions.php");

	$password = $_POST['password'];
	$password_c = $_POST['password_c'];
	$username = $_POST['username'];
	$peran = $_POST['peran'];

	if ($password == $password_c) {
		createPengguna($username, $peran, $password);
		header("location: /Tugas_SI/SistemPenjadwalan/atur_pengguna.php");
	} else

	header("location: /Tugas_SI/SistemPenjadwalan/atur_pengguna_baru.php?pwdc=-1");