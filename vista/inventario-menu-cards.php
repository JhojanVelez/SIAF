<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo(URL_RAIZ); ?>public/css/main.css">
    <link rel="shortcut icon" href="<?php echo(URL_FAVICON); ?>" type="image/x-icon">
    <title>Inventario</title>
    <style>
        .nav__li:nth-child(3) {
            border-bottom: 2px solid var(--color-button-text);
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
                <h2 class="card__title">GESTION DE ENTRADAS</h2>
                <div class="card__img">
                    <img src="<?php echo(URL_RAIZ); ?>public/imagenes/inventario-entradas.svg" />
                </div>
                <button class="card__button boton">
                    <a href="inventarioEntradas">Ingresar</a>
                </button>
            </section>
            <section class="card box-shadow">
                <h2 class="card__title">KARDEX</h2>
                <div class="card__img">
                    <img src="<?php echo(URL_RAIZ); ?>public/imagenes/inventario-kardex.svg" />
                </div>
                <button class="card__button boton">
                    <a href="inventarioKardex">Ingresar</a>
                </button>
            </section>
            <section class="card box-shadow">
                <h2 class="card__title">GESTION DE SALIDAS</h2>
                <div class="card__img">
                    <img src="<?php echo(URL_RAIZ); ?>public/imagenes/inventario-salidas.svg" alt="">
                </div>
                <button class="card__button boton">
                    <a href="inventarioSalidas">Ingresar</a>
                </button>
            </section>
        </article>
    </main>
</body>
</html>