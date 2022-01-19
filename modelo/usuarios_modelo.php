<?php

class UsuariosModelo extends ConexionBD {

    private $documento;
    private $nombre;
    private $apellido;
    private $eps;
    private $rh;
    private $direccion;
    private $telefono;
    private $correo;
    private $password;
    private $rol;

    public function obtenerTodosLosDatos () {
        try {
            $this->rows['infoEmpleados'] = $this->connection->query("SELECT * FROM tbl_empleados ORDER BY EmpNombre")->fetchAll(PDO::FETCH_ASSOC);
            $this->rows['infoEmpleadosInhabilitados'] = $this->connection->query("SELECT * FROM tbl_empleados_inhabilitados ORDER BY EmpFechaInhabilitacion DESC")->fetchAll(PDO::FETCH_ASSOC);
            return $this->rows;
        } catch (PDOException $e) {
            return "Error al obtener todos los proveedores";
        }
    }


    public function registrar () {
        try {
            $this->sql ="INSERT INTO 
                        tbl_empleados
                        VALUES (
                            :documento,
                            :nombre,
                            :apellido,
                            :eps,
                            :rh,
                            :direccion,
                            :telefono,
                            :correo,
                            :password,
                            :rol
                        )";

            $this->PDOStmt = $this->connection->prepare($this->sql);

            $this->PDOStmt->bindValue(":documento",$this->documento);
            $this->PDOStmt->bindValue(":nombre",$this->nombre);
            $this->PDOStmt->bindValue(":apellido",$this->apellido);
            $this->PDOStmt->bindValue(":eps",$this->eps);
            $this->PDOStmt->bindValue(":rh",$this->rh);
            $this->PDOStmt->bindValue(":direccion",$this->direccion);
            $this->PDOStmt->bindValue(":telefono",$this->telefono);
            $this->PDOStmt->bindValue(":correo",$this->correo);
            $this->PDOStmt->bindValue(":password",$this->password);
            $this->PDOStmt->bindValue(":rol",$this->rol);

            $this->PDOStmt->execute();

            $this->result["complete"] = true;
            $this->result["affectedRows"] = $this->PDOStmt->rowCount();
            return $this->result;

        } catch (PDOException $e) {
            $this->result["complete"] = false;
            $this->result["affectedRows"] = $this->PDOStmt->rowCount();
            $this->result["errorPDOMessage"] = $e->errorInfo;
            $this->result["errorMessage"] = "El usuario $this->nit no pudo ser registrado porque ya existe";
            return $this->result;
        }
    }

    /* Metodos GETTER */

    public function getDocumento () {return $this->documento;}
    public function getNombre () {return $this->nombre;}
    public function getApellido () {return $this->apellido;}
    public function getEps () {return $this->eps;}
    public function getRH () {return $this->rh;}
    public function getDireccion () {return $this->direccion;}
    public function getTelefono () {return $this->telefono;}
    public function getCorreo () {return $this->correo;}
    public function getPassword () {return $this->password;}
    public function getRol () {return $this->rol;}

    /* Metodos SETTER */

    public function setDocumento ($value) {
        $this->documento = $value;
    }
    public function setNombre ($value) {
        $this->nombre = $value;
    }
    public function setApellido ($value) {
        $this->apellido = $value;
    }
    public function setEps ($value) {
        $this->eps = $value;
    }
    public function setRH ($value) {
        $this->rh = $value;
    }
    public function setDireccion ($value) {
        $this->direccion = $value;
    }
    public function setTelefono ($value) {
        $this->telefono = $value;
    }
    public function setCorreo ($value) {
        $this->correo = $value;
    }
    public function setPassword ($value) {
        $this->password = $value;
    }
    public function setRol ($value) {
        $this->rol = $value;
    }


}

?>