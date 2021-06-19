<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de Salidas</title>
    <link rel="stylesheet" href="../css/inventario-salidas.css">
</head>
<body>
    <?php
        require("nav.php");
    ?>

<main class="salidas grid-container-main">
        <section class="salidas__container-title box-shadow">
            <h1 class="salidas__titulo">Gestiona Tus Salidas</h1>
        </section>


        <section class="salidas__container-filter box-shadow">
            <div class="salidas__filtro">
                <h2 class="salidas__filtro-titulo">Filtros de busqueda</h2>
                <form class="salidas__filtro-form" action="">
                    <label class="salidas__filtro-label" for="producto-id"></label>
                    <input type="text" class="salidas_filtro-producto-id" id="producto-id" placeholder="Por codigo de barras del producto">
                    <label class="salidas__filtro-label" for="producto-nombre"></label>
                    <input type="text" class="salidas_filtro-producto-nombre" id="producto-nombre" placeholder="Nombre Producto">
                    <input type="text" class="salidas_filtro-proveedor-nombre" id="proveedor-nombre" placeholder="Nombre Proveedor">
                    <select name="presentacion" class="salidas_filtro-tipo-salida" id="salida-tipo-salida">
                        <option value="null">Por tipo de salida</option>
                        <option value="Pre">Sal1</option>
                        <option value="Pre">Sal2</option>
                        <option value="Pre">Sal3</option>
                        <option value="Pre">Sal4</option>
                    </select>
                    <article class="salidas_filtro-container-desde-hasta">
                        <h3 class="salidas_filtro-container-desde-hasta__title">Por periodo de tiempo</h3>
                        <section class="salidas_filtro-container-desde-hasta__inputs">
                            <label class="salidas_filtro-container-desde-hasta__label" for="salida-desde">Desde</label>
                            <input type="date" class="salidas_filtro-desde" id="salida-desde">
                            <label class="salidas_filtro-container-desde-hasta__label" for="salida-hasta">Hasta</label>
                            <input type="date" class="salidas_filtro-hasta" id="salida-hasta">
                        </section>
                    </article>
                </form>
                <div class="salidas_container-filter-gen-repo">
                    <div class="salidas_container-filter-gen-repo-img">
                        <img src="../imagenes/informe.svg" alt="">
                    </div>
                    <a class="salidas__container-filter-subtitulo-reporte" href="">Generar reporte</a>
                </div>
            </div>
        </section>


        <section class="salidas__container-table box-shadow">
            <table class="salidas__table tabla">
                <thead class="table-thead">
                    <tr class="table-tr">
                        <td class="table-td">SalCodigo</td>
                        <td class="table-td">FechaSalida</td>
                        <td class="table-td">Cantidad</td>
                        <td class="table-td">TipoSalida</td>
                        <td class="table-td">Comentarios</td>
                        <td class="table-td">InvCodigo</td>
                        <td class="table-td">ProCodBarras</td>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </section>


        <section class="salidas__container-botones box-shadow">
            <section class="salidas__container-boton">
                <input type="button" class="salidas__boton-agregar boton" value="A&ntilde;adir">
            </section>
        </section>
    </main>
</body>
</html>