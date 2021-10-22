<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="<?php echo(URL_RAIZ); ?>public/css/productos.css">
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
                        <td class="table-td">ProCodBarr</td>
                        <td class="table-td">Descripcion</td>
                        <td class="table-td">Ubicacion Fisica</td>
                        <td class="table-td">Presentacion</td>
                        <td class="table-td">UnidadMedida</td>
                        <td class="table-td">PrecioVenta</td>
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
                </tbody>
            </table>
        </section>


        <section class="productos__container-filter container-filter  box-shadow">
            <div class="productos__filtro">
                <h2 class="productos__filtro-titulo">Busca un Producto</h2>
                <form class="productos__filtro-form" action="">
                    <label class="productos__filtro-label" for="product-id">Por codigo de barras del producto</label>
                    <br>
                    <input type="text" class="productos_filtro-id" id="product-id">
                    <br>
                    <label class="productos__filtro-label" for="product-nombre">Por nombre del producto</label>
                    <br>
                    <input type="text" class="productos_filtro-nombre" id="product-nombre">
                    <br>
                    <label class="productos__filtro-label" for="product-proveedor">Por nombre del proveedor</label>
                    <br>
                    <input type="text" class="productos_filtro-proveedor" id="product-proveedor">
                    <br>
                    <label class="productos__filtro-label" for="product-id">Por tipo de presentacion</label>
                    <br>
                    <select name="presentacion" class="productos_filtro-presentacion" id="product-presentacion">
                        <option value="null">Presentacion</option>
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
                    <a class="productos__filtro-subtitulo-reporte filtro-subtitulo-reporte" href="">Generar reporte</a>
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
                        <h3>CODIGO DE BARRAS</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="productos__modal-inhabilitar-producto-info-item" data-tbl_proveedores_ProNIT>
                        <h3>NIT DEL PROVEEDOR</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="productos__modal-inhabilitar-producto-info-item" data-ProDescripcion>
                        <h3>DESCRIPCION</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="productos__modal-inhabilitar-producto-info-item" data-ProNombre>
                        <h3>NOMBRE DEL PROVEEDOR</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="productos__modal-inhabilitar-producto-info-item" data-ProUbicacionFisica>
                        <h3>UBICACION FISICA</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="productos__modal-inhabilitar-producto-info-item" data-ProLaboratorio>
                        <h3>LABORATORIO</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="productos__modal-inhabilitar-producto-info-item" data-ProUnidadMedida>
                        <h3>UNIDAD DE MEDIDA</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="productos__modal-inhabilitar-producto-info-item" data-ProPresentacion>
                        <h3>PRESENTACION</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="productos__modal-inhabilitar-producto-info-item" data-ProPrecioVenta>
                        <h3>PRECIO DE VENTA</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="productos__modal-inhabilitar-producto-info-item" data-ProRegSanInvima>
                        <h3>REGISTRO SANITARIO INVIMA</h3>
                        <p>________________________________________________</p>
                    </section>
                </div>
                <div class="productos__modal-inhabilitar-producto-btns-container dialog-container-bts">
                    <button class="productos__modal-inhabilitar-producto-btn-cancelar dialog-btn boton">Cancelar</button>
                    <button class="productos__modal-inhabilitar-producto-btn-confirmar dialog-btn boton">Confirmar</button>
                </div>
            </dialog>

            <dialog class="productos__modal-inhabilitacion-exitosa dialog-process-result">
                <h2>¡Exelente!</h2>
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

                    <input 
                    name="codigoBarras" 
                    type="text" 
                    maxlength="15"
                    placeholder="Codigo de barras del producto" 
                    id="codigoBarrasProducto" 
                    title = "Debe tener una maxima logitud de 15 caracteres"
                    data-input 
                    data-ProCodBarras
                    >

                    <input 
                    name="nitProveedor" 
                    type="text" 
                    placeholder="NIT del proveedor" 
                    title="El valor se colocara automaticamente cuando selecciones un proveedor"
                    data-input 
                    data-tbl_proveedores_ProNIT
                    >

                    <input 
                    name="descripcion" 
                    type="text" 
                    placeholder="Descripcion" 
                    title="Ingresa el nombre comercial del producto"
                    data-input 
                    data-ProDescripcion
                    >

                    <select 
                    name="proveedor" 
                    id="productos__modal-agregar-producto-select-proveedor" 
                    data-input
                    data-ProNombre
                    >
                        <option value="" data-proveedor-id>Elige el proveedor</option>

                        <?php foreach($this->data['infoProveedores'] as $key => $value): ?>
                        <option 
                        value="<?php echo $value['ProNombre'] ?>" 
                        data-proveedor-id="<?php echo $value['ProNIT'] ?>"><?php echo $value['ProNombre'] ?></option>
                        <?php endforeach; ?>
                    </select>

                    <input 
                    name="ubicacionFisica" 
                    type="text" 
                    placeholder="Ubicacion fisica" 
                    title="Ingresa el codigo de la ubicacion fisica real en donde se encuentra el producto"
                    data-input 
                    data-ProUbicacionFisica
                    >

                    <input 
                    name="laboratorio" 
                    type="text" 
                    placeholder="Ingresa el laboratorio" 
                    title="Nombre del laboratorio"
                    data-input 
                    data-ProLaboratorio
                    >

                    <select 
                    name="unidadMedida" 
                    data-input
                    data-ProUnidadMedida
                    >
                        <option value="">Unidad de medida</option>
                        <option value="KILOGRAMOS">(kg) kilogramos</option>
                        <option value="GRAMOS">(g) gramos</option>
                        <option value="MILIGRAMOS">(mg) miligramos</option>
                        <option value="MICROGRAMOS">(mcg) microgramos</option>
                        <option value="UNIDAD">(u) unidad</option>
                        <option value="MILILITROS">(ml) mililitros</option>
                        <option value="LITROS">(l) litros</option>
                    </select>

                    <select 
                    name="presentacion" 
                    data-input
                    data-ProPresentacion
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

                    <input 
                    name="precioVenta" 
                    type="text" 
                    maxlength="10"
                    placeholder="Precio de venta" 
                    title="El precio de venta es el precio de venta al cliente por unidad"
                    data-input 
                    data-ProPrecioVenta
                    >

                    <input 
                    name="invima" 
                    type="text" 
                    placeholder="Registro sanitario INVIMA" 
                    data-input
                    data-ProRegSanInvima
                    >

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
                        <h3>CODIGO DE BARRAS</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="productos__modal-agregar-producto-info-item-confirmacion" data-tbl_proveedores_ProNIT>
                        <h3>NIT DEL PROVEEDOR</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="productos__modal-agregar-producto-info-item-confirmacion" data-ProDescripcion>
                        <h3>DESCRIPCION</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="productos__modal-agregar-producto-info-item-confirmacion" data-ProNombre>
                        <h3>NOMBRE DEL PROVEEDOR</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="productos__modal-agregar-producto-info-item-confirmacion" data-ProUbicacionFisica>
                        <h3>UBICACION FISICA</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="productos__modal-agregar-producto-info-item-confirmacion" data-ProLaboratorio>
                        <h3>LABORATORIO</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="productos__modal-agregar-producto-info-item-confirmacion" data-ProUnidadMedida>
                        <h3>UNIDAD DE MEDIDA</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="productos__modal-agregar-producto-info-item-confirmacion" data-ProPresentacion>
                        <h3>PRECIO DE VENTA</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="productos__modal-agregar-producto-info-item-confirmacion" data-ProPrecioVenta>
                        <h3>PRESENTACION</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="productos__modal-agregar-producto-info-item-confirmacion" data-ProRegSanInvima>
                        <h3>REGISTRO SANITARIO INVIMA</h3>
                        <p>________________________________________________</p>
                    </section>
                </div>
                <div class="productos__modal-agregar-producto-confirmacion-btns-container dialog-container-bts">
                    <button class="productos__modal-agregar-producto-confirmacion-btn-cancelar dialog-btn boton">Volver Atras</button>
                    <button class="productos__modal-agregar-producto-confirmacion-btn-confirmar dialog-btn boton" id="boton-agregar">Confirmar</button>
                </div>
            </dialog>

            <dialog class="productos__modal-agregacion-exitosa dialog-process-result">
                <h2>¡Exelente!</h2>
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

                    <input 
                    name="codigoBarras" 
                    type="text" 
                    maxlength="15"
                    placeholder="Codigo de barras del producto" 
                    title = "Debe tener una maxima logitud de 15 caracteres"
                    id= "codigoBarrasProducto"
                    data-input
                    data-ProCodBarras
                    >

                    <input 
                    name="nitProveedor" 
                    type="text" 
                    placeholder="NIT del proveedor" 
                    title="El valor se colocara automaticamente cuando selecciones un proveedor"
                    data-input 
                    data-tbl_proveedores_ProNIT
                    >

                    <input 
                    name="descripcion" 
                    type="text" 
                    placeholder="Descripcion" 
                    title="Ingresa el nombre comercial del producto"
                    data-input 
                    data-ProDescripcion
                    >

                    <select 
                    name="proveedor" 
                    id="productos__modal-editar-producto-select-proveedor" 
                    data-input
                    data-ProNombre
                    >
                        <option value="" data-proveedor-id>Elige el proveedor</option>

                        <?php foreach($this->data['infoProveedores'] as $key => $value): ?>
                        <option 
                        value="<?php echo $value['ProNombre'] ?>" 
                        data-proveedor-id="<?php echo $value['ProNIT'] ?>"><?php echo $value['ProNombre'] ?></option>
                        <?php endforeach; ?>
                    </select>

                    <input 
                    name="ubicacionFisica" 
                    type="text" 
                    placeholder="Ubicacion fisica" 
                    title="Ingresa el codigo de la ubicacion fisica real en donde se encuentra el producto"
                    data-input 
                    data-ProUbicacionFisica
                    >
                    
                    <input 
                    name="laboratorio" 
                    type="text" 
                    placeholder="Ingresa el laboratorio" 
                    title="Nombre del laboratorio"
                    data-input 
                    data-ProLaboratorio
                    >
                    
                    <select 
                    name="unidadMedida" 
                    data-input
                    data-ProUnidadMedida
                    >
                    <option value="">Unidad de medida</option>
                        <option value="KILOGRAMOS">(kg) kilogramos</option>
                        <option value="GRAMOS">(g) gramos</option>
                        <option value="MILIGRAMOS">(mg) miligramos</option>
                        <option value="MICROGRAMOS">(mcg) microgramos</option>
                        <option value="UNIDAD">(u) unidad</option>
                        <option value="MILILITROS">(ml) mililitros</option>
                        <option value="LITROS">(l) litros</option>
                    </select>

                    <select 
                    name="presentacion" 
                    data-input
                    data-ProPresentacion
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

                    <input 
                    name="precioVenta" 
                    type="text" 
                    maxlength="10"
                    placeholder="Precio de venta" 
                    title="El precio de venta es el precio de venta al cliente por unidad"
                    data-input 
                    data-ProPrecioVenta
                    >

                    <input 
                    name="invima" 
                    type="text" 
                    placeholder="Registro sanitario INVIMA" 
                    data-input
                    data-ProRegSanInvima
                    >

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
                        <h3>CODIGO DE BARRAS</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="productos__modal-editar-producto-info-item-confirmacion" data-tbl_proveedores_ProNIT>
                        <h3>NIT DEL PROVEEDOR</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="productos__modal-editar-producto-info-item-confirmacion" data-ProDescripcion>
                        <h3>DESCRIPCION</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="productos__modal-editar-producto-info-item-confirmacion" data-ProNombre>
                        <h3>NOMBRE DEL PROVEEDOR</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="productos__modal-editar-producto-info-item-confirmacion" data-ProUbicacionFisica>
                        <h3>UBICACION FISICA</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="productos__modal-editar-producto-info-item-confirmacion" data-ProLaboratorio>
                        <h3>LABORATORIO</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="productos__modal-editar-producto-info-item-confirmacion" data-ProUnidadMedida>
                        <h3>UNIDAD DE MEDIDA</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="productos__modal-editar-producto-info-item-confirmacion" data-ProPresentacion>
                        <h3>PRECIO DE VENTA</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="productos__modal-editar-producto-info-item-confirmacion" data-ProPrecioVenta>
                        <h3>PRESENTACION</h3>
                        <p>________________________________________________</p>
                    </section>
                    <section class="productos__modal-editar-producto-info-item-confirmacion" data-ProRegSanInvima>
                        <h3>REGISTRO SANITARIO INVIMA</h3>
                        <p>________________________________________________</p>
                    </section>
                </div>
                <div class="productos__modal-editar-producto-confirmacion-btns-container dialog-container-bts">
                    <button class="productos__modal-editar-producto-confirmacion-btn-cancelar dialog-btn boton">Volver Atras</button>
                    <button class="productos__modal-editar-producto-confirmacion-btn-confirmar dialog-btn boton">Confirmar</button>
                </div>
            </dialog>

            <dialog class="productos__modal-edicion-exitosa dialog-process-result">
                <h2>¡Exelente!</h2>
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
                        <a class="filtro-subtitulo-reporte" href="">Generar Reporte</a>
                    </div>
                </div>
                <section class="productos__modal-productos-inhabilitados-table-container container-table">
                    <table class="productos-inhabilitados__table table">
                        <thead class="table-thead">
                            <tr class="table-tr">
                                <td class="table-td">ProCodBarr</td>
                                <td class="table-td">Descripcion</td>
                                <td class="table-td">Ubicacion Fisica</td>
                                <td class="table-td">Presentacion</td>
                                <td class="table-td">UnidadMedida</td>
                                <td class="table-td">PrecioVenta</td>
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
    <script src="<?php echo(URL_RAIZ); ?>public/js/modulo_productos_inhabilitar_productos.js" type="module"></script>
    <script src="<?php echo(URL_RAIZ); ?>public/js/modulo_productos_editar_productos.js" type="module"></script>
    <script src="<?php echo(URL_RAIZ); ?>public/js/modulo_productos_agregar_productos.js" type="module"></script>
    <script src="<?php echo(URL_RAIZ); ?>public/js/modulo_productos_seleccion_de_producto.js"></script>
    <script src="<?php echo(URL_RAIZ); ?>public/js/modulo_productos_productos_inhabilitados.js"></script>
</body>
</html>