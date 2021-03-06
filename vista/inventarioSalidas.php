<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo(URL_RAIZ); ?>public/css/inventario-salidas.css">
    <link rel="shortcut icon" href="<?php echo(URL_FAVICON); ?>" type="image/x-icon">
    <title>Gesti&oacute;n de Salidas</title>
</head>
<body>
    <?php
        require_once("nav.php");
    ?>

<main class="salidas grid-container-main">
        <section class="salidas__container-title container-title box-shadow">
            <h1 class="salidas__titulo">Gestiona Tus Salidas</h1>
        </section>


        <section class="salidas__container-filter container-filter box-shadow">
            <div class="salidas__filtro">
                <h2 class="salidas__filtro-titulo">Filtros De B&uacute;squeda</h2>
                <form 
                id="salidas__filtro-form" 
                class="salidas__filtro-form" 
                action="<?php echo URL_RAIZ ?>inventarioSalidas/generarReporte" 
                method="POST" 
                target="_BLANK"
                >
                    <input 
                    name="codigoBarrasProducto"
                    type="text" 
                    class="salidas__filtro-producto-id" 
                    placeholder="C&oacute;digo de Barras"
                    autocomplete="off"
                    data-input
                    >
                    <input 
                    name="descripcionProducto"
                    type="text" 
                    class="salidas__filtro-producto-nombre" 
                    placeholder="Nombre Producto"
                    autocomplete="off"
                    data-input
                    >
                    <input 
                    name="nombreProveedor"
                    type="text" 
                    class="salidas__filtro-proveedor-nombre" 
                    placeholder="Nombre Proveedor"
                    autocomplete="off"
                    data-input
                    >
                    <select 
                    name="tipoSalida" 
                    class="salidas_filtro-tipo-salida" 
                    autocomplete="off"
                    data-input
                    >
                        <option value="">Por tipo de salida</option>
                        <option value="VENTA">VENTA</option>
                        <option value="PRODUCTO CADUCADO">PRODUCTO CADUCADO</option>
                        <option value="EMPAQUE DA??ADO">EMPAQUE DA??ADO</option>
                        <option value="DA??O INTERNO">DA??O INTERNO</option>
                    </select>
                    <article class="salidas_filtro-container-desde-hasta">
                        <h3 class="salidas_filtro-container-desde-hasta__title">Por Periodo De Tiempo</h3>
                        <div class="salidas_filtro-container-desde-hasta__inputs">
                            <input 
                            name="fechaSalidaDesde"
                            type="datetime-local" 
                            class="salidas_filtro-desde"
                            data-input 
                            >
                            <input 
                            name="fechaSalidaHasta"
                            type="datetime-local" 
                            class="salidas_filtro-hasta" 
                            data-input
                            >
                        </div>
                    </article>
                </form> 
                <div class="salidas__filtro-gen-repo filtro-gen-repo">
                    <div class="salidas__filtro-gen-repo-img filtro-gen-repo-img">
                        <img src="<?php echo(URL_RAIZ); ?>public/imagenes/informe.png" alt="">
                    </div>
                    <input 
                    class="salidas__filtro-subtitulo-reporte filtro-subtitulo-reporte" 
                    type="submit" 
                    value="Generar Reporte" 
                    form="salidas__filtro-form"
                    >
                </div>
            </div>
        </section>


        <section class="salidas__container-table container-table box-shadow">
            <table class="salidas__table">
                <thead class="table-thead">
                    <tr class="table-tr">
                        <td class="table-td">SalC&oacute;digo</td>
                        <td class="table-td">ProCodBarras</td>
                        <td class="table-td">Descripcion</td>
                        <td class="table-td">Proveedor</td>
                        <td class="table-td">FechaSalida</td>
                        <td class="table-td">Cantidad</td>
                        <td class="table-td">TipoSalida</td>
                        <td class="table-td">Comentarios</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($this->data['infoSalidas'] as $key => $value): ?>
                        <tr>
                            <td><?php echo $value["SalCodigo"] ?></td>
                            <td><?php echo $value["ProCodBarras"] ?></td>
                            <td><?php echo $value["ProDescripcion"] ?></td>
                            <td><?php echo $value["ProNombre"] ?></td>
                            <td><?php echo $value["SalFecha"] ?></td>
                            <td><?php echo $value["SalCantidad"] ?></td>
                            <td><?php echo $value["SalTipoSalida"] ?></td>
                            <td><?php echo $value["SalComentarios"] ?></td>
                        </tr>
                    <?php endforeach;?>

                    <!-- 
                        Este template nos permite imprimir la informacion cuando estamos buscando por atributo
                        pero en este caso lo hacemos con template para hacer uso de los fragmentos
                    -->
                    <template class="salidas__table-template">
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </section>


        <div class="salidas__boton-agregar-container">
            <button class="salidas__boton-agregar boton">
                <span class="salidas__boton-agregar-simbol salidas__boton-agregar">+</span>
                <span class="salidas__boton-agregar-txt">A&ntilde;adir</span>
            </button>
        </div>


        <!-- Estos son los modals para agregar una salida -->
        <section class="salidas__container-modal transparent-container-modal">
            <dialog class="salidas__modal-agregar-salida">
                <h2 class="salidas__modal-agregar-salida-title dialog-title">Registra Nuevas Salidas</h2>

                <form class="salidas__modal-agregar-salida-form dialog-main-content">

                    <section class="dialog-main-content__input-container salidas__modal-agregar-salida-form-item">
                        <label class="dialog-main-content__label">C&oacute;digo de Barras del Producto</label>
                        <input 
                        class="salidas__modal-agregar-salida-form-item"
                        id="codigoBarrasProducto"
                        name= "codigoBarrasProducto"
                        type="text" 
                        maxlength="15"
                        title="Ingresa un codigo de barras de un producto registrado en sistema"
                        autocomplete="off"
                        data-input
                        data-ProCodBarras
                        >
                    </section>
                    <section class="dialog-main-content__input-container salidas__modal-agregar-salida-form-item">
                        <label class="dialog-main-content__label">Descripci&oacute;n del Producto</label>
                        <select 
                        class="salidas__modal-agregar-salida-form-item"
                        id="productos__modal-agregar-salida-select-proveedor"
                        name="descripcionProducto" 
                        title="Elige un producto de la lista y el codigo de barras se pondra automaticamente"
                        data-input 
                        data-ProDescripcion
                        >
                            <option value="" data-pro-cod-barras ></option>

                            <?php foreach($this->data['infoProductos'] as $key => $value): ?>
                            <option 
                            value="<?php echo $value['ProDescripcion'] ?>" 
                            data-pro-cod-barras="<?php echo $value['ProCodBarras'] ?>"><?php echo $value['ProDescripcion'] ?></option>
                            <?php endforeach; ?>

                        </select>
                    </section>
                    
                    <section class="dialog-main-content__input-container salidas__modal-agregar-salida-form-item">
                        <label class="dialog-main-content__label">Cantidad de Producto</label>
                        <input 
                        class="salidas__modal-agregar-salida-form-item"
                        name="cantidadSalida"
                        type="number"
                        title="Ingresa la cantidad de producto que salio"
                        data-input 
                        data-salCantidad
                        >
                    </section>

                    <section class="dialog-main-content__input-container salidas__modal-agregar-salida-form-item">
                        <label class="dialog-main-content__label">Tipo de Salida</label>
                        <select 
                        class="salidas__modal-agregar-salida-form-item"
                        name="tipoSalida" 
                        title="Ingresa el tipo de salida"
                        data-input 
                        data-salTipoSalida
                        >
                            <option value=""></option>
                            <option value="VENTA">VENTA</option>
                            <option value="PRODUCTO CADUCADO">PRODUCTO CADUCADO</option>
                            <option value="EMPAQUE DA??ADO">EMPAQUE DA??ADO</option>
                            <option value="DA??O INTERNO">DA??O INTERNO</option>
                        </select>
                    </section>

                    <section class="dialog-main-content__input-container salidas__modal-agregar-salida-form-item">
                        <label class="dialog-main-content__label">Fecha de Salida</label>
                        <input 
                        class="salidas__modal-agregar-salida-form-item"
                        name="fechaSalida" 
                        type="datetime-local" 
                        title="Ingresa la fecha y hora de salida"
                        data-input 
                        data-salFecha
                        >
                    </section>

                    <section class="dialog-main-content__input-container salidas__modal-agregar-salida-form-item">
                        <label class="dialog-main-content__label">Comentarios (Opcional)</label>
                        <textarea 
                        cols="30" 
                        rows="10" 
                        maxlength="255"
                        class="salidas__modal-agregar-salida-form-item" 
                        name="salidaCometario"
                        placeholder="Ingresa un comentario."
                        title="Comentarios opcionales acerca de la salida"
                        data-input
                        data-salComentarios
                        ></textarea>
                    </section>
                </form>
                <div class="salidas__modal-agregar-salida-btns-container dialog-container-bts">
                    <button class="salidas__modal-agregar-salida-btn-cancelar boton dialog-btn">Cancelar</button>
                    <button class="salidas__modal-agregar-salida-btn-a??adir boton dialog-btn">A&ntilde;adir</button>
                </div>
            </dialog>

            <dialog class="salidas__modal-agregar-salida-confirmacion">
                <h2 class="salidas__modal-agregar-salida-title-confirmacion dialog-title">Verifica los Datos</h2>
                <p class="salidas__modal-agregar-salida-text-confirmacion dialog-text">
                    ??Est&aacute;s seguro de registrar este salida?<br>
                    Recuerda revisar detenidamente la informaci&oacute;n de la salida que est&aacute;s registrando.
                </p>
                <div class="salidas__modal-agregar-salida-info-confirmacion dialog-main-content">
                    <section class="salidas__modal-agregar-salida-info-item-confirmacion" data-ProCodBarras>
                        <h3 class="dialog-main-content__label">C&oacute;digo de Barras del Producto</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="salidas__modal-agregar-salida-info-item-confirmacion" data-ProDescripcion>
                        <h3 class="dialog-main-content__label">Descripci&oacute;n del Producto</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="salidas__modal-agregar-salida-info-item-confirmacion" data-salCantidad>
                        <h3 class="dialog-main-content__label">Cantidad de Producto</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="salidas__modal-agregar-salida-info-item-confirmacion" data-salTipoSalida>
                        <h3 class="dialog-main-content__label">Tipo de Salida</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="salidas__modal-agregar-salida-info-item-confirmacion" data-salFecha>
                        <h3 class="dialog-main-content__label">Fecha de Salida</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="salidas__modal-agregar-salida-info-item-confirmacion" data-salComentarios>
                        <h3 class="dialog-main-content__label">Comentarios (Opcional)</h3>
                        <p>________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________</p>
                    </section>
                </div>
                <div class="salidas__modal-agregar-salida-confirmacion-btns-container dialog-container-bts">
                    <button class="salidas__modal-agregar-salida-confirmacion-btn-cancelar dialog-btn boton">Volver Atras</button>
                    <button class="salidas__modal-agregar-salida-confirmacion-btn-confirmar dialog-btn boton">Confirmar</button>
                </div>
            </dialog>

            <dialog class="salidas__modal-agregacion-exitosa dialog-process-result">
                <h2>??Excelente!</h2>
                <p>Has registrado una nueva salida exitosamente</p>
                <button class="salidas__modal-agregacion-exitosa-btn dialog-process-result__btn boton" >Ok</button>
            </dialog>
            
            <dialog class="salidas__modal-agregacion-fallo dialog-process-result">
                <h2>??Algo sali&oacute; mal!</h2>
                <p>Esta salida no pudo ser registrada, porque posiblemente hubo un error interno</p>
                <button class="salidas__modal-agregacion-fallo-btn dialog-process-result__btn boton" >Ok</button>
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
    <script src="<?php echo(URL_RAIZ); ?>public/js/modulo_inventario_salidas_agregar_salidas.js" type="module"></script>
    <script src="<?php echo(URL_RAIZ); ?>public/js/modulo_inventario_salidas_buscar_por_atributos.js" type="module"></script>
    <script src="<?php echo(URL_RAIZ); ?>public/js/cualquier_modulo_pintar_borde_derecho_input.js" ></script>
</body>
</html>