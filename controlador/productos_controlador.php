<?php

class ProductosControlador extends Controlador{

    public function obtenerPorID ($id = null) {
        $this->data = $this->instanciaModelo->obtenerPorID($id);
        echo($this->data);
    }

    public function registrarProductos () {
        try {
            if(!isset($_POST["codigoBarras"]))      throw new Exception("El campo codigo de barras no puede estar vacio");
            if(!isset($_POST["descripcion"]))       throw new Exception("El campo descripcion no puede estar vacio");
            if(!isset($_POST["ubicacionFisica"]))   throw new Exception("El campo ubicacion fisica no puede estar vacio");
            if(!isset($_POST["laboratorio"]))       throw new Exception("El campo laboratorio no puede estar vacio");
            if(!isset($_POST["unidadMedida"]))      throw new Exception("El campo unidadMedida no puede estar vacio");
            if(!isset($_POST["presentacion"]))      throw new Exception("El campo presentacion no puede estar vacio");
            if(!isset($_POST["precioVenta"]))       throw new Exception("El campo precioVenta no puede estar vacio");
            if(!isset($_POST["invima"]))            throw new Exception("El campo invima no puede estar vacio");
            if(!isset($_POST["nitProveedor"]))      throw new Exception("El campo nitProveedor no puede estar vacio");
                
            $this->instanciaModelo->htmlentities(addslashes(setCodigoBarras($_POST["codigoBarras"])));
            $this->instanciaModelo->htmlentities(addslashes(setDescripcion($_POST["descripcion"])));
            $this->instanciaModelo->htmlentities(addslashes(setUbicacionFisica($_POST["ubicacionFisica"])));
            $this->instanciaModelo->htmlentities(addslashes(setLaboratorio ($_POST["laboratorio"])));
            $this->instanciaModelo->htmlentities(addslashes(setUnidadMedida($_POST["unidadMedida"])));
            $this->instanciaModelo->htmlentities(addslashes(setPresentacion($_POST["presentacion"])));
            $this->instanciaModelo->htmlentities(addslashes(setPrecioVenta($_POST["precioVenta"])));
            $this->instanciaModelo->htmlentities(addslashes(setInvima($_POST["invima"])));
            $this->instanciaModelo->htmlentities(addslashes(setNitProveedor($_POST["nitProveedor"])));

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