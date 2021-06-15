<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de productos</title>
    <link rel="stylesheet" href="../css/productos.css">
    <script src="../js/load-nav.js"></script>
</head>
<body>
    <?php
    require("nav.php");
    ?>
    <main class="productos grid-container">
        <section class="productos__container-title">
            <h1 class="productos__titulo">Gestiona Tus Productos</h1>
        </section>


        <section class="productos__container-table">
            <table class="productos__table tabla">
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
                <tbody></tbody>
            </table>
        </section>


        <section class="productos__container-filter">
            <div class="productos_filtro">
                <h2 class="productos_filtro-titulo">Busca un Producto</h2>
                <form class="productos_filtro-form" action="">
                    <label for="product-id">Por codigo de barras del producto</label>
                    <br>
                    <input type="text" class="productos_filtro-id" id="product-id">
                    <br>
                    <label for="product-nombre">Por nombre del producto</label>
                    <br>
                    <input type="text" class="productos_filtro-nombre" id="product-nombre">
                    <br>
                    <label for="product-proveedor">Por nombre del proveedor</label>
                    <br>
                    <input type="text" class="productos_filtro-proveedor" id="product-proveedor">
                    <br>
                    <label for="product-id">Por codigo de barras del producto</label>
                    <br>
                    <select name="presentacion" class="productos_filtro-presentacion" id="product-presentacion">
                        <option value="null">Presentacion</option>
                        <option value="Pre">Pre1</option>
                        <option value="Pre">Pre2</option>
                        <option value="Pre">Pre3</option>
                        <option value="Pre">Pre4</option>
                    </select>
                </form>
                <div class="productos_filtro-gen-repo">
                    <img src="" alt="">
                    <a href="">Generar reporte</a>
                </div>
            </div>
        </section>


        <section class="productos__container-botones">
            <section class="productos__container-boton">
                <input type="button" class="productos__boton-agregar" value="Inhabilitar">
            </section>
            <section class="productos__container-boton">
                <input type="button" class="productos__boton-editar" value="Editar">
            </section>
            <section class="productos__container-boton">
                <input type="button" class="productos__boton-ver-inhabilitados" value="Agregar">
            </section>
            <section class="productos__container-boton">
                <input type="button" class="productos__boton-inhabilitar" value="Ver productos inhabilitados">
            </section>
        </section>
    </main>
</body>
</html>