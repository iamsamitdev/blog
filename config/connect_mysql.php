<?php 
	// กำหนดค่าคงที่เร่ิมต้นที่ใช้เชื่อมต่อฐานข้อมูล
	define("DB_HOST","localhost");
	define("DB_USERNAME","root");
	define("DB_PASSWORD","1234");
	define("DB_SCHEMA","blog");
	define("DB_PORT","3306");
	define("DB_ENCODING","utf8");

	// กำหนดตัวแปรสำหรับเชื่อมฐานข้อมูล
	$dsn = 'mysql:host='.DB_HOST.';dbname='.DB_SCHEMA.';port='.DB_PORT;
	$options = array(
		PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
		PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES '.DB_ENCODING
	);

	// คำสั่ง Connect mysql
	try {
		$connect = @new PDO($dsn,DB_USERNAME,DB_PASSWORD,$options);
		//echo "Connection success";
	} catch (Exception $e) {
		echo "Connection failed: " . $e->getMessage();
	}



