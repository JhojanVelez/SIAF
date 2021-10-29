<?php

class InventarioSalidasModelo extends ConexionBD {
    public function __construct () {
        parent::__construct();
    }

    public function obtenerTodosLosDatos () {
        try {
            $this->rows['infoSalidas'] = $this->connection->query("SELECT * FROM SALIDAS ORDER BY SalFecha DESC")->fetchAll(PDO::FETCH_ASSOC);
            $this->rows['infoProveedores'] = $this->connection->query("SELECT ProNIT,ProNombre FROM TBL_PROVEEDORES ORDER BY ProNombre")->fetchAll(PDO::FETCH_ASSOC);
            $this->rows['infoProductosInhabilitados'] = $this->connection->query("SELECT * FROM TBL_PRODUCTOS_INHABILITADOS ORDER BY ProFechaInhabilitacion DESC")->fetchAll(PDO::FETCH_ASSOC);
            return $this->rows;
        } catch (PDOException $e) {
            return "Error al obtener todos los productos";
        }
    }
}

?>