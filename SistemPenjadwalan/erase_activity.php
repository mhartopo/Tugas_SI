<?php
	include("../resources/functions/log_manager.php");
	deleteLog();
	writeLog("Information", "Bersihkan Log");
	header('Location: lihat_aktivitas.php');
?>