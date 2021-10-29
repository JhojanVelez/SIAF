<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de Salidas</title>
    <link rel="stylesheet" href="<?php echo(URL_RAIZ); ?>public/css/inventario-salidas.css">
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
                <h2 class="salidas__filtro-titulo">Filtros de busqueda</h2>
                <form class="salidas__filtro-form" action="">
                    <input type="text" class="salidas__filtro-producto-id" id="producto-id" placeholder="Codigo de Barras">
                    <input type="text" class="salidas__filtro-producto-nombre" id="producto-nombre" placeholder="Nombre Producto">
                    <input type="text" class="salidas__filtro-proveedor-nombre" id="proveedor-nombre" placeholder="Nombre Proveedor">
                    <select name="presentacion" class="salidas_filtro-tipo-salida" id="salida-tipo-salida">
                        <option value="null">Por tipo de salida</option>
                        <option value="VENTA">VENTA</option>
                        <option value="PRODUCTO CADUCADO">PRODUCTO CADUCADO</option>
                        <option value="EMPAQUE DAÑADO">EMPAQUE DAÑADO</option>
                        <option value="DAÑO INTERNO">DAÑO INTERNO</option>
                    </select>
                    <article class="salidas_filtro-container-desde-hasta">
                        <h3 class="salidas_filtro-container-desde-hasta__title">Por periodo de tiempo</h3>
                        <div class="salidas_filtro-container-desde-hasta__inputs">
                            <input type="date" class="salidas_filtro-desde" id="salida-desde">
                            <input type="date" class="salidas_filtro-hasta" id="salida-hasta">
                        </div>
                    </article>
                </form>
                <div class="salidas__filtro-gen-repo filtro-gen-repo">
                    <div class="salidas__filtro-gen-repo-img filtro-gen-repo-img">
                        <img src="<?php echo(URL_RAIZ); ?>public/imagenes/informe.svg" alt="">
                    </div>
                    <a class="salidas__filtro-subtitulo-reporte filtro-subtitulo-reporte" href="">Generar reporte</a>
                </div>
            </div>
        </section>


        <section class="salidas__container-table container-table box-shadow">
            <table class="salidas__table">
                <thead class="table-thead">
                    <tr class="table-tr">
                        <td class="table-td">SalCodigo</td>
                        <td class="table-td">ProCodBarr</td>
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
                </tbody>
            </table>
        </section>


        <section class="salidas__container-botones container-botones box-shadow">
            <section class="salidas__container-boton">
                <button class="salidas__boton-agregar boton">
                    A&ntilde;adir
                </button>
            </section>
        </section>


        <!-- Estos son los modals para agregar una salida -->
        <section class="salidas__container-modal transparent-container-modal">
            <dialog class="salidas__modal-agregar-salida">
                <h2 class="salidas__modal-agregar-salida-title dialog-title">Registra Nuevas Salidas</h2>

                <form class="salidas__modal-agregar-salida-form dialog-main-content">

                    <input 
                    class="salidas__modal-agregar-salida-form-item"
                    id="codigoBarrasProducto"
                    name= "codigoBarras"
                    type="text" 
                    maxlength="15"
                    placeholder="Codigo de barras del producto" 
                    title="Ingresa un codigo de barras de un producto registrado en sistema"
                    data-input
                    data-ProCodBarras
                    >

                    <select 
                    class="salidas__modal-agregar-salida-form-item"
                    name="descripcion" 
                    title="Elige un producto de la lista y el codigo de barras se pondra automaticamente"
                    data-input 
                    data-ProDescripcion
                    >
                        <option value="">Elige el producto</option>

                        <?php foreach($this->data['infoProductos'] as $key => $value): ?>
                        <option 
                        value="<?php echo $value['ProDescripcion'] ?>" 
                        data-proveedor-id="<?php echo $value['ProCodBarras'] ?>"><?php echo $value['ProDescripcion'] ?></option>
                        <?php endforeach; ?>

                    </select>

                    <input 
                    class="salidas__modal-agregar-salida-form-item"
                    name="cantidadSalida"
                    type="number" 
                    placeholder="Cantidad"
                    title="Ingresa la cantidad de producto que salio"
                    data-input 
                    data-cantidadSalida
                    >

                    <select 
                    class="salidas__modal-agregar-salida-form-item"
                    name="tipoSalida" 
                    title="Ingresa el tipo de salida"
                    data-input 
                    data-salTipoSalida
                    >
                        <option value="">Tipo de Salida</option>
                        <option value="VENTA">VENTA</option>
                        <option value="PRODUCTO CADUCADO">PRODUCTO CADUCADO</option>
                        <option value="EMPAQUE DAÑADO">EMPAQUE DAÑADO</option>
                        <option value="DAÑO INTERNO">DAÑO INTERNO</option>
                    </select>

                    <input 
                    class="salidas__modal-agregar-salida-form-item"
                    name="descripcion" 
                    type="date" 
                    title="Ingresa la fecha de salida"
                    data-input 
                    data-salFecha
                    >
                    <textarea 
                    cols="30" 
                    rows="10" 
                    class="salidas__modal-agregar-salida-form-item" 
                    name="salidaCometario" 
                    placeholder="Ingresa un comentario."
                    title="Comentarios opcionales acerca de la salida"
                    data-input
                    data-salComentario
                    ></textarea>
                </form>
                <div class="salidas__modal-agregar-salida-btns-container dialog-container-bts">
                    <button class="salidas__modal-agregar-salida-btn-cancelar boton dialog-btn">Cancelar</button>
                    <button class="salidas__modal-agregar-salida-btn-añadir boton dialog-btn">A&ntilde;adir</button>
                </div>
            </dialog>

            <dialog class="salidas__modal-agregar-salida-confirmacion">
                <h2 class="salidas__modal-agregar-salida-title-confirmacion dialog-title">Verifica los Datos</h2>
                <p class="salidas__modal-agregar-salida-text-confirmacion dialog-text">
                    ¿Estas seguro de registrar este salida?<br>
                    Recuerda revisar detenidamente la informacion de la salida que estas registrando.
                </p>
                <div class="salidas__modal-agregar-salida-info-confirmacion dialog-main-content">
                    <section class="salidas__modal-agregar-salida-info-item-confirmacion" data-ProCodBarras>
                        <h3>CODIGO DE BARRAS</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="salidas__modal-agregar-salida-info-item-confirmacion" data-ProDescripcion>
                        <h3>PRODUCTO</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="salidas__modal-agregar-salida-info-item-confirmacion" data-cantidadSalida>
                        <h3>CANTIDAD</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="salidas__modal-agregar-salida-info-item-confirmacion" data-salTipoSalida>
                        <h3>TIPO DE SALIDA</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="salidas__modal-agregar-salida-info-item-confirmacion" data-salFecha>
                        <h3>FECHA DE SALIDA</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="salidas__modal-agregar-salida-info-item-confirmacion" data-salComentario>
                        <h3>COMENTARIOS</h3>
                        <p>________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________</p>
                    </section>
                </div>
                <div class="salidas__modal-agregar-salida-confirmacion-btns-container dialog-container-bts">
                    <button class="salidas__modal-agregar-salida-confirmacion-btn-cancelar dialog-btn boton">Volver Atras</button>
                    <button class="salidas__modal-agregar-salida-confirmacion-btn-confirmar dialog-btn boton">Confirmar</button>
                </div>
            </dialog>

            <dialog class="salidas__modal-agregacion-exitosa dialog-process-result">
                <h2>¡Exelente!</h2>
                <p>Has registrado una nueva salida exitosamente</p>
                <button class="salidas__modal-agregacion-exitosa-btn dialog-process-result__btn boton" >Ok</button>
            </dialog>
            
            <dialog class="salidas__modal-agregacion-fallo dialog-process-result">
                <h2>¡Algo salio mal!</h2>
                <p>Esta salida no pudo ser registrada, porque posiblemente hubo un error interno</p>
                <button class="salidas__modal-agregacion-fallo-btn dialog-process-result__btn boton" >Ok</button>
            </dialog>
        </section>
    </main>
    <script src="<?php echo(URL_RAIZ); ?>public/js/modulo_inventario_salidas_agregar_salidas.js"></script>
</body>
</html>