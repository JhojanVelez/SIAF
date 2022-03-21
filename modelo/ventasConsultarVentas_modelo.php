<?php

class VentasConsultarVentasModelo extends ConexionBD{

    private $facCodigo;

    /*
    Atributos para cuando se este filtrando por atributos
    */

    private $documentoVendedor;
    private $nombreVendedor;
    private $nombreCliente;
    private $documentoCliente;
    private $fechaVentaDesde;
    private $fechaVentaHasta;

    public function obtenerTodosLosDatos() {
        try {
            $this->rows['infoVentas'] = $this->connection->query("SELECT * FROM ventas")->fetchAll(PDO::FETCH_ASSOC);
            return $this->rows;
        } catch (PDOException $e) {
            return "Error al obtener todas las ventas en el modulo de consultar ventas";
        }
    }

    public function generarFactura () {
        try {

            $this->sql = "SELECT * FROM ventas WHERE FacCodigo = ?";
            $this->PDOStmt = $this->connection->prepare($this->sql);
            $this->PDOStmt->execute(array($this->facCodigo));
            $this->result["infoAdicional"] = $this->PDOStmt->fetchAll(PDO::FETCH_ASSOC)[0];

            $this->sql = "SELECT * FROM detalle_de_venta WHERE tbl_fact_venta_FacCodigo = ? ORDER BY ProDescripcion";   
            $this->PDOStmt = $this->connection->prepare($this->sql);
            $this->PDOStmt->execute(array($this->facCodigo));
            $this->result["detalleVenta"] = $this->PDOStmt->fetchAll(PDO::FETCH_ASSOC);
            
            $this->result["complete"] = true;
            return $this->result;
        } catch (PDOException $e) {
            $this->result["complete"] = false;
            $this->result["errorPDOMessage"] = $this->PDOStmt->errorInfo();
            $this->result["errorPDOMessageCode"] = $this->PDOStmt->errorInfo()[1];
            return $this->result;
        }
    }

    public function buscarPorAtributos () {
        $this->sql ="SELECT * 
                    FROM ventas 
                    WHERE 
                    EmpDocIdentidad LIKE :documentoVendedor OR 
                    EmpNombre LIKE :nombreVendedor OR 
                    CliDocIdentidad LIKE :documentoCliente OR
                    CliNombre LIKE :nombreCliente OR
                    FacFecha BETWEEN :fechaVentaDesde AND :fechaVentaHasta
                    ORDER BY FacFecha DESC";
                    
        $this->PDOStmt = $this->connection->prepare($this->sql);
        
        $this->PDOStmt->bindValue(":documentoVendedor",$this->documentoVendedor);
        $this->PDOStmt->bindValue(":nombreVendedor",$this->nombreVendedor);
        $this->PDOStmt->bindValue(":nombreCliente",$this->nombreCliente);
        $this->PDOStmt->bindValue(":documentoCliente",$this->documentoCliente);
        $this->PDOStmt->bindValue(":fechaVentaDesde",$this->fechaVentaDesde);
        $this->PDOStmt->bindValue(":fechaVentaHasta",$this->fechaVentaHasta);

        $this->PDOStmt->execute();

        return $this->PDOStmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // METODOS GETTER

    public function getFacCodigo () {return $this->facCodigo;}

    public function getdocumentoVendedor () {return $this->documentoVendedor;}
    public function getnombreVendedor () {return $this->nombreVendedor;}
    public function getNombreCliente () {return $this->nombreCliente;}
    public function getDocumentoCliente () {return $this->documentoCliente;}
    public function getFechaVentaDesde () {return $this->fechaVentaDesde;}
    public function getFechaVentaHasta () {return $this->fechaVentaHasta;}
    
    // METODOS SETTER
    
    public function setFacCodigo ($value) {
        $this->facCodigo = $value;
    }

    public function setDocumentoVendedor($value){
        $this->documentoVendedor = $value;
    }
    public function setNombreVendedor($value){
        $this->nombreVendedor = $value;
    }
    public function setNombreCliente($value){
        $this->nombreCliente = $value;
    }
    public function setDocumentoCliente($value){
        $this->documentoCliente = $value;
    }
    public function setFechaVentaDesde($value){
        $this->fechaVentaDesde = $value;
    }
    public function setFechaVentaHasta($value){
        $this->fechaVentaHasta = $value;
    }
}

?>