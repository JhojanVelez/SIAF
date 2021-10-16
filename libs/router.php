<?php

class Router {
    function __construct() {
        $url = (isset($_GET['url'])) ? $_GET['url'] : "menu/";
        $url = rtrim($url," /,.");
        $url = explode("/",$url);

        $urlController = "controlador/{$url[0]}_controlador.php";
        $urlModel = "modelo/{$url[0]}_modelo.php";
        $urlView = "vista/{$url[0]}.php";

        if(file_exists($urlController)) {
            require $urlController;
            $controller = new ($url[0].'Controlador')($url);
            if(file_exists($urlModel)) {
                $instanciaModelo = $controller->cargarModelo($urlModel,$url[0]);
                if(isset($url[1])) {
                    if(method_exists($instanciaModelo,$url[1])) {
                        if(isset($url[1]) && isset($url[2])){
                            $controller->{$url[1]}($url[2]);
                        } else {
                            $controller->{$url[1]}();
                        }
                    } else {
                        $newError = new GetErrores("El metodo no existe");
                    }
                } else {
                    $controller->obtenerTodosLosDatos();
                    $controller->cargarVista($urlView);
                }
            }
        } else {
            $newError = new GetErrores("La pagina que deseas cargar no existe");
        }

    }
}

?>