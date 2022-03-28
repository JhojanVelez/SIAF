<?php

class ventasRegistrarModelo extends ConexionBD {

    private $codFactura = "FAC";
    private $listaProductos;
    private $docCliente;
    private $docVendedor;
    private $cantidadTotal;
    private $precioTotal;
    private $recibe;
    private $cambio;
    private $formaPago;

    //Atributos para cuando se este buscando por atributos en el filtro que aparece en el modal donde se muestran todos los 
    //productos registrados

    private $codigoBarrasProducto;
    private $descripcionProducto;
    private $nomProveedorProducto;
    private $presentacionProducto;

    public function obtenerTodosLosDatos() {
        try {
            $this->rows['infoProductos'] = $this->connection->query("SELECT * FROM lista_productos_modal_registrar_venta ORDER BY ProDescripcion")->fetchAll(PDO::FETCH_ASSOC);
            return $this->rows;
        } catch (PDOException $e) {
            return "Error al obtener todos los productos en el modulo de registrarVentas";
        }
    }

    public function buscarPorId ($id) {
        try {
            $this->PDOStmt = $this->connection->prepare("SELECT * FROM lista_productos_modal_registrar_venta WHERE ProCodBarras = ?");
            $this->PDOStmt->execute(array($id));
            return $this->PDOStmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $this->result["errorPDOMessage"] = $e->errorInfo;
            return $this->result;
        }
    }

    public function buscarPorAtributos () {
        $this->sql ="SELECT * 
                    FROM lista_productos_modal_registrar_venta
                    WHERE
                    ProCodBarras    LIKE :codigoBarrasProducto  OR
                    ProDescripcion  LIKE :descripcionProducto   OR
                    ProNombre       LIKE :nomProveedorProducto  OR
                    ProPresentacion LIKE :presentacionProducto
                    ORDER BY ProDescripcion";
                    
        $this->PDOStmt = $this->connection->prepare($this->sql);
        
        $this->PDOStmt->bindValue(":codigoBarrasProducto",$this->codigoBarrasProducto);
        $this->PDOStmt->bindValue(":descripcionProducto",$this->descripcionProducto);
        $this->PDOStmt->bindValue(":nomProveedorProducto",$this->nomProveedorProducto);
        $this->PDOStmt->bindValue(":presentacionProducto",$this->presentacionProducto);

        $this->PDOStmt->execute();

        return $this->PDOStmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function registrar () {
        try {

            /* Codigo para poder formar el codigo de factura FAC01, FAC02 y asi ... */

            $this->codFactura .= ($this->connection->query("SELECT COUNT(*) AS 'cantidadFacturas' FROM tbl_fact_venta")
                                    ->fetchAll(PDO::FETCH_ASSOC)
                                        [0]
                                            ['cantidadFacturas'])+1;

            /* Codigo para poder registrar la informacion en la tabla de tbl_fact_venta */

            $this->sql ="INSERT INTO 
                        tbl_fact_venta
                        VALUES (
                            :codFactura,
                            NOW(),
                            :formaPago,
                            :cantidadTotal,
                            :precioTotal,
                            :recibe,
                            :cambio,
                            :docCliente,
                            :docVendedor
                        )";

            $this->PDOStmt = $this->connection->prepare($this->sql);

            $this->PDOStmt->bindValue(":codFactura",$this->codFactura);
            $this->PDOStmt->bindValue(":formaPago",$this->formaPago);
            $this->PDOStmt->bindValue(":cantidadTotal",$this->cantidadTotal);
            $this->PDOStmt->bindValue(":precioTotal",$this->precioTotal);
            $this->PDOStmt->bindValue(":recibe",$this->recibe);
            $this->PDOStmt->bindValue(":cambio",$this->cambio);
            $this->PDOStmt->bindValue(":docCliente",$this->docCliente);
            $this->PDOStmt->bindValue(":docVendedor",$this->docVendedor);

            $this->PDOStmt->execute();
            
            if($this->PDOStmt->errorInfo()[1] == 1406) throw new PDOException;
            
            foreach($this->listaProductos as $key => $value) {
                $this->sql="INSERT INTO 
                            tbl_rel_fact_venta_productos
                            VALUES (
                                :codFactura,
                                :codigoBarrasProducto,
                                :cantidadTotalPorProducto
                            )";

                $this->PDOStmt = $this->connection->prepare($this->sql);
                
                $this->PDOStmt->bindValue(":codFactura",$this->codFactura);
                $this->PDOStmt->bindValue(":codigoBarrasProducto",$key);
                $this->PDOStmt->bindValue(":cantidadTotalPorProducto",$value['cantidad']);
                
                $this->PDOStmt->execute();
            }

            if($this->PDOStmt->errorInfo()[1]) {
                throw new PDOException();
            }
            
            $this->result["complete"] = true;
            $this->result["affectedRows"] = $this->PDOStmt->rowCount();
            $this->result["PDOMessage"] = $this->PDOStmt->errorInfo();
            return $this->result;

        } catch (PDOException $e) {
            $this->result["complete"] = false;
            $this->result["affectedRows"] = $this->PDOStmt->rowCount();
            $this->result["PDOMessage"] = $this->PDOStmt->errorInfo();
            if($this->PDOStmt->errorInfo()[1] == 1406) $this->result["errorMessage"] = "La informacion no pudo ser registrada porque algun campo excedio la cantidad maxima de caracteres permitidos";
            return $this->result;
        }
    }



    /* Metodos GETTER */
    
    function getCodFactura () {return $this->CodFactura;}
    function getListaProductos () {return $this->listaProductos;}
    function getDocCliente () {return $this->docCliente;}
    function getDocVendedor () {return $this->docVendedor;}
    function getCantidadTotal () {return $this->cantidadTotal;}
    function getPrecioTotal () {return $this->precioTotal;}
    function getRecibe () {return $this->recibe;}
    function getCambio () {return $this->cambio;}
    function getFormaPago () {return $this->formaPago;}

    function getCodigoBarrasProducto(){return $this->$codigoBarrasProducto;}
    function getDescripcionProducto(){return $this->$descripcionProducto;}
    function getNomProveedorProducto(){return $this->$nomProveedorProducto;}
    function getPresentacionProducto(){return $this->$presentacionProducto;}
    
    /* Metodos SETTER */
    
    function setCodFactura($value) {
        $this->CodFactura = $value;
    }
    function setListaProductos($value) {
        $this->listaProductos = $value;
    }
    function setDocCliente($value) {
        $this->docCliente = $value;
    }
    function setDocVendedor($value) {
        $this->docVendedor = $value;
    }
    function setCantidadTotal($value) {
        $this->cantidadTotal = $value;
    }
    function setPrecioTotal($value) {
        $this->precioTotal = $value;
    }
    function setRecibe($value) {
        $this->recibe = $value;
    }
    function setCambio($value) {
        $this->cambio = $value;
    }
    function setFormaPago($value) {
        $this->formaPago = $value;
    }

    function setCodigoBarrasProducto ($value) {
        $this->codigoBarrasProducto = $value;
    }
    function setDescripcionProducto ($value) {
        $this->descripcionProducto = $value;
    }
    function setNomProveedorProducto ($value) {
        $this->nomProveedorProducto = $value;
    }
    function setPresentacionProducto ($value) {
        $this->presentacionProducto = $value;
    }
}

?>