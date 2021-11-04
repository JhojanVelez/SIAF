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
                <form class="kardex__filtro-form" action="">
                    <input type="text" class="kardex__filtro-producto-id" id="producto-id" placeholder="Codigo de Barras">
                    <input type="text" class="kardex__filtro-producto-nombre" id="producto-nombre" placeholder="Nombre Producto">
                    <input type="text" class="kardex__filtro-proveedor-id" id="proveedor-id" placeholder="NIT Proveedor">
                    <input type="text" class="kardex__filtro-proveedor-nombre" id="proveedor-nombre" placeholder="Nombre Proveedor">
                    <input type="text" class="kardex__filtro-laboratorio" id="laboratorio-nombre" placeholder="Nombre Laboratorio">
                    <select class="kardex_filtro-producto-presentacion" id="producto-presentacion">
                        <option value="null">Presentacion</option>
                        <option value="Pre">Pre1</option>
                        <option value="Pre">Pre2</option>
                        <option value="Pre">Pre3</option>
                        <option value="Pre">Pre4</option>
                    </select>
                </form>
                <div class="kardex__filtro-gen-repo filtro-gen-repo">
                    <div class="kardex__filtro-gen-repo-img filtro-gen-repo-img">
                        <img src="<?php echo(URL_RAIZ); ?>public/imagenes/informe.svg" alt="">
                    </div>
                    <a class="kardex__filtro-subtitulo-reporte filtro-subtitulo-reporte" href="">Generar reporte</a>
                </div>
            </div>
        </section>


        <section class="kardex__container-table container-table box-shadow">
            <table class="kardex__table">
                <thead class="table-thead">
                    <tr class="table-tr">
                        <td>codInvt</td>
                        <td>ProCodBarras</td>
                        <td>Producto</td>
                        <td>TotalSalidas</td>
                        <td>TotalEntradas</td>
                        <td>Stock</td>
                        <td>UbicacionFisica</td>
                        <td>CostoProducto</td>
                        <td>PrecioVenta</td>
                        <td>ProPresentacion</td>
                        <td>Laboratorio</td>
                        <td>NitProveedor</td>
                        <td>Proveedor</td>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($this->data['infoKardex'] as $key => $value): ?>
                        <tr class="kardex__table-tboby-tr">
                            <td><?php echo $value["InvCodigo"] ?></td>
                            <td><?php echo $value["ProCodBarras"] ?></td>
                            <td><?php echo $value["ProDescripcion"] ?></td>
                            <td><?php echo $value["InvTotalSalidas"] ?></td>
                            <td><?php echo $value["InvTotalEntradas"] ?></td>
                            <td 
                            class="
                                <?php
                                    if($value["InvStock"] <= 0) {
                                        echo("kardex__table-stock-red");
                                    } else if ($value["InvStock"] > 0 && $value["InvStock"] < 10) {
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
    </main>

    <script src="<?php echo URL_RAIZ?>public/js/modulo_inventario_kardex_pintar_red_orange_green.js"></script>
</body>
</html>