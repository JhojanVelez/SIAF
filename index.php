<?php
// error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ALL & ~(E_WARNING|E_NOTICE));
require("libs/config.php");
require("libs/getErrores.php");
require("libs/conexion_BD.php");
require("libs/controlador.php");
require("libs/router.php");

/*
A la hora de instanciar nuestro router, se ejecuta el constructor, este validara la url,
requiere el controlador, el controlador llama al modelo y si hay metodo, lo invoca, si no
ejecuta el metodo por defecto, que es traer todos los datos
*/
$router = new Router;


?>