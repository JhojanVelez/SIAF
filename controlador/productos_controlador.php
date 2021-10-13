<?php

class ProductosControlador extends Controlador{
    function __construct ($urlModel) {
        parent::__construct($urlModel);
        require_once("vista/productos.php");
    }




    
}

?>