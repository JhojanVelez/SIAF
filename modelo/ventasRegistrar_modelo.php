<?php

class ventasRegistrarModelo extends ConexionBD {
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
}



?>