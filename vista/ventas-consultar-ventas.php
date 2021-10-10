<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas</title>
    <link rel="stylesheet" href="../css/ventas-consultar-ventas.css">
</head>
<body>
    <?php
        require_once("nav.php");
    ?>

<main class="ventas grid-container-main">
        <section class="ventas__container-title container-title box-shadow">
            <h1 class="ventas__titulo">Consulta Tus Ventas</h1>
        </section>


        <section class="ventas__container-filter container-filter box-shadow">
            <div class="ventas__filtro">
                <h2 class="ventas__filtro-titulo">Filtros de busqueda</h2>
                <form class="ventas__filtro-form" action="">
                    <input type="text" class="ventas__filtro-producto-id" id="producto-id" placeholder="Codigo de Barras">
                    <input type="text" class="ventas__filtro-producto-nombre" id="producto-nombre" placeholder="Nombre Producto">
                    <input type="text" class="ventas__filtro-cliente-id" id="cliente-id" placeholder="Documento del Cliente">
                    <input type="text" class="ventas__filtro-cliente-nombre" id="cliente-nombre" placeholder="Nombre del Cliente">
                    <article class="ventas_filtro-container-desde-hasta">
                        <h3 class="ventas_filtro-container-desde-hasta__title">Por periodo de tiempo</h3>
                        <div class="ventas_filtro-container-desde-hasta__inputs">
                            <input type="date" class="ventas_filtro-desde" id="salida-desde">
                            <input type="date" class="ventas_filtro-hasta" id="salida-hasta">
                        </div>
                    </article>
                </form>
                <div class="ventas__filtro-gen-repo filtro-gen-repo">
                    <div class="ventas__filtro-gen-repo-img filtro-gen-repo-img">
                        <img src="../imagenes/informe.svg" alt="">
                    </div>
                    <a class="ventas__filtro-subtitulo-reporte filtro-subtitulo-reporte" href="">Generar reporte</a>
                </div>
            </div>
        </section>


        <section class="ventas__container-table container-table box-shadow">
            <table class="ventas__table">
                <thead class="table-thead">
                    <tr class="table-tr">
                        <td class="table-td">NumFact</td>
                        <td class="table-td">FechaVenta</td>
                        <td class="table-td">Vendedor</td>
                        <td class="table-td">Cliente</td>
                        <td class="table-td ">DocCliente</td>
                        <td class="table-td">CantidadTotal</td>
                        <td class="table-td">PrecioTotal</td>
                        <td class="table-td">Factura</td>
                    </tr>
                </thead>
                <tbody>
                    <!-- table-td--comentarios clase -->
                    <tr>
                        <td>item 1</td>
                        <td>item 2</td>
                        <td>item 3</td>
                        <td>item 4</td>
                        <td>item 5</td>
                        <td>item 6</td>
                        <td>item 7</td>
                        <td>item 8</td>
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
                    </tr>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>