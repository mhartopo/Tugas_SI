<?php
	function writeLog($type, $message) {		
		$date = date("Y/m/d h:i:sa");
		$log_file = realpath(dirname(__FILE__)."/../log.txt");
		$content = $date." - ".$type." - ".$message."\n";
		file_put_contents($log_file, $content, FILE_APPEND | LOCK_EX);
	}
	
	function deleteLog() {
		$log_file = realpath(dirname(__FILE__)."/../log.txt");
		$content = "";
		file_put_contents($log_file, $content, LOCK_EX);
	}
	
	function getLogContent() {
		$log_file = realpath(dirname(__FILE__)."/../log.txt");
		return file_get_contents($log_file);
	}
?>