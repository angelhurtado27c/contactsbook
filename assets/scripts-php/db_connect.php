<?php

/*
define("DB_HOST", "sql308.epizy.com");
define("DB_USER", "epiz_27353345");
define("DB_PASS", "gz3zNxwOU46w0");
define("DB_NAME", "epiz_27353345_contactsbook");
define("DB_CHARSET", "utf8");
*/

// DB Credentials
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "contacts");
define("DB_CHARSET", "utf8");

// DB Connect
try {
	$DB = new PDO("mysql:host=".DB_HOST."; dbname=".DB_NAME, DB_USER, DB_PASS);
	$DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$DB->exec("SET CHARACTER SET ".DB_CHARSET);
} catch ( Exception $e ) {
	die( "Error: " . $e->GetMessage() );
}