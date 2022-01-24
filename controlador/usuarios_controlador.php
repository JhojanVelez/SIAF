<?php

class UsuariosControlador extends Controlador{
    function __construct ($url) {
        $this->controladorMetodoParametro = $url;
    }

    public function registrar () {

        try {
            if(!isset($_POST["documento"]) || empty($_POST["documento"]))   throw new Exception("El campo documento no puede estar vacio");
            if(!isset($_POST["nombre"]) || empty($_POST["nombre"]))         throw new Exception("El campo nombre fisica no puede estar vacio");
            if(!isset($_POST["apellido"]) || empty($_POST["apellido"]))     throw new Exception("El campo apellido no puede estar vacio");
            if(!isset($_POST["eps"]) || empty($_POST["eps"]))               throw new Exception("El campo eps no puede estar vacio");
            if(!isset($_POST["rh"]) || empty($_POST["rh"]))                 throw new Exception("El campo rh no puede estar vacio");
            if(!isset($_POST["direccion"]) || empty($_POST["direccion"]))   throw new Exception("El campo direccion no puede estar vacio");
            if(!isset($_POST["telefono"]) || empty($_POST["telefono"]))     throw new Exception("El campo telefono no puede estar vacio");
            if(!isset($_POST["correo"]) || empty($_POST["correo"]))         throw new Exception("El campo correo no puede estar vacio");
            if(!isset($_POST["password"]) || empty($_POST["password"]))     throw new Exception("El campo password no puede estar vacio");
            if(!isset($_POST["rol"]) || empty($_POST["rol"]))               throw new Exception("El campo rol no puede estar vacio");
                
            $this->instanciaModelo->setDocumento(htmlentities(addslashes($_POST["documento"])));
            $this->instanciaModelo->setNombre(htmlentities(addslashes($_POST["nombre"])));
            $this->instanciaModelo->setApellido(htmlentities(addslashes($_POST["apellido"])));
            $this->instanciaModelo->setEps(htmlentities(addslashes($_POST["eps"])));
            $this->instanciaModelo->setRH(htmlentities(addslashes($_POST["rh"])));
            $this->instanciaModelo->setDireccion(htmlentities(addslashes($_POST["direccion"])));
            $this->instanciaModelo->setTelefono(addslashes($_POST["telefono"]));
            $this->instanciaModelo->setCorreo(htmlentities(addslashes($_POST["correo"])));
            $this->instanciaModelo->setPassword(addslashes($_POST["password"]));
            $this->instanciaModelo->setRol(addslashes($_POST["rol"]));

            $this->result = $this->instanciaModelo->registrar();
            
            /* Las siguientes lineas de codigo se encargan de subir la imagen del directorio temporal al directorio fotosEmpleados */
            if($this->result["complete"]) {
                if($_FILES['foto']['error'] != 4) {
                    $fileType = explode("/",$_FILES['foto']['type'])[1];
    
                    $newFileName = "empleado_{$_POST['documento']}.{$fileType}";
    
                    move_uploaded_file($_FILES['foto']['tmp_name'],"fotosEmpleados/$newFileName");
                }
            }
            
            echo(json_encode($this->result));



        } catch (Exception $e) {
            $this->result["complete"] = false;
            $this->result["errorMessage"] = $e->getMessage();
            echo(json_encode($this->result));
        }
    }

    public function editar ($idUsuarioSeleccionado) {

        try {
            if(!isset($_POST["documento"]) || empty($_POST["documento"]))   throw new Exception("El campo documento no puede estar vacio");
            if(!isset($_POST["nombre"]) || empty($_POST["nombre"]))         throw new Exception("El campo nombre fisica no puede estar vacio");
            if(!isset($_POST["apellido"]) || empty($_POST["apellido"]))     throw new Exception("El campo apellido no puede estar vacio");
            if(!isset($_POST["eps"]) || empty($_POST["eps"]))               throw new Exception("El campo eps no puede estar vacio");
            if(!isset($_POST["rh"]) || empty($_POST["rh"]))                 throw new Exception("El campo rh no puede estar vacio");
            if(!isset($_POST["direccion"]) || empty($_POST["direccion"]))   throw new Exception("El campo direccion no puede estar vacio");
            if(!isset($_POST["telefono"]) || empty($_POST["telefono"]))     throw new Exception("El campo telefono no puede estar vacio");
            if(!isset($_POST["correo"]) || empty($_POST["correo"]))         throw new Exception("El campo correo no puede estar vacio");
            if(!isset($_POST["rol"]) || empty($_POST["rol"]))               throw new Exception("El campo rol no puede estar vacio");
                
            $this->instanciaModelo->setDocumento(htmlentities(addslashes($_POST["documento"])));
            $this->instanciaModelo->setNombre(htmlentities(addslashes($_POST["nombre"])));
            $this->instanciaModelo->setApellido(htmlentities(addslashes($_POST["apellido"])));
            $this->instanciaModelo->setEps(htmlentities(addslashes($_POST["eps"])));
            $this->instanciaModelo->setRH(htmlentities(addslashes($_POST["rh"])));
            $this->instanciaModelo->setDireccion(htmlentities(addslashes($_POST["direccion"])));
            $this->instanciaModelo->setTelefono(addslashes($_POST["telefono"]));
            $this->instanciaModelo->setCorreo(htmlentities(addslashes($_POST["correo"])));
            $this->instanciaModelo->setRol(addslashes($_POST["rol"]));

            $this->result = $this->instanciaModelo->editar(htmlentities(addslashes($idUsuarioSeleccionado)));
            
            /* Las siguientes lineas de codigo se encargan de subir la imagen del directorio temporal al directorio fotosEmpleados */
            if($this->result["complete"]) {
                $fileType = ($_FILES['foto']['type'] == "")
                            ?"jpeg"
                            :explode("/",$_FILES['foto']['type'])[1];
                $oldFileName = "empleado_{$idUsuarioSeleccionado}.jpeg";
                $newFileName = "empleado_{$this->instanciaModelo->getDocumento()}.{$fileType}";

                if(($_FILES['foto']['error'] != 4) && ($idUsuarioSeleccionado == $this->instanciaModelo->getDocumento())) {
                    /* el usuario cambio la foto y el id no lo modifico */
                    move_uploaded_file($_FILES['foto']['tmp_name'],"fotosEmpleados/$newFileName");
                } else if(($_FILES['foto']['error'] != 4) && ($idUsuarioSeleccionado != $this->instanciaModelo->getDocumento())) {
                    /* el usuario cambio la foto y el id */
                    rename("fotosEmpleados/$oldFileName","fotosEmpleados/$newFileName");
                    move_uploaded_file($_FILES['foto']['tmp_name'],"fotosEmpleados/$newFileName");
                }else if(($_FILES['foto']['error'] == 4) && ($idUsuarioSeleccionado != $this->instanciaModelo->getDocumento())) {
                    /* el usuario NO cambio la foto pero si modifico el id */
                    rename("fotosEmpleados/$oldFileName","fotosEmpleados/$newFileName");
                }
            }
            
            echo(json_encode($this->result));



        } catch (Exception $e) {
            $this->result["complete"] = false;
            $this->result["errorMessage"] = $e->getMessage();
            echo(json_encode($this->result));
        }
    }
}

?>