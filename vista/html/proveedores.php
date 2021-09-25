<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proveedores</title>
    <link rel="stylesheet" href="../css/proveedores.css">
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
                <h2 class="proveedores__filtro-titulo filtro-title">Filtros de busqueda</h2>
                <form class="proveedores__filtro-form filtro-form" action="">
                    <section class="proveedores__filtro-input-container">
                        <label class="proveedores__filtro-input-label filtro-label" for="proveedor-id">Por el NIT</label>
                        <input type="text" class="proveedores__filtro-proveedor-id" id="proveedor-id" placeholder="NIT">
                    </section>
                    <section class="proveedores__filtro-input-container">
                        <label class="proveedores__filtro-input-label filtro-label" for="proveedor-nombre">Por su nombre</label>
                        <input type="text" class="proveedores__filtro-proveedor-nombre" id="proveedor-nombre" placeholder="Nombre">
                    </section>
                        <section class="proveedores__filtro-input-container">
                        <label class="proveedores__filtro-input-label filtro-label" for="proveedor-ciudad">Por ciudad</label>
                        <input type="text" class="proveedores__filtro-proveedor-nombre" id="proveedor-ciudad" placeholder="Ciudad">
                    </section>
                </form>
                <div class="proveedores__filtro-gen-repo filtro-gen-repo">
                    <div class="proveedores__filtro-gen-repo-img filtro-gen-repo-img">
                        <img src="../imagenes/informe.svg" alt="">
                    </div>
                    <a class="proveedores__filtro-subtitulo-reporte filtro-subtitulo-reporte" href="">Generar reporte</a>
                </div>
            </div>
        </section>


        <section class="proveedores__container-table contenedor-objetos  box-shadow">
            <div class="proveedores__lista-title contenedor-objetos__title">
                <h2>Proveedores Registrados</h2>
            </div>
            <div class="proveedores__lista-contenido contenedor-objetos__contenido box-shadow">
                <figure class="proveedores__lista-proveedor contenedor-objetos__objeto box-shadow">
                    <div class="proveedores__lista-proveedor-img contenedor-objetos__objeto-img">
                        <img src="../imagenes/proveedor-icono.svg" alt="">
                    </div>
                    <div class="proveedores__lista-proveedor-info-container">
                        <section class="proveedores__lista-proveedor-info nit">
                            <h4 class="proveedores__lista-proveedor-info-title">NIT</h4>
                            <p class="proveedores__lista-proveedor-data">____________________________________</p>
                        </section>
                        <section class="proveedores__lista-proveedor-info nombre">
                            <h4 class="proveedores__lista-proveedor-info-title">NOMBRE</h4>
                            <p class="proveedores__lista-proveedor-data">____________________________________</p>
                        </section>
                        <section class="proveedores__lista-proveedor-info telefono">
                            <h4 class="proveedores__lista-proveedor-info-title">TELEFONO</h4>
                            <p class="proveedores__lista-proveedor-data">____________________________________</p>
                        </section>
                        <section class="proveedores__lista-proveedor-info correo">
                            <h4 class="proveedores__lista-proveedor-info-title">CORREO</h4>
                            <p class="proveedores__lista-proveedor-data">____________________________________</p>
                        </section>
                        <section class="proveedores__lista-proveedor-info direccion">
                            <h4 class="proveedores__lista-proveedor-info-title">DIRECCION</h4>
                            <p class="proveedores__lista-proveedor-data">____________________________________</p>
                        </section>
                        <section class="proveedores__lista-proveedor-info ciudad">
                            <h4 class="proveedores__lista-proveedor-info-title">CIUDAD</h4>
                            <p class="proveedores__lista-proveedor-data">____________________________________</p>
                        </section>
                    </div>
                    <div class="proveedores__lista-proveedor-botones contenedor-objetos__objeto-botones">
                        <button class="proveedores__lista-proveedor-boton boton contenedor-objetos__objeto-boton">
                            <div class="proveedores__lista-proveedor-boton-img">
                                <img src="../imagenes/editar-icono.svg" alt="">
                            </div>
                            <span>Editar</span>
                        </button>
                        <button class="proveedores__lista-proveedor-boton boton contenedor-objetos__objeto-boton">
                            <div class="proveedores__lista-proveedor-boton-img">
                                <img src="../imagenes/delete-icono.svg" alt="">
                            </div>
                            <span>Inhabilitar</span>
                        </button>
                    </div>
                </figure>
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
                <form class="proveedores__modal-agregar-proveedor-form dialog-main-content">
                    <input type="text" placeholder="Ingresa el NIT del proveedor">
                    <input type="text" placeholder="Ingresa el nombre del proveedor">
                    <input type="text" placeholder="Telefono">
                    <input type="text" placeholder="Direcci&oacute;n">
                    <input type="text" placeholder="Correo">
                    <input type="text" placeholder="Ciudad">
                </form>
                <div class="proveedores__modal-agregar-proveedor-btns-container dialog-container-bts">
                    <button class="proveedores__modal-agregar-proveedor-btn-añadir boton dialog-btn">A&ntilde;adir</button>
                    <button class="proveedores__modal-agregar-proveedor-btn-cancelar boton dialog-btn">Cancelar</button>
                </div>
            </dialog>

            <dialog class="proveedores__modal-agregar-proveedor-confirmacion">
                <h2 class="proveedores__modal-agregar-proveedor-title-confirmacion dialog-title">Verifica los Datos</h2>
                <p class="proveedores__modal-agregar-proveedor-text-confirmacion dialog-text">
                    ¿Estas seguro de registrar este proveedor?<br>
                    Recuerda revisar detenidamente la informacion del proveedor que estas registrando.
                </p>
                <div class="proveedores__modal-agregar-proveedor-info-confirmacion dialog-main-content">
                    <section class="proveedores__modal-agregar-proveedor-info-item-confirmacion">
                        <h3>NIT DEL PROVEEDOR</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="proveedores__modal-agregar-proveedor-info-item-confirmacion">
                        <h3>NOMBRE DEL PROVEEDOR</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="proveedores__modal-agregar-proveedor-info-item-confirmacion">
                        <h3>TELEFONO</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="proveedores__modal-agregar-proveedor-info-item-confirmacion">
                        <h3>DIRECCI&Oacute;N</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="proveedores__modal-agregar-proveedor-info-item-confirmacion">
                        <h3>CORREO</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="proveedores__modal-agregar-proveedor-info-item-confirmacion">
                        <h3>CIUDAD</h3>
                        <p>________________________________________________</p>
                    </section>
                </div>
                <div class="proveedores__modal-agregar-proveedor-confirmacion-btns-container dialog-container-bts">
                    <button class="proveedores__modal-agregar-proveedor-confirmacion-btn-confirmar dialog-btn boton">Confirmar</button>
                    <button class="proveedores__modal-agregar-proveedor-confirmacion-btn-cancelar dialog-btn boton">Cancelar</button>
                </div>
            </dialog>

            <dialog class="proveedores__modal-agregacion-exitosa dialog-process-result">
                <h2>¡Exelente!</h2>
                <p>Has registrado un nuevo proveedor exitosamente</p>
                <button class="proveedores__modal-agregacion-exitosa-btn dialog-process-result__btn boton" >Ok</button>
            </dialog>
            
            <dialog class="proveedores__modal-agregacion-fallo dialog-process-result">
                <h2>¡Algo salio mal!</h2>
                <p>Este proveedor no pudo ser registrado, porque posiblemente ya esta registrado en el sistema</p>
                <button class="proveedores__modal-agregacion-fallo-btn dialog-process-result__btn boton" >Ok</button>
            </dialog>

            <!-- Este es el modal para ver los proveedores inhabilitados -->

            <dialog class="proveedores__modal-proveedores-inhabilitados">
                <span class="proveedores__modal-proveedores-inhabilitados-btn-cerrar dialog-btn-cerrar">X</span>
                <h2 class="proveedores__modal-proveedores-inhabilitados-title dialog-title">Proveedores Inhabilitados</h2>
                <div class="proveedores__modal-proveedores-inhabilitados-container-gen-repo filtro-gen-repo">
                    <div class="proveedores__modal-proveedores-inhabilitados-gen-repo-container-img dialog-objects-enabled-gen-repo-img">
                        <img src="../imagenes/reportes-icono.svg" alt="">
                    </div>
                    <div class="proveedores__modal-proveedores-inhabilitados-gen-repo-container-text">
                        <a class="filtro-subtitulo-reporte" href="">Generar Reporte</a>
                    </div>
                </div>
                <section class="proveedores__modal-proveedores-inhabilitados-table-container container-table">
                    <table class="proveedores-inhabilitados__table table">
                        <thead class="table-thead">
                            <tr class="table-tr">
                                <td class="table-td">NIT</td>
                                <td class="table-td">Nombre</td>
                                <td class="table-td">Telefono</td>
                                <td class="table-td">Dirección</td>
                                <td class="table-td">Correo</td>
                                <td class="table-td">Ciudad</td>
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
                            </tr>
                            <tr>
                                <td>item 1</td>
                                <td>item 2</td>
                                <td>item 3</td>
                                <td>item 4</td>
                                <td>item 5</td>
                                <td>item 6</td>
                            </tr>
                            <tr>
                                <td>item 1</td>
                                <td>item 2</td>
                                <td>item 3</td>
                                <td>item 4</td>
                                <td>item 5</td>
                                <td>item 6</td>
                            </tr>
                            <tr>
                                <td>item 1</td>
                                <td>item 2</td>
                                <td>item 3</td>
                                <td>item 4</td>
                                <td>item 5</td>
                                <td>item 6</td>
                            </tr>
                            <tr>
                                <td>item 1</td>
                                <td>item 2</td>
                                <td>item 3</td>
                                <td>item 4</td>
                                <td>item 5</td>
                                <td>item 6</td>
                            </tr>
                            <tr>
                                <td>item 1</td>
                                <td>item 2</td>
                                <td>item 3</td>
                                <td>item 4</td>
                                <td>item 5</td>
                                <td>item 6</td>
                            </tr>
                            <tr>
                                <td>item 1</td>
                                <td>item 2</td>
                                <td>item 3</td>
                                <td>item 4</td>
                                <td>item 5</td>
                                <td>item 6</td>
                            </tr>
                            <tr>
                                <td>item 1</td>
                                <td>item 2</td>
                                <td>item 3</td>
                                <td>item 4</td>
                                <td>item 5</td>
                                <td>item 6</td>
                            </tr>
                            <tr>
                                <td>item 1</td>
                                <td>item 2</td>
                                <td>item 3</td>
                                <td>item 4</td>
                                <td>item 5</td>
                                <td>item 6</td>
                            </tr>
                            <tr>
                                <td>item 1</td>
                                <td>item 2</td>
                                <td>item 3</td>
                                <td>item 4</td>
                                <td>item 5</td>
                                <td>item 6</td>
                            </tr>
                            <tr>
                                <td>item 1</td>
                                <td>item 2</td>
                                <td>item 3</td>
                                <td>item 4</td>
                                <td>item 5</td>
                                <td>item 6</td>
                            </tr>
                            <tr>
                                <td>item 1</td>
                                <td>item 2</td>
                                <td>item 3</td>
                                <td>item 4</td>
                                <td>item 5</td>
                                <td>item 6</td>
                            </tr>
                            <tr>
                                <td>item 1</td>
                                <td>item 2</td>
                                <td>item 3</td>
                                <td>item 4</td>
                                <td>item 5</td>
                                <td>item 6</td>
                            </tr>
                            <tr>
                                <td>item 1</td>
                                <td>item 2</td>
                                <td>item 3</td>
                                <td>item 4</td>
                                <td>item 5</td>
                                <td>item 6</td>
                            </tr>
                            <tr>
                                <td>item 1</td>
                                <td>item 2</td>
                                <td>item 3</td>
                                <td>item 4</td>
                                <td>item 5</td>
                                <td>item 6</td>
                            </tr>
                            <tr>
                                <td>item 1</td>
                                <td>item 2</td>
                                <td>item 3</td>
                                <td>item 4</td>
                                <td>item 5</td>
                                <td>item 6</td>
                            </tr>
                            <tr>
                                <td>item 1</td>
                                <td>item 2</td>
                                <td>item 3</td>
                                <td>item 4</td>
                                <td>item 5</td>
                                <td>item 6</td>
                            </tr>
                            <tr>
                                <td>item 1</td>
                                <td>item 2</td>
                                <td>item 3</td>
                                <td>item 4</td>
                                <td>item 5</td>
                                <td>item 6</td>
                            </tr>
                            <tr>
                                <td>item 1</td>
                                <td>item 2</td>
                                <td>item 3</td>
                                <td>item 4</td>
                                <td>item 5</td>
                                <td>item 6</td>
                            </tr>
                            <tr>
                                <td>item 1</td>
                                <td>item 2</td>
                                <td>item 3</td>
                                <td>item 4</td>
                                <td>item 5</td>
                                <td>item 6</td>
                            </tr>
                            <tr>
                                <td>item 1</td>
                                <td>item 2</td>
                                <td>item 3</td>
                                <td>item 4</td>
                                <td>item 5</td>
                                <td>item 6</td>
                            </tr>
                            <tr>
                                <td>item 1</td>
                                <td>item 2</td>
                                <td>item 3</td> 
                                <td>item 4</td>
                                <td>item 5</td>
                                <td>item 6</td>
                            </tr>
                            <tr>
                                <td>item 1</td>
                                <td>item 2</td>
                                <td>item 3</td>
                                <td>item 4</td>
                                <td>item 5</td>
                                <td>item 6</td>
                            </tr>
                            <tr>
                                <td>item 1</td>
                                <td>item 2</td>
                                <td>item 3</td>
                                <td>item 4</td>
                                <td>item 5</td>
                                <td>item 6</td>
                            </tr>
                            <tr>
                                <td>1354648469231</td>
                                <td>item 2</td>
                                <td>item 3</td>
                                <td>item 4</td>
                                <td>item 5</td>
                                <td>item 6</td>
                            </tr>
                        </tbody>
                    </table>
                </section>
            </dialog>
        </section>
    </main>

    <script src="../js/modulo_proveedores_agregar_proveedor.js"></script>
    <script src="../js/modulo_proveedores_proveedores_inhabilitados.js"></script>
</body>
</html>