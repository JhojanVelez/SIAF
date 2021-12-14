<?php

class InventarioSalidasControlador extends Controlador {
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
        
        $_POST["nombreProveedor"] = (!empty($_POST["nombreProveedor"]))
            ? $_POST["nombreProveedor"]."%"
            : "";
        
        $_POST["tipoSalida"] = (!empty($_POST["tipoSalida"]))
            ? $_POST["tipoSalida"]."%"
            : "";

        $_POST["fechaSalidaDesde"] = (!empty($_POST["fechaSalidaDesde"]))
            ? $_POST["fechaSalidaDesde"]."%"
            : "";
        
        $_POST["fechaSalidaHasta"] = (!empty($_POST["fechaSalidaHasta"]))
            ? $_POST["fechaSalidaHasta"]."%"
            : "";
        
        if( empty($_POST["codigoBarrasProducto"]) && 
            empty($_POST["descripcionProducto"]) &&   
            empty($_POST["nombreProveedor"]) && 
            empty($_POST["tipoSalida"]) && 
            empty($_POST["fechaSalidaDesde"]) && 
            empty($_POST["fechaSalidaHasta"])) 
        {
            //para que nos obtenga todos los datos
            $_POST["codigoBarrasProducto"] = "%";
        }
        
        $this->instanciaModelo->setCodigoBarrasProducto(htmlentities(addslashes($_POST["codigoBarrasProducto"])));
        $this->instanciaModelo->setDescripcionProducto(htmlentities(addslashes($_POST["descripcionProducto"])));
        $this->instanciaModelo->setNombreProveedor(htmlentities(addslashes($_POST["nombreProveedor"])));
        $this->instanciaModelo->setTipoSalida(htmlentities(addslashes($_POST["tipoSalida"])));
        $this->instanciaModelo->setFechaSalidaDesde(htmlentities(addslashes($_POST["fechaSalidaDesde"])));
        $this->instanciaModelo->setFechaSalidaHasta(htmlentities(addslashes($_POST["fechaSalidaHasta"])));

        $this->data = $this->instanciaModelo->buscarPorAtributos();

        if($ajax) {
            echo json_encode($this->data);
        }
    }

    public function registrar () {
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