<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kardex</title>
    <link rel="stylesheet" href="../css/inventario-kardex.css">
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
                        <img src="../imagenes/informe.svg" alt="">
                    </div>
                    <a class="kardex__filtro-subtitulo-reporte filtro-subtitulo-reporte" href="">Generar reporte</a>
                </div>
            </div>
        </section>


        <section class="kardex__container-table container-table box-shadow">
            <table>
                <thead>
                    <tr>
                        <td>codInvt</td>
                        <td>Producto</td>
                        <td>UbicacionFisica</td>
                        <td>Proveedor</td>
                        <td>Laboratorio</td>
                        <td>CostoProducto</td>
                        <td>PrecioVenta</td>
                        <td>TotalSalidas</td>
                        <td>TotalEntradas</td>
                        <td>Stock</td>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>