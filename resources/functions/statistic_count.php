<?php
	require_once(realpath(dirname(__FILE__) . "/../config.php"));

	function getNDayOrder($days) {
		global $db;
		try {
			$stmt = $db->prepare("SELECT EXTRACT(DAY from tanggal_masuk) as tanggal,COUNT(*) as jumlah FROM `laundry_pengerjaan` GROUP BY tanggal_masuk ORDER BY tanggal_masuk LIMIT ".$days);
			$stmt->bindParam(':day', $days);
			$stmt->execute();
			return $stmt->fetchAll();
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
	}

	function getNdayStat($days) {
		$result = getNDayOrder($days);
		$str = "";
		foreach ($result as $row) {
			$carry = "";
			if($str != "") {
				$carry = ",";
			}
			$str = "[".$row['tanggal'].",".$row['jumlah']."]".$carry.$str;
		}

		return $str;
	}

	function getPendapatanAtMonth($month, $year) {
		global $db;
		try {
			$stmt = $db->prepare("SELECT EXTRACT(DAY from tanggal_masuk) as tanggal,SUM(harga) as jumlah FROM `laundry_pengerjaan` WHERE  :tahun = EXTRACT(YEAR FROM tanggal_masuk) AND :bulan = EXTRACT(MONTH FROM tanggal_masuk) GROUP BY tanggal_masuk ORDER BY tanggal_masuk");
			$stmt->bindParam(':tahun', $year);
			$stmt->bindParam(':bulan', $month);
			$stmt->execute();
			$result = $stmt->fetchAll();
			$str = "";
			foreach ($result as $row) {
				$carry = "";
				if($str != "") {
					$carry = ",";
				}
				$str = "[".$row['tanggal'].",".$row['jumlah']."]".$carry.$str;
			}

			return $str;
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
	}

	function getOrderAtMonth($month, $year) {
		global $db;
		try {
			$stmt = $db->prepare("SELECT EXTRACT(DAY from tanggal_masuk) as tanggal,COUNT(*) as jumlah FROM `laundry_pengerjaan` WHERE  :tahun = EXTRACT(YEAR FROM tanggal_masuk) AND :bulan = EXTRACT(MONTH FROM tanggal_masuk) GROUP BY tanggal_masuk ORDER BY tanggal_masuk");
			$stmt->bindParam(':tahun', $year);
			$stmt->bindParam(':bulan', $month);
			$stmt->execute();
			$result = $stmt->fetchAll();
			$str = "";
			foreach ($result as $row) {
				$carry = "";
				if($str != "") {
					$carry = ",";
				}
				$str = "[".$row['tanggal'].",".$row['jumlah']."]".$carry.$str;
			}

			return $str;
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
	}
?>