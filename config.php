<?php
	session_start();

	ini_set( "display_errors", true );
	ini_set('error_reporting', E_ALL);

	//db constants
	define( "DB_DSN", "mysql:host=192.168.1.17;dbname=appindependiente" );
	define( "DB_USERNAME", "root" );
	define( "DB_PASSWORD", "aec10dc5" );
	define( "DB_HOST", "192.168.1.17" );
	define( "DB_NAME", "appindependiente");


	//website paths
	define( "WEB_URL", "" );
	//regresar a web path real
	if (!isset($cron)) define( "WEB_PATH", 'C:/xampp/htdocs/zenddo/' );
	else  define( "WEB_PATH", 'C:/xampp/htdocs/zenddo/' );
	define( "WEB_PATH_HTML","/zenddo/" );
	define( "WEB_PATH_HTML_CERTIFICATE",WEB_PATH."certificate/" );
	define( "PAGE_NAME", "Zenddo" );
	define( "WEB_DOMAIN", "localhost");
?>
