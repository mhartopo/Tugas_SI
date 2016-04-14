<?php 

	/*
		Modul servis pengerjaan

	*/
	require_once(realpath(dirname(__FILE__) . "../../../config.php"));


	function addServisPengerjaan($id_laundry, $jenis, $jumlah_cucian) {
		global $db;
		try {
			$stmt = $db->prepare("SELECT * FROM servis_pengerjaan WHERE jenis=:jenis and id_laundry = :id_laundry");
			$stmt->bindParam(':jenis', $jenis);
			$stmt->bindParam(':id_laundry', $id_laundry);
			$stmt->execute();

			if($stmt->rowCount() == 0) {
				$stmt = $db->prepare("INSERT INTO servis_pengerjaan (id_laundry, jenis, harga) VALUES(:id_laundry, :jenis, :harga)");
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

	function getServisPengerjaan() {
		global $db;
		try {
			
			$stmt = $db->prepare("SELECT * FROM servis_pengerjaan");
			return $stmt->fetchAll();

		}catch(PDOException $e) {
			echo $e->getMessage();
		}
		$db = null;
	}

	function getServisPengerjaan($id_laundry) {
		global $db;
		try {
			
			$stmt = $db->prepare("SELECT * FROM servis_pengerjaan WHERE id_laundry = :id_laundry");
			$stmt->bindParam(':id_laundry', $id_laundry);
			return $stmt->fetchAll();

		}catch(PDOException $e) {
			echo $e->getMessage();
		}
		$db = null;
	}

	function getServisPengerjaan($jenis) {
		global $db;
		try {
			
			$stmt = $db->prepare("SELECT * FROM servis_pengerjaan WHERE jenis = :jenis");
			$stmt->bindParam(':jenis', $jenis);
			return $stmt->fetchAll();

		}catch(PDOException $e) {
			echo $e->getMessage();
		}
		$db = null;
	}

	function getServisPengerjaan($id_laundry, $jenis) {
		global $db;
		try {
			
			$stmt = $db->prepare("SELECT * FROM servis_pengerjaan WHERE id_laundry = :id_laundry AND jenis = :jenis");
			$stmt->bindParam(':id_laundry', $id_laundry);
			$stmt->bindParam(':jenis', $jenis);
			return $stmt->fetchAll();

		}catch(PDOException $e) {
			echo $e->getMessage();
		}
		$db = null;
	}

	function deleteServisPengerjaan($id_laundry, $jenis) {
		global $db;
		try {
			$stmt = $db->prepare("DELETE servis_pengerjaan WHERE id_laundry = :id_laundry AND jenis = :jenis");
			$stmt->bindParam(':id_laundry', $id_laundry);
			$stmt->bindParam(':jenis', $jenis);
			$stmt->execute();
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
		$db = null;
	}

	function updateServicePengerjaan($id_laundry, $jenis, $jumlah_cucian) {
		global $db;
		try {
			$stmt = $db->prepare("UPDATE servis_pengerjaan SET jumlah_cucian = :jumlah_cucian WHERE id_laundry = :id_laundry AND jenis = :jenis");
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