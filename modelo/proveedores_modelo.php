<?php

class ProveedoresModelo extends ConexionBD {

    public function obtenerTodosLosDatos () {
        try {
            $this->rows['infoProveedores'] = $this->connection->query("SELECT * FROM TBL_PROVEEDORES ORDER BY ProNombre")->fetchAll(PDO::FETCH_ASSOC);
            return $this->rows;
        } catch (PDOException $e) {
            return "Error al obtener todos los proveedores";
        }
    }
}

?>