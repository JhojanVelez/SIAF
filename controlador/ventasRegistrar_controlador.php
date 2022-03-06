<?php

class VentasRegistrarControlador extends Controlador{
    function __construct ($url) {
        $this->controladorMetodoParametro = $url;
    }

    public function buscarPorAtributos () {
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
            
        $_POST["nomProveedorProducto"] = (!empty($_POST["nomProveedorProducto"]))
            ? $_POST["nomProveedorProducto"]."%"
            : "";

        $_POST["presentacionProducto"] = (!empty($_POST["presentacionProducto"]))
            ? $_POST["presentacionProducto"]."%"
            : "";

        
        if( empty($_POST["codigoBarrasProducto"]) && 
            empty($_POST["descripcionProducto"])  &&   
            empty($_POST["nomProveedorProducto"]) && 
            empty($_POST["presentacionProducto"])) 
        {
            //para que nos obtenga todos los datos
            $_POST["codigoBarrasProducto"] = "%";
        }
        
        $this->instanciaModelo->setCodigoBarrasProducto(htmlentities(addslashes($_POST["codigoBarrasProducto"])));
        $this->instanciaModelo->setDescripcionProducto(htmlentities(addslashes($_POST["descripcionProducto"])));
        $this->instanciaModelo->setNomProveedorProducto(htmlentities(addslashes($_POST["nomProveedorProducto"])));
        $this->instanciaModelo->setPresentacionProducto(htmlentities(addslashes($_POST["presentacionProducto"])));

        $this->data = $this->instanciaModelo->buscarPorAtributos();

        echo json_encode($this->data);
    }


    function registrar() {
        
        $infoVenta = json_decode($_POST["infoAdicional"],true);

        $infoVenta["docVendedor"] = $_SESSION["usuario"]["documento"];

        $this->instanciaModelo->setListaProductos($infoVenta["infoProductos"]);
        $this->instanciaModelo->setDocCliente($infoVenta["docCliente"]); 
        $this->instanciaModelo->setDocVendedor($infoVenta["docVendedor"]);
        $this->instanciaModelo->setCantidadTotal($infoVenta["cantidadTotal"]);
        $this->instanciaModelo->setPrecioTotal($infoVenta["precioTotal"]);
        $this->instanciaModelo->setRecibe($infoVenta["recibe"]);
        $this->instanciaModelo->setCambio($infoVenta["cambio"]);
        $this->instanciaModelo->setFormaPago($infoVenta["formaPago"]);

        $this->result = $this->instanciaModelo->registrar();

        print_r(json_encode($this->result));
    }
}

?>