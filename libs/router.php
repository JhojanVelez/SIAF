<?php

class Router {

    private $url;
    private $urlController;
    private $urlModel;
    private $urlView;

    function __construct() {
        /* 
        Puesto que en la configuracion del .htaccess configuramos la url asi ...
        http://localhost:8080/SIAF/index.php/url= se guarda en url todo lo que ponemos 
        despues de index.php, luego partimos url por cada / y obtenemos el controlador
        el metodo y el parametro.

        EJ: http://localhost:8080/SIAF/index.php/(url=)controlador/metodo/parametro

        */
        $this->url = (isset($_GET['url'])) ? $_GET['url'] : "menu/";
        $this->url = rtrim($this->url," /,.");
        $this->url = explode("/",$this->url);
        
        if(empty($_SESSION)) {
            $this->url[0] = "login";
        } else if (isset($_SESSION["usuario"]["documento"])){
            /*
            Aqui siempre vamos a verificar que el documento del usuario que quiere entrar sea valido, si no es
            valido siempre lo regresaremos al login para que cree una sesion con un documento valido registrado
            en el sistema.

            Hice esto porque cualquiera que tenga conocimientos de programacion, puede crear una sesion con las
            mismas variables y entrar 
            */
            $autenticador = new AutenticacionUsuario();
            $autenticador = $autenticador->autenticarUsuario($_SESSION["usuario"]["documento"]);
            if(!$autenticador) {
                $this->url[0] = "login";
            } else if($autenticador && $this->url[0] == "login" && !isset($this->url[1])) {
                $this->url[0] = "menu";
            }
        }

        //todos los controladores deben llamarse nombre_controlador.php
        $this->urlController = "controlador/{$this->url[0]}_controlador.php";
        //todos los modelos deben llamarse nombre_modelo.php
        $this->urlModel = "modelo/{$this->url[0]}_modelo.php";
        $this->urlView = "vista/{$this->url[0]}.php";

        if(file_exists($this->urlController)) {
            require $this->urlController;
            $classControllerName = $this->url[0].'Controlador';
            $controller = new $classControllerName($this->url);
            /*
            Se realiza esta validacion, porque no todas las intefaces necesitan un modelo,
            por lo tanto si existe un modelo lo cargamos
            */
            if(file_exists($this->urlModel)) {
                $model = $controller->cargarModelo($this->urlModel);

                if(isset($this->url[1])) {//si hay metodo

                    if(method_exists($controller,$this->url[1]) && method_exists($model,$this->url[1])) {//si existe el metodo en la clase

                        if(isset($this->url[1]) && isset($this->url[2])){ //si el metodo tiene parametro
                            $controller->{$this->url[1]}($this->url[2]);
                        } else {
                            $controller->{$this->url[1]}();
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
                    $controller->cargarVista($this->urlView);
                }
            }
        } else {
            new GetErrores("La pagina que deseas cargar no existe");
        }

    }
}

?>