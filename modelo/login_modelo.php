<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class LoginModelo extends ConexionBD{
    
    private $documentoUsuario;
    private $passwordUsuario;
    private $rolUsuario;
    private $correoUsuario;
    private $validadorPassword;
    
    private $codigoAleatorio = Array();
    
    public function obtenerTodosLosDatos () {}

    public function buscarPorAtributos () {
        $this->sql ="SELECT * 
                    FROM tbl_empleados
                    WHERE
                    EmpDocIdentidad     LIKE :documentoUsuario AND
                    EmpCorreo           LIKE :correoUsuario";
                    
        $this->PDOStmt = $this->connection->prepare($this->sql);
        
        $this->PDOStmt->bindValue(":documentoUsuario",$this->documentoUsuario);
        $this->PDOStmt->bindValue(":correoUsuario",$this->correoUsuario);

        $this->PDOStmt->execute();

        $this->result["infoUsuario"] = $this->PDOStmt->fetchAll(PDO::FETCH_ASSOC);

        return $this->result;
    }

    public function buscarUsuario () {
        $this->sql ="SELECT * 
                    FROM tbl_empleados
                    WHERE
                    EmpDocIdentidad = :documentoUsuario AND
                    EmpRol          = :rolUsuario";
                    
        $this->PDOStmt = $this->connection->prepare($this->sql);
        
        $this->PDOStmt->bindValue(":documentoUsuario",$this->documentoUsuario);
        $this->PDOStmt->bindValue(":rolUsuario",$this->rolUsuario);

        $this->PDOStmt->execute();

        $this->result["infoUsuario"] = $this->PDOStmt->fetchAll(PDO::FETCH_ASSOC);
        
        if(count($this->result["infoUsuario"]) != 0) {
            
            $this->validadorPassword = password_verify($this->passwordUsuario,$this->result["infoUsuario"][0]["EmpPassword"]);
            
            if(!$this->validadorPassword) {
                $this->result["infoUsuario"] = [];
            }
        }

        if($this->validadorPassword && count($this->result["infoUsuario"]) != 0) {
            $_SESSION["usuario"]["documento"] = $this->result["infoUsuario"][0]["EmpDocIdentidad"];
            $_SESSION["usuario"]["nombre"] = $this->result["infoUsuario"][0]["EmpNombre"];
            $_SESSION["usuario"]["apellido"] = $this->result["infoUsuario"][0]["EmpApellido"];
            $_SESSION["usuario"]["rol"] = $this->result["infoUsuario"][0]["EmpRol"];
        }

        return $this->result;
    }

    public function enviarCorreoRestablecerPass () {


        //Generando el codigo aleatorio

        $this->codigoAleatorio["dividido"][0] = random_int(0,9);
        $this->codigoAleatorio["dividido"][1] = random_int(0,9); 
        $this->codigoAleatorio["dividido"][2] = random_int(0,9);
        $this->codigoAleatorio["dividido"][3] = random_int(0,9);

        $this->codigoAleatorio["completo"] = implode($this->codigoAleatorio["dividido"]);

        //Creando el correo electronico
        
        require 'libs/phpMailer/phpmailer/src/Exception.php';
        require 'libs/phpMailer/phpmailer/src/PHPMailer.php';
        require 'libs/phpMailer/phpmailer/src/SMTP.php';

        $mail = new PHPMailer(true);

        try {
            //Server settings                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = SMTP_SERVER;                       //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = EMAIL               ;                   //SMTP username
            $mail->Password   = PASSWORD_EMAIL;                         //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            //Recipients
            $mail->setFrom(EMAIL, NOMBRE_EMAIL);
            $mail->addAddress($this->correoUsuario);                 //Add a recipient
            // $mail->addAddress('ellen@example.com');               //Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');
        
            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->CharSet = 'UTF-8';
            $mail->Subject = 'Codigo de Verificación';
            $mail->Body    = 
            "
            <h1>Hola,</h1> 
            <p>SIAF te informa que el codigo de verificación para poder restablecer tu contrase&ntilde;a es:
            <br> 
            <h2>{$this->codigoAleatorio["completo"]}</h2>
            ";
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
            $mail->send();
            
            $this->result["complete"] = true;
            $this->result["codigo"] = $this->codigoAleatorio;

            return $this->result;

        } catch (Exception $e) {
            $this->result["complete"] = false;
        }
    }

    public function restablecerPassword () {
        try {

            $this->sql="SELECT EmpPassword 
                        FROM tbl_empleados 
                        WHERE 
                        EmpDocIdentidad = :documentoUsuario";

            $this->PDOStmt = $this->connection->prepare($this->sql);

            $this->PDOStmt->bindValue(":documentoUsuario",$this->documentoUsuario);

            $this->PDOStmt->execute();

            $oldPasswordHash = $this->PDOStmt->fetchAll(PDO::FETCH_ASSOC)[0]["EmpPassword"];
            $newPassword = $this->passwordUsuario;

            if(password_verify($newPassword,$oldPasswordHash)) {
                throw new PDOException("Por favor intenta con otra contraseña diferente a la actual");
            }

            $this->sql="UPDATE tbl_empleados
                        SET EmpPassword = :passwordUsuario 
                        WHERE
                        EmpDocIdentidad = :documentoUsuario";

            $this->PDOStmt = $this->connection->prepare($this->sql);
            
            $this->PDOStmt->bindValue(":documentoUsuario",$this->documentoUsuario);

            $this->passwordUsuario = password_hash($this->passwordUsuario,PASSWORD_DEFAULT);

            $this->PDOStmt->bindValue(":passwordUsuario",$this->passwordUsuario);

            $this->PDOStmt->execute();

            if($this->PDOStmt->errorInfo()[1] == 1406) throw new PDOException;

            $this->result["complete"] = true;
            $this->result["affectedRows"] = $this->PDOStmt->rowCount();
            $this->result["PDOMessage"] = $this->PDOStmt->errorInfo();
            
            return $this->result;

        } catch (PDOException $e) {

            $this->result["complete"] = false;
            $this->result["PDOMessage"] = $this->PDOStmt->errorInfo();
            if($this->PDOStmt->errorInfo()[1] == 1406) $this->result["errorMessage"] = "La informacion no pudo ser registrada porque algun campo excedio la cantidad maxima de caracteres permitidos";

            return $this->result;
        }
    }

    public function cerrarSesion(){}

    /* METODOS GETTER */
    
    public function getDocumentoUsuario () {return $this->documentoUsuario;} 
    public function getPasswordUsuario () {return $this->passwordUsuario;} 
    public function getRolUsuario () {return $this->rolUsuario;} 
    public function getCorreoUsuario () {return $this->correoUsuario;} 
    
    /* METODOS SETTER */

    public function setDocumentoUsuario ($value) {
        $this->documentoUsuario = $value;
    }
    public function setPasswordUsuario ($value) {
        $this->passwordUsuario = $value;
    }
    public function setRolUsuario ($value) {
        $this->rolUsuario = $value;
    }
    public function setCorreoUsuario ($value) {
        $this->correoUsuario = $value;
    }
}

?>