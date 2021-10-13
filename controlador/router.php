<?php

class Router {
    function __construct() {
        $url = (isset($_GET['url'])) ? $_GET['url'] : "menu/";
        $url = rtrim($url," /,.");
        $url = explode("/",$url);

        $urlController = "controlador/{$url[0]}_controlador.php";

        if(file_exists($urlController)) {
            require $urlController;
            $controller = new ($url[0].'Controlador')($url[0]);
        } else {
            $newError = new GetErrores("El controlador no existe");
            echo($newError->error_message);
        }

    }
}

?>