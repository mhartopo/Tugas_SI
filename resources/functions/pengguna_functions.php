<?php
	require_once(realpath(dirname(__FILE__) . "/../config.php"));

	function createPengguna($username, $peran, $password) {
		//start();
		global $db;

		try {
			$stmt = $db->prepare("SELECT * FROM pengguna WHERE nama=:username AND peran=:peran");
			$stmt->bindParam(':username', $username);
			$stmt->bindParam(':peran', $peran);
			$stmt->execute();

			if($stmt->rowCount() > 0) {
				return false;
			} else {
				$stmt = $db->prepare("INSERT INTO pengguna (nama, peran, password) VALUES(:username, :peran, :password)");
				$stmt->bindParam(':username', $username);
				$stmt->bindParam(':peran', $peran);
				$stmt->bindParam(':password', crypt($password));
				$stmt->execute();
				return true;
			}

		} catch(PDOException $e) {
			echo $e->getMessage();
		}
	}

	function getDataPengguna($id) {
		//start();
		global $db;

		try {
			$stmt = $db->prepare("SELECT id_pengguna, nama, peran FROM pengguna WHERE id_pengguna=:id LIMIT 1");
			$stmt->bindParam(':id', $id);
			$stmt->execute();

			$user = $stmt->fetch(PDO::FETCH_ASSOC);

			return $user;
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
	}

	function getDataPenggunaBySearch($search) {
		//start();
		global $db;

		$search = '%' . $search . '%';

		try {
			$stmt = $db->prepare("SELECT id_pengguna, nama, peran FROM pengguna WHERE nama LIKE :search OR id_pengguna LIKE :search");
			$stmt->bindParam(':search', $search);
			$stmt->execute();

			return $stmt->fetchAll();

		} catch(PDOException $e) {
			echo $e->getMessage();
		}
	}

	function updatePengguna($id, $new_username, $new_password, $new_peran) {
		global $db;

		try {
			$stmt = $db->prepare("UPDATE pengguna SET nama=:new_username, password=:new_password, peran=:new_peran WHERE id_pengguna=:id");
			$stmt->bindParam(':new_username', $new_username);
			$stmt->bindParam(':new_password', crypt($new_password));
			$stmt->bindParam(':new_peran', $new_peran);
			$stmt->bindParam(':id', $id);
			$stmt->execute();

		} catch(PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
	}

	function deletePengguna($id) {
		global $db;

		try {
			$stmt = $db->prepare("DELETE FROM pengguna WHERE id_pengguna=:id");
			$stmt->bindParam(':id', $id);
			$stmt->execute();

		} catch(PDOException $e) {
			echo $e->getMessage();
		}
	}

	function loginPengguna($username, $password) {
		global $db;

		try {
			$stmt = $db->prepare("SELECT id_pengguna, peran, password FROM pengguna WHERE nama=:username");
			$stmt->bindParam(':username', $username);
			$stmt->execute();

			$user = $stmt->fetch(PDO::FETCH_ASSOC);

			if($stmt->rowCount() > 0) {
				if(password_verify($password, $user['password'])) {
  					session_start();
					$_SESSION['usession'] = $user['id'];
					if($user['peran'] == 1)
						$_SESSION['role'] = 'admin';
					else
						$_SESSION['role'] = 'petugas';
					return true;
				} else {
					return false;
				}
			}
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
	}