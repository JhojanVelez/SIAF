<?php

define("SGBD", "mysql");
define("DB_HOST", "localhost");
define("DB_NAME", "siaf");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_CHARSET", "UTF8");
define("DSN", SGBD.":host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET);
define("URL_RAIZ", "http://".DB_HOST.":8080/SIAF/");

?>