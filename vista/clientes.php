<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo(URL_RAIZ); ?>public/css/clientes.css">
    <link rel="shortcut icon" href="<?php echo(URL_FAVICON); ?>" type="image/x-icon">
    <title>Clientes</title>
</head>
<body>
    <?php
        require_once("nav.php");
    ?>

<main class="clientes grid-container-main">
        <section class="clientes__container-title container-title box-shadow">
            <h1 class="clientes__titulo">Gestiona Tus Clientes</h1>
        </section>


        <section class="clientes__container-filter container-filter box-shadow">
            <div class="clientes__filtro filtro">
                <h2 class="clientes__filtro-titulo filtro-title">Filtros de B&uacute;squeda</h2>
                <form 
                id="clientes__filtro-form" 
                class="clientes__filtro-form filtro-form"
                action="<?php echo URL_RAIZ ?>clientes/generarReporte"
                method="POST"
                target="_BLANK"
                >
                    <section class="clientes__filtro-input-container">
                        <label class="clientes__filtro-input-label filtro-label" for="cliente-id">Por el documento de identidad</label>
                        <input 
                        name="documento"
                        type="text" 
                        class="clientes__filtro-cliente-id" 
                        id="cliente-id" 
                        placeholder="Documento"
                        autocomplete="off"
                        data-input
                        >
                    </section>
                    <section class="clientes__filtro-input-container">
                        <label class="clientes__filtro-input-label filtro-label" for="cliente-nombre">Por su nombre</label>
                        <input 
                        name="nombre"
                        type="text" 
                        class="clientes__filtro-cliente-nombre" 
                        id="cliente-nombre" 
                        placeholder="Nombre"
                        autocomplete="off"
                        data-input
                        >
                    </section>
                        <section class="clientes__filtro-input-container">
                        <label class="clientes__filtro-input-label filtro-label" for="cliente-ciudad">Por su apellido</label>
                        <input 
                        name="apellido"
                        type="text" 
                        class="clientes__filtro-cliente-nombre" 
                        id="cliente-ciudad" 
                        placeholder="Apellido"
                        autocomplete="off"
                        data-input
                        >
                    </section>
                </form>
                <div class="clientes__filtro-gen-repo filtro-gen-repo">
                    <div class="clientes__filtro-gen-repo-img filtro-gen-repo-img">
                        <img src="<?php echo(URL_RAIZ); ?>public/imagenes/informe.png" alt="">
                    </div>
                    <input 
                    class="clientes__filtro-subtitulo-reporte filtro-subtitulo-reporte" 
                    type="submit" 
                    value="Generar Reporte" 
                    form="clientes__filtro-form"
                    >
                </div>
            </div>
        </section>


        <section class="clientes__container-table contenedor-objetos  box-shadow">
            <div class="clientes__lista-title contenedor-objetos__title">
                <h2>Clientes Registrados</h2>
            </div>
            <div class="clientes__lista-contenido contenedor-objetos__contenido box-shadow">
                <?php foreach($this->data['infoClientes'] as $key => $value):?>

                    <figure class="clientes__lista-cliente contenedor-objetos__objeto box-shadow">
                        <div class="clientes__lista-cliente-img contenedor-objetos__objeto-img">
                            <img src="<?php echo(URL_RAIZ); ?>public/imagenes/cliente-icono.png" alt="">
                        </div>
                        <div class="clientes__lista-cliente-info-container">
                            <section class="clientes__lista-cliente-info documento">
                                <h4 class="clientes__lista-cliente-info-title">DOCUMENTO DE IDENTIDAD</h4>
                                <p class="clientes__lista-cliente-data"><?php echo $value["CliDocIdentidad"]; ?></p>
                            </section>
                            <section class="clientes__lista-cliente-info telefono">
                                <h4 class="clientes__lista-cliente-info-title">TEL&Eacute;FONO</h4>
                                <p class="clientes__lista-cliente-data"><?php echo $value["CliTelefono"]; ?></p>
                            </section>
                            <section class="clientes__lista-cliente-info nombres">
                                <h4 class="clientes__lista-cliente-info-title">NOMBRE/S</h4>
                                <p class="clientes__lista-cliente-data"><?php echo $value["CliNombre"]; ?></p>
                            </section>
                            <section class="clientes__lista-cliente-info apellidos">
                                <h4 class="clientes__lista-cliente-info-title">APELLIDO/S</h4>
                                <p class="clientes__lista-cliente-data"><?php echo $value["CliApellido"]; ?></p>
                            </section>
                            <section class="clientes__lista-cliente-info correo">
                                <h4 class="clientes__lista-cliente-info-title">CORREO</h4>
                                <p class="clientes__lista-cliente-data"><?php echo $value["CliCorreo"]; ?></p>
                            </section>
                            <section class="clientes__lista-cliente-info direccion">
                                <h4 class="clientes__lista-cliente-info-title">DIRECCI&Oacute;N</h4>
                                <p class="clientes__lista-cliente-data"><?php echo $value["CliDireccion"]; ?></p>
                            </section>
                        </div>
                        <div class="clientes__lista-cliente-botones contenedor-objetos__objeto-botones">
                            <button 
                            class="clientes__lista-cliente-boton clientes__lista-cliente-boton-editar boton"
                            data-doc-cliente="<?php echo $value["CliDocIdentidad"]; ?>"
                            >
                                <div class="clientes__lista-cliente-boton-img">
                                    <img src="<?php echo(URL_RAIZ); ?>public/imagenes/editar-icono.png" alt="">
                                </div>
                                <span>Editar</span>
                            </button>
                            <button 
                            class="clientes__lista-cliente-boton clientes__lista-cliente-boton-inhabilitar boton"
                            data-doc-cliente="<?php echo $value["CliDocIdentidad"]; ?>"
                            >
                                <div class="clientes__lista-cliente-boton-img">
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

                <template class="clientes__lista-cliente-template">
                    <figure class="clientes__lista-cliente contenedor-objetos__objeto box-shadow">
                        <div class="clientes__lista-cliente-img contenedor-objetos__objeto-img">
                            <img src="<?php echo(URL_RAIZ); ?>public/imagenes/cliente-icono.png" alt="">
                        </div>
                        <div class="clientes__lista-cliente-info-container">
                            <section class="clientes__lista-cliente-info documento">
                                <h4 class="clientes__lista-cliente-info-title">DOCUMENTO DE IDENTIDAD</h4>
                                <p class="clientes__lista-cliente-data"></p>
                            </section>
                            <section class="clientes__lista-cliente-info telefono">
                                <h4 class="clientes__lista-cliente-info-title">TEL&Eacute;FONO</h4>
                                <p class="clientes__lista-cliente-data"></p>
                            </section>
                            <section class="clientes__lista-cliente-info nombres">
                                <h4 class="clientes__lista-cliente-info-title">NOMBRE/S</h4>
                                <p class="clientes__lista-cliente-data"></p>
                            </section>
                            <section class="clientes__lista-cliente-info apellidos">
                                <h4 class="clientes__lista-cliente-info-title">APELLIDO/S</h4>
                                <p class="clientes__lista-cliente-data"></p>
                            </section>
                            <section class="clientes__lista-cliente-info correo">
                                <h4 class="clientes__lista-cliente-info-title">CORREO</h4>
                                <p class="clientes__lista-cliente-data"></p>
                            </section>
                            <section class="clientes__lista-cliente-info direccion">
                                <h4 class="clientes__lista-cliente-info-title">DIRECCI&Oacute;N</h4>
                                <p class="clientes__lista-cliente-data"></p>
                            </section>
                        </div>
                        <div class="clientes__lista-cliente-botones contenedor-objetos__objeto-botones">
                            <button 
                            class="clientes__lista-cliente-boton clientes__lista-cliente-boton-editar boton"
                            data-doc-cliente=""
                            >
                                <div class="clientes__lista-cliente-boton-img">
                                    <img src="<?php echo(URL_RAIZ); ?>public/imagenes/editar-icono.png" alt="">
                                </div>
                                <span>Editar</span>
                            </button>
                            <button 
                            class="clientes__lista-cliente-boton clientes__lista-cliente-boton-inhabilitar boton"
                            data-doc-cliente=""
                            >
                                <div class="clientes__lista-cliente-boton-img">
                                    <img src="<?php echo(URL_RAIZ); ?>public/imagenes/delete-icono.png" alt="">
                                </div>
                                <span>Inhabilitar</span>
                            </button>
                        </div>
                    </figure>
                </template>
            </div>
        </section>


        <section class="clientes__container-botones container-botones box-shadow">
            <section class="clientes__container-boton">
                <button class="clientes__boton-agregar boton">
                    A&ntilde;adir
                </button>
            </section>
            <section class="clientes__container-boton">
                <button class="clientes__boton-inhabilitar boton">
                    Ver clientes inhabilitados
                </button>
            </section>
        </section>


        <section class="clientes__container-modal transparent-container-modal">
            
            <!-- Estos son los modals para agregar un cliente -->
            <dialog class="clientes__modal-agregar-cliente">
                <h2 class="clientes__modal-agregar-cliente-title dialog-title">Registra Nuevos Clientes</h2>
                <form 
                class="clientes__modal-agregar-cliente-form dialog-main-content"
                >
                    <section class="dialog-main-content__input-container">
                        <label class="dialog-main-content__label">Documento del Cliente</label>
                        <input 
                        name="documento"
                        type="text"
                        maxlength="15"
                        id="docCliente"
                        title = "Debe tener una maxima longitud de 15 caracteres"
                        autocomplete="off"
                        tabindex="1"
                        data-input
                        data-CliDocIdentidad
                        >
                    </section>

                    <section class="dialog-main-content__input-container">
                        <label class="dialog-main-content__label">Correo Electr&oacute;nico del Cliente</label>
                        <input
                        name="correo" 
                        type="text"
                        title="Ingresa el correo electronico del cliente: ejemplo@gmail.com"
                        autocomplete="off"
                        tabindex="4"
                        data-input
                        data-CliCorreo
                        >
                    </section>
                    
                    <section class="dialog-main-content__input-container">
                        <label class="dialog-main-content__label">Nombre/s del Cliente</label>
                        <input
                        name="nombre" 
                        type="text"
                        title="Ingresa el nombre del cliente"
                        autocomplete="off"
                        tabindex="2"
                        data-input
                        data-CliNombre
                        >
                    </section>
                    
                    <section class="dialog-main-content__input-container">
                        <label class="dialog-main-content__label">Direcci&oacute;n del Cliente</label>
                        <input
                        name="direccion" 
                        type="text"
                        title="Ingresa la direccion del cliente"
                        autocomplete="off"
                        tabindex="5"
                        data-input
                        data-CliDireccion
                        >
                    </section>
                    
                    <section class="dialog-main-content__input-container">
                        <label class="dialog-main-content__label">Apellido/s del Cliente</label>
                        <input
                        name="apellido" 
                        type="text"
                        title="Ingresa el apellido del cliente"
                        autocomplete="off"
                        tabindex="3"
                        data-input
                        data-CliApellido
                        >
                    </section>
                    
                    <section class="dialog-main-content__input-container">
                        <label class="dialog-main-content__label">Tel&eacute;fono del Cliente</label>
                        <input
                        name="telefono"
                        type="text"
                        title="Ingresa el numero telefonico del cliente"
                        autocomplete="off"
                        tabindex="6"
                        data-input
                        data-CliTelefono
                        >
                    </section>
                    
                </form>
                <div class="clientes__modal-agregar-cliente-btns-container dialog-container-bts">
                    <button class="clientes__modal-agregar-cliente-btn-cancelar boton dialog-btn">Cancelar</button>
                    <button class="clientes__modal-agregar-cliente-btn-a??adir boton dialog-btn">A&ntilde;adir</button>
                </div>
            </dialog>

            <dialog class="clientes__modal-agregar-cliente-confirmacion">
                <h2 class="clientes__modal-agregar-cliente-title-confirmacion dialog-title">Verifica los Datos</h2>
                <p class="clientes__modal-agregar-cliente-text-confirmacion dialog-text">
                    ??Est&aacute;s seguro de registrar este cliente?<br>
                    Recuerda revisar detenidamente la informaci&oacute;n del cliente que estas registrando.
                </p>
                <div class="clientes__modal-agregar-cliente-info-confirmacion dialog-main-content">
                    <section class="clientes__modal-agregar-cliente-info-item-confirmacion" data-CliDocIdentidad>
                        <h3 class="dialog-main-content__label">Documento del Cliente</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="clientes__modal-agregar-cliente-info-item-confirmacion" data-CliCorreo>
                        <h3 class="dialog-main-content__label">Correo Electr&oacute;nico del Cliente</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="clientes__modal-agregar-cliente-info-item-confirmacion" data-CliNombre>
                        <h3 class="dialog-main-content__label">Nombre/s del Cliente</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="clientes__modal-agregar-cliente-info-item-confirmacion" data-CliDireccion>
                        <h3 class="dialog-main-content__label">Direcci&oacute;n del Cliente</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="clientes__modal-agregar-cliente-info-item-confirmacion" data-CliApellido>
                        <h3 class="dialog-main-content__label">Apellido/s del Cliente</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="clientes__modal-agregar-cliente-info-item-confirmacion" data-CliTelefono>
                        <h3 class="dialog-main-content__label">Tel&eacute;fono del Cliente</h3>
                        <p>________________________________________________</p>
                    </section>
                </div>
                <div class="clientes__modal-agregar-cliente-confirmacion-btns-container dialog-container-bts">
                    <button class="clientes__modal-agregar-cliente-confirmacion-btn-cancelar dialog-btn boton">Volver Atras</button>
                    <button class="clientes__modal-agregar-cliente-confirmacion-btn-confirmar dialog-btn boton">Confirmar</button>
                </div>
            </dialog>

            <dialog class="clientes__modal-agregacion-exitosa dialog-process-result">
                <h2>??Excelente!</h2>
                <p>Has registrado un nuevo cliente exitosamente</p>
                <button class="clientes__modal-agregacion-exitosa-btn dialog-process-result__btn boton" >Ok</button>
            </dialog>
            
            <dialog class="clientes__modal-agregacion-fallo dialog-process-result">
                <h2>??Algo sali&oacute; mal!</h2>
                <p>Este cliente no pudo ser registrado, porque posiblemente ya esta registrado en el sistema</p>
                <button class="clientes__modal-agregacion-fallo-btn dialog-process-result__btn boton" >Ok</button>
            </dialog>

            <!-- Este es el modal para ver los clientes inhabilitados -->

            <dialog class="clientes__modal-clientes-inhabilitados">
                <span class="clientes__modal-clientes-inhabilitados-btn-cerrar dialog-btn-cerrar">X</span>
                <h2 class="clientes__modal-clientes-inhabilitados-title dialog-title">Clientes Inhabilitados</h2>
                <div class="clientes__modal-clientes-inhabilitados-container-gen-repo filtro-gen-repo">
                    <div class="clientes__modal-clientes-inhabilitados-gen-repo-container-img dialog-objects-enabled-gen-repo-img">
                        <img src="<?php echo(URL_RAIZ); ?>public/imagenes/reportes-icono.png" alt="">
                    </div>
                    <div class="clientes__modal-clientes-inhabilitados-gen-repo-container-text">
                        <a 
                        target="_BLANK"
                        class="filtro-subtitulo-reporte" 
                        href="<?php echo(URL_RAIZ); ?>clientes/generarReporteInhabilitados"
                        >
                        Generar Reporte
                        </a>
                    </div>
                </div>
                <section class="clientes__modal-clientes-inhabilitados-table-container container-table">
                    <table class="clientes-inhabilitados__table table">
                        <thead class="table-thead">
                            <tr class="table-tr">
                            <td class="table-td">Documento</td>
                                <td class="table-td">Nombre/s</td>
                                <td class="table-td">Apellido/s</td>
                                <td class="table-td">Correo</td>
                                <td class="table-td">Tel&eacute;fono</td>
                                <td class="table-td">Direcci&oacute;n</td>
                                <td class="table-td">Fecha/hora Inhabilitacion</td>
                            </tr>
                        </thead>
                            <tbody>
                            <?php foreach($this->data["infoClientesInhabilitados"] as $key => $value): ?>
                                <tr>
                                    <td><?php echo $value["CliDocIdentidad"]; ?></td>
                                    <td><?php echo $value["CliNombre"]; ?></td>
                                    <td><?php echo $value["CliApellido"]; ?></td>
                                    <td><?php echo $value["CliCorreo"]; ?></td>
                                    <td><?php echo $value["CliTelefono"]; ?></td>
                                    <td><?php echo $value["CliDireccion"]; ?></td>
                                    <td><?php echo $value["CliFechaInhabilitacion"]; ?></td>
                                </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </section>
            </dialog>

            <!-- Estos son los modals para editar un cliente -->
            <dialog class="clientes__modal-editar-cliente">
                <h2 class="clientes__modal-editar-cliente-title dialog-title">Edita Tus Clientes</h2>
                <form 
                class="clientes__modal-editar-cliente-form dialog-main-content"
                >
                    <section class="dialog-main-content__input-container">
                        <label class="dialog-main-content__label">Documento del Cliente</label>
                        <input 
                        name="documento"
                        type="text"
                        maxlength="15"
                        id="docCliente"
                        title = "Debe tener una maxima longitud de 15 caracteres"
                        autocomplete="off"
                        tabindex="1"
                        data-input
                        data-CliDocIdentidad
                        >
                    </section>

                    <section class="dialog-main-content__input-container">
                        <label class="dialog-main-content__label">Correo Electr&oacute;nico del Cliente</label>
                        <input
                        name="correo" 
                        type="text"
                        title="Ingresa el correo electronico del cliente: ejemplo@gmail.com"
                        autocomplete="off"
                        tabindex="4"
                        data-input
                        data-CliCorreo
                        >
                    </section>
                    
                    <section class="dialog-main-content__input-container">
                        <label class="dialog-main-content__label">Nombre/s del Cliente</label>
                        <input
                        name="nombre" 
                        type="text"
                        title="Ingresa el nombre del cliente"
                        autocomplete="off"
                        tabindex="2"
                        data-input
                        data-CliNombre
                        >
                    </section>
                    
                    <section class="dialog-main-content__input-container">
                        <label class="dialog-main-content__label">Direcci&oacute;n del Cliente</label>
                        <input
                        name="direccion" 
                        type="text"
                        title="Ingresa la direccion del cliente"
                        autocomplete="off"
                        tabindex="5"
                        data-input
                        data-CliDireccion
                        >
                    </section>
                    
                    <section class="dialog-main-content__input-container">
                        <label class="dialog-main-content__label">Apellido/s del Cliente</label>
                        <input
                        name="apellido" 
                        type="text"
                        title="Ingresa el apellido del cliente"
                        autocomplete="off"
                        tabindex="3"
                        data-input
                        data-CliApellido
                        >
                    </section>
                    
                    <section class="dialog-main-content__input-container">
                        <label class="dialog-main-content__label">Tel&eacute;fono del Cliente</label>
                        <input
                        name="telefono"
                        type="text"
                        title="Ingresa el numero telefonico del cliente"
                        autocomplete="off"
                        tabindex="6"
                        data-input
                        data-CliTelefono
                        >
                    </section>
                </form>
                <div class="clientes__modal-editar-cliente-btns-container dialog-container-bts">
                    <button class="clientes__modal-editar-cliente-btn-cancelar boton dialog-btn">Cancelar</button>
                    <button class="clientes__modal-editar-cliente-btn-editar boton dialog-btn">Editar</button>
                </div>
            </dialog>

            <dialog class="clientes__modal-editar-cliente-confirmacion">
                <h2 class="clientes__modal-editar-cliente-title-confirmacion dialog-title">Verifica los Datos</h2>
                <p class="clientes__modal-editar-cliente-text-confirmacion dialog-text">
                    ??Est&aacute;s seguro de modificar este cliente?<br>
                    Recuerda revisar detenidamente la informaci&oacute;n del cliente que estas modificando.
                </p>
                <div class="clientes__modal-editar-cliente-info-confirmacion dialog-main-content">
                    <section class="clientes__modal-editar-cliente-info-item-confirmacion" data-CliDocIdentidad>
                        <h3 class="dialog-main-content__label">Documento del Cliente</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="clientes__modal-editar-cliente-info-item-confirmacion" data-CliCorreo>
                        <h3 class="dialog-main-content__label">Correo Electr&oacute;nico del Cliente</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="clientes__modal-editar-cliente-info-item-confirmacion" data-CliNombre>
                        <h3 class="dialog-main-content__label">Nombre/s del Cliente</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="clientes__modal-editar-cliente-info-item-confirmacion" data-CliDireccion>
                        <h3 class="dialog-main-content__label">Direcci&oacute;n del Cliente</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="clientes__modal-editar-cliente-info-item-confirmacion" data-CliApellido>
                        <h3 class="dialog-main-content__label">Apellido/s del Cliente</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="clientes__modal-editar-cliente-info-item-confirmacion" data-CliTelefono>
                        <h3 class="dialog-main-content__label">Tel&eacute;fono del Cliente</h3>
                        <p>________________________________________________</p>
                    </section>
                </div>
                <div class="clientes__modal-editar-cliente-confirmacion-btns-container dialog-container-bts">
                    <button class="clientes__modal-editar-cliente-confirmacion-btn-cancelar dialog-btn boton">Volver Atras</button>
                    <button class="clientes__modal-editar-cliente-confirmacion-btn-confirmar dialog-btn boton">Confirmar</button>
                </div>
            </dialog>

            <dialog class="clientes__modal-modificacion-exitosa dialog-process-result">
                <h2>??Excelente!</h2>
                <p>Has modificado un cliente exitosamente</p>
                <button class="clientes__modal-modificacion-exitosa-btn dialog-process-result__btn boton" >Ok</button>
            </dialog>
            
            <dialog class="clientes__modal-modificacion-fallo dialog-process-result">
                <h2>??Algo sali&oacute; mal!</h2>
                <p>Este cliente no pudo ser modificado, porque posiblemente hubo un problema interno</p>
                <button class="clientes__modal-modificacion-fallo-btn dialog-process-result__btn boton" >Ok</button>
            </dialog>


            <!-- Estos son los modals para inhabilitar un cliente -->

            <dialog class="clientes__modal-inhabilitar-cliente">
                <h2 class="clientes__modal-inhabilitar-cliente-title dialog-title">??Ten cuidado!</h2>
                <p class="clientes__modal-inhabilitar-cliente-text dialog-text">
                    ??Est&oacute;s seguro de inhabilitar este cliente?<br>
                    Recuerda que una vez inhabilitado, no lo podras volver a habilitar.
                </p>
                <div class="clientes__modal-inhabilitar-cliente-info dialog-main-content">
                    <section class="clientes__modal-inhabilitar-cliente-info-item-confirmacion" data-CliDocIdentidad>
                        <h3 class="dialog-main-content__label">Documento del Cliente</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="clientes__modal-inhabilitar-cliente-info-item-confirmacion" data-CliCorreo>
                        <h3 class="dialog-main-content__label">Correo Electr&oacute;nico del Cliente</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="clientes__modal-inhabilitar-cliente-info-item-confirmacion" data-CliNombre>
                        <h3 class="dialog-main-content__label">Nombre/s del Cliente</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="clientes__modal-inhabilitar-cliente-info-item-confirmacion" data-CliDireccion>
                        <h3 class="dialog-main-content__label">Direcci&oacute;n del Cliente</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="clientes__modal-inhabilitar-cliente-info-item-confirmacion" data-CliApellido>
                        <h3 class="dialog-main-content__label">Apellido/s del Cliente</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="clientes__modal-inhabilitar-cliente-info-item-confirmacion" data-CliTelefono>
                        <h3 class="dialog-main-content__label">Tel&eacute;fono del Cliente</h3>
                        <p>________________________________________________</p>
                    </section>
                </div>
                <div class="clientes__modal-inhabilitar-cliente-btns-container dialog-container-bts">
                    <button class="clientes__modal-inhabilitar-cliente-btn-cancelar dialog-btn boton">Cancelar</button>
                    <button class="clientes__modal-inhabilitar-cliente-btn-confirmar dialog-btn boton">Confirmar</button>
                </div>
            </dialog>

            <dialog class="clientes__modal-inhabilitacion-exitosa dialog-process-result">
                <h2>??Excelente!</h2>
                <p>Has inhabilitado un cliente exitosamente</p>
                <button class="clientes__modal-inhabilitacion-exitosa-btn dialog-process-result__btn boton" >Ok</button>
            </dialog>
            
            <dialog class="clientes__modal-inhabilitacion-fallo dialog-process-result">
                <h2>??Algo sali&oacute; mal!</h2>
                <p>Este cliente no pudo ser inhabilitado, porque posiblemente hay registros de este en otras partes del sistema</p>
                <button class="clientes__modal-inhabilitacion-fallo-btn dialog-process-result__btn boton" >Ok</button>
            </dialog>
        </section>
    </main>
    <figure class="manual-usuario-figure">
        <div class="manual-usuario-figure__container">
            <a class="manual-usuario-figure__link" href="<?php echo URL_RAIZ ?>manualUsuario" title="Manual de Usuario" target="BLANK">?</a>

        </div>
    </figure>
    <script> 
        /* Se puso var porque queremos que pueda usarse en todos los contextos, 
        independientemente de si esta en una funcion anonima autoejecutable */
        var URL_RAIZ = "<?php echo URL_RAIZ ?>"
    </script>
    <script src="<?php echo(URL_RAIZ); ?>public/js/modulo_clientes_agregar_cliente.js" type="module"></script>
    <script src="<?php echo(URL_RAIZ); ?>public/js/modulo_clientes_clientes_inhabilitados.js"></script>
    <script src="<?php echo(URL_RAIZ); ?>public/js/modulo_clientes_editar_cliente.js" type="module"></script>
    <script src="<?php echo(URL_RAIZ); ?>public/js/modulo_clientes_inhabilitar_clientes.js" type="module"></script>
    <script src="<?php echo(URL_RAIZ); ?>public/js/modulo_clientes_buscar_por_atributos.js" type="module"></script>
    <script src="<?php echo(URL_RAIZ); ?>public/js/cualquier_modulo_pintar_borde_derecho_input.js" ></script>
</body>
</html>