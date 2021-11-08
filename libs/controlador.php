<?php

class Controlador {

    protected $instanciaModelo;
    //se guardan los datos de un SELECT
    protected $data; 
    /*
    Es un array asociativo en donde ingresamos informacion sobre la consulta SQL o donde ponemos errores
    para luego convertir este array a JSON
    EJ:
    $this->result["complete"] = false/true;
    $this->result["errorMessage"] = $e->getMessage();
    */
    protected $result; 
    protected $controladorMetodoParametro;

    protected $urlReporte;
    protected $fileName;

    function cargarModelo($urlModelo) {
        require_once($urlModelo);
        return $this->instanciaModelo = new ($this->controladorMetodoParametro[0]."Modelo");
    }

    function cargarVista($urlVista) {
        require_once($urlVista);
    }

    function obtenerTodosLosDatos() {
        $this->data = $this->instanciaModelo->obtenerTodosLosDatos();
    }

    public function buscarPorId ($id = null) {
        $this->data = $this->instanciaModelo->buscarPorId(htmlentities(addslashes($id)));
        echo(json_encode($this->data[0]));
    }

    public function eliminar($id = "") {
        $this->data = $this->instanciaModelo->eliminar($id);
        echo(json_encode($this->data));
    }

    public function generarReporte() {
        $nombreClaseControlador = $this->controladorMetodoParametro[0]."Controlador";
        $this->fileName = $this->controladorMetodoParametro[0];
        $this->urlReporte = $this->controladorMetodoParametro[0];
        /*
        Ejecutamos el metodo buscarPorAtributos de la clase que esta usando esta clase controlador
        y le ponemos false, diciendo que no va a ser una operacion asicrona, por 
        lo tanto no tiene que imprimir en pantalla los datos si no solo ingresarlos
        en $this->data
        */
        $nombreClaseControlador::buscarPorAtributos(false);
        $this->cargarVista("plantillasReportes/plantillaReporte.php");
    }

    public function generarReporteInhabilitados() {
        $nombreClaseControlador = $this->controladorMetodoParametro[0]."Controlador";
        $this->fileName = $this->controladorMetodoParametro[0]." Inhabilitados";
        $this->urlReporte = $this->controladorMetodoParametro[0]."Inhabilitados";
        /*
        Ejecutamos el metodo buscarInhabilitados de la clase que esta usando esta clase controlador
        y le ponemos false, diciendo que no va a ser una operacion asicrona, por 
        lo tanto no tiene que imprimir en pantalla los datos si no solo ingresarlos
        en $this->data
        */
        $nombreClaseControlador::buscarInhabilitados(false); 
        $this->cargarVista("plantillasReportes/plantillaReporte.php");
    }
}

?>