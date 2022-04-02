<div class="platilla-reporte-main__content">
    <p class="platilla-reporte-main__title">Reporte de Entradas</p>
    <p class="platilla-reporte-main__h3">Informaci&oacute;n adicional</p>
    <p>Cantidad Total de Entradas: <?php echo(count($this->data)) ?> </p>
</div>
<div class="platilla-reporte__container-table">
    <table class="platilla-reporte__table table">
        <thead class="table-thead">
            <tr class="table-tr">
                <td class="table-td">EntCodigo</td>
                <td class="table-td">ProCodBarras</td>
                <td class="table-td">Producto</td>
                <td class="table-td">NitProveedor</td>
                <td class="table-td">Proveedor</td>
                <td class="table-td">FechaEntrada</td>
                <td class="table-td">Cantidad</td>
                <td class="table-td">CostoProducto</td>
                <td class="table-td">Comentarios</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($this->data as $key => $value): ?>
                <tr>
                    <td><?php echo $value["EntCodigo"] ?></td>
                    <td><?php echo $value["tbl_productos_ProCodBarras"] ?></td>
                    <td><?php echo $value["ProDescripcion"] ?></td>
                    <td><?php echo $value["tbl_proveedores_ProNIT"] ?></td>
                    <td><?php echo $value["ProNombre"] ?></td>
                    <td><?php echo $value["EntFecha"] ?></td>
                    <td><?php echo $value["EntCantidad"] ?></td>
                    <td><?php echo $value["EntCostoProducto"] ?></td>
                    <td><?php echo $value["EntComentarios"] ?></td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>