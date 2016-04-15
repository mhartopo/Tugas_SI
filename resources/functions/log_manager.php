<?php
	echo realpath(dirname(__FILE__)."/../log.txt");
	function writeLog($date, $type, $message) {
		$log_file = realpath(dirname(__FILE__)."/../log.txt");
		$current = file_get_contents($log_file);
		$content = $current.$date." - ".$type." - ".$message."\n";
		file_put_contents($log_file, $content, FILE_APPEND | LOCK_EX);
	}
	function eraseLog() {
		$log_file = realpath(dirname(__FILE__)."/../log.txt");
		$content = "";
		file_put_contents($log_file, $content, FILE_APPEND | LOCK_EX);
	}
	
	function getLogContent() {
		$log_file = realpath(dirname(__FILE__)."/../log.txt");
		return file_get_contents($log_file);
	}
?>