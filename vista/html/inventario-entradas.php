<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de Entradas</title>
    <link rel="stylesheet" href="../css/inventario-entradas.css">
</head>
<body>
    <?php
        require("nav.php");
    ?>

<main class="entradas grid-container-main">
        <section class="entradas__container-title container-title box-shadow">
            <h1 class="entradas__titulo">Gestiona Tus Entradas</h1>
        </section>


        <section class="entradas__container-filter container-filter box-shadow">
            <div class="entradas__filtro">
                <h2 class="entradas__filtro-titulo">Filtros de busqueda</h2>
                <form class="entradas__filtro-form" action="">
                    <input type="text" class="entradas__filtro-producto-id" id="producto-id" placeholder="Codigo de Barras">
                    <input type="text" class="entradas__filtro-producto-nombre" id="producto-nombre" placeholder="Nombre Producto">
                    <input type="text" class="entradas__filtro-proveedor-nombre" id="proveedor-nombre" placeholder="Nombre Proveedor">
                    <select name="presentacion" class="entradas_filtro-tipo-salida" id="salida-tipo-salida">
                        <option value="null">Por tipo de salida</option>
                        <option value="Pre">Sal1</option>
                        <option value="Pre">Sal2</option>
                        <option value="Pre">Sal3</option>
                        <option value="Pre">Sal4</option>
                    </select>
                    <article class="entradas_filtro-container-desde-hasta">
                        <h3 class="entradas_filtro-container-desde-hasta__title">Por periodo de tiempo</h3>
                        <div class="entradas_filtro-container-desde-hasta__inputs">
                            <input type="date" class="entradas_filtro-desde" id="salida-desde">
                            <input type="date" class="entradas_filtro-hasta" id="salida-hasta">
                        </div>
                    </article>
                </form>
                <div class="entradas__filtro-gen-repo filtro-gen-repo">
                    <div class="entradas__filtro-gen-repo-img filtro-gen-repo-img">
                        <img src="../imagenes/informe.svg" alt="">
                    </div>
                    <a class="entradas__filtro-subtitulo-reporte filtro-subtitulo-reporte" href="">Generar reporte</a>
                </div>
            </div>
        </section>


        <section class="entradas__container-table container-table box-shadow">
            <table class="entradas__table">
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
                <tbody>
                </tbody>
            </table>
        </section>


        <section class="entradas__container-botones container-botones box-shadow">
            <section class="entradas__container-boton">
                <button class="entradas__boton-agregar boton">
                    A&ntilde;adir
                </button>
            </section>
        </section>
    </main>
</body>
</html>