<?php

class VentasConsultarVentasControlador extends Controlador{ 
    function __construct ($url) {
        $this->controladorMetodoParametro = $url;
    }

    function generarFactura($codigoFactura) {
        $this->instanciaModelo->setFacCodigo(htmlentities(addslashes($codigoFactura)));
        $this->data = $this->instanciaModelo->obtenerDatosFacturaVenta();
        $this->cargarVista("plantillaFactura/plantillaFacturaVenta.php");
    }
}

?>