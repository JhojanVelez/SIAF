<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo(URL_RAIZ); ?>public/css/ventas-consultar-ventas.css">
    <link rel="shortcut icon" href="<?php echo(URL_FAVICON); ?>" type="image/x-icon">
    <title>Consultar Ventas</title>
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
                <h2 class="ventas__filtro-titulo">Filtros de B&uacute;squeda</h2>
                <form 
                id="ventas__filtro-form" 
                class="ventas__filtro-form"
                action="<?php echo URL_RAIZ ?>ventasConsultarVentas/generarReporte"
                method="POST"
                target="_BLANK"
                >
                    <input 
                    name="documentoVendedor"
                    type="text" 
                    class="ventas__filtro-vendedor-id" 
                    id="vendedor-id" 
                    placeholder="Documento del Vendedor"
                    >
                    <input 
                    name="nombreVendedor"
                    type="text" 
                    class="ventas__filtro-vendedor-nombre" 
                    id="vendedor-nombre" 
                    placeholder="Nombre del Vendedor"
                    >
                    <input 
                    name="documentoCliente"
                    type="text" 
                    class="ventas__filtro-cliente-id" 
                    id="cliente-id" 
                    placeholder="Documento del Cliente"
                    >
                    <input 
                    name="nombreCliente"
                    type="text" 
                    class="ventas__filtro-cliente-nombre" 
                    id="cliente-nombre" 
                    placeholder="Nombre del Cliente"
                    >
                    <article class="ventas_filtro-container-desde-hasta">
                        <h3 class="ventas_filtro-container-desde-hasta__title">Por Periodo de Tiempo</h3>
                        <div class="ventas_filtro-container-desde-hasta__inputs">
                            <input 
                            name="fechaVentaDesde"
                            type="datetime-local" 
                            class="ventas_filtro-desde" 
                            id="salida-desde"
                            >
                            <input 
                            name="fechaVentaHasta"
                            type="datetime-local" 
                            class="ventas_filtro-hasta" 
                            id="salida-hasta"
                            >
                        </div>
                    </article>
                </form>
                <div class="ventas__filtro-gen-repo filtro-gen-repo">
                    <div class="ventas__filtro-gen-repo-img filtro-gen-repo-img">
                        <img src="<?php echo(URL_RAIZ); ?>public/imagenes/informe.png" alt="">
                    </div>
                    <input 
                    class="ventas__filtro-subtitulo-reporte filtro-subtitulo-reporte" 
                    form="ventas__filtro-form" 
                    type="submit" 
                    value="Generar reporte">
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
                        <td class="table-td">DocCliente</td>
                        <td class="table-td">ProductosVendidos</td>
                        <td class="table-td">PrecioTotal</td>
                        <td class="table-td">Factura</td>
                    </tr>
                </thead>
                <tbody>
                    <!-- table-td--comentarios clase -->
                    <?php foreach($this->data["infoVentas"] as $key => $value): ?>
                        <tr>
                            <td><?php echo($value["FacCodigo"]) ?></td>
                            <td><?php echo($value["FacFecha"]) ?></td>
                            <td><?php echo($value["EmpNombre"]." ".$value["EmpApellido"]) ?></td>
                            <td><?php echo($value["CliNombre"]." ".$value["CliApellido"]) ?></td>
                            <td><?php echo($value["CliDocIdentidad"]) ?></td>
                            <td><?php echo($value["FacCantidadTotal"]) ?></td>
                            <td><?php echo($value["FacTotal"]) ?></td>
                            <td class="ventas-table-td-factura">
                                <div class="ventas-table-link-factura">
                                    <a href="ventasConsultarVentas/generarFactura/<?php echo($value["FacCodigo"]) ?>" target="_BLANK">
                                        <img src="<?php echo(URL_RAIZ); ?>public/imagenes/informe.png" alt="">
                                    </a>
                                </div>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>

                <!-- 
                    Este template nos permite imprimir la informacion cuando estamos buscando por atributo
                    pero en este caso lo hacemos con template para hacer uso de los fragmentos
                -->
                <template class="ventas__table-template">
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="ventas-table-td-factura">
                            <div class="ventas-table-link-factura">
                                <a href="ventasConsultarVentas/generarFactura/234" target="_BLANK">
                                    <img src="<?php echo(URL_RAIZ); ?>public/imagenes/informe.png" alt="">
                                </a>
                            </div>
                        </td>
                    </tr>
                </template>
            </table>
        </section>
    </main>
    <figure class="manual-usuario-figure">
        <div class="manual-usuario-figure__container">
            <a class="manual-usuario-figure__link" href="<?php echo URL_RAIZ ?>manualUsuario" title="Manual de Usuario" target="BLANK">?</a>

        </div>
    </figure>
    <script> 
        /* Se puso var porque queremos que pueda usarse en todos los contextos, 
        independientemente de si esta en una funcion anonima autoejecutable */
        var URL_RAIZ = "<?php echo URL_RAIZ ?>"
    </script>
    <script src="<?php echo(URL_RAIZ) ?>public/js/modulo_ventas_consultar_buscar_por_atributos.js" type="module"></script>
</body>
</html>