<?php

class VentasConsultarVentasModelo extends ConexionBD{

    public function obtenerTodosLosDatos() {
        try {
            $this->rows['infoVentas'] = $this->connection->query("SELECT * FROM ventas")->fetchAll(PDO::FETCH_ASSOC);
            return $this->rows;
        } catch (PDOException $e) {
            return "Error al obtener todas las ventas en el modulo de consultar ventas";
        }
    }
}

?>