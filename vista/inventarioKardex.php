<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kardex</title>
    <link rel="stylesheet" href="<?php echo(URL_RAIZ); ?>public/css/inventario-kardex.css">
</head>
<body>
    <?php
        require_once("nav.php");
    ?>

<main class="kardex grid-container-main">
        <section class="kardex__container-title container-title box-shadow">
            <h1 class="kardex__titulo">Kardex</h1>
        </section>


        <section class="kardex__container-filter container-filter box-shadow">
            <div class="kardex__filtro">
                <h2 class="kardex__filtro-titulo">Filtros de busqueda</h2>
                <form 
                id="kardex__filtro-form" 
                class="kardex__filtro-form" 
                action="<?php echo URL_RAIZ ?>inventarioKardex/generarReporte" 
                method="POST" 
                target="_BLANK"
                >
                    <input 
                    name="codigoBarrasProducto"
                    type="text" 
                    class="kardex__filtro-producto-id" 
                    placeholder="Codigo de Barras"
                    autocomplete="off"
                    data-input
                    >
                    <input 
                    name="descripcionProducto"
                    type="text" 
                    class="kardex__filtro-producto-nombre" 
                    placeholder="Nombre Producto"
                    autocomplete="off"
                    data-input
                    >
                    <input 
                    name="nitProveedor"
                    type="text" 
                    class="kardex__filtro-proveedor-id" 
                    placeholder="NIT Proveedor"
                    autocomplete="off"
                    data-input
                    >
                    <input 
                    name="nombreProveedor"
                    type="text" 
                    class="kardex__filtro-proveedor-nombre" 
                    placeholder="Nombre Proveedor"
                    autocomplete="off"
                    data-input
                    >
                    <input 
                    name="laboratorioProducto"
                    type="text" 
                    class="kardex__filtro-laboratorio" 
                    placeholder="Nombre Laboratorio"
                    autocomplete="off"
                    data-input
                    >
                    <select 
                    name="presentacionProducto"
                    class="kardex_filtro-producto-presentacion" 
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
                <div class="kardex__filtro-gen-repo filtro-gen-repo">
                    <div class="kardex__filtro-gen-repo-img filtro-gen-repo-img">
                        <img src="<?php echo(URL_RAIZ); ?>public/imagenes/informe.svg" alt="">
                    </div>
                    <input 
                    class="kardex__filtro-subtitulo-reporte filtro-subtitulo-reporte" 
                    type="submit" 
                    value="Generar Reporte" 
                    form="kardex__filtro-form"
                    >
                </div>
            </div>
        </section>


        <section class="kardex__container-table container-table box-shadow">
            <table class="kardex__table">
                <thead class="table-thead">
                    <tr class="table-tr">
                        <td>Codigo</td>
                        <td>Codigo de Barras Producto</td>
                        <td>Nombre Producto</td>
                        <td>Total Entradas</td>
                        <td>Total Salidas</td>
                        <td>Stock</td>
                        <td>Ubicacion Fisica Producto</td>
                        <td>Costo Producto</td>
                        <td>Precio Venta Producto</td>
                        <td>Presentacion Producto</td>
                        <td>Laboratorio Producto</td>
                        <td>Nit Proveedor</td>
                        <td>Nombre Proveedor</td>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($this->data['infoKardex'] as $key => $value): ?>
                        <tr class="kardex__table-tboby-tr">
                            <td><?php echo $value["InvCodigo"] ?></td>
                            <td><?php echo $value["ProCodBarras"] ?></td>
                            <td><?php echo $value["ProDescripcion"] ?></td>
                            <td><?php echo $value["InvTotalEntradas"] ?></td>
                            <td><?php echo $value["InvTotalSalidas"] ?></td>
                            <td 
                            class="
                                <?php
                                    if($value["InvStock"] <= 0) {
                                        echo("kardex__table-stock-red");
                                    } else if ($value["InvStock"] > 0 && $value["InvStock"] <= 10) {
                                        echo("kardex__table-stock-orange");
                                    } else {
                                        echo("kardex__table-stock-green");
                                    }
                                ?>
                            ">
                            <?php echo $value["InvStock"] ?>
                            </td>
                            <td><?php echo $value["ProUbicacionFisica"] ?></td>
                            <td><?php echo $value["CostoProducto"] ?></td>
                            <td><?php echo $value["ProPrecioVenta"] ?></td>
                            <td><?php echo $value["ProPresentacion"] ?></td>
                            <td><?php echo $value["ProLaboratorio"] ?></td>
                            <td><?php echo $value["ProNIT"] ?></td>
                            <td><?php echo $value["ProNombre"] ?></td>
                        </tr>
                    <?php endforeach;?>

                    <!-- 
                        Este template nos permite imprimir la informacion cuando estamos buscando por atributo
                        pero en este caso lo hacemos con template para hacer uso de los fragmentos
                    -->
                    <template class="kardex__table-template">
                        <tr class="kardex__table-tboby-tr">
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
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </section>
    </main>

    <script src="<?php echo URL_RAIZ?>public/js/modulo_inventario_kardex_pintar_red_orange_green.js"></script>
    <script src="<?php echo(URL_RAIZ); ?>public/js/modulo_inventario_kardex_buscar_por_atributos.js" type="module"></script>

</body>
</html>