<div class="platilla-reporte-main__content">
    <p class="platilla-reporte-main__title">Reporte de Clientes Inhabilitados</p>
    <p class="platilla-reporte-main__h3">Informaci&oacute;n adicional</p>
    <p>Cantidad Total de Clientes Inhabilitados: <?php echo(count($this->data)) ?> </p>
</div>
<div class="platilla-reporte__container-table">
    <table class="platilla-reporte__table table">
        <thead class="table-thead">
            <tr class="table-tr">
                <td class="table-td">Documento</td>
                <td class="table-td">Nombre/s</td>
                <td class="table-td">Apellido/s</td>
                <td class="table-td">Direcci&oacute;n</td>
                <td class="table-td">Correo</td>
                <td class="table-td">Tel&eacute;fono</td>
                <td class="table-td">Fecha/hora Inhabilitaci&oacute;n</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->data as $key => $value):?>
                <tr>
                    <td><?php echo $value['CliDocIdentidad'] ?></td>
                    <td><?php echo $value['CliNombre'] ?></td>
                    <td><?php echo $value['CliApellido'] ?></td>
                    <td><?php echo $value['CliDireccion'] ?></td>
                    <td><?php echo $value['CliCorreo'] ?></td>
                    <td><?php echo $value['CliTelefono'] ?></td>
                    <td><?php echo $value['CliFechaInhabilitacion'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>