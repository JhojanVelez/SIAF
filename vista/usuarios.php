<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo(URL_RAIZ); ?>public/css/usuarios.css">
    <link rel="shortcut icon" href="<?php echo(URL_FAVICON); ?>" type="image/x-icon">
    <title>Usuarios</title>
</head>
<body>
    <?php
        require_once("nav.php");
    ?>

<main class="usuarios grid-container-main">
        <section class="usuarios__container-title container-title box-shadow">
            <h1 class="usuarios__titulo">Gestiona Tus Usuarios</h1>
        </section>


        <section class="usuarios__container-filter container-filter box-shadow">
            <div class="usuarios__filtro filtro">
                <h2 class="usuarios__filtro-titulo filtro-title">Filtros de B&uacute;squeda</h2>
                <form 
                id="usuarios__filtro-form"
                class="usuarios__filtro-form filtro-form" 
                action="<?php echo URL_RAIZ ?>usuarios/generarReporte" 
                method="POST" 
                target="_BLANK"
                >
                    <section class="usuarios__filtro-input-container">
                        <label class="usuarios__filtro-input-label filtro-label" for="usuario-id">Por el documento de identidad</label>
                        <input 
                        name="documento"
                        type="text" 
                        class="usuarios__filtro-usuario-id" 
                        id="usuario-id" 
                        placeholder="Documento"
                        autocomplete="off"
                        data-input
                        >
                    </section>
                    <section class="usuarios__filtro-input-container">
                        <label class="usuarios__filtro-input-label filtro-label" for="usuario-nombre">Por su nombre</label>
                        <input 
                        name="nombre"
                        type="text" 
                        class="usuarios__filtro-usuario-nombre" 
                        id="usuario-nombre" 
                        placeholder="Nombre"
                        autocomplete="off"
                        data-input
                        >
                    </section>
                    <section class="usuarios__filtro-input-container">
                        <label class="usuarios__filtro-input-label filtro-label" for="usuario-apellido">Por su apellido</label>
                        <input 
                        name="apellido"
                        type="text" 
                        class="usuarios__filtro-usuario-apellido" 
                        id="usuario-apellido" 
                        placeholder="Apellido"
                        autocomplete="off"
                        data-input
                        >
                    </section>
                </form>
                <div class="usuarios__filtro-gen-repo filtro-gen-repo">
                    <div class="usuarios__filtro-gen-repo-img filtro-gen-repo-img">
                        <img src="<?php echo(URL_RAIZ); ?>public/imagenes/informe.png" alt="">
                    </div>
                    <input 
                    class="usuarios__filtro-subtitulo-reporte filtro-subtitulo-reporte" 
                    type="submit" 
                    value="Generar Reporte" 
                    form="usuarios__filtro-form"
                    >
                </div>
            </div>
        </section>


        <section class="usuarios__container-table contenedor-objetos  box-shadow">
            <div class="usuarios__lista-title contenedor-objetos__title">
                <h2>Usuarios Registrados</h2>
            </div>
            <div class="usuarios__lista-contenido contenedor-objetos__contenido box-shadow">
                <?php foreach($this->data["infoEmpleados"] as $key => $value):?>

                    <figure class="usuarios__lista-usuario contenedor-objetos__objeto box-shadow">
                        <div class="usuarios__lista-usuario-img contenedor-objetos__objeto-img">
                            <img 
                            src="
                                    <?php 
                                    echo (file_exists("fotosEmpleados/empleado_{$value['EmpDocIdentidad']}.jpeg"))
                                        ? "fotosEmpleados/empleado_{$value['EmpDocIdentidad']}.jpeg" 
                                        : "fotosEmpleados/default_1.jpeg";
                                    ?>
                                " 
                            alt="">
                        </div>
                        <div class="usuarios__lista-usuario-info-container">
                            <section class="usuarios__lista-usuario-info documento">
                                <h4 class="usuarios__lista-usuario-info-title">DOCUMENTO DE IDENTIDAD</h4>
                                <p class="usuarios__lista-usuario-data"><?php echo $value["EmpDocIdentidad"] ?></p>
                            </section>
                            <section class="usuarios__lista-usuario-info nombres">
                                <h4 class="usuarios__lista-usuario-info-title">NOMBRES</h4>
                                <p class="usuarios__lista-usuario-data"><?php echo $value["EmpNombre"] ?></p>
                            </section>
                            <section class="usuarios__lista-usuario-info apellidos">
                                <h4 class="usuarios__lista-usuario-info-title">APELLIDOS</h4>
                                <p class="usuarios__lista-usuario-data"><?php echo $value["EmpApellido"] ?></p>
                            </section>
                            <section class="usuarios__lista-usuario-info eps">
                                <h4 class="usuarios__lista-usuario-info-title">EPS</h4>
                                <p class="usuarios__lista-usuario-data"><?php echo $value["EmpEps"] ?></p>
                            </section>
                            <section class="usuarios__lista-usuario-info telefono">
                                <h4 class="usuarios__lista-usuario-info-title">TEL&Eacute;FONO</h4>
                                <p class="usuarios__lista-usuario-data"><?php echo $value["EmpTelefono"] ?></p>
                            </section>
                            <section class="usuarios__lista-usuario-info correo">
                                <h4 class="usuarios__lista-usuario-info-title">CORREO</h4>
                                <p class="usuarios__lista-usuario-data"><?php echo $value["EmpCorreo"] ?></p>
                            </section>
                            <section class="usuarios__lista-usuario-info direccion">
                                <h4 class="usuarios__lista-usuario-info-title">DIRECCI&Oacute;N</h4>
                                <p class="usuarios__lista-usuario-data"><?php echo $value["EmpDireccion"] ?></p>
                            </section>
                            <section class="usuarios__lista-usuario-info rh">
                                <h4 class="usuarios__lista-usuario-info-title">RH</h4>
                                <p class="usuarios__lista-usuario-data"><?php echo $value["EmpRH"] ?></p>
                            </section>
                            <section class="usuarios__lista-usuario-info rol">
                                <h4 class="usuarios__lista-usuario-info-title">ROL</h4>
                                <p class="usuarios__lista-usuario-data"><?php echo $value["EmpRol"] ?></p>
                            </section>
                        </div>
                        <div class="usuarios__lista-usuario-botones contenedor-objetos__objeto-botones">
                            <button 
                            class="usuarios__lista-usuario-boton usuarios__lista-usuario-boton-editar contenedor-objetos__objeto-boton boton"
                            data-doc-usuario = <?php echo $value["EmpDocIdentidad"] ?>
                            >
                                <div class="usuarios__lista-usuario-boton-img">
                                    <img src="<?php echo(URL_RAIZ); ?>public/imagenes/editar-icono.png" alt="">
                                </div>
                                <span>Editar</span>
                            </button>
                            <button 
                            class="usuarios__lista-usuario-boton usuarios__lista-usuario-boton-inhabilitar contenedor-objetos__objeto-boton boton"
                            data-doc-usuario = <?php echo $value["EmpDocIdentidad"] ?>
                            >
                                <div class="usuarios__lista-usuario-boton-img">
                                    <img src="<?php echo(URL_RAIZ); ?>public/imagenes/delete-icono.png" alt="">
                                </div>
                                <span>Inhabilitar</span>
                            </button>
                        </div>
                    </figure>
                <?php endforeach; ?>


                <!-- 
                    Este template nos permite imprimir la informacion cuando estamos buscando por atributo
                    pero en este caso lo hacemos con template para hacer uso de los fragmentos
                -->

                <template class="usuarios__lista-usuario-template">
                    <figure class="usuarios__lista-usuario contenedor-objetos__objeto box-shadow">
                        <div class="usuarios__lista-usuario-img contenedor-objetos__objeto-img">
                            <img 
                            src="" 
                            alt="">
                        </div>
                        <div class="usuarios__lista-usuario-info-container">
                            <section class="usuarios__lista-usuario-info documento">
                                <h4 class="usuarios__lista-usuario-info-title">DOCUMENTO DE IDENTIDAD</h4>
                                <p class="usuarios__lista-usuario-data"></p>
                            </section>
                            <section class="usuarios__lista-usuario-info nombres">
                                <h4 class="usuarios__lista-usuario-info-title">NOMBRES</h4>
                                <p class="usuarios__lista-usuario-data"></p>
                            </section>
                            <section class="usuarios__lista-usuario-info apellidos">
                                <h4 class="usuarios__lista-usuario-info-title">APELLIDOS</h4>
                                <p class="usuarios__lista-usuario-data"></p>
                            </section>
                            <section class="usuarios__lista-usuario-info eps">
                                <h4 class="usuarios__lista-usuario-info-title">EPS</h4>
                                <p class="usuarios__lista-usuario-data"></p>
                            </section>
                            <section class="usuarios__lista-usuario-info telefono">
                                <h4 class="usuarios__lista-usuario-info-title">TEL&Eacute;FONO</h4>
                                <p class="usuarios__lista-usuario-data"></p>
                            </section>
                            <section class="usuarios__lista-usuario-info correo">
                                <h4 class="usuarios__lista-usuario-info-title">CORREO</h4>
                                <p class="usuarios__lista-usuario-data"></p>
                            </section>
                            <section class="usuarios__lista-usuario-info direccion">
                                <h4 class="usuarios__lista-usuario-info-title">DIRECCI&Oacute;N</h4>
                                <p class="usuarios__lista-usuario-data"></p>
                            </section>
                            <section class="usuarios__lista-usuario-info rh">
                                <h4 class="usuarios__lista-usuario-info-title">RH</h4>
                                <p class="usuarios__lista-usuario-data"></p>
                            </section>
                            <section class="usuarios__lista-usuario-info rol">
                                <h4 class="usuarios__lista-usuario-info-title">ROL</h4>
                                <p class="usuarios__lista-usuario-data"></p>
                            </section>
                        </div>
                        <div class="usuarios__lista-usuario-botones contenedor-objetos__objeto-botones">
                            <button 
                            class="usuarios__lista-usuario-boton usuarios__lista-usuario-boton-editar contenedor-objetos__objeto-boton boton"
                            data-doc-usuario
                            >
                                <div class="usuarios__lista-usuario-boton-img">
                                    <img src="<?php echo(URL_RAIZ); ?>public/imagenes/editar-icono.png" alt="">
                                </div>
                                <span>Editar</span>
                            </button>
                            <button 
                            class="usuarios__lista-usuario-boton usuarios__lista-usuario-boton-inhabilitar contenedor-objetos__objeto-boton boton"
                            data-doc-usuario
                            >
                                <div class="usuarios__lista-usuario-boton-img">
                                    <img src="<?php echo(URL_RAIZ); ?>public/imagenes/delete-icono.png" alt="">
                                </div>
                                <span>Inhabilitar</span>
                            </button>
                        </div>
                    </figure>
                </template>
            </div>
        </section>


        <section class="usuarios__container-botones container-botones box-shadow">
            <section class="usuarios__container-boton">
                <button class="usuarios__boton-agregar boton">
                    A&ntilde;adir
                </button>
            </section>
            <section class="usuarios__container-boton">
                <button class="usuarios__boton-inhabilitar boton">
                    Ver usuarios inhabilitados
                </button>
            </section>
        </section>


        <section class="usuarios__container-modal transparent-container-modal">
            
            <!-- Estos son los modals para agregar un usuario -->
            <dialog class="usuarios__modal-agregar-usuario">
                <h2 class="usuarios__modal-agregar-usuario-title dialog-title">Registra Nuevos Usuarios</h2>
                <form class="usuarios__modal-agregar-usuario-form dialog-main-content">
                    <section class="dialog-main-content__input-container usuarios__modal-agregar-usuario-form-item">
                        <label class="dialog-main-content__label">Documento del Usuario</label>
                        <input
                        name="documento"
                        type="text"
                        maxlength="15"
                        id="docUsuario"
                        title="Debe tener una maxima logitud de 15 caracteres"
                        autocomplete="off"
                        tabindex="1" 
                        data-input 
                        data-EmpDocIdentidad
                        >
                    </section>
                    <section class="dialog-main-content__input-container usuarios__modal-agregar-usuario-form-item">
                        <label class="dialog-main-content__label">Correo Electr&oacute;nico del Usuario</label>
                        <input
                        name="correo"
                        type="text"
                        title= "Ingresa el correo electronico del proveedor: ejemplo@gmail.com"
                        autocomplete="off" 
                        tabindex="5" 
                        data-input
                        data-EmpCorreo 
                        >
                    </section>
                    <section class="dialog-main-content__input-container usuarios__modal-agregar-usuario-form-item">
                        <label class="dialog-main-content__label">Nombre/s del Usuario</label>
                        <input
                        name="nombre"
                        type="text"
                        title="Ingresa el nombre del usuario"
                        autocomplete="off" 
                        tabindex="2" 
                        data-input 
                        data-EmpNombre
                        >
                    </section>
                    <section class="dialog-main-content__input-container usuarios__modal-agregar-usuario-form-item">
                        <label class="dialog-main-content__label">Direcci&oacute;n del Usuario</label>
                        <input
                        name="direccion"
                        type="text"
                        title="Ingresa la direccion del cliente"
                        autocomplete="off" 
                        tabindex="6" 
                        data-input 
                        data-EmpDireccion
                        >
                    </section>
                    <section class="dialog-main-content__input-container usuarios__modal-agregar-usuario-form-item">
                        <label class="dialog-main-content__label">Apellido/s del Usuario</label>
                        <input
                        name="apellido"
                        type="text"
                        title="Ingresa el apellido del usuario"
                        autocomplete="off" 
                        tabindex="3" 
                        data-input 
                        data-EmpApellido
                        >
                    </section>
                    <section class="dialog-main-content__input-container usuarios__modal-agregar-usuario-form-item">
                        <label class="dialog-main-content__label">Tel&eacute;fono del Usuario</label>
                        <input
                        name="telefono"
                        type="text"
                        title="Ingresa el numero telefonico del cliente"
                        autocomplete="off" 
                        tabindex="7" 
                        data-input 
                        data-EmpTelefono
                        >
                    </section>
                    <section class="dialog-main-content__input-container usuarios__modal-agregar-usuario-form-item">
                        <label class="dialog-main-content__label">EPS del Usuario</label>
                        <input
                        name="eps"
                        type="text"
                        title="Ingresa la Entidad Promotora de Salud(EPS) del usuario"
                        autocomplete="off" 
                        tabindex="4" 
                        data-input 
                        data-EmpEps
                        >
                    </section>
                    <section class="dialog-main-content__input-container usuarios__modal-agregar-usuario-form-item">
                        <label class="dialog-main-content__label">RH del Usuario</label>
                        <input
                        name="rh"
                        type="text"
                        title="Ingresa el RH del usuario"
                        autocomplete="off" 
                        tabindex="8" 
                        data-input 
                        data-EmpRH
                        >
                    </section>
                    <div class="usuarios__modal-agregar-usuario-form-item">
                        <div class="usuarios-modal-agregar-usuario-form-img-container">
                            <img class="usuarios-modal-agregar-usuario-form-img-container__img" src="fotosEmpleados/default_1.jpeg" alt="">
                            <input
                            name="foto"
                            type="file" 
                            class="usuarios-modal-agregar-usuario-form-img-container__file" 
                            title="Ingresa una foto de perfil de usuario"
                            autocomplete="off"  
                            accept="image/jpeg"
                            data-input
                            data-EmpIMG
                            >
                        </div>
                    </div>
                    <section class="dialog-main-content__input-container usuarios__modal-agregar-usuario-form-item">
                        <label class="dialog-main-content__label">Contrase&ntilde;a del Usuario</label>
                        <input
                        name="password"
                        type="text"
                        title="Ingresa la contrase&ntilde;a de usuario"
                        autocomplete="off" 
                        tabindex="9" 
                        data-input
                        data-EmpPassword 
                        >
                        <figure class="usuarios-alert-password-container">
                            <div class="usuarios-alert-password-container__alert box-shadow">
                                <h4 class="usuarios-alert-password-container__alert-title">Recuerda...</h4>
                                <p class="usuarios-alert-password-container__alert-text">Una contraseña segura debe cumplir como m&iacute;nimo los siguientes parametros:</p>
                                <ul class="usuarios-alert-password-container__alert-list-ul">
                                    <li>Debe contener como m&iacute;nimo 8 caracteres.</li>
                                    <li>Debe contener por lo menos 1 letra min&uacute;scula.</li>
                                    <li>Debe contener por lo menos 1 letra MAY&Uacute;SCULA.</li>
                                    <li>Debe contener por lo menos 1 d&iacute;gito del 0 al 9.</li>
                                    <li>Debe contener por lo menos un car&aacute;cter especial como por ejemplo(! " # $ % & ' ( ) * + , - . / : ; < = > ? @ [ \ ] ^ _` { | } ~ ).</li>
                                </ul>
                            </div>
                        </figure>
                        <span class="pass-correcto"></span>
                        <span class="pass-incorrecto"></span>
                    </section>
                    <section class="dialog-main-content__input-container usuarios__modal-agregar-usuario-form-item">
                        <label class="dialog-main-content__label">Rol del Usuario</label>
                        <select
                        name="rol"
                        title="Selecciona el rol de usuario"
                        class="usuarios__modal-agregar-usuario-form-item"
                        autocomplete="off" 
                        tabindex="10" 
                        data-input 
                        data-EmpRol
                        >
                            <option value=""></option>
                            <option value="GERENTE">Gerente</option>
                            <option value="ALMACENISTA">Almacenista</option>
                            <option value="FARMACEUTA">Farmaceuta</option>
                        </select>
                    </section>
                    <div class="usuarios__modal-agregar-usuario-form-item usuarios__modal-agregar-usuario-btns-container dialog-container-bts">
                        <button class="usuarios__modal-agregar-usuario-btn-cancelar boton dialog-btn">Cancelar</button>
                        <button class="usuarios__modal-agregar-usuario-btn-añadir boton dialog-btn">A&ntilde;adir</button>
                    </div>
                </form>
            </dialog>

            <dialog class="usuarios__modal-agregar-usuario-confirmacion">
                <h2 class="usuarios__modal-agregar-usuario-title-confirmacion dialog-title">Verifica los Datos</h2>
                <p class="usuarios__modal-agregar-usuario-text-confirmacion dialog-text">
                    ¿Est&aacute;s seguro de registrar este usuario?<br>
                    Recuerda revisar detenidamente la informaci&oacute;n del usuario que estas registrando.
                </p>
                <div class="usuarios__modal-agregar-usuario-info-confirmacion dialog-main-content">
                    <section class="usuarios__modal-agregar-usuario-info-item-confirmacion" data-EmpDocIdentidad>
                        <h3 class="dialog-main-content__label">Documento del Usuario</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="usuarios__modal-agregar-usuario-info-item-confirmacion" data-EmpCorreo >
                        <h3 class="dialog-main-content__label">Correo Electr&oacute;nico del Usuario</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="usuarios__modal-agregar-usuario-info-item-confirmacion" data-EmpNombre>
                        <h3 class="dialog-main-content__label">Nombre/s del Usuario</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="usuarios__modal-agregar-usuario-info-item-confirmacion" data-EmpDireccion>
                        <h3 class="dialog-main-content__label">Direcci&oacute;n del Usuario</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="usuarios__modal-agregar-usuario-info-item-confirmacion" data-EmpApellido>
                        <h3 class="dialog-main-content__label">Apellido/s del Usuario</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="usuarios__modal-agregar-usuario-info-item-confirmacion" data-EmpTelefono>
                        <h3 class="dialog-main-content__label">Tel&eacute;fono del Usuario</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="usuarios__modal-agregar-usuario-info-item-confirmacion" data-EmpEps>
                        <h3 class="dialog-main-content__label">EPS del Usuario</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="usuarios__modal-agregar-usuario-info-item-confirmacion" data-EmpRH>
                        <h3 class="dialog-main-content__label">RH del Usuario</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="usuarios__modal-agregar-usuario-info-item-confirmacion" data-EmpIMG>
                        <div class="usuarios-modal-agregar-usuario-info-item-confirmacion__img-container">
                            <img src="" alt="Foto Usuario">
                        </div>
                    </section>
                    <section class="usuarios__modal-agregar-usuario-info-item-confirmacion" data-EmpPassword>
                        <h3 class="dialog-main-content__label">Contrase&ntilde;a del Usuario</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="usuarios__modal-agregar-usuario-info-item-confirmacion" data-EmpRol>
                        <h3 class="dialog-main-content__label">Rol del Usuario</h3>
                        <p>________________________________________________</p>
                    </section>
                    <div class="usuarios__modal-agregar-usuario-confirmacion-btns-container usuarios__modal-agregar-usuario-info-item-confirmacion dialog-container-bts">
                        <button class="usuarios__modal-agregar-usuario-confirmacion-btn-cancelar dialog-btn boton">Volver Atras</button>
                        <button class="usuarios__modal-agregar-usuario-confirmacion-btn-confirmar dialog-btn boton">Confirmar</button>
                    </div>
                </div>
            </dialog>

            <dialog class="usuarios__modal-agregacion-exitosa dialog-process-result">
                <h2>¡Excelente!</h2>
                <p>Has registrado un nuevo usuario exitosamente</p>
                <button class="usuarios__modal-agregacion-exitosa-btn dialog-process-result__btn boton" >Ok</button>
            </dialog>
            
            <dialog class="usuarios__modal-agregacion-fallo dialog-process-result">
                <h2>¡Algo sali&oacute; mal!</h2>
                <p>Este usuario no pudo ser registrado, porque posiblemente ya esta registrado en el sistema</p>
                <button class="usuarios__modal-agregacion-fallo-btn dialog-process-result__btn boton" >Ok</button>
            </dialog>

            <!-- Estos son los modals para editar un usuario -->
            <dialog class="usuarios__modal-editar-usuario">
                <h2 class="usuarios__modal-editar-usuario-title dialog-title">Edita Tus Usuarios</h2>
                <form class="usuarios__modal-editar-usuario-form dialog-main-content">
                    <section class="dialog-main-content__input-container usuarios__modal-editar-usuario-form-item">
                        <label class="dialog-main-content__label">Documento del Usuario</label>
                        <input
                        name="documento"
                        type="text"
                        maxlength="15"
                        id="docUsuario"
                        title="Debe tener una maxima logitud de 15 caracteres"
                        autocomplete="off"
                        tabindex="1" 
                        data-input 
                        data-EmpDocIdentidad
                        >
                    </section>
                    <section class="dialog-main-content__input-container usuarios__modal-editar-usuario-form-item">
                        <label class="dialog-main-content__label">Correo Electr&oacute;nico del Usuario</label>
                        <input
                        name="correo"
                        type="text"
                        title= "Ingresa el correo electronico del proveedor: ejemplo@gmail.com"
                        autocomplete="off" 
                        tabindex="5" 
                        data-input
                        data-EmpCorreo 
                        >
                    </section>
                    <section class="dialog-main-content__input-container usuarios__modal-editar-usuario-form-item">
                        <label class="dialog-main-content__label">Nombre/s del Usuario</label>
                        <input
                        name="nombre"
                        type="text"
                        title="Ingresa el nombre del usuario"
                        autocomplete="off" 
                        tabindex="2" 
                        data-input 
                        data-EmpNombre
                        >
                    </section>
                    <section class="dialog-main-content__input-container usuarios__modal-editar-usuario-form-item">
                        <label class="dialog-main-content__label">Direcci&oacute;n del Usuario</label>
                        <input
                        name="direccion"
                        type="text"
                        title="Ingresa la direccion del cliente"
                        autocomplete="off" 
                        tabindex="6" 
                        data-input 
                        data-EmpDireccion
                        >
                    </section>
                    <section class="dialog-main-content__input-container usuarios__modal-editar-usuario-form-item">
                        <label class="dialog-main-content__label">Apellido/s del Usuario</label>
                        <input
                        name="apellido"
                        type="text"
                        title="Ingresa el apellido del usuario"
                        autocomplete="off" 
                        tabindex="3" 
                        data-input 
                        data-EmpApellido
                        >
                    </section>
                    <section class="dialog-main-content__input-container usuarios__modal-editar-usuario-form-item">
                        <label class="dialog-main-content__label">Tel&eacute;fono del Usuario</label>
                        <input
                        name="telefono"
                        type="text"
                        title="Ingresa el numero telefonico del cliente"
                        autocomplete="off" 
                        tabindex="7" 
                        data-input 
                        data-EmpTelefono
                        >
                    </section>
                    <section class="dialog-main-content__input-container usuarios__modal-editar-usuario-form-item">
                        <label class="dialog-main-content__label">EPS del Usuario</label>
                        <input
                        name="eps"
                        type="text"
                        title="Ingresa la Entidad Promotora de Salud(EPS) del usuario"
                        autocomplete="off" 
                        tabindex="4" 
                        data-input 
                        data-EmpEps
                        >
                    </section>
                    <section class="dialog-main-content__input-container usuarios__modal-editar-usuario-form-item">
                        <label class="dialog-main-content__label">RH del Usuario</label>
                        <input
                        name="rh"
                        type="text"
                        title="Ingresa el RH del usuario"
                        autocomplete="off" 
                        tabindex="8" 
                        data-input 
                        data-EmpRH
                        >
                    </section>
                    <div class="usuarios__modal-editar-usuario-form-item">
                        <div class="usuarios-modal-editar-usuario-form-img-container">
                            <img class="usuarios-modal-editar-usuario-form-img-container__img" src="fotosEmpleados/default_1.jpeg" alt="">
                            <input
                            name="foto"
                            type="file" 
                            class="usuarios-modal-editar-usuario-form-img-container__file" 
                            title="Ingresa una foto de perfil de usuario"
                            autocomplete="off"  
                            accept="image/jpeg"
                            data-input
                            data-EmpIMG
                            >
                        </div>
                    </div>
                    <section class="dialog-main-content__input-container usuarios__modal-editar-usuario-form-item">
                        <label class="dialog-main-content__label">Rol del Usuario</label>
                        <select
                        name="rol"
                        title="Selecciona el rol de usuario"
                        class="usuarios__modal-editar-usuario-form-item"
                        autocomplete="off" 
                        tabindex="10" 
                        data-input 
                        data-EmpRol
                        >
                            <option value=""></option>
                            <option value="GERENTE">Gerente</option>
                            <option value="ALMACENISTA">Almacenista</option>
                            <option value="FARMACEUTA">Farmaceuta</option>
                        </select>
                    </section>
                    <div class="usuarios__modal-editar-usuario-form-item usuarios__modal-editar-usuario-btns-container dialog-container-bts">
                        <button class="usuarios__modal-editar-usuario-btn-cancelar boton dialog-btn">Cancelar</button>
                        <button class="usuarios__modal-editar-usuario-btn-editar boton dialog-btn">Editar</button>
                    </div>
                </form>
            </dialog>

            <dialog class="usuarios__modal-editar-usuario-confirmacion">
                <h2 class="usuarios__modal-editar-usuario-title-confirmacion dialog-title">Verifica los Datos</h2>
                <p class="usuarios__modal-editar-usuario-text-confirmacion dialog-text">
                    ¿Est&aacute;s seguro de modificar este usuario?<br>
                    Recuerda revisar detenidamente la informaci&oacute;n del usuario que estas modificando.
                </p>
                <div class="usuarios__modal-editar-usuario-info-confirmacion dialog-main-content">
                    <section class="usuarios__modal-editar-usuario-info-item-confirmacion" data-EmpDocIdentidad>
                        <h3 class="dialog-main-content__label">Documento del Usuario</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="usuarios__modal-editar-usuario-info-item-confirmacion" data-EmpCorreo >
                        <h3 class="dialog-main-content__label">Correo Electr&oacute;nico del Usuario</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="usuarios__modal-editar-usuario-info-item-confirmacion" data-EmpNombre>
                        <h3 class="dialog-main-content__label">Nombre/s del Usuario</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="usuarios__modal-editar-usuario-info-item-confirmacion" data-EmpDireccion>
                        <h3 class="dialog-main-content__label">Direcci&oacute;n del Usuario</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="usuarios__modal-editar-usuario-info-item-confirmacion" data-EmpApellido>
                        <h3 class="dialog-main-content__label">Apellido/s del Usuario</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="usuarios__modal-editar-usuario-info-item-confirmacion" data-EmpTelefono>
                        <h3 class="dialog-main-content__label">Tel&eacute;fono del Usuario</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="usuarios__modal-editar-usuario-info-item-confirmacion" data-EmpEps>
                        <h3 class="dialog-main-content__label">EPS del Usuario</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="usuarios__modal-editar-usuario-info-item-confirmacion" data-EmpRH>
                        <h3 class="dialog-main-content__label">RH del Usuario</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="usuarios__modal-editar-usuario-info-item-confirmacion" data-EmpIMG>
                        <div class="usuarios-modal-editar-usuario-info-item-confirmacion__img-container">
                            <img src="" alt="Foto Usuario">
                        </div>
                    </section>
                    <section class="usuarios__modal-editar-usuario-info-item-confirmacion" data-EmpRol>
                        <h3 class="dialog-main-content__label">Rol del Usuario</h3>
                        <p>________________________________________________</p>
                    </section>
                    <div class="usuarios__modal-editar-usuario-confirmacion-btns-container usuarios__modal-editar-usuario-info-item-confirmacion dialog-container-bts">
                        <button class="usuarios__modal-editar-usuario-confirmacion-btn-cancelar dialog-btn boton">Volver Atras</button>
                        <button class="usuarios__modal-editar-usuario-confirmacion-btn-confirmar dialog-btn boton">Confirmar</button>
                    </div>
                </div>
            </dialog>

            <dialog class="usuarios__modal-modificacion-exitosa dialog-process-result">
                <h2>¡Excelente!</h2>
                <p>Has modificado un usuario exitosamente</p>
                <button class="usuarios__modal-modificacion-exitosa-btn dialog-process-result__btn boton" >Ok</button>
            </dialog>
            
            <dialog class="usuarios__modal-modificacion-fallo dialog-process-result">
                <h2>¡Algo sali&oacute; mal!</h2>
                <p>Este usuario no pudo ser modificado, porque posiblemente hubo un error interno</p>
                <button class="usuarios__modal-modificacion-fallo-btn dialog-process-result__btn boton" >Ok</button>
            </dialog>

            <!-- Estos son los modals para inhabilitar un usuario -->

            <dialog class="usuarios__modal-inhabilitar-usuario">
                <h2 class="usuarios__modal-inhabilitar-usuario-title dialog-title">¡Ten cuidado!</h2>
                <p class="usuarios__modal-inhabilitar-usuario-text dialog-text">
                    ¿Est&aacute;s seguro de inhabilitar este usuario?<br>
                    Recuerda que una vez inhabilitado, no lo podras volver a habilitar.
                </p>
                <div class="usuarios__modal-inhabilitar-usuario-info dialog-main-content">
                    <section class="usuarios__modal-inhabilitar-usuario-info-item" data-EmpDocIdentidad>
                    <h3 class="dialog-main-content__label">Documento del Usuario</h3>
                    <p>________________________________________________</p>
                    </section>
                    <section class="usuarios__modal-inhabilitar-usuario-info-item" data-EmpCorreo>
                        <h3 class="dialog-main-content__label">Correo Electr&oacute;nico del Usuario</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="usuarios__modal-inhabilitar-usuario-info-item" data-EmpNombre>
                        <h3 class="dialog-main-content__label">Nombre/s del Usuario</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="usuarios__modal-inhabilitar-usuario-info-item" data-EmpDireccion>
                        <h3 class="dialog-main-content__label">Direcci&oacute;n del Usuario</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="usuarios__modal-inhabilitar-usuario-info-item" data-EmpApellido>
                        <h3 class="dialog-main-content__label">Apellido/s del Usuario</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="usuarios__modal-inhabilitar-usuario-info-item" data-EmpTelefono>
                        <h3 class="dialog-main-content__label">Tel&eacute;fono del Usuario</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="usuarios__modal-inhabilitar-usuario-info-item" data-EmpEps>
                        <h3 class="dialog-main-content__label">EPS del Usuario</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="usuarios__modal-inhabilitar-usuario-info-item" data-EmpRH>
                        <h3 class="dialog-main-content__label">RH del Usuario</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="usuarios__modal-inhabilitar-usuario-info-item" data-EmpIMG>
                        <div class="usuarios-modal-inhabilitar-usuario-info-item__img-container">
                            <img src="" alt="Foto Usuario">
                        </div>
                    </section>
                    <section class="usuarios__modal-inhabilitar-usuario-info-item" data-EmpRol>
                        <h3 class="dialog-main-content__label">Rol del Usuario</h3>
                        <p>________________________________________________</p>
                    </section>
                    <div class=" usuarios__modal-inhabilitar-usuario-info-item usuarios__modal-inhabilitar-usuario-btns-container dialog-container-bts">
                        <button class="usuarios__modal-inhabilitar-usuario-btn-cancelar dialog-btn boton">Cancelar</button>
                        <button class="usuarios__modal-inhabilitar-usuario-btn-confirmar dialog-btn boton">Confirmar</button>
                    </div>
                </div>
            </dialog>

            <dialog class="usuarios__modal-inhabilitacion-exitosa dialog-process-result">
                <h2>¡Excelente!</h2>
                <p>Has inhabilitado un usuario exitosamente</p>
                <button class="usuarios__modal-inhabilitacion-exitosa-btn dialog-process-result__btn boton" >Ok</button>
            </dialog>
            
            <dialog class="usuarios__modal-inhabilitacion-fallo dialog-process-result">
                <h2>¡Algo sali&oacute; mal!</h2>
                <p>Este usuario no pudo ser inhabilitado, porque posiblemente hay registros de este en otras partes del sistema</p>
                <button class="usuarios__modal-inhabilitacion-fallo-btn dialog-process-result__btn boton" >Ok</button>
            </dialog>

            <!-- Este es el modal para ver los usuarios inhabilitados -->

            <dialog class="usuarios__modal-usuarios-inhabilitados">
                <span class="usuarios__modal-usuarios-inhabilitados-btn-cerrar dialog-btn-cerrar">X</span>
                <h2 class="usuarios__modal-usuarios-inhabilitados-title dialog-title">Usuarios Inhabilitados</h2>
                <div class="usuarios__modal-usuarios-inhabilitados-container-gen-repo filtro-gen-repo">
                    <div class="usuarios__modal-usuarios-inhabilitados-gen-repo-container-img dialog-objects-enabled-gen-repo-img">
                        <img src="<?php echo(URL_RAIZ); ?>public/imagenes/reportes-icono.png" alt="">
                    </div>
                    <div class="usuarios__modal-usuarios-inhabilitados-gen-repo-container-text">
                        <a 
                        target="_BLANK"
                        class="filtro-subtitulo-reporte" 
                        href="<?php echo(URL_RAIZ); ?>usuarios/generarReporteInhabilitados"
                        >
                        Generar Reporte
                    </a>
                    </div>
                </div>
                <section class="usuarios__modal-usuarios-inhabilitados-table-container container-table">
                    <table class="usuarios-inhabilitados__table table">
                        <thead class="table-thead">
                            <tr class="table-tr">
                                <td class="table-td">Documento</td>
                                <td class="table-td">Nombre/s</td>
                                <td class="table-td">Apellido/s</td>
                                <td class="table-td">Correo</td>
                                <td class="table-td">Tel&eacute;fono</td>
                                <td class="table-td">Direcci&oacute;n</td>
                                <td class="table-td">EPS</td>
                                <td class="table-td">RH</td>
                                <td class="table-td">Rol</td>
                                <td class="table-td">Fecha/hora Inhabilitacion</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($this->data['infoEmpleadosInhabilitados'] as $key => $value): ?>
                                <tr>
                                    <td><?php echo $value["EmpDocIdentidad"] ?></td>
                                    <td><?php echo $value["EmpNombre"] ?></td>
                                    <td><?php echo $value["EmpApellido"] ?></td>
                                    <td><?php echo $value["EmpEps"] ?></td>
                                    <td><?php echo $value["EmpTelefono"] ?></td>
                                    <td><?php echo $value["EmpCorreo"] ?></td>
                                    <td><?php echo $value["EmpDireccion"] ?></td>
                                    <td><?php echo $value["EmpRH"] ?></td>
                                    <td><?php echo $value["EmpRol"] ?></td>
                                    <td><?php echo $value["EmpFechaInhabilitacion"] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </section>
            </dialog>
        </section>
    </main>

    <script> 
        /* Se puso var porque queremos que pueda usarse en todos los contextos, 
        independientemente de si esta en una funcion anonima autoejecutable */
        var URL_RAIZ = "<?php echo URL_RAIZ ?>"
    </script>
    <script src="<?php echo(URL_RAIZ); ?>public/js/modulo_usuarios_agregar_usuario.js" type="module"></script>
    <script src="<?php echo(URL_RAIZ); ?>public/js/modulo_usuarios_editar_usuario.js" type="module"></script>
    <script src="<?php echo(URL_RAIZ); ?>public/js/modulo_usuarios_inhabilitar_usuarios.js" type="module"></script>
    <script src="<?php echo(URL_RAIZ); ?>public/js/modulo_usuarios_buscar_por_atributos.js" type="module"></script>
    <script src="<?php echo(URL_RAIZ); ?>public/js/modulo_usuarios_usuarios_inhabilitados.js"></script>
    <script src="<?php echo(URL_RAIZ); ?>public/js/cualquier_modulo_pintar_borde_derecho_input.js" ></script>
</body>
</html>