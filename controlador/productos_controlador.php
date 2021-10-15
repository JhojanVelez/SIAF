<?php

class ProductosControlador extends Controlador{

    public function obtenerPorID ($id) {
        $this->data = $this->instanciaModelo->obtenerPorID($id);
        echo($this->data);
    }
}

?>