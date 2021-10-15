<?php

class GetErrores {
    public $error_message;
    function __construct ($error) {
        $this->error_message = $error;
        require_once("vista/errores.php");
    }
}

?>