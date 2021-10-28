<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo(URL_RAIZ) ?>public/css/errores.css">
</head>
<body>
    <div class="errores">
        <article class="errores__descripcion-container">
            <h1 class="errores__h1">Error 404</h1>
            <h3 class="errores__h3">Page Not Found</h3>
            <p class="errores__parrafo"><?php echo($this->error_message); ?></p>
            <button class="errores__boton-regresar boton">
                <a class="errores__boton-regresar-link" href="<?php echo URL_RAIZ?>">Regresar al menu</a>
            </button>
        </article>
    </div>
</body>
</html>