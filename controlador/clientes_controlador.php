<?php

class ClientesControlador extends Controlador{
    function __construct ($url) {
        $this->controladorMetodoParametro = $url;
    }

    function registrar () {
        try {
            if(!isset($_POST["documento"]) || empty($_POST["documento"]))   throw new Exception("El campo documento no puede estar vacio");
            if(!isset($_POST["nombre"]) || empty($_POST["nombre"]))         throw new Exception("El campo nombre no puede estar vacio");
            if(!isset($_POST["apellido"]) || empty($_POST["apellido"]))     throw new Exception("El campo apellido no puede estar vacio");
            if(!isset($_POST["direccion"]) || empty($_POST["direccion"]))   throw new Exception("El campo direccion no puede estar vacio");
            if(!isset($_POST["correo"]) || empty($_POST["correo"]))         throw new Exception("El campo correo no puede estar vacio");
            if(!isset($_POST["telefono"]) || empty($_POST["telefono"]))     throw new Exception("El campo telefono no puede estar vacio");
                
            $this->instanciaModelo->setDocumento(htmlentities(addslashes($_POST["documento"])));
            $this->instanciaModelo->setNombre(htmlentities(addslashes($_POST["nombre"])));
            $this->instanciaModelo->setApellido(addslashes($_POST["apellido"]));
            $this->instanciaModelo->setDireccion(htmlentities(addslashes($_POST["direccion"])));
            $this->instanciaModelo->setCorreo(htmlentities(addslashes($_POST["correo"])));
            $this->instanciaModelo->setTelefono(htmlentities(addslashes($_POST["telefono"])));
            
            $this->result = $this->instanciaModelo->registrar();
            echo(json_encode($this->result));

        } catch (Exception $e) {
            $this->result["complete"] = false;
            $this->result["errorMessage"] = $e->getMessage();
            $this->result["errorMessage"] = $_POST;
            echo(json_encode($this->result));
        }
    }
}

?>