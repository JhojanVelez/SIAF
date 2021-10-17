<?php

class ProductosControlador extends Controlador{

    public function obtenerPorID ($id = null) {
        $this->data = $this->instanciaModelo->obtenerPorID($id);
        echo($this->data);
    }

    public function registrarProductos () {
        
        $this->instanciaModelo->setCodigoBarras($_POST["codigoBarras"]);
        $this->instanciaModelo->setDescripcion($_POST["descripcion"]);
        $this->instanciaModelo->setUbicacionFisica($_POST["ubicacionFisica"]);
        $this->instanciaModelo->setLaboratorio ($_POST["laboratorio"]);
        $this->instanciaModelo->setUnidadMedida($_POST["unidadMedida"]);
        $this->instanciaModelo->setPresentacion($_POST["presentacion"]);
        $this->instanciaModelo->setPrecioVenta($_POST["precioVenta"]);
        $this->instanciaModelo->setInvima($_POST["invima"]);
        $this->instanciaModelo->setNitProveedor($_POST["nitProveedor"]);

        $this->result = $this->instanciaModelo->registrarProductos();
        echo(json_encode($this->result));
    }
}

?>