<?php ob_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL_RAIZ ?>/public/css/plantilla-reporte.css">
    <link rel="shortcut icon" href="<?php echo(URL_FAVICON); ?>" type="image/x-icon">
    <title><?php echo $this->fileName?></title>
</head>
<body>
    <header class="platilla-reporte-nav">
        <div class="platilla-reporte-nav-container">
            <p class="platilla-reporte-nav-container__title">SIAF</p>
        </div>
    </header>
    <main class="platilla-reporte-main">
            <?php require_once("tabla".ucfirst($this->urlReporte).".php") ?>
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
// $options->setDefaultFont('Courier');
$dompdf->setOptions($options);


$dompdf->loadHtml($html);

$dompdf->setPaper("A4", "landscape");
$dompdf->render();
$dompdf->stream($this->fileName, array('Attachment' => false));

?>

