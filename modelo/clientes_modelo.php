<?php

class ClientesModelo extends ConexionBD {

    private $documento;
    private $nombre;
    private $apellido;
    private $direccion;
    private $correo;
    private $telefono;

    public function __construct () {
        parent::__construct();
    }

    public function buscarPorId ($id) {
        try {
            $this->PDOStmt = $this->connection->prepare("SELECT * FROM tbl_clientes WHERE CliDocIdentidad = ?");
            $this->PDOStmt->execute(array($id));
            return $this->PDOStmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $this->result["errorPDOMessage"] = $e->errorInfo;
            return $this->result;
        }
    }

    public function buscarInhabilitados () {
        try {
            return $this->connection->query("SELECT * FROM tbl_clientes_inhabilitados ORDER BY CliFechaInhabilitacion DESC")->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return "Error al obtener todos los clientes inhabilitados";
        }
    }

    public function buscarPorAtributos () {
        $this->sql ="SELECT * 
                    FROM tbl_clientes
                    WHERE
                    CliDocIdentidad     LIKE :documento OR
                    CliNombre           LIKE :nombre    OR
                    CliApellido         LIKE :apellido    
                    ORDER BY CliNombre";
                    
        $this->PDOStmt = $this->connection->prepare($this->sql);
        
        $this->PDOStmt->bindValue(":documento",$this->documento);
        $this->PDOStmt->bindValue(":nombre",$this->nombre);
        $this->PDOStmt->bindValue(":apellido",$this->apellido);

        $this->PDOStmt->execute();

        return $this->PDOStmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerTodosLosDatos () {
        try {
            $this->rows['infoClientes'] = $this->connection->query("SELECT * FROM tbl_clientes ORDER BY CliNombre")->fetchAll(PDO::FETCH_ASSOC);
            $this->rows['infoClientesInhabilitados'] = $this->connection->query("SELECT * FROM tbl_clientes_inhabilitados ORDER BY CliFechaInhabilitacion DESC")->fetchAll(PDO::FETCH_ASSOC);
            return $this->rows;
        } catch (PDOException $e) {
            return "Error al obtener todos los clientes";
        }
    }

    public function registrar () {
        try {
            $this->sql ="INSERT INTO 
                        tbl_clientes
                        VALUES (
                            :documento,
                            :nombre,
                            :apellido,
                            :direccion,
                            :correo,
                            :telefono
                        )";

            $this->PDOStmt = $this->connection->prepare($this->sql);

            $this->PDOStmt->bindValue(":documento",$this->documento);
            $this->PDOStmt->bindValue(":nombre",$this->nombre);
            $this->PDOStmt->bindValue(":apellido",$this->apellido);
            $this->PDOStmt->bindValue(":direccion",$this->direccion);
            $this->PDOStmt->bindValue(":correo",$this->correo);
            $this->PDOStmt->bindValue(":telefono",$this->telefono);

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
            if($this->PDOStmt->errorInfo()[1] == 1062) $this->result["errorMessage"] = "El cliente $this->documento no pudo ser registrado porque ya existe";
            if($this->PDOStmt->errorInfo()[1] == 1406) $this->result["errorMessage"] = "La informacion no pudo ser registrada porque algun campo excedio la cantidad maxima de caracteres permitidos";
            return $this->result;
        }
    }

    public function editar ($idClienteSeleccionado) {
        try {
            $this->sql ="UPDATE  
                        tbl_clientes
                        SET 
                            CliDocIdentidad     = :documento,
                            CliNombre           = :nombre,
                            CliApellido         = :apellido,
                            CliDireccion        = :direccion,
                            CliCorreo           = :correo,
                            CliTelefono         = :telefono
                        WHERE 
                            CliDocIdentidad = :idClienteSeleccionado
                        ";

            $this->PDOStmt = $this->connection->prepare($this->sql);

            $this->PDOStmt->bindValue(":documento",$this->documento);
            $this->PDOStmt->bindValue(":nombre",$this->nombre);
            $this->PDOStmt->bindValue(":apellido",$this->apellido);
            $this->PDOStmt->bindValue(":direccion",$this->direccion);
            $this->PDOStmt->bindValue(":correo",$this->correo);
            $this->PDOStmt->bindValue(":telefono",$this->telefono);
            $this->PDOStmt->bindValue(":idClienteSeleccionado",$idClienteSeleccionado);

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
            if($this->PDOStmt->errorInfo()[1] == 1062) $this->result["errorMessage"] = "El cliente no pudo ser modificado porque el Numero de Documento $this->documento ya esta registrado en otro cliente, por favor intenta modificar el valor con un Numero de Documento distinto a los demas clientes";
            if($this->PDOStmt->errorInfo()[1] == 1406) $this->result["errorMessage"] = "La informacion no pudo ser editada porque algun campo excedio la cantidad maxima de caracteres permitidos";
            return $this->result;
        }
    }

    public function eliminar($id) {
        $this->setDocumento(htmlentities(addslashes($id)));
        try {
            $this->sql="DELETE FROM tbl_clientes WHERE CliDocIdentidad = ?";

            $this->PDOStmt = $this->connection->prepare($this->sql);

            $this->PDOStmt->execute(array($this->documento));
            
            if($this->PDOStmt->errorInfo()[1] == 1451) throw new PDOException;

            $this->result["complete"] = true;
            $this->result["affectedRows"] = $this->PDOStmt->rowCount();
            $this->result["PDOMessage"] = $this->PDOStmt->errorInfo();
            $this->result["resultMessage"] = $this->PDOStmt->rowCount() != 0 
                                            ? "El cliente $this->documento se inhabilito correctamente"
                                            : "No se encontro ningun cliente, por lo tanto no se pudo realizar el proceso de inhabilitacion";
            
            return $this->result;

        } catch (PDOException $e) {
            $this->result["complete"] = false;
            $this->result["affectedRows"] = $this->PDOStmt->rowCount();
            $this->result["PDOMessage"] = $this->PDOStmt->errorInfo();
            if($this->PDOStmt->errorInfo()[1] == 1451) $this->result["errorMessage"] = "El cliente $this->documento no pudo ser inhabilitado porque la infomacion de este cliente es fundamental para el funcionamiento de otras secciones del sistema.";
            return $this->result;
        }
    }

    /* Metodos Getter */
    
    public function getDocumento () {return $this->documento;}
    public function getNombre () {return $this->nombre;}
    public function getApellido () {return $this->apellido;}
    public function getDireccion () {return $this->direccion;}
    public function getCorreo () {return $this->correo;}
    public function getTelefono () {return $this->telefono;}
    
    /* Metodos Setter */

    public function setDocumento($value) {
        $this->documento = $value;
    }
    public function setNombre($value) {
        $this->nombre = $value;
    }
    public function setApellido($value) {
        $this->apellido = $value;
    }
    public function setDireccion($value) {
        $this->direccion = $value;
    }
    public function setCorreo($value) {
        $this->correo = $value;
    }
    public function setTelefono($value) {
        $this->telefono = $value;
    }

}

?>