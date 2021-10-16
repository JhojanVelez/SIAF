<?php

class Controlador {

    protected $instanciaModelo;
    protected $data;
    protected $result;

    function __construct () {
        
    }

    function cargarModelo($urlModelo,$modelo) {
        require_once($urlModelo);
        return $this->instanciaModelo = new ($modelo."Modelo");
    }

    function cargarVista($urlVista) {
        require_once($urlVista);
    }

    function obtenerTodosLosDatos() {
        $this->data = $this->instanciaModelo->obtenerTodosLosDatos();
    }
}

?>