<?php
	include 'servis/servis.php';
	require_once(realpath(dirname(__FILE__) . "/../config.php"));

	if (isset($_POST['createCucian1'])) {
		createCucian1();
	} else if (isset($_POST['createCucian2'])) {
		createCucian2();
	} else if (isset($_POST['createCucian3'])) {
		createCucian3();
	}

	function createCucian1() {
		session_start();

		$_SESSION['isMember'] = $_POST['isMember'];
		$_SESSION['nama'] = $_POST['nama'];
		$_SESSION['alamat'] = $_POST['alamat'];
		$_SESSION['telepon'] = $_POST['telepon'];

		header('Location: /Tugas_SI/SistemPenjadwalan/cucian_baru_2.php');
	}

	function createCucian2() {
		session_start();

		$temp = $_POST['jenisServis'];
		$_SESSION['jumlah'] = $_POST['jumlah'];
		$_SESSION['tanggalOrder'] = date("Y/m/d");
		$_SESSION['tanggalSelesai'] = $_POST['tanggalSelesai'];
		$_SESSION['softener'] = $_POST['softener'];
		$_SESSION['parfum'] = $_POST['parfum'];
		$_SESSION['isDelivery'] = $_POST['isDelivery'];
		$_SESSION['isPickUp'] = $_POST['isPickUp'];

		// array jenis servis
		$total = 0;
		if (count($temp) > 0) {
            foreach ($temp as $key => $field) {
            	$temp[$key]['harga'] = searchHargaService($temp[$key]['jenis'])[0][0];
                $temp[$key]['subtotal'] = intval($temp[$key]['jumlah']) * intval($temp[$key]['harga']);
                $total = $total + $temp[$key]['subtotal'];
            }
        };

        $_SESSION['jenisServis'] = $temp;
        $_SESSION['total'] = $total;

		header('Location: /Tugas_SI/SistemPenjadwalan/cucian_baru_3.php');
	}

	function createCucian3() {
		start();
		global $db;

		try {
			$stmt = $db->prepare("INSERT INTO laundry_pengerjaan (tanggal_masuk, tanggal_selesai, id_member, nama_customer, alamat_customer, no_telp_customer, harga, parfum, softener, jumlah, bayar, pick_up, delivery) VALUES (:tanggal_masuk, :tanggal_selesai, :id_member, :nama_customer, :alamat_customer, :no_telp_customer, :harga, :parfum, :softener, :jumlah, :bayar, :pick_up, :delivery)");
			$stmt->bindParam(':tanggal_masuk', $_SESSION['tanggalOrder']);
			$stmt->bindParam(':tanggal_selesai', $_SESSION['tanggalSelesai']);
			$stmt->bindParam(':id_member', $_SESSION['']);
			$stmt->bindParam(':nama_customer', $_SESSION['nama']);
			$stmt->bindParam(':alamat_customer', $_SESSION['alamat']);
			$stmt->bindParam(':no_telp_customer', $_SESSION['telepon']);
			$stmt->bindParam(':harga', $_SESSION['total']);
			$stmt->bindParam(':parfum', $_SESSION['parfum']);
			$stmt->bindParam(':softener', $_SESSION['softener']);
			$stmt->bindParam(':jumlah', $_SESSION['jumlah']);
			$stmt->bindParam(':bayar', );
			$stmt->bindParam(':pick_up', $_SESSION['']);
			$stmt->bindParam(':delivery', $_SESSION['']);
			$stmt->execute();
		} catch(PDOException $e) {
			echo $e->getMessage();
		}

		header('Location: /Tugas_SI/SistemPenjadwalan/index.html');
	}

	function getAllCucian() {
		global $db;
		try {
			$stmt = $db->prepare("SELECT id, nama_customer, tanggal_selesai, parfum, softener from laundry_pengerjaan");
			$stmt->execute();
			return $stmt->fetchAll();
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
		$db = null;
	}

	function getCucianByDate($date) {
		global $db;
		try {
			$stmt = $db->prepare("SELECT id, nama_customer, tanggal_selesai from laundry_pengerjaan WHERE tanggal_selesai = :tanggal_selesai");
			$stmt->bindParam(':tanggal_selesai', $date);
			$stmt->execute();
			return $stmt->fetchAll();
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
		$db = null;
	}

	function searchCucian($nama) {
		global $db;
		try {
			$stmt = $db->prepare("SELECT id, nama_customer, tanggal_selesai from laundry_pengerjaan WHERE nama = :nama");
			$stmt->bindParam(':nama', $nama);
			$stmt->execute();
			return $stmt->fetchAll();
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
		$db = null;
	}

	

	