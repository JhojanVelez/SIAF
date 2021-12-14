<?php

class ProductosControlador extends Controlador{

    public function __construct ($url) {
        $this->controladorMetodoParametro = $url;
    }

    public function buscarInhabilitados($ajax = true) {
        $this->data = $this->instanciaModelo->buscarInhabilitados();

        if($ajax) {
            echo json_encode($this->data);
        }
    }

    public function buscarPorAtributos ($ajax = true) {
        /*
        $ajax esta como parametro porque esta funcion va a ser reutilizada en dos casos
        cuando sea una peticion asincrona $ajax = true, pero cuando no sea una peticion,
        solo necesito poner los datos en Controlador::$data para luego usarlos en generar
        reporte()
        */
        $_POST["codigoBarras"] = (!empty($_POST["codigoBarras"])) 
            ? $_POST["codigoBarras"]."%" 
            : "";
        
        $_POST["descripcion"] = (!empty($_POST["descripcion"])) 
            ? $_POST["descripcion"]."%"
            : "";
        
        $_POST["presentacion"] = (!empty($_POST["presentacion"]))
            ? $_POST["presentacion"]."%"
            : "";
        
        $_POST["nomProveedor"] = (!empty($_POST["nomProveedor"]))
            ? $_POST["nomProveedor"]."%"
            : "";
        
        if( empty($_POST["codigoBarras"]) && 
            empty($_POST["descripcion"])  &&   
            empty($_POST["presentacion"]) && 
            empty($_POST["nomProveedor"])) 
        {
            //para que nos obtenga todos los datos
            $_POST["codigoBarras"] = "%";
        }
        
        $this->instanciaModelo->setCodigoBarras(htmlentities(addslashes($_POST["codigoBarras"])));
        $this->instanciaModelo->setDescripcion(htmlentities(addslashes($_POST["descripcion"])));
        $this->instanciaModelo->setNomProveedor(htmlentities(addslashes($_POST["nomProveedor"])));
        $this->instanciaModelo->setPresentacion(htmlentities(addslashes($_POST["presentacion"])));

        $this->data = $this->instanciaModelo->buscarPorAtributos();

        if($ajax) {
            echo json_encode($this->data);
        }
    }

    public function registrar () {
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

            $this->result = $this->instanciaModelo->registrar();
            echo(json_encode($this->result));

        } catch (Exception $e) {
            $this->result["complete"] = false;
            $this->result["errorMessage"] = $e->getMessage();
            echo(json_encode($this->result));
        }
    }

    public function editar ($idProductoSeleccionado) {
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

            $this->result = $this->instanciaModelo->editar(htmlentities(addslashes($idProductoSeleccionado)));
            echo(json_encode($this->result));

        } catch (Exception $e) {
            $this->result["complete"] = false;
            $this->result["errorMessage"] = $e->getMessage();
            echo(json_encode($this->result));
        }
    }
}

?>