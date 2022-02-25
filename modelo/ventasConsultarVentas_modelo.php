<?php

class VentasConsultarVentasModelo extends ConexionBD{

    private $facCodigo;

    public function obtenerTodosLosDatos() {
        try {
            $this->rows['infoVentas'] = $this->connection->query("SELECT * FROM ventas")->fetchAll(PDO::FETCH_ASSOC);
            return $this->rows;
        } catch (PDOException $e) {
            return "Error al obtener todas las ventas en el modulo de consultar ventas";
        }
    }

    public function obtenerDatosFacturaVenta () {
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


    public function getFacCodigo () {return $this->facCodigo;}

    public function setFacCodigo ($value) {
        $this->facCodigo = $value;
    }
}

?>