<div class="platilla-reporte-main__content">
    <p class="platilla-reporte-main__title">Reporte de Salidas</p>
    <p class="platilla-reporte-main__h3">Informacion adicional</p>
    <p>Cantidad Total de Salidas: <?php echo(count($this->data)) ?> </p>
</div>
<div class="platilla-reporte__container-table">
    <table class="platilla-reporte__table table">
        <thead class="table-thead">
            <tr class="table-tr">
                <td class="table-td">SalCodigo</td>
                <td class="table-td">ProCodBarr</td>
                <td class="table-td">Descripcion</td>
                <td class="table-td">Proveedor</td>
                <td class="table-td">FechaSalida</td>
                <td class="table-td">Cantidad</td>
                <td class="table-td">TipoSalida</td>
                <td class="table-td">Comentarios</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($this->data as $key => $value): ?>
                <tr>
                    <td><?php echo $value["SalCodigo"] ?></td>
                    <td><?php echo $value["ProCodBarras"] ?></td>
                    <td><?php echo $value["ProDescripcion"] ?></td>
                    <td><?php echo $value["ProNombre"] ?></td>
                    <td><?php echo $value["SalFecha"] ?></td>
                    <td><?php echo $value["SalCantidad"] ?></td>
                    <td><?php echo $value["SalTipoSalida"] ?></td>
                    <td><?php echo $value["SalComentarios"] ?></td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>