
<?php

require_once('autoloader.php');
require_once('../config.php');

use pdomysql AS pdomysql;
use admin AS admin;



$time = time();
$fecha = date("Y-m-d (H:i:s)", $time) ;
error_log($fecha);
//admin::cron(null,null,null,$fecha."");

return 0;








?>