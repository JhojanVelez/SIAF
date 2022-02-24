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
<body class="body">
    <header class="platilla-factura-venta-header">
        <p> sfaddddddd </p>
        <p> sfaddddddd </p>
        <p> sfaddddddd </p>
        <p> sfaddddddd </p>
        <p> sfaddddddd </p>
    </header>
    <main class="platilla-factura-venta-main">

    </main>
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