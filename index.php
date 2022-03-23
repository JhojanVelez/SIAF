<?php
  header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
  header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado
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