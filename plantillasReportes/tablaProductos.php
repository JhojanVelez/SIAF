<div class="platilla-reporte-main__content">
    <p class="platilla-reporte-main__title">Reporte de Productos</p>
    <p>Cantidad Total de Productos: <?php echo(count($this->data)) ?> </p>
</div>
<div class="platilla-reporte__container-table">
    <table class="platilla-reporte__table table">
        <thead class="table-thead">
            <tr class="table-tr">
                <td class="table-td">ProCodBarr</td>
                <td class="table-td">Descripcion</td>
                <td class="table-td">Ubicacion Fisica</td>
                <td class="table-td">Presentacion</td>
                <td class="table-td">UnidadMedida</td>
                <td class="table-td">PrecioVenta</td>
                <td class="table-td">Laboratorio</td>
                <td class="table-td">Registro INVIMA</td>
                <td class="table-td">NIT Proveedor</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->data as $key => $value):?>
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
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>