<div class="platilla-reporte-main__content">
    <p class="platilla-reporte-main__title">Reporte de Proveedores</p>
    <p class="platilla-reporte-main__h3">Informacion adicional</p>
    <p>Cantidad Total de Proveedores: <?php echo(count($this->data)) ?> </p>
</div>
<div class="platilla-reporte__container-table">
    <table class="platilla-reporte__table table">
        <thead class="table-thead">
            <tr class="table-tr">
                <td class="table-td">Nit</td>
                <td class="table-td">Nombre</td>
                <td class="table-td">Correo</td>
                <td class="table-td">Telefono</td>
                <td class="table-td">Direccion</td>
                <td class="table-td">Ciudad</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->data as $key => $value):?>
                <tr>
                    <td><?php echo $value['ProNIT'] ?></td>
                    <td><?php echo $value['ProNombre'] ?></td>
                    <td><?php echo $value['ProCorreo'] ?></td>
                    <td><?php echo $value['ProTelefono'] ?></td>
                    <td><?php echo $value['ProCiudad'] ?></td>
                    <td><?php echo $value['ProDireccion'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>