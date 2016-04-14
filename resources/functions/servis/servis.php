<?php

	/*
		MODUL CRUD SERVIS
	*/
	require_once(realpath(dirname(__FILE__) . "../../../config.php"));

	function addServis($jenis, $harga) {
		global $db;
		try {
			$stmt = $db->prepare("SELECT * FROM servis WHERE jenis=:jenis");
			$stmt->bindParam(':jenis', $jenis);
			$stmt->execute();

			if($stmt->rowCount() == 0) {
				$stmt = $db->prepare("INSERT INTO servis (jenis, harga) VALUES(:jenis, :harga)");
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

	function updateServis($jenis, $harga) {
		global $db;
		try {
			$stmt = $db->prepare("UPDATE servis SET harga = :harga WHERE jenis = :jenis");
			$stmt->bindParam(':jenis', $jenis);
			$stmt->bindParam(':harga', $harga);
			$stmt->execute();
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
		$db = null;
	}

	function deleteServis($jenis) {
		global $db;
		try {
			$stmt = $db->prepare("DELETE FROM servis WHERE jenis = :jenis");
			$stmt->bindParam(':jenis', $jenis);
			$stmt->execute();
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
		$db = null;
	}

	function getAllServis() {
		global $db;
		try {
			$stmt = $db->prepare("SELECT * from servis");
			$stmt->execute();
			return $stmt->fetchAll();
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
		$db = null;
	}

	function getServis_jenis($jenis) {
		global $db;
		try {
			$stmt = $db->prepare("SELECT * from servis WHERE jenis = :jenis");
			$stmt->bindParam(':jenis', $jenis);
			$stmt->execute();
			return $stmt->fetchAll();
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
		$db = null;
	}

	function searchHargaServis($jenis) {
		global $db;
		try {
			$stmt = $db->prepare("SELECT * from servis WHERE jenis LIKE :jenis");
			$stmt->bindParam(':jenis', $jenis);
			$stmt->execute();
			return $stmt->fetchAll();
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
		$db = null;
	}

?>