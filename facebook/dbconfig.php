<?php

define('DB_SERVER', 'aav1dgv9gsq87g.cwhaggvv5lvi.us-west-2.rds.amazonaws.com');
define('DB_USERNAME', 'webmaster');    // DB username
define('DB_PASSWORD', 'N3utralz0n3');    // DB password
define('DB_DATABASE', 'u913897248_adic');      // DB name
$connection = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die( "Unable to connect");
$database = mysql_select_db(DB_DATABASE) or die( "Unable to select database");
date_default_timezone_set('America/Mexico_City');
?>