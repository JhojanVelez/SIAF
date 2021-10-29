<?php

class InventarioSalidasControlador extends Controlador {
    function __construct ($url) {
        $this->controladorMetodoParametro = $url;
    }

    public function registrarInventarioSalidas () {
        try {
            if(!isset($_POST["codigoBarrasProducto"]) || empty($_POST["codigoBarrasProducto"]))     throw new Exception("El campo codigo de barras no puede estar vacio");
            if(!isset($_POST["cantidadSalida"]) || empty($_POST["cantidadSalida"]))                    throw new Exception("El campo cantidad no puede estar vacio");
            if(!isset($_POST["tipoSalida"]) || empty($_POST["tipoSalida"]))                    throw new Exception("El campo tipo salida no puede estar vacio");
            if(!isset($_POST["fechaSalida"]) || empty($_POST["fechaSalida"]))                       throw new Exception("El campo fecha salida no puede estar vacio");
            if(!isset($_POST["salidaCometario"]))                                                   throw new Exception("El campo comentarios no puede ser eliminado del formulario");

            if(empty($_POST["salidaCometario"])) $_POST["salidaCometario"] = "SIN COMENTARIOS";   
                
            $this->instanciaModelo->setCodigoBarrasProducto(htmlentities(addslashes($_POST["codigoBarrasProducto"])));
            $this->instanciaModelo->setCantidadSalida(htmlentities(addslashes($_POST["cantidadSalida"])));
            $this->instanciaModelo->setTipoSalida(htmlentities(addslashes($_POST["tipoSalida"])));
            $this->instanciaModelo->setFechaSalida(htmlentities(addslashes($_POST["fechaSalida"])));
            $this->instanciaModelo->setSalidaCometario(htmlentities(addslashes($_POST["salidaCometario"])));

            

            $this->result = $this->instanciaModelo->registrarInventarioSalidas();
            echo(json_encode($this->result));

        } catch (Exception $e) {
            $this->result["complete"] = false;
            $this->result["errorMessage"] = $e->getMessage();
            $this->result["post"] = $_POST;
            echo(json_encode($this->result));
        }
    }
}

?>