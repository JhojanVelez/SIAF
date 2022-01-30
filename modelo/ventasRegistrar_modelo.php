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
}



?>