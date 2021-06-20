<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
    <?php
    require("nav.php");
    ?>
    <main>
        <article class="cards-flex-container">
            <section class="card box-shadow">
                <h2 class="card__title">GESTION DE SALIDAS</h2>
                <div class="card__img">
                    <img src="../imagenes/inventario-salidas.svg" alt="">
                </div>
                <button class="card__button boton">
                    <a href="inventario-salidas.php">Ingresar</a>
                </button>
            </section>
            <section class="card box-shadow">
                <h2 class="card__title">GESTION DE ENTRADAS</h2>
                <div class="card__img">
                    <img src="../imagenes/inventario-entradas.svg" />
                </div>
                <button class="card__button boton">
                    <a href="inventario-entradas.php">Ingresar</a>
                </button>
            </section>
            <section class="card box-shadow">
                <h2 class="card__title">KARDEX</h2>
                <div class="card__img">
                    <img src="../imagenes/inventario-kardex.svg" />
                </div>
                <button class="card__button boton">
                    <a href="inventario-kardex.php">Ingresar</a>
                </button>
            </section>
        </article>
    </main>
</body>
</html>