<?php

class Controlador {

    protected $data;
    protected $model;

    function __construct ($urlModel) {
        $url = "modelo/{$urlModel}_modelo.php";
        if(file_exists($url)) {
            require_once($url);
            $this->model = new ($urlModel.'Modelo');
            $this->data = $this->model->getAll();
        }
    }
}

?>