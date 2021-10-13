<?php

class GetErrores {
    public static $error_message;
    function __construct ($error) {
        $this->$error_message = $error;
    }
}

?>