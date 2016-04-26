<?php
	require_once(realpath(dirname(__FILE__) . "/../config.php"));
	require_once("pengguna_functions.php");
	require_once("log_manager.php");

	function createPelanggan($username, $alamat, $phone) {
		start();
		global $db;

		try {
			$stmt = $db->prepare("SELECT * FROM member WHERE nama=:username AND alamat=:alamat AND no_telp=:phone");
			$stmt->bindParam(':username', $username);
			$stmt->bindParam(':alamat', $alamat);
			$stmt->bindParam(':phone', $phone);
			$stmt->execute();

			if($stmt->rowCount() > 0) {
				return false;
			} else {
				$stmt = $db->prepare("INSERT INTO member (nama, alamat, no_telp, kuota) VALUES(:username, :alamat, :phone, 0)");
				$stmt->bindParam(':username', $username);
				$stmt->bindParam(':alamat', $alamat);
				$stmt->bindParam(':phone', $phone);
				$stmt->execute();
				$user = getDataPengguna($_SESSION['usession']);
				writeLog($user['nama'], 'pelanggan baru: ' . $username . ', ' . $alamat . ', ' . $phone);
				return true;
			}

		} catch(PDOException $e) {
			echo $e->getMessage();
		}
	}

	function getDataPelanggan($id) {
		//start();
		global $db;

		try {
			$stmt = $db->prepare("SELECT * FROM member WHERE id_member=:id LIMIT 1");
			$stmt->bindParam(':id', $id);
			$stmt->execute();

			$user = $stmt->fetch(PDO::FETCH_ASSOC);

			return $user;
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
	}

	function getDataPelangganByTelp($nama, $no_telp) {
		//start();
		global $db;

		try {
			$stmt = $db->prepare("SELECT * from member WHERE nama = :nama AND no_telp = :no_telp LIMIT 1");
			$stmt->bindParam(':nama', $nama);
			$stmt->bindParam(':no_telp', $no_telp);
			$stmt->execute();

			$user = $stmt->fetch(PDO::FETCH_ASSOC);

			return $user;
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
	}

	function getDataPelangganBySearch($search) {
		global $db;

		$search = '%' . $search . '%';

		try {
			$stmt = $db->prepare("SELECT id_member, nama, kuota FROM member WHERE nama LIKE :search OR id_member LIKE :search");
			$stmt->bindParam(':search', $search);
			$stmt->execute();

			return $stmt->fetchAll();

		} catch(PDOException $e) {
			echo $e->getMessage();
		}
	}

	function updatePelanggan($id, $new_username, $new_alamat, $phone) {
		start();
		global $db;
		
		try {
			$stmt = $db->prepare("UPDATE member SET nama=:new_username, alamat=:new_alamat, no_telp=:phone WHERE id_member=:id");
			$stmt->bindParam(':new_username', $new_username);
			$stmt->bindParam(':new_alamat', $new_alamat);
			$stmt->bindParam(':phone', $phone);
			$stmt->bindParam(':id', $id);
			$stmt->execute();

			$user = getDataPengguna($_SESSION['usession']);
			writeLog($user['nama'], 'pelanggan ubah: id ' . $id . ', ' . $new_username . ', ' . $new_alamat . ', ' . $phone);
		} catch(PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
	}

	function updatePelangganKuota($id, $new_kuota) {
		start();
		global $db;
		
		try {
			$stmt = $db->prepare("UPDATE member SET kuota=kuota + :kuota WHERE id_member=:id");
			$stmt->bindParam(':kuota', $new_kuota);
			$stmt->bindParam(':id', $id);
			$stmt->execute();

			$user = getDataPengguna($_SESSION['usession']);
			writeLog($user['nama'], 'pelanggan kuota: ' . $id . ', kuota + ' . $new_kuota);
		} catch(PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
	}

	function reduceKuota($id, $new_kuota) {
		start();
		global $db;
		
		try {
			$stmt = $db->prepare("UPDATE member SET kuota=:kuota WHERE id_member=:id");
			$stmt->bindParam(':kuota', $new_kuota);
			$stmt->bindParam(':id', $id);
			$stmt->execute();

			$user = getDataPengguna($_SESSION['usession']);
			writeLog($user['nama'], 'pelanggan kuota: ' . $id . ', kuota ' . $new_kuota);
		} catch(PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
	}

	function deletePelanggan($id) {
		start();
		global $db;
		
		try {
			$stmt = $db->prepare("DELETE FROM member WHERE id_member=:id");
			$stmt->bindParam(':id', $id);
			$stmt->execute();

			$user = getDataPengguna($_SESSION['usession']);
			writeLog($user['nama'], 'pelanggan hapus: ' . $id);
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
	}