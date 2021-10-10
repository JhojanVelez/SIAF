<?php

class Router {
    function __construct() {
        $url = $_GET['url'];
        $url = rtrim($url," /,.");
        $url = explode("/",$url);

        $urlController = "controlador/{$url[0]}_controlador.php";

        if(file_exists($urlController)) {
            require $urlController;
            $controller = new ($url[0].'Controlador')();
        } else {
            echo("el archivo no existe");
        }

    }
}

?>