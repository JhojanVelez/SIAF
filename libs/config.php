<?php

/*Conexion local*/

// define("SGBD", "mysql");
// define("DB_HOST", "localhost");
// define("DB_NAME", "siaf");
// define("DB_USER", "root");
// define("DB_PASSWORD", "");
// define("DB_CHARSET", "UTF8");
// define("DSN", SGBD.":host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET);
// define("URL_RAIZ", "http://".DB_HOST.":8080/SIAF/");
// define("URL_FAVICON", "http://".DB_HOST.":8080/SIAF/public/imagenes/logo-SIAF.svg");

/* Conexion con el Hosting */

define("SGBD", 'mysql');
define("DB_HOST", 'localhost');
define("DB_NAME", 'id18082009_siaf');
define("DB_USER", 'id18082009_root');
define("DB_PASSWORD", 'Px&8f*\nLcTl5hn]');
define("DB_CHARSET", "UTF8");
define("DSN", SGBD.":host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET);
define("URL_RAIZ", $_SERVER["HTTP_X_FORWARDED_PROTO"]."://".$_SERVER["HTTP_HOST"]."/");
define("URL_FAVICON", URL_RAIZ."public/imagenes/logo-SIAF.svg");

?>