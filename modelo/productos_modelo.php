<?php

class ProductosModelo extends ConexionBD{
    function __construct () {
        parent::__construct();
    }

    public function getAll () {
        return $this->connection->query("SELECT * FROM TBL_PRODUCTOS ORDER BY ProDescripcion")->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>