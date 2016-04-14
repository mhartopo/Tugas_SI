<?php 

	/*
		Modul servis Selesai

	*/
	require_once(realpath(dirname(__FILE__) . "../../../config.php"));


	function addServisSelesai($id_laundry, $jenis, $jumlah_cucian) {
		global $db;
		try {
			$stmt = $db->prepare("SELECT * FROM servis_selesai WHERE jenis=:jenis and id_laundry = :id_laundry");
			$stmt->bindParam(':jenis', $jenis);
			$stmt->bindParam(':id_laundry', $id_laundry);
			$stmt->execute();

			if($stmt->rowCount() == 0) {
				$stmt = $db->prepare("INSERT INTO servis_selesai (id_laundry, jenis, harga) VALUES(:id_laundry, :jenis, :harga)");
				$stmt->bindParam(':id_laundry', $id_laundry);
				$stmt->bindParam(':jenis',$jenis);
				$stmt->bindParam(':harga',$harga);
				$stmt->execute();
				return true;
			} else {
				return false;
			}

		} catch(PDOException $e) {
			echo $e->getMessage();
		}
		$db = null;
	}

	function getServisSelesai() {
		global $db;
		try {
			
			$stmt = $db->prepare("SELECT * FROM servis_selesai");
			return $stmt->fetchAll();

		}catch(PDOException $e) {
			echo $e->getMessage();
		}
		$db = null;
	}

	function getServisSelesai($id_laundry) {
		global $db;
		try {
			
			$stmt = $db->prepare("SELECT * FROM servis_selesai WHERE id_laundry = :id_laundry");
			$stmt->bindParam(':id_laundry', $id_laundry);
			return $stmt->fetchAll();

		}catch(PDOException $e) {
			echo $e->getMessage();
		}
		$db = null;
	}

	function getServisSelesai($jenis) {
		global $db;
		try {
			
			$stmt = $db->prepare("SELECT * FROM servis_selesai WHERE jenis = :jenis");
			$stmt->bindParam(':jenis', $jenis);
			return $stmt->fetchAll();

		}catch(PDOException $e) {
			echo $e->getMessage();
		}
		$db = null;
	}

	function getServisSelesai($id_laundry, $jenis) {
		global $db;
		try {
			
			$stmt = $db->prepare("SELECT * FROM servis_selesai WHERE id_laundry = :id_laundry AND jenis = :jenis");
			$stmt->bindParam(':id_laundry', $id_laundry);
			$stmt->bindParam(':jenis', $jenis);
			return $stmt->fetchAll();

		}catch(PDOException $e) {
			echo $e->getMessage();
		}
		$db = null;
	}

	function deleteServisSelesai($id_laundry, $jenis) {
		global $db;
		try {
			$stmt = $db->prepare("DELETE servis_selesai WHERE id_laundry = :id_laundry AND jenis = :jenis");
			$stmt->bindParam(':id_laundry', $id_laundry);
			$stmt->bindParam(':jenis', $jenis);
			$stmt->execute();
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
		$db = null;
	}

	function updateServisSelesai($id_laundry, $jenis, $jumlah_cucian) {
		global $db;
		try {
			$stmt = $db->prepare("UPDATE servis_selesai SET jumlah_cucian = :jumlah_cucian WHERE id_laundry = :id_laundry AND jenis = :jenis");
			$stmt->bindParam(':id_laundry', $id_laundry);
			$stmt->bindParam(':jenis', $jenis);
			$stmt->bindParam(':jumlah_cucian', $jumlah_cucian);
			$stmt->execute();
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
		$db = null;
	}
?>