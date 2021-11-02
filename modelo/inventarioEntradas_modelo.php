<?php

class InventarioEntradasModelo extends ConexionBD {
    public function obtenerTodosLosDatos () {
        try {
            $this->rows['infoEntradas'] = $this->connection->query("SELECT * FROM ENTRADAS ORDER BY EntFecha DESC")->fetchAll(PDO::FETCH_ASSOC);
            $this->rows['infoProductos'] = $this->connection->query("SELECT ProCodBarras,ProDescripcion,tbl_proveedores_ProNIT,ProNombre FROM PRODUCTOS ORDER BY ProDescripcion")->fetchAll(PDO::FETCH_ASSOC);
            return $this->rows;
        } catch (PDOException $e) {
            return "Error al obtener todos los productos";
        }
    }
}

?>