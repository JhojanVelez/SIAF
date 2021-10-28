<?php

class Router {
    function __construct() {
        /* 
        Puesto que en la configuracion del .htaccess configuramos la url asi ...
        http://localhost:8080/SIAF/index.php/url= se guarda en url todo lo que ponemos 
        despues de index.php, luego partimos url por cada / y obtenemos el controlador
        el metodo y el parametro.

        EJ: http://localhost:8080/SIAF/index.php/(url=)controlador/metodo/parametro

        */
        $url = (isset($_GET['url'])) ? $_GET['url'] : "menu/";
        $url = rtrim($url," /,.");
        $url = explode("/",$url);

        //todos los controladores deben llamarse nombre_controlador.php
        $urlController = "controlador/{$url[0]}_controlador.php";
        //todos los modelos deben llamarse nombre_modelo.php
        $urlModel = "modelo/{$url[0]}_modelo.php";
        $urlView = "vista/{$url[0]}.php";

        if(file_exists($urlController)) {
            require $urlController;
            $controller = new ($url[0].'Controlador')();
            /*
            Se realiza esta validacion, porque no todas las intefaces necesitan un modelo,
            por lo tanto si existe un modelo lo cargamos
            */
            if(file_exists($urlModel)) {
                $controller->cargarModelo($urlModel,$url[0]);

                if(isset($url[1])) {//si hay metodo

                    if(method_exists($controller,$url[1])) {//si existe el metodo en la clase

                        if(isset($url[1]) && isset($url[2])){ //si el metodo tiene parametro
                            $controller->{$url[1]}($url[2]);
                        } else {
                            $controller->{$url[1]}();
                        }
                        /*
                        No cargamos la vista, porque vamos a trabajar con ajax, entonces solo
                        en el metodo del controlador imprimimos la info convertida en JSON
                        para luego con JS hacer la peticion
                        */
                    } else {
                        $newError = new GetErrores("El metodo no existe");
                    }

                } else {
                    $controller->obtenerTodosLosDatos();
                    $controller->cargarVista($urlView);
                }
            }
        } else {
            new GetErrores("La pagina que deseas cargar no existe");
        }

    }
}

?>