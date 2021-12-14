<?php

class ProveedoresControlador extends Controlador{
    function __construct ($url) {
        $this->controladorMetodoParametro = $url;
    }

    public function buscarPorAtributos ($ajax = true) {
        /*
        $ajax esta como parametro porque esta funcion va a ser reutilizada en dos casos
        cuando sea una peticion asincrona $ajax = true, pero cuando no sea una peticion,
        solo necesito poner los datos en Controlador::$data para luego usarlos en generar
        reporte()
        */
        $_POST["nit"] = (!empty($_POST["nit"])) 
            ? $_POST["nit"]."%" 
            : "";
        
        $_POST["nombre"] = (!empty($_POST["nombre"])) 
            ? $_POST["nombre"]."%"
            : "";
        
        $_POST["ciudad"] = (!empty($_POST["ciudad"]))
            ? $_POST["ciudad"]."%"
            : "";
        
        if( empty($_POST["nit"])    && 
            empty($_POST["nombre"]) &&   
            empty($_POST["ciudad"])) 
        {
            //para que nos obtenga todos los datos
            $_POST["nit"] = "%";
        }
        
        $this->instanciaModelo->setNit(htmlentities(addslashes($_POST["nit"])));
        $this->instanciaModelo->setNombre(htmlentities(addslashes($_POST["nombre"])));
        $this->instanciaModelo->setCiudad(htmlentities(addslashes($_POST["ciudad"])));

        $this->data = $this->instanciaModelo->buscarPorAtributos();

        if($ajax) {
            echo json_encode($this->data);
        }
    }

    public function registrar () {
        try {
            if(!isset($_POST["nit"]) || empty($_POST["nit"]))          throw new Exception("El campo nit no puede estar vacio");
            if(!isset($_POST["nombre"]) || empty($_POST["nombre"]))            throw new Exception("El campo nombre no puede estar vacio");
            if(!isset($_POST["telefono"]) || empty($_POST["telefono"]))    throw new Exception("El campo telefono fisica no puede estar vacio");
            if(!isset($_POST["direccion"]) || empty($_POST["direccion"]))            throw new Exception("El campo direccion no puede estar vacio");
            if(!isset($_POST["correo"]) || empty($_POST["correo"]))          throw new Exception("El campo correo no puede estar vacio");
            if(!isset($_POST["ciudad"]) || empty($_POST["ciudad"]))          throw new Exception("El campo ciudad no puede estar vacio");
                
            $this->instanciaModelo->setNit(htmlentities(addslashes($_POST["nit"])));
            $this->instanciaModelo->setNombre(htmlentities(addslashes($_POST["nombre"])));
            $this->instanciaModelo->setTelefono(htmlentities(addslashes($_POST["telefono"])));
            $this->instanciaModelo->setDireccion(htmlentities(addslashes($_POST["direccion"])));
            $this->instanciaModelo->setCorreo(htmlentities(addslashes($_POST["correo"])));
            $this->instanciaModelo->setCiudad(addslashes($_POST["ciudad"]));

            $this->result = $this->instanciaModelo->registrar();
            echo(json_encode($this->result));

        } catch (Exception $e) {
            $this->result["complete"] = false;
            $this->result["errorMessage"] = $e->getMessage();
            echo(json_encode($this->result));
        }
    }

    public function editar ($idProveedorSeleccionado) {
        try {
            if(!isset($_POST["nit"]) || empty($_POST["nit"]))               throw new Exception("El campo nit no puede estar vacio");
            if(!isset($_POST["nombre"]) || empty($_POST["nombre"]))         throw new Exception("El campo nombre no puede estar vacio");
            if(!isset($_POST["telefono"]) || empty($_POST["telefono"]))     throw new Exception("El campo telefono fisica no puede estar vacio");
            if(!isset($_POST["direccion"]) || empty($_POST["direccion"]))   throw new Exception("El campo direccion no puede estar vacio");
            if(!isset($_POST["correo"]) || empty($_POST["correo"]))         throw new Exception("El campo correo no puede estar vacio");
            if(!isset($_POST["ciudad"]) || empty($_POST["ciudad"]))         throw new Exception("El campo ciudad no puede estar vacio");
                
            $this->instanciaModelo->setNit(htmlentities(addslashes($_POST["nit"])));
            $this->instanciaModelo->setNombre(htmlentities(addslashes($_POST["nombre"])));
            $this->instanciaModelo->setTelefono(htmlentities(addslashes($_POST["telefono"])));
            $this->instanciaModelo->setDireccion(htmlentities(addslashes($_POST["direccion"])));
            $this->instanciaModelo->setCorreo(htmlentities(addslashes($_POST["correo"])));
            $this->instanciaModelo->setCiudad(addslashes($_POST["ciudad"]));

            $this->result = $this->instanciaModelo->editar(htmlentities(addslashes($idProveedorSeleccionado)));
            echo(json_encode($this->result));

        } catch (Exception $e) {
            $this->result["complete"] = false;
            $this->result["errorMessage"] = $e->getMessage();
            echo(json_encode($this->result));
        }
    }
}

?>