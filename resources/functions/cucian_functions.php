<?php
	include 'servis/servis.php';
	include 'pelanggan_functions.php';
	require_once(realpath(dirname(__FILE__) . "/../config.php"));

	if (isset($_POST['createCucian1'])) {
		createCucian1();
	} else if (isset($_POST['createCucian2'])) {
		createCucian2();
	} else if (isset($_POST['createCucian3'])) {
		createCucian3();
	} else if (isset($_POST['ambil'])) {
		finishCucian();
	}

	function createCucian1() {
		session_start();

		$_SESSION['isMember'] = $_POST['isMember'];
		$_SESSION['nama'] = $_POST['nama'];
		$_SESSION['alamat'] = $_POST['alamat'];
		$_SESSION['telepon'] = $_POST['telepon'];

		if ($_SESSION['isMember'] == "Member")  {
			// get data member
			$member = getDataPelangganByTelp($_SESSION['nama'], $_SESSION['telepon']);
			$_SESSION['id_member'] = $member['id_member'];
			$_SESSION['kuota'] = $member['kuota'];
			$_SESSION['alamat'] = $member['alamat'];
		}

		header('Location: /Tugas_SI/SistemPenjadwalan/cucian_baru_2.php');
	}

	function createCucian2() {
		session_start();

		$temp = $_POST['jenisServis'];
		$_SESSION['jumlah'] = $_POST['jumlah'];
		$_SESSION['tanggalOrder'] = date("Y-m-d");
		$_SESSION['tanggalSelesai'] = $_POST['tanggalSelesai'];
		$_SESSION['softener'] = $_POST['softener'];
		$_SESSION['parfum'] = $_POST['parfum'];
		$_SESSION['isDelivery'] = $_POST['isDelivery'];
		$_SESSION['isPickUp'] = $_POST['isPickUp'];

		if (isset($_POST['bayar']))
			$_SESSION['bayar'] = 1;
		else
			$_SESSION['bayar'] = 0;

		// array jenis servis
		$total = 0;
		if (count($temp) > 0) {
            foreach ($temp as $key => $field) {
            	$temp[$key]['harga'] = searchHargaServis($temp[$key]['jenis'])[0][0];
                $temp[$key]['subtotal'] = intval($temp[$key]['jumlah']) * intval($temp[$key]['harga']);
                $total = $total + $temp[$key]['subtotal'];
            }
        };

        $_SESSION['jenisServis'] = $temp;
        $_SESSION['total'] = $total;

        // if member, set kuota
        if ($_SESSION['isMember'] == "Member")  {
			$_SESSION['kuota'] = $_SESSION['kuota'] - $total;
		}

		header('Location: /Tugas_SI/SistemPenjadwalan/cucian_baru_3.php');
	}

	function createCucian3() {
		session_start();
		global $db;

		try {
			// insert laundry
			if ($_SESSION['isMember'] == "Member") {
				$stmt = $db->prepare("INSERT INTO laundry_pengerjaan (tanggal_masuk, tanggal_selesai, id_member, nama_customer, alamat_customer, no_telp_customer, harga, parfum, softener, jumlah, bayar, pick_up, delivery) VALUES (:tanggal_masuk, :tanggal_selesai, :id_member, :nama_customer, :alamat_customer, :no_telp_customer, :harga, :parfum, :softener, :jumlah, :bayar, :pick_up, :delivery)");
				$stmt->bindParam(':tanggal_masuk', $_SESSION['tanggalOrder']);
				$stmt->bindParam(':tanggal_selesai', $_SESSION['tanggalSelesai']);
				$stmt->bindParam(':id_member', $_SESSION['id_member']);
				$stmt->bindParam(':nama_customer', $_SESSION['nama']);
				$stmt->bindParam(':alamat_customer', $_SESSION['alamat']);
				$stmt->bindParam(':no_telp_customer', $_SESSION['telepon']);
				$stmt->bindParam(':harga', $_SESSION['total']);
				$stmt->bindParam(':parfum', $_SESSION['parfum']);
				$stmt->bindParam(':softener', $_SESSION['softener']);
				$stmt->bindParam(':jumlah', $_SESSION['jumlah']);
				$stmt->bindParam(':bayar', $_SESSION['bayar']);
				$yes = 1;
				$no = 0;
				if ($_SESSION['isPickUp'] == "Ya")
					$stmt->bindParam(':pick_up', $yes);
				else
					$stmt->bindParam(':pick_up', $no);
				if ($_SESSION['isDelivery'] == "Ya")
					$stmt->bindParam(':delivery', $yes);
				else
					$stmt->bindParam(':delivery', $no);
				$stmt->execute();

				// change kuota
				reduceKuota($_SESSION['id_member'], $_SESSION['kuota']);
			}
			else {
				$stmt = $db->prepare("INSERT INTO laundry_pengerjaan (tanggal_masuk, tanggal_selesai, nama_customer, alamat_customer, no_telp_customer, harga, parfum, softener, jumlah, bayar, pick_up, delivery) VALUES (:tanggal_masuk, :tanggal_selesai, :nama_customer, :alamat_customer, :no_telp_customer, :harga, :parfum, :softener, :jumlah, :bayar, :pick_up, :delivery)");
				$stmt->bindParam(':tanggal_masuk', $_SESSION['tanggalOrder']);
				$stmt->bindParam(':tanggal_selesai', $_SESSION['tanggalSelesai']);
				$stmt->bindParam(':nama_customer', $_SESSION['nama']);
				$stmt->bindParam(':alamat_customer', $_SESSION['alamat']);
				$stmt->bindParam(':no_telp_customer', $_SESSION['telepon']);
				$stmt->bindParam(':harga', $_SESSION['total']);
				$stmt->bindParam(':parfum', $_SESSION['parfum']);
				$stmt->bindParam(':softener', $_SESSION['softener']);
				$stmt->bindParam(':jumlah', $_SESSION['jumlah']);
				$stmt->bindParam(':bayar', $_SESSION['bayar']);
				$yes = 1;
				$no = 0;
				if ($_SESSION['isPickUp'] == "Ya")
					$stmt->bindParam(':pick_up', $yes);
				else
					$stmt->bindParam(':pick_up', $no);
				if ($_SESSION['isDelivery'] == "Ya")
					$stmt->bindParam(':delivery', $yes);
				else
					$stmt->bindParam(':delivery', $no);
				$stmt->execute();
			}

			//insert servis
			$newest_id = $db->lastInsertId();
			if (count($_SESSION['jenisServis']) > 0) {
            foreach ($_SESSION['jenisServis'] as $key => $field) {
            	$stmt = $db->prepare("INSERT INTO servis_pengerjaan(id_laundry, jenis, jumlah_cucian) VALUES (:id_laundry, :jenis, :jumlah_cucian)");
				$stmt->bindParam(':id_laundry', $newest_id);
				$stmt->bindParam(':jenis', $_SESSION['jenisServis'][$key]['jenis']);
				$stmt->bindParam(':jumlah_cucian', $_SESSION['jenisServis'][$key]['jumlah']);
				$stmt->execute();
            }
        };

		} catch(PDOException $e) {
			echo $e->getMessage();
		}
		if (isAdmin())
		    header("location: /Tugas_SI/SistemPenjadwalan/menu_admin.php");
		else if (isPetugas())
			header('Location: /Tugas_SI/SistemPenjadwalan/menu_petugas.php');
	}

	function getJadwalCucian() {
		global $db;
		try {
			$stmt = $db->prepare("SELECT id_laundry, nama_customer, tanggal_selesai, parfum, softener, jumlah from laundry_pengerjaan ORDER BY tanggal_selesai");
			$stmt->execute();
			return $stmt->fetchAll();
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
		$db = null;
	}

	function getAllCucian() {
		global $db;
		try {
			$stmt = $db->prepare("SELECT id_laundry, nama_customer, tanggal_selesai from laundry_pengerjaan ORDER BY tanggal_selesai");
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

	function getCucianById($id) {
		global $db;
		try {
			$stmt = $db->prepare("SELECT * from laundry_pengerjaan WHERE id_laundry = :id");
			$stmt->bindParam(':id', $id);
			$stmt->execute();
			return $stmt->fetchAll();
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
		$db = null;
	}

	function getServisById($id) {
		global $db;
		try {
			$stmt = $db->prepare("SELECT * from servis_pengerjaan WHERE id_laundry = :id");
			$stmt->bindParam(':id', $id);
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

	function finishCucian() {
		global $db;
		try {
			// laundry
			$stmt = $db->prepare("SELECT * from laundry_pengerjaan WHERE id_laundry = :id");
			$stmt->bindParam(':id', $_POST['id']);
			$stmt->execute();
			$result = $stmt->fetchAll();
			foreach ($result as $key => $field) {
				$stmt = $db->prepare("INSERT INTO laundry_selesai (id_laundry, tanggal_masuk, tanggal_selesai, id_member, nama_customer, alamat_customer, no_telp_customer, harga, parfum, softener, jumlah, pick_up, delivery) VALUES (:id_laundry, :tanggal_masuk, :tanggal_selesai, :id_member, :nama_customer, :alamat_customer, :no_telp_customer, :harga, :parfum, :softener, :jumlah, :pick_up, :delivery)");
				$stmt->bindParam(':id_laundry', $_POST['id']);
				$stmt->bindParam(':tanggal_masuk', $result[$key]['tanggal_masuk']);
				$stmt->bindParam(':tanggal_selesai', $result[$key]['tanggal_selesai']);
				$stmt->bindParam(':id_member', $result[$key]['id_member']);
				$stmt->bindParam(':nama_customer', $result[$key]['nama_customer']);
				$stmt->bindParam(':alamat_customer', $result[$key]['alamat_customer']);
				$stmt->bindParam(':no_telp_customer', $result[$key]['no_telp_customer']);
				$stmt->bindParam(':harga', $result[$key]['harga']);
				$stmt->bindParam(':parfum', $result[$key]['parfum']);
				$stmt->bindParam(':softener', $result[$key]['softener']);
				$stmt->bindParam(':jumlah', $result[$key]['jumlah']);
				$stmt->bindParam(':pick_up', $result[$key]['pick_up']);
				$stmt->bindParam(':delivery', $result[$key]['delivery']);
				$stmt->execute();
			}

			// Servis
			$stmt = $db->prepare("SELECT * from servis_pengerjaan WHERE id_laundry = :id");
			$stmt->bindParam(':id', $_POST['id']);
			$stmt->execute();
			$result = $stmt->fetchAll();
			foreach ($result as $key => $field) {
				$stmt = $db->prepare("INSERT INTO servis_selesai (id_laundry, jenis, jumlah_cucian) VALUES (:id_laundry, :jenis, :jumlah_cucian)");
				$stmt->bindParam(':id_laundry', $_POST['id']);
				$stmt->bindParam(':jenis', $result[$key]['jenis']);
				$stmt->bindParam(':jumlah_cucian', $result[$key]['jumlah_cucian']);
				$stmt->execute();
			}

			// Delete
			$stmt = $db->prepare("DELETE from servis_pengerjaan WHERE id_laundry = :id");
			$stmt->bindParam(':id', $_POST['id']);
			$stmt->execute();
			$stmt = $db->prepare("DELETE from laundry_pengerjaan WHERE id_laundry = :id");
			$stmt->bindParam(':id', $_POST['id']);
			$stmt->execute();
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
		$db = null;
		header('Location: /Tugas_SI/SistemPenjadwalan/ambil_cucian.php');
	}
