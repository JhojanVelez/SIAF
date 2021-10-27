<?php

class Controlador {

    protected $instanciaModelo;
    protected $data;
    protected $result;
    protected $modelo;

    function cargarModelo($urlModelo,$modelo) {
        $this->modelo = $modelo;
        require_once($urlModelo);
        return $this->instanciaModelo = new ($modelo."Modelo");
    }

    function cargarVista($urlVista) {
        require_once($urlVista);
    }

    function obtenerTodosLosDatos() {
        $this->data = $this->instanciaModelo->obtenerTodosLosDatos();
    }

    public function generarReporte() {

        $nombreClaseControlador = $this->modelo."Controlador";
        
        $nombreClaseControlador::buscarPorAtributos(false);
        
        $this->cargarVista("vista/generarReporte.php");
    }
}

?>