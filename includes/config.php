<?php
// Basic config junk

	$startTime = microtime(true);
	define('START',$startTime);
	$host = $_SERVER['HTTP_HOST'];
	define('ROOT_URL', 'http://' . $host . '/linuxTuts/');

	define('DEBUG',FALSE);
	
	define('DB_NAME','linuxTuts');
	define('DB_USER','root');
	define('DB_PASS','root');
	define('DB_HOST','localhost');

	//define('')
		
?>
