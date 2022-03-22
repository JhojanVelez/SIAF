<?php

class VentasConsultarVentasControlador extends Controlador{ 
    function __construct ($url) {
        $this->controladorMetodoParametro = $url;
    }

    function generarFactura($codigoFactura) {
        $this->instanciaModelo->setFacCodigo(htmlentities(addslashes($codigoFactura)));
        $this->data = $this->instanciaModelo->generarFactura();//en generar solo obtiene los datos de la venta
        $this->cargarVista("plantillaFactura/plantillaFacturaVenta.php");
    }

    public function buscarPorAtributos ($ajax = true) {
        /*
        $ajax esta como parametro porque esta funcion va a ser reutilizada en dos casos
        cuando sea una peticion asincrona $ajax = true, pero cuando no sea una peticion,
        solo necesito poner los datos en Controlador::$data para luego usarlos en generar
        reporte()
        */
        $_POST["documentoVendedor"] = (!empty($_POST["documentoVendedor"])) 
            ? $_POST["documentoVendedor"]."%" 
            : "";
        
        $_POST["nombreVendedor"] = (!empty($_POST["nombreVendedor"])) 
            ? $_POST["nombreVendedor"]."%"
            : "";
            
        $_POST["nombreCliente"] = (!empty($_POST["nombreCliente"]))
            ? $_POST["nombreCliente"]."%"
            : "";

        $_POST["documentoCliente"] = (!empty($_POST["documentoCliente"]))
            ? $_POST["documentoCliente"]."%"
            : "";

        $_POST["fechaVentaDesde"] = (!empty($_POST["fechaVentaDesde"]))
            ? $_POST["fechaVentaDesde"]."%"
            : "";
        
        $_POST["fechaVentaHasta"] = (!empty($_POST["fechaVentaHasta"]))
            ? $_POST["fechaVentaHasta"]."%"
            : "";

        
        if( empty($_POST["documentoVendedor"])   && 
            empty($_POST["nombreVendedor"])    &&   
            empty($_POST["nombreCliente"])          && 
            empty($_POST["documentoCliente"])       &&
            empty($_POST["fechaVentaDesde"])        &&
            empty($_POST["fechaVentaHasta"])) 
        {
            //para que nos obtenga todos los datos
            $_POST["documentoVendedor"] = "%";
        }
        
        $this->instanciaModelo->setDocumentoVendedor(htmlentities(addslashes($_POST["documentoVendedor"])));
        $this->instanciaModelo->setNombreVendedor(htmlentities(addslashes($_POST["nombreVendedor"])));
        $this->instanciaModelo->setNombreCliente(htmlentities(addslashes($_POST["nombreCliente"])));
        $this->instanciaModelo->setDocumentoCliente(htmlentities(addslashes($_POST["documentoCliente"])));
        $this->instanciaModelo->setFechaVentaDesde(htmlentities(addslashes($_POST["fechaVentaDesde"])));
        $this->instanciaModelo->setFechaVentaHasta(htmlentities(addslashes($_POST["fechaVentaHasta"])));

        $this->data = $this->instanciaModelo->buscarPorAtributos();

        if($ajax) {
            echo json_encode($this->data);
        }
    }
}

?>