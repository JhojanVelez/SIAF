<?php

class InventarioEntradasModelo extends ConexionBD {

    private $codigoBarrasProducto;
    private $fechaEntrada;
    private $cantidadEntrada;
    private $costoEntrada;
    private $entradaCometario;
    //Estos atributos son mas que todo para buscar por atributos
    private $fechaEntradaDesde;
    private $fechaEntradaHasta;
    private $nitProveedor;
    private $nombreProveedor;
    private $descripcionProducto;

    public function obtenerTodosLosDatos () {
        try {
            $this->rows['infoEntradas'] = $this->connection->query("SELECT * FROM entradas ORDER BY EntFecha DESC")->fetchAll(PDO::FETCH_ASSOC);
            $this->rows['infoProductos'] = $this->connection->query("SELECT ProCodBarras,ProDescripcion,tbl_proveedores_ProNIT,ProNombre FROM productos ORDER BY ProDescripcion")->fetchAll(PDO::FETCH_ASSOC);
            return $this->rows;
        } catch (PDOException $e) {
            return "Error al obtener todas las entradas";
        }
    }

    public function buscarPorAtributos () {
        $this->sql ="SELECT * 
                    FROM entradas 
                    WHERE 
                    tbl_productos_ProCodBarras LIKE :codigoBarrasProducto OR 
                    ProDescripcion LIKE :descripcionProducto OR 
                    tbl_proveedores_ProNIT LIKE :nitProveedor OR
                    ProNombre LIKE :nombreProveedor OR
                    EntFecha BETWEEN :fechaEntradaDesde AND :fechaEntradaHasta
                    ORDER BY EntFecha DESC";
                    
        $this->PDOStmt = $this->connection->prepare($this->sql);
        
        $this->PDOStmt->bindValue(":codigoBarrasProducto",$this->codigoBarrasProducto);
        $this->PDOStmt->bindValue(":descripcionProducto",$this->descripcionProducto);
        $this->PDOStmt->bindValue(":nitProveedor",$this->nitProveedor);
        $this->PDOStmt->bindValue(":nombreProveedor",$this->nombreProveedor);
        $this->PDOStmt->bindValue(":fechaEntradaDesde",$this->fechaEntradaDesde);
        $this->PDOStmt->bindValue(":fechaEntradaHasta",$this->fechaEntradaHasta);

        $this->PDOStmt->execute();

        return $this->PDOStmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function registrarInventarioEntradas () {
        try {
            $this->sql ="INSERT INTO 
                        tbl_entradas
                        (
                            EntFecha,
                            EntCantidad,
                            EntCostoProducto,
                            EntComentarios,
                            tbl_productos_ProCodBarras
                        ) 
                        VALUES (
                            :fechaEntrada,
                            :cantidadEntrada,
                            :costoEntrada,
                            :entradaCometario,
                            :codigoBarrasProducto
                        )";

            $this->PDOStmt = $this->connection->prepare($this->sql);

            $this->PDOStmt->bindValue(":fechaEntrada",$this->fechaEntrada);
            $this->PDOStmt->bindValue(":cantidadEntrada",$this->cantidadEntrada);
            $this->PDOStmt->bindValue(":costoEntrada",$this->costoEntrada);
            $this->PDOStmt->bindValue(":entradaCometario",$this->entradaCometario);
            $this->PDOStmt->bindValue(":codigoBarrasProducto",$this->codigoBarrasProducto);

            $this->PDOStmt->execute();

            $this->result["complete"] = true;
            $this->result["affectedRows"] = $this->PDOStmt->rowCount();
            return $this->result;

        } catch (PDOException $e) {
            $this->result["complete"] = false;
            $this->result["affectedRows"] = $this->PDOStmt->rowCount();
            $this->result["errorPDOMessage"] = $e->errorInfo;
            $this->result["errorMessage"] = "La entrada no pudo ser registrada porque el producto $this->codigoBarrasProducto no existe";
            return $this->result;
        }
    }

    /* Metodos Getter */

    public function getCodigoBarrasProducto () {return $this->codigoBarrasProducto;}
    public function getCantidadEntrada () {return $this->cantidadEntrada;}
    public function getCostoEntrada () {return $this->costoEntrada;}
    public function getFechaEntrada () {return $this->fechaEntrada;}
    public function getEntradaCometario () {return $this->entradaCometario;}
    public function getFechaEntradaDesde () {return $this->fechaEntradaDesde;}
    public function getFechaEntradaHasta () {return $this->fechaEntradaHasta;}
    public function getNitProveedor () {return $this->nitProveedor;}
    public function getNombreProveedor () {return $this->nombreProveedor;}
    public function getDescripcionProducto () {return $this->descripcionProducto;}

    /* Metodos Setter */

    public function setCodigoBarrasProducto ($value) {
        $this->codigoBarrasProducto = $value;
    }
    public function setCantidadEntrada ($value) {
        $this->cantidadEntrada = $value;
    }
    public function setCostoEntrada ($value) {
        $this->costoEntrada = $value;
    }
    public function setFechaEntrada ($value) {
        $this->fechaEntrada = $value;
    }
    public function setEntradaCometario ($value) {
        $this->entradaCometario = $value;
    }
    public function setFechaEntradaDesde ($value) {
        $this->fechaEntradaDesde = $value;
    }
    public function setFechaEntradaHasta ($value) {
        $this->fechaEntradaHasta = $value;
    }
    public function setNitProveedor ($value) {
        $this->nitProveedor = $value;
    }
    public function setNombreProveedor ($value) {
        $this->nombreProveedor = $value;
    }
    public function setDescripcionProducto ($value) {
        $this->descripcionProducto = $value;
    }
}
?>