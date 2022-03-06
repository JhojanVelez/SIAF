<?php

class LoginControlador extends Controlador{
    function __construct ($url) {
        $this->controladorMetodoParametro = $url;
    }
    
    public function buscarUsuario () {
        
        $this->instanciaModelo->setDocumentoUsuario(htmlentities(addslashes($_POST["documentoUsuario"])));
        $this->instanciaModelo->setPasswordUsuario(htmlentities(addslashes($_POST["passwordUsuario"])));
        $this->instanciaModelo->setRolUsuario(htmlentities(addslashes($_POST["rolUsuario"])));

        $this->data = $this->instanciaModelo->buscarUsuario();

        echo json_encode($this->data);

    }

    public function cerrarSesion () {
        session_start();
        session_unset();
        session_destroy();
        header("location:".URL_RAIZ."login");
    }
}

?>