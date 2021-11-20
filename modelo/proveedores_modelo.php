<?php

class ProveedoresModelo extends ConexionBD {

    private $nit;
    private $nombre;
    private $telefono;
    private $direccion;
    private $correo;
    private $ciudad;

    public function obtenerTodosLosDatos () {
        try {
            $this->rows['infoProveedores'] = $this->connection->query("SELECT * FROM TBL_PROVEEDORES ORDER BY ProNombre")->fetchAll(PDO::FETCH_ASSOC);
            $this->rows['infoProveedoresInhabilitados'] = $this->connection->query("SELECT * FROM TBL_PROVEEDORES_INHABILITADOS ORDER BY ProNombre")->fetchAll(PDO::FETCH_ASSOC);
            return $this->rows;
        } catch (PDOException $e) {
            return "Error al obtener todos los proveedores";
        }
    }

    public function registrarProveedores () {
        try {
            $this->sql ="INSERT INTO 
                        TBL_PROVEEDORES 
                        VALUES (
                            :nit,
                            :nombre,
                            :telefono,
                            :direccion,
                            :correo,
                            :ciudad
                        )";

            $this->PDOStmt = $this->connection->prepare($this->sql);

            $this->PDOStmt->bindValue(":nit",$this->nit);
            $this->PDOStmt->bindValue(":nombre",$this->nombre);
            $this->PDOStmt->bindValue(":telefono",$this->telefono);
            $this->PDOStmt->bindValue(":direccion",$this->direccion);
            $this->PDOStmt->bindValue(":correo",$this->correo);
            $this->PDOStmt->bindValue(":ciudad",$this->ciudad);

            $this->PDOStmt->execute();

            $this->result["complete"] = true;
            $this->result["affectedRows"] = $this->PDOStmt->rowCount();
            return $this->result;

        } catch (PDOException $e) {
            $this->result["complete"] = false;
            $this->result["affectedRows"] = $this->PDOStmt->rowCount();
            $this->result["errorPDOMessage"] = $e->errorInfo;
            $this->result["errorMessage"] = "El proveedor $this->nit no pudo ser registrado porque ya existe";
            return $this->result;
        }
    }

    /* Metodos Getter */

    public function getNit () {return $this->nit;}
    public function getNombre () {return $this->nombre;}
    public function getTelefono () {return $this->telefono;}
    public function getDireccion () {return $this->direccion;}
    public function getCorreo () {return $this->correo;}
    public function getCiudad () {return $this->ciudad;}

    /* Metodos Setter */

    public function setNit ($value) {
        $this->nit = $value;
    }
    public function setNombre ($value) {
        $this->nombre = $value;
    }
    public function setTelefono ($value) {
        $this->telefono = $value;
    }
    public function setDireccion ($value) {
        $this->direccion = $value;
    }
    public function setCorreo ($value) {
        $this->correo = $value;
    }
    public function setCiudad ($value) {
        $this->ciudad = $value;
    }


}

?>