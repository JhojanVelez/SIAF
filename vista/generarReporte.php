<?php ob_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL_RAIZ ?>/public/css/generar-reporte.css">
    <title>Document</title>
</head>
<body>
    <table class="productos-inhabilitados__table table">
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
</body>
</html>

<?php

$html = ob_get_clean();
// echo($html);

require_once("libs/dompdf/autoload.inc.php");

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->setIsRemoteEnabled(true);
// $options->setDefaultFont('Courier');
$dompdf->setOptions($options);


$dompdf->loadHtml($html);

$dompdf->setPaper("A4", "landscape");
$dompdf->render();
$dompdf->stream("productos.pdf", array('Attachment' => false));

?>

