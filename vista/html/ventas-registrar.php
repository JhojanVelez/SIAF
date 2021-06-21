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

        <section class="registrar-ventas__container-table container-table box-shadow">
            <table class="registrar-ventas__table tabla">
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
                </tbody>
            </table>
        </section>


        <section class="registrar-ventas__container-registro container-filter  box-shadow">
            <div class="registrar-ventas__registro">
                <form class="registrar-ventas__registro-form" action="">
                    <label class="registrar-ventas__registro-label" for="producto-id">Codigo de barras del producto</label>
                    <input type="text" class="registrar-ventas_registro-id" id="producto-id">
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
                <input type="button" class="registrar-ventas__boton-ver-inhabilitados boton" value="Agregar">
            </section>
            <section class="registrar-ventas__container-boton">
                <input type="button" class="registrar-ventas__boton-inhabilitar boton" value="Ver inhabilitados">
            </section>
        </section>
    </main>
</body>
</html>