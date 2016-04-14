<?php
	require_once(realpath(dirname(__FILE__) . "/../config.php"));

	function getNDayOrder($days) {
		global $db;
		try {
			$stmt = $db->prepare("SELECT tanggal_masuk,COUNT(*) FROM laundry_masuk as jumlah GROUP BY tanggal_masuk ORDER BY tanggal_masuk LIMIT :days");
			$stmt->bindParam(':days', $days);
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
			$str = $carry.$str."[".$row['tanggal_masuk'].",".$row['jumlah']."]"
		}
		return $str;
	}
?>