<?php

class ClientesControlador extends Controlador{
    function __construct ($url) {
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
        $_POST["documento"] = (!empty($_POST["documento"])) 
            ? $_POST["documento"]."%" 
            : "";
        
        $_POST["nombre"] = (!empty($_POST["nombre"])) 
            ? $_POST["nombre"]."%"
            : "";
        
        $_POST["apellido"] = (!empty($_POST["apellido"]))
            ? $_POST["apellido"]."%"
            : "";
        
        if( empty($_POST["documento"])    && 
            empty($_POST["nombre"]) &&   
            empty($_POST["apellido"])) 
        {
            //para que nos obtenga todos los datos
            $_POST["documento"] = "%";
        }
        
        $this->instanciaModelo->setDocumento(htmlentities(addslashes($_POST["documento"])));
        $this->instanciaModelo->setNombre(htmlentities(addslashes($_POST["nombre"])));
        $this->instanciaModelo->setApellido(htmlentities(addslashes($_POST["apellido"])));

        $this->data = $this->instanciaModelo->buscarPorAtributos();

        if($ajax) {
            echo json_encode($this->data);
        }
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

    function editar ($idClienteSeleccionado) {
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
            
            $this->result = $this->instanciaModelo->editar($idClienteSeleccionado);
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