<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de Entradas</title>
    <link rel="stylesheet" href="../css/inventario-entradas.css">
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
                <h2 class="entradas__filtro-titulo">Filtros de busqueda</h2>
                <form class="entradas__filtro-form" action="">
                    <input type="text" class="entradas__filtro-producto-id" id="producto-id" placeholder="Codigo de Barras">
                    <input type="text" class="entradas__filtro-producto-nombre" id="producto-nombre" placeholder="Nombre Producto">
                    <input type="text" class="entradas__filtro-proveedor-id" id="proveedor-id" placeholder="NIT Proveedor">
                    <input type="text" class="entradas__filtro-proveedor-nombre" id="proveedor-nombre" placeholder="Nombre Proveedor">
                    <article class="entradas_filtro-container-desde-hasta">
                        <h3 class="entradas_filtro-container-desde-hasta__title">Por periodo de tiempo</h3>
                        <div class="entradas_filtro-container-desde-hasta__inputs">
                            <input type="date" class="entradas_filtro-desde" id="salida-desde">
                            <input type="date" class="entradas_filtro-hasta" id="salida-hasta">
                        </div>
                    </article>
                </form>
                <div class="entradas__filtro-gen-repo filtro-gen-repo">
                    <div class="entradas__filtro-gen-repo-img filtro-gen-repo-img">
                        <img src="../imagenes/informe.svg" alt="">
                    </div>
                    <a class="entradas__filtro-subtitulo-reporte filtro-subtitulo-reporte" href="">Generar reporte</a>
                </div>
            </div>
        </section>


        <section class="entradas__container-table container-table box-shadow">
            <table class="entradas__table">
                <thead class="table-thead">
                    <tr class="table-tr">
                        <td class="table-td">EntCodigo</td>
                        <td class="table-td">FechaEntrada</td>
                        <td class="table-td">Cantidad</td>
                        <td class="table-td">CostoProducto</td>
                        <td class="table-td ">Comentarios</td>
                        <td class="table-td">InvCodigo</td>
                        <td class="table-td">ProCodBarras</td>
                    </tr>
                </thead>
                <tbody>
                    <!-- table-td--comentarios clase -->
                    <tr>
                        <td>Item 1</td>
                        <td>Item 2</td>
                        <td>Item 3</td>
                        <td>Item 4</td>
                        <td>Item 5</td>
                        <td>Item 6</td>
                        <td>Item 7</td>
                    </tr>
                    <tr>
                        <td>Item 1</td>
                        <td>Item 2</td>
                        <td>Item 3</td>
                        <td>Item 4</td>
                        <td>Item 5</td>
                        <td>Item 6</td>
                        <td>Item 7</td>
                    </tr>
                    <tr>
                        <td>Item 1</td>
                        <td>Item 2</td>
                        <td>Item 3</td>
                        <td>Item 4</td>
                        <td>Item 5</td>
                        <td>Item 6</td>
                        <td>Item 7</td>
                    </tr>
                    <tr>
                        <td>Item 1</td>
                        <td>Item 2</td>
                        <td>Item 3</td>
                        <td>Item 4</td>
                        <td>Item 5</td>
                        <td>Item 6</td>
                        <td>Item 7</td>
                    </tr>
                    <tr>
                        <td>Item 1</td>
                        <td>Item 2</td>
                        <td>Item 3</td>
                        <td>Item 4</td>
                        <td>Item 5</td>
                        <td>Item 6</td>
                        <td>Item 7</td>
                    </tr>
                    <tr>
                        <td>Item 1</td>
                        <td>Item 2</td>
                        <td>Item 3</td>
                        <td>Item 4</td>
                        <td>Item 5</td>
                        <td>Item 6</td>
                        <td>Item 7</td>
                    </tr>
                    <tr>
                        <td>Item 1</td>
                        <td>Item 2</td>
                        <td>Item 3</td>
                        <td>Item 4</td>
                        <td>Item 5</td>
                        <td>Item 6</td>
                        <td>Item 7</td>
                    </tr>
                    <tr>
                        <td>Item 1</td>
                        <td>Item 2</td>
                        <td>Item 3</td>
                        <td>Item 4</td>
                        <td>Item 5</td>
                        <td>Item 6</td>
                        <td>Item 7</td>
                    </tr>
                    <tr>
                        <td>Item 1</td>
                        <td>Item 2</td>
                        <td>Item 3</td>
                        <td>Item 4</td>
                        <td>Item 5</td>
                        <td>Item 6</td>
                        <td>Item 7</td>
                    </tr>
                    <tr>
                        <td>Item 1</td>
                        <td>Item 2</td>
                        <td>Item 3</td>
                        <td>Item 4</td>
                        <td>Item 5</td>
                        <td>Item 6</td>
                        <td>Item 7</td>
                    </tr>
                    <tr>
                        <td>Item 1</td>
                        <td>Item 2</td>
                        <td>Item 3</td>
                        <td>Item 4</td>
                        <td>Item 5</td>
                        <td>Item 6</td>
                        <td>Item 7</td>
                    </tr>
                    <tr>
                        <td>Item 1</td>
                        <td>Item 2</td>
                        <td>Item 3</td>
                        <td>Item 4</td>
                        <td>Item 5</td>
                        <td>Item 6</td>
                        <td>Item 7</td>
                    </tr>
                    <tr>
                        <td>Item 1</td>
                        <td>Item 2</td>
                        <td>Item 3</td>
                        <td>Item 4</td>
                        <td>Item 5</td>
                        <td>Item 6</td>
                        <td>Item 7</td>
                    </tr>
                    <tr>
                        <td>Item 1</td>
                        <td>Item 2</td>
                        <td>Item 3</td>
                        <td>Item 4</td>
                        <td>Item 5</td>
                        <td>Item 6</td>
                        <td>Item 7</td>
                    </tr>
                    <tr>
                        <td>Item 1</td>
                        <td>Item 2</td>
                        <td>Item 3</td>
                        <td>Item 4</td>
                        <td>Item 5</td>
                        <td>Item 6</td>
                        <td>Item 7</td>
                    </tr>
                    <tr>
                        <td>Item 1</td>
                        <td>Item 2</td>
                        <td>Item 3</td>
                        <td>Item 4</td>
                        <td>Item 5</td>
                        <td>Item 6</td>
                        <td>Item 7</td>
                    </tr>
                    <tr>
                        <td>Item 1</td>
                        <td>Item 2</td>
                        <td>Item 3</td>
                        <td>Item 4</td>
                        <td>Item 5</td>
                        <td>Item 6</td>
                        <td>Item 7</td>
                    </tr>
                </tbody>
            </table>
        </section>


        <section class="entradas__container-botones container-botones box-shadow">
            <section class="entradas__container-boton">
                <button class="entradas__boton-agregar boton">
                    A&ntilde;adir
                </button>
            </section>
        </section>



        <!-- Estos son los modals para agregar una entrada -->
        <section class="entradas__container-modal transparent-container-modal">
            <dialog class="entradas__modal-agregar-entrada">
                <h2 class="entradas__modal-agregar-entrada-title dialog-title">Registra Nuevas Entradas</h2>

                <form class="entradas__modal-agregar-entrada-form dialog-main-content">
                    <input class="entradas__modal-agregar-entrada-form-item" type="text" placeholder="Codigo de barras del producto" id="codigoBarrasProducto">
                    <select class="entradas__modal-agregar-entrada-form-item">
                        <option value="">Producto</option>
                    </select>
                    <input class="entradas__modal-agregar-entrada-form-item" type="text" placeholder="Cantidad">
                    <input class="entradas__modal-agregar-entrada-form-item" type="text" placeholder="Costo">
                    <input class="entradas__modal-agregar-entrada-form-item" type="date">
                    <textarea class="entradas__modal-agregar-entrada-form-item" cols="30" rows="10" placeholder="Ingresa un comentario..."></textarea>
                </form>
                <div class="entradas__modal-agregar-entrada-btns-container dialog-container-bts">
                    <button class="entradas__modal-agregar-entrada-btn-añadir boton dialog-btn">A&ntilde;adir</button>
                    <button class="entradas__modal-agregar-entrada-btn-cancelar boton dialog-btn">Cancelar</button>
                </div>
            </dialog>

            <dialog class="entradas__modal-agregar-entrada-confirmacion">
                <h2 class="entradas__modal-agregar-entrada-title-confirmacion dialog-title">Verifica los Datos</h2>
                <p class="entradas__modal-agregar-entrada-text-confirmacion dialog-text">
                    ¿Estas seguro de registrar este entrada?<br>
                    Recuerda revisar detenidamente la informacion de la entrada que estas registrando.
                </p>
                <div class="entradas__modal-agregar-entrada-info-confirmacion dialog-main-content">
                    <section class="entradas__modal-agregar-entrada-info-item-confirmacion">
                        <h3>CODIGO DE BARRAS</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="entradas__modal-agregar-entrada-info-item-confirmacion">
                        <h3>PRODUCTO</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="entradas__modal-agregar-entrada-info-item-confirmacion">
                        <h3>CANTIDAD</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="entradas__modal-agregar-entrada-info-item-confirmacion">
                        <h3>COSTO</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="entradas__modal-agregar-entrada-info-item-confirmacion">
                        <h3>FECHA DE ENTRADA</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="entradas__modal-agregar-entrada-info-item-confirmacion">
                        <h3>COMENTARIOS</h3>
                        <p>________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________</p>
                    </section>
                </div>
                <div class="entradas__modal-agregar-entrada-confirmacion-btns-container dialog-container-bts">
                    <button class="entradas__modal-agregar-entrada-confirmacion-btn-confirmar dialog-btn boton">Confirmar</button>
                    <button class="entradas__modal-agregar-entrada-confirmacion-btn-cancelar dialog-btn boton">Cancelar</button>
                </div>
            </dialog>

            <dialog class="entradas__modal-agregacion-exitosa dialog-process-result">
                <h2>¡Exelente!</h2>
                <p>Has registrado una nueva entrada exitosamente</p>
                <button class="entradas__modal-agregacion-exitosa-btn dialog-process-result__btn boton" >Ok</button>
            </dialog>
            
            <dialog class="entradas__modal-agregacion-fallo dialog-process-result">
                <h2>¡Algo salio mal!</h2>
                <p>Esta entrada no pudo ser registrada, porque posiblemente hubo un error interno</p>
                <button class="entradas__modal-agregacion-fallo-btn dialog-process-result__btn boton" >Ok</button>
            </dialog>
        </section>
    </main>

    <script src="../js/modulo_inventario_entradas_agregar_entradas.js"></script>
</body>
</html>