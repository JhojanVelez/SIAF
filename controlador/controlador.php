<?php

class Controlador {

    protected $data;
    protected $model;

    function __construct () {
        $urlModel = "modelo/{$this->model}_modelo.php";
        if(file_exists($urlModel)) {
            require_once($urlModel);
            $this->model = new ($this->model.'Modelo');
            $this->data = $this->model->getAll();
        }
    }
}

?>