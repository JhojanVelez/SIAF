<?php

class MenuControlador extends Controlador{
    function __construct ($url) {
        $this->controladorMetodoParametro = $url; 

    }
    
    public function buscarUsuarioEnSesion() {
        $this->instanciaModelo->setDocumentoUsuario($_SESSION["usuario"]["documento"]);
        $this->data = $this->instanciaModelo->buscarUsuarioEnSesion();

        echo(json_encode($this->data));
    }
}

?>