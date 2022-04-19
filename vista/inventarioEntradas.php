<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo(URL_RAIZ); ?>public/css/inventario-entradas.css">
    <link rel="shortcut icon" href="<?php echo(URL_FAVICON); ?>" type="image/x-icon">
    <title>Gesti&oacute;n de Entradas</title>
</head>
<body>
    <?php
        require_once("nav.php");
    ?>

<main class="entradas grid-container-main">
        <section class="entradas__container-title container-title box-shadow">
            <h1 class="entradas__titulo">Gestiona Tus Entradas</h1>
        </section>


        <section class="entradas__container-filter container-filter box-shadow">
            <div class="entradas__filtro">
                <h2 class="entradas__filtro-titulo">Filtros De B&uacute;squeda</h2>
                <form 
                id="entradas__filtro-form" 
                class="entradas__filtro-form" 
                action="<?php echo URL_RAIZ ?>inventarioEntradas/generarReporte" 
                method="POST" 
                target="_BLANK"
                >
                    <input 
                    name="codigoBarrasProducto"
                    type="text" 
                    class="entradas__filtro-producto-id" 
                    placeholder="C&oacute;digo de Barras"
                    autocomplete="off"
                    data-input
                    >
                    <input 
                    name="descripcionProducto"
                    type="text" 
                    class="entradas__filtro-producto-nombre" 
                    placeholder="Nombre Producto"
                    autocomplete="off"
                    data-input
                    >
                    <input 
                    name="nitProveedor"
                    type="text" 
                    class="entradas__filtro-proveedor-id" 
                    placeholder="NIT Proveedor"
                    autocomplete="off"
                    data-input
                    >
                    <input 
                    name="nombreProveedor"
                    type="text" 
                    class="entradas__filtro-proveedor-nombre" 
                    placeholder="Nombre Proveedor"
                    autocomplete="off"
                    data-input
                    >
                    <article class="entradas_filtro-container-desde-hasta">
                        <h3 class="entradas_filtro-container-desde-hasta__title">Por Periodo De Tiempo</h3>
                        <div class="entradas_filtro-container-desde-hasta__inputs">
                            <input 
                            name="fechaEntradaDesde"
                            type="datetime-local" 
                            class="entradas_filtro-desde" 
                            data-input 
                            >
                            <input 
                            name="fechaEntradaHasta"
                            type="datetime-local" 
                            class="entradas_filtro-hasta" 
                            data-input
                            >
                        </div>
                    </article>
                </form>
                <div class="entradas__filtro-gen-repo filtro-gen-repo">
                    <div class="entradas__filtro-gen-repo-img filtro-gen-repo-img">
                        <img src="<?php echo(URL_RAIZ); ?>public/imagenes/informe.png" alt="">
                    </div>
                    <input 
                    class="entradas__filtro-subtitulo-reporte filtro-subtitulo-reporte" 
                    type="submit" 
                    value="Generar Reporte" 
                    form="entradas__filtro-form"
                    >
                </div>
            </div>
        </section>


        <section class="entradas__container-table container-table box-shadow">
            <table class="entradas__table">
                <thead class="table-thead">
                    <tr class="table-tr">
                        <td class="table-td">EntC&oacute;digo</td>
                        <td class="table-td">ProCodBarras</td>
                        <td class="table-td">Producto</td>
                        <td class="table-td">NitProveedor</td>
                        <td class="table-td">Proveedor</td>
                        <td class="table-td">FechaEntrada</td>
                        <td class="table-td">Cantidad</td>
                        <td class="table-td">CostoProducto</td>
                        <td class="table-td">Comentarios</td>
                    </tr>
                </thead>
                <tbody>
                    <!-- table-td--comentarios clase -->

                    <?php foreach($this->data['infoEntradas'] as $key => $value): ?>
                        <tr>
                            <td><?php echo $value["EntCodigo"] ?></td>
                            <td><?php echo $value["tbl_productos_ProCodBarras"] ?></td>
                            <td><?php echo $value["ProDescripcion"] ?></td>
                            <td><?php echo $value["tbl_proveedores_ProNIT"] ?></td>
                            <td><?php echo $value["ProNombre"] ?></td>
                            <td><?php echo $value["EntFecha"] ?></td>
                            <td><?php echo $value["EntCantidad"] ?></td>
                            <td><?php echo $value["EntCostoProducto"] ?></td>
                            <td><?php echo $value["EntComentarios"] ?></td>
                        </tr>
                    <?php endforeach;?>

                    <!-- 
                        Este template nos permite imprimir la informacion cuando estamos buscando por atributo
                        pero en este caso lo hacemos con template para hacer uso de los fragmentos
                    -->
                    <template class="entradas__table-template">
                        <tr>
                            <td></td>
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

        <div class="entradas__boton-agregar-container">
            <button class="entradas__boton-agregar boton">
                <span class="entradas__boton-agregar-simbol entradas__boton-agregar">+</span>
                <span class="entradas__boton-agregar-txt">A&ntilde;adir</span>
            </button>
        </div>



        <!-- Estos son los modals para agregar una entrada -->
        <section class="entradas__container-modal transparent-container-modal">
            <dialog class="entradas__modal-agregar-entrada">
                <h2 class="entradas__modal-agregar-entrada-title dialog-title">Registra Nuevas Entradas</h2>

                <form class="entradas__modal-agregar-entrada-form dialog-main-content">

                    <section class="dialog-main-content__input-container entradas__modal-agregar-entrada-form-item">
                        <label class="dialog-main-content__label">C&oacute;digo de Barras del Producto</label>
                        <input 
                        id="codigoBarrasProducto"
                        name= "codigoBarrasProducto"
                        type="text" 
                        maxlength="15"
                        title="Ingresa un c&oacute;digo de barras de un producto registrado en sistema"
                        autocomplete="off" 
                        data-input
                        data-proCodBarras
                        >
                    </section>
                        
                    <section class="dialog-main-content__input-container entradas__modal-agregar-entrada-form-item">
                        <label class="dialog-main-content__label">Descripci&oacute;n del Producto</label>
                        <select 
                        id="productos__modal-agregar-entrada-select-proveedor"
                        name="descripcionProducto" 
                        title="Elige un producto de la lista y el c&oacute;digo de barras se pondr&aacute; autom&aacute;ticamente"
                        data-input 
                        data-proDescripcion
                        >
                            <option value="" data-pro-cod-barras ></option>
                        
                            <?php foreach($this->data['infoProductos'] as $key => $value): ?>
                            <option 
                            value="<?php echo $value['ProDescripcion'] ?>" 
                            data-pro-cod-barras="<?php echo $value['ProCodBarras'] ?>"><?php echo $value['ProDescripcion'] ?></option>
                            <?php endforeach; ?>
                            
                        </select>
                    </section>
                            
                    <section class="dialog-main-content__input-container entradas__modal-agregar-entrada-form-item">
                        <label class="dialog-main-content__label">Cantidad de Producto</label>
                        <input 
                        type="number" 
                        name="cantidadEntrada"
                        type="number" 
                        title="Ingresa la cantidad de producto que entro"
                        data-input 
                        data-entCantidad
                        >
                    </section>
                            
                    <section class="dialog-main-content__input-container entradas__modal-agregar-entrada-form-item">
                        <label class="dialog-main-content__label">Costo del Producto</label>
                        <input 
                        type="number" 
                        name="costoEntrada" 
                        title="Ingresa el costo total de la entrada"
                        data-input 
                        data-entCostoProducto
                        >
                    </section>

                    <section class="dialog-main-content__input-container entradas__modal-agregar-entrada-form-item">
                        <label class="dialog-main-content__label">Fecha y Hora de Entrada</label>
                        <input 
                        type="datetime-local"
                        name="fechaEntrada"
                        title="Ingresa la fecha y hora de entrada"
                        data-input 
                        data-entFecha
                        >
                    </section>

                    <section class="dialog-main-content__input-container entradas__modal-agregar-entrada-form-item">
                        <label class="dialog-main-content__label">Comentarios (Opcional)</label>
                        <textarea 
                        cols="30" 
                        rows="10" 
                        maxlength="255" 
                        placeholder="Ingresa un comentario."
                        name="entradaCometario"
                        title="Comentarios opcionales acerca de la entrada"
                        data-input
                        data-entComentarios
                        ></textarea>
                    </section>

                </form>
                <div class="entradas__modal-agregar-entrada-btns-container dialog-container-bts">
                    <button class="entradas__modal-agregar-entrada-btn-cancelar boton dialog-btn">Cancelar</button>
                    <button class="entradas__modal-agregar-entrada-btn-añadir boton dialog-btn">A&ntilde;adir</button>
                </div>
            </dialog>

            <dialog class="entradas__modal-agregar-entrada-confirmacion">
                <h2 class="entradas__modal-agregar-entrada-title-confirmacion dialog-title">Verifica los Datos</h2>
                <p class="entradas__modal-agregar-entrada-text-confirmacion dialog-text">
                    ¿Est&aacute;s seguro de registrar esta entrada?<br>
                    Recuerda revisar detenidamente la informaci&oacute;n de la entrada que est&aacute;s registrando.
                </p>
                <div class="entradas__modal-agregar-entrada-info-confirmacion dialog-main-content">
                    <section class="entradas__modal-agregar-entrada-info-item-confirmacion" data-proCodBarras>
                        <h3 class="dialog-main-content__label">C&oacute;digo de Barras del Producto</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="entradas__modal-agregar-entrada-info-item-confirmacion" data-proDescripcion>
                        <h3 class="dialog-main-content__label">Descripci&oacute;n del Producto</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="entradas__modal-agregar-entrada-info-item-confirmacion" data-entCantidad>
                        <h3 class="dialog-main-content__label">Cantidad de Producto</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="entradas__modal-agregar-entrada-info-item-confirmacion" data-entCostoProducto>
                        <h3 class="dialog-main-content__label">Costo del Producto</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="entradas__modal-agregar-entrada-info-item-confirmacion" data-entFecha>
                        <h3 class="dialog-main-content__label">Fecha y Hora de Entrada</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="entradas__modal-agregar-entrada-info-item-confirmacion" data-entComentarios>
                        <h3 class="dialog-main-content__label">Comentarios (Opcional)</h3>
                        <p>________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________</p>
                    </section>
                </div>
                <div class="entradas__modal-agregar-entrada-confirmacion-btns-container dialog-container-bts">
                    <button class="entradas__modal-agregar-entrada-confirmacion-btn-cancelar dialog-btn boton">Volver Atras</button>
                    <button class="entradas__modal-agregar-entrada-confirmacion-btn-confirmar dialog-btn boton">Confirmar</button>
                </div>
            </dialog>

            <dialog class="entradas__modal-agregacion-exitosa dialog-process-result">
                <h2>¡Excelente!</h2>
                <p>Has registrado una nueva entrada exitosamente</p>
                <button class="entradas__modal-agregacion-exitosa-btn dialog-process-result__btn boton" >Ok</button>
            </dialog>
            
            <dialog class="entradas__modal-agregacion-fallo dialog-process-result">
                <h2>¡Algo sali&oacute; mal!</h2>
                <p>Esta entrada no pudo ser registrada, porque posiblemente hubo un error interno</p>
                <button class="entradas__modal-agregacion-fallo-btn dialog-process-result__btn boton" >Ok</button>
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
    <script src="<?php echo(URL_RAIZ); ?>public/js/modulo_inventario_entradas_agregar_entradas.js" type="module"></script>
    <script src="<?php echo(URL_RAIZ); ?>public/js/modulo_inventario_entradas_buscar_por_atributos.js" type="module"></script>
    <script src="<?php echo(URL_RAIZ); ?>public/js/cualquier_modulo_pintar_borde_derecho_input.js" ></script>
</body>
</html>