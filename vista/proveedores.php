<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo(URL_RAIZ); ?>public/css/proveedores.css">
    <link rel="shortcut icon" href="<?php echo(URL_FAVICON); ?>" type="image/x-icon">
    <title>Proveedores</title>
</head>
<body>
    <?php
        require_once("nav.php");
    ?>

<main class="proveedores grid-container-main">
        <section class="proveedores__container-title container-title box-shadow">
            <h1 class="proveedores__titulo">Gestiona Tus Proveedores</h1>
        </section>


        <section class="proveedores__container-filter container-filter box-shadow">
            <div class="proveedores__filtro filtro">
                <h2 class="proveedores__filtro-titulo filtro-title">Filtros de B&uacute;squeda</h2>
                <form 
                id="proveedores__filtro-form" 
                class="proveedores__filtro-form filtro-form"
                action="<?php echo URL_RAIZ ?>proveedores/generarReporte" 
                method="POST" 
                target="_BLANK"
                >
                    <section class="proveedores__filtro-input-container">
                        <label class="proveedores__filtro-input-label filtro-label" for="proveedor-id">Por el NIT</label>
                        <input 
                        name="nit"
                        type="text" 
                        class="proveedores__filtro-proveedor-id" 
                        id="proveedor-id" 
                        placeholder="NIT"
                        autocomplete="off"
                        data-input
                        >
                    </section>
                    <section class="proveedores__filtro-input-container">
                        <label class="proveedores__filtro-input-label filtro-label" for="proveedor-nombre">Por su nombre</label>
                        <input 
                        name="nombre"
                        type="text" 
                        class="proveedores__filtro-proveedor-nombre" 
                        id="proveedor-nombre" 
                        placeholder="Nombre"
                        autocomplete="off"
                        data-input
                        >
                    </section>
                        <section class="proveedores__filtro-input-container">
                        <label class="proveedores__filtro-input-label filtro-label" for="proveedor-ciudad">Por ciudad</label>
                        <input 
                        name="ciudad"
                        type="text" 
                        class="proveedores__filtro-proveedor-nombre" 
                        id="proveedor-ciudad" 
                        placeholder="Ciudad"
                        autocomplete="off"
                        data-input
                        >
                    </section>
                </form>
                <div class="proveedores__filtro-gen-repo filtro-gen-repo">
                    <div class="proveedores__filtro-gen-repo-img filtro-gen-repo-img">
                        <img src="<?php echo(URL_RAIZ); ?>public/imagenes/informe.png" alt="">
                    </div>
                    <input 
                    class="proveedores__filtro-subtitulo-reporte filtro-subtitulo-reporte" 
                    type="submit" 
                    value="Generar Reporte" 
                    form="proveedores__filtro-form"
                    >
                </div>
            </div>
        </section>


        <section class="proveedores__container-table contenedor-objetos  box-shadow">
            <div class="proveedores__lista-title contenedor-objetos__title">
                <h2>Proveedores Registrados</h2>
            </div>
            <div class="proveedores__lista-contenido contenedor-objetos__contenido box-shadow">
                <?php foreach($this->data["infoProveedores"] as $key => $value): ?>
                <figure class="proveedores__lista-proveedor contenedor-objetos__objeto box-shadow">
                    <div class="proveedores__lista-proveedor-img contenedor-objetos__objeto-img">
                        <img src="<?php echo(URL_RAIZ); ?>public/imagenes/proveedor-icono.png" alt="">
                    </div>
                    <div class="proveedores__lista-proveedor-info-container">
                        <section class="proveedores__lista-proveedor-info nit">
                            <h4 class="proveedores__lista-proveedor-info-title">NIT</h4>
                            <p class="proveedores__lista-proveedor-data"><?php echo $value["ProNIT"] ?></p>
                        </section>
                        <section class="proveedores__lista-proveedor-info nombre">
                            <h4 class="proveedores__lista-proveedor-info-title">NOMBRE</h4>
                            <p class="proveedores__lista-proveedor-data"><?php echo $value["ProNombre"] ?></p>
                        </section>
                        <section class="proveedores__lista-proveedor-info telefono">
                            <h4 class="proveedores__lista-proveedor-info-title">TEL&Eacute;FONO</h4>
                            <p class="proveedores__lista-proveedor-data"><?php echo $value["ProTelefono"] ?></p>
                        </section>
                        <section class="proveedores__lista-proveedor-info correo">
                            <h4 class="proveedores__lista-proveedor-info-title">CORREO</h4>
                            <p class="proveedores__lista-proveedor-data"><?php echo $value["ProCorreo"] ?></p>
                        </section>
                        <section class="proveedores__lista-proveedor-info direccion">
                            <h4 class="proveedores__lista-proveedor-info-title">DIRECCI&Oacute;N</h4>
                            <p class="proveedores__lista-proveedor-data"><?php echo $value["ProDireccion"] ?></p>
                        </section>
                        <section class="proveedores__lista-proveedor-info ciudad">
                            <h4 class="proveedores__lista-proveedor-info-title">CIUDAD</h4>
                            <p class="proveedores__lista-proveedor-data"><?php echo $value["ProCiudad"] ?></p>
                        </section>
                    </div>
                    <div class="proveedores__lista-proveedor-botones contenedor-objetos__objeto-botones">
                        <button 
                        class="proveedores__lista-proveedor-boton proveedores__lista-proveedor-boton-editar boton contenedor-objetos__objeto-boton"
                        data-nit-proveedor="<?php echo $value["ProNIT"]; ?>"
                        >
                            <div class="proveedores__lista-proveedor-boton-img">
                                <img src="<?php echo(URL_RAIZ); ?>public/imagenes/editar-icono.png" alt="">
                            </div>
                            <span>Editar</span>
                        </button>
                        <button 
                        class="proveedores__lista-proveedor-boton proveedores__lista-proveedor-boton-inhabilitar boton contenedor-objetos__objeto-boton"
                        data-nit-proveedor="<?php echo $value["ProNIT"]; ?>"
                        >
                            <div class="proveedores__lista-proveedor-boton-img">
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
                <template class="proveedores__lista-proveedor-template">
                    <figure class="proveedores__lista-proveedor contenedor-objetos__objeto box-shadow">
                        <div class="proveedores__lista-proveedor-img contenedor-objetos__objeto-img">
                            <img src="<?php echo(URL_RAIZ); ?>public/imagenes/proveedor-icono.png" alt="">
                        </div>
                        <div class="proveedores__lista-proveedor-info-container">
                            <section class="proveedores__lista-proveedor-info nit">
                                <h4 class="proveedores__lista-proveedor-info-title">NIT</h4>
                                <p class="proveedores__lista-proveedor-data"></p>
                            </section>
                            <section class="proveedores__lista-proveedor-info nombre">
                                <h4 class="proveedores__lista-proveedor-info-title">NOMBRE</h4>
                                <p class="proveedores__lista-proveedor-data"></p>
                            </section>
                            <section class="proveedores__lista-proveedor-info telefono">
                                <h4 class="proveedores__lista-proveedor-info-title">TEL&Eacute;FONO</h4>
                                <p class="proveedores__lista-proveedor-data"></p>
                            </section>
                            <section class="proveedores__lista-proveedor-info correo">
                                <h4 class="proveedores__lista-proveedor-info-title">CORREO</h4>
                                <p class="proveedores__lista-proveedor-data"></p>
                            </section>
                            <section class="proveedores__lista-proveedor-info direccion">
                                <h4 class="proveedores__lista-proveedor-info-title">DIRECCI&Oacute;N</h4>
                                <p class="proveedores__lista-proveedor-data"></p>
                            </section>
                            <section class="proveedores__lista-proveedor-info ciudad">
                                <h4 class="proveedores__lista-proveedor-info-title">CIUDAD</h4>
                                <p class="proveedores__lista-proveedor-data"></p>
                            </section>
                        </div>
                        <div class="proveedores__lista-proveedor-botones contenedor-objetos__objeto-botones">
                            <button 
                            class="proveedores__lista-proveedor-boton proveedores__lista-proveedor-boton-editar boton contenedor-objetos__objeto-boton"
                            data-nit-proveedor=""
                            >
                                <div class="proveedores__lista-proveedor-boton-img">
                                    <img src="<?php echo(URL_RAIZ); ?>public/imagenes/editar-icono.png" alt="">
                                </div>
                                <span>Editar</span>
                            </button>
                            <button 
                            class="proveedores__lista-proveedor-boton proveedores__lista-proveedor-boton-inhabilitar boton contenedor-objetos__objeto-boton"
                            data-nit-proveedor=""
                            >
                                <div class="proveedores__lista-proveedor-boton-img">
                                    <img src="<?php echo(URL_RAIZ); ?>public/imagenes/delete-icono.png" alt="">
                                </div>
                                <span>Inhabilitar</span>
                            </button>
                        </div>
                    </figure>
                </template>
            </div>
        </section>


        <section class="proveedores__container-botones container-botones box-shadow">
            <section class="proveedores__container-boton contenedor-objetos__objeto-boton">
                <button class="proveedores__boton-agregar boton">
                    A&ntilde;adir
                </button>
            </section>
            <section class="proveedores__container-boton contenedor-objetos__objeto-boton">
                <button class="proveedores__boton-inhabilitar boton">
                    Ver proveedores inhabilitados
                </button>
            </section>
        </section>

        
        <section class="proveedores__container-modal transparent-container-modal">
            
            <!-- Estos son los modals para agregar un proveedor -->
            <dialog class="proveedores__modal-agregar-proveedor">
                <h2 class="proveedores__modal-agregar-proveedor-title dialog-title">Registra Nuevos Proveedores</h2>
                <form 
                class="proveedores__modal-agregar-proveedor-form dialog-main-content"
                >
                    <section class="dialog-main-content__input-container">
                        <label class="dialog-main-content__label">NIT del Proveedor</label>
                        <input 
                        name="nit"
                        type="text" 
                        maxlength="15"
                        id="nitProveedor" 
                        title = "Debe tener una maxima logitud de 15 caracteres"
                        autocomplete="off"
                        data-input 
                        data-ProNIT
                        >
                    </section>

                    <section class="dialog-main-content__input-container">
                        <label class="dialog-main-content__label">Nombre del Proveedor</label>
                        <input 
                        name="nombre"
                        type="text"
                        title="Nombre completo del proveedor"
                        autocomplete="off"
                        data-input 
                        data-ProNombre
                        >
                    </section>

                    <section class="dialog-main-content__input-container">
                        <label class="dialog-main-content__label">Tel&eacute;fono del Proveedor</label>
                        <input 
                        name="telefono"
                        type="tel"
                        title="Ingresa el numero telefonico/celular de contacto"
                        autocomplete="off"
                        data-input 
                        data-ProTelefono
                        >
                    </section>

                    <section class="dialog-main-content__input-container">
                        <label class="dialog-main-content__label">Direcci&oacute;n del Proveedor</label>
                        <input 
                        name="direccion"
                        type="text"
                        title="Ingresa la direccion del proveedor"
                        autocomplete="off"
                        data-input 
                        data-ProDireccion
                        >
                    </section>

                    <section class="dialog-main-content__input-container">
                        <label class="dialog-main-content__label">Correo Electr&oacute;nico del Proveedor</label>
                        <input 
                        name="correo"
                        type="email"
                        title= "Ingresa el correo electronico del proveedor: ejemplo@gmail.com"
                        autocomplete="off"
                        data-input 
                        data-ProCorreo
                        >
                    </section>

                    <section class="dialog-main-content__input-container">
                        <label class="dialog-main-content__label">Ciudad del Proveedor</label>
                        <select 
                        name="ciudad"
                        title= "Selecciona la ciudad del proveedor"
                        autocomplete="off"
                        data-input 
                        data-ProCiudad
                        >
                            <option value=""></option>
                            <option value="ARAUCA">ARAUCA</option>
                            <option value="ARMENIA">ARMENIA</option>
                            <option value="BARRANQUILLA">BARRANQUILLA</option>
                            <option value="BELLO">BELLO</option>
                            <option value="BOGOT&Aacute;">BOGOT&Aacute;</option>
                            <option value="BUCARAMANGA">BUCARAMANGA</option>
                            <option value="CALI">CALI</option>
                            <option value="CARTAGENA">CARTAGENA</option>
                            <option value="CUCUTA">CUCUTA</option>
                            <option value="FLORENCIA">FLORENCIA</option>
                            <option value="IBAGU&Eacute;">IBAGU&Eacute;</option>
                            <option value="MANIZALES">MANIZALES</option>
                            <option value="MEDELL&Iacute;N">MEDELL&Iacute;N</option>
                            <option value="MONTER&Iacute;A">MONTER&Iacute;A</option>
                            <option value="NEIVA">NEIVA</option>
                            <option value="PASTO">PASTO</option>
                            <option value="PEREIRA">PEREIRA</option>
                            <option value="POPAYAN">POPAYAN</option>
                            <option value="QUIBD&Oacute;">QUIBD&Oacute;</option>
                            <option value="RIOACHA">RIOACHA</option>
                            <option value="SAN ANDR&Eacute;S">SAN ANDR&Eacute;S</option>
                            <option value="SAN JOS&Eacute; DEL GUAVIARE">SAN JOS&Eacute; DEL GUAVIARE</option>
                            <option value="SANTA MARTA">SANTA MARTA</option>
                            <option value="SINCELEJO">SINCELEJO</option>
                            <option value="SOACHA">SOACHA</option>
                            <option value="SOLEDAD">SOLEDAD</option>
                            <option value="TUNJA">TUNJA</option>
                            <option value="VILLAVICENCIO">VILLAVICENCIO</option>
                            <option value="VALLEDUPAR">VALLEDUPAR</option>
                            <option value="YOPAL">YOPAL</option>
                            <option value="ZIPAQUIR&Aacute;">ZIPAQUIR&Aacute;</option>
                        </select>
                    </section>
                </form>
                <div class="proveedores__modal-agregar-proveedor-btns-container dialog-container-bts">
                    <button class="proveedores__modal-agregar-proveedor-btn-cancelar boton dialog-btn">Cancelar</button>
                    <button class="proveedores__modal-agregar-proveedor-btn-a??adir boton dialog-btn">A&ntilde;adir</button>
                </div>
            </dialog>

            <dialog class="proveedores__modal-agregar-proveedor-confirmacion">
                <h2 class="proveedores__modal-agregar-proveedor-title-confirmacion dialog-title">Verifica los Datos</h2>
                <p class="proveedores__modal-agregar-proveedor-text-confirmacion dialog-text">
                    ??Est&oacute;s seguro de registrar este proveedor?<br>
                    Recuerda revisar detenidamente la informaci&oacute;n del proveedor que estas registrando.
                </p>
                <div class="proveedores__modal-agregar-proveedor-info-confirmacion dialog-main-content">
                    <section class="proveedores__modal-agregar-proveedor-info-item-confirmacion" data-ProNIT>
                        <h3 class="dialog-main-content__label">NIT del Proveedor</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="proveedores__modal-agregar-proveedor-info-item-confirmacion" data-ProNombre>
                        <h3 class="dialog-main-content__label">Nombre del Proveedor</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="proveedores__modal-agregar-proveedor-info-item-confirmacion" data-ProTelefono>
                        <h3 class="dialog-main-content__label">Tel&eacute;fono del Proveedor</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="proveedores__modal-agregar-proveedor-info-item-confirmacion" data-ProDireccion>
                        <h3 class="dialog-main-content__label">Direcci&oacute;n del Proveedor</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="proveedores__modal-agregar-proveedor-info-item-confirmacion" data-ProCorreo>
                        <h3 class="dialog-main-content__label">Correo Electr&oacute;nico del Proveedor</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="proveedores__modal-agregar-proveedor-info-item-confirmacion" data-ProCiudad>
                        <h3 class="dialog-main-content__label">Ciudad del Proveedor</h3>
                        <p>________________________________________________</p>
                    </section>
                </div>
                <div class="proveedores__modal-agregar-proveedor-confirmacion-btns-container dialog-container-bts">
                    <button class="proveedores__modal-agregar-proveedor-confirmacion-btn-cancelar dialog-btn boton">Volver Atras</button>
                    <button class="proveedores__modal-agregar-proveedor-confirmacion-btn-confirmar dialog-btn boton">Confirmar</button>
                </div>
            </dialog>

            <dialog class="proveedores__modal-agregacion-exitosa dialog-process-result">
                <h2>??Excelente!</h2>
                <p>Has registrado un nuevo proveedor exitosamente</p>
                <button class="proveedores__modal-agregacion-exitosa-btn dialog-process-result__btn boton" >Ok</button>
            </dialog>
            
            <dialog class="proveedores__modal-agregacion-fallo dialog-process-result">
                <h2>??Algo sali&oacute; mal!</h2>
                <p>Este proveedor no pudo ser registrado, porque posiblemente ya esta registrado en el sistema</p>
                <button class="proveedores__modal-agregacion-fallo-btn dialog-process-result__btn boton" >Ok</button>
            </dialog>

            <!-- Este es el modal para ver los proveedores inhabilitados -->

            <dialog class="proveedores__modal-proveedores-inhabilitados">
                <span class="proveedores__modal-proveedores-inhabilitados-btn-cerrar dialog-btn-cerrar">X</span>
                <h2 class="proveedores__modal-proveedores-inhabilitados-title dialog-title">Proveedores Inhabilitados</h2>
                <div class="proveedores__modal-proveedores-inhabilitados-container-gen-repo filtro-gen-repo">
                    <div class="proveedores__modal-proveedores-inhabilitados-gen-repo-container-img dialog-objects-enabled-gen-repo-img">
                        <img src="<?php echo(URL_RAIZ); ?>public/imagenes/reportes-icono.png" alt="">
                    </div>
                    <div class="proveedores__modal-proveedores-inhabilitados-gen-repo-container-text">
                        <a 
                        target="_BLANK"
                        class="filtro-subtitulo-reporte" 
                        href="<?php echo(URL_RAIZ); ?>proveedores/generarReporteInhabilitados"
                        >
                        Generar Reporte
                        </a>
                    </div>
                </div>
                <section class="proveedores__modal-proveedores-inhabilitados-table-container container-table">
                    <table class="proveedores-inhabilitados__table table">
                        <thead class="table-thead">
                            <tr class="table-tr">
                                <td class="table-td">NIT</td>
                                <td class="table-td">Nombre</td>
                                <td class="table-td">Tel&eacute;fono</td>
                                <td class="table-td">Direcci&oacute;n</td>
                                <td class="table-td">Correo</td>
                                <td class="table-td">Ciudad</td>
                                <td class="table-td">Fecha/hora Inhabilitaci&oacute;n</td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($this->data["infoProveedoresInhabilitados"] as $key => $value): ?>
                            <tr>
                                <td><?php echo $value["ProNIT"] ?></td>
                                <td><?php echo $value["ProNombre"] ?></td>
                                <td><?php echo $value["ProCorreo"] ?></td>
                                <td><?php echo $value["ProTelefono"] ?></td>
                                <td><?php echo $value["ProDireccion"] ?></td>
                                <td><?php echo $value["ProCiudad"] ?></td>
                                <td><?php echo $value["ProFechaInhabilitacion"] ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </section>
            </dialog>

            <!-- Estos son los modals para editar un proveedor -->
            <dialog class="proveedores__modal-editar-proveedor">
                <h2 class="proveedores__modal-editar-proveedor-title dialog-title">Edita Tus Proveedores</h2>
                <form class="proveedores__modal-editar-proveedor-form dialog-main-content">
                    
                    <section class="dialog-main-content__input-container">
                        <label class="dialog-main-content__label">NIT del Proveedor</label>
                        <input 
                        name="nit"
                        type="text" 
                        maxlength="15"
                        id="nitProveedor" 
                        title = "Debe tener una maxima logitud de 15 caracteres"
                        autocomplete="off"
                        data-input 
                        data-ProNIT
                        >
                    </section>

                    <section class="dialog-main-content__input-container">
                        <label class="dialog-main-content__label">Nombre del Proveedor</label>
                        <input 
                        name="nombre"
                        type="text"
                        title="Nombre completo del proveedor"
                        autocomplete="off"
                        data-input 
                        data-ProNombre
                        >
                    </section>

                    <section class="dialog-main-content__input-container">
                        <label class="dialog-main-content__label">Tel&eacute;fono del Proveedor</label>
                        <input 
                        name="telefono"
                        type="tel"
                        title="Ingresa el numero telefonico/celular de contacto"
                        autocomplete="off"
                        data-input 
                        data-ProTelefono
                        >
                    </section>

                    <section class="dialog-main-content__input-container">
                        <label class="dialog-main-content__label">Direcci&oacute;n del Proveedor</label>
                        <input 
                        name="direccion"
                        type="text"
                        title="Ingresa la direccion del proveedor"
                        autocomplete="off"
                        data-input 
                        data-ProDireccion
                        >
                    </section>

                    <section class="dialog-main-content__input-container ">
                        <label class="dialog-main-content__label">Correo Electr&oacute;nico del Proveedor</label>
                        <input 
                        name="correo"
                        type="email"
                        title= "Ingresa el correo electronico del proveedor: ejemplo@gmail.com"
                        autocomplete="off"
                        data-input 
                        data-ProCorreo
                        >
                    </section>

                    <section class="dialog-main-content__input-container">
                        <label class="dialog-main-content__label">Ciudad del Proveedor</label>
                        <select 
                        name="ciudad"
                        title= "Selecciona la ciudad del proveedor"
                        autocomplete="off"
                        data-input 
                        data-ProCiudad
                        >
                            <option value=""></option>
                            <option value="ARAUCA">ARAUCA</option>
                            <option value="ARMENIA">ARMENIA</option>
                            <option value="BARRANQUILLA">BARRANQUILLA</option>
                            <option value="BELLO">BELLO</option>
                            <option value="BOGOT&Aacute;">BOGOT&Aacute;</option>
                            <option value="BUCARAMANGA">BUCARAMANGA</option>
                            <option value="CALI">CALI</option>
                            <option value="CARTAGENA">CARTAGENA</option>
                            <option value="CUCUTA">CUCUTA</option>
                            <option value="FLORENCIA">FLORENCIA</option>
                            <option value="IBAGU&Eacute;">IBAGU&Eacute;</option>
                            <option value="MANIZALES">MANIZALES</option>
                            <option value="MEDELL&Iacute;N">MEDELL&Iacute;N</option>
                            <option value="MONTER&Iacute;A">MONTER&Iacute;A</option>
                            <option value="NEIVA">NEIVA</option>
                            <option value="PASTO">PASTO</option>
                            <option value="PEREIRA">PEREIRA</option>
                            <option value="POPAYAN">POPAYAN</option>
                            <option value="QUIBD&Oacute;">QUIBD&Oacute;</option>
                            <option value="RIOACHA">RIOACHA</option>
                            <option value="SAN ANDR&Eacute;S">SAN ANDR&Eacute;S</option>
                            <option value="SAN JOS&Eacute; DEL GUAVIARE">SAN JOS&Eacute; DEL GUAVIARE</option>
                            <option value="SANTA MARTA">SANTA MARTA</option>
                            <option value="SINCELEJO">SINCELEJO</option>
                            <option value="SOACHA">SOACHA</option>
                            <option value="SOLEDAD">SOLEDAD</option>
                            <option value="TUNJA">TUNJA</option>
                            <option value="VILLAVICENCIO">VILLAVICENCIO</option>
                            <option value="VALLEDUPAR">VALLEDUPAR</option>
                            <option value="YOPAL">YOPAL</option>
                            <option value="ZIPAQUIR&Aacute;">ZIPAQUIR&Aacute;</option>
                        </select>
                    </section>
                </form>
                <div class="proveedores__modal-editar-proveedor-btns-container dialog-container-bts">
                    <button class="proveedores__modal-editar-proveedor-btn-cancelar boton dialog-btn">Cancelar</button>
                    <button class="proveedores__modal-editar-proveedor-btn-editar boton dialog-btn">Editar</button>
                </div>
            </dialog>

            <dialog class="proveedores__modal-editar-proveedor-confirmacion">
                <h2 class="proveedores__modal-editar-proveedor-title-confirmacion dialog-title">Verifica los Datos</h2>
                <p class="proveedores__modal-editar-proveedor-text-confirmacion dialog-text">
                    ??Est&aacute;s seguro de modificar este proveedor?<br>
                    Recuerda revisar detenidamente la informaci&oacute;n del proveedor que estas modificando.
                </p>
                <div class="proveedores__modal-editar-proveedor-info-confirmacion dialog-main-content">
                    <section class="proveedores__modal-editar-proveedor-info-item-confirmacion" data-ProNIT>
                        <h3 class="dialog-main-content__label">NIT del Proveedor</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="proveedores__modal-editar-proveedor-info-item-confirmacion" data-ProNombre>
                        <h3 class="dialog-main-content__label">Nombre del Proveedor</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="proveedores__modal-editar-proveedor-info-item-confirmacion" data-ProTelefono>
                        <h3 class="dialog-main-content__label">Tel&eacute;fono del Proveedor</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="proveedores__modal-editar-proveedor-info-item-confirmacion" data-ProDireccion>
                        <h3 class="dialog-main-content__label">Direcci&oacute;n del Proveedor</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="proveedores__modal-editar-proveedor-info-item-confirmacion" data-ProCorreo>
                        <h3 class="dialog-main-content__label">Correo Electr&oacute;nico del Proveedor</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="proveedores__modal-editar-proveedor-info-item-confirmacion" data-ProCiudad>
                        <h3 class="dialog-main-content__label">Ciudad del Proveedor</h3>
                        <p>________________________________________________</p>
                    </section>
                </div>
                <div class="proveedores__modal-editar-proveedor-confirmacion-btns-container dialog-container-bts">
                    <button class="proveedores__modal-editar-proveedor-confirmacion-btn-cancelar dialog-btn boton">Volver Atras</button>
                    <button class="proveedores__modal-editar-proveedor-confirmacion-btn-confirmar dialog-btn boton">Confirmar</button>
                </div>
            </dialog>

            <dialog class="proveedores__modal-modificacion-exitosa dialog-process-result">
                <h2>??Excelente!</h2>
                <p>Has modificado un proveedor exitosamente</p>
                <button class="proveedores__modal-modificacion-exitosa-btn dialog-process-result__btn boton" >Ok</button>
            </dialog>
            
            <dialog class="proveedores__modal-modificacion-fallo dialog-process-result">
                <h2>??Algo sali&oacute; mal!</h2>
                <p>Este proveedor no pudo ser modificado, porque posiblemente hubo un problema interno</p>
                <button class="proveedores__modal-modificacion-fallo-btn dialog-process-result__btn boton" >Ok</button>
            </dialog>


            <!-- Estos son los modals para inhabilitar un proveedor -->

            <dialog class="proveedores__modal-inhabilitar-proveedor">
                <h2 class="proveedores__modal-inhabilitar-proveedor-title dialog-title">??Ten cuidado!</h2>
                <p class="proveedores__modal-inhabilitar-proveedor-text dialog-text">
                    ??Est&aacute;s seguro de inhabilitar este proveedor?<br>
                    Recuerda que una vez inhabilitado, no lo podras volver a habilitar.
                </p>
                <div class="proveedores__modal-inhabilitar-proveedor-info dialog-main-content">
                    <section class="proveedores__modal-inhabilitar-proveedor-info-item" data-ProNIT>
                        <h3 class="dialog-main-content__label">NIT del Proveedor</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="proveedores__modal-inhabilitar-proveedor-info-item" data-ProNombre>
                        <h3 class="dialog-main-content__label">Nombre del Proveedor</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="proveedores__modal-inhabilitar-proveedor-info-item" data-ProTelefono>
                        <h3 class="dialog-main-content__label">Tel&eacute;fono del Proveedor</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="proveedores__modal-inhabilitar-proveedor-info-item" data-ProDireccion>
                        <h3 class="dialog-main-content__label">Direcci&oacute;n del Proveedor</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="proveedores__modal-inhabilitar-proveedor-info-item" data-ProCorreo>
                        <h3 class="dialog-main-content__label">Correo Electr&oacute;nico del Proveedor</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="proveedores__modal-inhabilitar-proveedor-info-item" data-ProCiudad>
                        <h3 class="dialog-main-content__label">Ciudad del Proveedor</h3>
                        <p>________________________________________________</p>
                    </section>
                </div>
                <div class="proveedores__modal-inhabilitar-proveedor-btns-container dialog-container-bts">
                    <button class="proveedores__modal-inhabilitar-proveedor-btn-cancelar dialog-btn boton">Cancelar</button>
                    <button class="proveedores__modal-inhabilitar-proveedor-btn-confirmar dialog-btn boton">Confirmar</button>
                </div>
            </dialog>

            <dialog class="proveedores__modal-inhabilitacion-exitosa dialog-process-result">
                <h2>??Excelente!</h2>
                <p>Has inhabilitado un proveedor exitosamente</p>
                <button class="proveedores__modal-inhabilitacion-exitosa-btn dialog-process-result__btn boton" >Ok</button>
            </dialog>
            
            <dialog class="proveedores__modal-inhabilitacion-fallo dialog-process-result">
                <h2>??Algo salio mal!</h2>
                <p>Este proveedor no pudo ser inhabilitado, porque posiblemente hay registros de este en otras partes del sistema</p>
                <button class="proveedores__modal-inhabilitacion-fallo-btn dialog-process-result__btn boton" >Ok</button>
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
    <script src="<?php echo(URL_RAIZ); ?>public/js/modulo_proveedores_agregar_proveedor.js" type="module"></script>
    <script src="<?php echo(URL_RAIZ); ?>public/js/modulo_proveedores_proveedores_inhabilitados.js"></script>
    <script src="<?php echo(URL_RAIZ); ?>public/js/modulo_proveedores_editar_proveedor.js" type="module"></script>
    <script src="<?php echo(URL_RAIZ); ?>public/js/modulo_proveedores_inhabilitar_proveedores.js" type="module"></script>
    <script src="<?php echo(URL_RAIZ); ?>public/js/modulo_proveedores_buscar_por_atributos.js" type="module"></script>
    <script src="<?php echo(URL_RAIZ); ?>public/js/cualquier_modulo_pintar_borde_derecho_input.js" ></script>
</body>
</html>