<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo(URL_RAIZ); ?>public/css/ventas-registrar.css">
    <link rel="shortcut icon" href="<?php echo(URL_FAVICON); ?>" type="image/x-icon">
    <title>Registrar Ventas</title>
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
                <!-- Usaremos este template para pintar cada producto en la lista de productos para vender -->
                <template class="registrar-ventas__lista-productos-template-producto">
                    <figure class="registrar-ventas__lista-producto contenedor-objetos__objeto box-shadow">
                        <div class="registrar-ventas__lista-producto-img contenedor-objetos__objeto-img">
                            <img src="<?php echo(URL_RAIZ); ?>public/imagenes/corazon-icono.svg" alt="">
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
                                <img src="<?php echo(URL_RAIZ); ?>public/imagenes/delete-icono.svg" alt="">
                            </section>
                        </div>
                    </figure>
                </template>
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
                    <input 
                    name="codigoBarrasProducto"
                    type="text" 
                    class="registrar-ventas_registro-id" 
                    id="producto-id" 
                    autofocus
                    >
                    
                    <label class="registrar-ventas__registro-label" for="producto-nombre">Nombre del producto</label>
                    <select
                    name="nombreProducto" 
                    class="registrar-ventas_registro-nombre" 
                    id="producto-nombre"
                    >
                        <option value="" data-pro-cod-barras ></option>

                        <?php foreach($this->data['infoProductos'] as $key => $value): ?>
                        <option 
                        value="<?php echo $value['ProDescripcion'] ?>" 
                        data-pro-cod-barras="<?php echo $value['ProCodBarras'] ?>"><?php echo $value['ProDescripcion'] ?></option>
                        <?php endforeach; ?>
                        
                    </select>
                    <div class="registrar-ventas__container-cant">
                        <label class="registrar-ventas__registro-label" for="product-cantidad">Cantidad</label>
                    <input 
                    name="cantidadProducto"
                    type="number" 
                    class="registrar-ventas_registro-cantidad" 
                    id="product-cantidad"
                    >
                    </div>
                    <button class="registrar-ventas__registro-boton-buscar-producto boton">Ver Productos</button>
                    <button class="registrar-ventas__registro-boton-agregar boton"></button>
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
                                    <option value="">Presentacion</option>
                                    <option value="TABLETA">TABLETA</option>
                                    <option value="JARABE">JARABE</option>
                                    <option value="CAPSULA">CAPSULA</option>
                                    <option value="COMPRIMIDO">COMPRIMIDO</option>
                                    <option value="GRAGEA O TABLETA RECUBIERTA">GRAGEA O TABLETA RECUBIERTA</option>
                                    <option value="PILDORA">PILDORA</option>
                                    <option value="INHALADOR">INHALADOR</option>
                                    <option value="BOTELLA">BOTELLA</option>
                                    <option value="TUBO COLAPSIBLE DE ALUMINIO">TUBO COLAPSIBLE DE ALUMINIO</option>
                                    <option value="FRASCO X 300 ML DE SOLUCIÓN INYECTABLE">FRASCO X 300 ML DE SOLUCIÓN INYECTABLE</option>
                                    <option value="GRANULOS">GRANULOS</option>
                                    <option value="100 ML DE JARABE">100 ML DE JARABE</option>
                                    <option value="CREMA TOPICA">CREMA TOPICA</option>
                                </select>
                            </section>
                        </form>
                    </div>
                </section>

                <section class="registrar-ventas__modal-lista-filtro-productos-table-container container-table">
                    <table class="registrar-ventas__modal-lista-filtro-productos__table table">
                        <thead class="table-thead">
                            <tr class="table-tr">
                                <td class="table-td">Codigo de Barras</td>
                                <td class="table-td">Descripcion</td>
                                <td class="table-td">Ubicacion Fisica</td>
                                <td class="table-td">Presentacion</td>
                                <td class="table-td">Unidad de Medida</td>
                                <td class="table-td">Precio de Venta</td>
                                <td class="table-td">Laboratorio</td>
                                <td class="table-td">Registro INVIMA</td>
                                <td class="table-td">NIT Proveedor</td>
                                <td class="table-td">Proveedor</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($this->data['infoProductos'] as $key => $value): ?>
                                <tr data-pro-cod-barras=<?php echo $value["ProCodBarras"] ?>>
                                    <td><?php echo $value["ProCodBarras"] ?></td>
                                    <td><?php echo $value["ProDescripcion"] ?></td>
                                    <td><?php echo $value["ProUbicacionFisica"] ?></td>
                                    <td><?php echo $value["ProPresentacion"] ?></td>
                                    <td><?php echo $value["ProUnidadMedida"] ?></td>
                                    <td><?php echo $value["ProPrecioVenta"] ?></td>
                                    <td><?php echo $value["ProLaboratorio"] ?></td>
                                    <td><?php echo $value["ProRegSanInvima"] ?></td>
                                    <td><?php echo $value["tbl_proveedores_ProNIT"] ?></td>
                                    <td><?php echo $value["ProNombre"] ?></td>
                                </tr>
                            <?php endforeach;?>
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

                <div class="registrar-ventas__modal-cancelar-venta-btns-container dialog-container-bts">
                    <button class="registrar-ventas__modal-cancelar-venta-btn-cancelar dialog-btn boton">Cancelar</button>
                    <button class="registrar-ventas__modal-cancelar-venta-btn-confirmar dialog-btn boton">Confirmar</button>
                </div>
            </dialog>

            <!-- Estos son los modals para poder confirmar una venta -->

            <dialog class="registrar-ventas__modal-confirmar-venta">
                <h2 class="registrar-ventas__modal-confirmar-venta-title dialog-title">Informaci&oacute;n adicional</h2>
                <form class="registrar-ventas__modal-confirmar-venta-form dialog-main-content">
                    <div class="registrar-ventas__modal-confirmar-venta-form-info-venta">
                        <h3 class="registrar-ventas__modal-confirmar-venta-item-title">Numero de documento del cliente</h3>
                        <input class="registrar-ventas__modal-confirmar-venta-item" type="text" placeholder="Documento">
                        <h3 class="registrar-ventas__modal-confirmar-venta-item-title">Forma de pago</h3>
                        <select class="registrar-ventas__modal-confirmar-venta-item">
                            <option value="">Forma de pago</option>
                        </select>
                    </div>
                    <div class="registrar-ventas__modal-confirmar-venta-form-info-precios">
                        <h3 class="registrar-ventas__modal-confirmar-venta-item-title">Total a Pagar</h3>
                        <p class="registrar-ventas__modal-confirmar-venta-item registrar-ventas__modal-confirmar-venta-item--total">$ 56000 Pesos</p>
                        <h3 class="registrar-ventas__modal-confirmar-venta-item-title">Recibe</h3>
                        <input class="registrar-ventas__modal-confirmar-venta-item" type="text" >
                        <h3 class="registrar-ventas__modal-confirmar-venta-item-title">Cambio</h3>
                        <p class="registrar-ventas__modal-confirmar-venta-item">$0 Pesos</p>
                    </div>
                </form>
                <div class="registrar-ventas__modal-confirmar-venta-btns-container dialog-container-bts">
                    <button class="registrar-ventas__modal-confirmar-venta-btn-cancelar dialog-btn boton">Cancelar</button>
                    <button class="registrar-ventas__modal-confirmar-venta-btn-confirmar dialog-btn boton">Confirmar</button>
                </div>
            </dialog>

            <dialog class="registrar-ventas__modal-venta-exitosa dialog-process-result">
                <h2>¡Exelente!</h2>
                <p>Has registrado tu venta exitosamente</p>
                <button class="registrar-ventas__modal-venta-exitosa-btn dialog-process-result__btn boton" >Ok</button>
            </dialog>
            
            <dialog class="registrar-ventas__modal-venta-fallo-por-cliente dialog-process-result">
                <h2>¡Cliente no registrado!</h2>
                <p>Desea registrarlo o pasarlo como anonimo</p>
                <button class="registrar-ventas__modal-venta-fallo-por-cliente-btn-registrar dialog-process-result__btn boton">Anonimo</button>
                <button class="registrar-ventas__modal-venta-fallo-por-cliente-btn-anonimo dialog-process-result__btn boton">Registrar</button>
            </dialog>


            <!-- Estos son los modals para cuando no se encuentre el cliente y se necesite agregar uno -->
            <dialog class="registrar-ventas__modal-agregar-cliente">
                <h2 class="registrar-ventas__modal-agregar-cliente-title dialog-title">Registra Nuevos Clientes</h2>
                <form class="registrar-ventas__modal-agregar-cliente-form dialog-main-content">
                    <input type="text" placeholder="Numero de documento del cliente">
                    <input type="text" placeholder="Correo">
                    <input type="text" placeholder="Nombres">
                    <input type="text" placeholder="Direcci&oacute;n">
                    <input type="text" placeholder="Apellidos">
                    <input type="text" placeholder="Telefono">
                </form>
                <div class="registrar-ventas__modal-agregar-cliente-btns-container dialog-container-bts">
                    <button class="registrar-ventas__modal-agregar-cliente-btn-cancelar boton dialog-btn">Cancelar</button>
                    <button class="registrar-ventas__modal-agregar-cliente-btn-añadir boton dialog-btn">A&ntilde;adir</button>
                </div>
            </dialog>

            <dialog  class="registrar-ventas__modal-agregar-cliente-confirmacion">
                <h2 class="registrar-ventas__modal-agregar-cliente-title-confirmacion dialog-title">Verifica los Datos</h2>
                <p class="registrar-ventas__modal-agregar-cliente-text-confirmacion dialog-text">
                    ¿Estas seguro de registrar este cliente?<br>
                    Recuerda revisar detenidamente la informacion del cliente que estas registrando.
                </p>
                <div class="registrar-ventas__modal-agregar-cliente-info-confirmacion dialog-main-content">
                    <section class="registrar-ventas__modal-agregar-cliente-info-item-confirmacion">
                        <h3>DOCUMENTO DEL CLIENTE</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="registrar-ventas__modal-agregar-cliente-info-item-confirmacion">
                        <h3>CORREO</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="registrar-ventas__modal-agregar-cliente-info-item-confirmacion">
                        <h3>NOMBRE/S DEL CLIENTE</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="registrar-ventas__modal-agregar-cliente-info-item-confirmacion">
                        <h3>DIRECCI&Oacute;N</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="registrar-ventas__modal-agregar-cliente-info-item-confirmacion">
                        <h3>APELLIDO/S DEL CLIENTE</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="registrar-ventas__modal-agregar-cliente-info-item-confirmacion">
                        <h3>TELEFONO</h3>
                        <p>________________________________________________</p>
                    </section>
                </div>
                <div class="registrar-ventas__modal-agregar-cliente-confirmacion-btns-container dialog-container-bts">
                    <button class="registrar-ventas__modal-agregar-cliente-confirmacion-btn-cancelar dialog-btn boton">Volver Atras</button>
                    <button class="registrar-ventas__modal-agregar-cliente-confirmacion-btn-confirmar dialog-btn boton">Confirmar</button>
                </div>
            </dialog>

            <dialog class="registrar-ventas__modal-agregacion-exitosa dialog-process-result">
                <h2>¡Exelente!</h2>
                <p>Has registrado un nuevo cliente exitosamente</p>
                <button class="registrar-ventas__modal-agregacion-exitosa-btn dialog-process-result__btn boton" >Ok</button>
            </dialog>
            
            <dialog class="registrar-ventas__modal-agregacion-fallo dialog-process-result">
                <h2>¡Algo salio mal!</h2>
                <p>Este cliente no pudo ser registrado, porque posiblemente ya esta registrado en el sistema</p>
                <button class="registrar-ventas__modal-agregacion-fallo-btn dialog-process-result__btn boton" >Ok</button>
            </dialog>
        </section>
    </main>

    <script> 
        /* Se puso var porque queremos que pueda usarse en todos los contextos, 
        independientemente de si esta en una funcion anonima autoejecutable */
        var URL_RAIZ = "<?php echo URL_RAIZ ?>"
    </script>
    <script src="<?php echo(URL_RAIZ); ?>public/js/modulo_ventas_registrar_agregar_productos.js"></script>
    <script src="<?php echo(URL_RAIZ); ?>public/js/modulo_ventas_registrar_ver_modal_productos.js"></script>
    <script src="<?php echo(URL_RAIZ); ?>public/js/modulo_ventas_registrar_cancelar_venta.js"></script>
    <script src="<?php echo(URL_RAIZ); ?>public/js/modulo_ventas_confirmar_venta.js"></script>
</body>
</html>