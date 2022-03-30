<?php

/* Datos para enviar Correos Electronicos */

define('SMTP_SERVER', "smtp.gmail.com");
define('EMAIL', "somossiaf@gmail.com");
define('PASSWORD_EMAIL', "somosSIAF1234");
define('NOMBRE_EMAIL', "SIAF");

/*Conexion local*/

define("SGBD", "mysql");
define("DB_HOST", "localhost");
define("DB_NAME", "siaf");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_CHARSET", "UTF8");
define("DSN", SGBD.":host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET);
define("URL_RAIZ", "http://localhost/SIAF/");
define("URL_FAVICON", "http://localhost/SIAF/public/imagenes/logo_azul.png");

/* Conexion con el Hosting */

// define("SGBD", 'mysql');
// define("DB_HOST", 'localhost');
// define("DB_NAME", 'id18082009_siaf');
// define("DB_USER", 'id18082009_root');
// define("DB_PASSWORD", 'Px&8f*\nLcTl5hn]');
// define("DB_CHARSET", "UTF8");
// define("DSN", SGBD.":host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET);
// define("URL_RAIZ", $_SERVER["HTTP_X_FORWARDED_PROTO"]."://".$_SERVER["HTTP_HOST"]."/");
// define("URL_FAVICON", URL_RAIZ."public/imagenes/logo-SIAF.svg");

?>