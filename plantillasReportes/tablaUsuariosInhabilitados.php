<div class="platilla-reporte-main__content">
    <p class="platilla-reporte-main__title">Reporte de Usuarios Inhabilitados</p>
    <p class="platilla-reporte-main__h3">Informacion adicional</p>
    <p>Cantidad Total de Usuarios Inhabilitados: <?php echo(count($this->data)) ?> </p>
</div>
<div class="platilla-reporte__container-table">
    <table class="platilla-reporte__table table">
        <thead class="table-thead">
            <tr class="table-tr">
                <td class="table-td">Documento</td>
                <td class="table-td">Nombre/s</td>
                <td class="table-td">Apellido/s</td>
                <td class="table-td">Correo</td>
                <td class="table-td">Telefono</td>
                <td class="table-td">Direccion</td>
                <td class="table-td">EPS</td>
                <td class="table-td">RH</td>
                <td class="table-td">Rol</td>
                <td class="table-td">Fecha/hora Inhabilitacion</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->data as $key => $value):?>
                <tr>
                    <td><?php echo $value['EmpDocIdentidad'] ?></td>
                    <td><?php echo $value['EmpNombre'] ?></td>
                    <td><?php echo $value['EmpApellido'] ?></td>
                    <td><?php echo $value['EmpCorreo'] ?></td>
                    <td><?php echo $value['EmpTelefono'] ?></td>
                    <td><?php echo $value['EmpDireccion'] ?></td>
                    <td><?php echo $value['EmpEps'] ?></td>
                    <td><?php echo $value['EmpRH'] ?></td>
                    <td><?php echo $value['EmpRol'] ?></td>
                    <td><?php echo $value['EmpFechaInhabilitacion'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>