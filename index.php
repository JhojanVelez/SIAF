<?php
  header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
  header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado
  header("Expires: Tue, 01 Jul 2001 06:00:00 GMT");
  header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
  header("Cache-Control: no-store, no-cache, must-revalidate");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");
?>
<?php

session_start();

require("libs/config.php");
require("libs/getErrores.php");
require("libs/conexion_BD.php");
require("libs/controlador.php");
require("libs/router.php");
require("libs/autenticacionUsuario.php");

clearstatcache(URL_RAIZ);
/*
A la hora de instanciar nuestro router, se ejecuta el constructor, este validara la url,
requiere el controlador, el controlador llama al modelo y si hay metodo, lo invoca, si no
ejecuta el metodo por defecto, que es traer todos los datos
*/
$router = new Router;


?>