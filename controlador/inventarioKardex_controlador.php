<?php

class InventarioKardexControlador extends Controlador{
    function __construct ($url) {
        $this->controladorMetodoParametro = $url;
    }

    public function buscarPorAtributos ($ajax = true) {
        /*
        $ajax esta como parametro porque esta funcion va a ser reutilizada en dos casos
        cuando sea una peticion asincrona $ajax = true, pero cuando no sea una peticion,
        solo necesito poner los datos en Controlador::$data para luego usarlos en generar
        reporte()
        */
        $_POST["codigoBarrasProducto"] = (!empty($_POST["codigoBarrasProducto"])) 
            ? $_POST["codigoBarrasProducto"]."%" 
            : "";
        
        $_POST["descripcionProducto"] = (!empty($_POST["descripcionProducto"])) 
            ? $_POST["descripcionProducto"]."%"
            : "";
        
        $_POST["nombreProveedor"] = (!empty($_POST["nombreProveedor"]))
            ? $_POST["nombreProveedor"]."%"
            : "";
        
        $_POST["nitProveedor"] = (!empty($_POST["nitProveedor"]))
            ? $_POST["nitProveedor"]."%"
            : "";

        $_POST["laboratorioProducto"] = (!empty($_POST["laboratorioProducto"]))
            ? $_POST["laboratorioProducto"]."%"
            : "";
        
        $_POST["presentacionProducto"] = (!empty($_POST["presentacionProducto"]))
            ? $_POST["presentacionProducto"]."%"
            : "";
        
        if( empty($_POST["codigoBarrasProducto"]) && 
            empty($_POST["descripcionProducto"]) &&   
            empty($_POST["nombreProveedor"]) && 
            empty($_POST["nitProveedor"]) && 
            empty($_POST["laboratorioProducto"]) && 
            empty($_POST["presentacionProducto"])) 
        {
            //para que nos obtenga todos los datos
            $_POST["codigoBarrasProducto"] = "%";
        }
        
        $this->instanciaModelo->setCodigoBarrasProducto(htmlentities(addslashes($_POST["codigoBarrasProducto"])));
        $this->instanciaModelo->setDescripcionProducto(htmlentities(addslashes($_POST["descripcionProducto"])));
        $this->instanciaModelo->setNitProveedor(htmlentities(addslashes($_POST["nitProveedor"])));
        $this->instanciaModelo->setNombreProveedor(htmlentities(addslashes($_POST["nombreProveedor"])));
        $this->instanciaModelo->setLaboratorioProducto(htmlentities(addslashes($_POST["laboratorioProducto"])));
        $this->instanciaModelo->setPresentacionProducto(htmlentities(addslashes($_POST["presentacionProducto"])));

        $this->data = $this->instanciaModelo->buscarPorAtributos();

        if($ajax) {
            echo json_encode($this->data);
        }
    }
}

?>