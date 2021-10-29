<?php

class InventarioSalidasModelo extends ConexionBD {
    public function __construct () {
        parent::__construct();
    }

    public function obtenerTodosLosDatos () {
        try {
            $this->rows['infoSalidas'] = $this->connection->query("SELECT * FROM SALIDAS ORDER BY SalFecha DESC")->fetchAll(PDO::FETCH_ASSOC);
            $this->rows['infoProductos'] = $this->connection->query("SELECT ProCodBarras,ProDescripcion,tbl_proveedores_ProNIT,ProNombre FROM PRODUCTOS ORDER BY ProDescripcion")->fetchAll(PDO::FETCH_ASSOC);
            return $this->rows;
        } catch (PDOException $e) {
            return "Error al obtener todos los productos";
        }
    }
}

?>