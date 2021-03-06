<?php

class ProveedoresModelo extends ConexionBD {

    private $nit;
    private $nombre;
    private $correo;
    private $telefono;
    private $direccion;
    private $ciudad;

    public function buscarPorId ($id) {
        try {
            $this->PDOStmt = $this->connection->prepare("SELECT * FROM tbl_proveedores WHERE ProNIT = ?");
            $this->PDOStmt->execute(array($id));
            return $this->PDOStmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $this->result["errorPDOMessage"] = $e->errorInfo;
            return $this->result;
        }
    }

    public function buscarInhabilitados () {
        try {
            return $this->connection->query("SELECT * FROM tbl_proveedores_inhabilitados ORDER BY ProFechaInhabilitacion DESC")->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return "Error al obtener todos los proveedores inhabilitados";
        }
    }

    public function buscarPorAtributos () {
        $this->sql ="SELECT * 
                    FROM tbl_proveedores
                    WHERE
                    ProNIT      LIKE :nit    OR
                    ProNombre   LIKE :nombre OR
                    ProCiudad   LIKE :ciudad     
                    ORDER BY ProNombre";
                    
        $this->PDOStmt = $this->connection->prepare($this->sql);
        
        $this->PDOStmt->bindValue(":nit",$this->nit);
        $this->PDOStmt->bindValue(":nombre",$this->nombre);
        $this->PDOStmt->bindValue(":ciudad",$this->ciudad);

        $this->PDOStmt->execute();

        return $this->PDOStmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerTodosLosDatos () {
        try {
            $this->rows['infoProveedores'] = $this->connection->query("SELECT * FROM tbl_proveedores ORDER BY ProNombre")->fetchAll(PDO::FETCH_ASSOC);
            $this->rows['infoProveedoresInhabilitados'] = $this->connection->query("SELECT * FROM tbl_proveedores_inhabilitados ORDER BY ProFechaInhabilitacion DESC")->fetchAll(PDO::FETCH_ASSOC);
            return $this->rows;
        } catch (PDOException $e) {
            return "Error al obtener todos los proveedores";
        }
    }

    public function registrar () {
        try {
            $this->sql ="INSERT INTO 
                        tbl_proveedores
                        VALUES (
                            :nit,
                            :nombre,
                            :correo,
                            :telefono,
                            :direccion,
                            :ciudad
                        )";

            $this->PDOStmt = $this->connection->prepare($this->sql);

            $this->PDOStmt->bindValue(":nit",$this->nit);
            $this->PDOStmt->bindValue(":nombre",$this->nombre);
            $this->PDOStmt->bindValue(":correo",$this->correo);
            $this->PDOStmt->bindValue(":direccion",$this->direccion);
            $this->PDOStmt->bindValue(":telefono",$this->telefono);
            $this->PDOStmt->bindValue(":ciudad",$this->ciudad);

            $this->PDOStmt->execute();

            if($this->PDOStmt->errorInfo()[1] == 1062) throw new PDOException;
            if($this->PDOStmt->errorInfo()[1] == 1406) throw new PDOException;

            $this->result["complete"] = true;
            $this->result["affectedRows"] = $this->PDOStmt->rowCount();
            $this->result["PDOMessage"] = $this->PDOStmt->errorInfo();
            
            return $this->result;
            
        } catch (PDOException $e) {
            $this->result["complete"] = false;
            $this->result["affectedRows"] = $this->PDOStmt->rowCount();
            $this->result["PDOMessage"] = $this->PDOStmt->errorInfo();
            if($this->PDOStmt->errorInfo()[1] == 1062) $this->result["errorMessage"] = "El proveedor $this->nit no pudo ser registrado porque ya existe";
            if($this->PDOStmt->errorInfo()[1] == 1406) $this->result["errorMessage"] = "La informacion no pudo ser registrada porque algun campo excedio la cantidad maxima de caracteres permitidos";
            return $this->result;
        }
    }

    public function editar ($idProveedorSeleccionado) {
        try {
            $this->sql ="UPDATE  
                        tbl_proveedores
                        SET 
                            ProNIT          = :nit,
                            ProNombre       = :nombre,
                            ProCorreo       = :correo,
                            ProTelefono     = :telefono,
                            ProDireccion    = :direccion,
                            ProCiudad       = :ciudad
                        WHERE 
                            ProNIT = :idProveedorSeleccionado
                        ";

            $this->PDOStmt = $this->connection->prepare($this->sql);

            $this->PDOStmt->bindValue(":nit",$this->nit);
            $this->PDOStmt->bindValue(":nombre",$this->nombre);
            $this->PDOStmt->bindValue(":correo",$this->correo);
            $this->PDOStmt->bindValue(":direccion",$this->direccion);
            $this->PDOStmt->bindValue(":telefono",$this->telefono);
            $this->PDOStmt->bindValue(":ciudad",$this->ciudad);
            $this->PDOStmt->bindValue(":idProveedorSeleccionado",$idProveedorSeleccionado);

            $this->PDOStmt->execute();

            if($this->PDOStmt->errorInfo()[1] == 1062) throw new PDOException;
            if($this->PDOStmt->errorInfo()[1] == 1406) throw new PDOException;
            
            $this->result["complete"] = true;
            $this->result["affectedRows"] = $this->PDOStmt->rowCount();
            $this->result["PDOMessage"] = $this->PDOStmt->errorInfo();
            
            return $this->result;

        } catch (PDOException $e) {
            $this->result["complete"] = false;
            $this->result["affectedRows"] = $this->PDOStmt->rowCount();
            $this->result["PDOMessage"] = $this->PDOStmt->errorInfo();
            if($this->PDOStmt->errorInfo()[1] == 1062) $this->result["errorMessage"] = "El proveedor no pudo ser modificado porque el NIT $this->nit ya esta registrado en otro proveedor, por favor intenta modificar el valor con un NIT distinto a los demas proveedores";
            if($this->PDOStmt->errorInfo()[1] == 1406) $this->result["errorMessage"] = "La informacion no pudo ser editada porque algun campo excedio la cantidad maxima de caracteres permitidos";
            return $this->result;
        }
    }

    public function eliminar($id) {
        $this->setNit(htmlentities(addslashes($id)));
        try {
            $this->sql="DELETE FROM tbl_proveedores WHERE ProNIT = ?";

            $this->PDOStmt = $this->connection->prepare($this->sql);

            $this->PDOStmt->execute(array($this->nit));

            if($this->PDOStmt->errorInfo()[1] == 1451) throw new PDOException();

            $this->result["complete"] = true;
            $this->result["affectedRows"] = $this->PDOStmt->rowCount();
            $this->result["PDOMessage"] = $this->PDOStmt->errorInfo();
            $this->result["resultMessage"] = $this->PDOStmt->rowCount() != 0 
                                            ? "El proveedor $this->nit se inhabilito correctamente"
                                            : "No se encontro ningun proveedor, por lo tanto no se pudo realizar el proceso de inhabilitacion";
            return $this->result;

        } catch (PDOException $e) {
            $this->result["complete"] = false;
            $this->result["affectedRows"] = $this->PDOStmt->rowCount();
            $this->result["PDOMessage"] = $this->PDOStmt->errorInfo();
            if($this->PDOStmt->errorInfo()[1] == 1451) $this->result["errorMessage"] = "El proveedor $this->nit no pudo ser inhabilitado porque la infomacion de este proveedor es fundamental para el funcionamiento de otras secciones del sistema.";
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