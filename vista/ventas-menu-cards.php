<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo(URL_RAIZ); ?>public/css/main.css">
    <link rel="shortcut icon" href="<?php echo(URL_FAVICON); ?>" type="image/x-icon">
    <title>Ventas</title>
    <style>
        .nav__li:nth-child(4) {
            border-bottom: 2px solid var(--color-button-text);
        }

        .cards-flex-container {
            width: 70%;
        }
    </style>
</head>
<body>
    <?php
    require_once("nav.php");
    ?>
    <main>
        <article class="cards-flex-container">
                <section class="card box-shadow">
                    <h2 class="card__title">REGISTRAR VENTAS</h2>
                    <div class="card__img">
                        <img src="<?php echo(URL_RAIZ); ?>public/imagenes/ventas-registrar-ventas.png" alt="">
                    </div>
                    <button class="card__button boton">
                        <a href="ventasRegistrar">Ingresar</a>
                    </button>
                </section>
                <section class="card box-shadow">
                    <h2 class="card__title">CONSULTAR VENTAS</h2>
                    <div class="card__img">
                        <img src="<?php echo(URL_RAIZ); ?>public/imagenes/ventas-consultar-ventas.png" />
                    </div>
                    <button class="card__button boton">
                        <a href="ventasConsultarVentas">Ingresar</a>
                    </button>
                </section>
        </article>
    </main>
    <figure class="manual-usuario-figure">
        <div class="manual-usuario-figure__container">
            <a class="manual-usuario-figure__link" href="<?php echo URL_RAIZ ?>manualUsuario" title="Manual de Usuario" target="BLANK">?</a>

        </div>
    </figure>
</body>
</html>