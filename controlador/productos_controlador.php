<?php

class ProductosControlador extends Controlador{

    public function obtenerPorID ($id = null) {
        $this->data = $this->instanciaModelo->obtenerPorID($id);
        echo($this->data);
    }

    public function registrarProductos () {
        try {
            if(!isset($_POST["codigoBarras"]) || empty($_POST["codigoBarras"]))          throw new Exception("El campo codigo de barras no puede estar vacio");
            if(!isset($_POST["descripcion"]) || empty($_POST["descripcion"]))            throw new Exception("El campo descripcion no puede estar vacio");
            if(!isset($_POST["ubicacionFisica"]) || empty($_POST["ubicacionFisica"]))    throw new Exception("El campo ubicacion fisica no puede estar vacio");
            if(!isset($_POST["laboratorio"]) || empty($_POST["laboratorio"]))            throw new Exception("El campo laboratorio no puede estar vacio");
            if(!isset($_POST["unidadMedida"]) || empty($_POST["unidadMedida"]))          throw new Exception("El campo unidadMedida no puede estar vacio");
            if(!isset($_POST["presentacion"]) || empty($_POST["presentacion"]))          throw new Exception("El campo presentacion no puede estar vacio");
            if(!isset($_POST["precioVenta"]) || empty($_POST["precioVenta"]))            throw new Exception("El campo precioVenta no puede estar vacio");
            if(!isset($_POST["invima"]) || empty($_POST["invima"]))                      throw new Exception("El campo invima no puede estar vacio");
            if(!isset($_POST["nitProveedor"]) || empty($_POST["nitProveedor"]))          throw new Exception("El campo nitProveedor no puede estar vacio");
                
            $this->instanciaModelo->setCodigoBarras(htmlentities(addslashes($_POST["codigoBarras"])));
            $this->instanciaModelo->setDescripcion(htmlentities(addslashes($_POST["descripcion"])));
            $this->instanciaModelo->setUbicacionFisica(htmlentities(addslashes($_POST["ubicacionFisica"])));
            $this->instanciaModelo->setLaboratorio (htmlentities(addslashes($_POST["laboratorio"])));
            $this->instanciaModelo->setUnidadMedida(htmlentities(addslashes($_POST["unidadMedida"])));
            $this->instanciaModelo->setPresentacion(htmlentities(addslashes($_POST["presentacion"])));
            $this->instanciaModelo->setPrecioVenta(htmlentities(addslashes($_POST["precioVenta"])));
            $this->instanciaModelo->setInvima(htmlentities(addslashes($_POST["invima"])));
            $this->instanciaModelo->setNitProveedor(htmlentities(addslashes($_POST["nitProveedor"])));

            $this->result = $this->instanciaModelo->registrarProductos();
            echo(json_encode($this->result));

        } catch (Exception $e) {
            $this->result["complete"] = false;
            $this->result["errorMessage"] = $e->getMessage();
            echo(json_encode($this->result));
        }
    }
}

?>