<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo(URL_RAIZ); ?>public/css/productos.css">
    <link rel="shortcut icon" href="<?php echo(URL_FAVICON); ?>" type="image/x-icon">
    <title>Productos</title>
</head>
<body>
    <?php
    require("nav.php");
    ?>
    <main class="productos grid-container-main">
        <section class="productos__container-title container-title box-shadow">
            <h1 class="productos__titulo">Gestiona Tus Productos</h1>
        </section>


        <section class="productos__container-table container-table box-shadow">
            <table class="productos__table tabla">
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
                        <tr>
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
                    
                    <!-- 
                        Este template nos permite imprimir la informacion cuando estamos buscando por atributo
                        pero en este caso lo hacemos con template para hacer uso de los fragmentos
                    -->
                    <template class="productos__table-template">
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
                            <td></td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </section>


        <section class="productos__container-filter container-filter  box-shadow">
            <div class="productos__filtro">
                <h2 class="productos__filtro-titulo">Busca un Producto</h2>
                <form 
                id="productos__filtro-form" 
                class="productos__filtro-form" 
                action="<?php echo URL_RAIZ ?>productos/generarReporte" 
                method="POST" 
                target="_BLANK"
                >
                    <label class="productos__filtro-label" for="product-id">Por codigo de barras del producto</label>
                    <br>
                    <input 
                    name="codigoBarras"
                    type="text" 
                    class="productos_filtro-id" 
                    autocomplete="off"
                    data-input
                    >
                    <br>
                    <label class="productos__filtro-label" for="product-nombre">Por nombre del producto</label>
                    <br>
                    <input 
                    name="descripcion"
                    type="text" 
                    class="productos_filtro-nombre"
                    autocomplete="off"
                    data-input
                    >
                    <br>
                    <label class="productos__filtro-label" for="product-proveedor">Por nombre del proveedor</label>
                    <br>
                    <input 
                    name="nomProveedor"
                    type="text" 
                    class="productos_filtro-proveedor"
                    autocomplete="off"
                    data-input
                    >
                    <br>
                    <label class="productos__filtro-label" for="product-id">Por tipo de presentacion</label>
                    <br>
                    <select 
                    name="presentacion" 
                    class="productos_filtro-presentacion" 
                    autocomplete="off"
                    data-input
                    >
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
                    
                </form>
                <div class="productos_filtro-gen-repo">
                    <div class="productos_filtro-gen-repo-img filtro-gen-repo-img">
                        <img src="<?php echo(URL_RAIZ); ?>public/imagenes/informe.svg" alt="">
                    </div>
                    <input 
                    class="productos__filtro-subtitulo-reporte filtro-subtitulo-reporte" 
                    type="submit" 
                    value="Generar Reporte" 
                    form="productos__filtro-form"
                    >
                </div>
            </div>
        </section>


        <section class="productos__container-botones container-botones box-shadow">
            <section class="productos__container-boton">
                <input disabled type="button" class="productos__boton-inhabilitar boton" value="Inhabilitar" title="Recuerda seleccionar un producto de la lista para poder inhabilitarlo">
            </section>
            <section class="productos__container-boton">
                <input disabled type="button" class="productos__boton-editar boton" value="Editar" title="Recuerda seleccionar un producto de la lista para poder editar">
            </section>
            <section class="productos__container-boton">
                <input type="button" class="productos__boton-agregar boton" value="Agregar">
            </section>
            <section class="productos__container-boton">
                <input type="button" class="productos__boton-ver-inhabilitados boton" value="Ver productos inhabilitados">
            </section>
        </section>



        
        <section class="productos__container-modal transparent-container-modal">

            <!-- Estos son los modals para inhabilitar un producto -->
            <dialog class="productos__modal-inhabilitar-producto">
                <h2 class="productos__modal-inhabilitar-producto-title dialog-title">¡Ten cuidado!</h2>
                <p class="productos__modal-inhabilitar-producto-text dialog-text">
                    ¿Estas seguro de inhabilitar este producto?<br>
                    Recuerda que una vez inhabilitado, no lo podras volver a habilitar.
                </p>
                <div class="productos__modal-inhabilitar-producto-info dialog-main-content">
                    <section class="productos__modal-inhabilitar-producto-info-item" data-ProCodBarras>
                        <h3 class="dialog-main-content__label">Codigo de Barras del Producto</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="productos__modal-inhabilitar-producto-info-item" data-tbl_proveedores_ProNIT>
                        <h3 class="dialog-main-content__label">Nit del Proveedor</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="productos__modal-inhabilitar-producto-info-item" data-ProDescripcion>
                        <h3 class="dialog-main-content__label">Descripcion del Producto</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="productos__modal-inhabilitar-producto-info-item" data-ProNombre>
                        <h3 class="dialog-main-content__label">Nombre del proveedor</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="productos__modal-inhabilitar-producto-info-item" data-ProUbicacionFisica>
                        <h3 class="dialog-main-content__label">Ubicacion Fisica del Producto</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="productos__modal-inhabilitar-producto-info-item" data-ProLaboratorio>
                        <h3 class="dialog-main-content__label">Nombre del Laboratorio</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="productos__modal-inhabilitar-producto-info-item" data-ProUnidadMedida>
                        <h3 class="dialog-main-content__label">Unidad de Medida del Producto</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="productos__modal-inhabilitar-producto-info-item" data-ProPresentacion>
                        <h3 class="dialog-main-content__label">Presentacion del Producto</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="productos__modal-inhabilitar-producto-info-item" data-ProPrecioVenta>
                        <h3 class="dialog-main-content__label">Precio de Venta del Producto</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="productos__modal-inhabilitar-producto-info-item" data-ProRegSanInvima>
                        <h3 class="dialog-main-content__label">Registro de Invima del Producto</h3>
                        <p>________________________________________________</p>
                    </section>
                </div>
                <div class="productos__modal-inhabilitar-producto-btns-container dialog-container-bts">
                    <button class="productos__modal-inhabilitar-producto-btn-cancelar dialog-btn boton">Cancelar</button>
                    <button class="productos__modal-inhabilitar-producto-btn-confirmar dialog-btn boton">Confirmar</button>
                </div>
            </dialog>

            <dialog class="productos__modal-inhabilitacion-exitosa dialog-process-result">
                <h2>¡Excelente!</h2>
                <p>Has inhabilitado un producto exitosamente</p>
                <button class="productos__modal-inhabilitacion-exitosa-btn dialog-process-result__btn boton" >Ok</button>
            </dialog>
            
            <dialog class="productos__modal-inhabilitacion-fallo dialog-process-result">
                <h2>¡Algo salio mal!</h2>
                <p>Este producto no pudo ser inhabilitado, porque posiblemente hay registros de este en otras partes del sistema</p>
                <button class="productos__modal-inhabilitacion-fallo-btn dialog-process-result__btn boton" >Ok</button>
            </dialog>

            <!-- Estos son los modals para agregar un producto -->

            <dialog class="productos__modal-agregar-producto">
                <h2 class="productos__modal-agregar-producto-title dialog-title">Registra Nuevos Productos</h2>

                <form class="productos__modal-agregar-producto-form dialog-main-content">
                    
                    <section class="dialog-main-content__input-container">
                        <label class="dialog-main-content__label">Codigo de Barras del Producto</label>
                        <input 
                        tabindex="1"
                        name="codigoBarras" 
                        type="text" 
                        maxlength="15"
                        id="codigoBarrasProducto" 
                        title = "Debe tener una maxima logitud de 15 caracteres"
                        autocomplete="off"
                        data-input 
                        data-ProCodBarras
                        >
                    </section>

                    <section class="dialog-main-content__input-container">
                        <label class="dialog-main-content__label">Nit del Proveedor</label>
                        <input 
                        tabindex="6"
                        name="nitProveedor" 
                        type="text" 
                        title="El valor se colocara automaticamente cuando selecciones un proveedor"
                        autocomplete="off"
                        data-input 
                        data-tbl_proveedores_ProNIT
                        >
                    </section>

                    <section class="dialog-main-content__input-container">
                        <label class="dialog-main-content__label">Descripcion del Producto</label>
                        <input 
                        tabindex="2"
                        name="descripcion" 
                        type="text" 
                        title="Ingresa el nombre comercial del producto"
                        autocomplete="off"
                        data-input 
                        data-ProDescripcion
                        >
                    </section>

                    <section class="dialog-main-content__input-container">
                        <label class="dialog-main-content__label">Nombre del proveedor</label>
                        <select 
                        tabindex="7"
                        name="proveedor" 
                        id="productos__modal-agregar-producto-select-proveedor" 
                        data-input
                        data-ProNombre
                        >
                            <option value="" data-proveedor-id></option>
                        
                            <?php foreach($this->data['infoProveedores'] as $key => $value): ?>
                            <option 
                            value="<?php echo $value['ProNombre'] ?>" 
                            data-proveedor-id="<?php echo $value['ProNIT'] ?>"><?php echo $value['ProNombre'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </section>

                    <section class="dialog-main-content__input-container">
                        <label class="dialog-main-content__label">Ubicacion Fisica del Producto</label>
                        <input 
                        tabindex="3"
                        name="ubicacionFisica" 
                        type="text" 
                        title="Ingresa el codigo de la ubicacion fisica real en donde se encuentra el producto"
                        autocomplete="off"
                        data-input 
                        data-ProUbicacionFisica
                        >
                    </section>

                    <section class="dialog-main-content__input-container">
                        <label class="dialog-main-content__label">Nombre del Laboratorio</label>
                        <input 
                        tabindex="8"
                        name="laboratorio" 
                        type="text" 
                        title="Nombre del laboratorio"
                        autocomplete="off"
                        data-input 
                        data-ProLaboratorio
                        >
                    </section>

                    <section class="dialog-main-content__input-container">
                        <label class="dialog-main-content__label">Unidad de Medida del Producto</label>
                        <select 
                        tabindex="4"
                        name="unidadMedida" 
                        data-input
                        data-ProUnidadMedida
                        >
                            <option value=""></option>
                            <option value="KILOGRAMOS">(KG) KILOGRAMOS</option>
                            <option value="GRAMOS">(G) GRAMOS</option>
                            <option value="MILIGRAMOS">(MG) MILIGRAMOS</option>
                            <option value="MICROGRAMOS">(MCG) MICROGRAMOS</option>
                            <option value="UNIDAD">(U) UNIDAD</option>
                            <option value="MILILITROS">(ML) MILILITROS</option>
                            <option value="LITROS">(L) LITROS</option>
                        </select>
                    </section>

                    <section class="dialog-main-content__input-container">
                        <label class="dialog-main-content__label">Presentacion del Producto</label>
                        <select 
                        tabindex="9"
                        name="presentacion" 
                        autocomplete="off"
                        data-input
                        data-ProPresentacion
                        >
                            <option value=""></option>
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

                    <section class="dialog-main-content__input-container">
                        <label class="dialog-main-content__label">Precio de Venta del Producto</label>
                        <input 
                        tabindex="5"
                        name="precioVenta" 
                        type="text" 
                        maxlength="10"
                        title="El precio de venta es el precio de venta al cliente por unidad"
                        autocomplete="off"
                        data-input 
                        data-ProPrecioVenta
                        >
                    </section>

                    <section class="dialog-main-content__input-container">
                        <label class="dialog-main-content__label">Registro de Invima del Producto</label>
                        <input 
                        tabindex="10"
                        name="invima" 
                        type="text" 
                        title="Ingresa el registro sanitario INVIMA"
                        autocomplete="off"
                        data-input
                        data-ProRegSanInvima
                        >
                    </section>


                </form>
                <div class="productos__modal-agregar-producto-btns-container dialog-container-bts">
                    <button class="productos__modal-agregar-producto-btn-cancelar boton dialog-btn">Cancelar</button>
                    <button class="productos__modal-agregar-producto-btn-añadir boton dialog-btn">A&ntilde;adir</button>
                </div>
            </dialog>

            <dialog class="productos__modal-agregar-producto-confirmacion">
                <h2 class="productos__modal-agregar-producto-title-confirmacion dialog-title">Verifica los Datos</h2>
                <p class="productos__modal-agregar-producto-text-confirmacion dialog-text">
                    ¿Estas seguro de registrar este producto?<br>
                    Recuerda revisar detenidamente la informacion del producto que estas registrando.
                </p>
                <div class="productos__modal-agregar-producto-info-confirmacion dialog-main-content">
                    <section class="productos__modal-agregar-producto-info-item-confirmacion" data-ProCodBarras>
                        <h3 class="dialog-main-content__label">Codigo de Barras del Producto</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="productos__modal-agregar-producto-info-item-confirmacion" data-tbl_proveedores_ProNIT>
                        <h3 class="dialog-main-content__label">Nit del Proveedor</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="productos__modal-agregar-producto-info-item-confirmacion" data-ProDescripcion>
                        <h3 class="dialog-main-content__label">Descripcion del Producto</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="productos__modal-agregar-producto-info-item-confirmacion" data-ProNombre>
                        <h3 class="dialog-main-content__label">Nombre del proveedor</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="productos__modal-agregar-producto-info-item-confirmacion" data-ProUbicacionFisica>
                        <h3 class="dialog-main-content__label">Ubicacion Fisica del Producto</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="productos__modal-agregar-producto-info-item-confirmacion" data-ProLaboratorio>
                        <h3 class="dialog-main-content__label">Nombre del Laboratorio</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="productos__modal-agregar-producto-info-item-confirmacion" data-ProUnidadMedida>
                        <h3 class="dialog-main-content__label">Unidad de Medida del Producto</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="productos__modal-agregar-producto-info-item-confirmacion" data-ProPresentacion>
                        <h3 class="dialog-main-content__label">Presentacion del Producto</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="productos__modal-agregar-producto-info-item-confirmacion" data-ProPrecioVenta>
                        <h3 class="dialog-main-content__label">Precio de Venta del Producto</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="productos__modal-agregar-producto-info-item-confirmacion" data-ProRegSanInvima>
                        <h3 class="dialog-main-content__label">Registro de Invima del Producto</h3>
                        <p>________________________________________________</p>
                    </section>
                </div>
                <div class="productos__modal-agregar-producto-confirmacion-btns-container dialog-container-bts">
                    <button class="productos__modal-agregar-producto-confirmacion-btn-cancelar dialog-btn boton">Volver Atras</button>
                    <button class="productos__modal-agregar-producto-confirmacion-btn-confirmar dialog-btn boton" id="boton-agregar">Confirmar</button>
                </div>
            </dialog>

            <dialog class="productos__modal-agregacion-exitosa dialog-process-result">
                <h2>¡Excelente!</h2>
                <p>Has registrado un nuevo producto exitosamente</p>
                <button class="productos__modal-agregacion-exitosa-btn dialog-process-result__btn boton" >Ok</button>
            </dialog>
            
            <dialog class="productos__modal-agregacion-fallo dialog-process-result">
                <h2>¡Algo salio mal!</h2>
                <p>Este producto no pudo ser registrado, porque posiblemente ya esta registrado en el sistema</p>
                <button class="productos__modal-agregacion-fallo-btn dialog-process-result__btn boton" >Ok</button>
            </dialog>

            <!-- Estos son los modals para editar un producto -->

            <dialog class="productos__modal-editar-producto">
                <h2 class="productos__modal-editar-producto-title dialog-title">Modifica Tus Productos</h2>

                <form class="productos__modal-editar-producto-form dialog-main-content">

                    <section class="dialog-main-content__input-container">
                        <label class="dialog-main-content__label">Codigo de Barras del Producto</label>
                        <input 
                        tabindex="1"
                        name="codigoBarras" 
                        type="text" 
                        maxlength="15"
                        id="codigoBarrasProducto" 
                        title = "Debe tener una maxima logitud de 15 caracteres"
                        autocomplete="off"
                        data-input 
                        data-ProCodBarras
                        >
                    </section>

                    <section class="dialog-main-content__input-container">
                        <label class="dialog-main-content__label">Nit del Proveedor</label>
                        <input 
                        tabindex="6"
                        name="nitProveedor" 
                        type="text" 
                        title="El valor se colocara automaticamente cuando selecciones un proveedor"
                        autocomplete="off"
                        data-input 
                        data-tbl_proveedores_ProNIT
                        >
                    </section>

                    <section class="dialog-main-content__input-container">
                        <label class="dialog-main-content__label">Descripcion del Producto</label>
                        <input 
                        tabindex="2"
                        name="descripcion" 
                        type="text" 
                        title="Ingresa el nombre comercial del producto"
                        autocomplete="off"
                        data-input 
                        data-ProDescripcion
                        >
                    </section>

                    <section class="dialog-main-content__input-container">
                        <label class="dialog-main-content__label">Nombre del proveedor</label>
                        <select 
                        tabindex="7"
                        name="proveedor" 
                        id="productos__modal-agregar-producto-select-proveedor" 
                        data-input
                        data-ProNombre
                        >
                            <option value="" data-proveedor-id></option>
                        
                            <?php foreach($this->data['infoProveedores'] as $key => $value): ?>
                            <option 
                            value="<?php echo $value['ProNombre'] ?>" 
                            data-proveedor-id="<?php echo $value['ProNIT'] ?>"><?php echo $value['ProNombre'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </section>

                    <section class="dialog-main-content__input-container">
                        <label class="dialog-main-content__label">Ubicacion Fisica del Producto</label>
                        <input 
                        tabindex="3"
                        name="ubicacionFisica" 
                        type="text" 
                        title="Ingresa el codigo de la ubicacion fisica real en donde se encuentra el producto"
                        autocomplete="off"
                        data-input 
                        data-ProUbicacionFisica
                        >
                    </section>

                    <section class="dialog-main-content__input-container">
                        <label class="dialog-main-content__label">Nombre del Laboratorio</label>
                        <input 
                        tabindex="8"
                        name="laboratorio" 
                        type="text" 
                        title="Nombre del laboratorio"
                        autocomplete="off"
                        data-input 
                        data-ProLaboratorio
                        >
                    </section>

                    <section class="dialog-main-content__input-container">
                        <label class="dialog-main-content__label">Unidad de Medida del Producto</label>
                        <select 
                        tabindex="4"
                        name="unidadMedida" 
                        data-input
                        data-ProUnidadMedida
                        >
                            <option value=""></option>
                            <option value="KILOGRAMOS">(KG) KILOGRAMOS</option>
                            <option value="GRAMOS">(G) GRAMOS</option>
                            <option value="MILIGRAMOS">(MG) MILIGRAMOS</option>
                            <option value="MICROGRAMOS">(MCG) MICROGRAMOS</option>
                            <option value="UNIDAD">(U) UNIDAD</option>
                            <option value="MILILITROS">(ML) MILILITROS</option>
                            <option value="LITROS">(L) LITROS</option>
                        </select>
                    </section>

                    <section class="dialog-main-content__input-container">
                        <label class="dialog-main-content__label">Presentacion del Producto</label>
                        <select 
                        tabindex="9"
                        name="presentacion" 
                        autocomplete="off"
                        data-input
                        data-ProPresentacion
                        >
                            <option value=""></option>
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

                    <section class="dialog-main-content__input-container">
                        <label class="dialog-main-content__label">Precio de Venta del Producto</label>
                        <input 
                        tabindex="5"
                        name="precioVenta" 
                        type="text" 
                        maxlength="10"
                        title="El precio de venta es el precio de venta al cliente por unidad"
                        autocomplete="off"
                        data-input 
                        data-ProPrecioVenta
                        >
                    </section>

                    <section class="dialog-main-content__input-container">
                        <label class="dialog-main-content__label">Registro de Invima del Producto</label>
                        <input 
                        tabindex="10"
                        name="invima" 
                        type="text" 
                        title="Ingresa el registro sanitario INVIMA"
                        autocomplete="off"
                        data-input
                        data-ProRegSanInvima
                        >
                    </section>

                </form>
                <div class="productos__modal-editar-producto-btns-container dialog-container-bts">
                    <button class="productos__modal-editar-producto-btn-cancelar boton dialog-btn">Cancelar</button>
                    <button class="productos__modal-editar-producto-btn-editar boton dialog-btn">Editar</button>
                </div>
            </dialog>

            <dialog class="productos__modal-editar-producto-confirmacion">
                <h2 class="productos__modal-editar-producto-title-confirmacion dialog-title">Verifica los Datos</h2>
                <p class="productos__modal-editar-producto-text-confirmacion dialog-text">
                    ¿Estas seguro de editar la informacion este producto?<br>
                    Recuerda revisar detenidamente la informacion del producto que estas editando.
                </p>
                <div class="productos__modal-editar-producto-info-confirmacion dialog-main-content">
                    <section class="productos__modal-editar-producto-info-item-confirmacion" data-ProCodBarras>
                        <h3 class="dialog-main-content__label">Codigo de Barras del Producto</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="productos__modal-editar-producto-info-item-confirmacion" data-tbl_proveedores_ProNIT>
                        <h3 class="dialog-main-content__label">Nit del Proveedor</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="productos__modal-editar-producto-info-item-confirmacion" data-ProDescripcion>
                        <h3 class="dialog-main-content__label">Descripcion del Producto</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="productos__modal-editar-producto-info-item-confirmacion" data-ProNombre>
                        <h3 class="dialog-main-content__label">Nombre del proveedor</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="productos__modal-editar-producto-info-item-confirmacion" data-ProUbicacionFisica>
                        <h3 class="dialog-main-content__label">Ubicacion Fisica del Producto</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="productos__modal-editar-producto-info-item-confirmacion" data-ProLaboratorio>
                        <h3 class="dialog-main-content__label">Nombre del Laboratorio</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="productos__modal-editar-producto-info-item-confirmacion" data-ProUnidadMedida>
                        <h3 class="dialog-main-content__label">Unidad de Medida del Producto</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="productos__modal-editar-producto-info-item-confirmacion" data-ProPresentacion>
                        <h3 class="dialog-main-content__label">Presentacion del Producto</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="productos__modal-editar-producto-info-item-confirmacion" data-ProPrecioVenta>
                        <h3 class="dialog-main-content__label">Precio de Venta del Producto</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="productos__modal-editar-producto-info-item-confirmacion" data-ProRegSanInvima>
                        <h3 class="dialog-main-content__label">Registro de Invima del Producto</h3>
                        <p>________________________________________________</p>
                    </section>
                </div>
                <div class="productos__modal-editar-producto-confirmacion-btns-container dialog-container-bts">
                    <button class="productos__modal-editar-producto-confirmacion-btn-cancelar dialog-btn boton">Volver Atras</button>
                    <button class="productos__modal-editar-producto-confirmacion-btn-confirmar dialog-btn boton">Confirmar</button>
                </div>
            </dialog>

            <dialog class="productos__modal-edicion-exitosa dialog-process-result">
                <h2>¡Excelente!</h2>
                <p>Has editado la informacion exitosamente</p>
                <button class="productos__modal-edicion-exitosa-btn dialog-process-result__btn boton" >Ok</button>
            </dialog>
            
            <dialog class="productos__modal-edicion-fallo dialog-process-result">
                <h2>¡Algo salio mal!</h2>
                <p>Este producto no pudo ser registrado, porque posiblemente ya esta registrado en el sistema</p>
                <button class="productos__modal-edicion-fallo-btn dialog-process-result__btn boton" >Ok</button>
            </dialog>


            <!-- Este es el modal para ver los productos inhabilitados -->

            <dialog class="productos__modal-productos-inhabilitados">
                <span class="productos__modal-productos-inhabilitados-btn-cerrar dialog-btn-cerrar">X</span>
                <h2 class="productos__modal-productos-inhabilitados-title dialog-title">Productos inhabilitados</h2>
                <div class="productos__modal-productos-inhabilitados-container-gen-repo filtro-gen-repo">
                    <div class="productos__modal-productos-inhabilitados-gen-repo-container-img dialog-objects-enabled-gen-repo-img">
                        <img src="<?php echo(URL_RAIZ); ?>public/imagenes/reportes-icono.svg" alt="">
                    </div>
                    <div class="productos__modal-productos-inhabilitados-gen-repo-container-text">
                        <a 
                        target="_BLANCK"
                        class="filtro-subtitulo-reporte" 
                        href="<?php echo(URL_RAIZ); ?>productos/generarReporteInhabilitados"
                        >
                        Generar Reporte
                        </a>
                    </div>
                </div>
                <section class="productos__modal-productos-inhabilitados-table-container container-table">
                    <table class="productos-inhabilitados__table table">
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
                                <td class="table-td">Fecha/hora Inhabilitacion</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($this->data['infoProductosInhabilitados'] as $key => $value):?>
                                <tr>
                                    <td><?php echo $value['ProCodBarras'] ?></td>
                                    <td><?php echo $value['ProDescripcion'] ?></td>
                                    <td><?php echo $value['ProUbicacionFisica'] ?></td>
                                    <td><?php echo $value['ProPresentacion'] ?></td>
                                    <td><?php echo $value['ProUnidadMedida'] ?></td>
                                    <td><?php echo $value['ProPrecioVenta'] ?></td>
                                    <td><?php echo $value['ProLaboratorio'] ?></td>
                                    <td><?php echo $value['ProRegSanInvima'] ?></td>
                                    <td><?php echo $value['tbl_proveedores_ProNIT'] ?></td>
                                    <td><?php echo $value['ProFechaInhabilitacion'] ?></td>
                                </tr>
                                
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </section>
            </dialog>
        </section>
    </main>

    <script> 
        /* Se puso var porque queremos que pueda usarse en todos los contextos, 
        independientemente de si esta en una funcion anonima autoejecutable */
        var URL_RAIZ = "<?php echo URL_RAIZ ?>"
    </script>
    <script src="<?php echo(URL_RAIZ); ?>public/js/modulo_productos_inhabilitar_productos.js" type="module"></script>
    <script src="<?php echo(URL_RAIZ); ?>public/js/modulo_productos_editar_productos.js" type="module"></script>
    <script src="<?php echo(URL_RAIZ); ?>public/js/modulo_productos_agregar_productos.js" type="module"></script>
    <script src="<?php echo(URL_RAIZ); ?>public/js/modulo_productos_buscar_por_atributos.js" type="module"></script>
    <script src="<?php echo(URL_RAIZ); ?>public/js/modulo_productos_seleccion_de_producto.js"></script>
    <script src="<?php echo(URL_RAIZ); ?>public/js/modulo_productos_productos_inhabilitados.js"></script>
    <script src="<?php echo(URL_RAIZ); ?>public/js/cualquier_modulo_pintar_borde_derecho_input.js"></script>
</body>
</html>