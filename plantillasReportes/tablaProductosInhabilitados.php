<div class="platilla-reporte-main__content">
    <p class="platilla-reporte-main__title">Reporte de Productos Inhabilitados</p>
    <p class="platilla-reporte-main__h3">Informaci&oacute;n adicional</p>
    <p>Cantidad Total de Productos Inhabilitados: <?php echo(count($this->data)) ?> </p>
</div>
<div class="platilla-reporte__container-table">
    <table class="platilla-reporte__table table">
        <thead class="table-thead">
            <tr class="table-tr">
                <td class="table-td">CodigoDeBarras</td>
                <td class="table-td">Descripci&oacute;n</td>
                <td class="table-td">UbicacionFisica</td>
                <td class="table-td">Presentaci&oacute;n</td>
                <td class="table-td">UnidadDeMedida</td>
                <td class="table-td">PrecioDeVenta</td>
                <td class="table-td">Laboratorio</td>
                <td class="table-td">RegistroINVIMA</td>
                <td class="table-td">NITProveedor</td>
                <td class="table-td">Fecha/horaInhabilitaci&oacute;n</td>
            </tr>
        </thead>
        <tbody>
            
            <?php 
            foreach ($this->data as $key => $value):?>
                <tr>
                    <td><?php echo $value['ProCodBarras'] ?></td>
                    <td><?php echo $value['ProDescripcion'] ?></td>
                    <td><?php echo $value['ProUbicacionFisica'] ?></td>
                    <td><?php echo $value['ProPresentacion'] ?></td>
                    <td><?php echo $value['ProUnidadMedida'] ?></td>
                    <td><?php echo $value['ProPrecioVenta'] ?></td>
                    <td><?php echo $value['ProLaboratorio'] ?></td>
                    <td><?php echo $value['ProRegSanInvima'] ?></td>
                    <td><?php echo $value['tbl_proveedores_ProNIT'] ?></td>
                    <td><?php echo $value['ProFechaInhabilitacion'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>