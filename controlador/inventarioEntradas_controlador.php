<?php

class InventarioEntradasControlador extends Controlador {
    function __construct ($url) {
        $this->controladorMetodoParametro = $url;
    }

    public function buscarPorAtributos ($ajax = true) {
        /*
        $ajax esta como parametro porque esta funcion va a ser reutilizada en dos casos
        cuando sea una peticion asincrona $ajax = true, pero cuando no sea una peticion,
        solo necesito poner los datos en Controlador::$data para luego usarlos en generar
        reporte()
        */
        $_POST["codigoBarrasProducto"] = (!empty($_POST["codigoBarrasProducto"])) 
            ? $_POST["codigoBarrasProducto"]."%" 
            : "";
        
        $_POST["descripcionProducto"] = (!empty($_POST["descripcionProducto"])) 
            ? $_POST["descripcionProducto"]."%"
            : "";
        
        $_POST["nitProveedor"] = (!empty($_POST["nitProveedor"]))
            ? $_POST["nitProveedor"]."%"
            : "";

        $_POST["nombreProveedor"] = (!empty($_POST["nombreProveedor"]))
            ? $_POST["nombreProveedor"]."%"
            : "";
        
        $_POST["fechaEntradaDesde"] = (!empty($_POST["fechaEntradaDesde"]))
            ? $_POST["fechaEntradaDesde"]."%"
            : "";
        
        $_POST["fechaEntradaHasta"] = (!empty($_POST["fechaEntradaHasta"]))
            ? $_POST["fechaEntradaHasta"]."%"
            : "";
        
        if( empty($_POST["codigoBarrasProducto"]) && 
            empty($_POST["descripcionProducto"]) &&   
            empty($_POST["nitProveedor"]) && 
            empty($_POST["nombreProveedor"]) && 
            empty($_POST["fechaEntradaDesde"]) && 
            empty($_POST["fechaEntradaHasta"])) 
        {
            //para que nos obtenga todos los datos
            $_POST["codigoBarrasProducto"] = "%";
        }
        
        $this->instanciaModelo->setCodigoBarrasProducto(htmlentities(addslashes($_POST["codigoBarrasProducto"])));
        $this->instanciaModelo->setDescripcionProducto(htmlentities(addslashes($_POST["descripcionProducto"])));
        $this->instanciaModelo->setNitProveedor(htmlentities(addslashes($_POST["nitProveedor"])));
        $this->instanciaModelo->setNombreProveedor(htmlentities(addslashes($_POST["nombreProveedor"])));
        $this->instanciaModelo->setFechaEntradaDesde(htmlentities(addslashes($_POST["fechaEntradaDesde"])));
        $this->instanciaModelo->setFechaEntradaHasta(htmlentities(addslashes($_POST["fechaEntradaHasta"])));

        $this->data = $this->instanciaModelo->buscarPorAtributos();

        if($ajax) {
            echo json_encode($this->data);
        }
    }

    public function registrar () {
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

            $this->result = $this->instanciaModelo->registrar();
            echo(json_encode($this->result));

        } catch (Exception $e) {
            $this->result["complete"] = false;
            $this->result["errorMessage"] = $e->getMessage();
            echo(json_encode($this->result));
        }
    }
}

?>