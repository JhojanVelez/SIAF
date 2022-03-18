<?php

class LoginControlador extends Controlador{
    function __construct ($url) {
        $this->controladorMetodoParametro = $url;
    }

    public function buscarPorAtributos () {
        try {
            // if(!isset($_POST["documento"]) || empty($_POST["documento"]))   throw new Exception("El campo numero de documento no puede estar vacio");
            // if(!isset($_POST["correo"]) || empty($_POST["correo"]))         throw new Exception("El campo correo electronico no puede estar vacio");
                
            $this->instanciaModelo->setDocumentoUsuario(htmlentities(addslashes($_POST["documentoUsuario"])));
            $this->instanciaModelo->setCorreoUsuario(htmlentities(addslashes($_POST["correoUsuario"])));
            
            $this->result = $this->instanciaModelo->buscarPorAtributos();
            echo(json_encode($this->result));

        } catch (Exception $e) {
            $this->result["complete"] = false;
            $this->result["errorMessage"] = $e->getMessage();
            echo(json_encode($this->result));
        }
    }
    
    public function buscarUsuario () {
        
        $this->instanciaModelo->setDocumentoUsuario(htmlentities(addslashes($_POST["documentoUsuario"])));
        $this->instanciaModelo->setPasswordUsuario(htmlentities(addslashes($_POST["passwordUsuario"])));
        $this->instanciaModelo->setRolUsuario(htmlentities(addslashes($_POST["rolUsuario"])));
        
        $this->data = $this->instanciaModelo->buscarUsuario();
        
        echo json_encode($this->data);
    }

    public function enviarCorreoRestablecerPass () {
        
        $this->instanciaModelo->setCorreoUsuario(htmlentities(addslashes($_POST["correoUsuario"])));
        
        $this->result = $this->instanciaModelo->enviarCorreoRestablecerPass();
        
        echo json_encode($this->result);
    }
    
    public function restablecerPassword($documento) {

        $this->instanciaModelo->setDocumentoUsuario(htmlentities(addslashes($documento)));
        $this->instanciaModelo->setPasswordUsuario(htmlentities(addslashes($_POST["passwordUsuario"])));
        
        $this->result = $this->instanciaModelo->restablecerPassword();
        
        echo json_encode($this->result);
    }
    
    public function cerrarSesion () {
        session_unset();
        session_destroy();
        header("location:".URL_RAIZ."login");
    }
}

?>