<?php

class InventarioKardexModelo extends ConexionBD{

    public function obtenerTodosLosDatos () {
        try {
            $this->rows['infoKardex'] = $this->connection->query("SELECT * FROM KARDEX ORDER BY ProDescripcion")->fetchAll(PDO::FETCH_ASSOC);
            return $this->rows;
        } catch (PDOException $e) {
            return "Error al obtener toda la informacion del Kardex";
        }
    }
}

?>