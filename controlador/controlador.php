<?php

class Controlador {

    protected $url;
    protected $data;
    protected $model;

    function __construct () {
        $this->model = $this->url[0];
        $urlModel = "modelo/{$this->model}_modelo.php";
        if(file_exists($urlModel)) {
            require_once($urlModel);
            $this->model = new ($this->model.'Modelo');
            if(isset($this->url[1])) {
                if(isset($this->url[2])) {
                    $this->data = $this->model->{$this->url[1]}($this->url[2]);
                } else {
                    $this->data = $this->model->{$this->url[1]}();
                }
            } else {
                $this->data = $this->model->getAll();
                require_once("vista/{$this->url[0]}.php");
            }
        }
    }
}

?>