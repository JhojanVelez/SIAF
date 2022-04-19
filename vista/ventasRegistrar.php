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
            <h1 class="registrar-ventas__titulo">Registra Tus Ventas</h1>
        </section>

        <section class="registrar-ventas__container-lista-productos contenedor-objetos box-shadow">
            <div class="registrar-ventas__lista-productos-title contenedor-objetos__title">
                <h2>Productos Para Vender</h2>
            </div>
            <div class="registrar-ventas__lista-productos-contenido contenedor-objetos__contenido box-shadow">
                <!-- Usaremos este template para pintar cada producto en la lista de productos para vender -->
                <template class="registrar-ventas__lista-productos-template-producto">
                    <figure class="registrar-ventas__lista-producto contenedor-objetos__objeto box-shadow" data-codigo-producto="">
                        <div class="registrar-ventas__lista-producto-img contenedor-objetos__objeto-img">
                            <img src="<?php echo(URL_RAIZ); ?>public/imagenes/corazon-icono.png" alt="">
                        </div>
                        <div class="registrar-ventas__lista-producto-info">
                            <h4 class="registrar-ventas__lista-producto-info-title">C&Oacute;DIGO</h4>
                            <p class="registrar-ventas__lista-producto-data"></p>
                            <h4 class="registrar-ventas__lista-producto-info-title">NOMBRE DE PRODUCTO</h4>
                            <p class="registrar-ventas__lista-producto-data"></p>
                            <h4 class="registrar-ventas__lista-producto-info-title">CANTIDAD</h4>
                            <p class="registrar-ventas__lista-producto-data"></p>
                        </div>
                        <div class="registrar-ventas__lista-producto-precios">
                            <section class="registrar-ventas__lista-producto-precio">
                                <h4>PRECIO UNIDAD</h4>
                                <p> <strong class="registrar-ventas__lista-producto-data" >$</strong></p>
                            </section>
                            <section class="registrar-ventas__lista-producto-precio">
                                <h4>PRECIO TOTAL</h4>
                                <p><strong class="registrar-ventas__lista-producto-data" >$</strong></p>
                            </section>
                        </div>
                        <div class="registrar-ventas__lista-producto-botones contenedor-objetos__objeto-botones">
                            <section class="registrar-ventas__lista-producto-boton contenedor-objetos__objeto-boton">
                                <img src="<?php echo(URL_RAIZ); ?>public/imagenes/delete-icono.png" alt="">
                            </section>
                        </div>
                    </figure>
                </template>
            </div>
            <div class="registrar-ventas__lista-productos-totales">
                <section class="registrar-ventas__total">
                    <h3>Cantidad Total</h3>
                    <p class="registrar-ventas__lista-productos-totales-data" >0</p>
                </section>
                <section class="registrar-ventas__total">
                    <h3>Precio Total</h3>
                    <p class="registrar-ventas__lista-productos-totales-data" >$0</p>
                </section>
            </div>
        </section>

    
        <section class="registrar-ventas__container-registro container-filter  box-shadow">
            <div class="registrar-ventas__registro">
                <form class="registrar-ventas__registro-form" action="">
                    <label class="registrar-ventas__registro-label" for="producto-id">C&oacute;digo de barras del producto</label>
                    <input 
                    name="codigoBarrasProducto"
                    type="text" 
                    class="registrar-ventas_registro-id" 
                    id="producto-id" 
                    autofocus
                    data-input
                    >
                    
                    <label class="registrar-ventas__registro-label" for="producto-nombre">Nombre del producto</label>
                    <select
                    name="nombreProducto" 
                    class="registrar-ventas_registro-nombre" 
                    id="producto-nombre"
                    data-input
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
                    max="1000"
                    data-input
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
                <input 
                disabled 
                type="button" 
                class="registrar-ventas__boton-vender boton" 
                value="Vender"
                title="Por favor agrega un producto a la lista de productos para vender, para poder continuar"
                >
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
                                <label class="registrar-ventas__filtro-label filtro-label" for="product-id">Por c&oacute;digo de barras del producto</label>
                                <input 
                                name="codigoBarrasProducto"
                                type="text" 
                                class="registrar-ventas_filtro-id" 
                                id="product-id"
                                autocomplete="off"
                                >
                            </section>
                            <section class="registrar-ventas__filtro-input-container">
                                <label class="registrar-ventas__filtro-label filtro-label" for="product-nombre">Por nombre del producto</label>
                                <input 
                                name="descripcionProducto"
                                type="text" 
                                class="registrar-ventas_filtro-nombre" 
                                id="product-nombre"
                                autocomplete="off"
                                >
                            </section>
                            <section class="registrar-ventas__filtro-input-container">
                                <label class="registrar-ventas__filtro-label filtro-label" for="product-proveedor">Por nombre del proveedor</label>
                                <input 
                                name="nomProveedorProducto"
                                type="text" 
                                class="registrar-ventas_filtro-proveedor" 
                                id="product-proveedor"
                                autocomplete="off"
                                >
                            </section>
                            <section class="registrar-ventas__filtro-input-container">
                                <label class="registrar-ventas__filtro-label filtro-label" for="product-id">Por tipo de presentaci&oacute;n</label>
                                <select 
                                name="presentacionProducto"
                                class="registrar-ventas_filtro-presentacion" 
                                id="product-presentacion"
                                autocomplete="off"
                                >
                                    <option value="">Presentaci&oacute;n</option>
                                    <option value="TABLETA">TABLETA</option>
                                    <option value="JARABE">JARABE</option>
                                    <option value="CAPSULA">CAPSULA</option>
                                    <option value="COMPRIMIDO">COMPRIMIDO</option>
                                    <option value="GRAGEA O TABLETA RECUBIERTA">GRAGEA O TABLETA RECUBIERTA</option>
                                    <option value="PILDORA">PILDORA</option>
                                    <option value="INHALADOR">INHALADOR</option>
                                    <option value="BOTELLA">BOTELLA</option>
                                    <option value="TUBO COLAPSIBLE DE ALUMINIO">TUBO COLAPSIBLE DE ALUMINIO</option>
                                    <option value="FRASCO X 300 ML DE SOLUCIÓN INYECTABLE">FRASCO X 300 ML DE SOLUCI&Oacute;N INYECTABLE</option>
                                    <option value="GRANULOS">GRANULOS</option>
                                    <option value="100 ML DE JARABE">100 ML DE JARABE</option>
                                    <option value="CREMA TOPICA">CREMA TOPICA</option>
                                </select>
                            </section>
                        </form>
                    </div>
                </section>

                <section class="registrar-ventas__modal-lista-filtro-productos-table-container container-table box-shadow">
                    <table class="registrar-ventas__modal-lista-filtro-productos__table registrar-ventas__table table">
                        <thead class="table-thead">
                            <tr class="table-tr">
                                <td class="table-td">C&oacute;digo de Barras</td>
                                <td class="table-td">Descripci&oacute;n</td>
                                <td class="table-td">Ubicaci&oacute;n F&iacute;sica</td>
                                <td class="table-td">Stock</td>
                                <td class="table-td">Presentaci&oacute;n</td>
                                <td class="table-td">Unidad de Medida</td>
                                <td class="table-td">Precio de Venta</td>
                                <td class="table-td">Laboratorio</td>
                                <td class="table-td">Proveedor</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($this->data['infoProductos'] as $key => $value): ?>
                                <tr 
                                class="registrar-ventas__table-tboby-tr"
                                data-pro-cod-barras=<?php echo $value["ProCodBarras"] ?>>
                                    <td><?php echo $value["ProCodBarras"] ?></td>
                                    <td><?php echo $value["ProDescripcion"] ?></td>
                                    <td><?php echo $value["ProUbicacionFisica"] ?></td>
                                    <td 
                                    class="
                                        <?php
                                            if($value["InvStock"] <= 0) {
                                                echo("registrar-ventas__table-stock-red");
                                            } else if ($value["InvStock"] > 0 && $value["InvStock"] <= 10) {
                                                echo("registrar-ventas__table-stock-orange");
                                            } else {
                                                echo("registrar-ventas__table-stock-green");
                                            }
                                        ?>
                                    ">
                                    <?php echo $value["InvStock"] ?>
                                    </td>
                                    <td><?php echo $value["ProPresentacion"] ?></td>
                                    <td><?php echo $value["ProUnidadMedida"] ?></td>
                                    <td><?php echo $value["ProPrecioVenta"] ?></td>
                                    <td><?php echo $value["ProLaboratorio"] ?></td>
                                    <td><?php echo $value["ProNombre"] ?></td>
                                </tr>
                            <?php endforeach;?>
                        </tbody>

                        <!-- 
                        Este template nos permite imprimir la informacion cuando estamos buscando por atributo
                        pero en este caso lo hacemos con template para hacer uso de los fragmentos
                    -->
                    <template class="registrar-ventas__table-template">
                        <tr 
                        class="registrar-ventas__table-tboby-tr"
                        data-pro-cod-barras
                        >
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
                    </table>
                </section>
            </dialog>

            <!-- Este es el modal de cancelar una venta -->

            <dialog class="registrar-ventas__modal-cancelar-venta">
                <h2 class="registrar-ventas__modal-cancelar-venta-title dialog-title">¡Ten cuidado!</h2>
                <p class="registrar-ventas__modal-cancelar-venta-text dialog-text">
                    ¿Estas seguro de cancelar esta venta?<br>
                    Recuerda que una vez cancelada, se borraran todos los productos a vender y toda la infomaci&oacute;n relacionada con esta venta.
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
                
                        <section class="dialog-main-content__input-container">
                            <label class="dialog-main-content__label">Documento del Cliente</label>
                            <input 
                            name="docCliente" 
                            class="registrar-ventas__modal-confirmar-venta-item" 
                            type="text"
                            autocomplete="off"
                            >
                        </section>

                        <section class="dialog-main-content__input-container modal-confirmar-venta-form-container-nombre-cliente box-shadow">
                            <label class="dialog-main-content__label">Nombre del Cliente</label>
                            <div class="modal-confirmar-venta-form-container-nombre-cliente__no-disponible">
                                <p>Cliente NO registrado ¿Desea registrarlo o pasarlo como an&oacute;nimo?</p>
                                <button class="registrar-ventas__modal-confirmar-venta-form-btn-registrar-cliente dialog-process-result__btn boton">Registrar</button>
                                <button class="registrar-ventas__modal-confirmar-venta-form-btn-registrar-anonimo dialog-process-result__btn boton">Anonimo</button>
                            </div>
                            <p class="modal-confirmar-venta-form-container-nombre-cliente__disponible">JHOJAN SMITH VELEZ GOMEZ</p>
                        </section>
                        
                        <section class="dialog-main-content__input-container">
                            <label class="dialog-main-content__label">Total a Pagar</label>
                            <p class="registrar-ventas__modal-confirmar-venta-item registrar-ventas__modal-confirmar-venta-item--total">$</p>
                        </section>

                        <section class="dialog-main-content__input-container">
                            <label class="dialog-main-content__label">Forma de pago</label>
                            <select 
                            name="formaPago" 
                            class="registrar-ventas__modal-confirmar-venta-item"
                            >
                                <option value="EFECTIVO">Efectivo</option>
                                <option value="TARJETA DEBITO">Tarjeta de crédito</option>
                                <option value="TARJETA CREDITO">Tarjeta de débito</option>
                            </select>
                        </section>

                        <section class="dialog-main-content__input-container">
                            <label class="dialog-main-content__label">Recibe</label>
                            <input 
                            name="recibe" 
                            class="registrar-ventas__modal-confirmar-venta-item" 
                            type="number" 
                            >
                        </section>

                        <section class="dialog-main-content__input-container">
                            <label class="dialog-main-content__label">Cambio</label>
                            <p class="registrar-ventas__modal-confirmar-venta-item">$0 Pesos</p>
                        </section>
                </form>
                <div class="registrar-ventas__modal-confirmar-venta-btns-container dialog-container-bts">
                    <button class="registrar-ventas__modal-confirmar-venta-btn-cancelar dialog-btn boton">Cancelar</button>
                    <button class="registrar-ventas__modal-confirmar-venta-btn-confirmar dialog-btn boton">Confirmar</button>
                </div>
            </dialog>

            <dialog class="registrar-ventas__modal-venta-exitosa dialog-process-result">
                <h2>¡Excelente!</h2>
                <p>Has registrado tu venta exitosamente</p>
                <button class="registrar-ventas__modal-venta-exitosa-btn dialog-process-result__btn boton" >Ok</button>
            </dialog>

            <dialog class="registrar-ventas__modal-venta-fallo dialog-process-result">
                <h2>Algo salio mal</h2>
                <p>No se pudo registrar la venta</p>
                <button class="registrar-ventas__modal-venta-fallo-btn dialog-process-result__btn boton" >Ok</button>
            </dialog>
            
            <dialog class="registrar-ventas__modal-venta-fallo-por-cliente dialog-process-result">
                <h2>¡Cliente no registrado!</h2>
                <p>¿Desea registrarlo o pasarlo como an&oacute;nimo?</p>
                <button class="registrar-ventas__modal-venta-fallo-por-cliente-btn-registrar dialog-process-result__btn boton">Registrar</button>
                <button class="registrar-ventas__modal-venta-fallo-por-cliente-btn-anonimo dialog-process-result__btn boton">Anonimo</button>
            </dialog>


            <!-- Estos son los modals para cuando no se encuentre el cliente y se necesite agregar uno -->
            <dialog class="registrar-ventas__modal-agregar-cliente">
                <h2 class="registrar-ventas__modal-agregar-cliente-title dialog-title">Registra Nuevos Clientes</h2>
                <form class="registrar-ventas__modal-agregar-cliente-form dialog-main-content">
                    <section class="dialog-main-content__input-container">
                        <label class="dialog-main-content__label">Documento del Cliente</label>
                        <input 
                        name="documento"
                        type="text"
                        maxlength="15"
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
                        id="nombreCliente"
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
                        <label class="dialog-main-content__label">Tel&oacute;fono del Cliente</label>
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
                <div class="registrar-ventas__modal-agregar-cliente-btns-container dialog-container-bts">
                    <button class="registrar-ventas__modal-agregar-cliente-btn-cancelar boton dialog-btn">Cancelar</button>
                    <button class="registrar-ventas__modal-agregar-cliente-btn-añadir boton dialog-btn">A&ntilde;adir</button>
                </div>
            </dialog>

            <dialog  class="registrar-ventas__modal-agregar-cliente-confirmacion">
                <h2 class="registrar-ventas__modal-agregar-cliente-title-confirmacion dialog-title">Verifica los Datos</h2>
                <p class="registrar-ventas__modal-agregar-cliente-text-confirmacion dialog-text">
                    ¿Est&oacute;s seguro de registrar este cliente?<br>
                    Recuerda revisar detenidamente la informaci&oacute;n del cliente que est&oacute;s registrando.
                </p>
                <div class="registrar-ventas__modal-agregar-cliente-info-confirmacion dialog-main-content">
                    <section class="registrar-ventas__modal-agregar-cliente-info-item-confirmacion" data-CliDocIdentidad>
                        <h3 class="dialog-main-content__label">Documento del Cliente</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="registrar-ventas__modal-agregar-cliente-info-item-confirmacion" data-CliCorreo>
                        <h3 class="dialog-main-content__label">Correo Electr&oacute;nico del Cliente</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="registrar-ventas__modal-agregar-cliente-info-item-confirmacion" data-CliNombre>
                        <h3 class="dialog-main-content__label">Nombre/s del Cliente</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="registrar-ventas__modal-agregar-cliente-info-item-confirmacion" data-CliDireccion>
                        <h3 class="dialog-main-content__label">Direcci&oacute;n del Cliente</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="registrar-ventas__modal-agregar-cliente-info-item-confirmacion" data-CliApellido>
                        <h3 class="dialog-main-content__label">Apellido/s del Cliente</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="registrar-ventas__modal-agregar-cliente-info-item-confirmacion" data-CliTelefono>
                        <h3 class="dialog-main-content__label">Tel&eacute;fono del Cliente</h3>
                        <p>________________________________________________</p>
                    </section>
                </div>
                <div class="registrar-ventas__modal-agregar-cliente-confirmacion-btns-container dialog-container-bts">
                    <button class="registrar-ventas__modal-agregar-cliente-confirmacion-btn-cancelar dialog-btn boton">Volver Atras</button>
                    <button class="registrar-ventas__modal-agregar-cliente-confirmacion-btn-confirmar dialog-btn boton">Confirmar</button>
                </div>
            </dialog>

            <dialog class="registrar-ventas__modal-agregar-cliente-agregacion-exitosa dialog-process-result">
                <h2>¡Excelente!</h2>
                <p>Has registrado un nuevo cliente exitosamente</p>
                <button class="registrar-ventas__modal-agregar-cliente-agregacion-exitosa-btn dialog-process-result__btn boton" >Ok</button>
            </dialog>
            
            <dialog class="registrar-ventas__modal-agregar-cliente-agregacion-fallo dialog-process-result">
                <h2>¡Algo salio mal!</h2>
                <p>Este cliente no pudo ser registrado, porque posiblemente ya esta registrado en el sistema</p>
                <button class="registrar-ventas__modal-agregar-cliente-agregacion-fallo-btn dialog-process-result__btn boton" >Ok</button>
            </dialog>
        </section>
    </main>

    <script> 
        /* Se puso var porque queremos que pueda usarse en todos los contextos, 
        independientemente de si esta en una funcion anonima autoejecutable */
        var URL_RAIZ = "<?php echo URL_RAIZ ?>"
    </script>
    <script src="<?php echo(URL_RAIZ); ?>public/js/modulo_ventas_registrar_agregar_productos.js" type="module"></script>
    <script src="<?php echo(URL_RAIZ); ?>public/js/modulo_ventas_registrar_ver_modal_productos.js"></script>
    <script src="<?php echo(URL_RAIZ); ?>public/js/modulo_ventas_registrar_cancelar_venta.js"></script>
    <script src="<?php echo(URL_RAIZ); ?>public/js/modulo_ventas_registrar_confirmar_venta.js" type="module"></script>
    <script src="<?php echo(URL_RAIZ); ?>public/js/modulo_ventas_registrar_agregar_cliente.js" type="module"></script>
    <script src="<?php echo(URL_RAIZ); ?>public/js/modulo_ventas_registrar_pintar_red_orange_green.js"></script>
    <script src="<?php echo(URL_RAIZ); ?>public/js/cualquier_modulo_pintar_borde_derecho_input.js"></script>
    <script src="<?php echo(URL_RAIZ); ?>public/js/modulo_ventas_registrar_buscar_producto_por_atributos.js" type="module"></script>
</body>
</html>