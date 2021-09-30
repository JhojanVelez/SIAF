<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registrar-ventas</title>
    <link rel="stylesheet" href="../css/ventas-registrar.css">
</head>
<body>
    <?php
    require("nav.php");
    ?>
    <main class="registrar-ventas grid-container-main">
        <section class="registrar-ventas__container-title container-title box-shadow">
            <h1 class="registrar-ventas__titulo">Registra tus Ventas</h1>
        </section>

        <section class="registrar-ventas__container-lista-productos contenedor-objetos box-shadow">
            <div class="registrar-ventas__lista-productos-title contenedor-objetos__title">
                <h2>Productos Para Vender</h2>
            </div>
            <div class="registrar-ventas__lista-productos-contenido contenedor-objetos__contenido box-shadow">
                <figure class="registrar-ventas__lista-producto contenedor-objetos__objeto box-shadow">
                    <div class="registrar-ventas__lista-producto-img contenedor-objetos__objeto-img">
                        <img src="../imagenes/corazon-icono.svg" alt="">
                    </div>
                    <div class="registrar-ventas__lista-producto-info">
                        <h4 class="registrar-ventas__lista-producto-info-title">CODIGO</h4>
                        <p class="registrar-ventas__lista-producto-data">5236548548</p>
                        <h4 class="registrar-ventas__lista-producto-info-title">NOMBRE DE PRODUCTO</h4>
                        <p class="registrar-ventas__lista-producto-data">Acetaminofen del carmen</p>
                        <h4 class="registrar-ventas__lista-producto-info-title">CANTIDAD</h4>
                        <p class="registrar-ventas__lista-producto-data">56</p>
                    </div>
                    <div class="registrar-ventas__lista-producto-precios">
                        <section class="registrar-ventas__lista-producto-precio">
                            <h4>PRECIO UNIDAD</h4>
                            <p> <strong>$0000</strong></p>
                        </section>
                        <section class="registrar-ventas__lista-producto-precio">
                            <h4>PRECIO TOTAL</h4>
                            <p><strong>$0000</strong></p>
                        </section>
                    </div>
                    <div class="registrar-ventas__lista-producto-botones contenedor-objetos__objeto-botones">
                        <section class="registrar-ventas__lista-producto-boton contenedor-objetos__objeto-boton">
                            <img src="../imagenes/editar-icono.svg" alt="">
                        </section>
                        <section class="registrar-ventas__lista-producto-boton contenedor-objetos__objeto-boton">
                            <img src="../imagenes/delete-icono.svg" alt="">
                        </section>
                    </div>
                </figure>
            </div>
            <div class="registrar-ventas__lista-productos-totales">
                <section class="registrar-ventas__total">
                    <h3>Cantidad Total</h3>
                    <p>58</p>
                </section>
                <section class="registrar-ventas__total">
                    <h3>Precio Total</h3>
                    <p>$ 56000</p>
                </section>
            </div>
        </section>


        <section class="registrar-ventas__container-registro container-filter  box-shadow">
            <div class="registrar-ventas__registro">
                <form class="registrar-ventas__registro-form" action="">
                    <label class="registrar-ventas__registro-label" for="producto-id">Codigo de barras del producto</label>
                    <input type="text" class="registrar-ventas_registro-id" id="producto-id" autofocus>
                    <label class="registrar-ventas__registro-label" for="producto-nombre">Nombre del producto</label>
                    <select class="registrar-ventas_registro-nombre" id="producto-nombre">
                        <option>Producto</option>
                    </select>
                    <div class="registrar-ventas__container-cant">
                        <label class="registrar-ventas__registro-label" for="product-cantidad">Cantidad</label>
                    <input type="number" class="registrar-ventas_registro-cantidad" id="product-cantidad">
                    </div>
                    <button class="registrar-ventas__registro-boton-buscar-producto boton">Ver Productos</button>
                    <button class="registrar-ventas__registro-boton-agregar boton">
                    </button>
                </form>
            </div>
        </section>


        <section class="registrar-ventas__container-botones container-botones box-shadow">
            <section class="registrar-ventas__container-boton">
                <button class="registrar-ventas__boton-cancelar-venta boton" >
                    Cancelar Venta
                </button>
            </section>
            <section class="registrar-ventas__container-boton">
                <button type="button" class="registrar-ventas__boton-vender boton" value="Vender">
                    Vender
                </button>
            </section>
        </section>

        <section class="registrar-ventas__container-modal transparent-container-modal">
            
            <!-- Este es el modal para ver los productos registrados en el sistema -->

            <dialog class="registrar-ventas__modal-lista-filtro-productos">
                <span class="registrar-ventas__modal-lista-filtro-productos-btn-cerrar dialog-btn-cerrar">X</span>
                <h2 class="registrar-ventas__modal-lista-filtro-productos-title dialog-title">Lista de Productos</h2>

                <section class="registrar-ventas__container-filter-lista-productos container-filter">
                    <div class="registrar-ventas__filtro">
                        <h2 class="registrar-ventas__filtro-titulo filtro-title">Busca un Producto</h2>
                        <form class="registrar-ventas__filtro-form filtro-form" action="">
                            <section class="registrar-ventas__filtro-input-container">
                                <label class="registrar-ventas__filtro-label filtro-label" for="product-id">Por codigo de barras del producto</label>
                                <input type="text" class="registrar-ventas_filtro-id" id="product-id">
                            </section>
                            <section class="registrar-ventas__filtro-input-container">
                                <label class="registrar-ventas__filtro-label filtro-label" for="product-nombre">Por nombre del producto</label>
                                <input type="text" class="registrar-ventas_filtro-nombre" id="product-nombre">
                            </section>
                            <section class="registrar-ventas__filtro-input-container">
                                <label class="registrar-ventas__filtro-label filtro-label" for="product-proveedor">Por nombre del proveedor</label>
                                <input type="text" class="registrar-ventas_filtro-proveedor" id="product-proveedor">
                            </section>
                            <section class="registrar-ventas__filtro-input-container">
                                <label class="registrar-ventas__filtro-label filtro-label" for="product-id">Por tipo de presentacion</label>
                                <select name="presentacion" class="registrar-ventas_filtro-presentacion" id="product-presentacion">
                                    <option value="null">Presentacion</option>
                                    <option value="Pre">Pre1</option>
                                    <option value="Pre">Pre2</option>
                                    <option value="Pre">Pre3</option>
                                    <option value="Pre">Pre4</option>
                                </select>
                            </section>
                        </form>
                    </div>
                </section>

                <section class="registrar-ventas__modal-lista-filtro-productos-table-container container-table">
                    <table class="registrar-ventas__modal-lista-filtro-productos__table table">
                        <thead class="table-thead">
                            <tr class="table-tr">
                                <td class="table-td">ProCodBarr</td>
                                <td class="table-td">Descripcion</td>
                                <td class="table-td">UbicacionFisica</td>
                                <td class="table-td">Presentacion</td>
                                <td class="table-td">UnidadMedida</td>
                                <td class="table-td">PrecioVenta</td>
                                <td class="table-td">FechaVenc</td>
                                <td class="table-td">Laboratorio</td>
                                <td class="table-td">CodPro</td>
                                <td class="table-td">CodInvt</td>
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
                                <td>1354648469231</td>
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

            <!-- Este es el modal de cancelar una venta -->

            <dialog class="registrar-ventas__modal-cancelar-venta">
                <h2 class="registrar-ventas__modal-cancelar-venta-title dialog-title">¡Ten cuidado!</h2>
                <p class="registrar-ventas__modal-cancelar-venta-text dialog-text">
                    ¿Estas seguro de cancelar esta venta?<br>
                    Recuerda que una vez cancelada, se borraran todos los productos a vender y toda la infomacion relacionada a esta venta.
                </p>

                </div>
                <div class="registrar-ventas__modal-cancelar-venta-btns-container dialog-container-bts">
                    <button class="registrar-ventas__modal-cancelar-venta-btn-cancelar dialog-btn boton">Cancelar</button>
                    <button class="registrar-ventas__modal-cancelar-venta-btn-confirmar dialog-btn boton">Confirmar</button>
                </div>
            </dialog>
        </section>
    </main>

    <script src="../js/modulo_ventas_registrar_ver_modal_productos.js"></script>
    <script src="../js/modulo_ventas_registrar_cancelar_venta.js"></script>
</body>
</html>