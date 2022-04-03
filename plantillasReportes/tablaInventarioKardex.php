<div class="platilla-reporte-main__content">
    <p class="platilla-reporte-main__title">Reporte de Kardex</p>
    <p class="platilla-reporte-main__h3">Informaci&oacute;n adicional</p>
    <p>Cantidad Total de Registros: <?php echo(count($this->data)) ?> </p>
</div>
<div class="platilla-reporte__container-table">
    <table class="platilla-reporte__table table">
        <thead class="table-thead">
            <tr class="table-tr">
                <td>codInvt</td>
                <td>ProCodBarras</td>
                <td>Producto</td>
                <td>TotalEntradas</td>
                <td>TotalSalidas</td>
                <td>Stock</td>
                <td>Ubicaci&oacute;nF&iacute;sica</td>
                <td>CostoProducto</td>
                <td>PrecioVenta</td>
                <td>ProductoPresentaci&oacute;n</td>
                <td>Laboratorio</td>
                <td>NitProveedor</td>
                <td>Proveedor</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($this->data as $key => $value): ?>
                <tr>
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
        </tbody>
    </table>
</div>