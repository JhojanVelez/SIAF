<?php

class InventarioEntradasControlador extends Controlador {
    function __construct ($url) {
        $this->controladorMetodoParametro = $url;
    }

    public function registrarInventarioEntradas () {
        try {
            if(!isset($_POST["codigoBarrasProducto"]) || empty($_POST["codigoBarrasProducto"]))     throw new Exception("El campo codigo de barras no puede estar vacio");
            if(!isset($_POST["cantidadEntrada"]) || empty($_POST["cantidadEntrada"]))                    throw new Exception("El campo cantidad no puede estar vacio");
            if(!isset($_POST["costoEntrada"]) || empty($_POST["costoEntrada"]))                    throw new Exception("El campo costo entrada no puede estar vacio");
            if(!isset($_POST["fechaEntrada"]) || empty($_POST["fechaEntrada"]))                       throw new Exception("El campo fecha entrada no puede estar vacio");
            if(!isset($_POST["entradaCometario"]))                                                   throw new Exception("El campo comentarios no puede ser eliminado del formulario");

            if(empty($_POST["salidaCometario"])) $_POST["salidaCometario"] = "SIN COMENTARIOS";   
                
            $this->instanciaModelo->setCodigoBarrasProducto(htmlentities(addslashes($_POST["codigoBarrasProducto"])));
            $this->instanciaModelo->setCantidadEntrada(htmlentities(addslashes($_POST["cantidadEntrada"])));
            $this->instanciaModelo->setCostoEntrada(htmlentities(addslashes($_POST["costoEntrada"])));
            $this->instanciaModelo->setFechaEntrada(htmlentities(addslashes($_POST["fechaEntrada"])));
            $this->instanciaModelo->setEntradaCometario(htmlentities(addslashes($_POST["entradaCometario"])));

            $this->result = $this->instanciaModelo->registrarInventarioEntradas();
            echo(json_encode($this->result));

        } catch (Exception $e) {
            $this->result["complete"] = false;
            $this->result["errorMessage"] = $e->getMessage();
            echo(json_encode($this->result));
        }
    }
}

?>