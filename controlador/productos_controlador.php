<?php

class ProductosControlador extends Controlador{
    function __construct ($modelo) {
        $this->model = $modelo;
        parent::__construct();
        require_once("vista/productos.php");
    }




    
}

?>