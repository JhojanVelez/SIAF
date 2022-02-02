<?php

class VentasRegistrarControlador extends Controlador{
    function __construct ($url) {
        $this->controladorMetodoParametro = $url;
    }


    function registrar() {
        session_start();
        /* sacar y dividir la informacion en setters futuros */
        
        $infoVenta = json_decode($_POST["infoAdicional"],true);
        $infoVenta["docVendedor"] = $_SESSION["docUsuario"] = 1005458712;

        // print_r($infoVenta);

        $this->instanciaModelo->setListaProductos($infoVenta["infoProductos"]);
        $this->instanciaModelo->setDocCliente($infoVenta["docCliente"]);
        $this->instanciaModelo->setDocVendedor($infoVenta["docVendedor"]);
        $this->instanciaModelo->setCantidadTotal($infoVenta["cantidadTotal"]);
        $this->instanciaModelo->setPrecioTotal($infoVenta["precioTotal"]);
        $this->instanciaModelo->setRecibe($infoVenta["recibe"]);
        $this->instanciaModelo->setCambio($infoVenta["cambio"]);
        $this->instanciaModelo->setFormaPago($infoVenta["formaPago"]);

        $this->instanciaModelo->registrar();
    }
}

?>