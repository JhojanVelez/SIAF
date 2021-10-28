<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>usuarios</title>
    <link rel="stylesheet" href="<?php echo(URL_RAIZ); ?>public/css/usuarios.css">
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
                <h2 class="usuarios__filtro-titulo filtro-title">Filtros de busqueda</h2>
                <form class="usuarios__filtro-form filtro-form" action="">
                    <section class="usuarios__filtro-input-container">
                        <label class="usuarios__filtro-input-label filtro-label" for="usuario-id">Por el documento de identidad</label>
                        <input type="text" class="usuarios__filtro-usuario-id" id="usuario-id" placeholder="Documento">
                    </section>
                    <section class="usuarios__filtro-input-container">
                        <label class="usuarios__filtro-input-label filtro-label" for="usuario-nombre">Por su nombre</label>
                        <input type="text" class="usuarios__filtro-usuario-nombre" id="usuario-nombre" placeholder="Nombre">
                    </section>
                    <section class="usuarios__filtro-input-container">
                        <label class="usuarios__filtro-input-label filtro-label" for="usuario-ciudad">Por su apellido</label>
                        <input type="text" class="usuarios__filtro-usuario-nombre" id="usuario-ciudad" placeholder="Apellido">
                    </section>
                </form>
                <div class="usuarios__filtro-gen-repo filtro-gen-repo">
                    <div class="usuarios__filtro-gen-repo-img filtro-gen-repo-img">
                        <img src="<?php echo(URL_RAIZ); ?>public/imagenes/informe.svg" alt="">
                    </div>
                    <a class="usuarios__filtro-subtitulo-reporte filtro-subtitulo-reporte" href="">Generar reporte</a>
                </div>
            </div>
        </section>


        <section class="usuarios__container-table contenedor-objetos  box-shadow">
            <div class="usuarios__lista-title contenedor-objetos__title">
                <h2>Usuarios Registrados</h2>
            </div>
            <div class="usuarios__lista-contenido contenedor-objetos__contenido box-shadow">
                <figure class="usuarios__lista-usuario contenedor-objetos__objeto box-shadow">
                    <div class="usuarios__lista-usuario-img contenedor-objetos__objeto-img">
                        <img src="https://cdn.forbes.com.mx/2019/04/blackrrock-invertir-1-640x360.jpg" alt="">
                    </div>
                    <div class="usuarios__lista-usuario-info-container">
                        <section class="usuarios__lista-usuario-info documento">
                            <h4 class="usuarios__lista-usuario-info-title">DOCUMENTO DE IDENTIDAD</h4>
                            <p class="usuarios__lista-usuario-data">____________________________________</p>
                        </section>
                        <section class="usuarios__lista-usuario-info nombres">
                            <h4 class="usuarios__lista-usuario-info-title">NOMBRES</h4>
                            <p class="usuarios__lista-usuario-data">____________________________________</p>
                        </section>
                        <section class="usuarios__lista-usuario-info apellidos">
                            <h4 class="usuarios__lista-usuario-info-title">APELLIDOS</h4>
                            <p class="usuarios__lista-usuario-data">____________________________________</p>
                        </section>
                        <section class="usuarios__lista-usuario-info eps">
                            <h4 class="usuarios__lista-usuario-info-title">EPS</h4>
                            <p class="usuarios__lista-usuario-data">____________________________________</p>
                        </section>
                        <section class="usuarios__lista-usuario-info telefono">
                            <h4 class="usuarios__lista-usuario-info-title">TELEFONO</h4>
                            <p class="usuarios__lista-usuario-data">____________________________________</p>
                        </section>
                        <section class="usuarios__lista-usuario-info correo">
                            <h4 class="usuarios__lista-usuario-info-title">CORREO</h4>
                            <p class="usuarios__lista-usuario-data">____________________________________</p>
                        </section>
                        <section class="usuarios__lista-usuario-info direccion">
                            <h4 class="usuarios__lista-usuario-info-title">DIRECCION</h4>
                            <p class="usuarios__lista-usuario-data">____________________________________</p>
                        </section>
                        <section class="usuarios__lista-usuario-info rh">
                            <h4 class="usuarios__lista-usuario-info-title">RH</h4>
                            <p class="usuarios__lista-usuario-data">____________________________________</p>
                        </section>
                        <section class="usuarios__lista-usuario-info rol">
                            <h4 class="usuarios__lista-usuario-info-title">ROL</h4>
                            <p class="usuarios__lista-usuario-data">____________________________________</p>
                        </section>
                        <section class="usuarios__lista-usuario-info password">
                            <h4 class="usuarios__lista-usuario-info-title">CONTRASE&Ntilde;A</h4>
                            <p class="usuarios__lista-usuario-data">____________________________________</p>
                        </section>
                    </div>
                    <div class="usuarios__lista-usuario-botones contenedor-objetos__objeto-botones">
                        <button class="usuarios__lista-usuario-boton usuarios__lista-usuario-boton-editar contenedor-objetos__objeto-boton boton">
                            <div class="usuarios__lista-usuario-boton-img">
                                <img src="<?php echo(URL_RAIZ); ?>public/imagenes/editar-icono.svg" alt="">
                            </div>
                            <span>Editar</span>
                        </button>
                        <button class="usuarios__lista-usuario-boton usuarios__lista-usuario-boton-inhabilitar contenedor-objetos__objeto-boton boton">
                            <div class="usuarios__lista-usuario-boton-img">
                                <img src="<?php echo(URL_RAIZ); ?>public/imagenes/delete-icono.svg" alt="">
                            </div>
                            <span>Inhabilitar</span>
                        </button>
                    </div>
                </figure>
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
                    <input class="usuarios__modal-agregar-usuario-form-item" type="text" placeholder="Documento de identidad">
                    <input class="usuarios__modal-agregar-usuario-form-item" type="text" placeholder="Correo">
                    <input class="usuarios__modal-agregar-usuario-form-item" type="text" placeholder="Nombres">
                    <input class="usuarios__modal-agregar-usuario-form-item" type="text" placeholder="Direcci&oacute;n">
                    <input class="usuarios__modal-agregar-usuario-form-item" type="text" placeholder="Apellidos">
                    <input class="usuarios__modal-agregar-usuario-form-item" type="text" placeholder="Telefono">
                    <input class="usuarios__modal-agregar-usuario-form-item" type="text" placeholder="EPS">
                    <input class="usuarios__modal-agregar-usuario-form-item" type="text" placeholder="RH">
                    <div class="usuarios__modal-agregar-usuario-form-item">
                        <div class="usuarios-modal-agregar-usuario-form-img-container">
                            <img class="usuarios-modal-agregar-usuario-form-img-container__img" src="https://cdn.forbes.com.mx/2019/04/blackrrock-invertir-1-640x360.jpg" alt="">
                            <input class="usuarios-modal-agregar-usuario-form-img-container__file" type="file" title="Foto">
                        </div>
                    </div>
                    <input class="usuarios__modal-agregar-usuario-form-item" type="text" placeholder="Contraseña">
                    <select class="usuarios__modal-agregar-usuario-form-item">
                        <option value="">Rol</option>
                        <option value="">Gerente</option>
                        <option value="">Almacenista</option>
                        <option value="">Farmaceuta</option>
                    </select>
                    <div class="usuarios__modal-agregar-usuario-form-item" class="usuarios__modal-agregar-usuario-btns-container dialog-container-bts">
                        <button class="usuarios__modal-agregar-usuario-btn-cancelar boton dialog-btn">Cancelar</button>
                        <button class="usuarios__modal-agregar-usuario-btn-añadir boton dialog-btn">A&ntilde;adir</button>
                    </div>
                </form>
            </dialog>

            <dialog class="usuarios__modal-agregar-usuario-confirmacion">
                <h2 class="usuarios__modal-agregar-usuario-title-confirmacion dialog-title">Verifica los Datos</h2>
                <p class="usuarios__modal-agregar-usuario-text-confirmacion dialog-text">
                    ¿Estas seguro de registrar este usuario?<br>
                    Recuerda revisar detenidamente la informacion del usuario que estas registrando.
                </p>
                <div class="usuarios__modal-agregar-usuario-info-confirmacion dialog-main-content">
                    <section class="usuarios__modal-agregar-usuario-info-item-confirmacion">
                        <h3>DOCUMENTO DE IDENTIDAD</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="usuarios__modal-agregar-usuario-info-item-confirmacion">
                        <h3>CORREO</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="usuarios__modal-agregar-usuario-info-item-confirmacion">
                        <h3>NOMBRES</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="usuarios__modal-agregar-usuario-info-item-confirmacion">
                        <h3>DIRECCI&Oacute;N</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="usuarios__modal-agregar-usuario-info-item-confirmacion">
                        <h3>APELLIDOS</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="usuarios__modal-agregar-usuario-info-item-confirmacion">
                        <h3>TELEFONO</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="usuarios__modal-agregar-usuario-info-item-confirmacion">
                        <h3>EPS</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="usuarios__modal-agregar-usuario-info-item-confirmacion">
                        <h3>RH</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="usuarios__modal-agregar-usuario-info-item-confirmacion">
                        <h3>CONTRASE&Ntilde;A</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="usuarios__modal-agregar-usuario-info-item-confirmacion">
                        <h3>ROL</h3>
                        <p>________________________________________________</p>
                    </section>
                </div>
                <div class="usuarios__modal-agregar-usuario-confirmacion-btns-container dialog-container-bts">
                    <button class="usuarios__modal-agregar-usuario-confirmacion-btn-cancelar dialog-btn boton">Volver Atras</button>
                    <button class="usuarios__modal-agregar-usuario-confirmacion-btn-confirmar dialog-btn boton">Confirmar</button>
                </div>
            </dialog>

            <dialog class="usuarios__modal-agregacion-exitosa dialog-process-result">
                <h2>¡Exelente!</h2>
                <p>Has registrado un nuevo usuario exitosamente</p>
                <button class="usuarios__modal-agregacion-exitosa-btn dialog-process-result__btn boton" >Ok</button>
            </dialog>
            
            <dialog class="usuarios__modal-agregacion-fallo dialog-process-result">
                <h2>¡Algo salio mal!</h2>
                <p>Este usuario no pudo ser registrado, porque posiblemente ya esta registrado en el sistema</p>
                <button class="usuarios__modal-agregacion-fallo-btn dialog-process-result__btn boton" >Ok</button>
            </dialog>

            <!-- Estos son los modals para editar un usuario -->
            <dialog class="usuarios__modal-editar-usuario">
                <h2 class="usuarios__modal-editar-usuario-title dialog-title">Edita Tus Usuarios</h2>
                <form class="usuarios__modal-editar-usuario-form dialog-main-content">
                    <input class="usuarios__modal-editar-usuario-form-item" type="text" placeholder="Documento de identidad">
                    <input class="usuarios__modal-editar-usuario-form-item" type="text" placeholder="Correo">
                    <input class="usuarios__modal-editar-usuario-form-item" type="text" placeholder="Nombres">
                    <input class="usuarios__modal-editar-usuario-form-item" type="text" placeholder="Direcci&oacute;n">
                    <input class="usuarios__modal-editar-usuario-form-item" type="text" placeholder="Apellidos">
                    <input class="usuarios__modal-editar-usuario-form-item" type="text" placeholder="Telefono">
                    <input class="usuarios__modal-editar-usuario-form-item" type="text" placeholder="EPS">
                    <input class="usuarios__modal-editar-usuario-form-item" type="text" placeholder="RH">
                    <div class="usuarios__modal-editar-usuario-form-item">
                        <div class="usuarios-modal-editar-usuario-form-img-container">
                            <img class="usuarios-modal-editar-usuario-form-img-container__img" src="https://cdn.forbes.com.mx/2019/04/blackrrock-invertir-1-640x360.jpg" alt="">
                            <input class="usuarios-modal-editar-usuario-form-img-container__file" type="file" title="Foto">
                        </div>
                    </div>
                    <input class="usuarios__modal-editar-usuario-form-item" type="text" placeholder="Contraseña">
                    <select class="usuarios__modal-editar-usuario-form-item">
                        <option value="">Rol</option>
                        <option value="">Gerente</option>
                        <option value="">Almacenista</option>
                        <option value="">Farmaceuta</option>
                    </select>
                    <div class="usuarios__modal-editar-usuario-form-item" class="usuarios__modal-editar-usuario-btns-container dialog-container-bts">
                        <button class="usuarios__modal-editar-usuario-btn-cancelar boton dialog-btn">Cancelar</button>
                        <button class="usuarios__modal-editar-usuario-btn-editar boton dialog-btn">Editar</button>
                    </div>
                </form>
            </dialog>

            <dialog class="usuarios__modal-editar-usuario-confirmacion">
                <h2 class="usuarios__modal-editar-usuario-title-confirmacion dialog-title">Verifica los Datos</h2>
                <p class="usuarios__modal-editar-usuario-text-confirmacion dialog-text">
                    ¿Estas seguro de modificar este usuario?<br>
                    Recuerda revisar detenidamente la informacion del usuario que estas modificando.
                </p>
                <div class="usuarios__modal-editar-usuario-info-confirmacion dialog-main-content">
                    <section class="usuarios__modal-editar-usuario-info-item-confirmacion">
                        <h3>DOCUMENTO DE IDENTIDAD</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="usuarios__modal-editar-usuario-info-item-confirmacion">
                        <h3>CORREO</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="usuarios__modal-editar-usuario-info-item-confirmacion">
                        <h3>NOMBRES</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="usuarios__modal-editar-usuario-info-item-confirmacion">
                        <h3>DIRECCI&Oacute;N</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="usuarios__modal-editar-usuario-info-item-confirmacion">
                        <h3>APELLIDOS</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="usuarios__modal-editar-usuario-info-item-confirmacion">
                        <h3>TELEFONO</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="usuarios__modal-editar-usuario-info-item-confirmacion">
                        <h3>EPS</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="usuarios__modal-editar-usuario-info-item-confirmacion">
                        <h3>RH</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="usuarios__modal-editar-usuario-info-item-confirmacion">
                        <h3>CONTRASE&Ntilde;A</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="usuarios__modal-editar-usuario-info-item-confirmacion">
                        <h3>ROL</h3>
                        <p>________________________________________________</p>
                    </section>
                </div>
                <div class="usuarios__modal-editar-usuario-confirmacion-btns-container dialog-container-bts">
                    <button class="usuarios__modal-editar-usuario-confirmacion-btn-cancelar dialog-btn boton">Volver Atras</button>
                    <button class="usuarios__modal-editar-usuario-confirmacion-btn-confirmar dialog-btn boton">Confirmar</button>
                </div>
            </dialog>

            <dialog class="usuarios__modal-modificacion-exitosa dialog-process-result">
                <h2>¡Exelente!</h2>
                <p>Has modificado un usuario exitosamente</p>
                <button class="usuarios__modal-modificacion-exitosa-btn dialog-process-result__btn boton" >Ok</button>
            </dialog>
            
            <dialog class="usuarios__modal-modificacion-fallo dialog-process-result">
                <h2>¡Algo salio mal!</h2>
                <p>Este usuario no pudo ser modificado, porque posiblemente hubo un error interno</p>
                <button class="usuarios__modal-modificacion-fallo-btn dialog-process-result__btn boton" >Ok</button>
            </dialog>

            <!-- Estos son los modals para inhabilitar un usuario -->

            <dialog class="usuarios__modal-inhabilitar-usuario">
                <h2 class="usuarios__modal-inhabilitar-usuario-title dialog-title">¡Ten cuidado!</h2>
                <p class="usuarios__modal-inhabilitar-usuario-text dialog-text">
                    ¿Estas seguro de inhabilitar este usuario?<br>
                    Recuerda que una vez inhabilitado, no lo podras volver a habilitar.
                </p>
                <div class="usuarios__modal-inhabilitar-usuario-info dialog-main-content">
                    <section class="usuarios__modal-editar-usuario-info-item-confirmacion">
                        <h3>DOCUMENTO DE IDENTIDAD</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="usuarios__modal-editar-usuario-info-item-confirmacion">
                        <h3>CORREO</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="usuarios__modal-editar-usuario-info-item-confirmacion">
                        <h3>NOMBRES</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="usuarios__modal-editar-usuario-info-item-confirmacion">
                        <h3>DIRECCI&Oacute;N</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="usuarios__modal-editar-usuario-info-item-confirmacion">
                        <h3>APELLIDOS</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="usuarios__modal-editar-usuario-info-item-confirmacion">
                        <h3>TELEFONO</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="usuarios__modal-editar-usuario-info-item-confirmacion">
                        <h3>EPS</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="usuarios__modal-editar-usuario-info-item-confirmacion">
                        <h3>RH</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="usuarios__modal-editar-usuario-info-item-confirmacion">
                        <h3>CONTRASE&Ntilde;A</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="usuarios__modal-editar-usuario-info-item-confirmacion">
                        <h3>ROL</h3>
                        <p>________________________________________________</p>
                    </section>
                </div>
                <div class="usuarios__modal-inhabilitar-usuario-btns-container dialog-container-bts">
                    <button class="usuarios__modal-inhabilitar-usuario-btn-cancelar dialog-btn boton">Cancelar</button>
                    <button class="usuarios__modal-inhabilitar-usuario-btn-confirmar dialog-btn boton">Confirmar</button>
                </div>
            </dialog>

            <dialog class="usuarios__modal-inhabilitacion-exitosa dialog-process-result">
                <h2>¡Exelente!</h2>
                <p>Has inhabilitado un usuario exitosamente</p>
                <button class="usuarios__modal-inhabilitacion-exitosa-btn dialog-process-result__btn boton" >Ok</button>
            </dialog>
            
            <dialog class="usuarios__modal-inhabilitacion-fallo dialog-process-result">
                <h2>¡Algo salio mal!</h2>
                <p>Este usuario no pudo ser inhabilitado, porque posiblemente hay registros de este en otras partes del sistema</p>
                <button class="usuarios__modal-inhabilitacion-fallo-btn dialog-process-result__btn boton" >Ok</button>
            </dialog>

            <!-- Este es el modal para ver los usuarios inhabilitados -->

            <dialog class="usuarios__modal-usuarios-inhabilitados">
                <span class="usuarios__modal-usuarios-inhabilitados-btn-cerrar dialog-btn-cerrar">X</span>
                <h2 class="usuarios__modal-usuarios-inhabilitados-title dialog-title">Usuarios Inhabilitados</h2>
                <div class="usuarios__modal-usuarios-inhabilitados-container-gen-repo filtro-gen-repo">
                    <div class="usuarios__modal-usuarios-inhabilitados-gen-repo-container-img dialog-objects-enabled-gen-repo-img">
                        <img src="<?php echo(URL_RAIZ); ?>public/imagenes/reportes-icono.svg" alt="">
                    </div>
                    <div class="usuarios__modal-usuarios-inhabilitados-gen-repo-container-text">
                        <a class="filtro-subtitulo-reporte" href="">Generar Reporte</a>
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
                                <td class="table-td">Telefono</td>
                                <td class="table-td">Direccion</td>
                                <td class="table-td">EPS</td>
                                <td class="table-td">RH</td>
                                <td class="table-td">Rol</td>
                                <td class="table-td">Contrase&ntilde;a</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>item 1</td>
                                <td>item 2</td>
                                <td>item 3</td>
                                <td>item 4</td>
                                <td>item 5</td>
                                <td>item 6</td>
                                <td>item 7</td>
                                <td>item 8</td>
                                <td>item 9</td>
                                <td>item 10</td>
                            </tr>
                            <tr>
                                <td>item 1</td>
                                <td>item 2</td>
                                <td>item 3</td>
                                <td>item 4</td>
                                <td>item 5</td>
                                <td>item 6</td>
                                <td>item 7</td>
                                <td>item 8</td>
                                <td>item 9</td>
                                <td>item 10</td>
                            </tr>
                            <tr>
                                <td>item 1</td>
                                <td>item 2</td>
                                <td>item 3</td>
                                <td>item 4</td>
                                <td>item 5</td>
                                <td>item 6</td>
                                <td>item 7</td>
                                <td>item 8</td>
                                <td>item 9</td>
                                <td>item 10</td>
                            </tr>
                            <tr>
                                <td>item 1</td>
                                <td>item 2</td>
                                <td>item 3</td>
                                <td>item 4</td>
                                <td>item 5</td>
                                <td>item 6</td>
                                <td>item 7</td>
                                <td>item 8</td>
                                <td>item 9</td>
                                <td>item 10</td>
                            </tr>
                            <tr>
                                <td>item 1</td>
                                <td>item 2</td>
                                <td>item 3</td>
                                <td>item 4</td>
                                <td>item 5</td>
                                <td>item 6</td>
                                <td>item 7</td>
                                <td>item 8</td>
                                <td>item 9</td>
                                <td>item 10</td>
                            </tr>
                            <tr>
                                <td>item 1</td>
                                <td>item 2</td>
                                <td>item 3</td>
                                <td>item 4</td>
                                <td>item 5</td>
                                <td>item 6</td>
                                <td>item 7</td>
                                <td>item 8</td>
                                <td>item 9</td>
                                <td>item 10</td>
                            </tr>
                            <tr>
                                <td>item 1</td>
                                <td>item 2</td>
                                <td>item 3</td>
                                <td>item 4</td>
                                <td>item 5</td>
                                <td>item 6</td>
                                <td>item 7</td>
                                <td>item 8</td>
                                <td>item 9</td>
                                <td>item 10</td>
                            </tr>
                            <tr>
                                <td>item 1</td>
                                <td>item 2</td>
                                <td>item 3</td>
                                <td>item 4</td>
                                <td>item 5</td>
                                <td>item 6</td>
                                <td>item 7</td>
                                <td>item 8</td>
                                <td>item 9</td>
                                <td>item 10</td>
                            </tr>
                            <tr>
                                <td>item 1</td>
                                <td>item 2</td>
                                <td>item 3</td>
                                <td>item 4</td>
                                <td>item 5</td>
                                <td>item 6</td>
                                <td>item 7</td>
                                <td>item 8</td>
                                <td>item 9</td>
                                <td>item 10</td>
                            </tr>
                            <tr>
                                <td>item 1</td>
                                <td>item 2</td>
                                <td>item 3</td>
                                <td>item 4</td>
                                <td>item 5</td>
                                <td>item 6</td>
                                <td>item 7</td>
                                <td>item 8</td>
                                <td>item 9</td>
                                <td>item 10</td>
                            </tr>
                            <tr>
                                <td>item 1</td>
                                <td>item 2</td>
                                <td>item 3</td>
                                <td>item 4</td>
                                <td>item 5</td>
                                <td>item 6</td>
                                <td>item 7</td>
                                <td>item 8</td>
                                <td>item 9</td>
                                <td>item 10</td>
                            </tr>
                            <tr>
                                <td>item 1</td>
                                <td>item 2</td>
                                <td>item 3</td>
                                <td>item 4</td>
                                <td>item 5</td>
                                <td>item 6</td>
                                <td>item 7</td>
                                <td>item 8</td>
                                <td>item 9</td>
                                <td>item 10</td>
                            </tr>
                            <tr>
                                <td>item 1</td>
                                <td>item 2</td>
                                <td>item 3</td>
                                <td>item 4</td>
                                <td>item 5</td>
                                <td>item 6</td>
                                <td>item 7</td>
                                <td>item 8</td>
                                <td>item 9</td>
                                <td>item 10</td>
                            </tr>
                            <tr>
                                <td>item 1</td>
                                <td>item 2</td>
                                <td>item 3</td>
                                <td>item 4</td>
                                <td>item 5</td>
                                <td>item 6</td>
                                <td>item 7</td>
                                <td>item 8</td>
                                <td>item 9</td>
                                <td>item 10</td>
                            </tr>
                            <tr>
                                <td>item 1</td>
                                <td>item 2</td>
                                <td>item 3</td>
                                <td>item 4</td>
                                <td>item 5</td>
                                <td>item 6</td>
                                <td>item 7</td>
                                <td>item 8</td>
                                <td>item 9</td>
                                <td>item 10</td>
                            </tr>
                            <tr>
                                <td>item 1</td>
                                <td>item 2</td>
                                <td>item 3</td>
                                <td>item 4</td>
                                <td>item 5</td>
                                <td>item 6</td>
                                <td>item 7</td>
                                <td>item 8</td>
                                <td>item 9</td>
                                <td>item 10</td>
                            </tr>
                            <tr>
                                <td>item 1</td>
                                <td>item 2</td>
                                <td>item 3</td>
                                <td>item 4</td>
                                <td>item 5</td>
                                <td>item 6</td>
                                <td>item 7</td>
                                <td>item 8</td>
                                <td>item 9</td>
                                <td>item 10</td>
                            </tr>
                            <tr>
                                <td>item 1</td>
                                <td>item 2</td>
                                <td>item 3</td>
                                <td>item 4</td>
                                <td>item 5</td>
                                <td>item 6</td>
                                <td>item 7</td>
                                <td>item 8</td>
                                <td>item 9</td>
                                <td>item 10</td>
                            </tr>
                        </tbody>
                    </table>
                </section>
            </dialog>
        </section>
    </main>

    <script src="<?php echo(URL_RAIZ); ?>public/js/modulo_usuarios_agregar_usuario.js"></script>
    <script src="<?php echo(URL_RAIZ); ?>public/js/modulo_usuarios_editar_usuario.js"></script>
    <script src="<?php echo(URL_RAIZ); ?>public/js/modulo_usuarios_inhabilitar_usuarios.js"></script>
    <script src="<?php echo(URL_RAIZ); ?>public/js/modulo_usuarios_usuarios_inhabilitados.js"></script>
</body>
</html>