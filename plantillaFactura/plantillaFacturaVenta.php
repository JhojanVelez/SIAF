<?php ob_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL_RAIZ ?>/public/css/factura-de-venta.css">
    <link rel="shortcut icon" href="<?php echo(URL_FAVICON); ?>" type="image/x-icon">
    <title><?php echo $this->fileName?></title>
</head>
<body>
    <div class="factura-container">
        <header class="platilla-factura-venta-header">
            <p class="platilla-factura-venta__razon-social">PHARMACY SOS</p>
            <p>NIT: 8001496951</p>
            <p>CLL 68D #20D 65 SUR</p>
            <p>BARRIO JUAN JOSE RONDON</p>
            <p>TELEFONO: 7797300</p>
            <br>
            <p class="text-align-left">FECHA: <?php echo($this->data["infoAdicional"]["FacFecha"]) ?></p>
            <p class="text-align-left">FACTURA DE VENTA: <?php echo($this->data["infoAdicional"]["FacCodigo"]) ?></p>
            <br>
            <p>VENDEDOR<p>
            <p><?php echo($this->data["infoAdicional"]["EmpNombre"]." ".$this->data["infoAdicional"]["EmpApellido"]) ?></p>
            <br>
        </header>
        <main class="platilla-factura-venta-main">
            <table class="platilla-factura-venta__table">
                <thead>
                    <tr>
                        <td>DETALLE</td>
                        <td>CANT X PREC</td>
                        <td>VALOR</td>
                    </tr>
                </thead>
                <tbody class="">
                    <?php foreach($this->data["detalleVenta"] as $key => $value): ?>
                        <tr>
                            <td><?php echo($value["ProDescripcion"]) ?></td>
                            <td><?php echo($value["cantidadPorProducto"]."x".$value["ProPrecioVenta"]) ?></td>
                            <td><?php echo($value["PrecioTotal"]) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tr>
                    <td></td>
                    <td><b>TOTAL:</b></td>
                    <td><b><?php echo($this->data["infoAdicional"]["FacTotal"]) ?></b></td>
                </tr>
            </table>
            <br>
            <br>
            <p class="text-align-right">ENTREGADO: <?php echo($this->data["infoAdicional"]["FacRecibe"]) ?></p>
            <p class="text-align-right"><b>CAMBIO: <?php echo($this->data["infoAdicional"]["FacCambio"]) ?></b></p>
            <br>
            <p class="text-align-left"></p>
            <p class="text-align-left"></p>
            <br>
            <p class="text-align-left">CLIENTE: <?php echo($this->data["infoAdicional"]["CliNombre"]." ".$this->data["infoAdicional"]["CliApellido"]) ?></p>
            <p class="text-align-left">TELEFONO: <?php echo($this->data["infoAdicional"]["CliTelefono"]) ?></p>
            <p class="text-align-left">DIRECCION: <?php echo($this->data["infoAdicional"]["CliDireccion"]) ?></p>
            <br>
            <br>
            <hr>
            <h2>GRACIAS POR TU FIDELIDAD</h2>
            <hr>
            <br>
        </main>
    </div>
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
$dompdf->setOptions($options);


$dompdf->loadHtml($html);

$dompdf->setPaper("A4", "portrait");
$dompdf->render();
$dompdf->stream($this->fileName, array('Attachment' => false));

?>