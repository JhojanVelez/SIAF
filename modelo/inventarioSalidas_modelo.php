<?php

class InventarioSalidasModelo extends ConexionBD {

    private $codigoBarrasProducto;
    private $cantidadSalida;
    private $tipoSalida;
    private $fechaSalida;
    private $salidaCometario;
    //Estos atributos son mas que todo para buscar por atributos
    private $fechaSalidaDesde;
    private $fechaSalidaHasta;
    private $nombreProveedor;
    private $descripcionProducto;
    

    public function __construct () {
        parent::__construct();
    }

    public function obtenerTodosLosDatos () {
        try {
            $this->rows['infoSalidas'] = $this->connection->query("SELECT * FROM SALIDAS ORDER BY SalFecha DESC")->fetchAll(PDO::FETCH_ASSOC);
            $this->rows['infoProductos'] = $this->connection->query("SELECT ProCodBarras,ProDescripcion,tbl_proveedores_ProNIT,ProNombre FROM PRODUCTOS ORDER BY ProDescripcion")->fetchAll(PDO::FETCH_ASSOC);
            return $this->rows;
        } catch (PDOException $e) {
            return "Error al obtener todas las salidas";
        }
    }

    public function buscarPorAtributos () {
        $this->sql ="SELECT * 
                    FROM salidas 
                    WHERE 
                    ProCodBarras LIKE :codigoBarrasProducto OR 
                    ProDescripcion LIKE :descripcionProducto OR 
                    ProNombre LIKE :nombreProveedor OR
                    SalTipoSalida LIKE :tipoSalida OR
                    SalFecha BETWEEN :fechaSalidaDesde AND :fechaSalidaHasta
                    ORDER BY SalFecha DESC";
                    
        $this->PDOStmt = $this->connection->prepare($this->sql);
        
        $this->PDOStmt->bindValue(":codigoBarrasProducto",$this->codigoBarrasProducto);
        $this->PDOStmt->bindValue(":descripcionProducto",$this->descripcionProducto);
        $this->PDOStmt->bindValue(":nombreProveedor",$this->nombreProveedor);
        $this->PDOStmt->bindValue(":tipoSalida",$this->tipoSalida);
        $this->PDOStmt->bindValue(":fechaSalidaDesde",$this->fechaSalidaDesde);
        $this->PDOStmt->bindValue(":fechaSalidaHasta",$this->fechaSalidaHasta);

        $this->PDOStmt->execute();

        return $this->PDOStmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function registrarInventarioSalidas () {
        try {
            $this->sql ="INSERT INTO 
                        TBL_SALIDAS
                        (
                            SalFecha,
                            SalCantidad,
                            SalTipoSalida,
                            SalComentarios,
                            tbl_productos_ProCodBarras
                        ) 
                        VALUES (
                            :fechaSalida,
                            :cantidadSalida,
                            :tipoSalida,
                            :salidaCometario,
                            :codigoBarrasProducto
                        )";

            $this->PDOStmt = $this->connection->prepare($this->sql);

            $this->PDOStmt->bindValue(":fechaSalida",$this->fechaSalida);
            $this->PDOStmt->bindValue(":cantidadSalida",$this->cantidadSalida);
            $this->PDOStmt->bindValue(":tipoSalida",$this->tipoSalida);
            $this->PDOStmt->bindValue(":salidaCometario",$this->salidaCometario);
            $this->PDOStmt->bindValue(":codigoBarrasProducto",$this->codigoBarrasProducto);

            $this->PDOStmt->execute();

            $this->result["complete"] = true;
            $this->result["affectedRows"] = $this->PDOStmt->rowCount();
            return $this->result;

        } catch (PDOException $e) {
            $this->result["complete"] = false;
            $this->result["affectedRows"] = $this->PDOStmt->rowCount();
            $this->result["errorPDOMessage"] = $e->errorInfo;
            $this->result["errorMessage"] = "La salida no pudo ser registrada porque el producto $this->codigoBarrasProducto no existe";
            return $this->result;
        }
    }

    /* Metodos Getter */

    public function getCodigoBarrasProducto () {return $this->codigoBarrasProducto;}
    public function getCantidadSalida () {return $this->cantidadSalida;}
    public function getTipoSalida () {return $this->tipoSalida;}
    public function getFechaSalida () {return $this->fechaSalida;}
    public function getSalidaCometario () {return $this->salidaCometario;}
    public function getFechaSalidaDesde () {return $this->fechaSalidaDesde;}
    public function getFechaSalidaHasta () {return $this->fechaSalidaHasta;}
    public function getNombreProveedor () {return $this->nombreProveedor;}
    public function getDescripcionProducto () {return $this->descripcionProducto;}

    /* Metodos Setter */

    public function setCodigoBarrasProducto ($value) {
        $this->codigoBarrasProducto = $value;
    }
    public function setCantidadSalida ($value) {
        $this->cantidadSalida = $value;
    }
    public function setTipoSalida ($value) {
        $this->tipoSalida = $value;
    }
    public function setFechaSalida ($value) {
        $this->fechaSalida = $value;
    }
    public function setSalidaCometario ($value) {
        $this->salidaCometario = $value;
    }
    public function setFechaSalidaDesde ($value) {
        $this->fechaSalidaDesde = $value;
    }
    public function setFechaSalidaHasta ($value) {
        $this->fechaSalidaHasta = $value;
    }
    public function setNombreProveedor ($value) {
        $this->nombreProveedor = $value;
    }
    public function setDescripcionProducto ($value) {
        $this->descripcionProducto = $value;
    }
}

?>