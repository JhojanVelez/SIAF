<?php

class ventasRegistrarModelo extends ConexionBD {
    public function obtenerTodosLosDatos() {
        try {
            $this->rows['infoProductos'] = $this->connection->query("SELECT * FROM productos ORDER BY ProDescripcion")->fetchAll(PDO::FETCH_ASSOC);
            return $this->rows;
        } catch (PDOException $e) {
            return "Error al obtener todos los productos";
        }
    }
}



?>