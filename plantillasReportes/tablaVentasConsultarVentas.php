<div class="platilla-reporte-main__content">
    <p class="platilla-reporte-main__title">Reporte de Ventas</p>
    <p class="platilla-reporte-main__h3">Informaci&oacute;n adicional</p>
    <p>Cantidad Total de Ventas: <?php echo(count($this->data)) ?> </p>
</div>
<div class="platilla-reporte__container-table">
    <table class="platilla-reporte__table table">
        <thead class="table-thead">
            <tr class="table-tr">
                <td class="table-td">NumFact</td>
                <td class="table-td">FechaVenta</td>
                <td class="table-td">Vendedor</td>
                <td class="table-td">Cliente</td>
                <td class="table-td">DocCliente</td>
                <td class="table-td">ProductosVendidos</td>
                <td class="table-td">PrecioTotal</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->data as $key => $value):?>
                <tr>
                    <td><?php echo $value['FacCodigo'] ?></td>
                    <td><?php echo $value['FacFecha'] ?></td>
                    <td><?php echo $value['EmpNombre'] ?></td>
                    <td><?php echo $value['CliNombre'] ?></td>
                    <td><?php echo $value['CliDocIdentidad'] ?></td>
                    <td><?php echo $value['FacCantidadTotal'] ?></td>
                    <td><?php echo $value['FacTotal'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>