<?php
$mapping = array(
    'pdomysql' => __DIR__ . '/controller/pdomysql.php',
    'config' => __DIR__ . '/controller/config.php',
    'demo' => __DIR__ . '/controller/demo.php',
);

spl_autoload_register(function ($class) use ($mapping) {
    if (isset($mapping[$class])) {
        require $mapping[$class];
    }
}, true);

?>
